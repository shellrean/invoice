<table class='table table-bordered'>
  <tr>
    <td>Kd Payment Received</td>
    <th><?= $p->kdpayrec ?></th>
  </tr>
  <tr>
    <td>kd Invoice</td>
    <th><?= $p->kdinv ?></th>
  </tr>
  <tr>
    <td>Invoice date</td>
    <td><?= $p->invdate ?></td>
  </tr>
  <tr>
    <td>Pay date</td>
    <td><?= $p->paydate ?></td>
  </tr>
  <tr>
    <td>Customer name</td>
    <td>
      <strong><?php $dat = getData('customer','id',$p->id_customer,'display_name'); echo strtoupper($dat->display_name) ?></strong>
    </td>
  </tr>
  <tr>
    <td>Bank charge</td>
    <td>
      <?= rupiah($p->bankcharge) ?>
    </td>
  </tr>
  <tr>
    <td>Invoice amount</td>
    <td>
      <?= rupiah($p->invamount) ?>
    </td>
  </tr>
  <tr>
    <td>Due amount</td>
    <td>
      <?= rupiah($p->dueamount) ?>
    </td>
  </tr>
  <tr>
    <td>Pay amount</td>
    <td>
      <strong><span class="text-success"><?= rupiah($p->amount) ?></span></strong>
    </td>
  </tr>
  <tr>
    <td>Pay remining</td>
    <td>
      <strong><span class="text-danger"><?php $set = $p->dueamount-$p->amount; echo rupiah($set); ?></span></strong>
    </td>
  </tr>
</table>
