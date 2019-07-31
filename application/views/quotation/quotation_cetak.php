<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>QUOTATION - <?= $quotation->kdquo ?> </title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/temp/test3.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <table style="width:100%">
        <tr>
          <td style="width:40%">
            <div id="logo">
              <img src="<?= FCPATH   ?>assets/dist/img/logo-bicis.jpg" width="90px">
            </div>
          </td>
          <td style="width:20%"></td>

          <td style="width:40%" align="right">
            <div id="company" >
              <h2 class="name" align="right">CV Bisma Cipta Solusi</h2>
              <div style="text-align: right;">Jl. Kebayoran Lama no. 156 <br>Sukabumi Selatan, Kebon Jeruk, Jakarta Barat, 11560</div>
              <div style="text-align: right;">021-53665992</div>
              <!-- <div style="text-align: right;"><a href="mailto:company@example.com">company@example.com</a></div> -->
            </div> 
          </td>
        </tr>
      </table>
    </header>
    <main>
      <div id="details" class="clearfix">
        <table style="width: 100%">
          <tr>
            <td style="width:40%">
              <div id="client">
                <table style="width: 100%">
                  <tr>
                    <td rowspan="7" style="background-color: #0087C3 width:8px;"></td>
                  </tr>
                  <tr>
                    <td rowspan="7" style="background-color: #fff width:6px;"></td>
                  </tr>
                  <tr>
                    <td><div class="to">QUOTE TO:</div></td>
                  </tr>

                  <?php 
                  $dat = getData('customer','id',$quotation->id_customer,'display_name,company_name,phone,email');
                  $dat2 = getData('customer_details','id_customer',$quotation->id_customer,'bill_addr_street,bill_addr_state,bill_addr_city,bill_addr_zip_code');
                  ?>


                  <tr>
                    <td><h2 class="name"><?=$dat->display_name ?></h2></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="address"><?= $dat2->bill_addr_street.' '.$dat2->bill_addr_state.','.$dat2->bill_addr_city.' ,'.$dat2->bill_addr_zip_code ?></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?= $dat->phone ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="mailto:john@example.com"><?= $dat->email ?></a>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            <td style="width:20%"></td>

            <td style="width:40%" align="right">
              <div id="quotation" >
                <h1 style="font-weight: normal"><a href="">QUOTATION</a></h1>
                <iv class="date">#<?= $quotation->kdquo; ?>
                <div class="date">Quote date: <?= toDateInd($quotation->quodate); ?></div>
                <div class="date">Quote valid until: <?= toDateInd($quotation->expdate) ?></div>
              </div>
            </td>
          </tr>
        </table>  
      </div>
      <table border="0" cellspacing="0" cellpadding="0" class="table">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QTY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $start = 0;
            foreach ($details as $detail) 
            {
          ?>
          <tr>
            <td class="no" align="center"><?= ++$start ?></td>
            <td class="desc"><h3 style="font-weight: normal; color: #57B223"><?= $detail->itemname ?></h3><?= $detail->itemdesc ?></td>
            <td class="unit"><?= rupiah($detail->priceperitem) ?></td>
            <td class="qty" align="center"><?= $detail->qty ?></td>
            <td class="total"><?= rupiah($detail->totalprice) ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="note">
        Note: <?= $quotation->custnotes; ?>
      </div>

      <table style="width: 100%; margin: 0;">
        <tr>
          <td width="60%" class="no">

          </td>
          <td>
            <table style="width: 100%" class="foot">
              <tr>
                <td colspan="2"></td>
                <td colspan="2" align="right">SUBTOTAL</td>
                <td align="right"><?= rupiah($quotation->subtotal); ?></td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2" align="right">TAX 10%</td>
                <td align="right"><?= rupiah($quotation->tax);?></td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2" style="color: #57B223;" align="right">GRAND TOTAL</td>
                <td style="color: #57B223;" align="right"><?php 
                    $gratot = $quotation->subtotal - $quotation->discount + $quotation->tax;
                    echo rupiah($gratot); ?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      
      <div id="notices">
        <div>Term Of Payment:</div>
        <div class="notice">
          1. T/T Advanced <br>
          2. FOB Jakarta <br>
          3. Include PPN 10% <br>
          4. Price change without prior notice <br>
        </div>
      </div>
    </main>
    <footer>
      quotation was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>