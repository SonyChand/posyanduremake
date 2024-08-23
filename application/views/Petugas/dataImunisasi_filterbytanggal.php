<div class="content">
    <div class="row">
        <!--  -->
        <div class="card ml-5 mr-5">
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
    </div>
    <hr style="border:1px solid">
    <div class="row">
        <div class="col">
            <form target="_blank" action="<?= base_url('Petugas/cetak_filter') ?>" method="post">
                <input type="hidden" name="kode_posyandu" value="<?= $kode ?>">
                <input type="hidden" name="tanggal_awal" value="<?= $tanggal_awal ?>">
                <input type="hidden" name="tanggal_akhir" value="<?= $tanggal_akhir ?>">
                <input type="hidden" name="getKategori" value="<?= $getKategori ?>">
                <button type="submit" class="btn btn-primary">Cetak Data</button>
            </form>
        </div>
    </div>
    <div class="row">
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
                                foreach ($dataImunisasi_filtertanggal as $value) : ?>
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
                                            <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapusdataimunisasi/<?= $id; ?>" role="button">Delete</a>
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





</div>