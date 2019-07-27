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
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $quotation->kdquo ?></td>
                            <td><?php echo $quotation->reference ?></td>
                            <td><?php echo $quotation->quodate ?></td>
                            <td><?php echo $quotation->expdate ?></td>
                            <td><?php echo $quotation->custkd ?></td>
                            <td><?php echo ($quotation->status == 0 ? "Estimated" : "Invoiced"); ?>
                            </td>
                            <td><?php echo $quotation->grdtotal ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
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