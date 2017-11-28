<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 21:36
 */
require_once "page_lib.php";
if ($_GET['page']=="add"){
    if (!isset($_POST['submit'])) {
        if (!isset($_GET['id'])) {
            $check = new page_lib();
            $check->pageNew();
            $title = "Админка-добавление";
            $req="requared";
            try{
                $loader = new Twig_Loader_Filesystem(ADMIN_TPL);
                $twig=new Twig_Environment($loader);
                $template=$twig->loadTemplate('page.tmpl');
                $content=$template->render(array('check'=>$check,
                    'req'=>$req));
            }
            catch (Exception $e){
                die('ERROR: '.$e->getMessage());
            }
        }
    }
    else {
        if (isset($_FILES['images'])) {
            $product = new page_lib();
            $product->name = htmlspecialchars(strip_tags($_POST['name']));
            $product->autor = htmlspecialchars(strip_tags($_POST['autor']));
            $product->paint = htmlspecialchars(strip_tags($_POST['paint']));
            $product->pages = (int)htmlspecialchars(strip_tags($_POST['pages']));
            $product->price = (int)htmlspecialchars(strip_tags($_POST['price']));
            $product->publ_o = (int)htmlspecialchars(strip_tags($_POST['publ_o']));
            $product->publ_l = (int)htmlspecialchars(strip_tags($_POST['publ_l']));
            $product->bind = (int)htmlspecialchars(strip_tags($_POST['bind']));
            $product->pers = $_POST['pers'];
            $product->s_desk = htmlspecialchars(strip_tags($_POST['s_desk']));
            $str_desk = htmlspecialchars(strip_tags($_POST['f_desk']));
            $str_desk = str_replace("\r\n", "</p><p>", $str_desk);
            $product->f_desk = "<p>$str_desk</p>";
            $product->addNew();
            header("Location:" . $_SERVER['REQUEST_URI']);
        }
    }
}

function create_thumb($path, $save, $width, $height) {
    $info = getimagesize($path); //получаем размеры картинки и ее тип
    $size = array($info[0], $info[1]); //закидываем размеры в массив
//В зависимости от расширения картинки вызываем соответствующую функцию
    if ($info['mime'] == 'image/png') {
        $src = imagecreatefrompng($path); //создаём новое изображение из файла
    } else if ($info['mime'] == 'image/jpeg') {
        $src = imagecreatefromjpeg($path);
    } else if ($info['mime'] == 'image/gif') {
        $src = imagecreatefromgif($path);
    } else {
        return false;
    }
    $thumb = imagecreatetruecolor($width, $height); //возвращает идентификатор изображения, представляющий черное изображение заданного размера
    $src_aspect = $size[0] / $size[1]; //отношение ширины к высоте исходника
    $thumb_aspect = $width / $height; //отношение ширины к высоте аватарки
    if($src_aspect < $thumb_aspect) {
//узкий вариант (фиксированная ширина)
        $scale = $width / $size[0];
        $new_size = array($width, $width / $src_aspect);
        $src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2);
//Ищем расстояние по высоте от края картинки до начала картины после обрезки
    }
    else if ($src_aspect > $thumb_aspect) {
//широкий вариант (фиксированная высота)
        $scale = $height / $size[1];
        $new_size = array($height * $src_aspect, $height);
        $src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0); //Ищем расстояние по ширине от края картинки до начала картины после обрезки
    } else {
//другое
        $new_size = array($width, $height);
        $src_pos = array(0,0);
    }
    $new_size[0] = max($new_size[0], 1);
    $new_size[1] = max($new_size[1], 1);
    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
//Копирование и изменение размера изображения с ресемплированием

    if($save === false) {
        return imagepng($thumb); //Выводит JPEG/PNG/GIF изображение
    } else {
        return imagepng($thumb, $save);//Сохраняет JPEG/PNG/GIF изображение
    }
}