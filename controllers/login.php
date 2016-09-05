<?php
@session_start();

/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 31.07.2016
 * Time: 19:52
 */

if(isset($url[1]) && $url[1]=="run"){
    include "models/DataBase.php";
    include "models/login.php";
}else{
    include "views/login.php";
}

?>

