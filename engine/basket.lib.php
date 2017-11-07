<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 07.11.2017
 * Time: 18:23
 */
if ($_GET['page']=='basket'){
    $basket=unserialize($_COOKIE['basket_product']);
    if(!$basket){
        $msg="Корзина пуста";
    }
    else {
            $msg="Товары в вашей корзине";
        }
    $page=TPL_DIR."basket.php";
    $title="Корзина";
}

