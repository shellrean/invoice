      <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SALES BY CUSTOMER</h3>
                </div>
                <div class='box-body'>

                <form method="post" action="<?= base_url('report/sales_by_customer') ?>">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="input-group">
                            <input type="text" name="from_date" id="datepicker5" class="form-control datepicker">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar fa-fw"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <div class="input-group">
                            <input type="text" name="to_date" id="datepicker6" class="form-control datepicker">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar fa-fw"></i>
                            </span>
                        </div>
                    </div>
                    <input type="submit" name="btn_submit" class="btn btn-primary">
                </form>
                </div>
              </div>
            </div>
          </div>
        </section>