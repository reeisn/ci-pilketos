<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/style.css">

        
        <div class="container">
        <form action="" method="post">
        <div class="row">
            <center>
            <div class="col-8">
                <br>
            <h1>Daftar Kandidat Calon Ketua OSIS</h1>
            </div>
            </center>
        </div>
        </form>
        </div>

        <div class="container">
        <div class="row">
        <div class="col">
        <a href="/ketos/create" class="btn btn-warning mt-3">Tambah Data Kandidat</a>
        </div>
        </div>
        </div>
        <br>
        <div class="container">
        <div class="container">
        <form method="post" action="">
        <input type="text" placeholder="Search.." name="keyword">
        <button type="submit" name="submit"><i class="fa fa-search"></i></button>
        </form>
        </div>
        </br>
        </div>
            <?php if ( session ()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                <?= session ()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>
            <?php if ( session ()->getFlashdata('dihapuz')) : ?>
                <div class="alert alert-danger" role="alert">
                <?= session ()->getFlashdata('dihapuz'); ?>
                </div>
                <?php endif; ?>
            <div class="container">
      <table class="table" style="vertical-align: middle background-color: #583218;">
        <thead class="thead">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama Kandidat</th>
            <th scope="col">Aksi</th>
        </tr>
</thead>
<tbody>
<?php $d = 1 + (6 * ($currentPage - 1)); ?>
    <?php foreach($ketos as $k) : ?>
<tr>
      <th scope="row" style="vertical-align: middle;"><?= $d++; ?></th>
      <td style="vertical-align: middle;"><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul" style="max-width:  100px;"></td>
      <td style="vertical-align: middle;"><?= $k ['nama_kandidat']; ?></td>
      <td style="vertical-align: middle;">
      <a href="/ketos/<?= $k['slug']; ?>" class="btn btn-dark">Detail</a>
      </td>
 </tr>
 <?php endforeach; ?>
</tbody>
</table>         
<?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
<?= $this->endsection(); ?>
        