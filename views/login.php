<body class="hold-transition login-page">
<?php
@session_start();
if(isset($error_login) && $error_login==1){
    ?>
    <div class="col-md-3"></div>
    <div class="col-md-6 callout text-center callout-danger">
        <h3><span class="glyphicon glyphicon-remove"></span> Foydalanuvchi login yoki paroli xato! <span class="glyphicon glyphicon-remove"></span> </h3>
    </div>
    <div class="col-md-3"></div>

<?php }
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>OltinSohiba</b> dasturi</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Tizimga kirish</p>

        <form action="<?php echo URL."login/run/"?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="login" placeholder="Login">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="parol" placeholder="Parol">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><h4 class="maunst">Kirish</h4></button>
        </form>
    </div>
</div>
</body>