<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>
            <?php foreach ($alamat as $addr) : ?>
                <ul>
                    <li><?= $addr['tipe']; ?></li>
                    <li><?= $addr['alamat']; ?></li>
                    <li><?= $addr['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>