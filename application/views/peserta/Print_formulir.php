<html>
<?php
  $user = $this->ion_auth->user()->row();
?>
<head>
    <title>Formulir Pendaftaran</title>
    <style type="text/css" media="print">
    @page {
        margin-top: 0.5cm;
        margin-bottom: 1.5cm;
        margin-left: 1.5cm;
        margin-right: 1.5cm;
    }
    
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        line-height: 1.5;
        color: #333;
        background-color: #fff;
        margin: 0;
        padding: 0;
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 15px;
        font-size: 11pt;
    }
    
    table th {
        -webkit-print-color-adjust: exact;
        background-color: #f5f5f5;
        color: #333;
        font-weight: 600;
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    
    table td {    
        border: 1px solid #ddd;
        padding: 8px;
        vertical-align: middle;
    }
    
    /* Header Styling */
    .header-table {
        border: none;
        margin-bottom: 10px;
    }
    
    .header-table td {
        border: none;
        padding: 3px 0;
        vertical-align: middle;
    }
    
    /* Logo Styling */
    .logo-cell {
        width: 100px;
        text-align: center;
    }
    
    /* Typography Styles */
    .text-small {
        font-size: 9pt;
    }
    
    .text-large {
        font-size: 20pt;
        font-weight: bold;
    }
    
    .text-medium {
        font-size: 16pt;
        font-weight: bold;
    }
    
    /* Section Styling */
    .section-header {
        background-color: #f9f9f9;
        font-weight: bold;
        border-bottom: 2px solid #333;
        padding: 8px;
        margin: 15px 0 5px 0;
    }
    
    /* Data Row Styling */
    .label-cell {
        background-color: #f5f5f5;
        width: 25%;
        font-weight: 600;
    }
    
    /* Photo Styling */
    .photo-cell {
        width: 20%;
        text-align: center;
        vertical-align: middle;
        border-right: 1px solid #ddd;
        padding: 10px;
    }
    
    .photo-container {
        border: 1px solid #ddd;
        padding: 3px;
        background-color: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        display: inline-block;
    }
    
    /* Signature Section */
    .signature-table {
        margin-top: 20px;
    }
    
    .signature-table td {
        border: none;
        padding: 5px;
        vertical-align: top;
        text-align: center;
    }
    
    .signature-line {
        border-top: 1px solid #000;
        width: 80%;
        margin: 50px auto 0;
    }
    
    /* QR Code Styling */
    .qrcode-cell {
        width: 15%;
        vertical-align: top;
    }
    
    /* Table Data Styling */
    .center-align {
        text-align: center;
    }
    
    .data-table th {
        background-color: #f0f0f0;
        font-size: 10pt;
        text-align: center;
    }
    
    .data-row:nth-child(even) {
        background-color: #fcfcfc;
    }
    
    /* Header divider */
    .header-divider {
        border-bottom: 2px solid #333;
        margin: 5px 0 20px 0;
    }
    
    /* Document title */
    .document-title {
        font-weight: bold;
        font-size: 14pt;
        margin-bottom: 5px;
    }
    
    .document-subtitle {
        font-weight: bold;
        font-size: 12pt;
        margin-bottom: 15px;
    }
    
    /* Footer note */
    .footer-note {
        margin-top: 20px;
        font-size: 9pt;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }
    
    /* Watermark for official document */
    .document-official {
        text-align: right;
        font-size: 9pt;
        line-height: 1.4;
        color: #555;
    }
    </style>
</head>
<body>
<?php if (file_exists('assets/dist/img/'.$pengaturan->header)) { ?>
    <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->header) ?>" width="100%">  
<?php } else { ?> 	
      <table class="header-table">    
        <tr>	
            <td class="logo-cell" rowspan="3">
                <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->logo) ?>" height="80px">
            </td>	   
            <td class="text-medium">PENERIMAAN PESERTA DIDIK BARU (PPDB)</td>
            <td></td>
        </tr> 
        <tr>	    
            <td class="text-large"><?php echo strtoupper($pengaturan->nama_sekolah) ?></td>
            <td></td>
        </tr> 
        <tr>	    
            <td class="text-small"><?php echo ucwords($pengaturan->alamat) ?> Kec.<?php echo ucwords($pengaturan->kecamatan) ?>, <?php echo ucwords($pengaturan->kabupaten) ?> Kode Pos <?php echo $pengaturan->kode_pos ?> </td>
            <td></td>
        </tr>                                                             
    </table>
    <div class="header-divider"></div>
