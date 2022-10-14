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
                    <form action="<?= base_url() ?>/user-create" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?> " name="username" value="<?= old('username') ?>" placeholder="<?= lang('Auth.username') ?>">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('username'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?> " name="email" value="<?= old('email') ?>" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('email'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="fullname" class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : '' ?> " name="fullname" value="<?= old('fullname') ?>" placeholder="Full Name">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('fullname'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="groub" class="col-sm-2 col-form-label">Role / Level</label>
                                <div class="col-sm-10">
                                    <select class="form-control select" id="select1" name="group">
                                        <?php foreach ($data_group as $value) : ?>
                                            <option value="<?= $value->name ?>" <?= old('group') == $value->name ? 'selected' : '' ?>><?= $value->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('groub'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label"><?= lang('Auth.password') ?></label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?> " placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('password'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass_confirm" class="col-sm-2 col-form-label">Password Repeat</label>
                                <div class="col-sm-10">
                                    <input type="password" id="pass_confirm" name="pass_confirm" class="form-control <?= $validation->hasError('pass_confirm') ? 'is-invalid' : '' ?> " placeholder="Repeat Password" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('pass_confirm'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url() ?>/user" class="btn btn-danger float-right">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>