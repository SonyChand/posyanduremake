<?php
if ($this->session->flashdata('petugas')) {
    $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
    redirect('auth');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo.jpeg">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.jpeg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'">
    <!-- CSS Files -->
    <link href="<?= base_url() ?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url() ?>assets/demo/demo.css&quot; rel=&quot;stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black">
            <div class="logo"><a href="<?= base_url() ?>petugas" class="simple-text logo-normal mb-0 pb-0 mt-0 pt-0">
                    <img src="<?= base_url() ?>assets/img/uaspos.png" height="80" />
                    <h4><?= $user['kode_posyandu']; ?></h4>
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'index') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/index">
                            <i class="material-icons">home</i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'dataanak') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/dataanak">
                            <i class="material-icons">person</i>
                            <p>Data Anak</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'dataibu') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/dataibu">
                            <i class="material-icons">person</i>
                            <p>Data Ibu</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'datakms') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/datakms">
                            <i class="material-icons">timeline</i>
                            <p>Data Perkembangan Anak</p>
                        </a>
                    </li>
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'dataimunisasi') {
                                                echo "active";
                                            } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/dataimunisasi">
                            <i class="material-icons">colorize</i>
                            <p>Data Imunisasi</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'jadwal_posyandu') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/jadwal_posyandu">
                            <i class="material-icons">book</i>
                            <p>Jadwal Posyandu</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'kegiatan') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/kegiatan">
                            <i class="material-icons">edit</i>
                            <p>Kegiatan</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'artikel') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/artikel">
                            <i class="material-icons">edit</i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'pengetahuan') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/pengetahuan">
                            <i class="material-icons">edit</i>
                            <p>Pengetahuan Anak</p>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'laporan') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url() ?>petugas/laporan">
                            <i class="material-icons">content_paste</i>
                            <p>Laporan</p>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>petugas">
                                    <i class="material-icons">home</i>
                                    <p class="d-lg-none d-md-block">
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url() ?>auth/logout_kader">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Modal 1-->
            <div class="modal fade " id="exampleModalCenter2" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tampilkan Data Laporan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Tampilkan Data Laporan </h4>
                                            <p class="card-category">Isi range tanggal untuk data.</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?= base_url() ?>Petugas/DataLaporan" method="post">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" name="dari_tanggal">Dari Tanggal</label><br>
                                                    <input type="date" class="form-control" name="dari_tanggal" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" name="sampai_tanggal">Sampai Tanggal</label><br>
                                                    <input type="date" class="form-control" name="sampai_tanggal" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>