<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">List Menu type</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
          <i class="fa fa-refresh"></i></button>
        </div>
      </div>

      <div class="box-body">
      <form id="myform" method="post" onsubmit="return false">
        <div class="row" style="margin-bottom: 10px">
          <div class="col-xs-6 col-md-6">
            <?php echo anchor(site_url('menu_type/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
          </div>
          <div class="col-xs-6 col-md-6 text-right">
<!--             <?php echo anchor(site_url('menu_type/printdoc'), '<i class="fas fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?> -->
          </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
          <thead>
            <tr>
              <th width=""></th>
              <th width="10px">No</th>
  		        <th>Type</th>
              <th width="80px">Action</th>
            </tr>
          </thead>
          </table>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>