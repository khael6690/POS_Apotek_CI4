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
                <form action="<?= base_url('/group-update/' . $data_group->id) ?>" method="POST" class="form-horizontal form-update">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Group</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" name="name" value="<?= old('name', $data_group->name)  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="groub" class="col-sm-4 col-form-label">Permissions</label>
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="cekall" name="permissions" onclick="cek_all(this)">
                                    <label for="cekall" class="custom-control-label">Pilih semua</label>
                                </div>
                                <?php foreach ($permissions as $value) : ?>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="<?= $value->name ?>" value="<?= $value->id ?>" name="permissions[]" <?= $value->name == isset($permissionsGroup[$value->id]) ? 'checked' : '' ?>>

                                        <label for="<?= $value->name ?>" class="custom-control-label"><?= $value->name ?></label>
                                        <div class="invalid-feedback errorgroup">

                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary btn-save">Simpan</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </div>
                    <!-- /.card-footer -->
                </form>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    // cek all role
    function cek_all(source) {
        checkboxes = document.getElementsByName('permissions[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    $('.form-update').submit(function(e) {
        e.preventDefault();

        var form = $(this)
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
                Toast.fire({
                    icon: 'success',
                    title: response.success
                })
                $('#modal-update').modal('hide');
                getData();
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
</script>