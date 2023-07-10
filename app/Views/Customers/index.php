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
            <!-- Petunjuk -->
            <div class="row">
                <div class="col">
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
                            <h3>Halaman pengelolahan data Customers</h3>
                            <ul>
                                <li>add customers & discount</li>
                                <li>view detail customers</li>
                                <li>update customers</li>
                                <li>delete customers</li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Data <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-2">
                        <button type="button" class="btn bg-gradient-primary btn-sm mb-3" id="btn-create"><i class="fas fa-plus-circle"></i></button>
                    </div>
                    <div class="viewdata">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div id="viewmodal" style="display: none;"></div>

            <!-- Modals detail -->
            <div class="modal fade" id="modal-detail">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
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

    <?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {

            getData()

            $('#btn-create').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('customers-create') ?>",
                    dataType: "json",
                    success: function(response) {
                        $('#viewmodal').html(response.data).show();
                        $('#modal-create').modal('show');
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

        });


        function edit(id) {
            $.ajax({
                type: "get",
                url: "<?= site_url('customers-update/') ?>" + id,
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('#viewmodal').html(response.data).show();
                        $('#modal-update').modal('show');
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
        }

        function hapus(id, nama) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Hapus data " + nama,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "delete",
                            url: '<?= site_url('customers/') ?>' + id,
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: response.success
                                    });
                                } else {
                                    Toast.fire({
                                        icon: 'warning',
                                        title: response.error
                                    });
                                }
                                getData();
                            }
                        });

                    }
                }
            })
        }


        function getData() {
            $.ajax({
                url: "<?= site_url('customers/viewdata') ?>",
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
    </script>
    <?= $this->endSection(); ?>