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
                <form action="<?= base_url('invoice/create') ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>INVOICE</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8 nopadding">
                                    <table class='table table-bordered'>
                                        <tr><td width="25%">Nama Customer</td>
                                            <td>
                                            <?php echo cmb_dinamis('id_customer','customer','display_name','id','display_name'); ?>
                                        </td></tr>
                                        <tr><td>Tanggal</td>
                                            <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="quodate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Tanggal" value="<?= date('d-m-Y') ?>" required/>
                                                <span class="input-group-addon">
                                            <i class="fa fa-calendar fa-fw"></i>
                                        </span>
                                            </div>
                                        </td></tr>
                                        <tr><td>Jatuh Tempo</td>
                                            <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="expdate" id="datepicker1" data-format="dd-mm-yyyy" placeholder="Jatuh Tempo" value="" required />
                                                <span class="input-group-addon">
                                            <i class="fa fa-calendar fa-fw"></i>
                                        </span>
                                            </div>
                                        </td></tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <select class="form-control select2" name="status">
                                                    <option value="1">Naskah</option>
                                                    <option value="2">Terkirim</option>
                                                    <option value="3">Terlihat</option>
                                                    <option value="4">Disetujui</option>
                                                    <option value="5">Tertolak</option>
                                                    <option value="6">Dibatalkan</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 nopadding">
                                    <h4><a href="#" class="btn btn-success btn-xs add-row"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a></h4>
                                    <table class="table table-bordered" id="invoice_table">
                                        <tbody>
                                            <tr>
                                                <td valign="middle">
                                                    <div class="input-group form-group-sm  no-margin-bottom">
                                                        <a href="#" class="btn btn-danger btn-sm delete-row"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon">Item</span>
                                                        <input type="text" class="form-control invoice_product" name="invoice_product[]" placeholder="Enter item title-description">
                                                        <span class="input-group-addon">
                                                        <span class="item-select">
                                                            <a href="#"><i class="fa fa-database item-select"></i> Pilih produk</a>
                                                        </span>
                                                            </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group form-group-sm no-margin-bottom">
                                                        <span class="input-group-addon">Qty</span>
                                                        <input type="text" class="form-control invoice_product_qty calculate" name="invoice_product_qty[]" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm  no-margin-bottom">
                                                        <span class="input-group-addon">Harga</span>
                                                        <input type="text" class="form-control calculate invoice_product_price required" name="invoice_product_price[]" aria-describedby="sizing-addon1" placeholder="0.00">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group form-group-sm  no-margin-bottom">
                                                        <span class="input-group-addon">Diskon</span>
                                                        <input type="text" class="form-control calculate" name="invoice_product_discount[]" placeholder="Enter % or value (ex: 10% or 10.50)">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon">Subtotal</span>
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
                                                    <strong>Subtotal:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo 'Rp' ?><span class="invoice-sub-total">0.00</span>
                                                    <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Diskon:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo 'Rp' ?><span class="invoice-discount">0.00</span>
                                                    <input type="hidden" name="invoice_discount" id="invoice_discount">
                                                </div>
                                            </div>
                                            <?php 
                                                $enable_vat = true;
                                                $vat_included = false;
                                                if ($enable_vat == true) {
                                            ?>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Pajak:</strong><br>Hapus Pajak <input type="checkbox" class="remove_vat">
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
                                        <tr><td width="25%">Catatan</td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="custnotes" id="custnotes" value=""></textarea>
                                        </td></tr>
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Simpan</button> 
                                                <a href="<?= site_url('quotation') ?>" class="btn btn-default">Cancel</a>
                                            
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
          </div>
        </section>



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
                                print '<option value="'.$r->harga_jual.'">'.$r->nama.' - '.$r->deskripsi.'</option>';
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
            </div>
          </div>
        </div>