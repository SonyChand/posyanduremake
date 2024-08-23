<div class="site-section py-5">
  <div class="container">
    <div class="title-section  text-center mb-3">
      <h2>Kegiatan <strong class="text-primary">Posyandu <?= $posyandu['nama_posyandu']; ?></strong></h2>
    </div>
    <div class="row">
      <?php foreach ($kegiatan as $row) : ?>
        <div class="col-lg-4 mb-5">
          <div class="card shadow" style="width: 18rem;">
            <img src="<?= base_url('assets/img/kegiatan/' . $row['foto']) ?>" class="card-img-top" alt="..." style="height: 12rem;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['kegiatan']; ?></h5>
              <p class="card-text"><?= substr($row['isi_kegiatan'], 0, 100); ?>.</p>
              <a href="<?= base_url('user/kegiatanDetail/' . $row['id_kegiatan']) ?>" class="btn btn-primary">Selengkapnya..</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>