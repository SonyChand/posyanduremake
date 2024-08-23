<script type="text/javascript" src="<?= base_url() ?>assets/chart/fusioncharts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/chart/themes/fusioncharts.theme.zune.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDA3RmcrgATNdt8B1IcSo454nBQPeP3K0A"></script>

<script type="text/javascript">
    (function() {
        window.onload = function() {
            var map;
            //Parameter Google maps
            var options = {
                zoom: 12, //level zoom
                //posisi tengah peta
                center: new google.maps.LatLng(-6.1616397, 106.7384473),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Buat peta di 
            var map = new google.maps.Map(document.getElementById('peta'), options);
            // Tambahkan Marker 
            var locations = [
                <?php $no = 0;
                foreach ($get_posyandu as $row) : $no++; ?>[
                        "<img src='<?= base_url() ?>assets/img/logomap.png' width='100' height='100'><br/><?= $row["nama_posyandu"] . "-" ?> <?php echo $row["alamat"]; ?>", <?= $row["lat"] ?>, <?= $row["lng"] ?>
                    ],
                <?php endforeach; ?>


            ];
            var infowindow = new google.maps.InfoWindow();
            // ini di bawah ganti peta jadi trafic lalu lintas bisa terlihat
            // var trafficLayer = new google.maps.TrafficLayer();
            // trafficLayer.setMap(map);

            var marker, i;
            /* kode untuk menampilkan banyak marker */
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: "<?= base_url() ?>assets/img/logomap.png"
                });
                /* menambahkan event clik untuk menampikan
                    infowindows dengan isi sesuai denga
                   marker yang di klik */

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }


        };
    })();
</script>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url() ?>assets/img/beb1.png" class="d-block w-100" alt="bayi lucu">
        </div>
    </div>
</div>
<!-- style="width:280px; height:280px; border-radius:100%;" css lingkaran -->

<section class="section1">
    <div class="container">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-5 mb-5">
                    <div class="card" style="width: 18rem; height:320px">
                        <img src="<?= base_url() ?>assets/img/book1.jpg" class="card-img-top" alt="Artikel">
                        <div class="card-body" style="text-align:center;">
                            <a href="<?= base_url() ?>user/artikelView" class="card-text" style="color:black;">
                                <h5 class="mt-3">Artikel-artikel</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-5 mb-5">
                    <div class="card" style="width: 18rem; height:320px">
                        <img src="<?= base_url() ?>assets/img/book2.jpg" class="card-img-top" alt="Pengetahuan Seputar Anak">
                        <div class="card-body" style="text-align:center;">
                            <a href="<?= base_url() ?>user/pengetahuan_seputar_anak" class="card-text mt-3" style="color:black;">
                                <h5 class="mt-3">Pengetahuan Seputar Anak</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-5 mb-5">
                    <div class="card" style="width: 18rem; height:320px">
                        <img src="<?= base_url() ?>assets/img/chart.jpg" class="card-img-top" alt="Riwayat Perkembangan Anak">
                        <div class="card-body" style="text-align:center;">
                            <a href="<?= base_url() ?>user/imunisasiUser" class="card-text mt-3" style="color:black;">
                                <h5 class="mt-3">Riwayat Perkembangan Anak</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section2">
    <div id="peta"></div>
</section>