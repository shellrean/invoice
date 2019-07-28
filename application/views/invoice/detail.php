      <div class="content">
        <section class="invoice">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                INVOICE - DETAIL
                <small class="pull-right">Date: <?php echo date('d/m/Y') ?></small>
              </h2>
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
              To
              <address>
                <?php 
                  $dat = getData('customer','id',$invoice->id_customer,'display_name,company_name,phone,email');
                  $dat2 = getData('customer_details','id_customer',$invoice->id_customer,'bill_addr_street,bill_addr_state,bill_addr_city,bill_addr_zip_code');
                ?>
                <strong><?=$dat->display_name ?></strong><br>
                <?= $dat->company_name ?><br>
                <?= $dat2->bill_addr_street.' '.$dat2->bill_addr_state.' <br>'.$dat2->bill_addr_city.' ,'.$dat2->bill_addr_zip_code ?> <br>
                Phone: <?= $dat->phone ?><br/>
                Email: <?= $dat->email ?>
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <b>invoice</b> #<?= $invoice->kdinv; ?><br/>
              <b>Quotation:</b> <?= $invoice->kdquo ?> <br>
              <b>PO / Ref:</b> <?= $invoice->ordernumber ?><br/>
              <b>Order Date:</b> <?= $invoice->invdate; ?><br/>
              <b>Due Date:</b> <?= $invoice->duedate ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
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
                      <td><?= ++$start ?></td>
                      <td><?= $detail->itemname ?></td>
                      <td><?= $detail->itemdesc ?></td>
                      <td><?= $detail->qty ?></td>
                      <td><?= $detail->priceperitem ?></td>
                      <td><?= $detail->totalprice ?></td>
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
              <p class="lead">Payment Methods:</p>
              <img src="<?= base_url()?>assets/dist/img/credit/visa.png" alt="Visa"/>
              <img src="<?= base_url()?>assets/dist/img/credit/mastercard.png" alt="Mastercard"/>
              <img src="<?= base_url()?>assets/dist/img/credit/american-express.png" alt="American Express"/>
              <img src="<?= base_url()?>assets/dist/img/credit/paypal2.png" alt="Paypal"/>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <?= $invoice->custnotes; ?>
                <br>
                <?= $invoice->remark; ?>
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
              <div class="table-responsive" style="margin-top:80px;">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><?= rupiah($invoice->subtotal); ?></td>
                  </tr>
                  <tr>
                    <th>Discount:</th>
                    <td><?= rupiah($invoice->discount); ?></td>
                  </tr>
                  <tr>
                    <th>PPN:</th>
                    <td>
                        <?= rupiah($invoice->tax);?>
                    </td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><?php 
                    $gratot = $invoice->subtotal - $invoice->discount + $invoice->tax;
                    echo rupiah($gratot); ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Kembali</a>
              <a href="<?php echo site_url('invoice/record_payment/'.$invoice->kdquo) ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Record Payment</a>
            </div>
          </div>
        </section>
        <div class="clearfix"></div>
      </div>