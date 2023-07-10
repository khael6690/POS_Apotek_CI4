<table id="tb-group" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Group</th>
            <th>Deskripsi</th>
            <th style="width: 15%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_group as $value) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $value->name; ?></td>
                <td><?= $value->description; ?></td>
                <td>
                    <button class="btn btn-warning text-white btn-sm" onclick="edit('<?= $value->id; ?>')"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {

        $("#tb-group").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": false

        })

    });
</script>