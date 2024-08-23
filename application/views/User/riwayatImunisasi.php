<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title-section text-center mb-3">
          <h2>RIWAYAT <strong class="text-primary">IMUNISASI</strong></h2>
        </div>
        <a target="_blank" href="<?= base_url('user/cetak_imunisasi/' . $posyandu['kode_posyandu']) ?>" class="btn btn-primary mb-5 float-right"> Cetak Data</a>
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
  </div>
</div>
</div>
</div>