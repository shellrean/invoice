        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>TAMBAH ITEM</h3>
                  <div class='box box-primary'>
                    <form action="<?= base_url('item/create') ?>" method="post">
                      <div class="col-xs-12 col-sm-6 nopadding">
                        <table class='table table-bordered'>
                          <tr>
                            <td>Nama</td>
                              <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="" required />
                            </td>
                          </tr>
                          <tr>
                            <td>Harga Beli</td>
                              <td><input type="text" class="form-control uang" name="harga_beli" id="purchase_price" placeholder="Harga Beli" value="" required/>
                            </td>
                          </tr>
                          <tr>
                            <td>Harga Jual</td>
                              <td><input type="text" class="form-control uang" name="harga_jual" id="sell_price" placeholder="Harga Jual" value="" required/>
                            </td>
                          </tr>
                          <tr>
                            <td>Deskripsi</td>
                              <td><textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi" value="" required></textarea>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-xs-12 col-sm-12 nopadding">
                        <table class='table table-bordered'><td>
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                            <a href="<?= site_url('item') ?>" class="btn btn-default">Cancel</a>
                          </td></tr>
                        </table>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </section>