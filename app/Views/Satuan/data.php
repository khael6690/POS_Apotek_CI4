<table id="tb-satuan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Satuan</th>
            <th style="width: 25%;">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#tb-satuan").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('satuan/data') ?>',
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