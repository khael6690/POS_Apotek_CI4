<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->

        <div class="invoice p-3 m-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <?= $profile['0']['nama']; ?>
                        <small class="float-right">Date: <?= $buy[0]['tgl_transaksi']; ?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Kasir
                    <address>
                        <strong><?= $buy[0]['namaadm']; ?></strong><br>
                        <?= $profile['0']['alamat']; ?><br>
                        <?= $profile['0']['kota']; ?><br>
                        Phone: <?= $profile['0']['telp']; ?><br>
                        Email: <?= $profile['0']['email']; ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Customer
                    <address>
                        <strong><?= ($buy[0]['supplier'] == null) ? 'Guest' : $buy[0]['supplier']; ?></strong>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?= $buy[0]['buyid']; ?></b>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Harga</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $discount = 0;
                            $qty = 0;
                            foreach ($detail as $value) : ?>
                                <tr>
                                    <td><?= $value['amount']; ?></td>
                                    <td><?= $value['nama']; ?></td>
                                    <td><?= number_to_currency($value['price'], 'IDR', 'id_ID', 2); ?></td>
                                    <td><?= number_to_currency($value['discount'], 'IDR', 'id_ID', 2); ?></td>
                                    <td><?= number_to_currency($value['total_price'], 'IDR', 'id_ID', 2); ?></td>
                                </tr>
                            <?php $total += $value['total_price'];
                                $qty += $value['amount'];
                            endforeach;
                            $hasil = ($buy[0]['discount'] / 100) * $total;
                            $totbayar = $total - $hasil;
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?= number_to_currency($total, 'IDR', 'id_ID', 2); ?></td>
                            </tr>
                            <tr>
                                <th>Discount:</th>
                                <td><?= $buy[0]['discount']; ?>%</td>
                            </tr>
                            <tr>
                                <th>Total Bayar:</th>
                                <td><?= number_to_currency($totbayar, 'IDR', 'id_ID', 2); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>

        </div>
        <!-- /.invoice -->
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>