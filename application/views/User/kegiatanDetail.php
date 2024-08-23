<section class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 ftco-animate">
        <div class="blog-entry align-self-stretch">
          <p>
            <img src="<?= base_url('assets/img/kegiatan/' . $kegiatan['foto']) ?>" alt="foto kegiatan" class="img-fluid" width="100%">
          </p>
          <div class="text mt-3">
            <div class="posted mb-3 d-flex">
              <div class="desc pl-3">
                <span><?= $kegiatan['waktu']; ?></span>
              </div>
            </div>
          </div>
          <h2 class="mb-3 text-capitalize"><?= $kegiatan['kegiatan']; ?></h2>
          <p style="font-size: 16px" class="text-justify"><?= nl2br($kegiatan['isi_kegiatan']); ?>.</p>
        </div>
      </div>
      <!-- <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">

        <div class="sidebar-box ftco-animate">
          <h3>kegiatan lainnya</h3>
          <?php foreach ($kegiatan_kegiatan as $b) { ?>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../../../assets/img/kegiatan/<?= $b['foto'] ?>);"></a>
              <div class="text">
                <h3 class="heading text-capitalize"><a href="<?= base_url('petugas/kegiatanDetail/' . $b['id_kegiatan']) ?>"><?= $b['kegiatan']; ?></a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span><?= $b['waktu']; ?></a></div>
                </div>
              </div>
            </div>
          <?php } ?>
          <hr>
        </div>
      </div> -->
    </div>
  </div>
</section>