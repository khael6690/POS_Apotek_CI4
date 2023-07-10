<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- auto numeric -->
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.8.1"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/moment.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.dateTime.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- App Script -->
<script src="<?= base_url() ?>assets/js/script.js"></script>
<script>
    function hapus(id, nama, routes, reload = getData()) {
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Hapus data " + nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: routes + id,
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
                            reload
                        }
                    });

                }
            }
        })
    }
</script>