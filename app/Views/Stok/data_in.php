<div class="form-group row">
    <div class="col-sm-2">
        <label for="tgl_awal" class="col-form-label">Tangggal Awal :</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="tgl_awal" id="tgl_awal">
    </div>
    <div class="col-sm-2">
        <label for="tgl_akhir" class="col-form-label">Tangggal Akhir :</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir">
    </div>
</div>
<table id="tb-stok" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Produk</th>
            <th>Supplier</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($datastok as $value) : ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?= $value['obat']; ?></td>
                <td><?= $value['supplier']; ?></td>
                <td><?= $value['jumlah']; ?></td>
                <td><?= $value['tgl']; ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[4]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#tgl_awal'), {
            format: 'Do MMMM YYYY'
        });
        maxDate = new DateTime($('#tgl_akhir'), {
            format: 'Do MMMM YYYY'
        });
        // DataTables initialisation
        var table = $("#tb-stok").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": false

        })

        // Refilter the table
        $('#tgl_awal, #tgl_akhir').on('change', function() {
            table.draw();
        });
    });
</script>
</p>