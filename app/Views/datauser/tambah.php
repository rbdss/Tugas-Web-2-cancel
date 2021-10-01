<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8 my-2">
            <H2>Tambah Pengguna</H2>
            <form action="/datauser/simpan" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row my-2">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderPria" value="Pria" checked>
                            <label class="form-check-label" for="pria">
                                Pria
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderWanita" value="Wanita">
                            <label class="form-check-label" for="wanita">
                                Wanita
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row my-2">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="tgLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('lahir')) ? 'is-invalid' : ''; ?>" id="date" name="lahir" value="<?= old('lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kontak')) ? 'is-invalid' : ''; ?>" id="kontak" name="kontak" value="<?= old('kontak'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kontak'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control <?= ($validation->hasError('photo')) ? 'is-invalid' : ''; ?>" type="file" id="photo" name="photo">
                            <div class="invalid-feedback">
                                <?= $validation->getError('photo'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>