        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
             <?= $this->session->flashdata('message') ?>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PEMBAYARAN </h3>
                  

                  <div class="box-tools pull-right">
                    <?php echo anchor('payment_received/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah record"'); ?>
                      <?php anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
                      <?php anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
                  </div>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                    		    <th>Tanggal pembayaran</th>
                                <th>Tanggal faktur</th>
                                <th>Faktur</th>
                    		    <th>Nama klien</th>
                                <th>Jumlah</th>
            		            <th>Opsi</th>
                            </tr>
                        </thead>
            	       <tbody>
                        <?php
                        $start = 0;
                        foreach ($pays as $p)
                        {
                            ?>
                            <tr>
                                <?php $inv = $this->db->get_where('invoice',array('id' => $p->invoice_id))->row(); ?>
                    		    <td><?= toDateInd($p->payment_date) ?></td>
                                <td><?= toDateInd($inv->invdate) ?></td>
                                <td><a href="<?= base_url('invoice/detail/'.$inv->kdinv) ?>"><?= $inv->kdinv ?></a></td>

                                <?php $dat = getData('customer','id',$inv->id_customer,'display_name,id');  ?>
                                <td><a href="<?= base_url('customer/detail/'.$dat->id) ?>"><?= $dat->display_name ?></a></td>
                                <td><?= rupiah($p->payment_amount) ?></td>
                        
                    		    <td width="140px">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-cog"></i> Opsi<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="<?= base_url('payment_received/detail/'.$p->id) ?>" ><i class="fa fa-trash"></i> Hapus</a></li>
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