<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/style.css">
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Meet The Developer</h1>
            <?php foreach($alamat as $c) :?>
                <ul>
                    <li><?= $c['tipe']; ?></li>
                    <li><?= $c['alamat']; ?></li>
                    <li><?= $c['kab']; ?></li>
</ul>
<?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>