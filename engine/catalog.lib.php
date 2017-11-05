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
        $stmt=$mysqli->prepare("DELETE FROM product WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
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
        $result[] = $res_all;
    }
    $mysqli->close();
    if($admin) {
        $page = ADMIN_TPL . "catalog.php";
        $title = "Админка-Каталог комиксов";
    }
    else{
        $page = TPL_DIR . "catalog.php";
        $title = "Каталог комиксов";
    }
}