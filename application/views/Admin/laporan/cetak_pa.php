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

    .besar{
        text-transform: uppercase;
      }

  </style>
</head><body>

  <center>
    <table width="730">
      <tr>
        <td width="60"><img src="<?= $gambar; ?>" width="70" height="70"></td>
        <td width="400">
        <center>
          <font size="5" class="besar"><b>Data Perkembangan Anak</b></font><br>
          <font size="5" class="besar"><b><?= $kode; ?></b></font><br>
        </center>
        </td>
      </tr>
      <tr>
        <td colspan="2"><hr></td>
      </tr>
    <table width="730">
      <tr>
        <td class="text2">Posyandu Latulip, <?= format_indo(date('Y-m-d')); ?></td>
      </tr>
    </table>
    </table>

    <table width="900" style="text-align: left;margin-top: 5px;">
      <tr style="margin-bottom: 5">
        <td width="50px"><b>No</b></td>
        <td width="100px"><b>Id KMS</b></td>
        <td width="150px"><b>Nama Anak</b></td>
        <td width="180px"><b>Tanggal Periksa</b></td>
        <td width="100px"><b>Jenis Kelamin</b></td>
        <td width="100px"><b>Umur</b></td>
        <td width="100px"><b>Berat Badan</b></td>
        <td><b>Status Gizi</b></td>
      </tr>
      <?php $no=1; foreach ($dataKMS as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['id_kms']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['tanggal_periksa']; ?></td>
        <td><?= $row['jk']; ?></td>
        <td><?= $row['umur']; ?> bln</td>
        <td><?= $row['berat_badan']; ?> kg</td>
        <td><?= $row['status_gizi']; ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </center>
</body></html>