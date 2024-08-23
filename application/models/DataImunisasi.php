<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataImunisasi extends CI_Model
{

    public function printImunisasi($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataImunisasi WHERE kode_posyandu='$spesifik_kode' ORDER BY tanggal_imunisasi ASC"
        );

        return $query->result_array();
    }

    public function printImunisasi_filtertanggal($tanggal_awal, $tanggal_akhir,  $spesifik_kode, $getKategori)
    {

        $this->db->select('*');
        $this->db->from('dataImunisasi');
        $this->db->where('kode_posyandu', $spesifik_kode);
        $this->db->where('jenis_imunisasi', $getKategori);
        $this->db->where('tanggal_imunisasi >=', $tanggal_awal);
        $this->db->where('tanggal_imunisasi <=', $tanggal_akhir);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function printImunisasi_filtertanggal2($tanggal_awal, $tanggal_akhir,  $spesifik_kode)
    {

        $this->db->select('*');
        $this->db->from('dataImunisasi');
        $this->db->where('kode_posyandu', $spesifik_kode);
        $this->db->where('tanggal_imunisasi >=', $tanggal_awal);
        $this->db->where('tanggal_imunisasi <=', $tanggal_akhir);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function printImunisasi_filterkategori($getFilter,  $spesifik_kode)
    {

        $this->db->select('*');
        $this->db->from('dataImunisasi');
        $this->db->where('kode_posyandu', $spesifik_kode);
        $this->db->where('jenis_imunisasi', $getFilter);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getImunisasiUser($spesifikNik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataImunisasi WHERE nik='$spesifikNik' ORDER BY id_imunisasi DESC"
        );

        return $query->result_array();
    }


    public function getKmsUser($spesifikIdkms)
    {

        $this->db->select('*');
        $this->db->from('datakms');
        $this->db->join('dataposyandu', 'datakms.kode_posyandu=dataposyandu.kode_posyandu');
        $this->db->join('dataanak', 'datakms.id_kms=dataanak.id_kms');
        $this->db->where('dataKMS.id_kms', $spesifikIdkms);
        $query =  $this->db->get();

        return $query->result_array();
    }


    public function printImunisasiRange($dari_tanggal, $sampai_tanggal)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataImunisasi WHERE tanggal_imunisasi BETWEEN '$dari_tanggal' AND '$sampai_tanggal'"
        );

        return $query->result_array();
    }

    public function countImunisasi($spesifik_kode = null)
    {
        if ($spesifik_kode != null) {
            $query = $this->db->query(
                "SELECT *
                FROM dataImunisasi
                WHERE status = 1 AND kode_posyandu = '$spesifik_kode'"
            );
        } else {
            $query = $this->db->query(
                "SELECT *
            FROM dataImunisasi
            WHERE status = 1"
            );
        }

        return $query->num_rows();
    }

    public function countImunisasiId($nik)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataImunisasi
            WHERE status = 1 AND nik = $nik"
        );

        return $query->num_rows();
    }

    public function printImunisasiIf($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataImunisasi
            WHERE nik = $nik"
        );

        return $query->result_array();
    }

    public function printImunisasiId($id)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataImunisasi
            WHERE id_imunisasi = $id"
        );

        return $query->result_array();
    }

    public function countJenisImunisasi($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT bulan, COUNT(jenis_imunisasi) as jumlah_imunisasi
            FROM dataImunisasi WHERE kode_posyandu = '$spesifik_kode' AND bulan != '' GROUP BY bulan ORDER BY tanggal_imunisasi ASC"
        );

        return $query->result_array();
    }

    public function countJumlahKMS()
    {
        $query = $this->db->query(
            "SELECT bulan, COUNT(status_gizi) as count_gizi
            FROM datakms WHERE bulan != '' GROUP BY bulan ORDER BY tanggal_periksa ASC"
        );

        return $query->result_array();
    }

    public function countSudahImunisasi($spesifik_kode)
    {

        $this->db->select('*');
        $this->db->from('dataImunisasi');
        $this->db->where('kode_posyandu', $spesifik_kode);
        $this->db->where('status', 1);
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function countRiwayatSudahImunisasi()
    {
        $query = $this->db->query(
            "SELECT bulan, COUNT(status) as jumlah_status
            FROM dataImunisasi WHERE status = 1 GROUP BY bulan ORDER BY tanggal_imunisasi ASC"
        );

        return $query->result_array();
    }

    public function countBelumImunisasi($spesifik_kode)
    {
        $this->db->select('*');
        $this->db->from('dataImunisasi');
        $this->db->where('kode_posyandu', $spesifik_kode);
        $this->db->where('status', 0);
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function saveDefault()
    {
        $nik = $this->input->post('nik');
        $nama    = $this->input->post('nama');
        $kode_posyandu    = $this->input->post('kode_posyandu');
        $bulan    = date('F');
        $tanggal_lahir =  $this->input->post('tanggal_lahir');
        $tanggal_imunisasi =  date('Y-m-d');
        $jenis_imunisasi = ['BCG', 'CAMPAK', 'POLIO I', 'POLIO II', 'POLIO III', 'POLIO IV'];
        $status = 0;
        for ($i = 0; $i < 6; $i++) {
            $data_anak = [
                'nik' => $nik,
                'kode_posyandu' => $kode_posyandu,
                'bulan' => $bulan,
                'nama' => $nama,
                'tanggal_lahir' => $tanggal_lahir,
                'tanggal_imunisasi' => $tanggal_imunisasi,
                'jenis_imunisasi' => $jenis_imunisasi[$i],
                'status' => $status
            ];
            $this->db->insert('dataImunisasi', $data_anak);
        }
    }

    public function saveData($getNik, $getNama, $getTanggal)
    {


        $kode_posyandu = $this->input->post('kode_posyandu');
        $tanggal_imunisasi = $this->input->post('tanggal_imunisasi');
        $bulan_imunisasi = date('F', strtotime($this->input->post('tanggal_imunisasi')));
        $jenis_imunisasi = $this->input->post('jenis_imunisasi');
        $status = $this->input->post('status');
        $data_anak = [
            'nik' => $getNik,
            'kode_posyandu' => $kode_posyandu,
            'nama' => $getNama,
            'tanggal_lahir' => $getTanggal,
            'tanggal_imunisasi' => $tanggal_imunisasi,
            'bulan' => $bulan_imunisasi,
            'jenis_imunisasi' => $jenis_imunisasi,
            'status' => $status
        ];
        $this->db->insert('dataImunisasi', $data_anak);
    }

    public function hapusData($id)
    {
        $this->db->delete('dataImunisasi', ['id_imunisasi' => $id]);
    }

    public function ubahData($id)
    {
        $nik = $this->input->post('nik');
        $nama    = $this->input->post('nama');
        $tanggal_imunisasi = $this->input->post('tanggal_imunisasi');
        $bulan_imunisasi = date('F', strtotime($this->input->post('tanggal_imunisasi')));
        $jenis_imunisasi = $this->input->post('jenis_imunisasi');
        $status = $this->input->post('status');
        $data_imunisasi = [
            'nik' => $nik,
            'nama' => $nama,
            'tanggal_imunisasi' => $tanggal_imunisasi,
            'bulan' => $bulan_imunisasi,
            'jenis_imunisasi' => $jenis_imunisasi,
            'status' => $status
        ];
        $this->db->where('id_imunisasi', $id);
        $this->db->update('dataImunisasi', $data_imunisasi);
    }
}
