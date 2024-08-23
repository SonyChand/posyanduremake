<?php
if ($this->session->flashdata('petugas')) {
  $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
  redirect('auth');
}
?>
<div class="content">
  <div class="row">

    <!-- <div class="col-md-4">
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategori">
            Tambah Kategori
          </button>
        </div>
      </div>
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Kategori</h4>
          <p class="card-category">Kategori</p>
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
                  <th> Kategori </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($kategori as $value) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $value['kategori'] ?></td>
                    <td class>
                      <a class="badge badge-warning btn-lg" href="#" role="button" data-toggle="modal" data-target="#editkategori<?= $value['id_kategori'] ?>">Edit</a>
                      <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapus_kategori/<?= $value['id_kategori']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah Pengetahuan
          </button>
        </div>
      </div>
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Pengetahuan</h4>
          <p class="card-category">Pengetahuan</p>
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
                  <th> Judul </th>
                  <th> Isi </th>
                  <th> Kategori </th>
                  <th> Foto </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($pengetahuan as $value) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $value['judul'] ?></td>
                    <td><?= substr($value['isi_pengetahuan'], 0, 80) ?></td>
                    <td><span class="badge badge-info"><?= $value['kategori'] ?></span></td>
                    <td><img src="<?= base_url('assets/img/pengetahuan/' . $value['foto']) ?>" alt="" class="img" width="100px"></td>
                    <td class>
                      <a class="badge badge-warning btn-lg" href="#" role="button" data-toggle="modal" data-target="#edit<?= $value['id_pengetahuan'] ?>">Edit</a>
                      <a class="badge badge-danger btn-lg" href="<?= base_url() ?>petugas/hapus_pengetahuan/<?= $value['id_pengetahuan']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data">Delete</a>
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah pengetahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah pengetahuan </h4>
                <p class="card-category">Isi data dengan benar.</p>
              </div>
              <form action="<?= base_url() ?>Petugas/tambah_pengetahuan" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul">
                      <input type="hidden" class="form-control" id="kode_posyandu" name="kode_posyandu" value="<?= $kode_posyandu ?>">
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
                    </div>
                    <div class="form-group col-12">
                      <label for="id_kategori">Kategori</label>
                      <select name="id_kategori" id="id_kategori" class="form-control" required>
                        <option value="" selected disabled>--pilih--</option>
                        <?php foreach ($kategori as $row) : ?>
                          <option value="<?= $row['id_kategori'] ?>"><?= $row['kategori']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group col-12">
                      <label for="isi_pengetahuan">Isi pengetahuan</label>
                      <textarea class="form-control" id="isi_pengetahuan" rows="3" name="isi_pengetahuan"></textarea>
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
<?php foreach ($pengetahuan as $value) : ?>
  <div class="modal fade " id="edit<?= $value['id_pengetahuan'] ?>" tabindex="-2" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTitle">Edit pengetahuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit pengetahuan </h4>
                  <p class="card-category">Isi data dengan benar.</p>
                </div>
                <form action="<?= base_url() ?>Petugas/edit_pengetahuan" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="judul">Judul</label>
                          <input type="text" class="form-control" name="judul" value="<?= $value['judul'] ?>" required>
                          <input type="hidden" class="form-control" name="id_pengetahuan" value="<?= $value['id_pengetahuan'] ?>" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="isi_pengetahuan">Isi pengetahuan</label>
                          <textarea name="isi_pengetahuan" id="isi_pengetahuan" cols="30" rows="5" class="form-control"><?= $value['isi_pengetahuan'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12">
                        <label for="id_kategori">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                          <option value="" selected disabled>--pilih--</option>
                          <?php foreach ($kategori as $row) : ?>
                            <?php if ($row['id_kategori'] == $value['id_kategori']) { ?>
                              <option value="<?= $row['id_kategori'] ?>" selected><?= $row['kategori']; ?></option>
                            <?php } else { ?>
                              <option value="<?= $row['id_kategori'] ?>"><?= $row['kategori']; ?></option>
                            <?php } ?>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <label>Foto</label>
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="<?= base_url('assets/img/pengetahuan/') . $value['foto']; ?>" class="img-thumbnail">
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

<!-- Modal 1-->
<div class="modal fade " id="kategori" tabindex="-2" role="dialog" aria-labelledby="kategoriTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kategoriTitle">Tambah kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah kategori </h4>
                <p class="card-category">Isi data dengan benar.</p>
              </div>
              <form action="<?= base_url() ?>Petugas/tambah_kategori" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="kategori">kategori</label>
                      <input type="text" class="form-control" id="kategori" name="kategori">
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
<?php foreach ($kategori as $value) : ?>
  <div class="modal fade " id="editkategori<?= $value['id_kategori'] ?>" tabindex="-2" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTitle">Edit kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit kategori </h4>
                  <p class="card-category">Isi data dengan benar.</p>
                </div>
                <form action="<?= base_url() ?>Petugas/edit_kategori" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="kategori">kategori</label>
                          <input type="text" class="form-control" name="kategori" value="<?= $value['kategori'] ?>" required>
                          <input type="hidden" class="form-control" name="id_kategori" value="<?= $value['id_kategori'] ?>" required>
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