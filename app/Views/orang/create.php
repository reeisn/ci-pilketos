<?= $this->extend('layout/template'); ?>
<link rel="stylesheet" href="/css/style.css">
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
        <h2 class="my-3">Formulir Voting</h2>
        <form action="/orang/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
          <div class="container">

        <div class="form-group row">
          <label for="vote" class="col-sm-2 col-form-label" autofocus>Nama Kamu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" 
            id="nama" name="nama" autofocus value="<?= old('nama') ; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
        <label for="vote" class="col-sm-2 col-form-label" autofocus>Pilihan Kandidat</label>
        <div class="container">
    <div class="row">
        <div class="col">
        <div class="row">
  <div class="col-sm-10">
    <div class="card">
      <div class="card-body">
        <div class="container">
        <div class="card" style="width: 30%;">
        <img class="card-img-top" src="/img/mark.jpeg" alt="card image cap">
        <div class="card-body">
          <p class="card-text">Kandidat 1 : MARKLEE</p>
          <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" 
        name="inlineRadioOptions" id="inlineRadio1" value="option1" autofocus value="<?= old('vote') ; ?>">
        <label class="form-check-label" for="inlineRadio1">1</label>
      </div>
      </div>
      </div>
      </div>

      <div class="container">
      <div class="card" style="width: 30%;">
      <img src="/img/jeno.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Kandidat 2 : Lee Jeno</p>
        <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" 
      name="inlineRadioOptions" id="inlineRadio2" value="option2" autofocus value="<?= old('vote') ; ?>">
      <label class="form-check-label" for="inlineRadio2">2</label>
      </div>
      </div>
      </div>
      </div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
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