<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <?= $this->session->flashdata('message'); ?>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>TAGIHAN TAGIHAN</h3>
          <div class="box-tools pull-right">
            <?php echo anchor('invoice/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah invoice"'); ?>
              <?php anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
              <?php anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
          </div>
        </div>
        <div class='box-body'>
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>No faktur</th>
                		    <th>Dibuat</th>
                		    <th>Jatuh tempo</th>
                		    <th>Nama klien</th>
                        <th>Jumlah</th>
                		    <th>Saldo</th>
                		    <th>Opsi</th>
                    </tr>
                </thead>
          	    <tbody>
                  <?php $start = 0; foreach ($invoices as $i): ?>
                      <tr>
                          <td><?= statusesInv()[$i->status]; ?></td>
                          <td><a href=""><?= $i->kdinv ?></a></td>
                          <td><?= toDateInd($i->invdate) ?></td>
                          <td><?= toDateInd($i->duedate) ?></td>
                          <?php $dat = getData('customer','id',$i->id_customer,'display_name,id');  ?>
                            
                          <td>
                            <a href="<?= base_url('customer/detail/'.$dat->id) ?>"><?= $dat->display_name ?></a>
                          </td>
                          <td><?= rupiah($i->grdtotal) ?></td>
                          <td><?= rupiah($i->balance) ?></td>
                          <td width="140px">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fa fa-cog"></i> Opsi <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a href="<?= base_url('invoice/detail/'.$i->kdinv) ?>" ><i class="fa fa-list-alt"></i> Detail</a></li>
                                  <li><a href="<?= base_url('invoice/print/'.$i->kdinv) ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Download pdf</a></li>
                                  <?php if($i->balance >0) { ?>
                                      <li><a href="<?= base_url('invoice/record_payment/'.$i->kdinv) ?>"><i class="fa fa-credit-card"></i> Input Pembayaran</a></li>
                                  <?php } ?>
                                  
                                </ul>
                              </div>
                          </td>
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
        </div>
      </div>
    </div>
  </div>
</section>