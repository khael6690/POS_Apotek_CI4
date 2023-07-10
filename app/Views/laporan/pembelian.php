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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="tgl_awal" class="col-form-label">Tangggal Awal :</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="tgl_awal" id="tgl_awal">
                        </div>
                        <div class="col-sm-2">
                            <label for="tgl_akhir" class="col-form-label">Tangggal Akhir :</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir">
                        </div>
                    </div>
                    <table id="tb-laporan" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Buy ID</th>
                                <th>Tgl Transaksi</th>
                                <th>User</th>
                                <th>Supplier</th>
                                <th>Total Transaksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($result as $value) : ?>
                                <tr>
                                    <td><?= $no++; ?> </td>
                                    <td><?= $value['buyid']; ?></td>
                                    <td><?= $value['tgl_transaksi']; ?></td>
                                    <td><?= $value['username']; ?></td>
                                    <td><?= $value['supplier']; ?></td>
                                    <td><?= number_to_currency($value['total'], 'IDR', 'id_ID', 2); ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg" onclick="detail('<?= $value['buyid'] ?>')"><i class="fas fa-eye"></i> Detail</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Modals detail -->
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail <?= $title; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="data_detail">

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
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[2]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#tgl_awal'), {
                format: 'Do MMMM YYYY'
            });
            maxDate = new DateTime($('#tgl_akhir'), {
                format: 'Do MMMM YYYY'
            });
            // DataTables initialisation
            var table = $("#tb-laporan").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "info": false,
                "dom": 'Bfrtip',
                "buttons": [{
                    extend: 'print',
                    orientation: 'potrait',
                    pageSize: 'Legal',
                    title: 'Laporan Pembelian',
                    exportOptions: {
                        columns: ':visible'
                    },
                }, {
                    extend: 'excel',
                    orientation: 'potrait',
                    pageSize: 'Legal',
                    title: 'Laporan Pembelian',
                    exportOptions: {
                        columns: ':visible'
                    },
                }, {
                    extend: 'pdf',
                    orientation: 'potrait',
                    pageSize: 'Legal',
                    title: 'Laporan Pembelian',
                    exportOptions: {
                        columns: ':visible'
                    },
                }, "colvis"],
                language: {
                    buttons: {
                        colvis: 'Select'
                    }
                }

            })

            // Refilter the table
            $('#tgl_awal, #tgl_akhir').on('change', function() {
                table.draw();
            });
        });
    </script>
    <?= $this->endSection(); ?>