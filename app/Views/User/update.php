<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Update <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/user-update/' . $data_user['userid']) ?>" method="POST" class="form-horizontal form-update">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="<?= old('username', $data_user['username']) ?>" placeholder="<?= lang('Auth.username') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" disabled class="form-control" name="email" value="<?= old('email', $data_user['email'])  ?>" placeholder="<?= lang('Auth.email') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="groub" class="col-sm-2 col-form-label">Role / Level</label>
                            <div class="col-sm-10">
                                <select class="form-control select" id="select1" name="group">
                                    <?php foreach ($data_group as $value) : ?>
                                        <option value="<?= $value->id ?>" <?= old('group', $data_user['id'])  == $value->id ? 'selected' : '' ?>><?= $value->name ?></option>
                                    <?php endforeach; ?>
                                </select>
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