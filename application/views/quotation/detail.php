       <div class="content"> 
        <section class="invoice">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                QUOTATION - DETAIL
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
              <b>Quotation</b> #<?= $quotation->kdquo; ?><br/>
              <b>Order Date:</b> <?= $quotation->quodate; ?><br/>
              <b>Quotation valid until :</b><?= toDateInd($quotation->expdate); ?><br/>
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
              <p class="text-muted well well-sm no-shadow">
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
                </table>
              </div>
            </div>
          </div>
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?= base_url('quotation') ?>" class="btn btn-default">Kembali</a>
              <a href="<?= base_url('quotation/print/'.$quotation->kdquo) ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print</a>
              
              <a href="<?= base_url('quotation/convert_invoice/'.$quotation->kdquo) ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Convert Invoice</a>
            </div>
          </div>
        </section>
        <div class="clearfix"></div>
      </div>