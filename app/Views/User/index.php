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
                <div class="card-header bg-info">
                    <h3 class="card-title"><i class="fas fa-bullhorn"></i> Petunjuk!</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h3>Halaman pengelolahan data Users</h3>
                    <ul>
                        <li>add new user</li>
                        <li>setting status user *aktif/nonaktif</li>
                        <li>reset password user default "12345678"</li>
                        <li>setting role user</li>
                        <li>view user & delete user</li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Data <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-2">
                        <a href="<?= base_url() ?>/user-create" class="btn btn-block bg-gradient-primary btn-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah <?= $title; ?></a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_users as $value) : ?>
                                <tr>
                                    <td><?= $no++; ?> </td>
                                    <td><?= $value->username; ?></td>
                                    <td><?= $value->email; ?></td>
                                    <td>
                                        <?php if ($value->id !== user_id()) : ?>
                                            <form action="<?= base_url('user-aktif/' . $value->id) ?>" method="post" class="d-inline form-aktif">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="POST">
                                                <button class="btn btn-sm text-white tombol-aktif <?= $value->active == 1 ? 'btn-success' : 'btn-danger' ?>"><?= $value->active == 1 ? 'Aktif' : 'Tidak Aktif' ?></button>
                                            </form>
                                        <?php endif; ?>
                                        <form action="user-reset/<?= $value->id; ?>" method="post" class="d-inline form-reset">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="POST">
                                            <button class="btn btn-info btn-sm text-white tombol-reset"><i class="fas fa-key"></i> Reset</button>
                                        </form>
                                    </td>

                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-sm" onclick="detail(<?= $value->id ?>)"><i class="fas fa-eye"></i></button>
                                        <?php if ($value->id !== user_id()) : ?>
                                            <a href="user-update/<?= $value->id; ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                            <form action="user-delete/<?= $value->id; ?>" method="post" class="d-inline form-hapus" id="form-hapus">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm text-white tombol-hapus"><i class="fas fa-trash"></i></button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

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

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>
    <script>
        // tombol aktif
        $('.tombol-aktif').on('click', function(e) {
            e.preventDefault();
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ubah status",
                icon: 'question',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent('.form-aktif').submit();
                }
            })
        })

        // tombol resetpass
        $('.tombol-reset').on('click', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Reset Password",
                icon: 'warning',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Reset!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent('.form-reset').submit();
                }
            })
        })
    </script>
    <?= $this->endSection(); ?>