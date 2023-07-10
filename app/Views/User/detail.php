<!-- Profile Image -->
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/upload/user/thumbs/') ?>/<?= $data_users['user_image']; ?>" alt="<?= $data_users['username']; ?>">
        </div>

        <h3 class="profile-username text-center"><?= strtoupper($data_users['username']); ?></h3>

        <p class="text-muted text-center"><?= strtoupper($data_users['name']); ?></p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Nama Lengkap</b>
                <p class="float-right"><?= $data_users['fullname']; ?></p>
            </li>
            <li class="list-group-item">
                <b>Username</b>
                <p class="float-right"><?= $data_users['username']; ?></p>
            </li>
            <li class="list-group-item">
                <b>Email</b>
                <p class="float-right"><?= $data_users['email']; ?></p>
            </li>
        </ul>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->