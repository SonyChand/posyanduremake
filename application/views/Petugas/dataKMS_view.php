<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-profile text-black" style="width: 700px">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data PA</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -30px; height: 370px;">
                    <div id="graph2"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-profile text-black" style="width: 300px">
                <div class="col-6">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Customer</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -55px; height: 370px;">
                    <div id="graph3"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-profile text-black" style="width: 710px">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Riwayat Kedatangan</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -30px; height: 370px;">
                    <div id="graph7"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data PA
            </button>
        </div>
        <div class="col-2">
            <a class="btn btn-primary" target="_blank" href="<?= base_url('petugas/cetak_pa') ?>">Cetak Seluruh Data</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:300px;">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data PA</h4>
                    <p class="card-category">Data Perkembangan Anak</p>
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
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Tanggal Periksa
                                </th>
                                <th>
                                    Umur
                                </th>
                                <th>
                                    Berat Badan
                                </th>
                                <th>
                                    Tinggi Badan
                                </th>
                                <th>
                                    Status Gizi
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataKMS as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['jk'] ?></td>
                                        <td><?= format_indo($value['tanggal_periksa']) ?></td>
                                        <td><?= $value['umur'] ?> Bulan</td>
                                        <td><?= $value['berat_badan'] ?> kg</td>
                                        <td><?= $value['tinggi_badan'] ?> cm</td>
                                        <td><?= $value['status_gizi'] ?></td>
                                        <td class>
                                            <!-- <?php if ($value['status_gizi'] != 'Berat badan normal') { ?>
                                                <a href="" class="badge badge-primary">cetak</a>
                                            <?php } ?> -->
                                            <a href="<?php echo site_url('Petugas/HapusDataKMS/' . $value['id_pa']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data PA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Tambah Data Perkembangan Anak</h4>
                                <p class="card-category">Isi data dengan benar.</p>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>Petugas/tambahDataKMS" method="post">
                                    <input type="hidden" name="kode_posyandu" value="<?= $getKode['kode_posyandu'] ?>">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">ID KMS</label>
                                        <select class="form-control" name="id_kms" required>
                                            <?php foreach ($dataAnak as $value) : ?>
                                                <option value="<?= $value['id_kms'] ?>"><?= $value['id_kms'] ?>--<?= $value['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="tanggal_periksa">Tanggal Periksa</label><br>
                                        <input type="date" class="form-control" name="tanggal_periksa" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="berat_badan">Berat Badan (kg)</label>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <input type="number" class="form-control" name="bb1" required> KG
                                            </div>
                                            <div class="col-lg-5">
                                                <input type="number" class="form-control" name="bb2" required> GRAM
                                            </div>
                                        </div>
                                        <!-- <input type="text" class="form-control" name="berat_badan" placeholder="contoh(5.2)" required> -->
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating" name="tinggi_badan">Tinggi Badan (cm)</label>
                                        <input type="number" class="form-control" name="tinggi_badan" required>
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