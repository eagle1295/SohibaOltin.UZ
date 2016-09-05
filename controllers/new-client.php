<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 02.08.2016
 * Time: 10:17
 */
if(isset($url[1]) && $url[1]=="run"){
    include "models/DataBase.php";
    include "models/new-client.php";
}else{
    include "views/new-client.php";

}
