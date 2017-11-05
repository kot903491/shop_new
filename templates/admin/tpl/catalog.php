<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 18:48
 */
?>
<div id="content">
    <? foreach ($result as $value) : ;?>
        <div class="desc_a">
            <h3><?=$value['name'];?></h3>
            <div class="cat_img_a"><img src="<?="/".GALLERY_DIR.$value['s_img'];?>"></div>
            <p><?=$value['s_desk'];?></p>
            <div class="link_a"><a href="<?=str_replace("catalog","edit",$_SERVER["REQUEST_URI"])."&id=$value[id]";?>">Редактировать</a></div>
            <div class="link_a"><a href="<?=$_SERVER["REQUEST_URI"]."&act=delete&id=$value[id]";?>">Удалить</a></div>
        </div>
    <? endforeach;?>
</div>