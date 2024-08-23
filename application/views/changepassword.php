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
    LOGIN
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
  <?= $this->session->flashdata('message'); ?>
  <div class="container">
    <img src="<?= base_url() ?>assets/img/logo.jpeg" height="150" style="padding-top: 15px" class="rounded mx-auto d-block mb-10" />
    <h3 class="text-center"><strong>PanKesPos</strong></h3>
  </div>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title text-center">Ganti Password Baru</h4>
            <h5><?= $this->session->userdata('reset_email') ?></h5>
            <?= $this->session->tempdata('err'); ?>
            <?= $this->session->tempdata('message'); ?>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <form action="<?= base_url('auth/changePassword'); ?>" method="POST">
              <div class="form-group">
                <label class="bmd-label-floating" name="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                <span style="color: red; font-size: 12px;">*Min. 6 ch, Kombinasi Huruf Kapital Dan huruf kecil</span>
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
<script>
  var myInput = document.getElementById("password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }

  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 6) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }
</script>