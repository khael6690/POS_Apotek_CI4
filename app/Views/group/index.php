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
                        <li class="breadcrumb-item"><a href="<?= base_url('group') ?>">Home</a></li>
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
                            <h3>Halaman pengelolahan <?= $title; ?></h3>
                            <p>Memberikan hak akses tiap group/role!</p>
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
                    <div class="viewdata"></div>
                </div>
            </div>
            <div id="viewnodal" style="display: none;"></div>
            <!-- /.card-body -->
        </div>
        <!-- viewmodal -->
        <div id="viewmodal" style="display: none;"></div>
        <!-- /. viewmodal -->
        <!--/. container-fluid -->
    </section>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        // load tampil viewdata
        getData();
    });

    // Tampil viewdata
    function getData() {
        $.ajax({
            url: "<?= site_url('group/viewdata') ?>",
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

    function edit(id) {
        $.ajax({
            type: "get",
            url: "/group-update/" + id,
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