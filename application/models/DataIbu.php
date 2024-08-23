<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataIbu extends CI_Model
{

    public function printIbu($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataIbu WHERE kode_posyandu = '$spesifik_kode'"
        );

        return $query->result_array();
    }

    public function getIbu_list()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataIbu"
        );

        return $query->result_array();
    }

    public function printIbuRange($dari_tanggal, $sampai_tanggal)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataIbu WHERE created_at BETWEEN '$dari_tanggal' AND '$sampai_tanggal'"
        );

        return $query->result_array();
    }

    public function countIbu($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataIbu WHERE kode_posyandu = '$spesifik_kode'"
        );

        return $query->num_rows();
    }

    public function adminCountIbu()
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataIbu"
        );

        return $query->num_rows();
    }

    public function countIbuRange($kode_posyandu)
    {
        $query = $this->db->query(
            "SELECT *
            FROM dataIbu WHERE kode_posyandu = '$kode_posyandu' "
        );

        return $query->num_rows();
    }

    public function printIbuId($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataIbu
            WHERE nik = $nik"
        );

        return $query->result_array();
    }

    public function countIbuId($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataIbu
            WHERE nik = $nik"
        );

        return $query->num_rows();
    }

    public function saveData(){
        $kode_posyandu = $this->input->post('kode_posyandu');
        $nik = $this->input->post('nik');
        $nama	= $this->input->post('nama');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $golongan_darah	= $this->input->post('golongan_darah');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        // $jumlah_anak = $this->input->post('jumlah_anak');
		$data_anak = [
            'nik' => $nik,
            'kode_posyandu' => $kode_posyandu,
			'nama' => $nama,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon
        ];
        $this->db->insert('dataIbu', $data_anak);
    }

    public function hapusData($nik)
    {
        $this->db->delete('dataIbu', ['nik' => $nik]);
    }

    public function ubahData($nik)
    {
        $nama	= $this->input->post('nama');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $golongan_darah	= $this->input->post('golongan_darah');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $data_anak = [
            'nik' => $nik,
			'nama' => $nama,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon
        ];
        $this->db->where('nik', $nik);
        $this->db->update('dataIbu', $data_anak);

    }
}
