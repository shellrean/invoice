<table class='table table-bordered'>
  <tr>
    <td>Kode Item</td>
    <th><?= $item->kditem ?></th>
  </tr>
  <tr>
    <td>Nama</td>
    <td><?= $item->nama ?></td>
  </tr>
  <tr>
    <td>Remark</td>
    <td><?= $item->deskripsi ?></td>
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
