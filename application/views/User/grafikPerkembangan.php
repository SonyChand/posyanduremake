<?php
$anak = $this->db->get_where('dataanak', ['nik_wali' => $this->session->userdata('nik')])->result();
$a = 1;
$ab = 1;
$abc = 1;
?>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-section text-center mb-3">
          <h2>GRAFIK <strong class="text-primary">PERKEMBANGAN ANAK</strong></h2>
        </div>
        <?php foreach ($anak as $row): ?>
          <div class="card card-profile text-black pt-5 pb-5 px-5">
            <div class="col-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data PA <?= $row->nama ?></a>
              </div>
            </div>
            <div class="card-body" style="margin-top: 30px; height: 370px;">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-10">
                    <div>
                      <canvas id="myChart<?= $a ?>"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
          $a++;
        endforeach; ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php foreach ($anak as $row): ?>
  <?php
  $this->db->where('nik_anak', $row->nik);
  $query[$ab] = $this->db->get('datakms');
  $data[$ab] = $query[$ab]->result_array();

  $labels[$ab] = array();
  $data_values[$ab] = array();

  foreach ($data[$ab] as $row) {
    $labels[$ab][] = $row['bulan']; // extract month labels
    $data_values[$ab][] = $row['berat_badan']; // extract weight values
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx<?= $ab ?> = document.getElementById('myChart<?= $abc ?>');

    new Chart(ctx<?= $ab ?>, {
      type: 'bar',
      data: {
        labels: <?= json_encode($labels[$ab]) ?>,
        datasets: [{
          label: 'Tinggi Badan',
          data: <?= json_encode(array_column($data[$ab], 'tinggi_badan')) ?>,
          borderWidth: 1,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          borderColor: [
            'rgb(255, 99, 132)',
          ],
        }, {
          label: 'Berat Badan',
          data: <?= json_encode(array_column($data[$ab], 'berat_badan')) ?>,
          borderWidth: 1,
          backgroundColor: [
            'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
            'rgb(54, 162, 235)',
          ],
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },

      }

    });
  </script>
<?php
  $ab++;
  $abc++;
endforeach; ?>