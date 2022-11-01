<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                    <h3 class="card-title">Data <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-password-tab" data-toggle="pill" href="#custom-content-below-password" role="tab" aria-controls="custom-content-below-password" aria-selected="false">Password</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
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
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-password" role="tabpanel" aria-labelledby="custom-content-below-password-tab">
                            <form action="<?= base_url('changepass/' . user_id()) ?>" method="POST" class="form-horizontal form-password">
                                <?= csrf_field() ?>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="oldpass" class="col-sm-2 col-form-label"><?= lang('Auth.password') ?> Lama</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="<?= lang('Auth.password') ?> Lama" autocomplete="off">
                                            <div class="invalid-feedback erroroldpass">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label"><?= lang('Auth.password') ?> Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="<?= lang('Auth.password') ?> Baru" autocomplete="off">
                                            <div class="invalid-feedback errorpassword">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass_confirm" class="col-sm-2 col-form-label"><?= lang('Auth.repeatPassword') ?></label>
                                        <div class="col-sm-10">
                                            <input type="password" name="pass_confirm" id="pass_confirm" class="form-control" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                            <div class="invalid-feedback errorpass_confirm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-save">Save</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {

            $('.form-password').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btn-save').attr('disable', 'disabled');
                        $('.btn-save').html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    complete: function() {
                        $('.btn-save').removeAttr('disable', 'disabled');
                        $('.btn-save').html('Save');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.oldpass) {
                                $('#oldpass').addClass('is-invalid');
                                $('.erroroldpass').html(response.error.oldpass);
                            } else {
                                $('#oldpass').removeClass('is-invalid');
                                $('.erroroldpass').html(' ');
                            }
                            if (response.error.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorpassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorpassword').html(' ');
                            }
                            if (response.error.pass_confirm) {
                                $('#pass_confirm').addClass('is-invalid');
                                $('.errorpass_confirm').html(response.error.pass_confirm);
                            } else {
                                $('#pass_confirm').removeClass('is-invalid');
                                $('.errorpass_confirm').html(' ');
                            }
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: response.success
                            })
                            $('.form-password')[0].reset();
                            $('.form-password').find('input').filter(':password').val('').end()
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });

        });
    </script>
    <?= $this->endSection(); ?>