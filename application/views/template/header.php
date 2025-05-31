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
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/fontawesome/css/all.css'); ?>">
  <!-- Smart wizard -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/smart-wizard/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/smart-wizard/css/smart_wizard.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/smart-wizard/css/smart_wizard_theme_dots.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables/dataTables.checkboxes.css'); ?>">  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.css'); ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <!-- bootstrap daterangpicker -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

  <link rel="stylesheet" href="<?= base_url('assets/plugins/pace/pace.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/jquery-nestable/jquery.nestable.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  
  <link rel="stylesheet" href="<?= base_url('assets/plugins/alertify/css/alertify.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-select/css/bootstrap-select.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/nenemo/custom.css'); ?>">
  <!-- jQuery 3 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery -->
  <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.js');?>"></script>   
  <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>    
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">

  <!-- leaflet -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/leaflet/leaflet.css'); ?>"> 

  <style>
/* ======= CORE UI IMPROVEMENTS ======= */
body {
  font-family: 'Source Sans Pro', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

/* Box styling improvements */
.box {
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
  transition: all 0.3s ease;
  border: none;
  margin-bottom: 22px;
}

.box:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
}

.box-header {
  border-radius: 8px 8px 0 0;
  padding: 15px;
}

.box-body {
  padding: 18px;
}

/* Info boxes styling */
.info-box {
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
  overflow: hidden;
  transition: all 0.3s ease;
}

.info-box:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.info-box-icon {
  height: 90px;
  width: 90px;
  font-size: 45px;
  border-radius: 12px 0 0 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.info-box-content {
  padding: 10px 15px;
}

.info-box-text {
  text-transform: uppercase;
  font-weight: 600;
  font-size: 14px;
  letter-spacing: 0.5px;
}

.info-box-number {
  font-size: 22px;
  font-weight: 700;
  margin-top: 5px;
}

/* Small box styling */
.small-box {
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  overflow: hidden;
}

.small-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
}

.small-box .icon {
  top: 10px;
  right: 15px;
  font-size: 70px;
  transition: all 0.3s ease;
}

.small-box:hover .icon {
  font-size: 80px;
  top: 5px;
}

.small-box h3 {
  font-size: 32px;
  font-weight: 700;
  margin: 0 0 10px 0;
}

.small-box p {
  font-size: 16px;
}

.small-box .small-box-footer {
  border-radius: 0 0 12px 12px;
  padding: 8px 0;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
}

.small-box .small-box-footer:hover {
  background-color: rgba(0, 0, 0, 0.2);
  padding-right: 5px;
}

/* Progress bars */
.progress {
  height: 12px;
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.06);
  border-radius: 30px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
  margin-bottom: 12px;
  position: relative;
}

.progress-bar {
  height: 100%;
  border-radius: 30px;
  position: relative;
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
  transition: width 1s cubic-bezier(0.22, 0.61, 0.36, 1);
  background-image: linear-gradient(45deg, 
                    rgba(255, 255, 255, 0.15) 25%, 
                    transparent 25%, 
                    transparent 50%, 
                    rgba(255, 255, 255, 0.15) 50%, 
                    rgba(255, 255, 255, 0.15) 75%, 
                    transparent 75%, 
                    transparent);
  background-size: 40px 40px;
  animation: progress-bar-stripes 2s linear infinite;
}

/* Animated stripes effect */
@keyframes progress-bar-stripes {
  from { background-position: 40px 0; }
  to { background-position: 0 0; }
}

/* Subtle glow animation */
@keyframes glow {
  0% { box-shadow: 0 0 3px rgba(255, 255, 255, 0.2) inset; }
  50% { box-shadow: 0 0 8px rgba(255, 255, 255, 0.4) inset; }
  100% { box-shadow: 0 0 3px rgba(255, 255, 255, 0.2) inset; }
}

