<?php
include "models/DataBase.php";
$id=mysql_real_escape_string($url[1]);
$q=mysql_query("SELECT *  FROM `clients` WHERE `id` = $id") or die("ERROR");
$v[1]=mysql_result($q,0,"ismi");
$v[2]=mysql_result($q,0,"familiyasi");
$v[3]=mysql_result($q,0,"otasining_ismi");
$v[4]=mysql_result($q,0,"tugilgan_sana");
$v[5]=mysql_result($q,0,"tugilgan_joyi");
if(isset($url[2]) && $url[2]=="addmoney"){
    include "models/addmoney.php";
}
if(isset($url[2]) && $url[2]=="close-cantract"){
    include "models/close-cantract.php";}
if(isset($url[2]) && ($url[2]=="all" || $url[2]=="closed")){
    include "views/client-profil2.php";
}else{
    include "views/client-profil.php";
}

