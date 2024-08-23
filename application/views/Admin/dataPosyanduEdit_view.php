<div class="content">
    <div class="container">
        <img src="https://img.icons8.com/windows/96/000000/children-faces.png" class="rounded mx-auto d-block mb-10" />
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-center">Edit Data</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        <div class="mt-5 mb-5">
                            <form class="form" id="formCariTempat" method="POST" autocomplete="off">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label style="color:red; font-size:20px;">Cari Alamat</label>
                                        <input type="text" class="form-control" id="tempat" placeholder="Cari Alamat" name="nama">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                        <?php $i = 1;
                        foreach ($dataposyandu as $value) : ?>
                            <form action="<?= base_url('Admin/UbahDataPosyandu');  ?>/<?= $value['id_posyandu']; ?>" method="post" enctype="multipart/for-data    ">
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="nama_posyandu">Nama</label>
                                    <input type="text" class="form-control" name="nama_posyandu" value="<?= $value['nama_posyandu'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="kode_posyandu">Kode Posyandu</label>
                                    <input type="text" class="form-control" name="kode_posyandu" value="<?= $value['kode_posyandu'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $value['alamat'] ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="jumlah_kader">Jumlah Kader</label>
                                    <input type="text" class="form-control" name="jumlah_kader" value="<?= $value['jumlah_kader'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="jumlah_wus">Jumlah WUS</label>
                                    <input type="text" class="form-control" name="jumlah_wus" value="<?= $value['jumlah_wus'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="<?= $value['keterangan'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="lng">Latitude</label>
                                    <input type="text" class="form-control" id="lng" name="lng" value="<?= $value['lng'] ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating" name="lat">Longitude</label>
                                    <input type="text" class="form-control" id="lat" name="lat" value="<?= $value['lat'] ?>" readonly required>
                                </div>


                    </div>
                <?php endforeach; ?>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
                <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDA3RmcrgATNdt8B1IcSo454nBQPeP3K0A" type="text/javascript"></script>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mt-2 mb-5">
                    <div id="map" style="height: 300px;"></div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#formCariTempat").submit(function(e) {
                e.preventDefault();
                //ambil value dari form
                var namatempat = $("#tempat").val();

                if (namatempat != "") {
                    //replace semua spasi menjadi tanda plus (+)
                    namatempat = namatempat.replace(/ /g, "+");
                    //api google maps
                    var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + namatempat + "&key=AIzaSyDA3RmcrgATNdt8B1IcSo454nBQPeP3K0A";


                    document.getElementById("alamat").innerHTML = "";
                    document.getElementById("lng").innerHTML = "";
                    document.getElementById("lat").innerHTML = "";

                    //ambil data dari json
                    $.getJSON(url, function(result) {

                        //menampilkan peta
                        var map;
                        var infowindow = new google.maps.InfoWindow({});
                        map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 15,
                            center: {
                                lat: result.results[0].geometry.location.lat,
                                lng: result.results[0].geometry.location.lng
                            },

                        });

                        //looping data json
                        $.each(result.results, function(i) {
                            //menampilkan data keterangan alamat, lat, long                  
                            document.getElementById("alamat").value = result.results[i].formatted_address
                            document.getElementById("lat").value = result.results[i].geometry.location.lat
                            document.getElementById("lng").value = result.results[i].geometry.location.lng

                            //set marker
                            var marker = new google.maps.Marker({
                                position: {
                                    lat: result.results[i].geometry.location.lat,
                                    lng: result.results[i].geometry.location.lng
                                },
                                title: result.results[i].formatted_address
                            });

                            //menampilkan popup keterangan di saat marker di click
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.setContent(result.results[i].formatted_address);
                                infowindow.open(map, marker);
                            });
                            // To add the marker to the map, call setMap();
                            marker.setMap(map);

                        });

                    });

                } else {
                    alert("Nama tempat tidak boleh kosong!");
                }

            });
        });
    </script>