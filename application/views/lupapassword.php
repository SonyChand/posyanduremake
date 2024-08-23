<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://img.icons8.com/windows/96/000000/children-faces.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $title; ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'">
  <!-- CSS Files -->
  <link href="<?= base_url(); ?>assets/css/material-dashboard.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url() ?>assets/demo/demo.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/style.css" rel="stylesheet" />

</head>

<body>
  <div class="container">
    <img src="<?= base_url() ?>assets/img/uaspos.png" height="150" style="padding-top: 15px" class="rounded mx-auto d-block mb-10" />
    <h3 class="text-center"><strong>PanKesPos</strong></h3>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Lupa Password ?</h4>
            <?= $this->session->tempdata('err'); ?>
            <?= $this->session->tempdata('message'); ?>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <form action="<?= base_url('auth/forgotPassword'); ?>" method="POST">
              <div class="form-group">
                <label class="bmd-label-floating" name="email" style="color:black;">Email</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <button type="submit" class="btn btn-success btn-block pull-right">Reset Password</button>
            </form>
            <div class="container">
              <div class="row">
                <div style="text-align:center">
                  <a href="<?= base_url() ?>auth" class="btn btn-primary ml-2">Login Admin</a>
                  <a href="<?= base_url() ?>auth/loginKader" class="btn btn-primary ml-2">Login Kader</a>
                  <a href="<?= base_url() ?>auth/loginUser" class="btn btn-primary ml-2">Login Orang Tua</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>