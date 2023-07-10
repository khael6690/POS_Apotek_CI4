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
        
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#tb-stok").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            'info': false,
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('stok/data') ?>',
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