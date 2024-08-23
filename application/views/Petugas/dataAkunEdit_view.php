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
                            <form action="<?= base_url('Petugas/UbahDataAkun');  ?>/<?= $value['id_akun']; ?>" method="post" enctype="multipart/for-data    ">
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
                                    <label class="bmd-label-floating" name="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $value['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="password">Password</label>
                                    <input type="password" class="form-control" value="******" disabled>
                                    <input type="hidden" class="form-control" name="password" value="<?= $value['password'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label><br>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?= $value['tanggal_lahir'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required><?= $value['alamat'] ?></textarea>
                                </div>
                                <input type="hidden" class="form-control" name="role" value="2">
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="no_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control" name="no_telepon" value="<?= $value['no_telepon'] ?>" required>
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