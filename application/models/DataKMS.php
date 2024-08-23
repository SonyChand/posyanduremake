<?php
class DataKMS extends CI_Model
{

    //get data from database
    function get_data($nik)
    {
        $this->db->select('bulan,tinggi_badan,berat_badan');
        $this->db->where('nik', $nik);
        $this->db->order_by('tanggal_periksa', 'ASC');
        $result = $this->db->get('dataKMS');
        return $result;
    }

    function get_dataUser($spesifikIdkms)
    {
        $this->db->select('bulan,umur,berat_badan');
        $this->db->where('id_kms', $spesifikIdkms);
        $this->db->order_by('tanggal_periksa', 'ASC');
        $result = $this->db->get('dataKMS');
        return $result;
    }

    function get_dataUserPetugas($idKms_user)
    {
        $this->db->select('bulan,umur,berat_badan');
        $this->db->where('id_kms', $idKms_user);
        $this->db->order_by('tanggal_periksa', 'ASC');
        $result = $this->db->get('dataKMS');
        return $result;
    }

    public function PrintKMS($spesifik_kode)
    {
        // $query = $this->db->query(
        //     "SELECT * 
        //     FROM dataKMS WHERE kode_posyandu = '$spesifik_kode'"
        // );

        // return $query->result_array();

        $this->db->select('dataKMS.*, dataAnak.*');
        $this->db->from('dataKMS');
        $this->db->join('dataAnak', 'dataKMS.id_kms=dataAnak.id_kms');
        $this->db->where('dataKMS.kode_posyandu', $spesifik_kode);
        $this->db->order_by('tanggal_periksa', 'ASC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function printKMSId($id_kms)
    {

        $this->db->select('*');
        $this->db->from('dataKMS');
        $this->db->where('id_kms', $id_kms);
        $query =  $this->db->get();

        return $query->result_array();
    }

    //   public function adminPintKMS()
    //     {
    //         $query = $this->db->query(
    //             "SELECT * 
    //             FROM dataKMS"
    //         );

    //         return $query->result_array();
    //     }


    public function printKMSRange($kode_posyandu)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataKMS WHERE kode_posyandu = '$kode_posyandu'"
        );

        return $query->result_array();
    }

    // public function PintAVGKMS()
    // {
    //     $query = $this->db->query(
    //         "SELECT bulan,CAST(AVG(tinggi_badan) AS INT) as avg_tinggi,CAST(AVG(berat_badan) AS INT) as avg_berat 
    //         FROM dataKMS 
    //         GROUP BY bulan 
    //         ORDER BY tanggal_periksa"
    //     );

    //     return $query->result();
    // }

    public function printAVGKMS()
    {
        $query = $this->db->query(
            "SELECT bulan,CAST(AVG(berat_badan) AS INT) as avg_berat, CAST(AVG(umur) AS INT) as avg_umur 
            FROM dataKMS 
            GROUP BY bulan 
            ORDER BY tanggal_periksa"
        );

        return $query->result();
    }

    public function adminFilterkms($getKode)
    {

        $this->db->select('dataKMS.*, dataAnak.*');
        $this->db->from('dataKMS');
        $this->db->join('dataAnak', 'dataKMS.id_kms=dataAnak.id_kms');
        $this->db->where('dataKMS.kode_posyandu', $getKode);
        $query =  $this->db->get();

        return $query->result_array();
    }

    // public function printAVGKMS()
    // {
    //     $this->db->select('*');
    //     $this->db->from('dataKMS');
    // }

    public function countbbsk($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE kode_posyandu = '$spesifik_kode' AND status_gizi='Berat badan sangat kurang'"
        );

