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
                    <form action="<?= base_url('changepass/' . user_id()) ?>" method="POST" class="form-horizontal">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="oldpass" class="col-sm-2 col-form-label"><?= lang('Auth.password') ?> Lama</label>
                                <div class="col-sm-10">
                                    <input type="password" name="oldpass" class="form-control <?= $validation->hasError('oldpass') ? 'is-invalid' : '' ?> " placeholder="<?= lang('Auth.password') ?> Lama" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('oldpass'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label"><?= lang('Auth.password') ?> Baru</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?> " placeholder="<?= lang('Auth.password') ?> Baru" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('password'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass_confirm" class="col-sm-2 col-form-label"><?= lang('Auth.repeatPassword') ?></label>
                                <div class="col-sm-10">
                                    <input type="password" name="pass_confirm" class="form-control <?= $validation->hasError('pass_confirm') ? 'is-invalid' : '' ?> " placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('pass_confirm'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('setuser') ?>" class="btn btn-danger float-right">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>