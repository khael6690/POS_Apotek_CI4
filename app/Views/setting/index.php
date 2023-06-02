<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting Web Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Setting Web</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title"><i class="fas fa-bullhorn"></i> Info!</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p>Halaman setting Profile pada website!</p>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Form <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?= base_url('setting/' . $data_profile['id']) ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?> " name="nama" value="<?= old('nama', $data_profile['nama']) ?>" placeholder="Nama">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('nama'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?> " name="email" value="<?= old('email', $data_profile['email'])  ?>" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('email'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                                <div class="col-sm-10">
                                    <input type="kota" class="form-control <?= $validation->hasError('kota') ? 'is-invalid' : '' ?> " name="kota" value="<?= old('kota', $data_profile['kota']) ?>" placeholder="Kota">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('kota'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>" rows="2" name="alamat" placeholder="Alamat...."><?= old('alamat', $data_profile['alamat']) ?></textarea>
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('alamat'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-sm-2 col-form-label">Telfon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError('telp') ? 'is-invalid' : '' ?> " name="telp" value="<?= old('telp', $data_profile['telp']) ?>" placeholder="(021)-....">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('telp'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>