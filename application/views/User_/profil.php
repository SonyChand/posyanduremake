<br><br><br><br>
<section class="section-profil">
    <div class="container">
        <div class="card">
            <div style="">
                <h3 class="card-header" style="text-align:center;">BIODATA</h3>
                <div class="card-body mt-5">
                    <table class="table-responsive" width="100%" cellpadding="7px">
                        <tr>
                            <th width="250px">NIK</th>
                            <th width="750px">:&nbsp;<?= $getUser['nik']; ?></th>
                        </tr>
                        <tr>
                            <th width="250px">Nama Lengkap </th>
                            <th width="750px">:&nbsp;<?= $getUser['nama']; ?></th>
                        </tr>
                        <tr>
                            <th width="250px">Id kms</th>
                            <th width="750px">:&nbsp;<?= $getUser['id_kms']; ?></th>
                        </tr>
                        <tr>
                            <th width="250px">Kode Posyandu</th>
                            <th width="750px">:&nbsp;<?= $getUser['kode_posyandu']; ?></th>
                        </tr>
                        <tr>
                            <th width="250px">Tempat Tanggal Lahir</th>
                            <th width="750px">:&nbsp;<?= $getUser['tempat_lahir']; ?>, <?= date('d F Y', strtotime($getUser['tanggal_lahir'])); ?> </th>
                        </tr>
                        <tr>
                            <th width="250px">Umur</th>
                            <th width="750px">:&nbsp;
                                <?php 
                                $birthDate = new DateTime($getUser['tanggal_lahir']);
                                $today = new DateTime("today");
                                $y = $today->diff($birthDate)->y;
                                $m = $today->diff($birthDate)->m;
                                
                                echo $y." tahun ".$m." bulan ";
                            ?></th>
                        </tr>
                        <tr>
                            <th width="250px">Golongan Darah</th>
                            <th width="750px">:&nbsp;<?= $getUser['golongan_darah']; ?></th>
                        </tr>
                        <tr>
                            <th width="250px">Alamat</th>
                            <th width="750px">:&nbsp;<?= $getUser['alamat']; ?></th>
                        </tr>
                        <!-- <tr>
                            <th width="250px">Nomor HP</th>
                            <th width="750px">:&nbsp;<?= $getUser['no_telepon']; ?></th>
                        </tr> -->
                        <tr>
                            <th width="250px">Nama Wali</th>
                            <th width="750px">:&nbsp;<?= $getUser['nama_wali']; ?></th>
                        </tr>
                        
                    </table><br>
                    
                    <a href="<?= base_url() ?>user" class="btn btn-primary mb-3" style="float:right;">Back Home</a>
                </div>
            </div>
        </div>
    </div>
</section>