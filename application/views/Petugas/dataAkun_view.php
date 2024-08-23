<?php
if ($this->session->flashdata('petugas')) {
    $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
    redirect('auth');
}
?>
<div class="content">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data Akun
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                Cetak Data Akun
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Akun</h4>
                    <p class="card-category">Data Akun Orang Tua</p>
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
                        <table class="table">
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
                                    Email
                                </th>
                                <th>
                                    Password
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    No. Telepon
                                </th>
                                <th>
                                    aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataAkun as $value) : ?>
                                    <?php if ($value['role'] === '2') : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['nik'] ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td>******</td>
                                            <td><?= $value['alamat'] ?></td>
                                            <td><?= $value['no_telepon'] ?></td>
                                            <td class>
                                                <?php $id = base64_encode($value['id_akun']) ?>
                                                <a class="badge badge-warning btn-lg" href="<?= base_url() ?>Petugas/dataakun_edit/<?= $id; ?>" role="button">Edit</a>
                                                <a class="badge badge-danger btn-lg" href="<?= base_url() ?>Petugas/hapusdataakun/<?= $id; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">>Delete</a>
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
<!-- Modal 1-->
<div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Akun</h5>
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
                                <form action="<?= base_url() ?>Petugas/tambahDataAkun" method="post">
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
                                        <label class="bmd-label-floating" name="email">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="password">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="tanggal_lahir">Tanggal lahir</label><br>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="alamat" required></textarea>
                                    </div>
                                    <input type="hidden" class="form-control" name="role" value="2">
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