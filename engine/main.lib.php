<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 22:53
 */

$mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname,SQL_PORT);
$res = $mysqli->query("select product.id,product.name, gallery.b_img from product inner join gallery on gallery.id=product.id limit 3");
while($res_i=$res->fetch_assoc()){
    if($res_i['id']==1){
        $res_i['style']="image_top";
        $result[]=$res_i;
    }
    else{
        $res_i['style']="image_bottom";
        $result[]=$res_i;
    }
}