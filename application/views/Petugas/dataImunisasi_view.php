<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-profile text-black" style="width: 710px">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Riwayat Imunisasi</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -30px; height: 370px;">
                    <div id="graph4"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-profile text-black" style="width: 300px">
                <div class="col-6">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Melakukan Imunisasi</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -55px; height: 370px;">
                    <div id="graph5"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <hr style="border:1px solid"> -->

    <div class="card">
        <div class="col-lg-12">
            <form action="<?= base_url() ?>Petugas/getFilterImunisasi" method="POST">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="bmd-label-floating"><b><u>Dari Tanggal</u></b></label>
                            <input type="date" class="form-control" name="tanggal_awal">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="bmd-label-floating"><b><u>Sampai Tanggal</u></b></label>
                            <input type="date" class="form-control" name="tanggal_akhir">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="bmd-label-floating"><b><u>Pilih Kategori</u></b></label>
                            <select class="custom-select" name="getKategori">
                                <option selected>Kategori Imunisasi...</option>
                                <option value="BCG">BCG</option>
                                <option value="CAMPAK">CAMPAK</option>
                                <option value="POLIO I">POLIO I</option>
                                <option value="POLIO II">POLIO II</option>
                                <option value="POLIO III">POLIO III</option>
                                <option value="POLIO IV">POLIO IV</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary ml-3">Filter Data</button>

                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-3">
            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data Imunisasi
            </button>
        </div>
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cetak Data Imunisasi
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" target="_blank" href="<?= base_url('petugas/cetak_imun') ?>">Cetak Seluruh Data</a>
                    <a class="dropdown-item" target="_blank" href="#" data-toggle="modal" data-target="#pertanggal">Cetak Pertanggal</a>
                    <a class="dropdown-item" target="_blank" href="#" data-toggle="modal" data-target="#perbulan">Cetak Perbulan</a>
                    <a class="dropdown-item" target="_blank" href="#" data-toggle="modal" data-target="#perjenis">Cetak Perjenis Imunisasi</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Data Imunisasi</h4>
                <p class="card-category">Data Imunisasi</p>
            </div>

            <div class="card-body">
                <div class="table-responsive">
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
                                Umur
                            </th>
                            <th>
                                Tanggal Imunisasi
                            </th>
                            <th>
                                Jenis Imunisasi
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Aksi
                            </th>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($dataImunisasi as $value) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $value['nik'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?php
                                        $birthDate = new DateTime($value['tanggal_lahir']);
                                        $today = new DateTime("today");
                                        $y = $today->diff($birthDate)->y;
                                        $m = $today->diff($birthDate)->m;
                                        $d = $today->diff($birthDate)->d;
                                        // echo $y." tahun ".$m." bulan ".$d." hari";
                                        echo $y . " tahun " . $m . " bulan ";
                                        ?></td>
                                    <td><?= format_indo($value['tanggal_imunisasi']) ?></td>
                                    <td><?= $value['jenis_imunisasi'] ?></td>
                                    <td>
                                        <?php if ($value['status'] === '0') : ?>
                                            <p class="badge badge-danger">Belum</p>
                                        <?php else : ?>
                                            <p class="badge badge-success">Sudah</p>
                                        <?php endif; ?>
                                    </td>
                                    <td class>
                                        <?php $id = base64_encode($value['id_imunisasi']) ?>
                                        <a class="badge badge-warning btn-lg" href="<?= base_url() ?>petugas/dataImunisasi_edit/<?= $id; ?>" role="button">Edit</a>
                                        <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapusdataimunisasi/<?= $id; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Imunisasi</h5>
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
                                <form action="<?= base_url() ?>Petugas/TambahDataImunisasi" method="post">
                                    <input type="hidden" value="<?= $getUserLogin['kode_posyandu'] ?>" name="kode_posyandu">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="nik">NIK</label>
                                        <select class="form-control" name="nik" required>
                                            <?php foreach ($dataAnak as $value) : ?>
                                                <option value="<?= $value['nik'] ?>"><?= $value['nik'] ?> -- <?= $value['nama'] ?> -- <?= date('d F Y', strtotime($value['tanggal_lahir']))  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tanggal Imunisasi</label>
                                        <input type="date" class="form-control" name="tanggal_imunisasi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="jenis_imunisasi">Jenis Imunisasi</label>
                                        <!-- <input type="text" class="form-control" name="jenis_imunisasi" required> -->
                                        <select class="form-control" name="jenis_imunisasi" required>
                                            <option selected>Pilih jenis imunisasi......</option>
                                            <option value="BCG">BCG</option>
                                            <option value="CAMPAK">CAMPAK</option>
                                            <option value="POLIO I">POLIO I</option>
                                            <option value="POLIO II">POLIO II</option>
                                            <option value="POLIO III">POLIO III</option>
                                            <option value="POLIO IV">POLIO IV</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="status" required>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="0">Belum</option>
                                            <option value="1">Sudah</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="perbulan" tabindex="-2" role="dialog" aria-labelledby="perbulanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perbulanTitle">Cetak Data Imunisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Cetak Data </h4>
                            </div>
                            <form action="<?= base_url() ?>Petugas/cetak_imunBulan" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="bulan">Bulan</label>
                                                <!-- <input type="text" class="form-control" name="jenis_imunisasi" required> -->
                                                <select class="form-control" name="bulan" required>
                                                    <option selected>Pilih bulan......</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="bmd-label-floating" name="tahun">Tahun</label>
                                            <select class="form-control" name="tahun" required>
                                                <option selected>Pilih tahun......</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cetak Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="pertanggal" tabindex="-2" role="dialog" aria-labelledby="pertanggalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pertanggalTitle">Cetak Data Imunisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Cetak Data </h4>
                            </div>
                            <form action="<?= base_url() ?>Petugas/cetak_imunTanggal" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" name="tanggal_awal">Tanggal Awal</label>
                                                <input type="date" name="tanggal_awal" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="bmd-label-floating" name="tanggal_akhir">Tanggal Akhir</label>
                                            <input type="date" name="tanggal_akhir" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cetak Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="perjenis" tabindex="-2" role="dialog" aria-labelledby="perjenisTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perjenisTitle">Cetak Data Imunisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Cetak Data </h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>Petugas/cetak_imunJenis" method="post">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="jenis_imunisasi">Jenis Imunisasi</label>
                                        <!-- <input type="text" class="form-control" name="jenis_imunisasi" required> -->
                                        <select class="form-control" name="jenis_imunisasi" required>
                                            <option selected>Pilih jenis imunisasi......</option>
                                            <option value="BCG">BCG</option>
                                            <option value="CAMPAK">CAMPAK</option>
                                            <option value="POLIO I">POLIO I</option>
                                            <option value="POLIO II">POLIO II</option>
                                            <option value="POLIO III">POLIO III</option>
                                            <option value="POLIO IV">POLIO IV</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cetak Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>