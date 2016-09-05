<?php $yil=mysql_real_escape_string($_POST['yil']);
$oy=mysql_real_escape_string($_POST['oy']);
switch($oy){
    case 1 : $oynom="Yanvar";break;
    case 2 : $oynom="Fevral";break;
    case 3 : $oynom="Mart";break;
    case 4 : $oynom="Aprel";break;
    case 5 : $oynom="May";break;
    case 6 : $oynom="Iyun";break;
    case 7 : $oynom="Iyul";break;
    case 8 : $oynom="August";break;
    case 9 : $oynom="Sentabr";break;
    case 10 : $oynom="Oktyabr";break;
    case 11 : $oynom="Noyabr";break;
    case 12 : $oynom="Dekabr";break;
}
?>

<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-9 thumbnail">
        <h2 class="text-center"><?php echo $yil."-yil $oynom oyi boyicha hisobot"?></h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>F.I.O</td>
                    <td>Tavar</td>
                    <td>Summa(so'm)</td>
                    <td>Sana</td>

                </tr>
            </thead>
        <?php include"models/chiqim.php";?>
        </table>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $n;?> ta</h3>
                <p>Shartnoma</p>
            </div>
            <div class="icon" style="padding: 20px;">
                <i class="glyphicon glyphicon-briefcase"></i>
            </div>
        </div>
        <div class="small-box bg-aqua">
            <div class="inner">
                <h2><?php echo number_format($summachiqim,0,","," "); ?> so'm</h2>
                <h3>Chiqim</h3>
            </div>
        </div>
    </div>
</div>