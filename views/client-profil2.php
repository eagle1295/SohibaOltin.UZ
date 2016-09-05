<?php

$dis[$url[2]]="disabled"
?>
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
            <a href="<?php echo URL."contract/client/$id/";?>"><button  class="btn  btn-primary btn-shadow" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-plus"> </span> Yangi shartnoma</button></a>&nbsp&nbsp
            <a href="<?php echo URL."client-profil/$id/";?>"><button class="btn  btn-info btn-shadow" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4);"><span class="glyphicon glyphicon-folder-open"> </span> Amaldagi shartnomalari</button></a>&nbsp&nbsp
            <a href="<?php if($url[2]!="closed") {echo URL."client-profil/$id/closed"; } else{echo "#";}?>"><button  class="btn  btn-success <?php echo $dis['closed'];?>" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-folder-close"> </span> Tugagan shartnomalari</button></a>&nbsp&nbsp
            <a href="<?php if($url[2]!="all") {echo URL."client-profil/$id/all";} else{echo "#";}?>"><button  class="btn  btn-yahoo <?php echo $dis['all'];?>" style="margin: 5px; box-shadow: 5px 5px 5px rgba(0, 1, 0, 0.4); "><span class="glyphicon glyphicon-briefcase"> </span> Barcha shartnomalari</button></a>&nbsp&nbsp
        </div>
        <br>
        <?php




//barcha shartnomalar
        if($url[2]=="all"){
        //contractlarni chaqirish
        $qc=mysql_query("SELECT *  FROM `contract` WHERE `client_ID` = $id ORDER BY `sana` ASC") or die("Error");
        $nc=mysql_num_rows($qc);
        if($nc!=0){


        ?><h2 class='text-success text-center'>Barcha shartnomalar!</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>¹</td>
                <td>Tavar nomi</td>
                <td>Summa</td>
                <td>Muddati</td>
                <td>Shartnoma sanasi</td>
                <td>Holati</td>
            </tr>
            </thead>
            <?php
            function oy($oy){
                switch($oy){
                    case  1: return "Yanvar"; break;
                    case  2: return "Febral"; break;
                    case  3: return "Mart"; break;
                    case  4: return "Aprel"; break;
                    case  5: return "May"; break;
                    case  6: return "Iyun"; break;
                    case  7: return "Iyul"; break;
                    case  8: return "August"; break;
                    case  9: return "Sentabr"; break;
                    case  10: return "Oktabr"; break;
                    case  11: return "Noyabr"; break;
                    case  12: return "Dekabr"; break;
                }
            }
            for($i=0; $i<$nc; $i++){
                $j=$i+1;
                $cc[1]=mysql_result($qc,$i,"id");
                $cc[2]=mysql_result($qc,$i,"client_ID");
                $cc[3]=mysql_result($qc,$i,"pasport_seriya");
                $cc[4]=mysql_result($qc,$i,"tavar_nomi");
                $cc[5]=mysql_result($qc,$i,"bahosi");
                $cc[6]=mysql_result($qc,$i,"oldindan_tolovi");
                $cc[7]=mysql_result($qc,$i,"muddati");
                $cc[8]=mysql_result($qc,$i,"sana");
                $cc[8]= rtrim($cc[8], '-');
                $cc[8] = explode('-', $cc[8]);
                $cc[8]=$cc[2]."-".oy($cc[8][1])." ".$cc[8][0]." y.";
                $cc[10]=mysql_result($qc,$i,"holati");
                if($cc[10]=="2") {
                    $cc[9] = mysql_result($qc, $i, "tugash_sana");
                    $cc[9] = rtrim($cc[9], '-');
                    $cc[9] = explode('-', $cc[9]);
                    $cc[9] = "<span class='label label-success'> Yopilga sanasi ".$cc[2] . "-" . oy($cc[9][1]) . " " . $cc[9][0] . " y. </span>";
                    }else{
                    $cc[9] = "<span class='label label-danger'>Shartnoma amalda</span>";

                }
                echo " <tr>
                <td>$j</td>
                <td>$cc[4]</td>
                <td>$cc[5]</td>
                <td>$cc[7] oy</td>
                <td>$cc[8]</td>
                <td>$cc[9]</td>
            </tr>";
            }echo "</table>";
            }else{
                echo "<h1 class='text-danger text-center'>Bu mijozda tugagan shartnomalar yo'q!</h1>";
            }
            }
//barcha shartnomalar

//Tugagan shartnomalar
        if($url[2]=="closed"){
        //contractlarni chaqirish
        $qc=mysql_query("SELECT *  FROM `contract` WHERE `client_ID` = $id and `holati`=2 ORDER BY `contract`.`sana` ASC") or die("Error");
        $nc=mysql_num_rows($qc);
        if($nc!=0){


?><h2 class='text-success text-center'>Tugagan shartnomalar!</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>¹</td>
                <td>Tavar nomi</td>
                <td>Summa</td>
                <td>Muddati</td>
                <td>Shartnoma sanasi</td>
                <td>Shartnoma tugagan sana</td>
            </tr>
            </thead>
        <?php
        function oy($oy){
            switch($oy){
                case  1: return "Yanvar"; break;
                case  2: return "Febral"; break;
                case  3: return "Mart"; break;
                case  4: return "Aprel"; break;
                case  5: return "May"; break;
                case  6: return "Iyun"; break;
                case  7: return "Iyul"; break;
                case  8: return "August"; break;
                case  9: return "Sentabr"; break;
                case  10: return "Oktabr"; break;
                case  11: return "Noyabr"; break;
                case  12: return "Dekabr"; break;
            }
        }
        for($i=0; $i<$nc; $i++){
            $j=$i+1;
            $cc[1]=mysql_result($qc,$i,"id");
            $cc[2]=mysql_result($qc,$i,"client_ID");
            $cc[3]=mysql_result($qc,$i,"pasport_seriya");
            $cc[4]=mysql_result($qc,$i,"tavar_nomi");
            $cc[5]=mysql_result($qc,$i,"bahosi");
            $cc[6]=mysql_result($qc,$i,"oldindan_tolovi");
            $cc[7]=mysql_result($qc,$i,"muddati");
            $cc[8]=mysql_result($qc,$i,"sana");
            $cc[8]= rtrim($cc[8], '-');
            $cc[8] = explode('-', $cc[8]);
            $cc[8]=$cc[2]."-".oy($cc[8][1])." ".$cc[8][0]." y.";
            $cc[9]=mysql_result($qc,$i,"tugash_sana");
            $cc[9]= rtrim($cc[9], '-');
            $cc[9] = explode('-', $cc[9]);
            $cc[9]=$cc[2]."-".oy($cc[9][1])." ".$cc[9][0]." y.";

            echo " <tr>
                <td>$j</td>
                <td>$cc[4]</td>
                <td>$cc[5]</td>
                <td>$cc[7] oy</td>
                <td>$cc[8]</td>
                <td>$cc[9]</td>
            </tr>";
          }echo "</table>";
        }else{
echo "<h1 class='text-danger text-center'>Bu mijozda tugagan shartnomalar yo'q!</h1>";
        }
        }
?>



            </div><!--cantract end-->
    </div>
</div>

</div>
