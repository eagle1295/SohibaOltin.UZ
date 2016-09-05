

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Qidiruv</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>


<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 12.08.2016
 * Time: 0:48
 */
include "models/DataBase.php";
$v1=mysql_real_escape_string($_POST['v1']);
$v2=mysql_real_escape_string($_POST['v2']);
$v3=mysql_real_escape_string($_POST['v3']);
if(empty($v1) && empty($v2) && empty($v3)){
    //echo "<script>window.location='".URL."contract/'</script>";
}else{
    $sql="SELECT *  FROM `clients` WHERE  ";
    if(!empty($v1)){
        $sql=$sql." `ismi` LIKE \"$v1\" AND";
    }
    if(!empty($v2)){
        $sql=$sql."`familiyasi` LIKE \"$v2\" AND";
    }
    if(!empty($v3)){
        $sql=$sql."`tugilgan_sana` LIKE \"$v3\" AND";
    }
    $q=mysql_query($sql." 1=1;") or die("ERROR");
    $num=mysql_num_rows($q);
    for($i=0; $i<$num; $i++){
        $id=mysql_result($q,$i,"id");
        $fio=mysql_result($q,$i,"familiyasi")." ".mysql_result($q,$i,"ismi")." ".mysql_result($q,$i,"otasining_ismi")." ".mysql_result($q,$i,"tugilgan_sana");
        echo "<tr>
                <th style='width: 10px'>#</th>
                <th>$fio</th>
                <th><a href='".URL."contract/client/$id/'><button class='btn btn-success'><span class='glyphicon glyphicon-user'></span> Shartnoma tuzish</button></a></th>
              </tr>";
    }
}


?>

</tbody>
            </table>
        </div>
    </div>