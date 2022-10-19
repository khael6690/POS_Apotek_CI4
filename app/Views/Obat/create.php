<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="create">
                <form action="<?= base_url('obat-create') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-create">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Nama Obat">
                            <div class="invalid-feedback errornama">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" id="deskripsi" name="deskripsi" placeholder="Deskripsi Obat....."><?= old('deskripsi') ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="img" class="col-sm-2 col-form-label">Upload Gambar</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img" value="<?= old('img') ?>" id="img" onchange="previewImage()" accept="image/*">
                                <label class="custom-file-label" for="img">Choose file</label>
                                <div class="invalid-feedback errorimg">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="preview" class="col-sm-2 col-form-label">Preview Image</label>
                        <div class="col-sm-10">
                            <img src="<?= base_url('/assets/upload/obat') ?>/default.png" alt="" class="img_preview img-thumbnail" style="width: 150px;">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <select class="form-control select" id="select1" name="satuan">
                                <?php foreach ($data_satuan as $satuan) : ?>
                                    <option value="<?= $satuan['id'] ?>" <?= old('satuan') == $satuan['satuan'] ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Produsen</label>
                        <div class="col-sm-10">
                            <select class="form-control select" id="select2" name="produsen">
                                <?php foreach ($data_produsen as $produsen) : ?>
                                    <option value="<?= $produsen['id_produsen'] ?>" <?= old('produsen') == $produsen['id_produsen'] ? 'selected' : '' ?>><?= $produsen['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga Obat</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga') ?>" placeholder="1.000">
                                <div class="invalid-feedback errorharga">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary btn-save">Simpan</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function() {

        //Initialize Select2 Elements
        $('#select2').select2()
        $('#select1').select2()

        //Initialize fileinput Elements
        bsCustomFileInput.init();

        $('.btn-save').click(function(e) {
            e.preventDefault();
            let form = $('.form-create')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= base_url('obat-create') ?>",
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-save').attr('disable', 'disabled');
                    $('.btn-save').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.btn-save').removeAttr('disable', 'disabled');
                    $('.btn-save').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama) {
                            $('#nama').toggleClass('is-invalid');
                            $('.errornama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errornama').html(' ');
                        }
                        if (response.error.harga) {
                            $('#harga').toggleClass('is-invalid');
                            $('.errorharga').html(response.error.harga);
                        } else {
                            $('#harga').removeClass('is-invalid');
                            $('.errorharga').html(' ');
                        }
                        if (response.error.img) {
                            $('#img').toggleClass('is-invalid');
                            $('.errorimg').html(response.error.img);
                        } else {
                            $('#img').removeClass('is-invalid');
                            $('.errorimg').html(' ');
                        }
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        })
                        $('#modal-create').modal('hide');
                        getData()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });

        });
    });
</script>