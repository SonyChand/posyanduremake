<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title-section text-center mb-3">
          <h2>RIWAYAT <strong class="text-primary">IMUNISASI</strong></h2>
        </div>
        <a target="_blank" href="<?= base_url('user/cetak/' . $posyandu['kode_posyandu']) ?>" class="btn btn-primary mb-5 float-right"> Cetak Seluruh Data</a>
        <div class="table-responsive">
          <table id="table_id1" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nik</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Tanggal Imunisasi</th>
                <th scope="col">Jenis Imunisasi</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($getImunisasiUser as $value) : ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td><?= $value['nik']; ?></td>
                  <td><?= $value['nama'] ?></td>
                  <td><?php
                      $birthDate = new DateTime($value['tanggal_lahir']);
                      $today = new DateTime("today");
                      $y = $today->diff($birthDate)->y;
                      $m = $today->diff($birthDate)->m;
                      $d = $today->diff($birthDate)->d;
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
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12">
        <div class="title-section text-center mb-3">
          <h2>RIWAYAT <strong class="text-primary">PERKEMBANGAN ANAK</strong></h2>
        </div>
        <div class="table-responsive">
          <table id="table_id2" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">KMS</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Posyandu</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Periksa</th>
                <th scope="col">Umur</th>
                <th scope="col">Berat Badan</th>
                <th scope="col">Tinggi Badan</th>
                <th scope="col">Status Gizi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($getKmsUser as $value) : ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td><?= $value['id_kms']; ?></td>
                  <td><?= $value['nik']; ?></td>
                  <td><?= $value['nama_posyandu'] ?></td>
                  <td><?= $value['nama'] ?></td>
                  <td><?= $value['jk'] ?></td>
                  <td><?= format_indo($value['tanggal_periksa']) ?></td>
                  <td><?= $value['umur'] ?> Bulan</td>
                  <td><?= $value['berat_badan'] ?> kg</td>
                  <td><?= $value['tinggi_badan'] ?> cm</td>
                  <td><?= $value['status_gizi'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="title-section text-center mb-3">
          <h2>GRAFIK <strong class="text-primary">PERKEMBANGAN ANAK</strong></h2>
        </div>
        <div class="card card-profile text-black">
          <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data PA</a>
            </div>
          </div>
          <div class="card-body" style="margin-top: 30px; height: 370px;">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-10">
                  <div id="graph2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>