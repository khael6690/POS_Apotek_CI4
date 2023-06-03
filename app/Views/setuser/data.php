<form action="<?= base_url('/setuser/' . user_id()) ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-user">
    <?= csrf_field() ?>
    <div class="card-body">
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username" value="<?= old('username', $datauser->username) ?>" placeholder="<?= lang('Auth.username') ?>">
                <div class="invalid-feedback errorusername">

                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" value="<?= old('email', $datauser->email)  ?>" placeholder="<?= lang('Auth.email') ?>">
                <div class="invalid-feedback erroremail">

                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fullname" id="fullname" value="<?= old('fullname', $datauser->fullname)  ?>" placeholder="Full Name">
                <div class="invalid-feedback errorfullname">

                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="user_image" class="col-sm-2 col-form-label">Upload Profil</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="user_image" value="<?= old('user_image', $datauser->user_image) ?>" id="img" onchange="previewImage()" accept="image/*">
                    <label class="custom-file-label" for="user_image">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="preview" class="col-sm-2 col-form-label">Preview Image</label>
            <div class="col-sm-10">
                <img src="<?= base_url('/assets/upload/user/' . $datauser->user_image) ?>" alt="<? $datauser->username ?>" class="img_preview img-thumbnail" style="width: 150px;">
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-save">Simpan</button>
    </div>
    <!-- /.card-footer -->
</form>
<script>
    $('.form-user').submit(function(e) {
        e.preventDefault();
        var form = $(this)
        var formData = new FormData(form[0])
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            enctype: form.attr('enctype'),
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
                    response.error && response.error.username ?
                        (form.find('#username').addClass('is-invalid'), form.find('.errorusername').html(response.error.username)) :
                        (form.find('#username').removeClass('is-invalid'), form.find('.errorusername').html(''));

                    response.error && response.error.email ?
                        (form.find('#email').addClass('is-invalid'), form.find('.erroremail').html(response.error.email)) :
                        (form.find('#email').removeClass('is-invalid'), form.find('.erroremail').html(''));

                    response.error && response.error.fullname ?
                        (form.find('#fullname').addClass('is-invalid'), form.find('.errorfullname').html(response.error.fullname)) :
                        (form.find('#fullname').removeClass('is-invalid'), form.find('.errorfullname').html(''));

                } else {
                    Toast.fire({
                        icon: 'success',
                        title: response.success
                    });
                    getData()
                }
            }
        });
    });
</script>