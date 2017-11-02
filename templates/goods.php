<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 23:40
 */



?>
<div id="content">
<div id="cover"><img src="<?=GALLERY_DIR.$getPage->b_img;?>" alt="<?=$getPage->name;?>"></div>
<h1><?=$getPage->name;?></h1>
    <div id="nal">
        <p>Есть в наличии</p>
        <p>Цена: <?=$getPage->price;?>тг</p>
        <p>Доставка по городу бесплатно</p></div>

    <div class="tabs">
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1" title="Описание">Описание</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2" title="Характеристики">Характеристики</label>

        <input id="tab3" type="radio" name="tabs">
        <label for="tab3" title="Отзывы">Отзывы</label>

        <section id="content-tab1">
            <?=$getPage->f_desk;?>
        </section>
        <section id="content-tab2">
            <table>
                <tr><td><li>Издательство:</li></td> <td><?=$getPage->publ_o.", ";$getPage->publ_l?></td></tr>
                <tr><td><li>Художник:</li></td><td><?=$getPage->paint;?></td></tr>
                <tr><td><li>Персонажи:</li></td><td><?=$getPage->pers;?></td></tr>
                <tr><td><li>Стр.:</li></td> <td><?=$getPage->pages;?></td></tr>
                <tr>
                    <td><li>Переплет:</li> <td><?=$getPage->bind;?></td></tr>
                <tr><td><li>Автор/Сценарист:</li></td> <td><?=$getPage->autor;?></td></tr>
            </table>
        </section>
    </div>
</div>