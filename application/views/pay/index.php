        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PAYMENT_RECEIVED LIST </h3>
                  <div class="box-tools pull-right">
                      <?= anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
                      <?= anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
                  </div>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                    		    <th>Kd Payment Received</th>
                                <th>Payment Date</th>
                                <th>Cust Name</th>
                    		    <th>Kd Invoice</th>
                                <th>Bank Charge</th>
                                <th>Amount</th>
                                <th>Pay Remain</th>
            		            <th>Action</th>
                            </tr>
                        </thead>
            	       <tbody>
                        <?php
                        $start = 0;
                        foreach ($pays as $p)
                        {
                            ?>
                            <tr>
                    		    <td><?= ++$start ?></td>
                    		    <td><?= $p->kdpayrec ?></td>
                                <td><?= $p->paydate ?></td>
                                <td><?php $dat = getData('customer','id',$p->id_customer,'display_name'); echo $dat->display_name ?></td>
                                <td><?= $p->kdinv ?></td>
                                <td><?= rupiah($p->bankcharge) ?></td>
                                <td><?= rupiah($p->amount) ?></td>
                                <td><?php 
                                    $set = $p->dueamount-$p->amount; echo rupiah($set);
                                ?></td>
                        
                    		    <td width="140px">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Aksi <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="<?= base_url('payment_received/detail/'.$p->kdpayrec) ?>" class="toggle-modal" >Detail</a></li>
                                        </ul>
                                      </div>
                    		    </td>
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
                </div>
              </div>
            </div>
          </div>
        </section>