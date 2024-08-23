<div class="content">
    <div class="container">
    <img src="https://img.icons8.com/windows/96/000000/children-faces.png" class="rounded mx-auto d-block mb-10"/>
    </div>
    <div class="container" >
    <div class="row d-flex justify-content-center" >
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header card-header-primary">
                <h4 class="card-title text-center">Edit Data</h4>
                <p class="card-category"></p>
                </div>
                <div class="card-body">
                <?php foreach ($dataImunisasi as $value) : ?>
                <form action="<?= base_url('Petugas/UbahDataImunisasi');  ?>/<?= $value['id_imunisasi']; ?>" method="post" enctype="multipart/for-data    ">
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
                    <label class="bmd-label-floating" name="tanggal_imunisasi">Tanggal Imunisasi</label>
                    <input type="date" class="form-control" name="tanggal_imunisasi" value="<?= $value['tanggal_imunisasi'] ?>" required>
                    </div>
                    <div class="form-group">
                    <label class="bmd-label-floating" name="jenis_imunisasi">Jenis Imunisasi</label>
                    <input type="text" class="form-control" value="<?= $value['jenis_imunisasi'] ?>" disabled>
                    <input type="hidden" class="form-control" name="jenis_imunisasi" value="<?= $value['jenis_imunisasi'] ?>" required>
                    </div>
                    <div class="form-group">
                    <label class="bmd-label-floating" name="status" required>Status</label>
                    <select class="form-control" name="status">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                    </select>
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

