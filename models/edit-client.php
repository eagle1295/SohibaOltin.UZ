<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 03.08.2016
 * Time: 22:52
 */
$id=mysql_real_escape_string($_POST['id']);
$v1=mysql_real_escape_string($_POST['v1']);
$v2=mysql_real_escape_string($_POST['v2']);
$v3=mysql_real_escape_string($_POST['v3']);
$v4=mysql_real_escape_string($_POST['v4']);
$v5=mysql_real_escape_string($_POST['v5']);

mysql_query("UPDATE `clients` SET `ismi` = \"$v1\", `familiyasi` = \"$v2\", `otasining_ismi` = \"$v3\", `tugilgan_sana` = \"$v4\", `tugilgan_joyi` = \"$v5\" WHERE `id` = $id;") or die("ERROR");

echo "<script>window.location='".URL."client-profil/$id'</script>";