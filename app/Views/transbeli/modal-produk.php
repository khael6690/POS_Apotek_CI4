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
                    <table class="table table-bordered table-striped" id="tb-produk">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-data">

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
    var tb = $('#tb-produk').DataTable({
        ajax: {
            url: '<?= base_url('get-produk') ?>', // Ganti dengan URL endpoint Anda
            method: 'GET',
            dataSrc: 'data' // Nama properti yang berisi data pada respons JSON
        },
        columns: [{
                data: null,
                render: function(data, type, row, meta) {
                    // Mengembalikan nomor urut bertambah sesuai panjang datanya
                    return meta.row + 1;
                }
            },
            {
                data: 'nama_obat'
            },
            {
                data: 'jumlah'
            },
            {
                data: null,
                render: function(data, type, full) {
                    return type === 'display' ?
                        `<button type="button" class="btn btn-primary" onclick="add_to_cart('${full.id_obat}','${full.nama_obat}','${full.harga}','${full.discount}')"><i class="fas fa-plus-circle"></i></button>` :
                        data;
                }
            },
        ],
        "paging": true,
        "lengthChange": false,
        "pageLength": 10,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
    });

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
                    tampilItems(response.data)
                } else {
                    Swal.fire({
                        title: 'Items',
                        text: response.msg,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1000
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