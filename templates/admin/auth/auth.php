<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 03.11.2017
 * Time: 13:37
 */
require_once "../../../models/auth_config.php";
$login=htmlspecialchars(strip_tags($_POST['login']));
$mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname, SQL_PORT);
$res=$mysqli->query("SELECT password FROM users WHERE login='$login'");
if($res){
    $db_pass=$res->fetch_assoc();
    if($db_pass['password'] == md5($_POST['password']).sult_admin){
        setcookie('auth_name',$login,time()+(3600),'/');
        setcookie('hash',sult_cookie,time()+(3600),'/');
        header("Refresh: 5; /index.php?timurka=kot903491&kot903491=timurka");
        $str="Авторизация успешна. Вы будете перенаправлены через 5 секунд";
    }
    else{
        $str="Неверный логин или пароль. Попробуйте еще раз через 5 секунд";
    }
}
else{
    $str="Неверный или пароль логин. Попробуйте еще раз через 5 секунд";
}
header("Refresh: 5; /index.php?timurka=kot903491&kot903491=timurka");
echo $str;