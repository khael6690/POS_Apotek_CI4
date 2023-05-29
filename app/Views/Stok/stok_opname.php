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
                        <li>view data <?= $title; ?></li>
                        <li>update data <?= $title; ?></li>
                        <li>delete data <?= $title; ?></li>
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
                    <div class="viewdata">
                    </div>
                </div>
                <!-- /.card-body -->
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

        });

        // Tampil viewdata
        function getData() {
            $.ajax({
                url: "<?= site_url('stok-opname/viewdata') ?>",
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