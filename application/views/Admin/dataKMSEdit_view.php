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
                        <?php foreach ($dataKMS as $value) : ?>
                            <form action="<?= base_url('Admin/UbahDataKMS');  ?>/<?= $value['id_kms']; ?>" method="post" enctype="multipart/for-data    ">
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nik">NIK</label>
                                    <input type="text" class="form-control" value="<?= $value['nik'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nik" value="<?= $value['nik'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nama">Nama</label>
                                    <input type="text" class="form-control" value="<?= $value['nama'] ?>" disabled>
                                    <input type="hidden" class="form-control" name="nama" value="<?= $value['nama'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tanggal_periksa">Tanggal Periksa</label>
                                    <input type="date" class="form-control" name="tanggal_periksa" value="<?= $value['tanggal_periksa'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="tinggi_badan">Tinggi Badan (cm)</label>
                                    <input type="text" class="form-control" name="tinggi_badan" value="<?= $value['tinggi_badan'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name=berat_badan">Berat Badan (kg)</label>
                                    <input type="text" class="form-control" name="berat_badan" value="<?= $value['berat_badan'] ?>" required>
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