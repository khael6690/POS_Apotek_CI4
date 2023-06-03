<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Update <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('customers-update/' . $data_customers['id']) ?>" method="POST" class="form-horizontal form-update">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $data_customers['nama']) ?>">
                            <div class="invalid-feedback errornama">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="2" id="alamat" name="alamat"><?= old('alamat', $data_customers['alamat']) ?></textarea>
                            <div class="invalid-feedback erroralamat">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-4 col-form-label">Nomor Telfon</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp', $data_customers['telp']) ?>" placeholder="+62">
                                <div class="invalid-feedback errortelp">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $data_customers['email']) ?>">
                            <div class="invalid-feedback erroremail">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-sm-4 col-form-label">Diskon</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" class="form-control" id="diskon" name="diskon" min="0" max="100" value="<?= old('diskon', $data_customers['diskon']) ?>">
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

        $('.form-update').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
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
                            $('#nama').addClass('is-invalid');
                            $('.errornama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errornama').html(' ');
                        }
                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.erroralamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.erroralamat').html(' ');
                        }
                        if (response.error.telp) {
                            $('#telp').addClass('is-invalid');
                            $('.errortelp').html(response.error.telp);
                        } else {
                            $('#telp').removeClass('is-invalid');
                            $('.errortelp').html(' ');
                        }
                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.erroremail').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.erroremail').html(' ');
                        }
                        if (response.error.diskon) {
                            $('#diskon').addClass('is-invalid');
                            $('.errordiskon').html(response.error.diskon);
                        } else {
                            $('#diskon').removeClass('is-invalid');
                            $('.errordiskon').html(' ');
                        }
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        })
                        $('#modal-update').modal('hide');
                        getData()
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