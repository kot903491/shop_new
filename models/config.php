<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 31.10.2017
 * Time: 22:47
 */
define("_DS", DIRECTORY_SEPARATOR);
define("SITE_ROOT", ".."._DS);
define("SITE_DIR",SITE_ROOT."public"._DS);

define("SQL_SERVER","localhost");
define("SQL_USER","root");
define("SQL_PASS","12345");
define("SQL_PORT","3306");
define("dbname","comics_shop");

define("GALLERY_DIR", SITE_ROOT . "data"._DS);
define("LIB_DIR", SITE_ROOT . "engine"._DS);
define("TPL_DIR", SITE_ROOT . "templates"._DS);
define("STYLE_DIR",SITE_DIR."style"._DS);
define("STYLE_IMG",STYLE_DIR."img"._DS);
define("STYLE_ICO",STYLE_DIR."icons"._DS);
define("ADMIN_DIR",TPL_DIR."admin"._DS);
define("ADMIN_TPL",ADMIN_DIR."tpl"._DS);