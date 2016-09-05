<?php

include "models/DataBase.php";
$c_id = $url[2];
$qc = mysql_query("SELECT *  FROM `clients` WHERE `id` = $c_id") or die("Error1");
$fio = mysql_result($qc, 0, "familiyasi") . " " . mysql_result($qc, 0, "ismi") . " " . mysql_result($qc, 0, "otasining_ismi");
$tyil = mysql_result($qc, 0, "tugilgan_sana");
$tjoyi = mysql_result($qc, 0, "tugilgan_joyi");
?>
<div class="col-md-7">

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title"><strong>Shartnoma ma'lumotlari</strong></h3>
        </div>
        <div class="box-body">
            <form name="myForm" method="post" action="save">
                <!--form begin and hiddens-->
                <input type="hidden" name="cid" value="<?php echo $c_id; ?>">

                <div class="form-group">
                    <label>Haridor passport raqami:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-barcode"></i>
                        </div>
                        <input type="text" class="form-control" name="c1">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                    <label>Tavar nomi:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-qrcode"></i>
                        </div>
                        <input type="text" class="form-control" name="c2">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <label>Tavar bahosi:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-tags"></i>
                        </div>
                        <input type="text" class="form-control" name="c3" oninput="farmatuz3()">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <label>Oldindan to'lovi:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-usd"></i>
                        </div>
                        <input type="text" class="form-control" name="c4" oninput="farmatuz4()">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <label>Muddati:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-time"></i>
                        </div>
                        <input type="number" class="form-control" name="c5" oninput="oyliksumma()">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <label>Telfon raqami:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-phone-alt"></i>
                        </div>
                        <input type="text" class="form-control" name="c6">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <label>Qo'shimcha telefon raqami:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                        </div>
                        <i class="glyphicon glyphicon-phone-alt"></i>
                    </div>
                    <input type="text" class="form-control" name="c7">
                </div>
                <!-- /.input group -->
        </div>
        <!-- /.form group -->
        <div class="form-group text-center">
            <button type="submit" class="btn-lg btn-info"><span class="glyphicon glyphicon-floppy-save"> </span> Saqlash
            </button>
        </div>
        <!-- /.form group -->
        </form>
    </div>
    <!-- /.box-body -->
</div>
<div class="col-md-5">
    <div class="box box-success">
        <div class="box-header"></div>
        <div class="text-center">
            <a href="<?php echo URL . "client-profil/$c_id"; ?>">
                <button class="btn btn-primary btn-lg" style="margin: 25px;"><span
                        class="glyphicon glyphicon-user"></span> Shaxsiy kabinetga o'tish
                </button>
            </a>
        </div>
    </div>
    <div class="box box-danger">
        <div class="box-header">
            <h2 class="box-title"><strong>Haridor ma'lumotlari</strong></h2>
        </div>
        <div class="box-body">
            <div class="box-body" style="font-size: 20px; font-family: 'Times New Roman';">
                <dl class="dl-horizontal">
                    <dt>F.I.O:</dt>
                    <dd><?php echo $fio; ?></dd>
                    <dt>Tug'ilgan sana:</dt>
                    <dd><?php echo $tyil; ?></dd>
                    <dt>Tug'ilgan joyi:</dt>
                    <dd><?php echo $tjoyi; ?></dd>
                </dl>
            </div>
            <div class="col-md-5">

            </div>

        </div>
    </div>
    <div class="box box-success">
        <div class="box-header">
            <h2 class="box-title"><strong>Bir oydagi to'lov miqdori</strong></h2>
        </div>
        <div id="summadiv">
            <div class="small-box ">
                <div class="inner" style="height: 100px;">
                    <h3><span>0</span> <sup style="font-size: 20px"> so'm</sup></h3>

                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-equalizer"></i>
                </div>

            </div>
        </div>


    </div>


</div>

<script>
    function oyliksumma() {
        var N3 = document.myForm.c3.value;
        N3 = N3.replace(" ", "");
        N3 = N3.replace(" ", "");
        var N4 = document.myForm.c4.value;
        N4 = N4.replace(" ", "");
        N4 = N4.replace(" ", "");
        var N = document.myForm.c5.value;
        var ans = ((N3 - N4) / N).toFixed(2);
        ans = ans.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
        summadiv.innerHTML = "<div class='small-box bg-green'><div class='inner' style='height: 100px;'><h3><span>" + ans + "</span> <sup style='font-size: 20px'> so'm</sup></h3><h4>Shartnoma muddati:<strong> " + N + "<strong> oy<h4></div><div class='icon'><i class='glyphicon glyphicon-equalizer'></i></div></div>";
    }
    function farmatuz3() {
        var N = document.myForm.c3.value;
        var m = "";
        for (var i = 0; i < N.length; i++) {
            if (N[i] != " ") {
                m += N[i];
            }
        }
        N = m;
        var ans = N.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");

        if (N != ans) {
            document.myForm.c3.value = ans;
            //alert(ans);
        }
    }
    function farmatuz4() {
        var N = document.myForm.c4.value;
        var m = "";
        for (var i = 0; i < N.length; i++) {
            if (N[i] != " ") {
                m += N[i];
            }
        }
        N = m;
        var ans = N.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");

        if (N != ans) {
            document.myForm.c4.value = ans;
            //alert(ans);
        }
    }
</script>