<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 0:11
 */

if (isset($_COOKIE['auth_name']) && $_COOKIE['hash']===sult_cookie){
    //setcookie('hash',"",time()-1,'/');
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "add":
                $lib_page = LIB_DIR . "add_page.lib.php";
                if (file_exists($lib_page)) {
                    require_once $lib_page;
                }
                $title = "Админка-добавление";
                break;
            case "edit":
                $lib_page = LIB_DIR . "edit_page.lib.php";
                if (file_exists($lib_page)) {
                    require_once $lib_page;
                }
                $title = "Админка-редактирование";
                break;
            case "catalog":
                $lib_page = LIB_DIR . "catalog.lib.php";
                if (file_exists($lib_page)) {
                    $admin = true;
                    require_once $lib_page;
                };
                break;
            case "sprav":
                $admin_page = ADMIN_TPL . "sprav.php";
                break;
        }
    } else {
        $page = ADMIN_TPL . "menu.php";
        $title = "Админка";
    }
}
else{
    $page = AUTH_DIR . "admin.php";
    $title = "Вход в админку";
}
?>
<link rel="stylesheet" href="<?=STYLE_DIR;?>admin.css">
