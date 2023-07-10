<div class="modal-body">



    <!-- Main content -->
    <div class="invoice border-0 p-2 mb-2">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <?= $profile[0]['nama']; ?>
                    <small class="float-right">Date: <?= $buy[0]['tgl_transaksi']; ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-5 invoice-col">
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
            <div class="col-sm-3 invoice-col">
                Supplier
                <address>
                    <strong><?= ($buy[0]['supplier'] == null) ? 'Guest' : $buy[0]['supplier']; ?></strong>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 text-right invoice-col">
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
        <!-- /.row -->

    </div>
    <!-- /.invoice -->
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <a href="<?= base_url('print-laporan-beli-detail/' . $buy[0]['buyid']) ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
</div>

<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endsection(); ?>