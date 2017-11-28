<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 07.11.2017
 * Time: 18:23
 */
if (isset($_POST['act']) && isset($_POST['id'])){
    if ($_POST['act']=="setBasket"){
        changeOrderStatus($_POST['id']);
        echo getBasketTable();
    }
}
else {
    if (!$admin) {
        if ($_POST['name'] != '' && $_POST['tel'] != '' && $_POST['address'] != '') {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $tel = htmlspecialchars(strip_tags($_POST['tel']));
            $address = htmlspecialchars(strip_tags($_POST['address']));
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $date = date("Y-m-d H:m:s");
            $basket = unserialize($_COOKIE['basket_product']);
            $i = 0;
            while (!empty($basket)) {
                $basket_order[$i] = ['id' => $basket[0]['id'], 'count' => 1];
                unset ($basket[0]);
                foreach ($basket as $key => $value) {
                    if ($value['id'] == $basket_order[$i]['id']) {
                        $basket_order[$i]['count'] += 1;
                        unset ($basket[$key]);
                    } else {
                        $basket_new[] = $value;
                    }
                }
                $basket = $basket_new;
                unset($basket_new);
                $i++;
            }
            $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
            $mysqli->query("INSERT INTO `order`(order_date,order_name,order_tel,opder_email,order_address,order_status) VALUES('$date','$name','$tel','$email','$address',0)");
            $i = $mysqli->query("SELECT LAST_INSERT_ID()");
            $i = $i->fetch_row();
            $i = $i[0];
            foreach ($basket_order as $value) {
                $prod_id = $value['id'];
                $prod_count = $value['count'];
                $mysqli->query("INSERT INTO order_product(id_order,id_product,`count`) VALUES($i,$prod_id,$prod_count)");
            }
            setcookie('basket_product', "", time() - 1, "/");
            $mysqli->close();
            header("Location: " . $_SERVER['REQUEST_URI']);
        } elseif ($_GET['page'] == 'basket') {
            $basket = unserialize($_COOKIE['basket_product']);
            if (!$basket) {
                $msg = "Корзина пуста";
            } else {
                $msg = "Редактирование и оформление заказа";
            }
            try{
                $loader = new Twig_Loader_Filesystem(TPL_DIR);
                $twig=new Twig_Environment($loader);
                $template=$twig->loadTemplate('basket.tmpl');
                $content=$template->render(array('msg'=>$msg));
            }
            catch (Exception $e){
                die('ERROR: '.$e->getMessage());
            }

            $title = "Корзина";
        }
    } else {
        try{
            $loader = new Twig_Loader_Filesystem(ADMIN_TPL);
            $twig=new Twig_Environment($loader);
            $template=$twig->loadTemplate('basket.tmpl');
            $content=$template->render(array('getBasketTable'=>getBasketTable()));
        }
        catch (Exception $e){
            die('ERROR: '.$e->getMessage());
        }
        $title="Админка-корзина";
    }
}

function getBasketTable(){
    $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
    $res=$mysqli->query("SELECT order_product.id_order,sum(order_product.count) as allcount, sum(order_product.count*product.price) as summ, `order`.order_status as status FROM order_product 
inner join product on order_product.id_product=product.id
inner join `order` on order_product.id_order=`order`.id_order
group by id_order;");
    $table="<table><tr><td>№ заказа</td><td>Всего товаров</td><td>Сумма заказа</td><td>Статус</td></tr>";
    while($row=$res->fetch_assoc()) {
        switch ($row['status']) {
            case 0:
                $status = "Выполняется";
                break;
            case 1:
                $status = "Завершен";
                break;
        }
        $table .= "<tr><td>" . $row['id_order'] . "</td><td>" . $row['allcount'] . "</td><td>" . $row['summ'] . "</td><td>$status</td>
<td><button id='button' onclick='changeOrderStatus(" . $row['id_order'] . ")'>Изменить</button></td></tr>";
    }
    $table.="</table>";
    $mysqli->close();
    return $table;
}

function changeOrderStatus($id){
    require_once "../models/config.php";
    $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
    $res=$mysqli->query("SELECT order_status FROM `order` where id_order='$id';");
    $res=$res->fetch_row();
    $res=$res[0];
    if ($res==0){
        $s=1;
    }
    else{
        $s=0;
    }
    $mysqli->query("UPDATE `order` SET order_status=$s where id_order=$id");
    $mysqli->close();
}