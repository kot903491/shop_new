<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 0:11
 */

if (isset($_GET['act'])){
    switch ($_GET['act']){
        case "add":
            $admin_page=ADMIN_TPL."page.php";
            break;
        case "catalog":
            $admin_page=ADMIN_TPL."catalog.php";
            break;
        case "sprav":
            $admin_page=ADMIN_TPL."sprav.php";
            break;
    }
}
else{
    $admin_page=ADMIN_TPL."menu.php";
}

if (file_exists($admin_page)) {
    include_once $admin_page;
    }



?>

