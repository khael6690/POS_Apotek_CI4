<table id="tb-users" class="table table-bordered table-striped tb-data">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Config</th>
            <th style="width: 25%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_users as $value) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $value->username; ?></td>
                <td><?= $value->fullname; ?></td>
                <td>
                    <?php if ($value->id !== user_id()) : ?>
                        <form action="<?= base_url('user-aktif/' . $value->id) ?>" method="post" class="d-inline form-status">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="POST">
                            <button class="btn btn-sm text-white <?= $value->active == 1 ? 'btn-success' : 'btn-danger' ?>"><?= $value->active == 1 ? 'ON' : 'OFF' ?></button>
                        </form>
                    <?php endif; ?>
                    <form action="user-reset/<?= $value->id; ?>" method="post" class="d-inline form-reset">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="POST">
                        <button class="btn btn-info btn-sm text-white"><i class="fas fa-key"></i> Reset</button>
                    </form>
                </td>

                <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-sm" onclick="detail(<?= $value->id ?>)"><i class="fas fa-eye"></i></button>
                    <?php if ($value->id !== user_id()) : ?>
                        <button class="btn btn-warning text-white btn-sm" onclick="edit('<?= $value->id; ?>')"><i class="fas fa-edit"></i></button>
                        <form action="user-delete/<?= $value->id; ?>" method="post" class="d-inline form-hapus">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm text-white tombol-hapus"><i class="fas fa-trash"></i></button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {

        $("#tb-users").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": false

        })

    });

    // tombol aktif
    $('.form-status').submit(function(e) {
        e.preventDefault();
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ubah status",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = $(this)
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            response.success ? Toast.fire({
                                icon: 'success',
                                title: response.success
                            }) : Toast.fire({
                                icon: 'error',
                                title: response.fail
                            })
                            getData();
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
        })
    })

    // tombol resetpass
    $('.form-reset').submit(function(e) {
        e.preventDefault();
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Reset Password ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Reset',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = $(this)
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            response.success ? Toast.fire({
                                icon: 'success',
                                title: response.success
                            }) : Toast.fire({
                                icon: 'error',
                                title: response.fail
                            })
                            getData();
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
        })
    })

    // tombol hapus
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Hapus data",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
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
        })
    })
</script>