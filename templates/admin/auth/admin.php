<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 03.11.2017
 * Time: 11:36
 */

?>
<link rel="stylesheet" href="<?=STYLE_DIR;?>admin.css">
<div id="content_black">
    <div id="auth">
        <link rel="stylesheet" href="<?=STYLE_DIR;?>auth.css">
    <form method="post" class="login" action="<?=AUTH_DIR . "auth.php";?>">
        <p>
            <label for="login">Логин:</label>
            <input type="text" name="login" id="login" value="name@example.com" required>
        </p>

        <p>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" value="4815162342"required>
        </p>

        <p class="login-submit">
            <button type="submit" class="login-button">Войти</button>
        </p>
    </form>
    </div>

</div>
