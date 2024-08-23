<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataAnak extends CI_Model
{

    public function printAnak($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak WHERE kode_posyandu = '$spesifik_kode' ORDER BY nik DESC"
        );

        return $query->result_array();
    }

    public function adminGetAnak()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak ORDER BY nik DESC"
        );

        return $query->result_array();
    }

    public function printAnakRange($kode_posyandu)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak WHERE kode_posyandu = '$kode_posyandu'"
        );

        return $query->result_array();
    }

    public function countAnak($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak WHERE kode_posyandu = '$spesifik_kode'"
        );

        return $query->num_rows();
    }

    public function allAnak()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak"
        );

        return $query->num_rows();
    }

    public function adminCountAnak()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak"
        );

        return $query->num_rows();
    }

    public function countAnakRange($kode_posyandu)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak
            WHERE kode_posyandu = '$kode_posyandu'"
        );

        return $query->num_rows();
    }

    public function countAnakId($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak
            WHERE nik_wali = $nik"
        );

        return $query->num_rows();
    }

    public function countAnakNik($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak
            WHERE nik = $nik"
        );

        return $query->num_rows();
    }

    public function countAnakGolonganA($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT kode_posyandu 
            FROM dataAnak WHERE golongan_darah = 'A' AND kode_posyandu = '$spesifik_kode'"
        );

        return $query->num_rows();
    }

    public function countAnakGolonganB($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak WHERE golongan_darah = 'B' AND kode_posyandu = '$spesifik_kode'"
        );

        return $query->num_rows();
    }

    public function countAnakGolonganAB($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak WHERE golongan_darah = 'AB' AND kode_posyandu = '$spesifik_kode'"
        );

        return $query->num_rows();
    }

    public function countAnakGolonganO($spesifik_kode)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak WHERE golongan_darah = 'O' AND kode_posyandu = '$spesifik_kode'"
        );

        return $query->num_rows();
    }

    public function printAnakId($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak
            WHERE nik = $nik"
        );

        return $query->result_array();
    }

    public function printAnakIdWali($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak
            WHERE nik_wali = $nik"
        );

        return $query->result_array();
    }

    public function printAnakIdIbu($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAnak
            WHERE nik_wali = $nik"
        );

        return $query->result_array();
    }

    public function saveData($data)
    {
        $nik = $this->input->post('nik');
        $kode_posyandu = $this->input->post('kode_posyandu');
        $id_kms = $this->input->post('id_kms');
        $nama    = $this->input->post('nama');
        $email  = $this->input->post('email');
        $password = $this->input->post('password');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jk = $this->input->post('jk');
        $golongan_darah    = $this->input->post('golongan_darah');
        $alamat = $this->input->post('alamat');
        $anak_ke = $this->input->post('anak_ke');
        $nik_wali = $this->input->post('nik_wali');
        $status = $this->input->post('status');
        $nama_wali = $data['dataIbu'][0]['nama'];
        $data_anak = [
            'nik' => $nik,
            'kode_posyandu' => $kode_posyandu,
            'id_kms' => $id_kms,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jk' => $jk,
            'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'anak_ke' => $anak_ke,
            'status' => $status,
            'nik_wali' => $nik_wali,
            'nama_wali' => $nama_wali
        ];
        $this->db->insert('dataAnak', $data_anak);
    }

    public function hapusData($nik)
    {
        $this->db->delete('dataAnak', ['nik' => $nik]);
    }

    public function ubahData($nik, $data)
    {
        $nama    = $this->input->post('nama');
        $email  = $this->input->post('email');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jk = $this->input->post('jk');
        $password = $this->input->post('password');
        $golongan_darah    = $this->input->post('golongan_darah');
        $alamat = $this->input->post('alamat');
        $anak_ke = $this->input->post('anak_ke');
        $nik_wali = $this->input->post('nik_wali');
        $nama_wali = $data['dataIbu'][0]['nama'];
        $data_anak = [
            'nik' => $nik,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jk' => $jk,
            'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'anak_ke' => $anak_ke,
            'nik_wali' => $nik_wali,
            'nama_wali' => $nama_wali
        ];
        $this->db->where('nik', $nik);
        $this->db->update('dataAnak', $data_anak);
    }
}
