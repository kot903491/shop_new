<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 07.11.2017
 * Time: 13:38
 */


require_once "../models/config.php";
if (isset($_POST['id'])){
    echo setBasket();
}
elseif ($_POST['basket']=='getBasketTable'){
    echo basketTable();
}
else{
    echo getBasket();
}

function getBasket(){
    if (!isset($_COOKIE['basket_product'])){
        $str="<a href='index.php?page=basket'>В корзине пусто</a>";
        return $str;
    }
    else{
        $basket=unserialize($_COOKIE['basket_product']);
        $count=count($basket);
        switch ($count){
            case 1:
                $t="товар";
                break;
            case 2:
            case 3:
            case 4:
                $t="товара";
                break;
            default:
                $t="товаров";
        }
        $price=0;
        foreach ($basket as $value){
            $price +=$value['price'];
        }
        $str="<a href='index.php?page=basket'>В корзине $count $t на сумму $price тг</a>";
        return $str;
    }
}

function setBasket(){
    $id = (int)$_POST['id'];
    if (!isset($_COOKIE['basket_product'])){
        $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
        $res=$mysqli->query("SELECT price FROM product WHERE id=$id");
        $res=$res->fetch_assoc();
        $price=$res['price'];
        $basket[]=array('id'=>$id, 'price'=>$price);
        setcookie('basket_product',serialize($basket),time()+1500,"/");
        $mysqli->close();
        return "<a href='index.php?page=basket'>В корзине 1 товар на сумму $price тг</a>";
    }
    else{
        $basket=unserialize($_COOKIE['basket_product']);
        setcookie('basket_product',"",time()-1,"/");
        $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
        $res=$mysqli->query("SELECT price FROM product WHERE id=$id");
        $res=$res->fetch_assoc();
        $name=$res['name'];
        $price=$res['price'];
        $basket[]=array('id'=>$id,'price'=>$price);
        setcookie('basket_product',serialize($basket),time()+3600,"/");
        $count=count($basket);
        switch ($count){
            case 1:
                $t="товар";
                break;
            case 2:
            case 3:
            case 4:
                $t="товара";
                break;
            default:
                $t="товаров";
        }
        $price=0;
        foreach ($basket as $value){
            $price +=$value['price'];
        }
        $str="<a href='index.php?page=basket'>В корзине $count $t на сумму $price тг</a>";
        return $str;
        $mysqli->close();
        }
}
function basketTable(){
    $basket=unserialize($_COOKIE['basket_product']);
    $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
    foreach ($basket as $key => $value) {
        $res = $mysqli->query("SELECT name FROM product WHERE id=" . $value['id']);
        $res = $res->fetch_assoc();
        $basket[$key]['name'] = $res['name'];
    }
    $str="<table><tr><td>Название</td><td>Цена</td><td></td></tr>";
    foreach($basket as $key=>$value){
        $str.="<tr><td>".$value['name']."</td><td>".$value['price']."</td><td>
        <button id='key' value='$key'>Удалить</button></td></tr>";
    }
    $str.="</table>";
    return $str;
}