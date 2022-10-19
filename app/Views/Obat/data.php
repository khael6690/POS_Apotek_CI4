<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Produsen</th>
            <th>Harga</th>
            <th style="width: 25%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_obat as $obat) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $obat['nama_obat']; ?></td>
                <td><?= $obat['jumlah']; ?></td>
                <td><?= $obat['nama']; ?></td>
                <td>Rp. <?= $obat['harga']; ?></td>
                <td>
                    <button class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-sm" onclick="detail(<?= $obat['id_obat'] ?>)"><i class="fas fa-eye"></i></button>
                    <a href="obat-update/<?= $obat['id_obat']; ?>" class="btn btn-warning btn-md text-white"><i class="fas fa-edit"></i></a>
                    <form action="obat-delete/<?= $obat['id_obat']; ?>" method="post" class="d-inline form-hapus">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-md text-white tombol-hapus"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
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
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent('.form-hapus').submit();
            }
        })
    })
</script>