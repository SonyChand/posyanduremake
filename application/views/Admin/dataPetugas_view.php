 <?php
if ($this->session->flashdata('admin')) {
    $this->session->set_flashdata('admin', 'Success as a admin.');
} else {
    redirect('auth');
}
?>
<div class="content">
    <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data Kader
            </button>
        </div>
        <div class="col">
            <a class="btn btn-primary" target="_blank" href="<?= base_url('admin/cetak_kader') ?>">Cetak Data Kader</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            
            <?= form_error('email', '<div class ="alert alert-danger" role="alert">','</div>'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Kader</h4>
                    <p class="card-category">Data Kader Posyandu</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table_id" data-export-title="Data Kader">
                            <thead class=" text-primary">
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Jabatan
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Password
                                </th>
                                <th>
                                    View Profile
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataAkun as $value) : ?>
                                    <?php if ($value['role'] === '1') : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?= $value['jabatan'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['password'] ?></td>
                                            <td>
                                                <?php $id = base64_encode($value['id_akun']) ?>
                                                <a class="badge badge-primary btn-lg" href="<?= base_url() ?>Admin/datapetugas_detail/<?= $id; ?>" role="button">View Profile</a>
                                            </td>
                                            <td class>
                                                <a class="badge badge-warning btn-lg" href="<?= base_url() ?>Admin/datapetugas_edit/<?= $id; ?>" role="button">Edit</a>
                                                <a class="badge badge-danger btn-lg" href="<?= base_url() ?>Admin/hapusdatapetugas/<?= $id; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {


        $('#table_id').DataTable();

    });
</script>

<!-- Modal 1-->
<div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Tambah Data </h4>
                                <p class="card-category">Isi data dengan benar.</p>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>Admin/tambahDataPetugas" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="nik">NIK KTP</label>
                                                <input type="text" class="form-control" name="nik" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="kode_posyandu">Kode Posyandu</label>
                                                <select class="form-control" style="width: 100%;" name="kode_posyandu" required>
                                                    <option value=""></option>
                                                    <?php foreach ($get_posyandu as $row) { ?>
                                                        <option value="<?php echo $row['kode_posyandu']; ?>"><?php echo $row['nama_posyandu']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="email">Email</label>
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="password">Password</label>
                                                <input type="password" class="form-control" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                                                <span style="color: red; font-size: 12px;">*Min. 6 ch, Kombinasi Huruf Kapital Dan huruf kecil</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label><br>
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="jabatan">Jabatan</label>
                                                <input type="text" class="form-control" name="jabatan" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" class="form-control" name="role" value="1">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="no_telepon">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="no_telepon" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                <input type="text" class="form-control" name="pendidikan_terakhir" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>