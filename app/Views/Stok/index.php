<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengelolahan <?= $title; ?></h1>
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
                            <h3>Halaman pengelolahan data <?= $title; ?></h3>
                            <ul>
                                <li>view detail <?= $title; ?></li>
                                <li>buy to add <?= $title; ?></li>
                                <li>add <?= $title; ?> opname</li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Stok barang -->
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive viewdata">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- ./col stok barang -->
            </div>
            <!-- ./row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- stok brang masuk -->
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title">Data Opname</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive viewopname">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div id="viewmodal" style="display: none;"></div>
        </div>
        <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {

            // load tampil viewdata
            getData()
            getDataOpname()

        });


        // Tampil viewdata
        function getData() {
            $.ajax({
                url: "<?= site_url('stok/viewdata') ?>",
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

        // Tampil viewdata opname
        function getDataOpname() {
            $.ajax({
                url: "<?= site_url('stok-opname/viewdata') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewopname').html(response.data);
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

        function add(id) {
            $.ajax({
                url: "/opname-create/" + id,

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
        }

        //Tampil Form edit
        function edit(id) {
            $.ajax({
                type: "get",
                url: "/opname-update/" + id,
                data: {
                    id: id
                },
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
    </script>
    <?= $this->endSection(); ?>