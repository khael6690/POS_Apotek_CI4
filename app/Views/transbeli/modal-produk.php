<div class="modal fade" id="modal-produk">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped tb-sale">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($produk as $value) : ?>
                                <tr>
                                    <td><?= $no++; ?> </td>
                                    <td><?= $value['nama_obat']; ?></td>
                                    <td><?= $value['jumlah']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="add_to_cart('<?= $value['id_obat']; ?>','<?= $value['nama_obat']; ?>','<?= $value['harga']; ?>','<?= $value['discount']; ?>')"><i class="fas fa-plus-circle"></i> Pilih</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
    // menambahkan produk
    function add_to_cart(id, nama, harga, discount) {
        $.ajax({
            url: "<?= base_url('add-cart-buy') ?>",
            type: "post",
            data: {
                'obat_id': id,
                'harga': harga,
                'nama': nama,
                'discount': discount,
            },
            success: function(response) {
                $('#modal-produk').modal('hide')
                if (response.status == true) {
                    let items = response.data
                    tampilItems(items)
                } else {
                    Swal.fire({
                        title: 'Items',
                        text: response.msg,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    })
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
        })

    }
</script>
<?= $this->endSection(); ?>