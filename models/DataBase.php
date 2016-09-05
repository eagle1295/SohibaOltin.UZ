<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 31.07.2016
 * Time: 11:41
 */

$con = mysql_connect('localhost', 'root', '');
$db = mysql_select_db("oltinsohiba", $con);
if (!$con || !$db) {
    die("Baza bilan bo'glanishda xatolik: " . mysql_error());
}