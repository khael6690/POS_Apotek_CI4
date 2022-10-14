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
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url('/group-update/' . $data_group->id) ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <?= csrf_field() ?>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Group</label>
                                        <div class="col-sm-10">
                                            <input type="text" disabled class="form-control" name="name" value="<?= old('name'), $data_group->name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="groub" class="col-sm-2 col-form-label">Permissions</label>
                                        <div class="col-sm-10">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="cekall" name="permissions" onclick="cek_all(this)">
                                                <label for="cekall" class="custom-control-label">Check Semua</label>
                                            </div>
                                            <?php foreach ($permissions as $value) : ?>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input <?= $validation->hasError('permissions') ? 'is-invalid' : '' ?>" type="checkbox" id="<?= $value->name ?>" value="<?= $value->id ?>" name="permissions[]" <?= $value->name == isset($permissionsGroup[$value->id]) ? 'checked' : '' ?>>

                                                    <label for="<?= $value->name ?>" class="custom-control-label"><?= $value->name ?></label>
                                                    <div class="invalid-feedback">
                                                        <span><?= $validation->getError('permissions'); ?></span>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('/group') ?>" class="btn btn-danger float-right">Cancel</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- ./row -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>
    <?= $this->section('script'); ?>
    <script>
        // cek all role
        function cek_all(source) {
            checkboxes = document.getElementsByName('permissions[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
    <?= $this->endSection(); ?>