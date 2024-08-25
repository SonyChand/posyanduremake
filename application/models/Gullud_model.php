<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gullud_model extends CI_Model
{

    public function predict($tinggi_badan, $berat_badan, $bulan)
    {
        // Load data dari tabel datakms
        $data = $this->db->get('datakms')->result_array();

        // Normalize data
        $mean_height = array_sum(array_column($data, 'tinggi_badan')) / count($data);
        $std_height = $this->stats_standard_deviation(array_column($data, 'tinggi_badan'));
        $mean_weight = array_sum(array_column($data, 'berat_badan')) / count($data);
        $std_weight = $this->stats_standard_deviation(array_column($data, 'berat_badan'));

        foreach ($data as &$row) {
            $row['tinggi_badan'] = ($row['tinggi_badan'] - $mean_height) / $std_height;
            $row['berat_badan'] = ($row['berat_badan'] - $mean_weight) / $std_weight;
        }

        // Calculate coefficients using least squares
        // $a = 0;
        $b = 0;
        $c = 0;

        foreach ($data as $row) {
            // $a += $row['berat_badan'];
            $b += $row['tinggi_badan'] * $row['berat_badan'];
            $c += $row['berat_badan'] * $row['berat_badan'];
        }

        // $a /= count($data);
        $b /= count($data);
        $c /= count($data);

        // Prediksi berat badan optimal
        // $berat_badan_optimal = $a + $b * ($tinggi_badan - $mean_height) / $std_height + $c * ($berat_badan - $mean_weight) / $std_weight;

        // Prediksi tinggi badan dan berat badan di masa depan
        $tinggi_badan_prediksi = $tinggi_badan + ($bulan * $b);
        $berat_badan_prediksi = $berat_badan + ($bulan * $c);

        return array(
            'tinggi_badan_prediksi' => $tinggi_badan_prediksi,
            'berat_badan_prediksi' => $berat_badan_prediksi,
        );
    }

    // Helper function for standard deviation
    function stats_standard_deviation($array)
    {
        $mean = array_sum($array) / count($array);
        $variance = 0;
        foreach ($array as $value) {
            $variance += pow($value - $mean, 2);
        }
        $variance /= count($array);
        return sqrt($variance);
    }
}
