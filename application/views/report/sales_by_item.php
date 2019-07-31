
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SALES BY ITEM</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Item Name</th>
                    <th>Quantity Sold</th>
        		    <th>Amount</th>
                    <th>Average Prize</th>
		        </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($item as $i)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $i->nama ?></td>
            <td><?php echo count($item->kdinv) ?></td>
            <td><?php echo $item->grdtotal ?></td>
            <td><?php echo $item->grdtotal/count($item->kdinv) ?></td>
            
		    </tr>
                <?php
            }
            ?>
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