<!DOCTYPE html>
<html>
<head>
	<title>Quotation <?= $quotation->kdquo; ?> | <?= $quotation->quodate; ?></title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome-4.4.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">

	<style>
		body {
			font-size: 11px;
		}
	</style>
</head>
<body>
  <section class="invoice">
    <div class="row" style="margin-bottom: 30px;">
      <div class="col-xs-12">
        <table>
          <tr>
            <td rowspan="2">
              <img src="<?= base_url() ?>/assets/dist/img/logo-bicis.jpg" width="80px">
            </td>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
              <h2 class="page-header" style="margin:0;">CV Bisma Cipta Solusi </h2>
              Growing Your Business With Us
            </td>
          </tr>
          <tr>
            <td>
              
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>CV. Bisma Cipta Solusi</strong><br>
          Lindeteves Trade Center (LTC Glodok)<br>
          Jl. Hayam Wuruk no. 127<br>
          Jakarta Barat, 11180 - Indonesia<br/>
          T: 021-26071151 ; F: 021-26071151
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
      </div>
      <div class="col-sm-4 invoice-col">
        <b>Date:</b> <?= date('d/m/Y') ?> <br>
        <b>Quotation </b>#<?= $quotation->kdquo; ?><br/>
        <b>Order Date:</b> <?= toDateInd($quotation->quodate); ?><br/>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <?php 
            $dat = getData('customer','id',$quotation->id_customer,'display_name,company_name,phone,email');
            $dat2 = getData('customer_details','id_customer',$quotation->id_customer,'bill_addr_street,bill_addr_state,bill_addr_city,bill_addr_zip_code');
          ?>
          <strong><?=$dat->display_name ?></strong><br>
          <?= $dat->company_name ?><br>
          <?= $dat2->bill_addr_street.' '.$dat2->bill_addr_state.' <br>'.$dat2->bill_addr_city.' ,'.$dat2->bill_addr_zip_code ?> <br>
          Phone: <?= $dat->phone ?><br/>
          Email: <?= $dat->email ?>
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        
      </div>
      <div class="col-sm-4 invoice-col">
        <b>Quotation valid until :</b><?= toDateInd($quotation->expdate); ?><br/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Product & Type</th>
              <th>Description</th>
              <th>Qty</th>
              <th>Rate</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $start = 0;
              foreach ($details as $detail) 
              {
            ?>
              <tr>
                <td width="20px"><?= ++$start ?></td>
                <td width="25%"><?= $detail->itemname ?></td>
                <td width="25%"><?= $detail->itemdesc ?></td>
                <td width="20px"><?= $detail->qty ?></td>
                <td><?= rupiah($detail->priceperitem) ?></td>
                <td><?= rupiah($detail->totalprice) ?></td>
              </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 0px;">
          <?= $quotation->custnotes; ?>
        </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Term Of Payment:<br>
          1. T/T Advanced<br>
          2. FOB Jakarta<br>
          3. Include PPN 10%<br>
          4. Price change without prior notice<br>
        </p>
      </div>
      <div class="col-xs-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?= rupiah($quotation->subtotal); ?></td>
            </tr>
            <tr>
              <th>Discount:</th>
              <td><?= rupiah($quotation->discount); ?></td>
            </tr>
            <tr>
              <th>PPN:</th>
              <td>
                  <?= rupiah($quotation->tax);?>
              </td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?php 
              $gratot = $quotation->subtotal - $quotation->discount + $quotation->tax;
              echo rupiah($gratot); ?></td>
            </tr>
            <tr><td></td><td></td></tr>
          </table>
        </div>
        <br>
        <center>
          <p>
            Jakarta, <?php echo date('d F Y'); ?>
          </p>
          <br><br><br><br>
          <p>
            <strong>(Yusman )</strong>
          </p>
        </center>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
<script>
	window.print();
    setTimeout(function () { window.close(); }, 100);
</script>
</body>
</html>