<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengelolahan Data <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('group') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><span id="date_time"></span></h1>
                    <!-- /.card-header -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="container"> -->

                    <div class="form-group row">
                        <div class="col-sm-1">
                            <label for="tgl" class="col-form-label">No Faktur :</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" id="saleId" class="form-control" disabled>
                        </div>
                        <div class="col-sm-1">
                            <label for="user" class="col-form-label">User :</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" value="<?= user()->username ?>" class="form-control" disabled>
                        </div>
                        <div class="col-sm-1">
                            <label for="customer" class="col-form-label">Customer :</label>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input id="nama-customer" type="text" class="form-control" disabled>
                                <input id="id-customer" type="hidden" class="form-control" disabled>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-customer"><i class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input id="kdproduk" type="text" class="form-control" placeholder="Kode Produk">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-produk"><i class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="detail_cart">
                            <tr>
                                <td colspan="7">Belum ada transaksi!</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row mt-4">
                        <div class="col-sm-5">
                            <label class="form-label">Subtotal</label>
                            <h1><span id="total">Rp 0,00</span></h1>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">
                                    <label class="form-label">Total Bayar</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" id="totbayar" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">
                                    <label class="form-label">Discount</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="number" min="0" max="100" class="form-control" id="diskon" value="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">
                                    <label class="form-label">Nominal</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" id="nominal" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">
                                    <label class="form-label">Kembalian</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" id="kembalian" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-4">
                                    <button class="btn btn-primary" onclick="bayar()">Bayar</button>
                                    <button class="btn btn-success" id="transbaru">Transaksi Baru</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
        </div>
    </section>

    <?= $this->include('transjual/modal-produk') ?>

    <?= $this->include('transjual/modal-customer') ?>

    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {

            window.onload = date_time('date_time'), sale_id();

            // card maximaize
            $('.card').CardWidget('maximize')


            // numeric input
            nominal = new AutoNumeric('#nominal', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.'
            });

            totbayar = new AutoNumeric('#totbayar', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.'
            });

            kembalian = new AutoNumeric('#kembalian', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.'
            });

            // input diskon
            $('#diskon').click(function(e) {
                e.preventDefault();
                const diskon = $(this).val();
                $.ajax({
                    type: "post",
                    url: "<?= base_url('load-totbayar-transjual') ?>",
                    data: {
                        diskon: diskon
                    },
                    success: function(response) {
                        let items = $.parseJSON(response)
                        totbayar.set(items.totbayar);
                    }
                });

            });

            // input kembalian
            $('#nominal').keydown(function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault()
                    const nominalx = nominal.get();
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('load-kembalian-transjual') ?>",
                        data: {
                            nominal: nominalx,
                            totbayar: totbayar.get()
                        },
                        success: function(response) {
                            let items = $.parseJSON(response)

                            totbayar.set(items.totbayar);
                            kembalian.set(items.kembalian);
                            // $('#kembalian').val(items.kembalian);
                        }
                    });
                }
            });

            // cari barang
            $('#kdproduk').keydown(function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault()
                    const id = $(this).val();
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('add-cart-transjual') ?>/" + id,
                        data: {
                            id: id
                        },
                        success: function(result) {
                            let items = $.parseJSON(result)
                            if (items.status === true) {
                                let item = items.data
                                tampilItems(item)
                            } else {
                                Swal.fire({
                                    title: items.data,
                                    text: items.msg,
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
                    });
                }
            });
        });

        // tampil data transaksi
        function tampilItems(item) {
            $('#detail_cart').html(item)
            $('#total').load('load-total-transjual')
            $('#diskon').focus();
        }

        // membuat tanggal dan waktu
        function date_time(id) {

            date = new Date;
            tahun = date.getFullYear();
            bulan = date.getMonth();
            tanggal = date.getDate();
            hari = date.getDay();

            namabulan = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            namahari = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

            h = date.getHours();
            if (h < 10) {
                h = "0" + h;
            }
            m = date.getMinutes();
            if (m < 10) {
                m = "0" + m;
            }
            s = date.getSeconds();
            if (s < 10) {
                s = "0" + s;
            }

            //susun dengan format baru
            result = namahari[hari] + ', ' + tanggal + ' ' + namabulan[bulan] + ' ' + tahun + ' / ' + h + ':' + m + ':' + s;
            document.getElementById(id).innerHTML = result;
            setTimeout('date_time("' + id + '");', '1000');
            return true;
        }

        //Membuat Sale_id otomatis
        function sale_id() {
            d = new Date()
            let sale_id = "TRX-" + d.getTime()
            $('#saleId').val(sale_id);
        }

        // konfirmasi transaksi baru
        $('#transbaru').on('click', function(e) {
            e.preventDefault()
            swal.fire({
                title: 'Transaksi',
                text: "Lakukan Transksi Baru?",
                icon: 'question',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: "<?= base_url('reset-cart-transjual') ?>",
                        success: function(response) {
                            const result = JSON.parse(response);
                            if (result.status) {
                                $('#detail_cart').html(`<tr><td colspan="7">Belum ada transaksi!</td></tr>`)
                                $('#total').load('load-total-transjual')
                                nominal.clear();
                                $('#kembalian').val(' ');
                                $('#kdproduk').val(' ');
                                $('#nama-customer').val(' ');
                                $('#id-customer').val(' ');
                                $('#totbayar').val('');
                                $('#diskon').val('0');
                                sale_id()
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Perintah gagal!',
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
                    });
                }
            })
        });

        // hapus barang
        $(document).on('click', '.hapus-cart', function(id) {
            const rowid = $(this).attr('id')
            $.ajax({
                url: "<?= base_url('delete-cart-transjual') ?>/" + rowid,
                type: "DELETE",
                success: function(response) {
                    let itemx = $.parseJSON(response)
                    if (itemx.status == true) {
                        const item = itemx.data
                        tampilItems(item)
                    } else {
                        $('#detail_cart').html(`<tr><td colspan="7">Belum ada transaksi!</td></tr>`)
                        $('#total').load('load-total-transjual')
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
        })

        // ubah qty barang
        $(document).on('change', '#jumqty', function(e) {
            const rowid = $(this).attr('rowid')
            const qty = $(this).val()
            $.ajax({
                url: "<?= base_url('update-cart-transjual') ?>/" + rowid,
                type: "POST",
                data: {
                    'qty': qty
                },
                success: function(result) {
                    let items = $.parseJSON(result)
                    if (items.data) {
                        const item = items.data
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
                }
            })
        })

        // Pembayaran transaksi
        function bayar() {
            swal.fire({
                title: 'Transaksi',
                text: "Lakukan Pembayaran?",
                icon: 'warning',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    const nominalx = nominal.get();
                    const customer = $('#id-customer').val();
                    const sale_id = $('#saleId').val();
                    const diskon = $('#diskon').val();
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('pembayaran') ?>",
                        data: {
                            'sale_id': sale_id,
                            'nominal': nominalx,
                            'customer': customer,
                            'diskon': diskon,
                            'totbayar': totbayar.get()
                        },
                        success: function(response) {
                            const result = JSON.parse(response);

                            if (result.status) {
                                Swal.fire({
                                    title: result.title,
                                    text: result.msg,
                                    icon: result.status == true ? 'success' : 'error',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    title: result.title,
                                    text: result.msg,
                                    icon: result.status == true ? 'success' : 'error',
                                    showConfirmButton: false,
                                    timer: 1500
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
                    });
                }
            })


        }
    </script>
    <?= $this->endSection(); ?>