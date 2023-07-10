<table id="tb-opname" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {

        $("#tb-opname").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": false,
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('stok-opname/data') ?>',
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

    function hapusOpname(id, nama, routes) {
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
                            getData()
                            getDataOpname()
                        }
                    });

                }
            }
        })
    }
</script>
</p>