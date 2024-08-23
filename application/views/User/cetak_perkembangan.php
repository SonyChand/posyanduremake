<html><head>
  <title><?= $judul; ?></title>

  <style type="text/css">
    table {
      border-style: double;
      border-width: 3px;
      border-color: white;
    }

    table tr .text2 {
      text-align: right;
      font-size: 14px;
    }

    table tr .text {
      text-align: center;
      font-size: 14px;
    }

    table tr td {
      font-size: 14px;
    }

    .besar {
      text-transform: uppercase;
    }
  </style>
</head><body>

  <center>
        <table width="730">
      <tr>
        
        <td width="400">
        <center>
          <font size="5" class="besar"><b><?= $dataposyandu['nama_posyandu']; ?></b></font><br>
          <font size="2"><i><?= $dataposyandu['alamat']; ?></i></font>
        </center>
        </td>
      </tr>
      <tr>
        <td colspan="2"><hr></td>
      </tr>
    <table width="730">
      <tr>
        <td class="text2">Pananjung, <?= format_indo(date('Y-m-d')); ?></td>
      </tr>
    </table>
    </table>

    <h3>Riwayat Perkembangan Anak</h3><br>

    <table width="900" style="text-align: left;margin-top: 5px;">
      <tr style="margin-bottom: 5">
        <td width="20px"><b>No</b></td>
        <td width="70px"><b>KMS</b></td>
        <td width="120px"><b>NIK</b></td>
        <td width="100px"><b>Nama</b></td>
        <td width="110px"><b>Jenis Kelamin</b></td>
        <td width="110px"><b>Tanggal Periksa</b></td>
        <td width="100px"><b>Umur</b></td>
        <td width="100px"><b>Berat Badan</b></td>
        <td width="100px"><b>Tinggi Badan</b></td>
        <td><b>Status Gizi</b></td>
      </tr>
      <?php $no = 1;
      foreach ($getKmsUser as $row) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['id_kms']; ?></td>
          <td><?= $row['nik']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['jk']; ?></td>
          <td><?= $row['tanggal_periksa']; ?></td>
          <td><?= $row['umur']; ?> bln</td>
          <td><?= $row['berat_badan']; ?> kg</td>
          <td><?= $row['tinggi_badan']; ?> cm</td>
          <td><?= $row['status_gizi']; ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </center>
</body></html>