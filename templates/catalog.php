<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 0:42
 */
require_once LIB_DIR."catalog.lib.php";

?>
<div id="content">
    <? foreach ($result as $value) : ;?>
    <div class="desc">
        <h3><?=$value['name'];?></h3>
    <div class="cat_img"><img src="<?="/".GALLERY_DIR.$value['s_img'];?>"></div>
        <p><?=$value['s_desk'];?></p>
        <div class="link"><a href="?page=product&id=<?=$value['id'];?>">Подробнее...</a></div>
    </div>
    <? endforeach;?>
</div>
