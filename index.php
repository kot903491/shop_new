<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 12:44
 */

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css" media="screen">
    <!--[if IE 9]>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/placeholder.js"></script>
    <![endif]-->
    <script type="text/javascript">''</script>
    <title>Комиксы!</title>
</head>
<body>
<div id="slideit">
    <!-- Open/close buttons -->
    <input id="open-item" name="forms" type="radio">
    <input id="close-item" name="forms" type="radio" checked="checked">
    <!-- Open label -->
    <label for="open-item" class="open">Напишите нам</label>
    <section>
        <!-- Close label -->
        <label for="close-item" class="close">×</label>
        <!-- Heading -->
        <span class="title">Напишите нам</span>
        <!-- Info text and form elements -->
        <div class="wrap">
            <!-- Info text -->
            <p class="info">Пишите нам в любое время!</p>
            <!-- Form -->
            <form name="contact" id="contact">
                <div class="field">
                    <select name="subject" id="subject" class="grayed" onclick="this.className=this.options[this.selectedIndex].className">
                        <option value="" selected="selected" disabled="disabled">Тема</option>
                        <option value="1">Вопрос о наличии комиксов</option>
                        <option value="2">Вопрос о доставке</option>
                        <option value="3">Предложения и пожелания</option>
                    </select>
                    <div id="select-arrow"></div>
                    <svg id="select-arrow-svg">
                    </svg><span class="tip">Выберите тему</span>
                </div>
                <div class="field">
                    <input name="name" placeholder="Имя" type="text" id="name" required>
                    <span class="tip">Введите ваше имя</span>
                </div>
                <div class="field">
                    <input name="email" placeholder="Email" type="email" id="email" required>
                    <span class="tip">Введите ваш email</span>
                </div>
                <div class="field">
                    <textarea name="message" placeholder="Сообщение" id="message" required></textarea>
                    <span class="tip">Ваше сообщение</span>
                </div>
                <input type="submit" value="Отправить" class="send" form="contact">
                <input type="reset" value="• Сброс" class="reset">
            </form>
        </div>
    </section>
</div>
<div id="container">
    <header>
        <div id="logo"><img src="img/logo.png" alt="Логотип"/></div>
        <div id="banner">Магазин комиксов</div>
        <nav>
            <a href="index.html">Главная</a>
            <a href="catalog.html">Каталог</a>
            <a href="contacts.html">О нас</a>
        </nav>
    </header>
    <div id="content">
        <h2>Топ комиксов этой недели</h2>
        <div id="images">
            <div class="image_bottom">
                <a href="goods1.html"><img src="img/bat-dv.jpg" alt="Картинка"></a>
            </div>
            <div class="image_bottom"><a href="goods2.html"><img src="img/ga-y1.jpg" alt="Картинка"></a></div>
            <div class="image_top"><a href="goods3.html"><img src="img/bat-rdk.jpg" alt="Картинка"></a></div>
        </div>
        <h3>Дорогие друзья!</h3>
        <p>Перед вами топ-3 комиксов недели.</p>
        <p>Эти, и многие другие комиксы вы можете приобрести в нашем магазине



    </div>

</div>
<footer><div class="social"><img src="icons/facebook-logo.svg" alt="facebook"><img src="icons/vk-social-logotype.svg" alt="vk">
        <img src="icons/google-plus-social-logotype.svg" alt="google"></div><br>
    <div class="social"><p>&copy; Все права защищены</p></div></footer>

</body>
</html>

