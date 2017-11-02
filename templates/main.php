<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 21:17
 */
include_once LIB_DIR."main.lib.php";
?>

<div id="content">
    <h2>Топ комиксов этой недели</h2>
    <div id="images">
        <? foreach($result as $value) : ?>
        <div class="<?=$value['style'];?>">
            <a href="index.php?page=product&id=<?=$value['id'];?>"><img src="<?=GALLERY_DIR.$value['b_img'];?>" alt="<?=$value['name'];?>"></a>
        </div>
        <?endforeach;?>
    </div>
    <h3>Дорогие друзья!</h3>
    <p>Перед вами топ-3 комиксов недели.</p>
    <p>Эти, и многие другие комиксы вы можете приобрести в нашем магазине
</div>
