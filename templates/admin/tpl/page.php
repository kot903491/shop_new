<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 19:48
 */

//require_once LIB_DIR."add_page.lib.php";
?>

<div id="content">
<div class="form-bg">
    <form enctype="multipart/form-data" method="post">
        <p><input type="text" name="name" placeholder="Введите название" required></p>
        <p><input type="text" name="autor" placeholder="Укажите автора" required></p>
        <p><input type="text" name="paint" placeholder="Укажите художника" required></p>
        Количество страниц <input type="number" min="0" name="pages"> Цена <input type="number" step="0.01" min="0" name="price" required>
        <h4>Укажите  издательство оригинала</h4>
        <?foreach ($check->publ_o as $value) : ?>
            <div>
                <label>
                    <input type="radio" required name="publ_o" value="<?=$value['id_publ'];?>"><?=$value['publ'];?>
                </label>
            </div>
        <? endforeach;?>
        <h4>Укажите  издательство локализации</h4>
        <?foreach ($check->publ_l as $value) : ?>
            <div>
                <label>
                    <input type="radio" required name="publ_l" value="<?=$value['id_publ'];?>"><?=$value['publ'];?>
                </label>
            </div>
        <? endforeach;?>

        <h4>Укажите тип переплета</h4>
        <?foreach ($check->bind as $value) : ?>
            <div>
                <label>
                <input type="radio" name="bind" required value="<?=$value['id_bin'];?>"><?=$value['name'];?>
            </label>
            </div>
        <? endforeach;?>


        <h4>Укажите  героев</h4>
        <?foreach ($check->pers as $value) : ?>
            <div>
            <label>
                <input type="checkbox" name="pers[]" value="<?=$value['id_pers'];?>"><?=$value['name'];?>
            </label>
            </div>
        <? endforeach;?>

        <p><textarea rows="3" name="s_desk" placeholder="Введите краткое описание для каталога" required></textarea></p>
        <p><textarea rows="25" name="f_desk" placeholder="Введите полное описание для страницы" required></textarea></p>

        <h4>Загрузите изображение</h4>
        <input type="file" name="images" accept="image/*" required>

        <input type="submit" name="submit"><input type="reset">
        <form>
</div>
</div>