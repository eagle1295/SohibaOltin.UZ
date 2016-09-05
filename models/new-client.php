<?php
/**
 * Created by PhpStorm.
 * User: Ollobergan
 * Date: 02.08.2016
 * Time: 10:25
 */
$v1=mysql_real_escape_string($_POST['v1']);
$v11=$v1[0];
$v2=mysql_real_escape_string($_POST['v2']);
$v22=$v2[0];
$v3=mysql_real_escape_string($_POST['v3']);
$v33=$v3[0];
$v4=mysql_real_escape_string($_POST['v4']);
$v5=mysql_real_escape_string($_POST['v5']);

$sql1="SELECT *  FROM `clients` WHERE `ismi` LIKE '$v11%' AND `familiyasi` LIKE '$v22%' AND `otasining_ismi` LIKE '$v33%'";
$q1=mysql_query($sql1) or die("Error!");
$num1=mysql_num_rows($q1);
if($num1!=0) {
    ?>
    <div class="box box-info">
        <div class="box-header with-border " style="font-size: 35px;">
            <b class="box-title text-danger">Siz kiritgan haridor quyidagilardan biri emasmi?</b>
        </div>
        <table class="table table-bordered">
            <tr>
                <td>¹</td>
                <td>F.I.O</td>
                <td>Tug'ilgan sana</td>
                <td>Tug'ilgan joyi</td>
                <td>Tasdiqlash</td>
            </tr>

            <?php
            for ($i = 0; $i < $num1; $i++) {
                $j = $i + 1;
                $vv1 = mysql_result($q1, 0, 'ismi');
                $vv2 = mysql_result($q1, 0, 'familiyasi');
                $vv3 = mysql_result($q1, 0, 'otasining_ismi');
                $vv4 = mysql_result($q1, 0, 'tugilgan_sana');
                $vv5 = mysql_result($q1, 0, 'tugilgan_joyi');
                $user_id = mysql_result($q1, 0, 'id');
                similar_text($v1, $vv1, $percent1);
                similar_text($v2, $vv2, $percent2);
                similar_text($v3, $vv3, $percent3);
                // echo $percent2;
                if (($percent1 > 85) && ($percent2 > 85) && ($percent3 > 85)) {
                    echo "
            <tr>
                <td>$j</td>
                <td>$vv1 $vv2 $vv3</td>
                <td>$vv4</td>
                <td>$vv5</td>
                <td><a href='" . URL . "client-profil/$user_id" . "'><button class='btn btn-success'><span class='glyphicon glyphicon-user'></span> Tasdiqlash</button></a></td>
            </tr>

        ";
                }
            }
            ?>
        </table>
        <div class="text-center">
            <a href="<?php echo URL."models/new-client2.php?v1=$v1&v2=$v2&v3=$v3&v4=$v4&v5=$v5"?>"><button class="btn btn-primary"><span class='glyphicon glyphicon-zoom-in'></span> Yo'q buler emas!</button></a>
        </div>
        <br>
    </div>

    <?php
}
else{
    ?>
    <script>
        window.location='<?php echo URL."models/new-client2.php?v1=$v1&v2=$v2&v3=$v3&v4=$v4&v5=$v5"?>'
    </script>

    <?php
}
?>