<?php } ?>

    <?php $th = $peserta->tahun_pelajaran + 1; ?>  
    <table>   
        <tr>	
            <td style="width:60%; border: none;">
            <?php if ($peserta->status=='Sudah diverifikasi' || $peserta->status=='Berkas Kurang') { ?>
                <div class="document-title">TANDA BUKTI VERIFIKASI PENDAFTARAN</div>
            <?php } else { ?>
                <div class="document-title">TANDA BUKTI PENDAFTARAN</div>
            <?php } ?>				
                <div class="document-subtitle">SISTEM PENERIMAAN MURID BARU</div>
                Tahun Pelajaran <?php echo $peserta->tahun_pelajaran ?>/<?php echo $th ?>				
            </td>	    
            <td class="document-official" style="border: none;">
                Dokumen ini resmi dikeluarkan oleh<br>
                <strong><?php echo $pengaturan->nama_sekolah ?></strong><br>
                melalui <?php echo $pengaturan->website ?>
            </td>
        </tr>                                                                     
    </table>

    <div class="section-header">INFO PENDAFTARAN <?php echo $peserta->ket ?></div>
    <table>
        <tr>	
            <th style="width:20%">No. Pendaftaran</th>	    
            <th style="width:30%">Jalur</th>
            <th style="width:30%">Tanggal Daftar</th>
            <th>Status</th>
        </tr>
        <tr class="data-row">	
            <td class="center-align"><?php echo $peserta->no_pendaftaran ?></td>	    
            <td><?php echo $peserta->jalur ?></td>
            <td class="center-align"><?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_daftar))); ?></td>
            <td class="center-align"><strong><?php echo $peserta->status ?></strong></td>
        </tr>                                                                      
    </table>

    <div class="section-header">BIODATA SISWA</div>
    <table> 
        <tr>
            <td rowspan="11" class="photo-cell">
                <div class="photo-container">
                    <?php 
                    if ($berkas) { ?>  
                      <img src="<?php echo base_url('assets/uploads/attachment/'.$berkas->nama_berkas) ?>" width="130px" height="170px">
                    <?php } else { ?>
                      <img src="<?php echo base_url('assets/uploads/image/user/foto.jpg') ?>" width="120px" height="160px">
                    <?php } ?>
                </div>  
            </td>		    
            <td class="label-cell">Nama Peserta</td>
            <td><strong><?php echo strtoupper($peserta->nama_peserta) ?></strong></td>
        </tr>
        <tr>    
            <td class="label-cell">Jenis Kelamin</td>
            <td>
            <?php if ($peserta->jenis_kelamin=='L') {
            	echo 'Laki-laki';
            } else {
            	echo 'Perempuan';
            } ?>
            </td>
        </tr>
        <tr>    
            <td class="label-cell">NISN</td>
            <td><?php echo $peserta->nisn ?></td>
        </tr>
    <?php if ($formulir->nik=='Ya'){ ?>
        <tr>
            <td class="label-cell">NIK</td>
            <td><?php echo $peserta->nik ?></td>
        </tr>
    <?php } ?>
    <?php if ($formulir->no_kk=='Ya'){ ?>
        <tr>
            <td class="label-cell">No Kartu Keluarga</td>
            <td><?php echo $peserta->no_kk ?></td>
        </tr>
    <?php } ?>			
        <tr>
            <td class="label-cell">Tempat Tanggal Lahir</td>
            <td><?php 
                $tempat_lahir = strtolower($peserta->tempat_lahir);
                echo ucwords($tempat_lahir) ?>, <?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir))); ?>
            </td>
        </tr>
        <tr>
            <td class="label-cell">Agama</td>
            <td><?php echo $peserta->agama ?></td>
        </tr>
        <tr>
            <td class="label-cell">Alamat</td>
            <td><?php echo $peserta->alamat ?></td>
        </tr>
        <tr>    
            <td class="label-cell">No. Handphone</td>
            <td><?php echo $peserta->nomor_hp ?></td>
        </tr>
        <tr>		    
            <td class="label-cell">Sekolah Asal</td>
            <td><?php echo $peserta->asal_sekolah ?></td>
        </tr>
    <?php if ($formulir->latitude=='Ya' and $formulir->longitude=='Ya'){ ?>				
        <tr>
            <td class="label-cell">Latitude/Longitude</td>
            <td><?php echo $peserta->latitude ?> / <?php echo $peserta->longitude ?></td>
        </tr>
    <?php } ?>			
    </table>
    
    <?php if ($formulir->pilihan_sekolah_lain=='Ya' || $formulir->nilai_rapor=='Ya' || $formulir->nilai_usbn=='Ya' || $formulir->nilai_unbk_unkp=='Ya'){ ?>
    <div class="section-header">PILIHAN SEKOLAH & NILAI AKADEMIK</div>
    <table class="data-table">		
        <tr>
            <th style="width:5%; text-align: center;">No</th>
            <th>Pilihan Sekolah</th>			
            <th style="width:12%;">Nilai Rapor</th>
            <th style="width:12%;">Nilai US</th>
            <th style="width:12%;">Nilai UN</th>
        </tr>
        <tr class="data-row">
            <td class="center-align">1</td>
            <td><strong><?php echo $pengaturan->nama_sekolah ?></strong></td>			
            <td class="center-align">
                <?php if ($formulir->nilai_rapor=='Ya') { 			 
                    echo $peserta->nilai_rapor; 
                } ?>
            </td>
            <td class="center-align">
                <?php if ($formulir->nilai_usbn=='Ya') { 			 
                    echo $peserta->nilai_usbn; 
                } ?>
            </td>
            <td class="center-align">
                <?php if ($formulir->nilai_unbk_unkp=='Ya') { 			 
                    echo $peserta->nilai_unbk_unkp; 
                } ?>
            </td>
        </tr>
        <tr class="data-row">		
            <td class="center-align">2</td>
            <td><?php echo $peserta->pilihan_sekolah_lain ?></td>
            <td class="center-align">-</td>
            <td class="center-align">-</td>
            <td class="center-align">-</td>			    
        </tr>				
    </table>
    <?php } ?>

    <?php if ($formulir->jurusan=='Ya'){ ?>
    <div class="section-header">PILIHAN JURUSAN</div>
        <table class="data-table">		
            <tr>
                <th style="width:5%; text-align: center;">No</th>
                <th>Nama Jurusan</th>
            </tr>
            <tr class="data-row">
                <td class="center-align">1</td>
                <td>
                	<?php 
                		if ($peserta->nama_jurusan=='Umum') {
                			echo '';
                		} else {
                			echo $peserta->nama_jurusan;
                		}
                	?>
                </td>
            </tr>
        </table>
        
        <div style="margin-top: 20px; padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9;">
            <strong>Catatan Penting:</strong>
            <p>Apabila calon peserta didik mengundurkan diri setelah tanggal 7 Juli 2024, maka uang pendaftaran tidak dapat dikembalikan.</p>
        </div>
    <?php } ?>  

    <?php if ($raporsemester) { ?> 
    <div class="section-header">NILAI SEMESTER</div>
        <table class="data-table">
        	<tr>
                <th rowspan="2" style="width:5%;">No</th>
                <th rowspan="2">Mata Pelajaran</th>
                <th colspan="5">Nilai Semester</th>
            </tr>
        	<tr>
                <th style="width:10%;">1</th>
                <th style="width:10%;">2</th>
                <th style="width:10%;">3</th>
                <th style="width:10%;">4</th>
                <th style="width:10%;">5</th>
            </tr>        
        <?php
        $no=1;
        foreach ($raporsemester as $value):?>
        	<tr class="data-row">
                <td class="center-align"><?php echo $no++;?></td>
                <td><?php echo $value->mapel ?></td>
                <td class="center-align"><?php echo $value->satu ?></td>
                <td class="center-align"><?php echo $value->dua ?></td>
                <td class="center-align"><?php echo $value->tiga ?></td>
                <td class="center-align"><?php echo $value->empat ?></td>
                <td class="center-align"><?php echo $value->lima ?></td>
            </tr>    
        <?php endforeach; ?>   
        </table>
    <?php } ?>    

    <?php if ($prestasipeserta) { ?>    
    <div class="section-header">PRESTASI AKADEMIK/NON AKADEMIK</div>
        <table class="data-table">
        	<tr>
                <th style="width:5%;">No</th>
                <th>Jenis</th>
                <th>Nama Prestasi</th>
                <th style="width:10%;">Tahun</th>
                <th>Penyelenggara</th>
                <th>Tingkat</th>
                <th style="width:10%;">Juara</th>
            </tr>
        <?php
        $no=1;
        foreach ($prestasipeserta as $value):?>
        	<tr class="data-row">
                <td class="center-align"><?php echo $no++;?></td>
                <td><?php echo $value->jenis ?></td>
                <td><?php echo $value->nama_prestasi ?></td>
                <td class="center-align"><?php echo $value->tahun ?></td>
                <td><?php echo $value->penyelenggara ?></td>
                <td><?php echo $value->tingkat ?></td>
                <td class="center-align"><?php echo $value->juara ?></td>
            </tr>    
        <?php endforeach; ?>   
        </table>
    <?php } ?>

    <?php if ($pengumuman) { ?>
    <div style="margin: 20px 0; padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9;">
        <?php foreach ($pengumuman as $text) { ?>				
            <?php echo $text->text ?>
        <?php } ?>
    </div>
    <?php } ?>

    <table class="signature-table">
        <tr>
            <td class="qrcode-cell">
                <img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px">
            </td> 
            <td style="width:28%;">
                <div style="text-align: left;">
                    a/n <?php echo strtoupper($peserta->nama_peserta) ?><br>
                    Menyetujui data diatas,<br>
                    Ortu/Wali Siswa terdaftar
                </div>
                <div class="signature-line"></div><br><br><br>
                (..................................................)
            </td>
            <td style="width:28%;">
                <div style="text-align: left;">
                    Menyetujui data diatas,<br>
                    Siswa terdaftar
                </div><br><br><br><br>
                <div class="signature-line"></div>
                <strong><?php echo strtoupper($peserta->nama_peserta) ?></strong>
            </td>     
            <td style="width:29%;">
                <div style="text-align: left;">
                    <?php echo ucwords($pengaturan->kecamatan) ?>,<br>
                    Panitia PPDB 
                </div><br><br><br><br>
                <div class="signature-line"></div>
                <strong><?php echo strtoupper($user->full_name) ?></strong>
            </td>
        </tr>
    </table>
    
    <div class="footer-note">
        Nama Peserta Didik <strong><?php echo strtoupper($peserta->nama_peserta) ?></strong> sudah melakukan registrasi di
        <?php echo $pengaturan->website ?>. Terima kasih.
    </div>
</body>
<script type="text/javascript">
    window.print()
</script>
</html>