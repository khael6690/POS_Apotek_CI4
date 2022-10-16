<div class="modal fade" id="modal-customer">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tb-customer" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th style="width: 25%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($customer as $value) : ?>
                            <tr>
                                <td><?= $no++; ?> </td>
                                <td><?= $value['nama']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="getCustomer('<?= $value['id']; ?>','<?= $value['nama']; ?>','<?= $value['diskon']; ?>')"><i class="fas fa-plus-circle"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?= $this->section('script'); ?>
<script>
    function getCustomer(id, nama, diskon) {
        $('#id-customer').val(id)
        $('#nama-customer').val(nama)
        $('#diskon').val(diskon)
        $('#modal-customer').modal('hide')
    }
</script>
<?= $this->endSection(); ?>