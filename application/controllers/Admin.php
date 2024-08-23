<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->library('form_validation');
        $this->load->model('DataAnak');
        $this->load->model('DataIbu');
        $this->load->model('DataImunisasi');
        $this->load->model('DataPosyandu');
        $this->load->model('DataKMS');
        $this->load->model('DataAkun');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['title'] = 'Dashboard';

        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['countPetugas'] = $this->DataAkun->countPetugas();
        $data['countAnak'] = $this->DataAnak->allAnak();
        $data['data_lk']    = $this->db->get_where('dataanak', ['jk' => 'Laki-laki'])->num_rows();
        $data['data_pr']    = $this->db->get_where('dataanak', ['jk' => 'Perempuan'])->num_rows();
        $data['countKMS'] = $this->DataKMS->allKMS();
        $data['countPosyandu'] = $this->db->get('dataposyandu')->num_rows();
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('Admin/template/footer');
    }

    // DATA PETUGAS

    public function DataPetugas()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[dataakun.email]');
        
        if( $this->form_validation->run() == false){

        $data['title'] = 'Data Kader';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['get_posyandu'] = $this->DataAkun->get_posyandu();
        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['dataAkun'] = $this->DataAkun->printAkun();
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataPetugas_view', $data);
        $this->load->view('Admin/template/footer');

        }

        
    }

    public function DataPetugas_edit($id)
    {

        $data['title'] = 'Edit Data Kader';
        $id = base64_decode($id);
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['get_posyandu'] = $this->DataAkun->get_posyandu();
        $data['dataAkun'] = $this->DataAkun->printAkunId($id);
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataPetugasEdit_view', $data);
        $this->load->view('Admin/template/footer');
    }



    public function TambahDataPetugas()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[dataakun.email]');
        
        if( $this->form_validation->run() == false){
            $this->DataPetugas();
        } else {
        $this->DataAkun->saveData();
        $this->session->set_flashdata('admin', 'Success as a admin.');
        redirect('Admin/DataPetugas');
        }
    }

    public function UbahDataPetugas($id)
    {

        $id_akun = $this->input->post('id_akun');

        $data['user'] = $this->DataAkun->getAkunEdit($id_akun);



        $nama    = $this->input->post('nama');
        $nik    = $this->input->post('nik');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jabatan    = $this->input->post('jabatan');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $role = $this->input->post('role');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');

        // $upload_image = $_FILES['gambar']['name'];

        // if ($upload_image) {
        //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //     $config['max_size']      = '8000';
        //     $config['upload_path'] = './assets/img/profile/';
        //     $config['overwrite']     = true;

        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);

        //     if ($this->upload->do_upload('gambar')) {
        //         $old_image = $data['user'];
        //         if ($old_image != 'default.jpg') {
        //             unlink(FCPATH . 'assets/img/profile/' . $old_image);
        //         }
        //         $new_image = $this->upload->data('file_name');

        //     } else {
        //         echo $this->upload->dispay_errors();
        //     }
        // }


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
            // 'image'=> $new_image,
            'role' => $role
        ];


        $this->db->where('id_akun', $id);
        $this->db->update('dataAkun', $data_akun);


        $this->session->set_flashdata('admin', 'Success as a admin.');
        redirect('Admin/DataPetugas');
    }

    public function HapusDataPetugas($id)
    {
        $id = base64_decode($id);
        $this->DataAkun->hapusData($id);
        $this->session->set_flashdata('admin', 'Success as a admin.');
        redirect('Admin/DataPetugas');
    }



    public function DataPetugas_detail($id)
    {
        $id = base64_decode($id);
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['dataAkun'] = $this->DataAkun->printAkunId($id);

        $data['title'] = 'Detail Data Petugas';

        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataPetugasDetail_view', $data);
        $this->load->view('Admin/template/footer');
    }

    // DATA POSYANDU

    public function DataPosyandu()
    {
        $data['title'] = 'Data Posyandu';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['dataposyandu'] = $this->DataPosyandu->printPosyandu();
        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataPosyandu_view', $data);
        $this->load->view('Admin/template/footer');
    }

    public function view_tambah_posyandu()
    {
        $data['title'] = 'Tambah Data Posyandu';
        $this->load->library('googlemaps');
        $this->googlemaps->initialize();
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/view_tambah_posyandu', $data);
        $this->load->view('Admin/template/footer');
    }

    public function TambahDataPosyandu()
    {

        $this->DataPosyandu->saveData();
        $this->session->set_flashdata('admin', 'Success as a admin.');
        $this->session->set_tempdata('message', 'Data Berhasil di simpan..', 3);
        redirect('Admin/DataPosyandu');
    }

    public function DataPosyandu_edit($id_posyandu)
    {

        $data['dataposyandu'] = $this->DataPosyandu->printAkunId($id_posyandu);
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataPosyanduEdit_view', $data);
        $this->load->view('Admin/template/footer');
    }

    public function UbahDataPosyandu($id_posyandu)
    {
        $this->DataPosyandu->ubahData($id_posyandu);
        $this->session->set_flashdata('admin', 'Success as a admin.');
        $this->session->set_tempdata('message', 'Data Berhasil di edit..', 3);
        redirect('Admin/DataPosyandu');
    }

    public function HapusDataPosyandu($id_posyandu)
    {

        $this->DataPosyandu->hapusData($id_posyandu);
        $this->session->set_flashdata('admin', 'Success as a admin.');
        $this->session->set_tempdata('message', 'Data Berhasil di hapus..', 3);
        redirect('Admin/DataPosyandu');
    }

    public function DataPosyandu_detail($id)
    {
        $id = base64_decode($id);
        $data['dataAkun'] = $this->DataPosyandu->printAkunId($id);
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataPetugasDetail_view', $data);
        $this->load->view('Admin/template/footer');
    }




    //DATA ANAK

    public function DataAnak()
    {

        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['dataIbu'] = $this->db->get('dataibu')->result_array();
        $data['title'] = 'Data Anak';
        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['dataAnak'] = $this->DataAnak->adminGetAnak();
        $data['data_lk'] = $this->db->get_where('dataanak', ['jk' => 'Laki-laki'])->num_rows();
        $data['data_pr'] = $this->db->get_where('dataanak', ['jk' => 'Perempuan'])->num_rows();

        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataAnak_view', $data);
        $this->load->view('Admin/template/footer');
    }

    public function TambahDataAnak()
    {
        if ($this->DataAnak->countAnakNik($this->input->post('nik')) > 0) {
            $this->session->set_flashdata('error_tambah', 'Error tambah data.');
        } else {
            $data['dataIbu'] = $this->DataIbu->printIbuId($this->input->post('nik_wali'));
            $this->DataAnak->saveData($data);
            $this->DataImunisasi->saveDefault();
        }
        $this->session->set_flashdata('admin', 'Success as a admin.');
        redirect('Admin/DataAnak');
    }

    public function UbahDataAnak($nik)
    {
        $data['dataIbu'] = $this->DataIbu->printIbuId($this->input->post('nik_wali'));
        $this->DataAnak->ubahData($nik, $data);
        $this->session->set_flashdata('admin', 'Success as a admin.');
        redirect('Admin/DataAnak');
    }

    public function HapusDataAnak($nik)
    {
        $nik = base64_decode($nik);
        $this->DataAnak->hapusData($nik);
        $this->session->set_flashdata('admin', 'Success as a admin.');
        redirect('Admin/DataAnak');
    }

    public function DataAnak_edit($nik)
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['title'] = 'Data Edit Anak';
        $nik = base64_decode($nik);
        $data['dataIbu'] = $this->DataIbu->printIbu($nik);
        $data['dataAnak'] = $this->DataAnak->printAnakId($nik);
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataAnakEdit_view', $data);
        $this->load->view('Admin/template/footer');
    }

    public function DataAnak_detail($nik)
    {
        $nik = base64_decode($nik);
        $data['title'] = 'Data Detail Anak';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        // $x = $this->DataKMS->get_data($nik)->result();
        // $data['graph'] = json_encode($x);
        $data['dataAnak'] = $this->DataAnak->printAnakId($nik);
        $data['dataImunisasi'] = $this->DataImunisasi->printImunisasiIf($nik);
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataAnakDetail_view', $data);
        $this->load->view('Admin/template/footer');
    }

    public function DataKMS()
    {

        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['title'] = 'Data Perkembangan Anak';
        $data['countbbsk'] = $this->DataKMS->admincountbbsk();
        $data['countbbk'] = $this->DataKMS->admincountbbk();
        $data['countbbn'] = $this->DataKMS->admincountbbn();
        $data['countbbl'] = $this->DataKMS->admincountbbl();


        // $x = $this->DataKMS->printAVGKMS();
        // $data['avgKMS'] = json_encode($x);
        $data['countIbu'] = $this->DataIbu->adminCountIbu();
        $data['countAnak'] = $this->DataAnak->adminCountAnak();


        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataKMS_view', $data);
        $this->load->view('Admin/template/footer');
    }

    public function getDataKMS()
    {

        $getKode = $this->input->post('kode_posyandu');
        $data['title'] = 'Data Perkembangan Anak';
        $data['filterKMS'] = $this->DataKMS->adminFilterkms($getKode);
        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode'] = $getKode;

        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/filterDatakms', $data);
        $this->load->view('Admin/template/footer');
    }
    public function getDataAnak()
    {

        $getKode = $this->input->post('kode_posyandu');
        $data['title'] = 'Data Anak';
        $data['filterAnak'] = $this->db->query("SELECT * FROM dataanak WHERE kode_posyandu = '$getKode'")->result_array();
        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode'] = $getKode;

        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/filterDataAnak', $data);
        $this->load->view('Admin/template/footer');
    }

    public function DataLaporan()
    {
        $kode_posyandu = $this->input->post('kode_posyandu');
        $data['getKodePosyandu'] = $this->db->get('dataposyandu')->result_array();
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $x = $this->DataKMS->printAVGKMS();
        $data['avgKMS'] = json_encode($x);
        $data['countbbsk'] = $this->DataKMS->countbbsk($kode_posyandu);
        $data['countbbk'] = $this->DataKMS->countbbk($kode_posyandu);
        $data['countbbn'] = $this->DataKMS->countbbn($kode_posyandu);
        $data['countbbl'] = $this->DataKMS->countbbl($kode_posyandu);
        $data['countIbu'] = $this->DataIbu->countIbuRange($kode_posyandu);
        $data['countAnak'] = $this->DataAnak->countAnakRange($kode_posyandu);
        $data['dataKMS'] = $this->DataKMS->printKMS($kode_posyandu);
        $data['dataAnak'] = $this->DataAnak->printAnakRange($kode_posyandu);
        $data['dataAkun'] = $this->DataAkun->printAkunRange($kode_posyandu);
        $data['kode'] = $kode_posyandu;
        $data['title'] = 'Data Laporan';
        $this->load->view('Admin/template/header', $data);
        $this->load->view('Admin/dataLaporan', $data);
        $this->load->view('Admin/template/footer');
    }

    public function cetak_kader()
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'     => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'kader'     => $this->db->query("SELECT dataposyandu.nama_posyandu, dataakun.nama, dataakun.jabatan FROM dataposyandu INNER JOIN dataakun ON dataposyandu.kode_posyandu = dataakun.kode_posyandu ORDER BY nama_posyandu ASC")->result_array()
        ];

        $this->load->view('admin/laporan/cetak_kader', $data);

        $paper_size         = 'A4';
        $orientation        = 'potrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }

    public function cetakPA($kode)
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'     => 'Laporan',
            'kode'      => $kode,
            'gambar'        => FCPATH . 'assets/img/logo22.png',

            'dataKMS' => $this->DataKMS->printKMS($kode)
        ];

        $this->load->view('admin/laporan/cetak_pa', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }

    public function cetakPetugas($kode)
    {
        $kode_posyandu = $kode;
        $this->load->library('dompdf_gen');
        $data = [
            'judul'     => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'kader'     => $this->db->query("SELECT dataposyandu.nama_posyandu, dataposyandu.kode_posyandu, dataakun.nama, dataakun.jabatan, dataakun.kode_posyandu FROM dataposyandu INNER JOIN dataakun ON dataposyandu.kode_posyandu = dataakun.kode_posyandu WHERE dataakun.kode_posyandu = '$kode' ORDER BY nama_posyandu ASC")->result_array()
        ];

        $this->load->view('admin/laporan/cetak_kader', $data);

        $paper_size         = 'A4';
        $orientation        = 'potrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }

    public function cetak_posyandu()
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'     => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'posyandu'  => $this->db->get('dataposyandu')->result_array(),
            'kader'     => $this->db->query("SELECT dataposyandu.nama_posyandu, dataakun.nama, dataakun.jabatan FROM dataposyandu INNER JOIN dataakun ON dataposyandu.kode_posyandu = dataakun.kode_posyandu ORDER BY nama_posyandu ASC")->result_array()
        ];

        $this->load->view('admin/laporan/cetak_posyandu', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }

    public function cetak_anak()
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'kode' => '',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'dataanak'         => $this->db->get('dataanak')->result_array()
        ];

        $this->load->view('admin/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }

    public function cetakAnak($kode)
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'kode'          => $kode,
            'dataanak'         => $this->db->get_where('dataanak', ['kode_posyandu' => $kode])->result_array()
        ];

        $this->load->view('admin/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }

    public function cetak_anak_lk()
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'dataanak'         => $this->db->get_where('dataanak', ['jk' => 'Laki-laki'])->result_array()
        ];

        $this->load->view('admin/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }
    public function cetak_anak_pr()
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'dataanak'         => $this->db->get_where('dataanak', ['jk' => 'Perempuan'])->result_array()
        ];

        $this->load->view('admin/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('admin', 'Success as a admin.');
    }
}
