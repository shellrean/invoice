<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-sm-12'>
      <div class='box'>
        <form action="<?php base_url('quotation/convert_invoice/'.$quotation->kdquo) ?>" method="post">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-header">
                <h3 class='box-title'>CONVERT INVOICE</h3>
                    <div class="box box-primary">
                        <div class="col-xs-12 col-sm-12 nopadding">
                            <table class='table table-bordered'>
                                <tr><td width="25%">Customer Name</td>
                                    <td><?php $dat = getData('customer','id',$quotation->id_customer,'display_name'); ?>
                                        <input type="hidden" name="id_customer" value="<?= $quotation->id_customer ?>">
                                        <input type="text" class="form-control" name="" id="custkd" placeholder="custkd" value="<?= $dat->display_name ?>" readonly/>
                                    </td>
                                </tr>
                                <tr><td>Kode Quotation</td>
                                    <td>
                                        <input type="text" class="form-control" name="kdquo" id="kdquo" placeholder="kdquo" value="<?= $quotation->kdquo ?>" readonly/>
                                    </td>
                                </tr>
                                <tr><td>Order Number</td>
                                    <td>
                                        <input type="text" class="form-control" name="ordernumber" id="ordernumber" placeholder="ordernumber" readonly value="<?= orderNumberGenerate() ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 nopadding">
                            <table class='table table-bordered'>
                                <tr><td width="25%">Invoice Date</td>
                                    <td>
                                        <input type="text" class="form-control" name="invdate" id="datepicker1" placeholder="Invdate" required />
                                    </td>
                                </tr>
                                <tr><td>Payment Terms <?php echo form_error('payment_terms') ?></td>
                                    <td>
                                        <select name="payment_terms" id="payment_terms" class="form-control select2">
                                            <option value="0-DOR">Due on Receipt</option>
                                            <option value="1-N15">Net 15</option>
                                            <option value="2-N30">Net 30</option>
                                            <option value="3-N45">Net 45</option>
                                            <option value="4-N60">Net 60</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>Due Date</td>
                                    <td>
                                        <input type="text" class="form-control" name="duedate" id="datepicker" placeholder="duedate" required="" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12">
                            <table class="table table-bordered" id="purchaseItems" name="purchaseItems" align="center">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        foreach ($details as $detail) 
                                        {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="invoice_product[]" id="invoice_product" placeholder="Payment Term" value="<?php echo $detail->itemname.'-'.$detail->itemdesc ?>" readonly/>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="invoice_product_qty[]" id="invoice_product_qty" placeholder="Payment Term" value="<?php echo $detail->qty; ?>" readonly/>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="invoice_product_price[]" id="invoice_product_price" placeholder="Payment Term" value="<?php echo $detail->priceperitem; ?>" readonly/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="invoice_product_discount[]" id="invoice_product_discount" placeholder="Payment Term" value="<?php echo $detail->discount; ?>" readonly/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="invoice_product_sub[]" id="invoice_product_sub" placeholder="Payment Term" value="<?php echo $detail->totalprice; ?>" readonly/>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div id="invoice_totals" class="padding-right row text-right">
                                <div class="col-xs-6 col-sm-12"></div>
                                <div class="col-xs-6 col-sm-12 no-padding-right">
                                    <div class="row">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>Sub Total:</strong>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="subtotal" id="subtotal" value="<?= $quotation->subtotal ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>Discount:</strong>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="discount" id="discount" value="<?= $quotation->discount ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong class="shipping">Shipping:</strong>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="invoice_shipping" id="invoice_shipping" value="<?= $quotation->shipprice ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>TAX:</strong>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="invoice_vat" id="invoice_vat" value="<?= $quotation->tax ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>Total:</strong>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                <input type="text" class="form-control" name="grdtotal" id="grdtotal" value="<?= $quotation->grdtotal ?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12">
                            <table class='table table-bordered'>
                                <tr><td width="12%">Notes <?php echo form_error('custnotes') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="custnotes" id="custnotes" placeholder="custnotes" value="<?= $quotation->custnotes; ?>" readonly/>
                                    </td>
                                </tr>
                                <tr><td>Payment Option <?php echo form_error('payopt') ?></td>
                                    <td>
                                        <?php echo cmb_dinamis('payopt','payment_option','nmpay','id','nmpay'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Convert</button> 
                                        <a href="<?php echo site_url('quotation') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>
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
        