<?php
if ($this->session->flashdata('admin')) {
    $this->session->set_flashdata('admin', 'Success as a admin.');
} else {
    redirect('auth');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/imun.jpeg">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>






</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo"><a href="<?= base_url() ?>admin" class="simple-text logo-normal">
                    <img src="<?= base_url() ?>assets/img/uaspos.png" height="150" />
                    <h3><?= $user['nama']; ?></h3>
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'index') {
                                                echo "active";
                                            } ?>">
                        <a class="nav-link" href="<?= base_url() ?>admin/index">
                            <i class="material-icons">home</i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'datapetugas') {
                                                echo "active";
                                            } ?>">
                        <a class="nav-link" href="<?= base_url() ?>admin/datapetugas">
                            <i class="material-icons">person</i>
                            <p>Data Kader</p>
                        </a>
                    </li>
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'dataposyandu') {
                                                echo "active";
                                            } ?>">
                        <a class="nav-link" href="<?= base_url() ?>admin/dataposyandu">
                            <i class="material-icons">person</i>
                            <p>Data Posyandu</p>
                        </a>
                    </li>
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'dataanak') {
                                                echo "active";
                                            } ?>">
                        <a class="nav-link" href="<?= base_url() ?>admin/dataanak">
                            <i class="material-icons">person</i>
                            <p>Data Anak</p>
                        </a>
                    </li>
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'datakms') {
                                                echo "active";
                                            } ?>">
                        <a class="nav-link" href="<?= base_url() ?>admin/datakms">
                            <i class="material-icons">timeline</i>
                            <p>Data Perkembangan Anak</p>
                        </a>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter2">
                            <i class="material-icons">content_paste</i>
                            <p>Laporan Data Posyandu</p>
                        </a>
                    </li>
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
                                <a class="nav-link" href="<?= base_url() ?>admin">
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
                                    <a class="dropdown-item" href="<?= base_url() ?>auth/logout">Log out</a>
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
                                            <form action="<?= base_url() ?>Admin/DataLaporan" method="post">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">KODE POSYANDU</label>
                                                    <select class="form-control" name="kode_posyandu" required>
                                                        <?php foreach ($getKodePosyandu as $value) : ?>
                                                            <option value="<?= $value['kode_posyandu'] ?>"><?= $value['kode_posyandu'] ?>&nbsp;--&nbsp;<?= $value['nama_posyandu'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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