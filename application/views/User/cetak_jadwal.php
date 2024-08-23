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
    <table width="500">
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
    <table width="500">
      <tr>
        <td class="text2">Pananjung, <?= format_indo(date('Y-m-d')); ?></td>
      </tr>
    </table>
    </table>

    <table width="550" style="text-align: left;margin-top: 5px;">
      <tr style="margin-bottom: 5">
        <td width="50px"><b>No</b></td>
        <td width="150px"><b>Hari</b></td>
        <td width="150px"><b>Jam Buka</b></td>
        <td width="150px"><b>Jam Tutup</b></td>
      </tr>
      <?php $no=1; foreach ($jadwal_posyandu as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= format_indo($row['hari']); ?></td>
        <td><?= $row['jam_buka']; ?></td>
        <td><?= $row['jam_tutup']; ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </center>
</body></html>