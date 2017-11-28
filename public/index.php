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
require_once TWIG_DIR.'Autoloader.php';
Twig_Autoloader::register();
spl_autoload_register(function ($ClassName){
    include_once CLASS_DIR.$ClassName.'.php';});

$style['css']=STYLE_DIR.'style.css';
$content='<div id="content"><h1>Страница не найдена</h1></div>';
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
            try{
                $loader = new Twig_Loader_Filesystem(TPL_DIR);
                $twig=new Twig_Environment($loader);
                $template=$twig->loadTemplate('about.tmpl');
                $content=$template->render(array('style'=>$style));
            }
            catch (Exception $e){
                die('ERROR: '.$e->getMessage());
            }
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
    require_once LIB_DIR . "main.lib.php";
    $title="Главная";
}
try{
    $loader = new Twig_Loader_Filesystem(TPL_DIR);
    $twig=new Twig_Environment($loader);
    $template=$twig->loadTemplate('index.tmpl');
    echo $template->render(array('title'=>$title,
        'footer'=>'footer.tmpl',
        'header'=>'header.tmpl',
        'style'=>$style,
        'ajax'=>$ajax,
        'content'=>$content,
        'basket_view'=>$basket_view,
        'review'=>$review,
        'catalog'=>$catalog));
}
catch (Exception $e){
    die('ERROR: '.$e->getMessage());
}

ob_end_flush();
session_destroy();


