<?php      
  $pengaturan=$this->Pengaturan_model->get_by_id_1();
?>
<!DOCTYPE html>
<html>
<head>
  <link href='<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>' rel='icon' type='image/png'/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->config->item('title')?> <?php echo strtoupper($pengaturan->nama_sekolah) ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/fontawesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/square/blue.css">
  <style type="text/css">
  .kiri{
    background-image: url("<?= base_url('assets/dist/img/'.$pengaturan->bglogin) ?>");
    background-size: cover;
    height: 100%;
    margin: 0px;
    padding: 0px;
  }
  .kanan{
    background-color: white;
    height: 100%;
    padding-top: 4%;
  }
  .container-login{
    padding: 10%;
    padding-top: 0;
  }
  .login-logo{
    padding-top: 0;
  }
  .logo {
    position: absolute;
    left: 20px;
    top: 20px;
    z-index: 2;
    color: #000;
    -webkit-filter: drop-shadow(5px 5px 5px #222);
    filter: drop-shadow(2px 2px 2px #222);
  }  
  </style>
</head>
<body class="hold-transition login-page" style="height: 100%;overflow: hidden;">

  <div class="col-md-8 hidden-xs hidden-sm kiri">
    <div class='logo hidden-xs'><img class='img img-responsive' style='max-width:200px;' src="<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>" width='100px'>
    </div>     
  </div>
  <div class="col-md-4 col-xs-12 kanan">
    <div class="login-logo">
        <center><img class='img img-responsive' style='max-width:200px;' src="<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>" width='50px'></center>
        <h1><strong><?= $this->config->item('sitename')?></strong></h1>
        <h5><strong><?= $pengaturan->nama_sekolah ?></strong></h5>
        <h5>version <?= $this->config->item('version')?></h5>
    </div>
    <div class="container-login ">
       <p class="login-box-msg"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
    <?php
      if($message != ""){
    ?>       
       <div id="infoMessage" class="callout callout-danger"><?php echo $message;?></div>
    <?php } ?>
   <?php echo form_open("auth/forgot_password");?>
     <div class="form-group has-feedback">
      <label><?php echo lang('forgot_password_email_identity_label') ?></label>
      <input type="text" name="identity" class="form-control" placeholder="<?php echo lang('forgot_password_email_identity_label') ?>" autofocus />
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="row">
      <div class="col-xs-8">
       <a href="login" >Login Page</a><br/>
      </div>
      <div class="col-xs-4">
        <input type="submit" class="<?= $this->config->item('botton')?> btn-block" id="loginBtn" value="<?php echo lang('forgot_password_submit_btn') ?>" />
      </div><!-- /.col -->
    </div>
    <?php echo form_close();?>
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url();?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
