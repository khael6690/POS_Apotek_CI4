<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <?= $profile['0']['nama']; ?>
                <small class="float-right">Date: <?= $sale[0]['tgl_transaksi']; ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            Kasir
            <address>
                <strong><?= $sale[0]['username']; ?></strong><br>
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
                <strong><?= ($sale[0]['nama_customer'] == null) ? 'Guest' : $sale[0]['nama_customer']; ?></strong><br>
                <?= ($sale[0]['alamat'] == null) ? '----------' : $sale[0]['alamat']; ?><br>
                Phone: <?= ($sale[0]['telp'] == null) ? '----------' : $sale[0]['telp']; ?><br>
                Email: <?= ($sale[0]['email'] == null) ? '----------' : $sale[0]['email']; ?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #<?= $sale[0]['sale_id']; ?></b>
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
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;
                    $discount = 0;
                    $qty = 0;
                    $subtotal = 0;
                    foreach ($detail as $value) : ?>
                        <tr>
                            <td><?= $value['amount']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= number_to_currency($value['total_price'], 'IDR', 'id_ID', 2); ?></td>
                        </tr>
                    <?php $total += $value['total_price'];
                        $subtotal += $value['price'];
                        $discount += $value['discount'];
                        $qty += $value['amount'];
                    endforeach; ?>
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
                        <th style="width:50%">Total Item:</th>
                        <td><?= $qty; ?></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?= number_to_currency($subtotal, 'IDR', 'id_ID', 2); ?></td>
                    </tr>
                    <tr>
                        <th>Discount:</th>
                        <td><?= number_to_currency($discount, 'IDR', 'id_ID', 2); ?></td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td><?= number_to_currency($total, 'IDR', 'id_ID', 2); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('print-laporan-jual-detail/' . $sale[0]['sale_id']) ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        </div>
    </div>
</div>
<!-- /.invoice -->

<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endsection(); ?>