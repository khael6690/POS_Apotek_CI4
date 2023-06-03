<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/admin/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables/dataTables.dateTime.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>/assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/admin/plugins/chart.js/Chart.min.js"></script>

<script>
    $(document).ready(function() {

        $('.tb-sale').DataTable({
            "paging": true,
            "lengthChange": false,
            "pageLength": 10,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        })

        //Initialize Select2 Elements
        $('#select2').select2()
        $('#select1').select2()

        //Initialize fileinput Elements
        bsCustomFileInput.init();
    });

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    // previewImage
    function previewImage() {
        const images = document.querySelector('#img')
        const img_preview = document.querySelector('.img_preview')
        const file_img = new FileReader()
        file_img.readAsDataURL(images.files[0])
        file_img.onload = function(e) {
            img_preview.src = e.target.result
        }
    }


    //function detail 
    function detail(id) {
        const tujuan = window.location.pathname + `-detail`;
        $.ajax({
            url: tujuan,
            type: "POST",
            data: {
                id: id
            },
            success: function(getreturn) {
                $('#data_detail').html(getreturn)
            }
        })
    }
</script>

<?php if (session()->getFlashdata('sukses')) { ?>
    <script>
        Toast.fire({
            icon: 'success',
            title: '<?= session()->getFlashdata('sukses'); ?>'
        })
    </script>
<?php } ?>
<?php if (isset($error)) { ?>
    <script>
        Toast.fire({
            icon: 'error',
            title: '<?= strip_tags($error); ?>'
        })
    </script>
<?php } ?>

<?php if (session()->getFlashdata('warning')) { ?>
    <script>
        Toast.fire({
            icon: 'warning',
            title: '<?= session()->getFlashdata('warning'); ?>'
        })
    </script>
<?php } ?>

<?php if (session()->getFlashdata('danger')) { ?>
    <script>
        Toast.fire({
            icon: 'error',
            title: '<?= session()->getFlashdata('danger'); ?>'
        })
    </script>
<?php } ?>