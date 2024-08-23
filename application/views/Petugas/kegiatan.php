<?php
if ($this->session->flashdata('petugas')) {
  $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
  redirect('auth');
}
?>
<div class="content">
  <div class="row">
    <div class="col-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah Kegiatan
      </button>
    </div>
    <div class="col">
      <a href="<?= base_url('petugas/cetak_kegiatan') ?>" class="btn btn-primary float-left" target="_blank">
        Cetak Kegiatan
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Kegiatan</h4>
          <p class="card-category">Kegiatan</p>
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
                  <th> Kegiatan </th>
                  <th> Isi Kegiatan </th>
                  <th> Waktu </th>
                  <th> Foto </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($kegiatan as $value) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $value['kegiatan'] ?></td>
                    <td><?= substr($value['isi_kegiatan'], 0, 100) ?>...</td>
                    <td><?= $value['waktu'] ?></td>
                    <td><img src="<?= base_url('assets/img/kegiatan/' . $value['foto']) ?>" class="img" width="100px"></td>
                    <td class>
                      <a class="badge badge-warning btn-lg" href="#" role="button" data-toggle="modal" data-target="#edit<?= $value['id_kegiatan'] ?>">Edit</a>
                      <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapus_kegiatan/<?= $value['id_kegiatan']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
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
<!-- <div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah Kegiatan </h4>
                <p class="card-category">Isi data dengan benar.</p>
              </div>
              <?= form_open_multipart('Petugas/tambah_kegiatan'); ?>
              <div class="card-body">
                <input type="text" name="kegiatan">
                <input type="text" name="isi_kegiatan">
                <input type="file" name="foto">
                <input type="date" name="waktu">
                <input type="text" name="kode_posyandu" value="<?= $kode_posyandu ?>">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Petugas/tambah_kegiatan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kegiatan">Kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" name="kegiatan" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="isi_kegiatan">Isi Kegiatan</label>
                <input type="text" class="form-control" id="isi_kegiatan" name="isi_kegiatan" required="">
              </div>
            </div>
            <div class="col-md-6">
              <label for="foto">Foto</label>
              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" name="foto" multiple="" class="inputFileHidden">
                <div class="input-group">
                  <input type="text" class="form-control inputFileVisible" placeholder="Single File">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                      <i class="material-icons">attach_file</i>
                    </button>
                  </span>
                </div>
              </div>
              <!-- <input type="file" name="foto"> -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="waktu">waktu</label>
                <input type="date" id="waktu" name="waktu" class="form-control">
                <input type="hidden" id="kode_posyandu" name="kode_posyandu" value="<?= $kode_posyandu ?>" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambahproduk">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal 1-->
<?php foreach ($kegiatan as $value) : ?>
  <div class="modal fade " id="edit<?= $value['id_kegiatan'] ?>" tabindex="-2" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTitle">Edit Kegiatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Kegiatan </h4>
                  <p class="card-category">Isi data dengan benar.</p>
                </div>
                <form action="<?= base_url() ?>Petugas/edit_kegiatan" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="kegiatan">kegiatan</label>
                          <input type="text" class="form-control" name="kegiatan" value="<?= $value['kegiatan'] ?>" required>
                          <input type="hidden" class="form-control" name="id_kegiatan" value="<?= $value['id_kegiatan'] ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="waktu">waktu</label>
                          <input type="date" class="form-control" name="waktu" value="<?= $value['waktu'] ?>" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="isi_kegiatan">Isi Kegiatan</label>
                          <textarea name="isi_kegiatan" id="isi_kegiatan" cols="30" rows="5" class="form-control"><?= $value['isi_kegiatan'] ?></textarea>
                        </div>
                      </div>
                      <label>Foto</label>
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="<?= base_url('assets/img/kegiatan/') . $value['foto']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                          <div class="form-group form-file-upload form-file-multiple">
                            <input type="file" name="foto" multiple="" class="inputFileHidden">
                            <div class="input-group">
                              <input type="text" class="form-control inputFileVisible" placeholder="Single File">
                              <span class="input-group-btn">
                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                  <i class="material-icons">attach_file</i>
                                </button>
                              </span>
                            </div>
                          </div>
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

<script>
  $(document).ready(function() {


    $('#table_id').DataTable();

  });
</script>