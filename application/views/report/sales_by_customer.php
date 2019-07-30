      <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SALES BY CUSTOMER</h3>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Customer Name</th>
                                <th>Invoice Count</th>
                    		    <th>Sales</th>
                                <th>Sales With Tax</th>
            		        </tr>
                        </thead>
            	       <tbody>
                            <?php $start = 0;
                            foreach ($customer as $c)
                            {
                                $dat = $this->db->get_where('invoice',array('id_customer' => $c->id));
                                $jum = $dat->num_rows();
                                $res = $dat->result();

                                $grand=0;
                                $wtx = 0;
                                foreach($res as $r) {
                                    $grand += $r->grdtotal;
                                    $wtx += $r->grdtotal*10/100;
                                }
                                 
                                ?>
                            <tr>
                    		    <td><?php echo ++$start ?></td>
                                <td><?= $c->first_name.' '.$c->last_name ?></td>
                                <td><?= $jum ?></td>
                                <td><?= rupiah($grand) ?> </td>
                                <td>
                                    <?= rupiah($grand+$wtx) ?>
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