<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <?= $this->session->flashdata('message'); ?>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>QUOTASI </h3>
          <div class="box-tools pull-right">
              <?php echo anchor('quotation/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah quotation"'); ?>
              <?php echo anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
              <?php echo anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
          </div>
        </div>
        <div class='box-body'>
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Kuotasi</th>
                        <th>Dibuat</th>
                        <th>Jatuh Tempo</th>
                        <th>Nama Klien</th>
                		    <th>Jumlah</th>
                		    <th>Opsi</th>
                    </tr>
                </thead>
        	    <tbody>
                <?php foreach ($quotations as $q): ?>
                <tr>
                    <td><?= statuses()[$q->status]; ?></td>
                    <td><a href="<?= base_url('quotation/detail/'.$q->kdquo) ?>"><?= $q->kdquo ?></a></td>
                    <td><?= toDateInd($q->quodate) ?></td>
                    <td><?= toDateInd($q->expdate) ?></td>
                    <td><?php $dat = getData('customer','id',$q->id_customer,'display_name'); echo $dat->display_name ?></td>
                    <td><?= rupiah($q->grdtotal) ?></td>
                    <td width="140px">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-cog"></i>  Opsi <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="<?= base_url('quotation/detail/'.$q->kdquo) ?>" ><i class="fa fa-list-alt"></i> Detail</a></li>
                            <li><a href="<?= base_url('quotation/edit/'.$q->kdquo) ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                            <li><a href="<?= base_url('quotation/print/'.$q->kdquo) ?>" target="_blank"><i class="fa fa-print"></i> Print</a></li>
                            <li><a href="<?= base_url('quotation/convert_invoice/'.$q->kdquo) ?>" ><i class="fa fa-credit-card"></i> Konversi invoice</a></li>
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
        </div>
      </div>
    </div>
  </div>
</section>