<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Haridor ma'lumotlarini tahrirlash</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?php echo URL . "edit-client/run" ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Ismi</label>

                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputEmail3" placeholder="Ismi" name="v1"
                           value="<?php echo $v[1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Familiyasi</label>

                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputPassword3" placeholder="Familiyasi"
                           name="v2" value="<?php echo $v[2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Otasining ismi</label>

                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputPassword3" placeholder="Otasining ismi"
                           name="v3" value="<?php echo $v[3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tug'ilgan sanasi</label>

                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputPassword3" placeholder="Tug'ilgan sanasi"
                           name="v4" value="<?php echo $v[4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tug'ilgan joyi</label>

                <div class="col-sm-10 has-success">
                    <input type="text" class="form-control input-lg" id="inputPassword3" placeholder="Tug'ilgan joyi"
                           name="v5" value="<?php echo $v[5]; ?>">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-cd"></span> Saqlsh
            </button>
        </div>
        <!-- /.box-footer -->
    </form>
</div><!-- /.box -->


