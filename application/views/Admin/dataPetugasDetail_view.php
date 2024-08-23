<div class="content">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card card-profile  text-black">
                <?php foreach ($dataAkun as $value) : ?>
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="<?= base_url('assets/img/profile/') . $value['image']; ?>" />
                        </a>
                    </div>
                    <div class="card-body">

                        <h6 class="card-title"><?= $value['nama'] ?></h6>
                        <h6 class="card-title"><?= $value['nik'] ?></h6>
                        <h6 class="card-title"><?= $value['tempat_lahir'] ?>, <?= format_indo($value['tanggal_lahir'])  ?></h6>
                        <h6 class="card-title">Email : <?= $value['email'] ?></h6>
                        <h6 class="card-title">Password : <?= $value['password'] ?></h6><br>
                        <hr>

                        <h6 class="card-title mb-3"><u><b>Kode Posyandu</b></u></h6>
                        <h6 class="card-title mb-3"><?= $value['kode_posyandu']; ?></h6>
                        <h6 class="card-title mb-3"><u><b>Alamat</b></u></h6>
                        <h6 class="card-title mb-3"><?= $value['alamat']; ?></h6>
                        <h6 class="card-title mb-3"><u><b>Nomor Telepon</b></u></h6>
                        <h6 class="card-title mb-3"><?= $value['no_telepon']; ?></h6>
                        <h6 class="card-title mb-3"><u><b>Jabatan</b></u></h6>
                        <h6 class="card-title mb-3"><?= $value['jabatan']; ?></h6>
                        <h6 class="card-title mb-3"><u><b>Pendidikan Terakhir</b></u></h6>
                        <h6 class="card-title mb-3"><?= $value['pendidikan_terakhir']; ?></h6>

                        <?php $id = base64_encode($value['id_akun']) ?>
                        <a href="<?= base_url() ?>Admin/datapetugas_edit/<?= $id; ?>" class="btn btn-primary btn-round mt-5">Update Data</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>