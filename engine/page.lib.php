<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 02.11.2017
 * Time: 20:18
 */
if ($_GET['id']!=''){
    require_once LIB_DIR."page_lib.php";
    $getPage = new page_lib();
    $id=(int)htmlspecialchars(strip_tags($_GET['id']));
    $getPage->getPage($id);
    try{
        $loader = new Twig_Loader_Filesystem(TPL_DIR);
        $twig=new Twig_Environment($loader);
        $template=$twig->loadTemplate('goods.tmpl');
        $content=$template->render(array('page'=>$getPage,
            'id'=>$id));
    }
    catch (Exception $e){
        die('ERROR: '.$e->getMessage());
    }
    $title=$getPage->name;
}
else{
    $page=TPL_DIR."page_error.php";
}