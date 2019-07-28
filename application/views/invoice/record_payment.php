<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?= base_url('invoice/record_payment/'.$invoice->kdinv) ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>RECORD PAYMENT RECEIVED</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr><td width="25%">Customer Name</td>
                                            <td>
                                            <input type="hidden" name="id_customer" value="<?= $invoice->id_customer ?>">
                                            <?php $dat = getData('customer','id',$invoice->id_customer,'display_name'); ?>
                                            <input type="text" class="form-control" name="custkd" id="custkd" placeholder="custkd" value="<?= $dat->display_name?>" readonly/>
                                        </td>
                                        <tr><td>Bank Charge </td>
                                            <td>
                                            <input type="text" class="form-control" name="bankcharge" id="bankcharge" placeholder="bankcharge" />
                                        </td>
                                        <tr><td>Paydate </td>
                                            <td><input type="text" class="form-control" name="paydate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Paydate" value="" />
                                        </td>
                                        <tr><td>Paymode </td>
                                            <td>
                                            <?php echo cmb_dinamis('paymode','payment_option','nmpay','id','nmpay'); ?>
                                        </td>
                                        <tr><td>Reference </td>
                                            <td><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference"/>
                                        </td>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 nopadding">
                                    <table class="table table-bordered" id="purchaseItems" name="purchaseItems" align="center">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Invoice Date</th>
                                                <th>Invoice Amount</th>
                                                <th>Amount Due</th>
                                                <th>Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="kdinv" id="kdinv" value="<?= $invoice->kdinv ?>" readonly />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="invdate" id="invdate" value="<?= $invoice->invdate ?>" readonly />
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invamount" id="invamount" value="<?= $invoice->grdtotal ?>" readonly />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="dueamount" id="dueamount" value="<?= $invoice->grdtotal ?>" readonly />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount Payment" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr><td width="25%">Remark <?php echo form_error('remark') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?= $invoice->remark; ?>"></textarea>
                                        </td>
                                        <tr><td><label for="exampleInputFile">Attach File</label></td>
                                            <td>
                                            <input type="file" name="upload" id="exampleInputFile">
                                        </td>
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
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        