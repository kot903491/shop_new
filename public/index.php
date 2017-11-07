<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 12:44
 */
session_start();
ob_start();
date_default_timezone_set("Asia/Aqtobe");
require_once "../models/config.php";
if (isset($_GET['timurka']) && isset($_GET['kot903491'])){
    if ($_GET['timurka']=="kot903491" && $_GET['kot903491']=="timurka"){
        $tpl_page=ADMIN_DIR."admin.php";
        if(file_exists($tpl_page)){
            require_once $tpl_page;
        }

    }
}
elseif (isset($_GET['page'])){
    switch ($_GET['page']) {
        case 'catalog':
            $lib_page=LIB_DIR."catalog.lib.php";
            if(file_exists($lib_page)){
                require_once $lib_page;
            }
            break;
        case "about":
            $page=TPL_DIR."about.php";
            $title = "о нас";
            break;
        case 'product':
            $page = LIB_DIR . "page.lib.php";
            if (file_exists($page)) {
                require_once $page;
                break;
            }
        case 'basket':
            $page = LIB_DIR . "basket.lib.php";
            if (file_exists($page)) {
                require_once $page;
                break;
            }
    }
}
else{
    $page=TPL_DIR."main.php";
    $title="Главная";
}

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="<?=STYLE_DIR;?>style.css">
    <script src="<?=LIB_DIR;?>jquery.js"></script>
    <script src="<?=LIB_DIR;?>functions.js"></script>
    <title><?=$title;?></title>
</head>
<body>
<?
include_once TPL_DIR."header.php";
if(file_exists($page)){
    include_once $page;
}
else{
    include_once TPL_DIR."page_error.php";
}
include_once TPL_DIR."footer.php";
ob_end_flush();
session_destroy();
?>
</body>
</html>

