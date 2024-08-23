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
                        <?php foreach ($dataAnak as $value) : ?>
                            <form action="<?= base_url('Petugas/UbahDataAnak');  ?>/<?= $value['nik']; ?>" method="post" enctype="multipart/for-data " onSubmit="return validasi(this);">
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nik">NIK</label>
                                    <input type="text" class="form-control" value="<?= $value['nik'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nik" value="<?= $value['nik'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nama">Nama</label>
                                    <input type="text" class="form-control" value="<?= $value['nama'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nama" value="<?= $value['nama'] ?>">
                                </div><div class="form-group">
                                    <label class="bmd-label-floating" name="email">Email</label>
                                    <input type="text" class="form-control" value="<?= $value['email'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nama" value="<?= $value['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <!-- <input type="password" class="form-control" name="password" id ="pass"value="<?= $value['password'] ?>" > -->
                                    <input type="password" class="form-control" name="password" value="<?= $value['password'] ?>" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                                    <span style="color: red; font-size: 12px;">*Min. 6 ch, Kombinasi Huruf Kapital Dan huruf kecil</span>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label>
                                    <input type="date" class="form-control" value="<?= $value['tanggal_lahir'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="tanggal_lahir" value="<?= $value['tanggal_lahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="golongan_darah">Golongan Darah</label>
                                    <input type="text" class="form-control" name="golongan_darah" value="<?= $value['golongan_darah'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="golongan_darah">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="jk" value="<?= $value['jk'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required><?= $value['alamat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak ke - </label>
                                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?= $value['anak_ke'] ?>" required>
                                </div>



                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nik_wali">Nama Wali</label>
                                    <select class="form-control select2" style="width: 100%;" name="nik_wali" required>
                                        <?php foreach ($dataIbu as $row) { ?>
                                            <option value="<?php echo $row['nik']; ?>" <?php if ($row['nik'] == $value['nik_wali']) {
                                                                                            echo 'selected';
                                                   } ?>><?php echo $row['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                    <label for="exampleFormControlFile1" class="bmd-label-floating" x="profile">Masukan Foto disini</label> <br> <br>
                    <input type="file" class="form-control" id="exampleFormControlFile1" name="profile" placeholder="input file">
                </div> -->
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
   <!--  <script type="text/javascript">
        function validasi(form){
            if(form.pass.value.length == 0) {
                alert("Masukkan password Anda");
                return false;
            }
            if(form.pass.value.length < 6){
                alert("password harus sedikitnya 6 karakter");
                return false;
            }
            for (var i = 0; i < form.pass.value.length; i ++){
                var ch = form.pass.value.charAt(i);
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