<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>QUOTATION LIST </h3>
          <div class="box-tools pull-right">
              <?php echo anchor('quotation/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah quotation"'); ?>
              <?php echo anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
              <?php echo anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
          </div>
        </div><!-- /.box-header -->
        <div class='box-body'>
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Kode</th>
                        <th>Reference</th>
                        <th>Quot Date</th>
                        <th>Exp Date</th>
                        <th>Cust Name</th>
            		    <th>Status</th>
            		    <th>Amount</th>
            		    <th>Action</th>
                    </tr>
                </thead>
    	    <tbody>
                <?php $start = 0; foreach ($quotations as $q): ?>
                <tr>
                    <td><?= ++$start ?></td>
                    <td><?= $q->kdquo ?></td>
                    <td><?= $q->reference ?></td>
                    <td><?= $q->quodate ?></td>
                    <td><?= $q->expdate ?></td>
                    <td><?php $dat = getData('customer','id',$q->id_customer,'display_name'); echo $dat->display_name ?></td>
                    <td><?= ($q->status == 0 ? "Estimated" : "Invoiced"); ?>
                    </td>
                    <td><?= rupiah($q->grdtotal) ?></td>
                    <td width="140px">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="<?= base_url('customer/detail/'.$q->kdquo) ?>" >Detail</a></li>
                            <li><a href="<?= base_url('customer/edit/'.$q->kdquo) ?>">Edit</a></li>
                          </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
            <script src="<?= base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
            <script src="<?= base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#mytable").dataTable();
                });
            </script>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->