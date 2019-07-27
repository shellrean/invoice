        <style> 
            .select2-container {
                width: 100% !important;
                padding: 0;
            }

            
        </style>

        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?= base_url('quotation/create') ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>QUOTATION</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr><td width="25%">Customer Name</td>
                                            <td>
                                            <?php echo cmb_dinamis('id_customer','customer','display_name','id','display_name'); ?>
                                        </td></tr>
                                        <tr><td>Quotation Date</td>
                                            <td><input type="text" class="form-control" name="quodate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Quodate" value="" />
                                        </td></tr>
                                        <tr><td>Expired Date</td>
                                            <td><input type="text" class="form-control" name="expdate" id="datepicker1" data-format="dd-mm-yyyy" placeholder="Expdate" value="" />
                                        </td></tr>
                                        <tr><td>Reference</td>
                                            <td><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference" value="" />
                                        </td></tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 nopadding">
                                    <table class="table table-bordered" id="invoice_table">
                                        <thead>
                                            <tr>
                                                <th><a href="#" class="btn btn-success btn-xs add-row"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
                                                <th width="400">
                                                    <h4>Item</h4>
                                                </th>
                                                <th>
                                                    <h4>Qty</h4>
                                                </th>
                                                <th>
                                                    <h4>Price</h4>
                                                </th>
                                                <th width="250">
                                                    <h4>Discount</h4>
                                                </th>
                                                <th>
                                                    <h4>Sub Total</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group form-group-sm  no-margin-bottom">
                                                        <a href="#" class="btn btn-danger btn-xs delete-row"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="form-group form-group-sm  no-margin-bottom">
                                                        <input type="text" class="form-control form-group-sm item-input invoice_product" name="invoice_product[]" placeholder="Enter item title and / or description">
                                                        <p class="item-select">or <a href="#">select an item</a></p>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="form-group form-group-sm no-margin-bottom">
                                                        <input type="text" class="form-control invoice_product_qty calculate" name="invoice_product_qty[]" value="1">
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="input-group input-group-sm  no-margin-bottom">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control calculate invoice_product_price required" name="invoice_product_price[]" aria-describedby="sizing-addon1" placeholder="0.00">
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="form-group form-group-sm  no-margin-bottom">
                                                        <input type="text" class="form-control calculate" name="invoice_product_discount[]" placeholder="Enter % or value (ex: 10% or 10.50)">
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control calculate-sub" name="invoice_product_sub[]" id="invoice_product_sub" value="0.00" aria-describedby="sizing-addon1" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div id="invoice_totals" class="padding-right row text-right">
                                        <div class="col-xs-6 col-sm-12">
                                        
                                        </div>
                                        <div class="col-xs-6 col-sm-12 no-padding-right">
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Sub Total:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo 'Rp' ?><span class="invoice-sub-total">0.00</span>
                                                    <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Discount:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo 'Rp' ?><span class="invoice-discount">0.00</span>
                                                    <input type="hidden" name="invoice_discount" id="invoice_discount">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong class="shipping">Shipping:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control calculate shipping" name="invoice_shipping" aria-describedby="sizing-addon1" placeholder="0.00" value="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                                $enable_vat = true;
                                                $vat_included = false;
                                                if ($enable_vat == true) {
                                            ?>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>TAX/VAT:</strong><br>Remove TAX/VAT <input type="checkbox" class="remove_vat">
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo 'Rp' ?><span class="invoice-vat" data-enable-vat="<?php echo $enable_vat ?>" data-vat-rate="<?php echo '10' ?>" data-vat-method="<?php echo $vat_included ?>">0.00</span>
                                                    <input type="hidden" name="invoice_vat" id="invoice_vat">
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Total:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo 'Rp' ?><span class="invoice-total">0.00</span>
                                                    <input type="hidden" name="invoice_total" id="invoice_total">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr><td width="25%">Notes</td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="custnotes" id="custnotes" placeholder="Customer Notes" value=""></textarea>
                                        </td></tr>
                                        <tr><td>Remark <?php echo form_error('remark') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark"></textarea>
                                        </td></tr>
                                        <tr><td><label for="exampleInputFile">Attach File</label></td>
                                            <td>
                                            <input type="file" id="exampleInputFile">
                                        </td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
            </div>
          </div><!-- /.row -->
        </section><!-- /.content -->



        <div id="insert" class="modal fade" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Select an item</h4>
              </div>
              <div class="modal-body">
                <?php 
                        $results = $this->db->get('items')->result();

                        if($results) {
                            echo '<select class="form-control item-select select2">';
                            foreach($results as $r):
                                print '<option value="'.$r->harga_jual.'">'.$r->nama.' - '.$r->remark.'</option>';
                            endforeach;
                            echo '</select>';

                        } else {

                            echo "<p>There are no products, please add a product.</p>";

                        }
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="selected">Add</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal