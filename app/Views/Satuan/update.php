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
                <form action="<?= base_url('satuan-update/' . $data_satuan['id']) ?>" method="POST" class="form-horizontal form-update">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-2 col-form-label">Jenis Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="satuan" value="<?= old('satuan', $data_satuan['satuan']) ?>">
                            <div class="invalid-feedback errorsatuan">

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
                        if (response.error.satuan) {
                            $('#satuan').addClass('is-invalid');
                            $('.errorsatuan').html(response.error.satuan);
                        } else {
                            $('#satuan').removeClass('is-invalid');
                            $('.errorsatuan').html(' ');
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
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });

        });
    });
</script>