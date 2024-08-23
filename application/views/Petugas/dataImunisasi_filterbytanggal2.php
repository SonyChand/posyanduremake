<div class="content">
    <div class="row">
        <!--  -->
        <div class="card ml-5 mr-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-lg-12">
                        <form action="<?= base_url() ?>Petugas/getFilterImunisasi2" method="POST">
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
                                <div class="modal-footer mt-3">
                                    <button type="submit" class="btn btn-primary">Filter Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border:1px solid">


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
                                    aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dataImunisasi_filtertanggal2 as $value) : ?>
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
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js" defer></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js" defer></script>
            <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
            <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
            <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js" defer></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js" defer></script>

            <script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable({

                        dom: 'lBfrtip',
                        buttons: [{
                                text: 'Print PDF',
                                extend: 'pdfHtml5',
                                filename: 'Data Filter Imunisasi Anak',
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                text: 'Print Excel',
                                extend: 'excelHtml5',
                                filename: 'Data Filter Imunisasi Anak',
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            'colvis'
                        ],

                    });

                });
            </script>





        </div>