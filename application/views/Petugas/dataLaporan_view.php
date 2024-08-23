<?php
if ($this->session->flashdata('petugas')) {
    $this->session->set_flashdata('petugas', 'Success as a petugas.');
} else {
    redirect('auth');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="https://img.icons8.com/windows/96/000000/children-faces.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'">
    <!-- CSS Files -->
    <link href="<?= base_url() ?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url() ?>assets/demo/demo.css&quot; rel=&quot;stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">

</head>

<body class="">
    <div class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-profile text-black" style="width: 710px; margin-left: 130px">
                    <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data TKA</a>
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
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Data TKA</h4>
                        <p class="card-category">Data Tingkat Kesehatan Anak</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                        Tanggal Periksa
                                    </th>
                                    <th>
                                        Tinggi Badan
                                    </th>
                                    <th>
                                        Berat Badan
                                    </th>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($dataKMS as $value) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['nik'] ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?= format_indo($value['tanggal_periksa']) ?></td>
                                            <td><?= $value['tinggi_badan'] ?> cm</td>
                                            <td><?= $value['berat_badan'] ?> kg</td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Data Anak</h4>
                        <p class="card-category">Data Anak</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                        Tempat Lahir
                                    </th>
                                    <th>
                                        Tanggal Lahir
                                    </th>
                                    <th>
                                        Golongan Darah
                                    </th>
                                    <th>
                                        Anak ke -
                                    </th>
                                    <th>
                                        Nama Orang Tua
                                    </th>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($dataAnak as $value) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $value['nik'] ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?php
                                                $birthDate = new DateTime($value['tanggal_lahir']);
                                                $today = new DateTime("today");
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d;
                                                echo $y . " tahun " . $m . " bulan " . $d . " hari";
                                                ?></td>
                                            <td><?= $value['tempat_lahir'] ?></td>
                                            <td><?= $value['tanggal_lahir'] ?></td>
                                            <td><?= $value['golongan_darah'] ?></td>
                                            <td><?= $value['anak_ke'] ?></td>
                                            <td><?= $value['nama_wali'] ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Data Wali Anak</h4>
                        <p class="card-category">Data Orang Tua Bayi</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                        golongan darah
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                    <th>
                                        Nomor Telepon
                                    </th>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($dataIbu as $value) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $value['nik'] ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?= $value['golongan_darah'] ?></td>
                                            <td><?= $value['alamat'] ?></td>
                                            <td><?= $value['no_telepon'] ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Data Imunisasi</h4>
                        <p class="card-category">Data Sudah Melakukan Imunisasi</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($dataImunisasi as $value) : ?>
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
                                                echo $y . " tahun " . $m . " bulan " . $d . " hari";
                                                ?></td>
                                            <td><?= $value['tanggal_imunisasi'] ?></td>
                                            <td><?= $value['jenis_imunisasi'] ?></td>
                                            <td>
                                                <?php if ($value['status'] === '0') : ?>
                                                    <p class="badge badge-danger">Belum</p>
                                                <?php else : ?>
                                                    <p class="badge badge-success">Sudah</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="<?= base_url() ?>assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?= base_url() ?>assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?= base_url() ?>assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?= base_url() ?>assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?= base_url() ?>assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?= base_url() ?>assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= base_url() ?>assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?= base_url() ?>assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="<?= base_url() ?>assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url() ?>assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= base_url() ?>assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
    <script>
        Morris.Bar({
            element: 'graph',
            data: <?php echo $graph; ?>,
            xkey: 'bulan',
            ykeys: ['tinggi_badan', 'berat_badan'],
            labels: ['Tinggi Badan (cm)', 'Berat Badan (kg)']
        });
    </script>
    <script>
        Morris.Bar({
            element: 'graph2',
            data: <?php echo $avgKMS; ?>,
            xkey: 'bulan',
            ykeys: ['avg_tinggi', 'avg_berat'],
            labels: ['Tinggi Badan (cm)', 'Berat Badan (kg)']
        });
    </script>
    <script>
        Morris.Donut({
            element: 'graph3',
            data: [{
                    label: "Jumlah Ibu",
                    value: <?= $countIbu; ?>
                },
                {
                    label: "Jumlah Anak",
                    value: <?= $countAnak; ?>
                }
            ]
        });
    </script>
</body>

</html>