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
                        <a href="<?= base_url() ?>/satuan-create" class="btn btn-block bg-gradient-primary btn-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah <?= $title; ?></a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Satuan</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_satuan as $satuan) : ?>
                                <tr>
                                    <td><?= $no++; ?> </td>
                                    <td><?= $satuan['satuan']; ?></td>
                                    <td>
                                        <a href="satuan-update/<?= $satuan['id']; ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="satuan-delete/<?= $satuan['id']; ?>" method="post" class="d-inline form-hapus" id="form-hapus">
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
        </div>
        <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>