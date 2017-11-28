<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 23:43
 */

if (!isset($_GET['page']) || !isset($_GET['id'])){
    include_once TPL_DIR."page_error.php";
}