<div class="thumbnail row">
<h1 class="text-center text-primary">Har oydagi chiqmlar</h1>
    <form action="<?php echo URL."chiqim/view"?>" method="post">
        <div class="col-md-4">
            <select name="yil" class="form-control input-lg">
                <?php
                $cur_yil=date("Y");
                for($i=2016; $i<=$cur_yil; $i++){
                    echo "<option value='$i'>$i-yil</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <select name="oy" class="form-control input-lg">
                <option value="1">Yanvar</option>
                <option value="2">Fevral</option>
                <option value="3">Mart</option>
                <option value="4">Aprel</option>
                <option value="5">May</option>
                <option value="6">Iyun</option>
                <option value="7">Iyul</option>
                <option value="8">August</option>
                <option value="9">Sentabr</option>
                <option value="10">Oktabr</option>
                <option value="11">Noyabr</option>
                <option value="12">Dekabr</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="submit" value="OK" class="btn btn-success input-lg btn-block">
        </div>
    </form>
<br>
<br>
<br>
</div>
