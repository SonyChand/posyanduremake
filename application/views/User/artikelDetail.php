<section class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 ftco-animate">
        <div class="blog-entry align-self-stretch">
          <p>
            <img src="<?= base_url('assets/img/artikel/' . $artikel['foto']) ?>" alt="foto artikel" class="img-fluid" width="100%">
          </p>
          <div class="text mt-3">
            <div class="posted mb-3 d-flex">
              <div class="desc pl-3">
                <span>Penulis : <?= $artikel['created_by']; ?></span>
                <span><?= $artikel['created_date']; ?></span>
              </div>
            </div>
          </div>
          <h2 class="mb-3 text-capitalize"><?= $artikel['judul']; ?></h2>
          <p style="font-size: 16px" class="text-justify"><?= nl2br($artikel['isi_artikel']); ?>.</p>
        </div>
      </div>
      <!-- <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">

        <div class="sidebar-box ftco-animate">
          <h3>artikel lainnya</h3>
          <?php foreach ($artikel_artikel as $b) { ?>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(assets/img/artikel/<?= $b['foto'] ?>);"></a>
              <div class="text">
                <h3 class="heading text-capitalize"><a href="<?= base_url('user/artikelDetail/' . $b['id_artikel']) ?>"><?= $b['judul']; ?></a></h3>
                <div class="meta">
                  <div><span class="icon-calendar"></span><?= $b['created_date']; ?></div>
                  <div><span class="icon-person"></span>Pengirim : <?= $b['created_by']; ?></div><br>
                  <div><span class="icon-person"></span>Views : <?= $b['view']; ?></div>
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