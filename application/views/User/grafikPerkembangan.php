<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-section text-center mb-3">
          <h2>GRAFIK <strong class="text-primary">PERKEMBANGAN ANAK</strong></h2>
        </div>
        <div class="card card-profile text-black">
          <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data PA</a>
            </div>
          </div>
          <div class="card-body" style="margin-top: 30px; height: 370px;">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-10">
                  <div>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<?php
$this->db->where('nik_anak', '3134576879809');
$query = $this->db->get('datakms');
$data = $query->result_array();

$labels = array();
$data_values = array();

foreach ($data as $row) {
  $labels[] = $row['bulan']; // extract month labels
  $data_values[] = $row['berat_badan']; // extract weight values
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');


  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($labels); ?>,
      datasets: [{
        label: 'Tinggi Badan',
        data: <?php echo json_encode(array_column($data, 'tinggi_badan')); ?>,
        borderWidth: 1,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
        ],
        borderColor: [
          'rgb(255, 99, 132)',
        ],
      }, {
        label: 'Berat Badan',
        data: <?php echo json_encode(array_column($data, 'berat_badan')); ?>,
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
      }
    }
  });
</script>