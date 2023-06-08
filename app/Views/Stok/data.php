<table id="tb-stok" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama</th>
            <th>Produsen</th>
            <th>Stok</th>
            <th style="width: 10%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_obat as $value) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $value['nama_obat']; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['jumlah']; ?></td>
                <td>
                    <button class="btn btn-success btn-sm text-white" onclick="add('<?= $value['id_obat']; ?>')"><i class="fas fa-minus"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#tb-stok").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        })
    });
</script>