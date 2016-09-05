<?php

include "models/DataBase.php";
$yil = mysql_real_escape_string($_POST['yil']);
$oy = mysql_real_escape_string($_POST['oy']);
$date1 = $yil . "-" . $oy . "-00";
$date2 = $yil . "-" . $oy . "-31";
$q = mysql_query("SELECT k.`id`,k.`client_ID`,k.`pasport_seriya`,k.`tavar_nomi`,k.`bahosi`,k.`oldindan_tolovi`,k.`muddati`,k.`sana`, k.`holati`, c.ismi,c.familiyasi,c.otasining_ismi FROM `contract` k INNER JOIN clients c on k.`client_ID`=c.id  WHERE k.`sana` > '$date1' AND k.`sana` <='$date2' AND k.`holati` = 1 ORDER BY k.`sana` ASC") or die(mysql_error());
$n = mysql_num_rows($q);
$summachiqim = 0;
for ($i = 0; $i < $n; $i++) {
    $j = $i + 1;
    $fio = mysql_result($q, $i, "familiyasi") . " " . mysql_result($q, $i, "ismi") . " " . mysql_result($q, $i, "otasining_ismi");
    $tavar = mysql_result($q, $i, "tavar_nomi");
    $sana = mysql_result($q, $i, "sana");
    $summa = mysql_result($q, $i, "bahosi");
    $summa1 = number_format($summa, 0, ",", " ");
    $summachiqim += $summa;
    $oldindantulovi = mysql_result($q, $i, "oldindan_tolovi");

    echo "<tr>
                    <td>$j</td>
                    <td>$fio</td>
                    <td>$tavar</td>
                    <td>$summa1</td>
                    <td>$sana</td>
                </tr>";
}
