<?php      
  $pengaturan = $this->Pengaturan_model->get_by_id_1();
  $infopublik = $this->Pengumuman_model->get_by_publik();
  $infoppdb = $this->Tahunpelajaran_model->get_tahun_aktif();  
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
  }
  
  /* Elemen dekoratif lingkaran */
  .circle {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
  }
  
  .circle-1 {
    width: 200px;
    height: 200px;
    bottom: -70px;
    right: -70px;
  }
  
  .circle-2 {
    width: 100px;
    height: 100px;
    bottom: 60px;
    right: 60px;
  }
  
  /* Teks welcome */
  .welcome-text {
    z-index: 1;
    max-width: 90%;
  }
  
  .welcome-text h2 {
    font-size: 38px;
    font-weight: 700;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  
  .welcome-text p {
    opacity: 0.9;
    line-height: 1.8;
    font-size: 16px;
  }
  
  /* Logo dan judul */
  .login-logo {
    text-align: center;
    margin-bottom: 25px;
  }
  
  .login-logo img {
    max-width: 80px !important;
    margin: 0 auto 15px;
  }
  
  .login-logo h4 {
    font-size: 22px;
    margin: 10px 0 5px;
    font-weight: 700;
  }
  
  .login-logo p {
    font-size: 14px;
    color: #666;
  }
  
  .container-login {
    padding: 0;
    width: 100%;
  }
  
  .container-login h4 {
    font-size: 24px;
    margin-bottom: 10px;
    font-weight: 600;
  }
  
  .container-login > p {
    color: #666;
    margin-bottom: 20px;
    font-size: 14px;
  }
  
  /* Form group dan input group styling */
.form-group {
  margin-bottom: 22px;
  position: relative;
  width: 100%;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  color: #333;
  font-size: 14px;
}

/* Reset styling Bootstrap untuk input-group */
.form-group .input-group {
  width: 100%;
  position: relative;
  display: block !important;
  border-collapse: separate;
}

/* Perbaikan input field dengan box-sizing yang benar */
.form-control {
  height: 48px;
  padding: 12px 15px 12px 45px !important;
  width: 100% !important;
  border-radius: 8px !important;
  border: 1px solid #e0e0e0 !important;
  transition: all 0.3s;
  font-size: 15px;
  box-sizing: border-box;
  background-color: #f0f5ff;
  position: relative;
}

/* Perbaikan posisi icon user dan lock */
.form-group .input-group i.fas.fa-user,
.form-group .input-group i.fas.fa-lock {
  position: absolute;
  left: 18px;
  top: 16px; /* Fixed position instead of percentage */
  color: #555;
  font-size: 16px;
  z-index: 10; /* Higher z-index to ensure visibility */
  pointer-events: none; /* Ensures clicks pass through */
}

/* Icon mata untuk password */
.password-toggle-icon {
  position: absolute;
  right: 15px;
  top: 16px; /* Fixed position */
  color: #555;
  cursor: pointer;
  font-size: 16px;
  z-index: 10; /* Higher z-index */
}

/* Specific fix for eye icon positioning */
.form-group .input-group span.password-toggle-icon {
  right: 15px;
  top: 16px;
}

/* Force override any Bootstrap styling that might conflict */
.form-group .input-group::before,
.form-group .input-group::after {
  display: none !important;
}

/* Efek hover dan focus yang lebih halus */
.form-control:hover {
  border-color: #0088e0;
  background-color: #f6f9ff;
}

.form-control:focus {
  outline: none;
  border-color: #0088e0;
  box-shadow: 0 0 0 3px rgba(0, 136, 224, 0.15);
  background-color: #fff;
}

/* Penyesuaian margin agar form lebih rapi */
.container-login form {
  margin-top: 10px;
  margin-bottom: 25px;
}
  
  /* Perbaikan tombol submit */
  input[type="submit"], .btn-login {
    background: #0088e0;
    color: white;
    border: none;
    height: 45px;
    padding: 0 12px;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s;
    width: 100%;
    margin-top: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
  }
  
  /* Perbaikan tombol alternatif */
  .alt-login-btn {
    display: block;
    border: 1px solid #ddd;
    padding: 12px;
    height: 45px;
    text-align: center;
    border-radius: 5px;
    margin-top: 10px;
    color: #555;
    transition: all 0.3s;
    font-weight: 500;
    text-decoration: none;
  }
  
  /* Perbaikan checkbox */
  .checkbox.icheck {
    margin-top: 8px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
  }
  
  .checkbox.icheck label {
    display: flex;
    align-items: center;
    margin-bottom: 0;
    padding-top: 2px;
  }
  
  .checkbox.icheck input {
    margin-right: 10px !important; /* Tambah jarak horizontal */
  }
  
  /* Tambahan untuk checkbox icon dari iCheck */
.icheckbox_square-purple {
  margin-right: 10px !important;
}

/* Ukuran teks pada checkbox agar lebih sesuai */
.checkbox.icheck label {
  font-size: 14px;
  color: #555;
}
  
  /* Responsive design */
  @media (max-width: 768px) {
    .login-container {
      flex-direction: column;
      width: 95%;
    }
    
    .kiri {
      display: none;
    }
    
    .kanan {
      width: 100%;
      padding: 30px;
    }
  }
  
  /* Pesan error/info */
  #infoMessage {
    border-radius: 5px;
    margin-bottom: 20px;
    padding: 12px 15px;
    font-size: 14px;
  }
  
  /* Pertahankan styling countdown timer */
  #clock > div {
    border-radius: 5px;
    background: #0088e0;
    padding: 5px 5px 0px 5px;
    color: #fff;
    display: inline-block;
    margin: 0 2px;
  }
  
  #clock > div > p {
    font-size: 12px;
    margin: 3px 0;
  }
  
  #days, #hours, #minutes, #seconds {
    padding: 8px 0;
    font-size: 16px;
    background: #0061a7;
    display: inline-block;
    width: 45px;
    border-radius: 3px;
  }
  </style>
