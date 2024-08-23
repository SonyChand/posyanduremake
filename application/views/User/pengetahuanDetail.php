<section class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 ftco-animate">
        <div class="blog-entry align-self-stretch">
          <p>
            <img src="<?= base_url('assets/img/pengetahuan/' . $pengetahuan['foto']) ?>" alt="foto pengetahuan" class="img-fluid" width="80%">
          </p>
          <div class="text mt-3">
            <div class="posted mb-3 d-flex">
              <div class="desc pl-3">
                <span>Penulis : <?= $pengetahuan['kode_posyandu']; ?></span>
                <span><?= $pengetahuan['created_date']; ?></span>
              </div>
            </div>
          </div>
          <h2 class="mb-3 text-capitalize"><?= $pengetahuan['judul']; ?></h2>
          <p style="font-size: 16px" class="text-justify"><?= nl2br($pengetahuan['isi_pengetahuan']); ?>.</p>
        </div>
      </div>
      <!-- <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">

        <div class="sidebar-box ftco-animate">
          <h3>pengetahuan lainnya</h3>
          <?php foreach ($pengetahuan_pengetahuan as $b) { ?>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../../../assets/admin/img/pengetahuan/<?= $b['foto'] ?>);"></a>
              <div class="text">
                <h3 class="heading text-capitalize"><a href="<?= base_url('user/pengetahuanDetail/' . $b['id_pengetahuan']) ?>"><?= $b['judul']; ?></a></h3>
                <div class="meta">
                  <div><span class="icon-calendar"></span><?= $b['created_date']; ?></div>
                  <div><span class="icon-person"></span>Pengirim : <?= $b['kode_posyandu']; ?></div><br>
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