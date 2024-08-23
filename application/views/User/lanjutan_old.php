<div class="site-section py-5">
  <div class="container">
    <a href="<?= base_url('user/riwayatPerkembangan') ?>" class="btn btn-primary"> Back</a>
    <div class="title-section  text-center mb-3">
      <h2>Pengetahuan <strong class="text-primary">Seputar Anak</strong></h2>
    </div>
    <div class="row">
      <?php foreach ($pengetahuan as $row) : ?>
        <div class="col-lg-4 mb-5">
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
    <hr>
    <div class="title-section  text-center mb-3">
      <h2>Artikel <strong class="text-primary">Artikel</strong></h2>
    </div>
    <div class="row">
      <?php foreach ($artikel as $row) : ?>
        <div class="col-lg-4 mb-5">
          <div class="card shadow" style="width: 18rem;">
            <img src="<?= base_url('assets/img/artikel/' . $row['foto']) ?>" class="card-img-top" alt="..." style="height: 12rem;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['judul']; ?></h5>
              <p class="card-text"><?= substr($row['isi_artikel'], 0, 100); ?>.</p>
              <a href="<?= base_url('user/artikelDetail/' . $row['id_artikel']) ?>" class="btn btn-primary">Selengkapnya..</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>