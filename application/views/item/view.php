<table class='table table-bordered'>
  <tr>
    <td>Nama</td>
    <td><?= $item->nama ?></td>
  </tr>
  <tr>
    <td>Unit</td>
    <td><?= $item->unit ?></td>
  </tr>
  <tr>
    <td>Pajak</td>
    <td><?= $item->tax ?></td>
  </tr>
  <tr>
    <td>Remark</td>
    <td><?= $item->remark ?></td>
  </tr>
  <tr>
    <td>Harga Beli</td>
    <td><?= rupiah($item->harga_beli) ?></td>
  </tr>
  <tr>
    <td>Harga Jual</td>
    <td><?= rupiah($item->harga_jual) ?></td>
  </tr>
</table>