/* Color variants with improved gradients */
.bg-aqua .progress-bar, .bg-blue .progress-bar, .bg-primary .progress-bar {
  background-color: #3498db;
  background-image: linear-gradient(135deg, #3498db, #2980b9);
}

.bg-green .progress-bar {
  background-color: #2ecc71;
  background-image: linear-gradient(135deg, #2ecc71, #27ae60);
}

.bg-red .progress-bar {
  background-color: #e74c3c;
  background-image: linear-gradient(135deg, #e74c3c, #c0392b);
}

.bg-yellow .progress-bar {
  background-color: #f39c12;
  background-image: linear-gradient(135deg, #f39c12, #e67e22);
}

.bg-purple .progress-bar {
  background-color: #9b59b6;
  background-image: linear-gradient(135deg, #9b59b6, #8e44ad);
}

/* Progress description typography */
.progress-description {
  display: flex;
  justify-content: space-between;
  font-size: 13px;
  font-weight: 600;
  color: rgba(0, 0, 0, 0.7);
  margin-top: 6px;
  padding: 0 2px;
}

/* Loading effect for newly loaded progress bars */
.progress.loading .progress-bar {
  width: 0 !important;
  animation: progress-loading 1.2s ease forwards;
}

@keyframes progress-loading {
  from { width: 0; }
  to { width: var(--final-width); }
}

/* Hover effects */
.progress:hover {
  cursor: pointer;
}

.progress:hover .progress-bar {
  filter: brightness(1.05);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
}

/* Progress bar tooltip */
.progress::after {
  content: attr(data-percentage);
  position: absolute;
  top: -30px;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 3px 8px;
  border-radius: 3px;
  font-size: 11px;
  opacity: 0;
  transform: translateY(10px);
  transition: all 0.3s ease;
  pointer-events: none;
}

.progress:hover::after {
  opacity: 1;
  transform: translateY(0);
}

/* Progress indicator dot */
.progress-bar::after {
  content: '';
  position: absolute;
  right: 0;
  top: 50%;
  transform: translate(50%, -50%);
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.progress:hover .progress-bar::after {
  opacity: 1;
}

/* Completion animation */
.progress-bar.complete {
  animation: complete-pulse 1s ease;
}

@keyframes complete-pulse {
  0% { filter: brightness(1); }
  50% { filter: brightness(1.3); }
  100% { filter: brightness(1); }
}

/* Progress bar with count in center */
.progress.with-count {
  height: 24px;
}

.progress.with-count::before {
  content: attr(data-count);
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 12px;
  font-weight: bold;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
  z-index: 5;
}

/* Buttons styling */
.btn {
  border-radius: 6px;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 0.5px;
  border: none;
  padding: 8px 16px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.btn:hover, .btn:focus, .btn:active {
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
}

.btn-flat {
  box-shadow: none;
  border-radius: 6px;
}

.btn-flat:hover, .btn-flat:focus, .btn-flat:active {
  transform: none;
  box-shadow: none;
  opacity: 0.85;
}

/* Labels */
.label {
  padding: 5px 10px;
  font-weight: 600;
  border-radius: 100px;
  font-size: 11px;
}

/* Callout styling */
.callout {
  border-radius: 8px;
  padding: 18px;
  margin: 15px 0;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  border-left-width: 4px;
}

.callout.callout-info {
  border-color: #3498db;
  background-color: #eef7fb;
}

.callout.callout-danger {
  border-color: #e74c3c;
  background-color: #fdf3f2;
}

.callout.callout-warning {
  border-color: #f39c12;
  background-color: #fef5e7;
}

/* Tables styling */
.table-bordered {
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid #f0f0f0;
}

.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9fafb;
}

.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tbody > tr > td {
  border: 1px solid #f0f0f0;
  padding: 12px 10px;
}

.table-bordered > thead > tr > th {
  background-color: #f1f4f9;
  border-bottom: 2px solid #e9ecef;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  font-size: 12px;
  color: #495057;
}

/* Timeline styling */
.timeline:before {
  background: #e9ecef;
  width: 3px;
}

.timeline > li > .timeline-item {
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  border: none;
}

.timeline > li > .timeline-item > .timeline-header {
  padding: 15px;
  font-weight: 600;
  border-bottom: 1px solid #f7f7f7;
}

.timeline > li > .timeline-item > .timeline-body {
  padding: 15px;
}

.timeline > li > .fa,
.timeline > li > .fas,
.timeline > li > .far {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  line-height: 35px;
  font-size: 16px;
  text-align: center;
  background-color: #3498db;
  color: #fff;
  z-index: 5;
}

.time-label > span {
  border-radius: 4px;
  padding: 6px 12px;
  font-weight: 600;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

/* Direct chat styling */
.direct-chat-messages {
  border-radius: 8px;
  background-color: #f9fafb;
  padding: 15px;
}

.direct-chat-msg {
  margin-bottom: 20px;
}

.direct-chat-text {
  border-radius: 12px;
  padding: 12px 15px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
  margin: 8px 0;
}

.direct-chat-name {
  font-weight: 600;
}

.direct-chat-timestamp {
  opacity: 0.7;
  font-size: 12px;
}

.direct-chat-img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.right .direct-chat-text {
  border-radius: 12px;
}

/* Modal styles */
.modal-content {
  border-radius: 12px;
  border: none;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  overflow: hidden;
}

.modal-header {
  padding: 18px 20px;
  border-bottom: 1px solid #f0f0f0;
}

.modal-body {
  padding: 20px;
}

.modal-footer {
  padding: 15px 20px;
  border-top: 1px solid #f0f0f0;
}

/* Input and form elements */
.form-control {
  border-radius: 6px;
  border: 1px solid #e2e8f0;
  padding: 10px 15px;
  height: auto;
  box-shadow: none;
  transition: all 0.3s ease;
}

.form-control:focus {
  border-color: #3498db;
  box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
}

.input-group-addon {
  border-radius: 6px 0 0 6px;
  border: 1px solid #e2e8f0;
  background-color: #f8fafc;
}

/* Map container */
#map {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  min-height: 500px;
}

/* Color enhancements for better visual hierarchy */
.bg-aqua, .bg-blue, .bg-primary {
  background-color: #3498db !important;
}

.bg-green {
  background-color: #2ecc71 !important;
}

.bg-red {
  background-color: #e74c3c !important;
}

.bg-yellow {
  background-color: #f39c12 !important;
}

.bg-purple {
  background-color: #9b59b6 !important;
}

.bg-maroon {
  background-color: #8e44ad !important;
}

.bg-teal {
  background-color: #16a085 !important;
}

.label-success {
  background-color: #2ecc71 !important;
}

.label-warning {
  background-color: #f39c12 !important;
}

.label-danger {
  background-color: #e74c3c !important;
}

/* Specific adjustments for payment section */
.payment-calculator {
  background-color: #f9fafb;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

.payment-calculator .table {
  margin-bottom: 0;
}

.payment-method {
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  padding: 15px 10px;
  text-align: center;
  transition: all 0.3s ease;
  cursor: pointer;
  margin-bottom: 15px;
  background-color: #fff;
}

.payment-method:hover {
  border-color: #3498db;
  box-shadow: 0 2px 8px rgba(52, 152, 219, 0.15);
  transform: translateY(-3px);
}

.payment-method.active {
  border-color: #3498db;
  background-color: #eef7fb;
}

/* Animation effects */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideInUp {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
}

.row > div {
  animation: fadeIn 0.5s ease forwards;
}

.small-box, .info-box {
  animation: slideInUp 0.5s ease forwards;
}

.callout, .box {
  animation: fadeIn 0.6s ease forwards;
}

.box-primary {
  animation-delay: 0.1s;
}

.small-box:hover .icon, .info-box:hover .info-box-icon i {
  animation: pulse 1s infinite;
}

/* Stagger loading animations for elements */
.row > div:nth-child(1) { animation-delay: 0.1s; }
.row > div:nth-child(2) { animation-delay: 0.2s; }
.row > div:nth-child(3) { animation-delay: 0.3s; }
.row > div:nth-child(4) { animation-delay: 0.4s; }

/* Responsive adjustments */
@media (max-width: 767px) {
  .small-box h3 {
    font-size: 24px;
  }
  
  .info-box-content {
    padding: 5px 10px;
  }
  
  .info-box-number {
    font-size: 18px;
  }
}

/* Custom loading spinner */
.loading-spinner {
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 3px solid rgba(255,255,255,.3);
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Hover effect for timeline items */
.timeline > li > .timeline-item:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  transform: translateY(-2px);
  transition: all 0.3s ease;
}

/* Improve datatable pagination */
.dataTables_wrapper .dataTables_paginate .paginate_button {
  border-radius: 4px;
  border: none !important;
  background: #f8fafc !important;
  margin: 0 2px;
  padding: 6px 12px !important;
  transition: all 0.3s ease;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover,
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
  background: #3498db !important;
  color: white !important;
  box-shadow: 0 2px 5px rgba(52, 152, 219, 0.3);
}

/* Improve search input in datatable */
.dataTables_wrapper .dataTables_filter input {
  border-radius: 6px;
  border: 1px solid #e2e8f0;
  padding: 6px 10px;
}

/* Add a cool badge effect to some counters */
.badge-effect {
  position: relative;
  overflow: hidden;
}

.badge-effect::after {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(
    to bottom right,
    rgba(255, 255, 255, 0) 0%,
    rgba(255, 255, 255, 0.4) 50%,
    rgba(255, 255, 255, 0) 100%
  );
  transform: rotate(45deg);
  animation: shine 3s infinite;
}

@keyframes shine {
  0% { left: -50%; }
  100% { left: 150%; }
}

/* Improved focus states for accessibility */
a:focus, button:focus, input:focus, select:focus, textarea:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.25);
}

/* Classes for the scroll animation */
.animate-hidden {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}

.animate-visible {
  opacity: 1;
  transform: translateY(0);
}

/* Status badge styling */
.status-badge {
  display: inline-block;
  padding: 6px 12px;
  border-radius: 20px;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 12px;
  letter-spacing: 0.5px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Word-table styling */
.word-table {
  width: 100%;
  margin-bottom: 20px;
  background-color: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.word-table td {
  padding: 12px 15px;
  border-bottom: 1px solid #f0f0f0;
}

.word-table tr:last-child td {
  border-bottom: none;
}

/* Modern Sidebar Design */
.main-sidebar {
  background: linear-gradient(180deg, #2c2c54 0%, #34495e 100%);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
  overflow: hidden;
}

/* User panel with modern design */
.user-panel {
  background: rgba(255, 255, 255, 0.05);
  padding: 20px 15px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.07);
  margin-bottom: 15px;
}

.user-panel .image {
  padding: 3px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

.user-panel .image:hover {
  transform: scale(1.05);
  box-shadow: 0 0 15px rgba(155, 89, 182, 0.5);
}

.user-panel .image img {
  border: 2px solid #9b59b6;
  box-shadow: 0 0 10px rgba(155, 89, 182, 0.3);
}

.user-panel .info {
  padding: 5px 5px 5px 10px;
}

.user-panel .info p {
  font-weight: 600;
  margin-bottom: 5px;
  font-size: 16px;
  color: #ffffff;
  letter-spacing: 0.5px;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.user-panel .info a {
  font-size: 12px;
  padding: 3px 8px;
  border-radius: 20px;
  background: rgba(46, 204, 113, 0.2);
  transition: all 0.3s;
  color: #2ecc71;
  font-weight: 600;
  letter-spacing: 0.3px;
}

.user-panel .info a:hover {
  background: rgba(46, 204, 113, 0.3);
  transform: translateY(-2px);
}

.user-panel .info a i.text-success {
  color: #2ecc71;
  animation: pulse-green 2s infinite;
}

@keyframes pulse-green {
  0% { opacity: 1; }
  50% { opacity: 0.6; }
  100% { opacity: 1; }
}

/* Search form styling */
.sidebar-form {
  border: none !important;
  margin: 10px 10px 20px;
}

.sidebar-form .input-group {
  border-radius: 50px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.05);
  transition: all 0.3s;
}

.sidebar-form input[type="text"] {
  background: rgba(255, 255, 255, 0.1);
  border: none;
  border-radius: 50px 0 0 50px;
  color: rgba(255, 255, 255, 0.9);
  height: 35px;
  padding-left: 15px;
  font-size: 14px;
  font-weight: 500;
}

.sidebar-form input[type="text"]::placeholder {
  color: rgba(255, 255, 255, 0.5);
}

.sidebar-form input:focus {
  color: #fff !important;
  background: rgba(255, 255, 255, 0.15) !important;
  box-shadow: none;
}

.sidebar-form .btn {
  border-radius: 0 50px 50px 0 !important;
  background: rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.7);
  height: 35px;
  transition: all 0.3s;
}

.sidebar-form .btn:hover {
  background: rgba(155, 89, 182, 0.4) !important;
  color: #fff;
}

.sidebar-form:hover .input-group {
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
  transform: translateY(-2px);
}

/* Menu section headers */
.sidebar-menu .header {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  padding: 15px 20px 10px;
  color: rgba(255, 255, 255, 0.4);
  background: rgba(0, 0, 0, 0.15);
  margin-top: 5px;
  margin-bottom: 5px;
  border: none;
}

/* Menu items design */
.sidebar-menu > li {
  border-radius: 8px;
  margin: 6px 10px;
  overflow: hidden;
  transition: all 0.3s;
}

.sidebar-menu > li > a {
  border-radius: 8px;
  padding: 12px 15px;
  transition: all 0.3s ease;
  color: rgba(255, 255, 255, 0.8);
  font-weight: 500;
  letter-spacing: 0.3px;
  border-left: 3px solid transparent;
}

.sidebar-menu > li > a > i, 
.sidebar-menu > li > a > .fa, 
.sidebar-menu > li > a > .fas, 
.sidebar-menu > li > a > .far {
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  font-size: 16px;
  margin-right: 8px;
  border-radius: 6px;
  background: rgba(0, 0, 0, 0.2);
  color: #9b59b6;
  transition: all 0.3s;
}

.sidebar-menu > li:hover {
  background: rgba(255, 255, 255, 0.05);
}

.sidebar-menu > li:hover > a {
  color: white;
  border-left-color: #9b59b6;
  padding-left: 17px;
}

.sidebar-menu > li:hover > a > i,
.sidebar-menu > li:hover > a > .fa,
.sidebar-menu > li:hover > a > .fas,
.sidebar-menu > li:hover > a > .far {
  background: rgba(155, 89, 182, 0.3);
  transform: translateX(3px);
  color: white;
}

/* Active menu item */
.sidebar-menu > li.active {
  background: linear-gradient(90deg, rgba(155, 89, 182, 0.7) 0%, rgba(155, 89, 182, 0.4) 100%);
  box-shadow: 0 5px 15px rgba(155, 89, 182, 0.4);
}

.sidebar-menu > li.active > a {
  color: white;
  border-left-color: white;
}

.sidebar-menu > li.active > a > i,
.sidebar-menu > li.active > a > .fa,
.sidebar-menu > li.active > a > .fas,
.sidebar-menu > li.active > a > .far {
  background: rgba(255, 255, 255, 0.2);
  color: white;
}

/* Submenu (treeview) styling */
.sidebar-menu .treeview-menu {
  margin: 0;
  padding: 5px;
  background: rgba(0, 0, 0, 0.15);
  border-radius: 0 0 8px 8px;
}

.sidebar-menu .treeview-menu > li {
  margin: 3px;
  border-radius: 6px;
  overflow: hidden;
}

.sidebar-menu .treeview-menu > li > a {
  padding: 10px 15px;
  border-radius: 6px;
  color: rgba(255, 255, 255, 0.7);
  font-weight: 400;
  font-size: 13px;
  transition: all 0.3s;
  border-left: 2px solid transparent;
}

.sidebar-menu .treeview-menu > li:hover > a {
  background: rgba(255, 255, 255, 0.05);
  color: white;
  padding-left: 18px;
  border-left-color: rgba(155, 89, 182, 0.7);
}

.sidebar-menu .treeview-menu > li.active > a {
  background: rgba(255, 255, 255, 0.07);
  color: white;
  font-weight: 500;
  border-left-color: rgba(155, 89, 182, 1);
}

/* Arrow indicators for dropdown menus */
.sidebar-menu li > a > .pull-right-container {
  position: absolute;
  right: 15px;
  top: 50%;
  margin-top: -7px;
}

.sidebar-menu li > a > .pull-right-container > .fa-angle-left {
  transition: transform 0.3s ease;
}

.sidebar-menu li.active > a > .pull-right-container > .fa-angle-left,
.sidebar-menu li.menu-open > a > .pull-right-container > .fa-angle-left {
  transform: rotate(-90deg);
}

/* Third level menus */
.sidebar-menu .treeview-menu .treeview-menu {
  background: rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  margin: 5px;
  padding: 3px;
}

.sidebar-menu .treeview-menu .treeview-menu > li > a {
  padding-left: 20px;
  font-size: 12px;
}

.sidebar-menu .treeview-menu .treeview-menu > li:hover > a {
  padding-left: 22px;
}

/* Collapsed sidebar improvements */
.sidebar-collapse .sidebar-menu > li {
  margin: 5px 2px;
}

.sidebar-collapse .sidebar-menu > li > a {
  padding: 12px 5px;
}

.sidebar-collapse .main-sidebar .user-panel > .info {
  display: none !important;
}

.sidebar-collapse .sidebar-menu > li > a > i,
.sidebar-collapse .sidebar-menu > li > a > .fa,
.sidebar-collapse .sidebar-menu > li > a > .fas,
.sidebar-collapse .sidebar-menu > li > a > .far {
  font-size: 18px;
  width: 35px;
  height: 35px;
  line-height: 35px;
  margin-right: 0;
}

/* Nice hover indicator */
.sidebar-menu a::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 15px;
  width: 0;
  height: 2px;
  background: rgba(155, 89, 182, 0.7);
  transition: width 0.3s;
}

.sidebar-menu a:hover::after {
  width: 30px;
}

.sidebar-menu .active > a::after {
  background: rgba(255, 255, 255, 0.7);
  width: 30px;
}

/* Responsive Carousel Styling */
.responsive-carousel {
  margin-bottom: 20px;
  border-radius: 3px;
  overflow: hidden;
  box-shadow: 0 1px 3px rgba(0,0,0,.1);
}

.carousel-image {
  width: 100%;
  height: auto;
  object-fit: cover;
}

@media (max-width: 767px) {
  .carousel-image {
    height: 180px;
  }
  .carousel-caption h3 {
    font-size: 16px;
    margin-bottom: 5px;
  }
  .carousel-caption p {
    font-size: 12px;
    margin-bottom: 5px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .carousel-image {
    height: 250px;
  }
}

@media (min-width: 992px) {
  .carousel-image {
    height: 350px;
  }
}

.carousel-caption {
  background: rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  padding: 10px 15px;
  bottom: 20px;
}

.carousel-indicators li {
  border: 1px solid #3c8dbc;
}

.carousel-indicators .active {
  background-color: #3c8dbc;
}

.carousel-control {
  width: 5%;
  opacity: 0.8;
}

.carousel-control.left, 
.carousel-control.right {
  background-image: none;
}
  </style>
</head>

<!-- <body class="sidebar-mini hold-transition fixed skin-purple sidebar-collapse"> open atau collapse --> 
<body class="skin-purple sidebar-mini fixed sidebar-mini-expand-feature" style="height: auto; min-height: 100%;">  
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <center>
          <span class="logo-mini"><?= $this->config->item('sitename_mini') ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><strong><?= $this->config->item('sitename') ?></strong></span>
        </center>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">                   
            <?php
            $user = $this->ion_auth->user()->row();
            ?>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                if (file_exists('assets/uploads/image/user/'.$user->image)) { ?>  
                  <img class="user-image" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">
                  <span class="hidden-xs"><?= $user->full_name; ?></span>
                <?php } else { ?>
                  <img class="user-image" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">                  
                  <span class="hidden-xs"><?= $user->full_name; ?></span>
                <?php } ?>  
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php 
                    if (file_exists('assets/uploads/image/user/'.$user->image)) { ?>                   
                      <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">    
                      <p>
                        <?= $user->full_name; ?>
                      </p>
                  <?php } else { ?>
                      <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">                     
                      <p>
                        <?= $user->full_name; ?>
                      </p>
                  <?php } ?>  
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url(); ?>profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url(); ?>auth/logout" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <?php 
            if (file_exists('assets/uploads/image/user/'.$user->image)) { ?> 
            <div class="pull-left image">
              <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">
            </div>
            <div class="pull-left info">
              <p><?= $user->full_name; ?></p>
              <a href="<?= base_url(); ?>profile"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          <?php } else { ?>
            <div class="pull-left image">
              <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
            </div>
            <div class="pull-left info">
              <p><?= $user->full_name; ?></p>
              <a href="<?= base_url(); ?>profile"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          <?php } ?>  
        </div>
        <!-- search form -->
        <form method="get" class="sidebar-form" id="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search" id="search-input">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu list" id="menuList">
        </ul>
        <ul class="sidebar-menu list" id="menuSub">
          <?php $menus = $this->layout->get_menu() ?>
          <?php if (is_array($menus)) :
            foreach ($menus as $menu) : ?>
              <li class="header"><?php echo $menu['label'] ?></li>
              <?php if (is_array($menu['children'])) : ?>
                <?php foreach ($menu['children'] as $menu2) : ?>
                  <li <?php echo $menu2['attr'] != '' ? ' id="' . $menu2['attr'] . '" ' : '' ?> <?php echo is_array($menu2['children']) ? ' class="treeview" ' : '' ?>>
                    <?php if (is_array($menu2['children'])) : ?>
                      <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                        <i class="<?php echo $menu2['icon'] ?>"></i> &nbsp;<span><?php echo $menu2['label'] ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                      </a>
                      <ul class="treeview-menu">
                        <?php foreach ($menu2['children'] as $menu3) : ?>
                          <li <?php echo $menu3['attr'] != '' ? ' id="' . $menu3['attr'] . '" ' : '' ?>>
                            <?php if (is_array($menu3['children'])) : ?>
                              <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
                                <i class="<?php echo $menu3['icon'] ?>"></i> &nbsp;<span><?php echo $menu3['label'] ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <?php foreach ($menu3['children'] as $menu4) : ?>
                                  <li <?php echo $menu4['attr'] != '' ? ' id="' . $menu4['attr'] . '" ' : '' ?>>
                                    <a href="<?php echo $menu4['link'] != '#' ? base_url($menu4['link']) : '#' ?>" class="name">
                                      <i class="<?php echo $menu4['icon'] ?>"></i> &nbsp;<span><?php echo $menu4['label'] ?></span>
                                    </a>
                                  </li>
                                <?php endforeach ?>
                              </ul>
                            <?php else : ?>
                              <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
                                <i class="<?php echo $menu3['icon'] ?>"></i> &nbsp;<span><?php echo $menu3['label'] ?></span>
                              </a>
                            <?php endif ?>
                          </li>
                        <?php endforeach ?>
                      </ul>
                    <?php else : ?>
                      <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                        <i class="<?php echo $menu2['icon'] ?>"></i> &nbsp;<span><?php echo $menu2['label'] ?>
                      </a>
                    <?php endif ?>
                  </li>
                <?php endforeach ?>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $title; ?>
          <small><?= $subtitle; ?></small>
        </h1>
        <?php $this->layout->breadcrumb($crumb) ?>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php $this->load->view($page); ?>
      </section>
    </div>    

<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- <script src="<?= base_url();?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script> -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_flat-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
// Add fade-in animation when scrolling
document.addEventListener('DOMContentLoaded', function() {
  // Create the observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1
  });

  // Observe all boxes, small-boxes, and info-boxes
  document.querySelectorAll('.box, .small-box, .info-box').forEach(element => {
    element.classList.add('animate-hidden');
    observer.observe(element);
  });
  
  // Add smooth hover effect to buttons
  document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
      this.style.transition = 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
    });
  });
  
  // Make data counters animate when they come into view
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const target = entry.target;
        const countTo = parseInt(target.innerText);
        
        if (!isNaN(countTo)) {
          let count = 0;
          const timer = setInterval(() => {
            count += Math.ceil(countTo / 25);
            if (count >= countTo) {
              target.innerText = countTo;
              clearInterval(timer);
            } else {
              target.innerText = count;
            }
          }, 30);
        }
        
        counterObserver.unobserve(target);
      }
    });
  });
  
  document.querySelectorAll('.small-box h3, .info-box-number').forEach(counter => {
    counterObserver.observe(counter);
  });
});
</script>
<script>
// Initialize interactive progress bars
document.addEventListener('DOMContentLoaded', function() {
  // Get all progress bars
  const progressBars = document.querySelectorAll('.progress');
  
  progressBars.forEach(progress => {
    // Get the bar element
    const bar = progress.querySelector('.progress-bar');
    
    if (bar) {
      // Extract the percentage from style
      const widthStyle = bar.style.width;
      const percentage = widthStyle.replace('%', '');
      
      // Set data attribute for tooltip
      progress.setAttribute('data-percentage', percentage + '%');
      
      // Set animation when coming into view
      progress.classList.add('loading');
      bar.style.setProperty('--final-width', widthStyle);
      
      // Add count for larger progress bars if needed
      if (progress.classList.contains('with-count')) {
        progress.setAttribute('data-count', percentage + '%');
      }
    }
  });
  
  // Animate progress bars when they come into view
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const progress = entry.target;
        const bar = progress.querySelector('.progress-bar');
        
        // Start animation when visible
        setTimeout(() => {
          progress.classList.remove('loading');
        }, 100);
        
        // Check if it's a high completion rate
        const percentage = parseInt(progress.getAttribute('data-percentage'));
        if (percentage > 90) {
          setTimeout(() => {
            bar.classList.add('complete');
          }, 1200);
        }
        
        // Unobserve after animation
        observer.unobserve(progress);
      }
    });
  }, { threshold: 0.2 });
  
  // Observe all progress elements
  progressBars.forEach(progress => {
    observer.observe(progress);
  });
});
</script>