<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title-section text-center mb-3">
          <h2>RIWAYAT <strong class="text-primary">PERKEMBANGAN ANAK</strong></h2>
        </div>
        <a target="_blank" href="<?= base_url('user/cetak_perkembangan/' . $posyandu['kode_posyandu']) ?>" class="btn btn-primary mb-5 float-right"> Cetak Data</a>
        <div class="table-responsive">
          <table id="table_id2" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">KMS</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Periksa</th>
                <th scope="col">Umur</th>
                <th scope="col">Berat Badan</th>
                <th scope="col">Tinggi Badan</th>
                <th scope="col">Status Gizi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($imunisasi as $value) : ?>
                <?php $kms = $this->db->get_where('datakms', ['nik_anak' => $value['nik']])->result_array(); ?>
                <?php foreach ($kms as $row) : ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $row['id_kms']; ?></td>
                    <td><?= $value['nik']; ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['jk'] ?></td>
                    <td><?= format_indo($row['tanggal_periksa']) ?></td>
                    <td><?= $row['umur'] ?> Bulan</td>
                    <td><?= $row['berat_badan'] ?> kg</td>
                    <td><?= $row['tinggi_badan'] ?> cm</td>
                    <td><?= $row['status_gizi'] ?></td>
                    <td>
                      <?php $status_gizi = str_replace(" ", "_", $row['status_gizi']); ?>
                      <?php if ($row['status_gizi'] == 'Berat badan kurang') { ?>
                        <a href="<?= base_url('user/lanjutan/' . $status_gizi) ?>" class="badge badge-warning">Panduan Kesehatan Anak</a>
                      <?php } elseif ($row['status_gizi'] == 'Berat badan lebih') { ?>
                        <a href="<?= base_url('user/lanjutan/' . $status_gizi) ?>" class="badge badge-info">Panduan Kesehatan Anak</a>
                      <?php } elseif ($row['status_gizi'] == 'Berat badan sangat kurang') { ?>
                        <a href="<?= base_url('user/lanjutan/' . $status_gizi) ?>" class="badge badge-danger">Panduan Kesehatan Anak</a>
                      <?php } else { ?>
                        <a href="<?= base_url('user/lanjutan/' . $status_gizi) ?>" class="badge badge-success">Panduan Kesehatan Anak</a>
                      <?php } ?>

                    </td>
                  </tr>
                <?php endforeach; ?>
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