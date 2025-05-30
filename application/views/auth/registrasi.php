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
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/square/purple.css">
  <style type="text/css">
  /* Reset styling umum */
  body.login-page {
    background: linear-gradient(135deg, #0061a7, #0088e0);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: auto !important;
    padding: 20px;
  }

  /* Container utama login */
  .login-container {
    width: 90%;
    max-width: 1000px;
    display: flex;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
    overflow: hidden;
    position: relative;
  }
  
  /* Bagian kiri dengan welcome message */
  .kiri {
    background: linear-gradient(135deg, #0061a7, #0088e0);
    color: white;
    padding: 50px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
    height: auto;
    flex: 1.2;
  }
  
  /* Bagian kanan dengan form */
  .kanan {
    background-color: white;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: auto;
    flex: 0.8;
    position: relative;
    z-index: 1;
  }
  
  /* Curve shape antara kiri dan kanan */
  .kanan::before {
    content: '';
    position: absolute;
    left: -80px;
    top: 0;
    width: 80px;
    height: 100%;
    background: white;
    border-radius: 0 0 0 50%;
  }
  
  /* Large circle decoration */
  .big-circle {
    position: absolute;
    width: 180px;
    height: 180px;
    background: rgba(0, 120, 212, 0.6);
    border-radius: 50%;
    bottom: 40px;
    left: 80px;
    z-index: 0;
  }
  
  /* Small circle decoration */
  .small-circle {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(0, 120, 212, 0.6);
    border-radius: 50%;
    bottom: -20px;
    right: -20px;
    z-index: 0;
  }
  
  /* Teks welcome */
  .welcome-text {
    z-index: 2;
    position: relative;
  }
  
  .welcome-text h2 {
    font-size: 38px;
    font-weight: 700;
    margin-bottom: 10px;
    text-transform: uppercase;
  }
  
  .welcome-text p {
    opacity: 0.8;
    line-height: 1.6;
    margin-bottom: 30px;
    max-width: 80%;
  }
  
  /* Form styling */
  .form-group.has-feedback {
    margin-bottom: 20px;
    position: relative;
  }
  
  .form-control {
    height: 48px;
    padding: 10px 15px 10px 45px;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s;
    font-size: 14px;
    background-color: #f8f9fa;
  }
  
  /* Tambah icon untuk form field */
  .form-group.has-feedback::before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    left: 15px;
    top: 15px;
    color: #666;
    z-index: 2;
  }
  
  .form-group.has-feedback input {
    padding-left: 40px;
  }
  
  /* Focus state for inputs */
  .form-control:focus {
    border-color: #0088e0;
    background-color: #fff;
    box-shadow: 0 0 0 3px rgba(0, 136, 224, 0.1);
  }
  
  /* Container form */
  .container-login {
    padding: 0;
    width: 100%;
  }
  
  .container-login p.login-box-msg {
    font-size: 15px;
    color: #666;
    margin-bottom: 25px;
    padding: 0;
    text-align: left;
  }
  
  /* Submit button styling */
  input[type="submit"], .btn-primary {
    background: #0061a7;
    color: white;
    border: none;
    height: 48px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
    text-transform: capitalize;
    letter-spacing: 0.5px;
    width: 100%;
  }
  
  input[type="submit"]:hover, .btn-primary:hover {
    background: #0088e0;
    box-shadow: 0 5px 15px rgba(0, 136, 224, 0.3);
  }
  
  /* Logo styling */
  .login-logo {
    margin-bottom: 25px;
    text-align: center;
  }
  
  .login-logo img {
    max-width: 70px !important;
    margin: 0 auto;
  }
  
  .login-logo h1 {
    font-size: 22px;
    font-weight: 700;
    margin: 10px 0 5px;
  }
  
  /* Secondary login button */
  .alt-login-btn {
    display: block;
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
    border-radius: 8px;
    margin-top: 15px;
    color: #555;
    transition: all 0.3s;
    font-weight: 500;
    text-decoration: none;
  }
  
  .alt-login-btn:hover {
    background: #f8f9fa;
  }
  
  /* Divider for login options */
  .or-divider {
    display: flex;
    align-items: center;
    margin: 20px 0;
  }
  
  .or-divider::before, 
  .or-divider::after {
    content: "";
    flex: 1;
    border-bottom: 1px solid #e0e0e0;
  }
  
  .or-divider span {
    padding: 0 15px;
    color: #999;
    font-size: 14px;
  }
  
  /* Link styling */
  .login-links {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
  }
  
  .login-links a {
    color: #0088e0;
    text-decoration: none;
  }
  
  /* Headers in form section */
  .form-header {
    margin-bottom: 25px;
  }
  
  .form-header h4 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 5px;
  }
  
  .form-header p {
    color: #666;
    font-size: 14px;
    margin-bottom: 0;
  }
  
  /* Responsive adjustments */
  @media (max-width: 768px) {
    .login-container {
      flex-direction: column;
    }
    
    .kiri {
      display: none;
    }
    
    .kanan {
      width: 100%;
      padding: 30px 20px;
    }
    
    .kanan::before {
      display: none;
    }
  }
  
  /* Remove default margin/padding from AdminLTE */
  .container-login h5 {
    margin-top: 0;
    margin-bottom: 5px;
  }
  
  /* Remove the floating elements in this design */
  .floating-element {
    display: none;
  }
  </style>
