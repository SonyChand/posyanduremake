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
        <td width="400">
        <center>
          <font size="5" class="besar"><b>Data Anak</b></font><br>
          <?php if($kode != '') { ?>
          <font size="5" class="besar"><b><?= $kode; ?></b></font> <?php } ?>
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
        <td width="250px"><b>Nik</b></td>
        <td><b>Nama</b></td>
        <td><b>Nama Posyandu</b></td>
        <td><b>Jenis Kelamin</b></td>
      </tr>
      <?php $no=1; foreach ($dataanak as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nik']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['kode_posyandu']; ?></td>
        <td><?= $row['jk']; ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </center>
</body></html>