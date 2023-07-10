<table id="tb-customers" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#tb-customers").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('customers/data') ?>',
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