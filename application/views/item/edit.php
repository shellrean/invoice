<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><i class="fa fa-pencil-square-o text-muted"></i> EDIT ITEM</h3>
                </div>
                <div class='box-body'>
                <form action="<?= base_url('item/edit/'.$item->kditem) ?>" method="post">
                  <div class="col-xs-12 col-sm-6">
                    <table class='table table-bordered'>
                      <tr>
                        <td>Nama</td>
                          <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $item->nama ?>" required />
                        </td>
                      </tr>
                      <tr>
                        <td>Unit</td>
                          <td><input type="text" class="form-control" name="unit" id="unit" placeholder="Unit" value="<?= $item->unit ?>" required/>
                        </td>
                      </tr>
                      <tr>
                        <td>Pajak</td>
                            <td><input type="text" class="form-control" name="tax" id="tax" placeholder="Pajak" value="<?= $item->tax ?>"/>
                        </td>
                      </tr>
                      <tr>
                        <td>Remark</td>
                          <td><textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" required><?= $item->remark ?></textarea>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <table class='table table-bordered'>
                      <tr>
                        <td>Harga Beli</td>
                          <td><input type="text" class="form-control uang" name="harga_beli" placeholder="Harga Beli" value="<?= $item->harga_beli ?>" required/>
                        </td>
                      </tr>
                      <tr>
                        <td>Harga Jual</td>
                          <td><input type="text" class="form-control uang" name="harga_jual"  placeholder="Harga Jual" value="<?= $item->harga_jual ?>" required/>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-xs-12 col-sm-12">
                    <table class='table table-bordered'><td>
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <a href="<?= site_url('item') ?>" class="btn btn-default">Cancel</a>
                      </td></tr>
                    </table>
                  </div>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->