<section class="site-section">
  <div class="container">
    <a href="<?= base_url('user/riwayatPerkembangan') ?>" class="btn btn-primary"> Back</a>
    <div class="row mt-3">
      <?php foreach ($artikel as $row) : ?>
        <div class="col-lg-10 ftco-animate">
          <div class="blog-entry align-self-stretch">
            <h2 class="mb-3 text-capitalize font-weight-bold"><?= $row['judul']; ?></h2>
            <p>
              <img src="<?= base_url('assets/img/artikel/' . $row['foto']) ?>" alt="foto artikel" class="img-fluid" width="100%">
            </p>
            <div class="text mt-3">
              <div class="posted mb-3 d-flex">
                <div class="desc pl-3">
                  <span>Penulis : <?= $row['created_by']; ?></span>
                  <span><?= $row['created_date']; ?></span>
                </div>
              </div>
            </div>
            <p style="font-size: 16px" class="text-justify"><?= nl2br($row['isi_artikel']); ?>.</p>
          </div>
        </div><br>
        <hr><br>
      <?php endforeach ?>
    </div>
  </div>
</section>