</head>
<body class="hold-transition login-page" style="height: 100%;overflow: hidden;">

  <div class="col-md-8 hidden-xs hidden-sm kiri">
    <div class="welcome-text">
      <h2>WELCOME</h2>
      <p>Selamat datang di Sistem SPMB Online <?= $pengaturan->nama_sekolah ?>. Silahkan Daftarkan..</p>
    </div>
    <div class="big-circle"></div>
    <div class="small-circle"></div>
  </div>

  <div class="col-md-4 col-xs-12 kanan">
    <div class="login-logo">
      <img class='img img-responsive' src="<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>">
      <h1><strong><?= $this->config->item('sitename')?></strong></h1>
      <h5><?= $pengaturan->nama_sekolah ?></h5>
    </div>
    
    <div class="container-login">
      <div class="form-header">
        <h4>Sign Up</h4>
        <p>Silahkan Melakuan Pendaftan Akun</p>
      </div>
      
      <p class="login-box-msg"><?php echo lang('create_user_subheading');?></p>
      <?php
        if(validation_errors() != ""){
      ?>      
        <div id="infoMessage" class="callout callout-danger"><?php echo validation_errors();?></div>
      <?php } ?>
      <?php echo form_open("auth/proses_registrasi");?>
        
        <div class="form-group has-feedback">
          <!-- <label><?php echo lang('create_user_fname_label1') ?> <span style="color:red;">*</span></label> -->
          <input type="text" id="full_name" data-toggle="full_name" name="full_name"  class="form-control" placeholder="<?php echo lang('create_user_fname_label1') ?>" value="<?php echo set_value('full_name');?>"  autofocus required />
        </div>               

        <div class="form-group has-feedback">
          <!-- <label><?php echo lang('create_user_phone_label') ?> <span style="color:red;">*</span></label> -->
          <input type="text" id="phone" data-toggle="phone" name="phone"  class="form-control" placeholder="<?php echo lang('create_user_phone_label') ?>" value="<?php echo set_value('phone');?>"  autofocus required />
        </div>  

      <?php if ($this->config->item('identity', 'ion_auth') !== 'email') { ?>                
        <div class="form-group has-feedback">
          <!-- <label><?php echo lang('create_user_username_label1') ?> <span style="color:red;">*</span></label> -->
          <input type="text" id="identity" data-toggle="identity" name="identity" class="form-control" placeholder="<?php echo lang('create_user_username_label1') ?>" value="<?php echo set_value('identity');?>" autofocus required />
        </div>
      <?php } else { ?>  
        <div class="form-group has-feedback">
          <!-- <label><?php echo lang('create_user_email_label') ?> <span style="color:red;">*</span></label> -->
          <input type="email" id="email" data-toggle="email" name="email"  class="form-control" placeholder="<?php echo lang('create_user_email_label') ?>" value="<?php echo set_value('email');?>" autofocus required />
        </div>    
      <?php } ?>

        <div class="form-group has-feedback">
          <!-- <label><?php echo lang('create_user_password_label') ?> <span style="color:red;">*</span></label> -->
          <input type="password" id="password" data-toggle="password" name="password" class="form-control" placeholder="<?php echo lang('create_user_password_label') ?>" value="<?php echo set_value('password');?>" required />
        </div>

        <div class="form-group has-feedback">
          <!-- <label><?php echo lang('create_user_password_confirm_label') ?> <span style="color:red;">*</span></label> -->
          <input type="password" id="password_confirm" data-toggle="password_confirm" name="password_confirm" class="form-control" placeholder="<?php echo lang('create_user_password_confirm_label') ?>" value="<?php echo set_value('password_confirm');?>" required />
        </div>

        <div class="row">
          <div class="col-xs-6 col-md-8">
           <a href="login" >Registrasi</a><br/>
          </div><!-- /.col -->
          <div class="col-xs-6 col-md-4">
            <input type="submit" class="<?= $this->config->item('botton')?> btn-block" id="loginBtn" value="<?php echo lang('create_user_submit_btn') ?>" />
          </div><!-- /.col -->
        </div>
        <?php echo form_close();?>
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
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_flat-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<!-- live chat telegram -->
<script>
window.intergramId="<?php echo $pengaturan->intergramid ?>";
window.intergramCustomizations={
  titleClosed:'Chat Admin',
  titleOpen:'Sedang Chat...',
  introMessage:'Halo selamat datang, ada yang bisa kami bantu',
  autoResponse:'Silahkan tunggu',
  autoNoResponse:'Pesan anda akan kami jawab, silahkan tunggu',
  maincolor:"#1a73c8",
  alwaysUseFloatingButton: false
};
</script>
<script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>
<!-- end chat -->
</body>
</html>