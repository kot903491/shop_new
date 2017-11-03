<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 03.11.2017
 * Time: 12:54
 */
if ($_POST['login']!="name@example.com" && $_POST['password']!=""){
    require_once "../../../models/auth_config.php";
    $login=htmlspecialchars(strip_tags($_POST['login']));
    $pass=$_POST['password'];
    $db_pass=md5($pass).sult_admin;

    $mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname, SQL_PORT);
    $res=$mysqli->query("INSERT INTO users(login, password) values('$login','$db_pass')");
    if($res){
        echo "регистрация успешна";
    }
    else{
        echo $mysqli->errno.": ".$mysqli->error."<br> Не удалось зарегестрировать пользователя";
    }
    $mysqli->close();
}