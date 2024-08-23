<?php
if ($this->session->flashdata('admin')) {
    $this->session->set_flashdata('admin', 'Success as a admin.');
} else {
    redirect('auth');
}
?>
<div class="content">
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah Data Posyandu
    </button> -->
   <div class="row">
        <div class="col-3">
            
        </div>

        <div class="col">
            <a class="btn btn-primary" target="_blank" href="<?= base_url('admin/cetak_posyandu') ?>">Cetak Data Posyandu</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Posyandu</h4>
                    <p class="card-category">Data Posyandu</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= $this->session->tempdata('message'); ?>
                        <table class="table" id="table_id">
                            <thead class=" text-primary">
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama Posyandu
                                </th>
                                <th>
                                    Kode Posyandu
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Jumlah Kader
                                </th>
                                <th>
                                    Jumlah WUS
                                </th>
                                <th>
                                    Keterangan
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataposyandu as $value) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $value['nama_posyandu'] ?></td>
                                        <td><?= $value['kode_posyandu'] ?></td>
                                        <td><?= $value['alamat'] ?></td>
                                        <td><?= $value['jumlah_kader'] ?></td>
                                        <td><?= $value['jumlah_wus'] ?></td>
                                        <td><?= $value['keterangan'] ?></td>
                                        <td>
                                            <a class="badge badge-warning btn-lg" href="<?= base_url() ?>Admin/dataposyandu_edit/<?= $value['id_posyandu']; ?>" role="button">Edit</a>
                                            <a class="badge badge-danger btn-lg" href="<?= base_url() ?>Admin/hapusdataposyandu/<?= $value['id_posyandu']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama_posyandu']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
                                            <!--  -->
                                        </td>
                                    </tr>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Petugas</h5>
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
                                <form class="form" id="formCariTempat" method="POST" autocomplete="off">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Cari Alamat</label>
                                            <input type="text" class="form-control" id="tempat" placeholder="Cari Alamat" name="nama">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                                <form action="<?= base_url() ?>Admin/tambahDataPosyandu" method="post">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="nama_posyandu">Nama Posyandu</label>
                                        <input type="text" class="form-control" name="nama_posyandu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="kode_posyandu">Kode Posyandu</label>
                                        <input type="text" class="form-control" name="kode_posyandu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="jumlah_balita_lk">Jumlah Balita Laki-laki</label>
                                        <input type="text" class="form-control" name="jumlah_balita_lk" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="jumlah_balita_pr">Jumlah Balita Perempuan</label><br>
                                        <input type="text" class="form-control" name="jumlah_balita_pr" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="jumlah_kader">Jumlah Kader</label>
                                        <input type="text" class="form-control" name="jumlah_kader" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="jumlah_wus">Jumlah WUS</label>
                                        <input type="text" class="form-control" name="jumlah_wus" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="lng">lng</label>
                                                <input type="text" class="form-control" id="lng" name="lng" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="lat">lat</label>
                                                <input type="text" class="form-control" id="lat" name="lat" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="map" style="height: 250px;"></div>
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