<div class="content">
    <div class="container">
        <img src="https://img.icons8.com/windows/96/000000/children-faces.png" class="rounded mx-auto d-block mb-10" />
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-center">Edit Data</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        <?php $i = 1;
                        foreach ($dataAkun as $value) : ?>
                            <form action="<?= base_url('Admin/UbahDataPetugas');  ?>/<?= $value['id_akun']; ?>" method="post" enctype="multipart/for-data    ">

                                <input type="hidden" class="form-control" name="id_akun" value="<?= $value['id_akun'] ?>" required>

                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nik">NIK KTP</label>
                                    <input type="text" class="form-control" name="nik" value="<?= $value['nik'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $value['nama'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label><br>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?= $value['tanggal_lahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $value['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="password">Password</label>
                                    <input type="text" class="form-control" name="password" value="<?= $value['password'] ?>" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                                                <span style="color: red; font-size: 12px;">*Min. 6 ch, Kombinasi Huruf Kapital Dan huruf kecil</span>
                                </div>

                                <div class="form-group">
                                    <label class="bmd-label-floating" name="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" value="<?= $value['jabatan'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" name="pendidikan_terakhir" value="<?= $value['pendidikan_terakhir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required><?= $value['alamat'] ?></textarea>
                                </div>
                                <input type="hidden" class="form-control" name="role" value="1">
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="no_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control" name="no_telepon" value="<?= $value['no_telepon'] ?>" required>
                                </div>

                    </div>
                <?php endforeach; ?>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>

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