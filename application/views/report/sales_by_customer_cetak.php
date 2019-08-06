<!DOCTYPE html>
<html lang="en">
<head>
    <title>CV Bisma Laporan</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/reports.css" type="text/css">
</head>
<body>

<h3 class="report_title">
    Penjualan dari Klien<br/>
    <small><?php echo $from_date . ' - ' . $to_date ?></small>
</h3>

<table>
    <tr>
        <th>Klien</th>
        <th class="amount">Jumlah Invoice</th>
        <th class="amount">Penjualan</th>
        <th class="amount">Penjualan dengan pajak</th>
    </tr>
    <?php foreach ($results as $result) { ?>
        <tr>
            <td><?= $result->first_name.' '.$result->last_name; ?></td>
            <td class="amount"><?php echo $result->invoice_count; ?></td>
            <td class="amount"><?php echo rupiah($result->sales); ?></td>
            <td class="amount"><?php echo rupiah($result->sales_with_tax); ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