        return $query->num_rows();
    }

    public function admincountbbsk()
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE status_gizi='Berat badan sangat kurang'"
        );

        return $query->num_rows();
    }

    public function countbbk($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE kode_posyandu = '$spesifik_kode' AND status_gizi='Berat badan kurang'"
        );

        return $query->num_rows();
    }

    public function admincountbbk()
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE status_gizi='Berat badan kurang'"
        );

        return $query->num_rows();
    }

    public function countbbn($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE kode_posyandu = '$spesifik_kode' AND status_gizi='Berat badan normal'"
        );

        return $query->num_rows();
    }

    public function admincountbbn()
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE status_gizi='Berat badan normal'"
        );

        return $query->num_rows();
    }

    public function countbbl($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE kode_posyandu = '$spesifik_kode' AND status_gizi='Berat badan lebih'"
        );

        return $query->num_rows();
    }

    public function admincountbbl()
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataKMS WHERE status_gizi='Berat badan lebih'"
        );

        return $query->num_rows();
    }


    public function countKMS($spesifik_kode = null)
    {
        if ($spesifik_kode != null) {

            $query = $this->db->query(
                "SELECT * 
            FROM dataKMS WHERE kode_posyandu = '$spesifik_kode'"
            );
        } else {
            $query = $this->db->query(
                "SELECT * 
            FROM dataKMS"
            );
        }

        return $query->num_rows();
    }

    public function allKMS()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataKMS"
        );

        return $query->num_rows();
    }

    public function countKMSId($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataKMS WHERE nik = $nik"
        );

        return $query->num_rows();
    }

    public function saveData($jk, $tanggal_lahir)
    {
        $id_kms = $this->input->post('id_kms');
        $kode_posyandu = $this->input->post('kode_posyandu');
        $jk    = $jk;
        $tanggal_periksa    = $this->input->post('tanggal_periksa');
        $bulan_periksa = date('F', strtotime($this->input->post('tanggal_periksa')));
        $tahun_periksa = date('Y', strtotime($this->input->post('tanggal_periksa')));
        $tinggi_badan    = $this->input->post('tinggi_badan');

        $bb1    = $this->input->post('bb1');
        $bb2    = $this->input->post('bb2');

        // $get1 = int($bb1);
        // $get2 = int($bb2);

        $berat    = $bb1 . '.' . $bb2;

        $berat_badan    = $berat;

        $tanggal_lahir    = $tanggal_lahir;

        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        if ($y >= 0 || $y == 0) {
            $convertTahun = $y * 12;
            $getSeluruhBulan = $m + $convertTahun;
            $umur = $getSeluruhBulan;
        }

        if ($umur == 0 && $jk == "L") {
            $median = 3.3;
            $valueSd = 3.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;
            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 0 && $jk == "P") {
            $median = 3.2;
            $valueSd = 3.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 1 && $jk == "L") {
            $median = 4.5;
            $valueSd = 5.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 1 && $jk == "P") {
            $median = 4.2;
            $valueSd = 4.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 2 && $jk == "L") {
            $median = 5.6;
            $valueSd = 6.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 2 && $jk == "P") {
            $median = 5.1;
            $valueSd = 5.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 3 && $jk == "L") {
            $median = 6.4;
            $valueSd = 7.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 3 && $jk == "P") {
            $median = 5.8;
            $valueSd = 6.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 4 && $jk == "L") {
            $median = 7.0;
            $valueSd = 7.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 4 && $jk == "P") {
            $median = 6.4;
            $valueSd = 7.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 5 && $jk == "L") {
            $median = 7.5;
            $valueSd = 8.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 5 && $jk == "P") {
            $median = 6.9;
            $valueSd = 7.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 6 && $jk == "L") {
            $median = 7.9;
            $valueSd = 8.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 6 && $jk == "P") {
            $median = 7.3;
            $valueSd = 8.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 7 && $jk == "L") {
            $median = 8.3;
            $valueSd = 9.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 7 && $jk == "P") {
            $median = 7.6;
            $valueSd = 8.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 8 && $jk == "L") {
            $median = 8.6;
            $valueSd = 9.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 8 && $jk == "P") {
            $median = 7.9;
            $valueSd = 9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 9 && $jk == "L") {
            $median = 8.9;
            $valueSd = 9.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 9 && $jk == "P") {
            $median = 8.2;
            $valueSd = 9.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 10 && $jk == "L") {
            $median = 9.2;
            $valueSd = 10.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 10 && $jk == "P") {
            $median = 8.5;
            $valueSd = 9.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 11 && $jk == "L") {
            $median = 9.4;
            $valueSd = 10.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 11 && $jk == "P") {
            $median = 8.7;
            $valueSd = 9.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 12 && $jk == "L") {
            $median = 9.6;
            $valueSd = 10.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 12 && $jk == "P") {
            $median = 8.9;
            $valueSd = 10.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 13 && $jk == "L") {
            $median = 9.9;
            $valueSd = 11;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 13 && $jk == "P") {
            $median = 9.2;
            $valueSd = 10.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 14 && $jk == "L") {
            $median = 10.1;
            $valueSd = 11.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 14 && $jk == "P") {
            $median = 9.4;
            $valueSd = 10.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 15 && $jk == "L") {
            $median = 10.3;
            $valueSd = 11.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 15 && $jk == "P") {
            $median = 9.6;
            $valueSd = 10.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 16 && $jk == "L") {
            $median = 10.5;
            $valueSd = 11.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 16 && $jk == "P") {
            $median = 9.8;
            $valueSd = 11.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 17 && $jk == "L") {
            $median = 10.7;
            $valueSd = 12;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 17 && $jk == "P") {
            $median = 10;
            $valueSd = 11.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 18 && $jk == "L") {
            $median = 10.9;
            $valueSd = 12.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 18 && $jk == "P") {
            $median = 10.2;
            $valueSd = 11.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 19 && $jk == "L") {
            $median = 11.1;
            $valueSd = 12.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 19 && $jk == "P") {
            $median = 10.4;
            $valueSd = 11.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 20 && $jk == "L") {
            $median = 11.3;
            $valueSd = 12.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 20 && $jk == "P") {
            $median = 10.6;
            $valueSd = 12.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 21 && $jk == "L") {
            $median = 11.5;
            $valueSd = 12.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 21 && $jk == "P") {
            $median = 10.9;
            $valueSd = 12.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 22 && $jk == "L") {
            $median = 11.8;
            $valueSd = 13.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 22 && $jk == "P") {
            $median = 11.1;
            $valueSd = 12.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 23 && $jk == "L") {
            $median = 12;
            $valueSd = 13.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 23 && $jk == "P") {
            $median = 11.3;
            $valueSd = 12.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 24 && $jk == "L") {
            $median = 12.2;
            $valueSd = 13.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 24 && $jk == "P") {
            $median = 11.5;
            $valueSd = 13;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 25 && $jk == "L") {
            $median = 12.4;
            $valueSd = 13.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 25 && $jk == "P") {
            $median = 11.7;
            $valueSd = 13.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 26 && $jk == "L") {
            $median = 12.5;
            $valueSd = 14.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 26 && $jk == "P") {
            $median = 11.9;
            $valueSd = 13.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 27 && $jk == "L") {
            $median = 12.7;
            $valueSd = 14.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 27 && $jk == "P") {
            $median = 12.1;
            $valueSd = 13.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 28 && $jk == "L") {
            $median = 12.9;
            $valueSd = 14.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 28 && $jk == "P") {
            $median = 12.3;
            $valueSd = 14;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 29 && $jk == "L") {
            $median = 13.1;
            $valueSd = 14.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 29 && $jk == "P") {
            $median = 12.5;
            $valueSd = 14.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 30 && $jk == "L") {
            $median = 13.3;
            $valueSd = 15;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 30 && $jk == "P") {
            $median = 12.7;
            $valueSd = 14.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 31 && $jk == "L") {
            $median = 13.5;
            $valueSd = 15.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 31 && $jk == "P") {
            $median = 12.9;
            $valueSd = 14.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 32 && $jk == "L") {
            $median = 13.7;
            $valueSd = 15.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 32 && $jk == "P") {
            $median = 13.1;
            $valueSd = 14.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 33 && $jk == "L") {
            $median = 13.8;
            $valueSd = 15.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 33 && $jk == "P") {
            $median = 13.3;
            $valueSd = 15.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 34 && $jk == "L") {
            $median = 14;
            $valueSd = 15.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 34 && $jk == "P") {
            $median = 13.5;
            $valueSd = 15.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 35 && $jk == "L") {
            $median = 14.2;
            $valueSd = 16;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 35 && $jk == "P") {
            $median = 13.7;
            $valueSd = 15.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 36 && $jk == "L") {
            $median = 14.3;
            $valueSd = 16.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 36 && $jk == "P") {
            $median = 13.9;
            $valueSd = 15.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 37 && $jk == "L") {
            $median = 14.5;
            $valueSd = 16.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 37 && $jk == "P") {
            $median = 14;
            $valueSd = 16;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 38 && $jk == "L") {
            $median = 14.7;
            $valueSd = 16.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 38 && $jk == "P") {
            $median = 14.2;
            $valueSd = 16.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 39 && $jk == "L") {
            $median = 14.8;
            $valueSd = 16.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 39 && $jk == "P") {
            $median = 14.4;
            $valueSd = 16.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 40 && $jk == "L") {
            $median = 15;
            $valueSd = 17;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 40 && $jk == "P") {
            $median = 14.6;
            $valueSd = 16.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 41 && $jk == "L") {
            $median = 15.2;
            $valueSd = 17.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 41 && $jk == "P") {
            $median = 14.8;
            $valueSd = 16.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 42 && $jk == "L") {
            $median = 15.3;
            $valueSd = 17.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 42 && $jk == "P") {
            $median = 15;
            $valueSd = 17.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 43 && $jk == "L") {
            $median = 15.5;
            $valueSd = 17.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 43 && $jk == "P") {
            $median = 15.2;
            $valueSd = 17.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 44 && $jk == "L") {
            $median = 15.7;
            $valueSd = 17.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 44 && $jk == "P") {
            $median = 15.3;
            $valueSd = 17.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 45 && $jk == "L") {
            $median = 15.8;
            $valueSd = 18;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 45 && $jk == "P") {
            $median = 15.5;
            $valueSd = 17.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 46 && $jk == "L") {
            $median = 16;
            $valueSd = 18.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 46 && $jk == "P") {
            $median = 15.7;
            $valueSd = 18.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 47 && $jk == "L") {
            $median = 16.2;
            $valueSd = 18.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 47 && $jk == "P") {
            $median = 15.9;
            $valueSd = 18.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 48 && $jk == "L") {
            $median = 16.3;
            $valueSd = 18.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 48 && $jk == "P") {
            $median = 16.1;
            $valueSd = 18.5;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 49 && $jk == "L") {
            $median = 16.5;
            $valueSd = 18.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 49 && $jk == "P") {
            $median = 16.3;
            $valueSd = 18.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 50 && $jk == "L") {
            $median = 16.7;
            $valueSd = 19;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 50 && $jk == "P") {
            $median = 16.4;
            $valueSd = 19;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 51 && $jk == "L") {
            $median = 16.8;
            $valueSd = 19.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 51 && $jk == "P") {
            $median = 16.6;
            $valueSd = 19.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 52 && $jk == "L") {
            $median = 17;
            $valueSd = 19.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 52 && $jk == "P") {
            $median = 16.8;
            $valueSd = 19.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 53 && $jk == "L") {
            $median = 17.2;
            $valueSd = 19.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 53 && $jk == "P") {
            $median = 17;
            $valueSd = 19.7;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 54 && $jk == "L") {
            $median = 17.3;
            $valueSd = 19.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 54 && $jk == "P") {
            $median = 17.2;
            $valueSd = 19.9;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 55 && $jk == "L") {
            $median = 17.5;
            $valueSd = 20;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 55 && $jk == "P") {
            $median = 17.3;
            $valueSd = 20.1;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 56 && $jk == "L") {
            $median = 17.7;
            $valueSd = 20.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 56 && $jk == "P") {
            $median = 17.5;
            $valueSd = 20.3;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 57 && $jk == "L") {
            $median = 17.8;
            $valueSd = 20.4;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 57 && $jk == "P") {
            $median = 17.7;
            $valueSd = 20.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 58 && $jk == "L") {
            $median = 18;
            $valueSd = 20.6;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 58 && $jk == "P") {
            $median = 17.9;
            $valueSd = 20.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 59 && $jk == "L") {
            $median = 18.2;
            $valueSd = 20.8;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 59 && $jk == "P") {
            $median = 18;
            $valueSd = 21;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 60 && $jk == "L") {
            $median = 18.3;
            $valueSd = 21;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else if ($umur == 60 && $jk == "P") {
            $median = 18.2;
            $valueSd = 21.2;
            $itung1 = $berat_badan - $median;
            $itung2 = $valueSd - $median;

            $hasil = $itung1 / $itung2;
            // $hasil = round($gethasil, 1);
            if ($hasil <= -3) {
                $status_gizi = 'Berat badan sangat kurang';
            } else if ($hasil == -3 || $hasil <= -2) {
                $status_gizi = 'Berat badan kurang';
            } else if ($hasil == -2 || $hasil <= 1 || $hasil == 1) {
                $status_gizi = 'Berat badan normal';
            } else if ($hasil >= 1) {
                $status_gizi = 'Berat badan lebih';
            }
        } else {
            $status_gizi = 'Tidak Masuk Kategori';
        }

        $data_KMS = [
            'id_kms' => $id_kms,
            'kode_posyandu' => $kode_posyandu,
            'jk' => $jk,
            'umur' => $umur,
            'tanggal_periksa' => $tanggal_periksa,
            'bulan' => $bulan_periksa,
            'tahun' => $tahun_periksa,
            'tinggi_badan' => $tinggi_badan,
            'status_gizi' => $status_gizi,
            'berat_badan' =>  number_format($berat_badan, 2)
        ];
        $this->db->insert('dataKMS', $data_KMS);
    }

    public function PintKMSId($id)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataKMS
            WHERE id_kms = $id"
        );

        return $query->result_array();
    }

    public function ubahData($id)
    {
        $nik = $this->input->post('nik');
        $nama    = $this->input->post('nama');
        $tanggal_periksa    = $this->input->post('tanggal_periksa');
        $bulan_periksa = date('M', strtotime($this->input->post('tanggal_periksa')));
        $tinggi_badan    = $this->input->post('tinggi_badan');
        $berat_badan    = $this->input->post('berat_badan');
        $data_KMS = [
            'nik' => $nik,
            'nama' => $nama,
            'tanggal_periksa' => $tanggal_periksa,
            'bulan' => $bulan_periksa,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan
        ];
        $this->db->where('id_kms', $id);
        $this->db->update('dataKMS', $data_KMS);
    }

    public function hapusData($id)
    {
        $this->db->delete('dataKMS', ['id_kms' => $id]);
    }
}
