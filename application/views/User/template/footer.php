<footer class="site-footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

                <div class="block-7">
                    <h3 class="footer-heading mb-4">About <strong class="text-primary"><?= $posyandu['nama_posyandu']; ?></strong></h3>

                    <p><?= $posyandu['keterangan']; ?> Posyandu Latulip berada di wilayah Desa Pananjung Kecamatan Cangkuang Kabupaten Bandung. Posyandu latulip didirikan pada tahun 2021 setelah ditentukan nya kepungurusan RW.
                        Posyandu diadakan setiap satu bulan sekali. Posyandu latulip ini memiliki jumlah kader sebanyak 10 Orang. </p>
                </div>

            </div>
            <div class="col-lg-3 mx-auto mb-5 mb-lg-0">

            </div>

            <div class="col-md-6 col-lg-4">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Kontak</h3>

                    <div class="footer-heading mb-4"> 08211976060 (Ela Nurlaela)</div>

                    <ul class="list-unstyled">

                        <li class="address"><?= $posyandu['alamat']; ?> Parken Blok L RW 12 </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                </p>
            </div>

        </div>
    </div>
</footer>
</div>

<script src="<?= base_url() ?>assets/user/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/user/js/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/user/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/user/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/user/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/user/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/user/js/aos.js"></script>

<script src="<?= base_url() ?>assets/user/js/main.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js" defer></script>
<script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#table_id1').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#table_id2').DataTable();
    });
</script>
<script>
    Morris.Bar({
        element: 'graph2',
        data: <?php echo $avgKMS; ?>,
        xkey: 'bulan',
        ykeys: ['umur', 'berat_badan'],
        labels: ['Umur', 'Berat Badan (kg)']
    });
</script>
</body>

</html>