</head>
<body class="hold-transition login-page" style="height: 100%;overflow: hidden;">
  <div class="login-container">
    <!-- Bagian kiri -->
    <div class="col-md-8 kiri">
      <div class="welcome-text">
        <h2>WELCOME</h2>
        <p>Selamat datang di Sistem SPMB Online <?= $pengaturan->nama_sekolah ?>. Silahkan login untuk melanjutkan ke dashboard atau pendaftaran.</p>
      </div>
      <!-- Elemen lingkaran dekoratif -->
      <div class="circle circle-1"></div>
      <div class="circle circle-2"></div>
    </div>
    
    <!-- Bagian kanan -->
    <div class="col-md-4 kanan">
      <div class="login-logo">
        <img class='img img-responsive' style='max-width:80px; margin:0 auto;' src="<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>">
        <h4><strong><?= $this->config->item('sitename')?></strong></h4>
        <p><?= $pengaturan->nama_sekolah ?></p>
      </div>
      
      <div class="container-login">
        <h4>Sign in</h4>
        <p>Silahkan login untuk melanjutkan</p>
        
        <?php if($message != ""){ ?>
          <div id="infoMessage" class="callout callout-danger"><?php echo $message;?></div>
        <?php } else if ($this->session->flashdata('success')== TRUE){ ?> 
          <div id="infoMessage" class="callout callout-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php } ?>
  
        <?php echo form_open("auth/login");?>
          <div class="form-group">
            <label><?php echo lang('login_identity_label1') ?></label>
            <div class="input-group">
              <i class="fas fa-user"></i>
              <input type="text" name="identity" class="form-control" placeholder="<?php echo lang('login_identity_label1') ?>" autofocus required />
            </div>
          </div>
          
          <div class="form-group">
            <label><?php echo lang('login_password_label') ?></label>
            <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" class="form-control" placeholder="<?php echo lang('login_password_label') ?>" required />
              <!-- Password toggle icon akan ditambahkan oleh JavaScript -->
            </div>
          </div>
          
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input name="remember" type="checkbox" value="1"> <?php echo lang('login_remember_label') ?>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <input type="submit" class="btn-login" value="<?php echo lang('login_submit_btn') ?>" />
            </div>
          </div>
        <?php echo form_close();?>

        
        <div style="margin-top:20px; text-align:center;">
          Belum punya akun? <a href="registrasi"><?php echo lang('register_a_new_membership');?></a>
        </div>
      </div>
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
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_square-purple',
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

<!-- Modal Pengumuman -->
<?php if ($infopublik){ ?>
<div class="modal fade" id="myModalPengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Informasi</h3>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <?php if ($infoppdb) { 
            date_default_timezone_set('Asia/Jakarta');
            $tanggal_mulai = date('d F Y 08:00:00',strtotime($infoppdb->tanggal_mulai_pendaftaran));
            $tanggal_selesai = date('d F Y 12:00:00',strtotime($infoppdb->tanggal_selesai_pendaftaran)); 
            $tanggal_sekarang = date('d F Y H:i:s');
            $mulai = new DateTime($tanggal_mulai);
            $selesai = new DateTime($tanggal_selesai);
            $today = new DateTime($tanggal_sekarang);
          ?> 
          
          <div class="callout callout-info">
            Jadwal PPDB <?php echo $infoppdb->ket ?><br>
            Pendaftaran : <?php echo format_indo(date('Y-m-d', strtotime($infoppdb->tanggal_mulai_pendaftaran))) ?> s.d. <?php echo format_indo(date('Y-m-d', strtotime($infoppdb->tanggal_selesai_pendaftaran))) ?>, Pengumuman : <?php echo format_indo(date('Y-m-d', strtotime($infoppdb->tanggal_pengumuman))) ?>, Daftar Ulang : <?php echo format_indo(date('Y-m-d', strtotime($infoppdb->tanggal_mulai_daftar_ulang))) ?> s.d. <?php echo format_indo(date('Y-m-d', strtotime($infoppdb->tanggal_selesai_daftar_ulang))) ?>
          </div>

          <?php if ($today < $mulai) { ?>
            <div class="main">
              <h4>PPDB dibuka dalam</h4>
              <div id="clock">
                <div><span id="days"></span><p>Hari</p></div>
                <div><span id="hours"></span><p>Jam</p></div>
                <div><span id="minutes"></span><p>Menit</p></div>
                <div><span id="seconds"></span><p>Detik</p></div>
              </div>
            </div><br>                            
            <?php if (file_exists('assets/dist/img/alur.png')) { ?>
              <img src="<?php echo base_url('assets/dist/img/alur.png') ?>" width="100%">
            <?php } ?>                                         
          <?php } else if ($today > $selesai) { ?>
            <h3 style="text-align: center">Pendaftaran <?php echo $infoppdb->ket ?> sudah ditutup</h3>
          <?php } else { ?>
            <h3 style="text-align: center">Pendaftaran <?php echo $infoppdb->ket ?> sudah dibuka</h3>
            <?php if (file_exists('assets/dist/img/alur.png')) { ?>
              <img src="<?php echo base_url('assets/dist/img/alur.png') ?>" width="100%">
            <?php } ?>                                    
          <?php } ?>  
          
          <?php } ?>
        </div>
      </div>
<!-- -------------------- -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Collapsible Accordion</h3> -->
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                <?php 
                $no = 1;
                foreach ($infopublik as $pengumuman) { ?>
                  <div class="panel box box-info">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $no++; ?>">
                          <?= $pengumuman->judul ?>
                        </a>
                      </h4>
                    </div>
                    <?php $id=$no++ - 1; ?>
                    <div id="<?php echo $id; ?>" class="panel-collapse collapse">
                      <div class="box-body">
                        <div>
                          <?= $pengumuman->text ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>        
<!-- -------------------- -->                               
      </div>
    </div>
  </div>
</div>
<?php } ?>  

<script>
  $('#myModalPengumuman').modal('show');
</script>

<script type="text/javascript">
     function animation(span) {
         span.className = "turn";
         setTimeout(function () {
             span.className = ""
         }, 700);
     }
 
     function Countdown() {
   
         setInterval(function () {
 
            var hari    = document.getElementById("days");
            var jam     = document.getElementById("hours");
            var menit   = document.getElementById("minutes");
            var detik   = document.getElementById("seconds");
               
            var deadline    = new Date("<?php echo date('F d, Y 08:00:00', strtotime($infoppdb->tanggal_mulai_pendaftaran)) ?>");  
            var waktu       = new Date();
            var distance    = deadline - waktu;
               
            var days    = Math.floor((distance / (1000*60*60*24)));
            var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
               
            if (days < 10)
            {
               days = '0' + days;
            }
            if (hours < 10)
            {
               hours = '0' + hours;
            }
            if (minutes < 10)
            {
               minutes = '0' + minutes;
            }
            if (seconds < 10)
            {
               seconds = '0' + seconds;
            }
 
            hari.innerHTML    = days;
            jam.innerHTML     = hours;
            menit.innerHTML   = minutes;
            detik.innerHTML   = seconds;
            //animation
            animation(detik);
            if (seconds == 0) animation(menit);
            if (minutes == 0) animation(jam);
            if (hours == 0) animation(hari);
 
         }, 1000);
     }
     Countdown();
</script>

<script>
  $(document).ready(function() {
  // Hapus icon password yang mungkin sudah ada (untuk mencegah duplikasi)
  $('.password-toggle-icon').remove();
  
  // Tambahkan icon eye untuk password dengan posisi yang tepat
  $('.form-group:has(input[type="password"]) .input-group').append('<span class="password-toggle-icon"><i class="fas fa-eye"></i></span>');
  
  // Toggle password visibility dengan event handling yang lebih baik
  $(document).on('click', '.password-toggle-icon', function(e) {
    e.preventDefault(); // Prevent default behavior
    var passwordField = $(this).siblings('input[type="password"], input[type="text"]');
    var passwordIcon = $(this).find('i');
    
    if (passwordField.attr('type') === 'password') {
      passwordField.attr('type', 'text');
      passwordIcon.removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordField.attr('type', 'password');
      passwordIcon.removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });
});
</script>