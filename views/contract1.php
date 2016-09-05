
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Haridor qidirish</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?php echo URL."contract/search/"?>" method="post">
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Ismi</label>
                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputEmail3" placeholder="Ismi" name="v1">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Familiyasi</label>
                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputPassword3" placeholder="Familiyasi" name="v2">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tug'ilgan sanasi</label>
                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputPassword3" placeholder="Tug'ilgan sanasi" name="v3">
                </div>
            </div>


        </div><!-- /.box-body -->
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-twitter btn-lg"><span class="glyphicon glyphicon-search"></span> Qidirish</button>
        </div><!-- /.box-footer -->
    </form>
</div><!-- /.box -->


