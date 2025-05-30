<!doctype html>
<html>
    <head>
        <title>Data Jurusan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Jurusan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		        <th>Nama Jurusan</th>
                <th>Kuota</th>
                <th>Status</th>
		    </tr>
            <?php
                foreach ($jurusan_data as $jurusan)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
                <td><?php echo $jurusan->bidang_keahlian ?></td>
		        <td><?php echo $jurusan->nama_jurusan ?></td>
                <td><?php echo $jurusan->kuota_jurusan ?></td> 
                <td><?php echo $jurusan->status_jurusan ?></td>  	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>