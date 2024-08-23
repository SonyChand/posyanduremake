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
                            <form action="<?= base_url('Admin/UbahDataAnak');  ?>/<?= $value['nik']; ?>" method="post" enctype="multipart/for-data    ">
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nik">NIK</label>
                                    <input type="text" class="form-control" value="<?= $value['nik'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nik" value="<?= $value['nik'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nama">Nama</label>
                                    <input type="text" class="form-control" value="<?= $value['nama'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nama" value="<?= $value['nama'] ?>">
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
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required><?= $value['alamat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="no_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control" name="no_telepon" value="<?= $value['no_telepon'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak ke - </label>
                                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?= $value['anak_ke'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nik_wali">Nama Wali</label>
                                    <input type="text" class="form-control" name="nama_wali" value="<?= $value['nama_wali'] ?>" required>
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
</div>