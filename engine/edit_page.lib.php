<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 05.11.2017
 * Time: 21:04
 */

require_once "page_lib.php";
if($_GET['page']=='edit' && isset($_GET['id']) && isset($_POST['submit'])){
    $id=(int)htmlspecialchars(strip_tags($_GET['id']));
    $product=new page_lib();
    $product = new page_lib();
    $product->name = htmlspecialchars(strip_tags($_POST['name']));
    $product->autor = htmlspecialchars(strip_tags($_POST['autor']));
    $product->paint = htmlspecialchars(strip_tags($_POST['paint']));
    $product->pages = (int)htmlspecialchars(strip_tags($_POST['pages']));
    $product->price = (int)htmlspecialchars(strip_tags($_POST['price']));
    $product->publ_o = (int)htmlspecialchars(strip_tags($_POST['publ_o']));
    $product->publ_l = (int)htmlspecialchars(strip_tags($_POST['publ_l']));
    $product->bind = (int)htmlspecialchars(strip_tags($_POST['bind']));
    $product->pers = $_POST['pers'];
    $product->s_desk = htmlspecialchars(strip_tags($_POST['s_desk']));
    $str_desk = htmlspecialchars(strip_tags($_POST['f_desk']));
    $str_desk = str_replace("\r\n", "</p><p>", $str_desk);
    $product->f_desk = "<p>$str_desk</p>";
    $product->editProduct($id);
    header("location: ".$_SERVER['REQUEST_URI']);
}
elseif($_GET['page']=='edit' && isset($_GET['id'])){
    $id=(int)htmlspecialchars(strip_tags($_GET['id']));
    $check=new page_lib();
    $check->editPage($id);
    try{
        $loader = new Twig_Loader_Filesystem(ADMIN_TPL);
        $twig=new Twig_Environment($loader);
        $template=$twig->loadTemplate('page.tmpl');
        $content=$template->render(array('check'=>$check));
    }
    catch (Exception $e){
        die('ERROR: '.$e->getMessage());
    }
}