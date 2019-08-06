<!DOCTYPE html>
<html lang="en">
<head>
    <title>CV Bisma Laporan</title>
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
                    <td rowspan="7"></td>
                  </tr>
                  <tr>
                    <td rowspan="7"></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>


                  <tr>
                    
                  </tr>
                  <tr>
                    <td>
                      
                    </td>
                  </tr>
                  <tr>
                    <td>
                      
                    </td>
                  </tr>
                  <tr>
                    <td>
                      
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            <td style="width:20%"></td>

            <td style="width:40%" align="right">
              <div id="quotation" >
                <h1 style="font-weight: normal"><a href="">Penjualan dari Klien</a></h1>
                <div class="date"><?php echo $from_date . ' - ' . $to_date ?></div>
              </div>
            </td>
          </tr>
        </table>  
      </div>
  </main>

 <table border="0" cellspacing="0" cellpadding="0" class="table">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Klien</th>
            <th class="unit">Jumlah Invoice</th>
            <th class="qty">Penjualan</th>
            <th class="total">Penjualan dengan pajak</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $start = 0;
            foreach ($results as $result) 
            {
          ?>
          <tr>
            <td class="no" align="center"><?= ++$start ?></td>
            <td class="desc"><h3 style="font-weight: normal; color: #57B223"><?= $result->first_name.' '.$result->last_name; ?></h3></td>
            <td class="unit" align="center"><?php echo $result->invoice_count; ?></td>
            <td class="qty" align="right"><?php echo rupiah($result->sales); ?></td>
            <td class="total"><?php echo rupiah($result->sales_with_tax); ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

</body>
</html>
