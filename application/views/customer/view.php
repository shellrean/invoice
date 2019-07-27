<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Customer Detail</h3>
          <div class="box-tools pull-right">
              <?= anchor('customer', '<i class="fa fa-arrow-left"></i> Kembali', 'class="btn btn-box-tool" data-toggle="tooltip" title="Kembali ke utama"'); ?>
              </div>
          <table class="table table-bordered">
            <tr><td>Salutation</td><td><?= $customer->salutation; ?></td></tr>
            <tr><td>First Name</td><td><?= $customer->first_name; ?></td></tr>
            <tr><td>Last Name</td><td><?= $customer->last_name; ?></td></tr>
            <tr><td>Display Name</td><td><?= $customer->display_name; ?></td></tr>
            <tr><td>Email</td><td><?= $customer->email; ?></td></tr>
            <tr><td>Phone</td><td><?= $customer->phone; ?></td></tr>
            <tr><td>Website</td><td><?= $customer->website; ?></td></tr>
            <tr><td>Company Name</td><td><?= $customer->company_name; ?></td></tr>
            <tr><td>Currency</td><td><?= $customer->currency; ?></td></tr>
            <tr><td>Payment Terms</td><td><?= $customer->payment_terms; ?></td></tr>
            <tr><td>Notes</td><td><?= $customer->notes; ?></td></tr>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class='box-title'>Billing Address</h3>
          <table class="table table-bordered">
            <tr><td>Street</td><td><?= $customer->bill_addr_street; ?></td></tr>
            <tr><td>City</td><td><?= $customer->bill_addr_city; ?></td></tr>
            <tr><td>State</td><td><?= $customer->bill_addr_state; ?></td></tr>
            <tr><td>Zip Code</td><td><?= $customer->bill_addr_zip_code; ?></td></tr>
            <tr><td>Country</td><td><?= $customer->bill_addr_country; ?></td></tr>
            <tr><td>Phone</td><td><?= $customer->bill_addr_phone; ?></td></tr>
            <tr><td>Fax</td><td><?= $customer->bill_addr_fax; ?></td></tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class='box-title'>Shipping Address</h3>
          <table class="table table-bordered">
            <tr><td>Street</td><td><?= $customer->ship_addr_street; ?></td></tr>
            <tr><td>City</td><td><?= $customer->ship_addr_city; ?></td></tr>
            <tr><td>State</td><td><?= $customer->ship_addr_state; ?></td></tr>
            <tr><td>Zip Code</td><td><?= $customer->ship_addr_zip_code; ?></td></tr>
            <tr><td>Country</td><td><?= $customer->ship_addr_country; ?></td></tr>
            <tr><td>Phone</td><td><?= $customer->ship_addr_phone; ?></td></tr>
            <tr><td>Fax</td><td><?= $customer->ship_addr_fax; ?></td></tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->