<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 07.11.2017
 * Time: 18:24
 */?>
<div id="content_black">
    <p><?=$msg;?></p>
    <div id="baskettable">
    </div>
    <form id="bas" method="POST">
    <p>Введите имя</p>
    <input type="text" name="name" required>
    <p>Введите телефон в формате</p>
    <input type="tel" pattern="+[0-9]" name="tel" required>
    <p>Введите email</p>
    <input type="email" name="email">
    <p>Введите адрес</p>
    <textarea rows="4" cols="21" name="address" required></textarea><br>
    <input type="submit" name="submit" value="Оформить заказ">
    </form>
</div>
