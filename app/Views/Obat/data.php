<table id="tb-obat" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Produsen</th>
            <th>Harga</th>
            <th style="width: 25%;">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        $("#tb-obat").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('obat/data') ?>',
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
</script>