<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-profile text-black" style="width: 710px; margin-left: 130px">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Status Perkembangan Anak</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -30px; height: 370px;">
                    <div id="graph5"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-profile text-black" style="width: 300px">
                <div class="col-6">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Customer</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -55px; height: 370px;">
                    <div id="graph6"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="<?= base_url('admin/cetakPA/' . $kode) ?>" target="_blank" class="btn btn-primary">Cetak Perkembangan Anak</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">DATA PA</h4>
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
                                    ID KMS
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
                                    Tinggi Badan
                                </th>
                                <th>
                                    Berat Badan
                                </th>
                                <th>
                                    Status Gizi
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataKMS as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['id_kms'] ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['jk'] ?></td>
                                        <td><?= format_indo($value['tanggal_periksa']) ?></td>
                                        <td><?= $value['umur'] ?> Bulan</td>
                                        <td><?= $value['berat_badan'] ?> kg</td>
                                        <td><?= $value['tinggi_badan'] ?> cm</td>
                                        <td><?= $value['status_gizi'] ?></td>
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
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="<?= base_url('admin/cetakPetugas/' . $kode) ?>" target="_blank" class="btn btn-primary">Cetak Data Petugas</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Petugas</h4>
                    <p class="card-category">Data Petugas Posyandu</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table_id1">
                            <thead class=" text-primary">
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Jabatan
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Password
                                </th>
                                <th>
                                    Tempat Lahir
                                </th>
                                <th>
                                    Tanggal Lahir
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    No. Telepon
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataAkun as $value) : ?>
                                    <?php if ($value['role'] === '1') : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?= $value['jabatan'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['password'] ?></td>
                                            <td><?= $value['tempat_lahir'] ?></td>
                                            <td><?= $value['tanggal_lahir'] ?></td>
                                            <td><?= $value['alamat'] ?></td>
                                            <td><?= $value['no_telepon'] ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="<?= base_url('admin/cetakAnak/' . $kode) ?>" target="_blank" class="btn btn-primary">Cetak Data Anak</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Anak</h4>
                    <p class="card-category">Data Anak</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table_id2">
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
                                    Tempat Lahir
                                </th>
                                <th>
                                    Tanggal Lahir
                                </th>
                                <th>
                                    Golongan Darah
                                </th>
                                <th>
                                    Anak ke -
                                </th>
                                <th>
                                    Nama Orang Tua
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataAnak as $value) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?php
                                            $birthDate = new DateTime($value['tanggal_lahir']);
                                            $today = new DateTime("today");
                                            $y = $today->diff($birthDate)->y;
                                            $m = $today->diff($birthDate)->m;
                                            $d = $today->diff($birthDate)->d;
                                            echo $y . " tahun " . $m . " bulan " . $d . " hari";
                                            ?></td>
                                        <td><?= $value['tempat_lahir'] ?></td>
                                        <td><?= $value['tanggal_lahir'] ?></td>
                                        <td><?= $value['golongan_darah'] ?></td>
                                        <td><?= $value['anak_ke'] ?></td>
                                        <td><?= $value['nama_wali'] ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {


        $('#table_id').DataTable();


        $('#table_id1').DataTable();

        $('#table_id2').DataTable();


    });
</script>