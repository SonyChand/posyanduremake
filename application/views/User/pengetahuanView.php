<div class="site-section py-5">
  <div class="container">
    <div class="title-section  text-center mb-3">
      <h2>Pengetahuan <strong class="text-primary">Seputar Anak</strong></h2>
    </div>
    <button type="button" class="btn btn-primary btn-md dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <?php foreach ($kategori as $row) : ?>
        <a class="dropdown-item" href="<?= base_url('user/pengetahuanId/' . $row['id_kategori']) ?>"><?= $row['kategori']; ?></a>
      <?php endforeach; ?>
    </div>
    <div class="row">
      <?php foreach ($pengetahuan as $row) : ?>
        <div class="col-lg-4 my-5">
          <div class="card shadow" style="width: 18rem;">
            <img src="<?= base_url('assets/img/pengetahuan/' . $row['foto']) ?>" class="card-img-top" alt="..." style="height: 12rem;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['judul']; ?></h5>
              <p class="card-text"><?= substr($row['isi_pengetahuan'], 0, 100); ?>.</p>
              <a href="<?= base_url('user/pengetahuanDetail/' . $row['id_pengetahuan']) ?>" class="btn btn-primary">Selengkapnya..</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>