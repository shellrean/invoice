<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <?= $this->session->flashdata('message'); ?>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Profile</h3>
          <div class="box-tools pull-right">
        </div>
        <div class='box-body'>
          <form action="<?= base_url('panel/profile') ?>" method="post">
          <table class="table table-bordered">
              <tr>
                <td width="25%">Username</td>
                <td>
                  <input type="text" name="username" value="<?= $profile->username ?>" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Nama </td>
                <td>
                  <input type="text" name="name" value="<?= $profile->name ?>" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td>
                  <input type="password" name="password" placeholder="Password biarkan kosong bila tidak mau diganti" class="form-control">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                </td>
              </tr>
          </table>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>