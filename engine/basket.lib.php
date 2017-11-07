<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 07.11.2017
 * Time: 18:23
 */
if ($_GET['page']=='basket'){
    if(!isset($_GET['act'])) {
        $basket = unserialize($_COOKIE['basket_product']);
        if (!$basket) {
            $msg = "Корзина пуста";
        } else {
            $msg = "Товары в вашей корзине";
        }
        $page = TPL_DIR . "basket.php";
        $title = "Корзина";
    }
    else{
        $act=$_GET['act'];
        switch ($act){
            case "addOrder":
                $basket=unserialize($_COOKIE['basket_product']);
                $i=0;
                while(!empty($basket)){
                    $basket_order[$i]=['id'=>$basket[0]['id'],'count'=>1];
                    unset ($basket[0]);
                foreach ($basket as $key=>$value){
                    if ($value['id']==$basket_order[$i]['id']){
                        $basket_order[$i]['count']+=1;
                        unset ($basket[$key]);
                    }
                    else{
                        $basket_new[]=$value;
                    }
                }
                $basket=$basket_new;
                unset($basket_new);
                $i++;
                }

                break;
        }
    }
}

