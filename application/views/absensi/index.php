<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <?= $this->session->flashdata('message'); ?>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Absensi</h3>
          <div class="box-tools pull-right">
            <?php echo anchor('absensi/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah record"'); ?>

              <?= anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
          </div>
        </div>
        <div class='box-body'>
          
        </div>
      </div>
    </div>
  </div>
</section>