<div class="card card-primary">
    <!-- /.card-header -->
    <div class="card-body">
        <img src="<?= base_url('assets/upload/obat/' . $data_obat['img']) ?>" class="card-img-top img-thumbnail" alt="<?= $data_obat['nama_obat']; ?>">
        <hr>
        <strong><i class="fas fa-capsules text-success mr-1"></i> Nama Obat</strong>
        <p class="text-muted"> <?= $data_obat['nama_obat']; ?>
        </p>
        <hr>
        <strong><i class="fas fa-prescription-bottle-alt text-blue mr-1"></i> Satuan Obat</strong>
        <p class="text-muted"><?= $data_obat['satuan_obat']; ?></p>
        <hr>
        <strong><i class="fas fa-archive text-danger mr-1"></i> Stok</strong>
        <p class="text-muted"><?= $data_obat['jumlah']; ?> </p>
        <hr>
        <strong><i class="fas fa-money-bill-wave text-green mr-1"></i> Harga</strong>
        <p class="text-muted">Rp. <?= $data_obat['harga']; ?></p>
        <hr>
        <strong><i class="fas fa-file-alt text-info mr-1"></i> Deskripsi</strong>

        <p class="text-muted"><?= $data_obat['deskripsi']; ?></p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->