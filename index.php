<?php
@session_start();


include "models/const.php";
include "models/libs.php";
//include "views/shablon.php";
$url = isset($_GET['url']) ? $_GET['url'] : "index";
$url = rtrim($url, '/');
$url = explode('/', $url);

if(isset($_SESSION['let']) && $_SESSION['let']=="yes") {
    include "views/navbar.php";
    include "views/sidebar.php";
    if($url[0]=="login"){
        include "controllers/index.php";
    }else{
        include "controllers/".$url[0] . ".php";
    }
    include "views/footer.php";
}else{
        include "controllers/login.php";
}
?>