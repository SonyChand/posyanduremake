<div class="content">
    <div class="mt-3">
        <div class="row">
            <div class="col-3">
                
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Filter Data PA
        </button>
            </div>
            <div class="col">
                <a href="<?= base_url('admin/cetakPa/'. $kode) ?>" target="_blank" class="btn btn-primary">Cetak Perkembangan Anak</a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                                    Tanggal Periksa
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
                                foreach ($filterKMS as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nik'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['tanggal_periksa'] ?></td>
                                        <td><?= $value['tinggi_badan'] ?> cm</td>
                                        <td><?= $value['berat_badan'] ?> kg</td>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Filter Data TKA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Filter Data Tingkat Kesehatan Anak</h4>
                                <p class="card-category">Isi data dengan benar.</p>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>Admin/getDataKMS" method="post">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">KODE POSYANDU</label>
                                        <select class="form-control" name="kode_posyandu" required>
                                            <?php foreach ($getKodePosyandu as $value) : ?>
                                                <option value="<?= $value['kode_posyandu'] ?>"><?= $value['kode_posyandu'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Filter Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>