<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <?= $this->session->flashdata('message'); ?>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>INVOICE LIST</h3>
          <div class="box-tools pull-right">
              <?= anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
              <?= anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
          </div>
        </div>
        <div class='box-body'>
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Kd Inv</th>
                        <th>Order No</th>
                		    <th>Inv Date</th>
                        <th>Cust Name</th>
                		    <th>Status</th>
                		    <th>Due Date</th>
                		    <th>Amount</th>
                		    <th>Action</th>
                    </tr>
                </thead>
          	    <tbody>
                  <?php $start = 0; foreach ($invoices as $i): ?>
                      <tr>
                          <td><?= ++$start ?></td>
                          <td><?= $i->kdinv ?></td>
                          <td><?= $i->ordernumber ?></td>
                          <td><?= $i->invdate ?></td>
                          <td><?php $dat = getData('customer','id',$i->id_customer,'display_name'); echo $dat->display_name ?></td>
                          <td><?= getStatus($i->status) ?></td>
                          <td><?= date('d-m-Y') ?></td>
                          <td><?= rupiah($i->grdtotal) ?></td>
                          <td width="140px">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a href="<?= base_url('invoice/detail/'.$i->kdinv) ?>" >Detail</a></li>
                                  <li><a href="<?= base_url('invoice/record_payment/'.$i->kdinv) ?>">Record Payment</a></li>
                                  <li><a href="<?= base_url('invoice/delivery_notice/'.$i->kdinv) ?>">Delivery Notice</a></li>
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