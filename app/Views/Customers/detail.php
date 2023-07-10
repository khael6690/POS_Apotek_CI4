<div class="card card-primary">
    <!-- /.card-header -->
    <div class="card-body">
        <strong><i class="fas fa-user text-success mr-1"></i> Nama </strong>
        <p class="text-muted"> <?= $data_customers['nama']; ?>
        </p>
        <hr>
        <strong><i class="fas fa-map-marked-alt text-yellow mr-1"></i> alamat</strong>
        <p class="text-muted"><?= $data_customers['alamat']; ?>
        </p>
        <hr>
        <strong><i class="fas fa-envelope text-danger mr-1"></i> email</strong>
        <p class="text-muted"><?= $data_customers['email']; ?>
        </p>
        <hr>
        <strong><i class="fas fa-phone text-green mr-1"></i> No telfon</strong>
        <p class="text-muted"><?= $data_customers['telp']; ?>
        </p>
        <hr>
        <strong><i class="fas fa-percent text-info mr-1"></i> diskon</strong>
        <p class="text-muted"><?= $data_customers['diskon']; ?>%
        </p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->