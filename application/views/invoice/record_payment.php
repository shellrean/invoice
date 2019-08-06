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
                                                <?php
                                                $client = $this->db->get_where('customer',array('id' => $invoice->id_customer))->row();
                                                    ?>
                                                    
                                                <input type="hidden" name="invoice_id" value="<?= $invoice->id ?>">
                                                <input type="text" name="" value="<?= $invoice->kdinv . ' - ' . $client->display_name . ' - ' . rupiah($invoice->balance); ?>" readonly class="form-control">
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
        