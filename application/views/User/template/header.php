<!DOCTYPE html>
<html lang="en">

<head>
  <title>halaman</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/aos.css">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">

  <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />

</head>

<body>

  <div class="site-wrap">

    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between  ">
          <div class="logo">
            <div class="site-logo">
              <a href="<?= base_url('user') ?>" class="js-logo-clone"><strong class="text-primary"><?= $posyandu['nama_posyandu']; ?></strong></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="<?php if ($this->uri->segment(2) == 'index') {
                              echo "active";
                            } ?>"><a href=" <?= base_url('user') ?>">Home</a></li>
                <li class="<?php if ($this->uri->segment(2) == 'imunisasiUser' || $this->uri->segment(2) == 'riwayatImunisasi' || $this->uri->segment(2) == 'riwayatPerkembangan' || $this->uri->segment(2) == 'grafikPerkembangan') {
                              echo "active";
                            } ?>"><a href="<?= base_url('user/imunisasiUser') ?>">Perkembangan Anak</a></li>
                <!-- <li class="<?php if ($this->uri->segment(2) == 'pengetahuan' || $this->uri->segment(2) == 'pengetahuanId') {
                                  echo "active";
                                } ?>"><a href="<?= base_url('user/pengetahuan') ?>">Pengetahuan </a></li>
                <li class="<?php if ($this->uri->segment(2) == 'artikelPosyandu' || $this->uri->segment(2) == 'artikelDetail') {
                              echo "active";
                            } ?>"><a href="<?= base_url('user/artikelPosyandu') ?>">Artikel</a></li> -->
                <li class="<?php if ($this->uri->segment(2) == 'jadwalPosyandu') {
                              echo "active";
                            } ?>"><a href="<?= base_url('user/jadwalPosyandu') ?>">Jadwal Posyandu</a></li>
                <li class="<?php if ($this->uri->segment(2) == 'kegiatanPosyandu' || $this->uri->segment(2) == 'kegiatanDetail') {
                              echo "active";
                            } ?>"><a href="<?= base_url('user/kegiatanPosyandu') ?>">Kegiatan </a></li>
                <!-- <li class="has-children">
                  <a href="#" class="active">About</a>
                  <ul class="dropdown">
                    <li><a href="<?= base_url('user/artikelPosyandu') ?>">Artikel</a></li>
                    <li><a href="<?= base_url('user/jadwalPosyandu') ?>">Jadwal Posyandu</a></li>
                    <li><a href="<?= base_url('user/kegiatanPosyandu') ?>">Kegiatan Posyandu</a></li>
                  </ul>
                </li> -->
                <li class="has-children">
                  <a href="#"><?= $user['nama']; ?></a>
                  <ul class="dropdown">
                    <li><a href="<?= base_url('user/profil') ?>">Profil</a></li>
                    <li><a href="<?= base_url() ?>auth/logout_anak" onclick="return confirm('yakin ingin keluar ?')">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>