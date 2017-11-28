<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 0:11
 */

if (isset($_COOKIE['auth_name']) && $_COOKIE['hash']===sult_cookie){
    $style['css_admin']=STYLE_DIR.'admin.css';
    $basket_view=false;
    //setcookie('hash',"",time()-1,'/');
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "add":
                $lib_page = LIB_DIR . "add_page.lib.php";
                if (file_exists($lib_page)) {
                    require_once $lib_page;
                }
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
            case "basket":
                $lib_page=LIB_DIR."basket.lib.php";
                if (file_exists($lib_page)) {
                    $admin = true;
                    require_once $lib_page;
                };
                break;
        }
    } else {
        try{
            $link=$_SERVER["REQUEST_URI"];
            $url=array('add'=>$link.'&page=add',
                'catalog'=>$link.'&page=catalog',
                'basket'=>$link.'&page=basket',
                'sprav'=>$link.'&page=sprav');
            $loader = new Twig_Loader_Filesystem(ADMIN_TPL);
            $twig=new Twig_Environment($loader);
            $template=$twig->loadTemplate('menu.tmpl');
            $content=$template->render(array('url'=>$url));
        }
        catch (Exception $e){
            die('ERROR: '.$e->getMessage());
        }
        $title = "Админка";
    }
}
else{
    try{
        $admin=array('css'=>array('admin'=>STYLE_DIR.'admin.css',
                                'auth'=>STYLE_DIR.'auth.css'),
            'action'=>AUTH_DIR . 'auth.php');
        $loader = new Twig_Loader_Filesystem(AUTH_DIR);
        $twig=new Twig_Environment($loader);
        $template=$twig->loadTemplate('admin.tmpl');
        $content=$template->render(array('admin'=>$admin));
    }
    catch (Exception $e){
        die('ERROR: '.$e->getMessage());
    }
    $title = "Вход в админку";
}
?>
