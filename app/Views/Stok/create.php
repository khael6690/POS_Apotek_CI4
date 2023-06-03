<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h4 class="modal-title">Add Opname</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('opname-save') ?>" method="POST" class="form-horizontal form-create">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_obat" value="<?= $data_obat['id_obat'] ?>">
                    <div class="form-group row">
                        <label for="nama_obat" class="col-sm-4 col-form-label">Nama Obat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_obat" value="<?= old('nama_obat', $data_obat['nama_obat']) ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah') ?>">
                            <div class="invalid-feedback errorjumlah">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="2"><?= old('keterangan') ?></textarea>
                            <div class="invalid-feedback errorketerangan">

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
                    if (!response.error) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        });
                        $('#modal-create').modal('hide');
                        getData();
                    } else {
                        response.error && response.error.jumlah ?
                            ($('#jumlah').addClass('is-invalid'), $('.errorjumlah').html(response.error.jumlah)) :
                            ($('#jumlah').removeClass('is-invalid'), $('.errorjumlah').html(''));

                        response.error && response.error.keterangan ?
                            ($('#keterangan').addClass('is-invalid'), $('.errorketerangan').html(response.error.keterangan)) :
                            ($('#keterangan').removeClass('is-invalid'), $('.errorketerangan').html(''));
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