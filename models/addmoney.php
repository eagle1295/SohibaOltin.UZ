<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 21.10.2016
 * Time: 21:33
 */
include "models/DataBase.php";
$m_paytype=mysql_real_escape_string($_POST['paytype']);
$m_contractid=mysql_real_escape_string($_POST['contractid']);
$m_summa=mysql_real_escape_string($_POST['summa']);


if(isset($_POST['check']) && $_POST['check']=="on"){
    $m_summa=str_replace(" ","",$m_summa);
    mysql_query("INSERT INTO `payment` (`id`, `contract_ID`, `summa`, `sana`, `turi`) VALUES (NULL, \"$m_contractid\", \"$m_summa\", CURRENT_DATE(), \"$m_paytype\");") or die(mysql_error());
}else{

}

echo "<script>window.location='".URL."client-profil/".$url[1]."'</script>";
