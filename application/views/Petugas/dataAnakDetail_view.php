<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-profile  text-black">
                <div class="card-avatar">
                    <a href="javascript:;">
                        <img class="img" src="<?= base_url() ?>assets/img/new_logo.png" />
                    </a>
                </div>
                <div class="card-body">
                    <?php foreach ($dataAnak as $value) : ?>
                        <h4 class="card-category text-gray"><b>NIK: <?= $value['nik'] ?></b></h4>
                        <h4 class="card-title"><b><?= $value['nama'] ?></b></h4>

                        <table border="0px" style="text-align:left;" class="mt-3 mb-3">
                            <tr>
                                <th width="150px">ID KMS</th>
                                <th width="300px">: <?= $value['id_kms'] ?></th>
                            </tr><tr>
                                <th width="150px">Email</th>
                                <th width="300px">: <?= $value['email'] ?></th>
                            </tr>
                            <tr>
                                <th width="150px">Kode Posyandu</th>
                                <th width="300px">: <?= $value['kode_posyandu'] ?></th>
                            </tr>
                            <tr>
                                <th width="150px">TTL</th>
                                <th width="300px">: <?= $value['tempat_lahir'] ?>, <?= format_indo($value['tanggal_lahir'])  ?></th>
                            </tr>
                            <tr>
                                <th width="150px">Umur</th>
                                <th width="300px">: <?php
                                                    $birthDate = new DateTime($value['tanggal_lahir']);
                                                    $today = new DateTime("today");
                                                    $y = $today->diff($birthDate)->y;
                                                    $m = $today->diff($birthDate)->m;
                                                    $d = $today->diff($birthDate)->d;
                                                    echo $y . " tahun " . $m . " bulan ";
                                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <th width="150px">Jenis Kelamin</th>
                                <th width="300px">: <?= $value['jk'] ?></th>
                            </tr>
                            <tr>
                                <th width="150px">Alamat</th>
                                <th width="300px">: <?= $value['alamat'] ?></th>
                            </tr>
                            <tr>
                                <th width="150px">Nama Wali</th>
                                <th width="300px">: <?= $value['nama_wali'] ?></th>
                            </tr>


                        </table>

                        <a href="<?= base_url() ?>Petugas/dataanak_edit/<?= $value['nik'] ?>" class="btn btn-primary btn-round">Update Data</a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="card card-profile text-black" style="width: 710px">
                    <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data PA</a>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top: 10px;">
                        <div id="graph"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card-profile text-black" style="width: 710px">
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Imunisasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive" style="padding-left: 20px; width: 710px;">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama </th>
                                    <th>Umur</th>
                                    <th>Tanggal Imunisasi</th>
                                    <th>Jenis Imunisasi</th>
                                    <th>Status</th>
                                    <!-- <th>aksi</th> -->
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
                                                echo $y . " tahun " . $m . " bulan " . $d . " hari";
                                                ?></td>
                                            <td><?= $value['tanggal_imunisasi'] ?></td>
                                            <td><?= $value['jenis_imunisasi'] ?></td>
                                            <td>
                                                <?php if ($value['status'] === '0') : ?>
                                                    <p class="badge badge-danger">Belum</p>
                                                <?php else : ?>
                                                    <p class="badge badge-success">Sudah</p>
                                                <?php endif; ?>
                                            </td>
                                            <!-- <td class>
					<?php $id = base64_encode($value['id_imunisasi']) ?>
                                        <a class="badge badge-warning btn-lg" href="<?= base_url() ?>petugas/dataImunisasi_edit/<?= $id; ?>" role="button">Edit</a>
                                        <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapusdataimunisasi/<?= $id; ?>" role="button">Delete</a>
                                    </td> -->
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
</div>