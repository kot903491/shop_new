<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 22:52
 */
if(isset($_GET['act'])){
    if($_GET['act']=='delete' && isset($_GET['id'])){
        $mysqli = mysqli_connect(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
        $id=(int)htmlspecialchars(strip_tags($_GET['id']));
        $res=$mysqli->query('SELECT s_img,b_img FROM gallery WHERE id='.$id);
        $res=$res->fetch_row();
        $stmt=$mysqli->prepare("DELETE FROM product WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        foreach ($res as $value){
            unlink(GALLERY_DIR.$value);
        }
        header("Location:index.php?timurka=kot903491&kot903491=timurka&page=catalog");
    }
    elseif($_GET['act']=='edit' && isset($_GET['id'])){
        $mysqli = mysqli_connect(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
        $id=(int)htmlspecialchars(strip_tags($_GET['id']));
    }
}
else {
    $mysqli = mysqli_connect(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
    $res = $mysqli->query("select product.id,product.name, desk.s_desk, gallery.s_img FROM product inner join desk on desk.id=product.id inner join gallery on gallery.id=product.id");
    while ($res_all = $res->fetch_assoc()) {
        $res_all['s_img']=GALLERY_DIR.$res_all['s_img'];
        $result[] = $res_all;
    }
    $mysqli->close();
    if($admin) {
        try{
            $url=array('edit'=>str_replace("catalog","edit",$_SERVER["REQUEST_URI"])."&id=",
                    'delete'=>$_SERVER["REQUEST_URI"].'&act=delete&id=');
            $loader = new Twig_Loader_Filesystem(ADMIN_TPL);
            $twig=new Twig_Environment($loader);
            $template=$twig->loadTemplate('catalog.tmpl');
            $content=$template->render(array('cont'=>$result,
                'url'=>$url));
        }
        catch (Exception $e){
            die('ERROR: '.$e->getMessage());
        }
        $title = "Админка-Каталог комиксов";
    }
    else{
        try{
            $catalog=true;
            $loader = new Twig_Loader_Filesystem(TPL_DIR);
            $twig=new Twig_Environment($loader);
            $template=$twig->loadTemplate('catalog.tmpl');
            $content=$template->render(array('cont'=>$result));
        }
        catch (Exception $e){
            die('ERROR: '.$e->getMessage());
        }
        $title = "Каталог комиксов";
    }
}