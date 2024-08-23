<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataAkun extends CI_Model
{

    public function printAkun()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun"
        );

        return $query->result_array();
    }

    public function getAkunEdit($id_akun){

        $this->db->select('image');
        $this->db->from('dataAkun');
        $this->db->where('id_akun', $id_akun);
        $query = $this->db->get();

        return $query->row_array();

    }

    public function get_posyandu()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataposyandu"
        );

        return $query->result_array();
    }

    public function printAkunRange($kode_posyandu)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun WHERE kode_posyandu = '$kode_posyandu'"
        );
        return $query->result_array();
    }
    
    public function countPetugas()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun WHERE role = 1"
        );

        return $query->num_rows();
    }

    public function allPetugas()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun"
        );

        return $query->num_rows();
    }

    public function countAkunNik($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun
            WHERE nik = $nik"
        );

        return $query->num_rows();
    }

    public function printAkunId($id)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun
            WHERE id_akun = $id"
        );

        return $query->result_array();
    }

    public function printAkunNik($nik)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM dataAkun
            WHERE nik = $nik"
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

    public function saveData(){
        $nama	= $this->input->post('nama');
        $nik	= $this->input->post('nik');
        $kode_posyandu	= $this->input->post('kode_posyandu');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $jabatan	= $this->input->post('jabatan');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $role = $this->input->post('role');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$data_akun = [
            'nik' => $nik,
            'nama' => $nama,
            'kode_posyandu' => $kode_posyandu,
            'email' => $email,
            'password' => $password,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
            'jabatan' => $jabatan,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'role' => $role,
            'pendidikan_terakhir'=> $pendidikan_terakhir,
            'image'=> 'default.jpg'
        ];
        $this->db->insert('dataAkun', $data_akun);
    }

    public function hapusData($id)
    {
        $this->db->delete('dataAkun', ['id_akun' => $id]);
    }

    public function ubahData($id)
    {
        $nama	= $this->input->post('nama');
        $nik	= $this->input->post('nik');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
        $jabatan	= $this->input->post('jabatan');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $role = $this->input->post('role');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $data_akun = [
            'nik' => $nik,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
            'jabatan' => $jabatan,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'role' => $role
        ];
        $this->db->where('id_akun', $id);
        $this->db->update('dataAkun', $data_akun);
    }

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('nama', $post["username"]);
        $this->db->where('password', $post["password"]);
        $user = $this->db->get("dataAkun")->row();
        // jika user terdaftar
        if($user){
            // periksa password-nya
            
            // periksa role-nya
            $isPetugas = $user->role;

            // jika password benar dan dia admin
            if($isPetugas < 3){ 
                // login sukses yay!
                $this->session->set_userdata('nik', $user->nik);
                return $isPetugas;
            }
        }
        
        // login gagal
		return false;
    }

    public function doLogin2(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('kode_posyandu', $post["kode_posyandu"]);
        $this->db->where('password', $post["password"]);
        $this->db->where('role', $post["role"]);
        $user = $this->db->get("dataAkun")->row();
        // jika user terdaftar
        if($user){
            // periksa password-nya
        
            // periksa role-nya
            $isPetugas = $user->role;

            // jika password benar dan dia admin
            if($isPetugas < 3){ 
                // login sukses yay!
                $this->session->set_userdata('nik', $user->nik);
                return $isPetugas;
            }
        }
        
        // login gagal
		return false;
    }

    public function doLogin3(){

		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('id_kms', $post["id_kms"]);
        $this->db->where('password', $post["password"]);
        $user = $this->db->get("dataanak")->row();
        // jika user terdaftar
        if($user){
            // periksa password-nya
            // periksa role-nya
            $isPetugas = $user->status;

            // jika password benar dan dia admin
            if($isPetugas ){ 
                // login sukses yay!
                $this->session->set_userdata('nik', $user->nik);
                return $isPetugas;
            }
               
            
        }
        return false;
       
    }

    
}
