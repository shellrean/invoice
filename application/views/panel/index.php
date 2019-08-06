 <section class='content'>

  <div class='row'>
    <div class='col-xs-12'>
      <?= $this->session->flashdata('message'); ?>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>AKSI CEPAT</h3>
        </div>
        <div class='box-body'>
          <div class="btn-group btn-group-justified no-margin">
                    <a href="<?php echo site_url('customer/create'); ?>" class="btn btn-default">
                        <i class="fa fa-user fa-margin"></i>
                        <span class="hidden-xs">Buat Pelanggan</span>
                    </a>
                    <a href="quotation/create" class="create-quote btn btn-default">
                        <i class="fa fa-file fa-margin"></i>
                        <span class="hidden-xs">Buat Penawaran</span>
                    </a>
                    <a href="invoice/create" class="create-invoice btn btn-default">
                        <i class="fa fa-file-text fa-margin"></i>
                        <span class="hidden-xs">Buat Tagihan</span>
                    </a>
                    <a href="payment_received/create" class="btn btn-default">
                        <i class="fa fa-credit-card fa-margin"></i>
                        <span class="hidden-xs">Input Pembayaran</span>
                    </a>
                </div>
        </div>
      </div>
    </div>
  </div>

</section>