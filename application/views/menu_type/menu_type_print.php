<!DOCTYPE html>
<html>
<head>
    <title>Type Mune</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 11px;
        padding-bottom: 11px;
        background-color: #39CCCC;
      }
      table td{
        border: 1px solid;
      }
    </style>
</head>
<body>
  <h3 align="center">Data Menu Type</h3>
  <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
      <tr>
        <th>No</th>
		    <th>Type</th>
      </tr>
      <?php
      foreach ($menu_type_data as $menu_type)
      { ?>
      <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $menu_type->type ?></td>
      </tr>
      <?php } ?>
    </table>
</body>
<script type="text/javascript">
  window.print()
</script>
</html>