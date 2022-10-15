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
                <table id="tb-produk" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th style="width: 25%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($produk as $value) : ?>
                            <tr>
                                <td><?= $no++; ?> </td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['stok']; ?></td>
                                <td><?= number_to_currency($value['harga'], 'IDR', 'id_ID', 2) ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="add_to_cart('<?= $value['id_obat']; ?>','<?= $value['nama']; ?>','<?= $value['harga']; ?>','<?= $value['discount']; ?>')"><i class="fas fa-plus-circle"></i> Pilih</button>
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
    // tampil data transaksi
    // function tampil_data(item) {
    //     let text = "";
    //     for (var i = 0; i < item.length; i++) {
    //         $('#detail_cart').html(text +=
    //             `<tr><td>` + (i + 1) + `</td>
    //                 <td>` + item[i].name + `</td>
    //                 <td style="width: 10%;"><input type="number" min="1" class="form-control" value="` + item[i].qty + `" rowid="` + item[i].rowid + `" id="jumqty"></td>
    //                 <td>` + item[i].price + `</td>
    //                 <td>` + item[i].discount + `</td>
    //                 <td>` + item[i].subtotal + `</td>
    //                 <td>
    //                     <button class="btn btn-danger hapus-cart" id="` + item[i].rowid + `">Hapus</button>
    //                 </td>
    //                 </tr>`);
    //     }
    //     $('#total').load('load-total-transjual')
    //     $('#nominal').focus();
    // }

    // menambahkan produk
    function add_to_cart(id, nama, harga, discount) {
        $.ajax({
            url: "<?= base_url('add-cart-transjual') ?>",
            type: "POST",
            data: {
                'obat_id': id,
                'harga': harga,
                'nama': nama,
                'discount': discount,
            },
            success: function(response) {
                let itemx = $.parseJSON(response)
                $('#modal-produk').modal('hide')
                if (itemx.data) {
                    const item = itemx.data
                    tampilItems(item)
                } else {
                    Swal.fire({
                        title: 'Data',
                        text: 'Data tidak ditemukan!',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
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