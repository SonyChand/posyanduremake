 <?php
if ($this->session->flashdata('petugas')) {
    $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
    redirect('auth');
}

$laki = 'Laki-laki';
$perempuan = 'Perempuan';
?>
<div class="content">
    <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data Anak
            </button>
        </div>
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cetak Data Anak
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" target="_blank" href="<?= base_url('petugas/cetak_anak') ?>">Cetak Seluruh Data</a>
                    <a class="dropdown-item" target="_blank" href="<?= base_url('petugas/cetak_anak_lk') ?>">Cetak Anak Laki-laki</a>
                    <a class="dropdown-item" target="_blank" href="<?= base_url('petugas/cetak_anak_pr') ?>">Cetak Anak Perempuan</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary float-right">
                Laki-laki : <?= $data_lk ?>
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary float-right">
                Perempuan : <?= $data_pr ?>
            </button>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Anak</h4>
                    <p class="card-category">Data Anak</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <?php if ($this->session->flashdata('error_tambah')) :  ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Data gagal ditambahkan karena nik sudah dipakai.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <table class="table" id="table_id">
                            <thead class=" text-primary">
                                <th>
                                    No
                                </th>
                                <th>
                                    NIK
                                </th>
                                <th>
                                    ID Posyandu
                                </th>
                                <th>
                                    ID KMS
                                </th>
                                <th>
                                    Password
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Umur
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Anak ke -
                                </th>
                                <th>
                                    Nama Orang Tua
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
                                foreach ($dataAnak as $value) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['kode_posyandu'] ?></td>
                                        <td><?= $value['id_kms'] ?></td>
                                        <td><?= $value['password'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?php
                                            $birthDate = new DateTime($value['tanggal_lahir']);
                                            $today = new DateTime("today");
                                            $y = $today->diff($birthDate)->y;
                                            $m = $today->diff($birthDate)->m;
                                            $d = $today->diff($birthDate)->d;
                                            echo $y . " tahun " . $m . " bulan ";
                                            ?></td>
                                        <td><?= $value['jk'] ?></td>
                                        <td><?= $value['anak_ke'] ?></td>
                                        <td><?= $value['nama_wali'] ?></td>
                                        <td>

                                            <a class="badge badge-primary btn-lg" href="<?= base_url() ?>petugas/dataanak_detail/<?= $value['nik']; ?>" role="button">View Profile</a>
                                        </td>
                                        <td class>
                                            <a class="badge badge-warning btn-lg" href="<?= base_url() ?>petugas/dataanak_edit/<?= $value['nik']; ?>" role="button">Edit</a>
                                            <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapusdataanak/<?= $value['nik']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Anak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Tambah Refrensi </h4>
                                <p class="card-category">Isi data dengan benar.</p>
                            </div>
                            <form action="<?= base_url() ?>Petugas/TambahDataAnak" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="nik">NIK</label>
                                                <input type="text" class="form-control" name="nik" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Kode Posyandu</label>
                                                <input type="text" class="form-control" name="kode_posyandu" value="<?= $user['kode_posyandu'] ?>" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                               <!--  <input type="password" class="form-control" name="password" id ="password"> -->
                                                <input type="password" class="form-control" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                                                <span style="color: red; font-size: 12px;">*Min. 6 ch, Kombinasi Huruf Kapital Dan huruf kecil</span>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">ID KMS</label>
                                                <input type="text" class="form-control" name="id_kms" required>
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
                                                <label class="bmd-label-floating" name="email">Email</label>
                                                <input type="email" class="form-control" name="email" required>
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
                                                <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label><br>
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Jenis Kelamin</label><br>
                                                <select class="custom-select" name="jk">
                                                    <option selected>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="golongan_darah">Golongan Darah</label>
                                                <input type="text" class="form-control" name="golongan_darah" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="anak_ke">Anak ke - </label>
                                                <input type="number" class="form-control" name="anak_ke" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" value="1" name="status">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Nama Wali</label>
                                                <select class="form-control" name="nik_wali" required>
                                                    <?php foreach ($dataIbu as $value) : ?>
                                                        <option value="<?= $value['nik'] ?>"><?= $value['nik'] ?>-----<?= $value['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                                </div>
                            </form>
                        </div>
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
<!--  <script type="text/javascript">
        function validasi(form){
            if(form.password.value.length == 0) {
                alert("Masukkan password Anda");
                return false;
            }
            if(form.password.value.length < 6){
                alert("password harus sedikitnya 6 karakter");
                return false;
            }
            for (var i = 0; i < form.password.value.length; i ++){
                var ch = form.password.value.charAt(i);
                if((ch < "A" || ch > "Z") && (ch < "a" || ch > "z") && (ch < "0" || ch > "9")){
                    alert("password memuat karakter - karakter ilegal");
                    return false;
                }
            }
            alert("password OK!");
            return true;
        }
    </script> -->
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