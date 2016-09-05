<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 02.08.2016
 * Time: 12:13
 */
include "const.php";
include "DataBase.php";

$v1 = mysql_real_escape_string($_GET['v1']);
$v2 = mysql_real_escape_string($_GET['v2']);
$v3 = mysql_real_escape_string($_GET['v3']);
$v4 = mysql_real_escape_string($_GET['v4']);
$v5 = mysql_real_escape_string($_GET['v5']);

mysql_query("INSERT INTO `oltinsohiba`.`clients` (`id`, `ismi`, `familiyasi`, `otasining_ismi`, `tugilgan_sana`, `tugilgan_joyi`) VALUES (NULL, \"$v1\", \"$v2\", \"$v3\", \"$v4\", \"$v5\");") or die("ERROR");

$q = mysql_query("SELECT * FROM  `clients` WHERE  `ismi` LIKE  \"$v1\" AND  `familiyasi` LIKE  \"$v2\" AND  `otasining_ismi` LIKE  \"$v3\" AND  `tugilgan_sana` LIKE  \"$v4\" AND  `tugilgan_joyi` LIKE  \"$v5\"");
$id = mysql_result($q, 0, "id");
echo "<script>window.location='" . URL . "client-profil/$id'</script>";
