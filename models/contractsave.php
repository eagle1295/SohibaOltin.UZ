<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 20.08.2016
 * Time: 11:36
 */
include "models/DataBase.php";
$cid=mysql_real_escape_string($_POST['cid']);
$c1=mysql_real_escape_string($_POST['c1']);
$c2=mysql_real_escape_string($_POST['c2']);
$c3=str_replace(" ","", mysql_real_escape_string($_POST['c3']));
$c4=str_replace(" ","", mysql_real_escape_string($_POST['c4']));
$c5=mysql_real_escape_string($_POST['c5']);
$c6=mysql_real_escape_string($_POST['c6']);
$c7=mysql_real_escape_string($_POST['c7']);

mysql_query("INSERT INTO `contract` (`id`, `client_ID`, `pasport_seriya`, `tavar_nomi`, `bahosi`, `oldindan_tolovi`, `muddati`, `sana`, `tel1`, `tel2`, `holati`) VALUES (NULL, \"$cid\", \"$c1\",  \"$c2\", \"$c3\", \"$c4\", \"$c5\", CURDATE(), \"$c6\", \"$c7\", \"1\");") or die(mysql_error());

echo "<script>window.location='".URL."client-profil/$cid'</script>";