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
                            <div class="viewdata"></div>
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
            getData()

        });

        // Tampil viewdata
        function getData() {
            $.ajax({
                url: "<?= site_url('setuser/datauser') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewdata').html(response.data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        title: xhr.status,
                        text: thrownError,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }

        $('.form-password').submit(function(e) {
            e.preventDefault();
            var form = $(this); // Menyimpan referensi form dalam variabel form
            $.ajax({
                type: "post",
                url: form.attr('action'), // Menggunakan variabel form untuk mendapatkan URL aksi form
                data: form.serialize(), // Menggunakan variabel form untuk mengambil data form yang akan di-serialize
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
                        response.error && response.error.oldpass ?
                            (form.find('#oldpass').addClass('is-invalid'), form.find('.erroroldpass').html(response.error.oldpass)) :
                            (form.find('#oldpass').removeClass('is-invalid'), form.find('.erroroldpass').html(''));

                        response.error && response.error.password ?
                            (form.find('#password').addClass('is-invalid'), form.find('.errorpassword').html(response.error.password)) :
                            (form.find('#password').removeClass('is-invalid'), form.find('.errorpassword').html(''));

                        response.error && response.error.pass_confirm ?
                            (form.find('#pass_confirm').addClass('is-invalid'), form.find('.errorpass_confirm').html(response.error.pass_confirm)) :
                            (form.find('#pass_confirm').removeClass('is-invalid'), form.find('.errorpass_confirm').html(''));
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        });
                        form[0].reset();
                        form.find('input[type="password"]').val('');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        title: xhr.status,
                        text: thrownError,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    </script>
    <?= $this->endSection(); ?>