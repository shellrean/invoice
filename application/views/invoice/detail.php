        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Jasa-it.net
                <small class="pull-right">Date: <?php echo date('d/m/Y') ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
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
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php $dat = getData('customer','id',$invoice->id_customer,'display_name'); echo $dat->display_name ?></strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br/>
                Email: john.doe@example.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>invoice #<?= $invoice->kdinv; ?></b><br/>
              <b>Quotation:</b> <?= $invoice->kdquo ?> <br>
              <b>PO / Ref:</b> PO3728/11/2015<br/>
              <b>Order Date:</b> <?= $invoice->invdate; ?><br/>
              <b>TOP:</b> CASH<br/>
              <b>Jobs:</b> Trading
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
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
                      <td><?= $detail->itemkd ?></td>
                      <td><?= $detail->itemname ?></td>
                      <td><?= $detail->qty ?></td>
                      <td><?= $detail->priceperitem ?></td>
                      <td><?= $detail->totalprice ?></td>
                    </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
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
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Amount Due : <strong><?php echo date('d F Y') ?></strong></p>
              <div class="table-responsive">
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
                        <?php 
                        //$pajak = ($tax/100)*$subtotal;
                        //echo $pajak;
                        echo rupiah($invoice->tax);?>
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
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Kembali</a>
              <a href="<?php echo site_url('invoice/record_payment/'.$invoice->kdquo) ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Record Payment</a>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>