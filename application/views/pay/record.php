<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?= base_url('payment_received/create') ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>FORMULIR PEMBAYARAN</h3>
                            <div class="box box-primary" id="bankcharge">
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td width="10%">Faktur</td>
                                            <td>
                                                <select name="invoice_id" id="invoice_id" class="form-control select2">
                                                <?php foreach ($open_invoices as $invoice) { 
                                                    $client = $this->db->get_where('customer',array('id' => $invoice->id_customer))->row();
                                                    ?>
                                                    
                                                    <option value="<?= $invoice->id; ?>" >
                                                        <?php echo $invoice->kdinv . ' - ' . $client->display_name . ' - ' . rupiah($invoice->balance); ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>
                                                <input type="text" class="form-control" name="paydate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Paydate" value="<?= date('d-m-Y') ?>" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>
                                                <input type="text" name="amount" class="form-control uang" placeholder="Jumlah yang dibayar">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr><td>
                                            <button type="submit" class="btn btn-primary">Record</button> 
                                            <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Cancel</a>
                                        </td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </section>
        