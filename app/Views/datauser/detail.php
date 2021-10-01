<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-2">
    <div class="row">
        <div class="col">
            <h2>Detail User</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/asset/image/<?= $user['photo']; ?>" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama']; ?></h5>
                            <p class="card-text">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Kontak</td>
                                        <td>:</td>
                                        <td><?= $user['contact']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?= $user['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?= $user['tgLahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $user['alamat']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row my-2"></div>
                            <div class="col">
                                <a href="/datauser/edit/<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/datauser/<?= $user['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                </form>
                            </div>
                            <div class="row my-2"></div>
                            <a href="/datauser" class="link-primary">Kembali ke halaman User</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>