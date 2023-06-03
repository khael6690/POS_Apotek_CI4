<table id="tb-opname" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Produk</th>
            <th>Stok</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_opname as $value) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $value['obat']; ?></td>
                <td><?= $value['stok']; ?></td>
                <td><?= $value['jumlah']; ?></td>
                <td><?= $value['keterangan']; ?></td>
                <td><?= $value['tgl']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm text-white" onclick="edit('<?= $value['id_opname']; ?>')"><i class="fas fa-edit"></i></button>
                    <form action="opname-delete/<?= $value['id_opname']; ?>" method="post" class="d-inline form-hapus" id="form-hapus">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm text-white tombol-hapus" id="<?= $value['id_opname']; ?>"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {

        $("#tb-opname").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": false

        })

    });

    // tombol hapus
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Hapus data",
            icon: 'warning',
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    let id = $(this).attr('id');
                    $.ajax({
                        type: "delete",
                        url: $(this).parent('.form-hapus').attr('action'),
                        data: {
                            id: id
                        },
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
    })
</script>
</p>