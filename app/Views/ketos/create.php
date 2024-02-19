<?= $this->extend('layout/template'); ?>
<link rel="stylesheet" href="/css/style.css">
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
        <h2 class="my-3">Form Tambah Data Kandidat</h2>
        <form action="/ketos/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
          <div class="container">

        <div class="form-group row">
          <label for="nama_kandidat" class="col-sm-2 col-form-label" autofocus>Nama kandidat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_kandidat')) ? 'is-invalid' : '' ?>" 
            id="nama_kandidat" name="nama_kandidat" autofocus value="<?= old('nama_kandidat') ; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_kandidat'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : '' ?>" 
            id="kelas" name="kelas" autofocus value="<?= old('kelas') ; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('kelas'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="visi" class="col-sm-2 col-form-label">Visi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('visi')) ? 'is-invalid' : '' ?>" 
            id="visi" name="visi" autofocus value="<?= old('visi') ; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('visi'); ?>
            </div>
          </div>
      </div>
          <div class="form-group row">
          <label for="misi" class="col-sm-2 col-form-label">Misi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('misi')) ? 'is-invalid' : '' ?>"  
            id="misi" name="misi" autofocus value="<?= old('misi') ; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('misi'); ?>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="sampul" class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-2">
            <img src="/img/default.png" class="img-thumbnail img-preview">
            </div>
          <div class="col-sm-8 my-2">
          <div class="custom-file">
          <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ?>"
           id="sampul" name="sampul" onchange="previewImg()">
          <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
          </div>
          <label class="custom-file-label" for="sampul">Pilih Gambar</label>
        </div>
      </div>
          </div>
      </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tambah data</button>
          </div>
        </div>
      </div>
      </form>
      </div>
    </div>
</div>
<?= $this->endSection(); ?>