<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile  text-black">
                <div class="card-avatar">
                    <a href="javascript:;">
                        <img class="img" src="<?= base_url() ?>assets/img/new_logo.png" />
                    </a>
                </div>
                <div class="card-body">
                    <?php foreach ($dataIbu as $value) : ?>
                        <h6 class="card-category text-gray">NIK: <?= $value['nik'] ?></h6>
                        <h6 class="card-title"><?= $value['nama'] ?></h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group">
                                <h6 class="card-category text-left">Golongan Darah &nbsp &nbsp &nbsp &nbsp : &nbsp<?= $value['golongan_darah'] ?></h6>
                            </li>
                            <li class="list-group">
                                <h6 class="card-category text-left">Tempat Lahir &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp<?= $value['tempat_lahir'] ?></h6>
                            </li>
                            <li class="list-group">
                                <h6 class="card-category text-left">Tanggal Lahir &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp<?= format_indo($value['tanggal_lahir'])  ?></h6>
                            </li>
                            <li class="list-group">
                                <h6 class="card-category text-left">Alamat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp<?= $value['alamat'] ?></h6>
                            </li>
                            <li class="list-group">
                                <h6 class="card-category text-left">Nomor Hp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp : &nbsp<?= $value['no_telepon'] ?></h6>
                            </li>
                            <li class="list-group">
                                <h6 class="card-category text-left">Jumlah Anak &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp : &nbsp<?php if ($countAnak === '') {
                                                                                                                                            $countAnak = 0;
                                                                                                                                        } else {
                                                                                                                                            $countAnak;
                                                                                                                                        }
                                                                                                                                        echo $countAnak; ?></h6>
                            </li>
                        </ul>
                        <?php $nik = base64_encode($value['nik']) ?>
                        <a href="<?= base_url() ?>petugas/dataibu_edit/<?= $nik; ?>" class="btn btn-primary btn-round">Update Data</a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-profile  text-black">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Anak</a>
                    </div>
                </div>
                <div class="table-responsive">
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
                                Umur
                            </th>
                            <th>
                                Anak ke
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
                                            echo $y . " tahun " . $m . " bulan ";
                                            ?></td>
                                    <td><?= $value['anak_ke'] ?></td>
                                    <td>
                                        <!-- <?php $nik = base64_encode($value['nik']) ?> -->
                                        <a class="badge badge-primary btn-lg" href="<?= base_url() ?>petugas/dataanak_detail/<?= $value['nik'] ?>" role="button">View Profile</a>
                                    </td>
                                    <td class>
                                        <a class="badge badge-warning btn-lg" href="<?= base_url() ?>petugas/dataanak_edit/<?= $value['nik'] ?>" role="button">Edit</a>
                                        <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapusdataanak/<?= $value['nik'] ?>" role="button">Delete</a>
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