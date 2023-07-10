<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- section small box -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="sale-box"></h3>

                            <p>Penjualan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <a href="<?= base_url('laporan-jual') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="buy-box"></h3>

                            <p>Pembelian</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3 id="users-box"></h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="opname-box"></h3>

                            <p>Stok Opname</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="<?= base_url('stok-opname') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->

            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <!-- chart box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Grafik Transaksi</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#bar-chart" data-toggle="tab">Bar Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#line-chart" data-toggle="tab">Line Chart</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="tab-content p-0">
                                            <div class="chart tab-pane active" id="bar-chart">
                                                <canvas id="bar" width="100%" height="50%"></canvas>
                                            </div>
                                            <div class="chart tab-pane" id="line-chart">
                                                <canvas id="line" width="100%" height="50%"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-success">
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?= base_url('assets/upload/user/thumbs/' . User()->user_image) ?>" alt="User Avatar">
                            </div>
                            <!-- tools card -->
                            <div class="card-tools float-right">
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><?= User()->fullname; ?></h3>
                            <h5 class="widget-user-desc"><?= $data_user['name']; ?></h5>
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <p class="nav-link">
                                        Nama Lengkap <span class="float-right"><?= $data_user['fullname']; ?></span>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link">
                                        Username <span class="float-right"><?= $data_user['username']; ?></span>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link">
                                        Email <span class="float-right"><?= $data_user['email']; ?></span>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link">
                                        Update <span class="float-right"><a class="btn btn-block btn-success" href="<?= base_url('setuser'); ?>">Edit</a></span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- ./col -->
                <div class="col-md-6">
                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i> Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- ./row -->

        </div>
        <!-- /.container -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        getRows()
    });


    function getRows() {
        $.ajax({
            type: "get",
            url: "<?= base_url('count-rows') ?>",
            dataType: "json",
            beforeSend: function() {
                $('#sale-box').html('<i class="fas fa-spinner fa-spin"></i>');
                $('#buy-box').html('<i class="fas fa-spinner fa-spin"></i>');
                $('#users-box').html('<i class="fas fa-spinner fa-spin"></i>');
                $('#opname-box').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.status == true) {
                    $('#sale-box').html(response.data.sales);
                    $('#buy-box').html(response.data.buys);
                    $('#users-box').html(response.data.users);
                    $('#opname-box').html(response.data.opname);
                }
            }
        });
    }

    function getGrafik(chartType) {
        $.ajax({
            type: "get",
            url: "<?= base_url('grafik') ?>",
            dataType: "json",
            success: function(response) {
                const sales = response.data.sales;
                const buys = response.data.buy;

                let chartX = [];
                let chartY = [];
                let chartY2 = [];
                let chartX2 = [];
                sales.forEach(function(data) {
                    chartX.push(data.tgl);
                    chartY.push(data.total);
                });
                buys.forEach(function(data) {
                    chartX2.push(data.tgl);
                    chartY2.push(data.total);
                })
                const chartData = {
                    labels: chartX,
                    datasets: [{
                        label: 'Penjualan',
                        data: chartY,
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        borderWidth: 4
                    }, {
                        label: 'Pembelian',
                        data: chartY2,
                        backgroundColor: 'rgba(242, 4, 4, 0.8)',
                        borderColor: 'rgba(242, 4, 4, 0.6)',
                        borderWidth: 4
                    }]
                };
                const ctx = document.getElementById(chartType).getContext('2d');
                const config = {
                    type: chartType,
                    data: chartData
                };

                const chart = new Chart(ctx, config);
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
    getGrafik('bar')
    getGrafik('line')
</script>

<?= $this->endSection(); ?>