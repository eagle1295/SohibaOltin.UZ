<?php
$cantract_id = $url[3];
$id = $url[1];
mysql_query("UPDATE `contract` SET `tugash_sana` = CURRENT_DATE(), `holati` = '2' WHERE `contract`.`id` = $cantract_id;") or die(mysql_error());
echo "<script>window.location='" . URL . "client-profil/$id'</script>";