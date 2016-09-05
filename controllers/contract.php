<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 12.08.2016
 * Time: 0:29
 */


if(isset($url[1]) && $url[1]=="client"){
    if(isset($url[3]) && $url[3]=="save"){
        include "models/contractsave.php";
    }
    else{
        include "views/contractanketa.php";
    }
}else{
    if(isset($url[1]) && $url[1]=="search"){
        include "views/contractsearch.php";

    }else{
        include "views/contract1.php";
    }
}