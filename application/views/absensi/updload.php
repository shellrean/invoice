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
          
        </div>
      </div>
    </div>
  </div>
</section>