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
                    <td rowspan="6" style="background-color: #0087C3 width:8px;"></td>
                  </tr>
                  <tr>
                    <td rowspan="5" style="background-color: #fff width:6px;"></td>
                  </tr>
                  <tr>
                    <td><div class="to">INVOICE TO:</div></td>
                  </tr>
                  <tr>
                    <td><h2 class="name">John Doe</h2></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="address">796 Silver Harbour, TX 79273, US</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="mailto:john@example.com">john@example.com</a>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            <td style="width:20%"></td>

            <td style="width:40%" align="right">
              <div id="invoice" >
                <h1 style="font-weight: normal"><a href="">INVOICE 3-2-1</a></h1>
                <div class="date">Date of Invoice: 01/06/2014</div>
                <div class="date">Due Date: 30/06/2014</div>
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
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3 style="font-weight: normal; color: #57B223">Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">30</td>
            <td class="total">$1,200.00</td>
          </tr>
        </tbody>
      </table>
      <div class="note">
        Note:
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
                <td>$5,200.00</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2" align="right">TAX 25%</td>
                <td>$1,300.00</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2" style="color: #57B223;" align="right">GRAND TOTAL</td>
                <td>$6,500.00</td>
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
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>