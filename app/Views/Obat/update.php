<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Update <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>/obat-update/<?= $data_obat['id_obat'] ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-update">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $data_obat['nama_obat']) ?>" placeholder="Nama Obat">
                                <div class="invalid-feedback errornama">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="2" id="deskripsi" name="deskripsi" placeholder="Deskripsi Obat....."><?= old('deskripsi', $data_obat['deskripsi']) ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">Upload Gambar</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" value="<?= old('img', $data_obat['img']) ?>" id="img" onchange="previewImage()">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                    <div class="invalid-feedback errorimg">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="preview" class="col-sm-2 col-form-label">Preview Image</label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('/assets/upload/obat/' . $data_obat['img']) ?>" alt="" class="img_preview img-thumbnail" style="width: 150px;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <select class="form-control select select2" name="satuan">
                                    <?php foreach ($data_satuan as $satuan) : ?>
                                        <option value="<?= $satuan['id'] ?>" <?= old('satuan', $data_obat['satuan']) == $satuan['id'] ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Produsen</label>
                            <div class="col-sm-10">
                                <select class="form-control select select2" name="produsen">
                                    <?php foreach ($data_produsen as $produsen) : ?>
                                        <option value="<?= $produsen['id_produsen'] ?>" <?= old('produsen', $data_obat['produsen']) == $produsen['id_produsen'] ? 'selected' : '' ?>><?= $produsen['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga Obat</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga', $data_obat['harga']) ?>" placeholder="Rp. ....">
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
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        //Initialize fileinput Elements
        bsCustomFileInput.init();

        $('.form-update').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                enctype: 'multipart/form-data',
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
                    if (!response.error) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        });
                        $('#modal-update').modal('hide');
                        getData();
                    } else {
                        response.error && response.error.nama ?
                            ($('#nama').addClass('is-invalid'), $('.errornama').html(response.error.nama)) :
                            ($('#nama').removeClass('is-invalid'), $('.errornama').html(''));

                        response.error && response.error.harga ?
                            ($('#harga').addClass('is-invalid'), $('.errorharga').html(response.error.harga)) :
                            ($('#harga').removeClass('is-invalid'), $('.errorharga').html(''));

                        response.error && response.error.img ?
                            ($('#img').addClass('is-invalid'), $('.errorimg').html(response.error.img)) :
                            ($('#img').removeClass('is-invalid'), $('.errorimg').html(''));
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

        });
    });
</script>