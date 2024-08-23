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

    <table width="900" style="text-align: left;margin-top: 5px;">
      <tr style="margin-bottom: 5">
        <td width="50px"><b>No</b></td>
        <td width="200px"><b>Nik</b></td>
        <td width="200px"><b>Nama Anak</b></td>
        <td width="200px"><b>Tanggal Imunisasi</b></td>
        <td width="200px"><b>Jenis Imunisasi</b></td>
        <td><b>Status</b></td>
      </tr>
      <?php $no=1; foreach ($dataImunisasi_filtertanggal as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nik']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= format_indo($row['tanggal_imunisasi']); ?></td>
        <td><?= $row['jenis_imunisasi']; ?></td>
        <td>
          <?php if($row['status'] == 0){ ?>
            Belum
          <?php } else { ?>
            Sudah
          <?php } ?>
        </td>
      </tr>
      <?php endforeach ?>
    </table>
  </center>
</body></html>