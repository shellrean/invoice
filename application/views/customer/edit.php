<!-- Main content -->
    <section class='content'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='box'>
                    <form action="<?= base_url('customer/edit/'.$customer->id_customer) ?>" method="post">
                        <div class='box-header'>
                            <h3 class='box-title'>CUSTOMER</h3>
                            <div class='box box-primary'>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td width="25%">Panggilan</td>
                                            <td>
                                                <select name="salutation" id="salutation" class="js-example-basic-single js-states form-control select2">
                                                    <option value="Bpk" <?= ($customer->salutation == 'Bpk' ? 'selected' : '' ) ?>>Bapak</option>
                                                    <option value="Ibu" <?= ($customer->salutation == 'Ibu' ? 'selected' : '' ) ?>>Ibu</option>
                                                    <option value="Tn" <?= ($customer->salutation == 'Tn' ? 'selected' : '' ) ?>>Tuan</option>
                                                    <option value="Ny" <?= ($customer->salutation == 'Ny' ? 'selected' : '' ) ?>>Nyonya</option>
                                                    <option value="Nn" <?= ($customer->salutation == 'Nn' ? 'selected' : '' ) ?>>Nona</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Depan</td>
                                            <td>
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?= $customer->first_name ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Belakang</td>
                                            <td>
                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?= $customer->last_name ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pendek </td>
                                            <td>
                                                <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Display Name" value="<?= $customer->display_name ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $customer->email ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Catatan</td>
                                            <td>
                                                <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes" value=""><?= $customer->notes ?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td width="25%">Telp</td>
                                            <td>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?= $customer->phone ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td>
                                                <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?= $customer->website ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Perusahaan</td>
                                            <td>
                                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<?= $customer->company_name ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mata Uang</td>
                                            <td>
                                                <select name="currency" id="currency" class="js-example-basic-single js-states form-control select2">
                                                    <option value="IDR" <?= ($customer->currency == 'IDR' ? 'selected' : '' )?> >IDR - Rupiah</option>
                                                    <option value="USD" <?= ($customer->currency == 'USD' ? 'selected' : '' )?>>USD - US Dollar</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td>Pembayaran</td>
                                            <td>
                                                <select name="payment_terms" id="payment_terms" class="js-example-basic-single js-states form-control select2">
                                                    <option value="0-DOR" <?= ($customer->currency == '0-DOR' ? 'selected' : '' )?>>Due on Receipt</option>
                                                    <option value="1-N15" <?= ($customer->currency == '1-N15' ? 'selected' : '' )?>>Net 15</option>
                                                    <option value="2-N30" <?= ($customer->currency == '2-N30' ? 'selected' : '' )?>>Net 30</option>
                                                    <option value="3-N45" <?= ($customer->currency == '3-N45' ? 'selected' : '' )?>>Net 45</option>
                                                    <option value="4-N60" <?= ($customer->currency == '4-N60' ? 'selected' : '' )?>>Net 60</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div><!-- /.box-body -->
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class='box-header'>
                                    <h3 class='box-title'>BILLING ADDRESS</h3>
                                    <div class='box box-primary'>
                                        <table class='table table-bordered'>
                                            <tr>
                                                <td>Street</td>
                                                <td>
                                                    <textarea class="form-control" rows="3" name="bill_addr_street" id="bill_addr_street" placeholder="Billing Address Street"><?= $customer->bill_addr_street ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>
                                                    <input type="text" class="form-control" name="bill_addr_city" id="bill_addr_city" placeholder="Billing Address City" value="<?= $customer->bill_addr_city ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td>
                                                    <input type="text" class="form-control" name="bill_addr_state" id="bill_addr_state" placeholder="Billing Address State" value="<?= $customer->bill_addr_state ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Zip Code</td>
                                                <td>
                                                    <input type="text" class="form-control" name="bill_addr_zip_code" id="bill_addr_zip_code" placeholder="Billing Address Zip Code" value="<?= $customer->bill_addr_zip_code ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>
                                                    <input type="text" class="form-control" name="bill_addr_country" id="bill_addr_country" placeholder="Billing Address Street" value="<?= $customer->bill_addr_country ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>
                                                    <input type="text" class="form-control" name="bill_addr_phone" placeholder="Billing Address Phone" value="<?= $customer->bill_addr_phone ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Fax</td>
                                                <td>
                                                    <input type="text" class="form-control" name="bill_addr_fax" placeholder="Billing Address Fax" value="<?= $customer->bill_addr_fax ?>" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class='box-header'>
                                    <h3 class='box-title'>SHIPPING ADDRESS</h3>
                                    <div class='box box-primary'>
                                        <table class='table table-bordered'>
                                            <tr>
                                                <td>Street</td>
                                                <td>
                                                    <textarea class="form-control" rows="3" name="ship_addr_street" id="ship_addr_street" placeholder="Shipping Address Street"><?= $customer->ship_addr_street ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>
                                                    <input type="text" class="form-control" name="ship_addr_city" id="ship_addr_city" placeholder="Shipping Address City" value="<?= $customer->ship_addr_city ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td>
                                                    <input type="text" class="form-control" name="ship_addr_state" id="ship_addr_state" placeholder="Shipping Address State" value="<?= $customer->ship_addr_state ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Zip Code</td>
                                                <td>
                                                    <input type="text" class="form-control" name="ship_addr_zip_code" placeholder="Shipping Address Zip Code" value="<?= $customer->ship_addr_zip_code ?>" />
                                                </td>
                                            <tr>
                                                <td>Country</td>
                                                <td>
                                                    <input type="text" class="form-control" name="ship_addr_country" id="ship_addr_country" placeholder="Shipping Address Country" value="<?= $customer->ship_addr_country ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>
                                                    <input type="text" class="form-control" name="ship_addr_phone" placeholder="Shipping Address Phone" value="<?= $customer->ship_addr_phone ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Fax</td>
                                                <td>
                                                    <input type="text" class="form-control" name="ship_addr_fax" id="ship_addr_fax" placeholder="Shipping Address Fax" value="<?= $customer->ship_addr_fax ?>" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <div align="right">
                            <input type="checkbox" name="check1" onchange="copyTextValue(this);">
                            <em>Check this box if Shipping Address and Billing Address are the same.</em>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                            <a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a>
                        </center>
                        <br/>
                    </form>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <script type="text/javascript">
        function copyTextValue(bf) {
            if (bf.checked) {
                var text1 = document.getElementById("bill_addr_street").value;
                var text2 = document.getElementById("bill_addr_city").value;
                var text3 = document.getElementById("bill_addr_state").value;
                var text4 = document.getElementById("bill_addr_zip_code").value;
                var text5 = document.getElementById("bill_addr_country").value;
                var text6 = document.getElementById("bill_addr_phone").value;
                var text7 = document.getElementById("bill_addr_fax").value;
            } else{
                text1='';
                text2='';
                text3='';
                text4='';
                text5='';
                text6='';
                text7='';
            }
            
            document.getElementById("ship_addr_street").value=text1;
            document.getElementById("ship_addr_city").value=text2;
            document.getElementById("ship_addr_state").value=text3;
            document.getElementById("ship_addr_zip_code").value=text4;
            document.getElementById("ship_addr_country").value=text5;
            document.getElementById("ship_addr_phone").value=text6;
            document.getElementById("ship_addr_fax").value=text7;
        }
    </script>