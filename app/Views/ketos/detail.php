<?= $this->extend('layout/template'); ?>
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/detail.css">
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
        <center>
</br>
            <h1 style="color:#693c1f; font-size: 60px;">Visi Misi Kandidat</h1>
</br>
            <div class="card mb-3" style="max-width: 1080px;">
  <div class="row g-0">
    <div class="col-md-4">
    <center><img src="/img/<?= $ketos['sampul']; ?>" class="img-fluid rounded-start" alt="..."></center>
    </div>
    <div class="col-md-8">
      <div class="card-body" style="max-width: 1200px;">
        <h2 class="card-title" style="color:#693c1f; font-size:35px"> <?= $ketos['nama_kandidat']; ?></h5>
        <h4 class="card-text" style="color:#693c1f;"><b>Kelas : </b><?= $ketos['kelas']; ?></p>
        <h4 class="card-text"><small style="color:#dabcb2;"><b>Visi : </b><?= $ketos['visi']; ?></small></p>
        <h4 class="card-text"><small style="color:#dabcb2;"><b>Misi : </b><?= $ketos['misi']; ?></small></p>

        <a href="/ketos/edit/<?= $ketos['slug']; ?>" class="btn btn-primary">Edit</a>

        <form action="/ketos/<?= $ketos['id']; ?>" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah yakin ingin menghapus?');"> Delete </button>
        </form>

        <br><br>
        <a href="/ketos" class="btn btn-secondary">Kembali ke daftar Kandidat</a>


      </div></center>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?> 
