<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Add <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('customers-create') ?>" method="POST" class="form-horizontal form-create">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>">
                            <div class="invalid-feedback errornama">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="2" id="alamat" name="alamat"><?= old('alamat') ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-4 col-form-label">Nomor Telfon</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp') ?>" placeholder="+62">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-sm-4 col-form-label">Diskon</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" class="form-control" id="diskon" name="diskon" min="0" max="100" value="<?= old('diskon') ?>">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">%</span>
                                </div>
                                <div class="invalid-feedback errordiskon">

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

        $('.form-create').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "json",
                beforeSend: function() {
                    form.find('.btn-save').attr('disabled', 'disabled');
                    form.find('.btn-save').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    form.find('.btn-save').removeAttr('disabled');
                    form.find('.btn-save').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        response.error && response.error.nama ?
                            (form.find('#nama').addClass('is-invalid'), form.find('.errornama').html(response.error.nama)) :
                            (form.find('#nama').removeClass('is-invalid'), form.find('.errornama').html(''));

                        response.error && response.error.diskon ?
                            (form.find('#diskon').addClass('is-invalid'), form.find('.errordiskon').html(response.error.diskon)) :
                            (form.find('#diskon').removeClass('is-invalid'), form.find('.errordiskon').html(''));
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        });
                        $('#modal-create').modal('hide');
                        getData();
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