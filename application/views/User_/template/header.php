<?php
if ($this->session->flashdata('user')) {
    $this->session->set_flashdata('user', 'Success as a user.');
} else {
    redirect('auth');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo.jpeg">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.jpeg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <!-- CSS Files -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Karla', sans-serif;
            background-image: url("<?php echo base_url() ?>assets/img/bodyback.jpg");


        }
    </style>

</head>

<body>
    <header>
        <div class="wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">PanKesPos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="<?= base_url('user') ?>">Home</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="<?= base_url('user/artikelView') ?>">Artikel</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="<?= base_url('user/imunisasiUser') ?>">Perkembangan Anak</a>
                        </li>
                        <li class="nav-item mr-3 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $user['nama']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url() ?>user/profil">Profile</a>
                                <a class="dropdown-item" href="<?= base_url() ?>auth/logout" onclick="return confirm('yakin ingin keluar ?')">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- <nav>
                <a href="<?= base_url() ?>user" class="btn btn-info"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a>
                <a href="<?= base_url() ?>user/profil" class="btn btn-info"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Profile</a>
                <a href="<?= base_url() ?>auth/logout" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>
            </nav> -->
        </div>
    </header>