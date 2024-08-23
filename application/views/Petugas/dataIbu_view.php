<?php
if ($this->session->flashdata('petugas')) {
    $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
    redirect('auth');
}
?>
<div class="content">
    <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data Wali
            </button>
        </div>
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cetak Data Wali
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" target="_blank" href="<?= base_url('petugas/cetak_wali') ?>">Cetak Wali</a>
                    <a class="dropdown-item" target="_blank" href="<?= base_url('petugas/cetak_waliAnak') ?>">Cetak Wali dan Anak</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Wali Anak</h4>
                    <p class="card-category">Data orang tua bayi</p>
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
                                    Nama
                                </th>
                                <th>
                                    Golongan Darah
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Nomor Telepon
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
                                foreach ($dataIbu as $value) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['golongan_darah'] ?></td>
                                        <td><?= $value['alamat'] ?></td>
                                        <td><?= $value['no_telepon'] ?></td>
                                        <td>
                                            <?php $nik = base64_encode($value['nik']) ?>
                                            <a class="badge badge-primary btn-lg" href="<?= base_url() ?>petugas/dataibu_detail/<?= $nik; ?>" role="button">View Profile</a>
                                        </td>
                                        <td class>
                                            <a class="badge badge-warning btn-lg" href="<?= base_url() ?>petugas/dataibu_edit/<?= $nik; ?>" role="button">Edit</a>
                                            <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapusdataibu/<?= $nik; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
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
<script>
    $(document).ready(function() {


        $('#table_id').DataTable();

    });
</script>
<!-- Modal 1-->
<div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Ibu</h5>
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
                            <div class="card-body">
                                <form action="<?= base_url() ?>Petugas/tambahDataIbu" method="post">

                                    <input type="hidden" value="<?= $kode_posyandu ?>" name="kode_posyandu">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="nik">NIK</label>
                                        <input type="text" class="form-control" name="nik" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label><br>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="golongan_darah">Golongan Darah</label>
                                        <input type="text" class="form-control" name="golongan_darah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="no_telepon">Nomor Telepon</label>
                                        <input type="number" class="form-control" name="no_telepon" required>
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