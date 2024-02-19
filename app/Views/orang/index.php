<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <!-- <form action="" method="post">
    <div class="row">
        <div class="col-8">
        <h1>Daftar Orang</h1>
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian" name="keyword">
        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
    </div>
        </div>
    </div>
    </form> -->

    <h1>Daftar Orang Sudah Voting</h1>
    <br>
    <div class="container">
        <div class="row">
        <div class="col">
        <a href="/orang/create" class="btn btn-warning mt-3">Vote Sekarang</a>
        </div>
        </div>
        </div>
        <br>
    <div class="container">
    <form method="post" action="">
    <input type="text" placeholder="Search.." name="keyword">
    <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <div class="container">
      <table class="table" style="vertical-align: middle;">
        <thead class="thead">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Vote</th>
            <th scope="col">Aksi</th>
        </tr>
</thead>
<tbody>
 <?php $d = 1 + (6 * ($currentPage - 1)); ?>
    <?php foreach($orang as $o) : ?>
<tr>
      <th scope="row" style="vertical-align: middle;"><?= $d++; ?></th>
      <td style="vertical-align: middle;"><?= $o['nama']; ?></td>
      <td style="vertical-align: middle;"><?= $o['vote']; ?></td>
      <td style="vertical-align: middle;">
      <a href="" class="btn btn-success">Detail</a>
      </td>
 </tr>
 <?php endforeach; ?>
</tbody>
</table>         
<?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>
