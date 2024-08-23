<div class="site-section py-5">
  <div class="container">
    <div class="title-section text-center mb-3">
      <h2>Jadwal <strong class="text-primary">Operasional</strong></h2>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table id="table_id2" class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Hari</th>
              <th scope="col">Jam Buka</th>
              <th scope="col">Jam Tutup</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($jadwal as $value) : ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= format_indo($value['hari']); ?></td>
                <td><?= $value['jam_buka']; ?></td>
                <td><?= $value['jam_tutup'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <a href="<?= base_url('user/cetak_jadwal') ?>" target="_blank" class="btn btn-primary float-right mt-5">Cetak Jadwal</a>
    </div>
  </div>
</div>