<div class="content">
    <div class="mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Filter Data Perkembangan Anak
        </button>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-profile text-black" style="width: 710px">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Perkembangan Anak</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -30px; height: 370px;">
                    <div id="graph2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-profile text-black" style="width: 300px">
                <div class="col-6">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Customer</a>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -55px; height: 370px;">
                    <div id="graph3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade " id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Filter Data Perkembangan Anak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Filter Data Perkembangan Anak</h4>
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