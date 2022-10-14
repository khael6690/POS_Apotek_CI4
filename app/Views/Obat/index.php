<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengelolahan Data <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-2">
                        <a href="<?= base_url() ?>/obat-create" class="btn btn-block bg-gradient-primary btn-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah <?= $title; ?></a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                                <th>Produsen</th>
                                <th>Harga</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_obat as $obat) : ?>
                                <tr>
                                    <td><?= $no++; ?> </td>
                                    <td><?= $obat['nama_obat']; ?></td>
                                    <td><?= $obat['stok']; ?></td>
                                    <td><?= $obat['nama']; ?></td>
                                    <td>Rp. <?= $obat['harga']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-sm" onclick="detail(<?= $obat['id_obat'] ?>)"><i class="fas fa-eye"></i> Detail</button>
                                        <a href="obat-update/<?= $obat['id_obat']; ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="obat-delete/<?= $obat['id_obat']; ?>" method="post" class="d-inline form-hapus">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm text-white tombol-hapus"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <!-- Modals detail -->
            <div class="modal fade" id="modal-sm">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail <?= $title; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="data_detail">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>