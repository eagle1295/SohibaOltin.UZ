<div class="invoice" style="background-color: rgba(0, 255, 4, 0.28);" xmlns="http://www.w3.org/1999/html">
    <div class="thumbnail row" style="margin: 15px; padding: 5px; font-size: 25px;">

        <div class="col-md-6">
            <strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFamiliyasi:&nbsp</strong><?php echo $v[2];?><hr>
            <strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIsmi:&nbsp</strong><?php echo $v[1];?><hr>
            <strong>Otasining ismi:&nbsp</strong><?php echo $v[3];?><hr>
        </div>
        <div class="col-md-6">
            <strong>Tug'ilsan sanasi:&nbsp</strong><?php echo $v[4];?><hr>
            <strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTug'ilgan joyi:&nbsp</strong><?php echo $v[5];?><hr>
            <div class="text-right"><a href="<?php echo URL."edit-client/$id"?>"><button class="btn btn-primary" style=" box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-wrench"></span> Tuzatish</button></a><hr></div>
        </div>
    </div>
    <div class="thumbnail" style="margin: 15px; padding: 5px;">
        <div>
            <a href="<?php echo URL."contract/client/$id/";?>"><button  class="btn btn-primary btn-shadow" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-plus"> </span> Yangi shartnoma</button></a>&nbsp&nbsp
            <a href="<?php echo URL."client-profil/$id/active";?>"><button class="btn btn-info disabled" style="margin: 5px;"><span class="glyphicon glyphicon-folder-open"> </span> Amaldagi shartnomalari</button></a>&nbsp&nbsp
            <a href="<?php echo URL."client-profil/$id/closed";?>"><button  class="btn btn-success" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-folder-close"> </span> Tugagan shartnomalari</button></a>&nbsp&nbsp
            <a href="<?php echo URL."client-profil/$id/all";?>"><button  class="btn  btn-yahoo" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-briefcase"> </span> Barcha shartnomalari</button></a>&nbsp&nbsp
        </div>
        <br>
        <?php
        //contractlarni chaqirish
        $qc=mysql_query("SELECT *  FROM `contract` WHERE `client_ID` = $id and `holati`=1 ORDER BY `contract`.`sana` ASC") or die("Error");
        $nc=mysql_num_rows($qc);
        if($nc!=0){
        echo"<h1 class='text-center'>Amaldagi shartnomalar: $nc ta</h1>";
        for($i=0; $i<$nc; $i++){
            $cc[1]=mysql_result($qc,$i,"id");
            $cc[2]=mysql_result($qc,$i,"client_ID");
            $cc[3]=mysql_result($qc,$i,"pasport_seriya");
            $cc[4]=mysql_result($qc,$i,"tavar_nomi");
            $cc[5]=mysql_result($qc,$i,"bahosi");
            $cc[6]=mysql_result($qc,$i,"oldindan_tolovi");
            $cc[7]=mysql_result($qc,$i,"muddati");
            $cc[8]=mysql_result($qc,$i,"sana");
            $cc[9]=mysql_result($qc,$i,"tel1");
            $cc[10]=mysql_result($qc,$i,"tel2");

            $datetest = rtrim($cc[8], '-');
            $datetest = explode('-', $datetest);
            ?>
            <div class=" " style="padding: 5px; margin: 1px; font-size: 20px; background-color: rgba(187, 175, 35, 0.72);">
                <div class="row" style="margin: 1px;">
                    <div class="col-md-5 thumbnail" style="margin: 10px; padding: 10px;">
                        <strong>Shartnoma nomeri:&nbsp</strong><?php echo $cc[1];?><hr>
                        <strong>Tavar nomi:&nbsp</strong><?php  echo $cc[4];?><hr>
                        <strong>Tavar bahosi:&nbsp</strong><?php  echo number_format($cc[5], 0, ',', ' ');?> so'm<hr>
                        <strong>Oldindan to'lovi:&nbsp</strong><?php  echo number_format($cc[6], 0, ',', ' ');?> so'm<hr>
                        <strong>Muddati:&nbsp</strong><?php  echo $cc[7];?> oy<hr>
                        <strong>Telefonlar:&nbsp</strong><?php echo "<br>".$cc[9]."<br>".$cc[10];?><hr>
                    </div>
                    <div class="col-md-5 thumbnail row" id="kassa" style="margin: 10px; padding: 10px;"><!--to'lov to'lash-->
                        <form method="post" action="<?php echo URL."client-profil/".$id."/addmoney";?>" name="form<?php echo $cc[1];?>">
                            <b>To'lov <am></am>alga oshirish</b>
                            <div class="input-group" >
                                <input type="hidden" name="contractid" value="<?php echo $cc[1];?>">
                                <input type="text" class="form-control" name="summa" placeholder="Summani kiriting" oninput="farmatuz<?php echo $cc[1];?>()">
                            </div>
                            <br>
                            <div class="input-group">
                                <select name="paytype"  class="form-control" style="font-size: 20px; padding: 2px; margin: 2px;">
                                    <option value="1">Naqt pul</option>
                                    <option value="2">Plastik</option>
                                    <option value="3">Pul o'tkazish</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <h3><input type="checkbox" style="width: 20px; height: 20px;" name="check"> Teskshirildi!</input></h3>
                            </div>
                            <div class="input-group">
                                <input type="submit" class="btn btn-success btn-lg" value="Saqlash">
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    function farmatuz<?php echo $cc[1];?>(){
                        var N=document.form<?php echo $cc[1];?>.summa.value;
                        var m="";
                        for(var i=0; i< N.length; i++){
                            if (N[i] >= '0' && N[i] <= '9' || N[i]==" ") {
                                if(N[i]!=" "){
                                    m+=N[i];
                                }
                            }else{
                                alert("Faqat son kiriting iltimos!");
                                document.form<?php echo $cc[1];?>.summa.value="";

                            }
                        }
                        N=m;
                        var ans=N.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");

                        if(N!=ans){
                            document.form<?php echo $cc[1];?>.summa.value=ans;
                            //alert(ans);
                        }
                    }
                </script>

                <div class="row" style="margin: 1px;">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Oylar bo'yicha hisoboti</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">

                                <table class="table table-striped" style="font-size: 20px;">
                                    <tbody><tr>
                                        <th style="width: 10px">#</th>
                                        <th>Sana</th>
                                        <th>Summa(so'm)</th>
                                        <th>Holati</th>
                                    </tr>

                                    <?php qarzdorlik($cc[1],($cc[5]-$cc[6]),$cc[7],$cc[8]);?>

                                    </tbody></table>

                            </div><!-- /.box-body -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">To'lovlar ro'yxati</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped" style="font-size: 20px;">
                                    <tbody><tr>
                                        <th style="width: 45px">#</th>
                                        <th>Summa(so'm)</th>
                                        <th>Sana</th>
                                    </tr>
                                    <?php cheklar($cc[1]);?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div><!--cantract end-->
            <br>
            <hr>
            <br>
        <?php }
        }else{
            echo"<h1 class='text-center text-warning'>Ayni vaqtda mijoz bilan shartnomalar yo'q!</h1>";

        }
        ?>
    </div>
</div>

</div>

<?php
//***********************************************************************************************************************
function qarzdorlik($contract_id, $summa, $muddati, $date){
    $sum=number_format($summa/$muddati,0,","," ");
    $sum1=$summa/$muddati;
    $qch=mysql_query("SELECT *  FROM `payment` WHERE `contract_ID` = $contract_id") or die("Error");
    $num=mysql_num_rows($qch);
    $sumch=0;
    for($j=0; $j<$num; $j++){
        $sumch=$sumch+mysql_result($qch, $j,"summa");
    }
    $ok_oylar=0;
    while($sumch>=$sum1){
        $sumch-=$sum1;
        $ok_oylar++;
    }
if($ok_oylar==$muddati){ echo "<script>var ajaxDisplay = document.getElementById('kassa');ajaxDisplay.innerHTML = \"<div class='text-center row' style='margin:25px;'><a href='close-cantract/$contract_id'><button class='btn btn-lg btn-success'><span class=' glyphicon glyphicon-off'> </span>  Shartnomani yopish</button></a></div>\";</script>";}
    $datetest = rtrim($date, '-');
    $datetest = explode('-', $datetest);
if($datetest[2]>20){
 $sanakun=20;
}else{
    $sanakun=$datetest[2];
}
    $cur_yil=date("Y");
    $cur_oy=date("m");
        if($cur_oy[0]=="0"){$cur_oy=$cur_oy[1];}
    $cur_kun=date("d");
    $qarz_umumiy=0;
    for($i=1; $i<=$muddati; $i++){
        switch($datetest[1]){
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

        $sdate=$sanakun."-".$oynom." ".$datetest[0]."y.";



            if($i<=$ok_oylar){
                echo "<tr>
                    <td>$i</td>
                    <td style='width: 100%;'>$sdate</td>
                    <td>$sum</td>
                    <td><span class='label label-success'>To'langan</span></td>
                  </tr>";
            }else{

                if($cur_yil>=$datetest[0] && $cur_oy>=$datetest[1] && $cur_kun>=$sanakun){
                    $qarz=number_format($summa/$muddati-$sumch,0,","," ");
                    $qarz_umumiy+=$summa/$muddati-$sumch;
                    echo "<tr class='bg-red-active'>
                                        <td>$i</td>
                                        <td>$sdate</td>
                                        <td>$sum</td>
                                        <td><span class='label label-warning'>$qarz so'm</span></td>
                                    </tr>";
                    $sumch=0;
                }else{
                    $qarz=number_format($summa/$muddati-$sumch,0,","," ");
                    $qarz_umumiy+=$summa/$muddati-$sumch;
                    echo "<tr class=''>
                                        <td>$i</td>
                                        <td>$sdate</td>
                                        <td>$sum</td>
                                        <td><span class='label label-default'>$qarz so'm</span></td>

                                    </tr>";
                }
            }

        if($datetest[1]<12){
            $datetest[1]++;
        }else{
            $datetest[0]++;
            $datetest[1]=1;
        }
    }
    $qarz_umumiy=number_format($qarz_umumiy,0,","," ");
    echo"
                                    <tr>
                                        <td colspan='3'>Umumiy qarzdorlik</td>
                                        <td>$qarz_umumiy so'm</td>
                                    </tr>";
    //obshiy
}
//***********************************************************************************************************************
function cheklar($contract_id){
    $qch=mysql_query("SELECT *  FROM `payment` WHERE `contract_ID` = $contract_id ORDER BY `sana`  ASC") or die("Error");
    $num=mysql_num_rows($qch);
    for($i=0; $i<$num; $i++){
        $j=$i+1;
        $summa=number_format(mysql_result($qch, $i,"summa"), 0, ',', ' ');
        $sana=mysql_result($qch, $i,"sana");

        echo "<tr>
				<td>$j</td>
                <td>$summa</td>
                <td>$sana</td>
           </tr>
                            ";
    }



}
?>
