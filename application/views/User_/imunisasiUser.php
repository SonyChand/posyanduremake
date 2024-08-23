<br><br><br><br>
<div style="text-align:center;">
    <h3>RIWAYAT IMUNISASI</h3><br>
</div>

<section class="sec-imu">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="card ml-5">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Imunisasi</h4>
                    <p class="card-category">Data Imunisasi</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive mb-5">
                        <table class="table" id="table_id" width="100%">
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
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($getImunisasiUser as $value) : ?>
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

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js" defer></script>
            <script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable();
                });
            </script>
        </div>
    </div>
</section><br><br>

<div style="text-align:center;">
    <h3>RIWAYAT PERKEMBANGAN ANAK</h3><br>
</div>

<section class="sec-imu2">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="card ml-5">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Data Perkembangan Anak</h4>
                    <p class="card-category">Data PA</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table2" width="100%">
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
                                    Nama Posyandu
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
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($getKmsUser as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['id_kms'] ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['nama_posyandu'] ?></td>
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
            </div><br><br>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js" defer></script>
            <script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#table2').DataTable();
                });
            </script>
        </div>
    </div>
</section>

<div style="text-align:center;">
    <h3>GRAFIK PERKEMBANGAN ANAK</h3><br>
</div>

<section class="sec-imu3 mb-5">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="container">

            <div class="card card-profile text-black">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data PA</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: 30px; height: 370px;">
                    <div id="graph2"></div>
                </div>
            </div>


        </div>
    </div>
</section>