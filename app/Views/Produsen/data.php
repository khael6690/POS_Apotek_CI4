<table id="tb-produsen" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th style="width: 25%;">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#tb-produsen").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('produsen/data') ?>',
            order: [],
            columnDefs: [{
                targets: -1,
                orderable: false
            }, {
                targets: 0,
                orderable: false
            }, ]
        })
    });


    function hapus(id, nama, routes) {
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
                            getData();
                        }
                    });

                }
            }
        })
    }
</script>