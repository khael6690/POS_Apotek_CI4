<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                    <form action="<?= base_url('/setuser/' . user_id()) ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?> " name="username" value="<?= old('username', $data_user->username) ?>" placeholder="<?= lang('Auth.username') ?>">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('username'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?> " name="email" value="<?= old('email', $data_user->email)  ?>" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('email'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : '' ?> " name="fullname" value="<?= old('fullname', $data_user->fullname)  ?>" placeholder="Full Name">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('fullname'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_image" class="col-sm-2 col-form-label">Upload Profil</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= $validation->hasError('user_image') ? 'is-invalid' : '' ?>" name="user_image" value="<?= old('user_image', $data_user->user_image) ?>" id="img" onchange="previewImage()" accept="image/*">
                                        <label class="custom-file-label" for="user_image">Choose file</label>
                                        <div class="invalid-feedback">
                                            <span><?= $validation->getError('user_image'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="preview" class="col-sm-2 col-form-label">Preview Image</label>
                                <div class="col-sm-10">
                                    <img src="<?= base_url('/assets/upload/user/' . $data_user->user_image) ?>" alt="$data_user->username" class="img_preview img-thumbnail" style="width: 150px;">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('changepass') ?>" class="btn btn-warning text-white">Ganti Password</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>