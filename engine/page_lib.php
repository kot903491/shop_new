<?php
/**
 * Created by PhpStorm.
 * User: Тимурка
 * Date: 01.11.2017
 * Time: 21:41
 */

class page_lib
{
    var $name;
    var $autor;
    var $paint;
    var $pages;
    var $price;
    var $publ_o;
    var $publ_l;
    var $pers;
    var $bind;
    var $s_desk;
    var $f_desk;
    var $b_img;
    var $s_img;

 function pageNew(){
     $mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname, SQL_PORT);
     if (!$mysqli){
         die($mysqli->errno." : ". $mysqli->error);
     }
     $res=$mysqli->query("SELECT * FROM publ_origin");
     while($result=$res->fetch_assoc()){
         $this->publ_o[]=$result;
     }
     $res=$mysqli->query("SELECT * FROM publ_local");
     while($result=$res->fetch_assoc()){
         $this->publ_l[]=$result;
     }
     $res=$mysqli->query("SELECT * FROM persons");
     while($result=$res->fetch_assoc()){
         $this->pers[]=$result;
     }
     $res=$mysqli->query("SELECT * FROM binding");
     while($result=$res->fetch_assoc()){
         $this->bind[] =$result;
     }
     $mysqli->close();
 }

 function addNew(){
     $mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname, SQL_PORT);
     $stmt=$mysqli->prepare("INSERT INTO product(name,autor,painter,pages,price) VALUES(?,?,?,?,?)");
     $stmt->bind_param('sssid',$this->name,$this->autor,$this->paint,$this->pages,$this->price);
     $stmt->execute();
     $i=$mysqli->query("SELECT LAST_INSERT_ID()");
     $i=$i->fetch_row();
     $i=$i[0];
     $stmt->close();
     $stmt=$mysqli->prepare("INSERT INTO publishing(id,id_publ_o,id_publ_l,id_bin) VALUES(?,?,?,?)");
     $stmt->bind_param('iiii',$i,$this->publ_o,$this->publ_l,$this->bind);
     $stmt->execute();
     $stmt->close();
     $stmt=$mysqli->prepare("INSERT INTO comics_char(id,id_pers) VALUES(?,?)");
     foreach ($this->pers as $value) {
         $value=(int)$value;
         $stmt->bind_param('ii', $i, $value);
         $stmt->execute();
     }
     $stmt->close();
     $type = explode(".", $_FILES['images']['name']);
     $b_img="CS_$i.".$type[1];
     $s_img="CS_".$i."_s.".$type[1];
     $b_path=GALLERY_DIR.$b_img;
     $s_path=GALLERY_DIR.$s_img;
     if (move_uploaded_file($_FILES['images']['tmp_name'], GALLERY_DIR.$b_img)) {
         create_thumb($b_path, $s_path, 180, 230);
         $this->b_img = $b_img;
         $this->s_img = $s_img;
         $stmt=$mysqli->prepare("INSERT INTO gallery(id,s_img,b_img) VALUES(?,?,?)");
         $stmt->bind_param('iss',$i,$this->s_img,$this->b_img);
         $stmt->execute();
     }
     $stmt->close();
     $stmt=$mysqli->prepare("INSERT INTO desk(id,s_desk,f_desk) VALUES(?,?,?)");
     $stmt->bind_param('iss',$i,$this->s_desk,$this->f_desk);
     $stmt->execute();
     $stmt->close();
     $mysqli->close();
 }

 function getPage($id){
     $mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname, SQL_PORT);

     $res=$mysqli->query("select product.name,product.autor,product.painter,product.pages,
product.price, desk.f_desk, gallery.b_img,binding.name as bind,
publ_origin.publ as publ_o,publ_local.publ as publ_l FROM product
inner join desk on desk.id=product.id
inner join gallery on gallery.id=product.id
inner join publishing on publishing.id=product.id
inner join publ_origin on publ_origin.id_publ=publishing.id_publ_o
inner join publ_local on publ_local.id_publ=publishing.id_publ_l
inner join binding on binding.id_bin=publishing.id_bin
where product.id=$id");
     $res=$res->fetch_assoc();
     $this->name=$res['name'];
     $this->autor=$res['autor'];
     $this->paint=$res['painter'];
     $this->pages=$res['pages'];
     $this->price=$res['price'];
     $this->publ_o=$res['publ_o'];
     $this->publ_l=$res['publ_l'];
     $this->bind=$res['bind'];
     $this->f_desk=$res['f_desk'];
     $this->b_img=$res['b_img'];
     $res=$mysqli->query("select persons.name from comics_char
inner join persons on persons.id_pers=comics_char.id_pers
where comics_char.id=$id");
     while($row=$res->fetch_assoc()){
         $this->pers[]=$row['name'];
     }
     $this->pers=implode(", ",$this->pers);
     $mysqli->close();
 }

    function editPage($id){
     $this->pageNew();
     $mysqli= new mysqli(SQL_SERVER,SQL_USER,SQL_PASS,dbname, SQL_PORT);
        $res=$mysqli->query("select product.name,product.autor,product.painter,product.pages,
product.price, desk.s_desk, desk.f_desk, gallery.b_img,binding.name as bind,
publ_origin.publ as publ_o,publ_local.publ as publ_l FROM product
inner join desk on desk.id=product.id
inner join gallery on gallery.id=product.id
inner join publishing on publishing.id=product.id
inner join publ_origin on publ_origin.id_publ=publishing.id_publ_o
inner join publ_local on publ_local.id_publ=publishing.id_publ_l
inner join binding on binding.id_bin=publishing.id_bin
where product.id=$id");
        $res=$res->fetch_assoc();
        $this->name=$res['name'];
        $this->autor=$res['autor'];
        $this->paint=$res['painter'];
        $this->pages=$res['pages'];
        $this->price=$res['price'];
        foreach($this->publ_o as $key=>$value){
            if($value['publ']==$res['publ_o']){
                $this->publ_o[$key]['ch']="checked";
            }
        }
        foreach($this->publ_l as $key=>$value){
            if($value['publ']==$res['publ_l']){
                $this->publ_l[$key]['ch']="checked";
            }
        }
        foreach($this->bind as $key=>$value){
            if($value['name']==$res['bind']){
                $this->bind[$key]['ch']="checked";
            }
        }
        $this->s_desk=$res['s_desk']=$res['s_desk'];
        $res['f_desk']=str_replace("</p><p>","\r\n",$res['f_desk']);
        $res['f_desk']=str_replace("</p>","",$res['f_desk']);
        $res['f_desk']=str_replace("<p>","",$res['f_desk']);
        $this->f_desk=$res['f_desk']=$res['f_desk'];
        $this->b_img=$res['b_img'];
        $res=$mysqli->query("select persons.id_pers from comics_char
inner join persons on persons.id_pers=comics_char.id_pers
where comics_char.id=$id");
        while($row=$res->fetch_assoc()){
            foreach ($this->pers as $key=>$value){
                if ($value['id_pers']==$row['id_pers']){
                    $this->pers[$key]['ch']="checked";
                }
            }
        }
        $mysqli->close();
    }
    function editProduct($id)
    {
        $mysqli = new mysqli(SQL_SERVER, SQL_USER, SQL_PASS, dbname, SQL_PORT);
        $stmt = $mysqli->prepare("UPDATE product set name=?,autor=?,painter=?,pages=?,price=? WHERE id=?");
        $stmt->bind_param('sssidi', $this->name, $this->autor, $this->paint, $this->pages, $this->price, $id);
        $stmt->execute();
        $stmt->close();
        $stmt = $mysqli->prepare("UPDATE publishing set id=?,id_publ_o=?,id_publ_l=?,id_bin=? WHERE id=?");
        $stmt->bind_param('iiiii', $i, $this->publ_o, $this->publ_l, $this->bind, $id);
        $stmt->execute();
        $stmt->close();
        $stmt = $mysqli->prepare("UPDATE comics_char set id=?,id_pers=? WHERE id=?");
        foreach ($this->pers as $value) {
            $value = (int)$value;
            $stmt->bind_param('iii', $i, $value, $id);
            $stmt->execute();
            $stmt->close();
        }
        $stmt=$mysqli->prepare("UPDATE desk set s_desk=?,f_desk=? WHERE id=?");
        $stmt->bind_param('ssi',$this->s_desk,$this->f_desk,$id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        if (isset($_FILES['images'])) {
            $type = explode(".", $_FILES['images']['name']);
            $b_img = "CS_$i." . $type[1];
            $s_img = "CS_" . $i . "_s." . $type[1];
            $b_path = GALLERY_DIR . $b_img;
            $s_path = GALLERY_DIR . $s_img;
            if (move_uploaded_file($_FILES['images']['tmp_name'], GALLERY_DIR . $b_img)) {
                create_thumb($b_path, $s_path, 180, 230);
            }
        }
    }
}