<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Jurusan Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr><td>Bidang Keahlian</td><td><?php echo $bidang_keahlian; ?></td></tr>
            	    <tr><td>Nama Jurusan</td><td><?php echo $nama_jurusan; ?></td></tr>
                    <tr><td>Kuota Jurusan</td><td><?php echo $kuota_jurusan; ?></td></tr>
                    <tr><td>Status Jurusan</td><td><?php echo $status_jurusan; ?></td></tr>
            	    <tr><td><a href="<?php echo site_url('jurusan') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
            	</table>
            </div>
        </div>
    </div>
</div>