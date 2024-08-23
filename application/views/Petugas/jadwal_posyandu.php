<?php
if ($this->session->flashdata('petugas')) {
  $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
  redirect('auth');
}
?>
<div class="content">
  <div class="row">
    <div class="col-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah jadwal posyandu
      </button>
    </div>
    <div class="col-2">
      <a href="<?= base_url('petugas/cetak_jadwal') ?>" target="_blank" class="btn btn-primary">
        Cetak jadwal posyandu
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">jadwal posyandu</h4>
          <p class="card-category">jadwal posyandu</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <?php if ($this->session->flashdata('error_tambah')) :  ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Data gagal ditambahkan karena nik sudah dipakai.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <table class="table" id="table_id">
              <thead class=" text-primary">
                <tr>
                  <th> No </th>
                  <th> Hari </th>
                  <th> Jam Buka </th>
                  <th> Jam Tutup </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($jadwal_posyandu as $value) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= format_indo($value['hari']) ?></td>
                    <td><?= $value['jam_buka'] ?></td>
                    <td><?= $value['jam_tutup'] ?></td>
                    <td class>
                      <a class="badge badge-warning btn-lg" href="#" role="button" data-toggle="modal" data-target="#edit<?= $value['id_jadwal'] ?>">Edit</a>
                      <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapus_jadwal_posyandu/<?= $value['id_jadwal']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
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

<!-- Modal 1-->
<div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah jadwal_posyandu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah jadwal posyandu </h4>
                <p class="card-category">Isi data dengan benar.</p>
              </div>
              <form action="<?= base_url() ?>Petugas/tambah_jadwal_posyandu" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- <div class="form-group">
                        <label class="bmd-label-floating" name="hari">hari</label>
                        <select name="hari" id="hari" class="form-control" required>
                          <option value="" selected disabled>--pilih--</option>
                          <?php foreach ($hari as $row) : ?>
                            <option value="<?= $row ?>"><?= $row; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <input type="hidden" class="form-control" name="kode_posyandu" value="<?= $kode_posyandu ?>" required>
                      </div> -->
                      <div class="form-group">
                        <label class="bmd-label-floating" name="hari">Hari & Tanggal</label>
                        <input type="date" class="form-control" name="hari" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating" name="jam_buka">jam buka</label>
                        <input type="time" class="form-control" name="jam_buka" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating" name="jam_tutup">jam Tutup</label>
                        <input type="time" class="form-control" name="jam_tutup" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal 1-->
<?php foreach ($jadwal_posyandu as $value) : ?>
  <div class="modal fade " id="edit<?= $value['id_jadwal'] ?>" tabindex="-2" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTitle">Edit jadwal posyandu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit jadwal posyandu </h4>
                  <p class="card-category">Isi data dengan benar.</p>
                </div>
                <form action="<?= base_url() ?>Petugas/edit_jadwal_posyandu" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="form-group">
                          <select name="hari" id="hari" class="form-control" required>
                            <option value="" selected disabled>--pilih--</option>
                            <?php foreach ($hari as $row) : ?>
                              <?php if ($row == $value['hari']) { ?>
                                <option value="<?= $row ?>" selected><?= $row; ?></option>
                              <?php } else { ?>
                                <option value="<?= $row ?>"><?= $row; ?></option>
                              <?php } ?>
                            <?php endforeach; ?>
                          </select>
                          <input type="hidden" class="form-control" name="id_jadwal" value="<?= $value['id_jadwal'] ?>" required>
                        </div> -->
                        <div class="form-group">
                          <label class="bmd-label-floating" name="hari">Hari</label>
                          <input type="date" class="form-control" name="hari" required value="<?= $value['hari'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="jam_buka">jam buka</label>
                          <input type="text" class="form-control" name="jam_buka" value="<?= $value['jam_buka'] ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="jam_tutup">jam tutup</label>
                          <input type="text" class="form-control" name="jam_tutup" value="<?= $value['jam_tutup'] ?>" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Edit Data</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>