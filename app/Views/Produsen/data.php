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
        <?php $no = 1;
        foreach ($data_produsen as $value) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['alamat']; ?></td>
                <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-sm" onclick="detail(<?= $value['id_produsen'] ?>)"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-warning btn-sm text-white" onclick="edit('<?= $value['id_produsen']; ?>')"><i class="fas fa-edit"></i></button>
                    <form action="produsen-delete/<?= $value['id_produsen']; ?>" method="post" class="d-inline form-hapus" id="form-hapus">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm text-white tombol-hapus"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#tb-produsen").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false
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
                                })
                                getData()
                            } else {
                                Toast.fire({
                                    icon: 'warning',
                                    title: response.error
                                })
                                getData()
                            }
                        }
                    });

                }
            }
        })
    })
</script>