<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPosyandu extends CI_Model
{

    public function printPosyandu()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataposyandu"
        );

        return $query->result_array();
    }

    public function saveData()
    {
        $nama_posyandu    = $this->input->post('nama_posyandu');
        $kode_posyandu    = $this->input->post('kode_posyandu');
        $alamat = $this->input->post('alamat');
        $jumlah_kader    = $this->input->post('jumlah_kader');
        $jumlah_wus = $this->input->post('jumlah_wus');
        $keterangan    = $this->input->post('keterangan');
        $lng    = $this->input->post('lng');
        $lat = $this->input->post('lat');
        $created_date = date('y-m-d');
        $data_posyandu = [
            'nama_posyandu' => $nama_posyandu,
            'kode_posyandu' => $kode_posyandu,
            'alamat' => $alamat,
            'jumlah_kader' => $jumlah_kader,
            'jumlah_wus' => $jumlah_wus,
            'keterangan' => $keterangan,
            'lng' => $lng,
            'lat' => $lat,
            'created_date' => $created_date
        ];
        $this->db->insert('dataposyandu', $data_posyandu);
    }

    public function printAkunId($id_posyandu)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataposyandu
            WHERE id_posyandu = $id_posyandu"
        );

        return $query->result_array();
    }

    public function ubahData($id_posyandu)
    {

        $nama_posyandu    = $this->input->post('nama_posyandu');
        $kode_posyandu    = $this->input->post('kode_posyandu');
        $alamat = $this->input->post('alamat');
        $jumlah_kader    = $this->input->post('jumlah_kader');
        $jumlah_wus = $this->input->post('jumlah_wus');
        $keterangan    = $this->input->post('keterangan');
        $lng    = $this->input->post('lng');
        $lat    = $this->input->post('lat');

        $data_posyandu = [
            'nama_posyandu' => $nama_posyandu,
            'kode_posyandu' => $kode_posyandu,
            'alamat' => $alamat,
            'jumlah_kader' => $jumlah_kader,
            'jumlah_wus' => $jumlah_wus,
            'keterangan' => $keterangan,
            'lng' => $lng,
            'lat' => $lat
        ];
        $this->db->where('id_posyandu', $id_posyandu);
        $this->db->update('dataposyandu', $data_posyandu);
    }

    public function hapusData($id_posyandu)
    {
        $this->db->delete('dataposyandu', ['id_posyandu' => $id_posyandu]);
    }
}
