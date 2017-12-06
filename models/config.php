<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 22:47
 */
define('_DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', '..'._DS);
define('SITE_DIR',SITE_ROOT.'public'._DS);

define('SQL_SERVER','localhost');
define('SQL_USER','root');
define('SQL_PASS','12345');
define('SQL_PORT','3306');
define('dbname','comics_shop');

define('GALLERY_DIR', SITE_ROOT . 'data'._DS);
define('LIB_DIR', SITE_ROOT . 'lib'._DS);
define('JS_DIR', SITE_ROOT . 'js'._DS);
define('CLASS_DIR',SITE_ROOT.'classes'._DS);
define('TWIG_DIR',SITE_ROOT.'lib'._DS.'Twig'._DS);
define('TPL_DIR', SITE_ROOT . 'templates'._DS);
define('STYLE_DIR',SITE_DIR.'style'._DS);
define('STYLE_IMG',STYLE_DIR.'img'._DS);
define('STYLE_ICO',STYLE_DIR.'icons'._DS);
define('ADMIN_DIR',TPL_DIR.'admin'._DS);
define('ADMIN_TPL',ADMIN_DIR.'tpl'._DS);
define('AUTH_DIR',ADMIN_DIR.'auth'._DS);
define('sult_cookie','cvfjee59889eg7h43wglujuj8ijhrt4frui8o');
date_default_timezone_set('Asia/Aqtobe');
$style=array(
    'fb'=>STYLE_ICO.'facebook-logo.svg',
    'gp'=>STYLE_ICO.'google-plus-social-logotype.svg',
    'vk'=>STYLE_ICO.'vk-social-logotype.svg',
    'logo'=>STYLE_IMG.'logo.png',
    'placeholder'=>STYLE_ICO.'placeholder.svg',
    'envelope'=>STYLE_ICO.'envelope.svg',
    'phone'=>STYLE_ICO.'phone-call.svg');

$ajax=array('jquery'=>'<script src="'.JS_DIR.'jquery.js"></script>',
    'basket_func'=>'<script src="'.JS_DIR.'basket.js"></script>',
    'review_func'=>'<script src="'.JS_DIR.'review.js"></script>',
    'catalog_func'=>'<script src="'.JS_DIR.'catalog.js"></script>');
$basket_view=true;
$review=false;
$catalog=false;

$data=array('title'=>$title,
    'footer'=>'footer.tmpl',
    'header'=>'header.tmpl',
    'style'=>$style,
    'ajax'=>$ajax,
    'content'=>$content,
    'basket_view'=>$basket_view,
    'review'=>$review,
    'catalog'=>$catalog);


