<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 02.11.2017
 * Time: 20:18
 */
if (isset($_GET['id'])){
    require_once LIB_DIR."page_lib.php";
    $getPage = new page_lib();
    $id=(int)htmlspecialchars(strip_tags($_GET['id']));
    $getPage->getPage($id);
    $page=TPL_DIR."goods.php";
    $title=$getPage->name;
}