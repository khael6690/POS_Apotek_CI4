<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?= base_url() ?>/obat-update/<?= $data_obat['id_obat'] ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>  ?>" id="nama" name="nama" value="<?= old('nama', $data_obat['nama_obat']) ?>" placeholder="Nama Obat">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('nama'); ?></span>
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
                                    <select class="form-control select" id="select1" name="satuan">
                                        <?php foreach ($data_satuan as $satuan) : ?>
                                            <option value="<?= $satuan['id'] ?>" <?= old('satuan', $data_obat['satuan']) == $satuan['id'] ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('satuan'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Stok Obat</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= $validation->hasError('stok') ? 'is-invalid' : '' ?>  ?>" id="stok" name="stok" value="<?= old('stok', $data_obat['stok']) ?>" placeholder="Stok Obat">
                                    <div class="invalid-feedback">
                                        <span><?= $validation->getError('stok'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Produsen</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="produsen" id="select2">
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
                                        <input type="number" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>  ?>" id="harga" name="harga" value="<?= old('harga', $data_obat['harga']) ?>" placeholder="Rp. ....">
                                        <div class="invalid-feedback">
                                            <span><?= $validation->getError('harga'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url() ?>/obat" class="btn btn-danger float-right">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!--/. container-fluid -->
    </section>
    <?= $this->endSection(); ?>