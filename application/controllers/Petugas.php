<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->library('form_validation');
        $this->load->model('DataAnak');
        $this->load->model('DataIbu');
        $this->load->model('DataImunisasi');
        $this->load->model('DataKMS');
        $this->load->model('DataAkun');
    }
    public function index()
    {

        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['countAnakGologanA'] = $this->DataAnak->countAnakGolonganA($spesifik_kode);
        $data['countAnakGologanB'] = $this->DataAnak->countAnakGolonganB($spesifik_kode);
        $data['countAnakGologanAB'] = $this->DataAnak->countAnakGolonganAB($spesifik_kode);
        $data['countAnakGologanO'] = $this->DataAnak->countAnakGolonganO($spesifik_kode);
        $data['countIbu'] = $this->DataIbu->countIbu($spesifik_kode);
        $data['countAnak'] = $this->DataAnak->countAnak($spesifik_kode);
        $data['data_lk']    = $this->db->get_where('dataanak', ['jk' => 'Laki-laki', 'kode_posyandu' => $spesifik_kode])->num_rows();
        $data['data_pr']    = $this->db->get_where('dataanak', ['jk' => 'Perempuan', 'kode_posyandu' => $spesifik_kode])->num_rows();
        $data['countImunisasi'] = $this->DataImunisasi->countImunisasi($spesifik_kode);
        $data['countKMS'] = $this->DataKMS->countKMS($spesifik_kode);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/index');
        $this->load->view('Petugas/template/footer');
    }

    //DATA IBU

    public function DataIbu()
    {

        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['kode_posyandu'] = $getKode['kode_posyandu'];

        $data['countIbu'] = $this->DataIbu->countIbu($spesifik_kode);

        $data['title'] = 'Data Ibu';
        $data['dataIbu'] = $this->DataIbu->printIbu($spesifik_kode);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataIbu_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function DataIbu_edit($nik)
    {
        $data['title'] = 'Edit Data Ibu';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $nik = base64_decode($nik);
        $data['dataIbu'] = $this->DataIbu->printIbuId($nik);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataIbuEdit_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function DataIbu_detail($nik)
    {
        $data['title'] = 'Detail Data Ibu';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $nik = base64_decode($nik);
        $data['countAnak'] = $this->DataAnak->CountAnakId($nik);
        $data['dataIbu'] = $this->DataIbu->printIbuId($nik);
        $data['dataAnak'] = $this->DataAnak->printAnakIdIbu($nik);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataIbuDetail_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function TambahDataIbu()
    {
        $this->DataIbu->saveData();
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataIbu');
    }

    public function UbahDataIbu($nik)
    {
        $this->DataIbu->ubahData($nik);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataIbu');
    }

    public function HapusDataIbu($nik)
    {
        $nik = base64_decode($nik);
        $this->DataIbu->hapusData($nik);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataIbu');
    }

    //DATA ANAK

    public function DataAnak()
    {

        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['countAnak'] = $this->DataAnak->countAnak($spesifik_kode);
        $data['title'] = 'Data Anak';
        $data['data_lk']    = $this->db->get_where("dataanak", ['kode_posyandu' => $spesifik_kode, 'jk' => 'Laki-laki'])->num_rows();
        $data['data_pr']    = $this->db->get_where("dataanak", ['kode_posyandu' => $spesifik_kode, 'jk' => 'Perempuan'])->num_rows();
        $data['dataIbu'] = $this->DataIbu->printIbu($spesifik_kode);
        $data['dataAnak'] = $this->DataAnak->printAnak($spesifik_kode);
        $data['get_posyandu'] = $this->DataAkun->get_posyandu();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataAnak_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function TambahDataAnak()
    {
        if ($this->DataAnak->countAnakNik($this->input->post('nik')) > 0) {
            $this->session->set_flashdata('error_tambah', 'Error tambah data.');
        } else {
            $data['dataIbu'] = $this->DataIbu->printIbuId($this->input->post('nik_wali'));
            $this->DataAnak->saveData($data);
            // $this->DataImunisasi->saveDefault();
        }
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/DataAnak');
    }

    public function UbahDataAnak($nik)
    {
        $data['dataIbu'] = $this->DataIbu->printIbuId($this->input->post('nik_wali'));
        $this->DataAnak->ubahData($nik, $data);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataAnak');
    }

    public function HapusDataAnak($nik)
    {

        $this->DataAnak->hapusData($nik);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataAnak');
    }

    public function DataAnak_edit($nik)
    {
        // $nik = base64_decode($nik);
        $data['title'] = 'Edit Data Anak';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['dataIbu'] = $this->DataIbu->getIbu_list();
        $data['dataAnak'] = $this->DataAnak->printAnakId($nik);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataAnakEdit_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function dataanak_detail($nik)
    {
        $data['title'] = 'Data Detail Anak';
        $getIdKms = $this->db->get_where('dataanak', ['nik' => $nik])->row_array();
        $idKms_user = $getIdKms['id_kms'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $x = $this->DataKMS->get_dataUserPetugas($idKms_user)->result();
        $data['avgKMS'] = json_encode($x);


        $data['dataAnak'] = $this->DataAnak->printAnakId($nik);
        $data['dataImunisasi'] = $this->DataImunisasi->printImunisasiIf($nik);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataAnakDetail_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function DataKMS()
    {


        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $data['title'] = 'Data Perkembangan Anak';
        // $x = $this->DataKMS->printAVGKMS();
        // $data['avgKMS'] = json_encode($x);
        $x = $this->DataImunisasi->countJumlahKMS();
        $data['jenisKMS'] = json_encode($x);
        $data['countbbsk'] = $this->DataKMS->countbbsk($spesifik_kode);
        $data['countbbk'] = $this->DataKMS->countbbk($spesifik_kode);
        $data['countbbn'] = $this->DataKMS->countbbn($spesifik_kode);
        $data['countbbl'] = $this->DataKMS->countbbl($spesifik_kode);


        $data['countIbu'] = $this->DataIbu->countIbu($spesifik_kode);
        $data['countAnak'] = $this->DataAnak->countAnak($spesifik_kode);
        $data['dataKMS'] = $this->DataKMS->printKMS($spesifik_kode);
        $data['dataAnak'] = $this->DataAnak->printAnak($spesifik_kode);
        $data['getKode'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataKMS_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function TambahDataKMS()
    {
        $id_kms = $this->input->post('id_kms');
        $getUser = $this->db->get_where('dataanak', ['id_kms' => $id_kms])->row_array();
        $getJk = $getUser['jk'];
        if ($getJk == 'Laki-Laki') {
            $jk = 'L';
        } else if ($getJk == 'Perempuan') {
            $jk = 'P';
        }

        $tanggal_lahir = $getUser['tanggal_lahir'];


        $this->DataKMS->saveData($jk, $tanggal_lahir);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataKMS');
    }

    public function DataKMS_edit($id_kms)
    {
        $data['title'] = 'Edit Data Perkembangan Anak';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['dataKMS'] = $this->DataKMS->printKMSId($id_kms);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataKMSEdit_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function UbahDataKMS($id)
    {
        $this->DataKMS->ubahData($id);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataKMS');
    }

    public function HapusDataKMS($id_pa)
    {
        $this->db->where('id_pa', $id_pa);
        $this->db->delete('datakms');
        $this->session->set_flashdata('petugas', "Data Berhasil Dihapus");
        redirect('petugas/DataKMS');
    }

    public function DataImunisasi()
    {

        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['title'] = 'Data Imunisasi Anak';
        $data['dataAnak'] = $this->DataAnak->printAnak($spesifik_kode);
        $x = $this->DataImunisasi->countJenisImunisasi($spesifik_kode);
        $data['jenisImunisasi'] = json_encode($x);
        $data['countSudahImunisasi'] = $this->DataImunisasi->countSudahImunisasi($spesifik_kode);
        $data['countBelumImunisasi'] = $this->DataImunisasi->countBelumImunisasi($spesifik_kode);
        $data['dataImunisasi'] = $this->DataImunisasi->printImunisasi($spesifik_kode);
        $data['getUserLogin'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataImunisasi_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function DataImunisasi_edit($id)
    {
        $data['title'] = 'Edit Data Imunisasi';
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $id = base64_decode($id);
        $data['dataImunisasi'] = $this->DataImunisasi->printImunisasiId($id);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataImunisasiEdit_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function TambahDataImunisasi()
    {
        $gettNik = $_POST['nik'];

        $getKode = $this->db->get_where('dataanak', ['nik' => $gettNik])->row_array();
        $getNik = $getKode['nik'];
        $getNama = $getKode['nama'];
        $getTanggal = $getKode['tanggal_lahir'];

        $this->DataImunisasi->saveData($getNik, $getNama, $getTanggal);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataImunisasi');
    }

    public function UbahDataImunisasi($id)
    {
        $this->DataImunisasi->ubahData($id);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataImunisasi');
    }

    public function HapusDataImunisasi($id)
    {
        $id = base64_decode($id);
        $this->DataImunisasi->hapusData($id);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/DataImunisasi');
    }

    public function getFilterImunisasi()
    {

        $data['title'] = 'Data Filter Imunisasi';
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $getKategori = $this->input->post('getKategori');
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['getKategori'] = $getKategori;
        $data['kode'] = $spesifik_kode;
        $data['dataImunisasi_filtertanggal'] = $this->DataImunisasi->printImunisasi_filtertanggal($tanggal_awal, $tanggal_akhir,  $spesifik_kode, $getKategori);

        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataImunisasi_filterbytanggal', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function cetak_filter()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $getKategori = $this->input->post('getKategori');
        $spesifik_kode = $this->input->post('kode_posyandu');

        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataImunisasi_filtertanggal'         => $this->DataImunisasi->printImunisasi_filtertanggal($tanggal_awal, $tanggal_akhir,  $spesifik_kode, $getKategori)
        ];

        $this->load->view('petugas/laporan/cetak_filter', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }

    public function getFilterImunisasi2()
    {

        $data['title'] = 'Data Filter Imunisasi';
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];

        $data['dataImunisasi_filtertanggal2'] = $this->DataImunisasi->printImunisasi_filtertanggal2($tanggal_awal, $tanggal_akhir,  $spesifik_kode);

        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataImunisasi_filterbytanggal2', $data);
        $this->load->view('Petugas/template/footer');
    }





    public function DataLaporan()
    {


        $dari_tanggal = $this->input->post('dari_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $x = $this->DataKMS->printAVGKMS();
        $data['avgKMS'] = json_encode($x);
        $data['countIbu'] = $this->DataIbu->countIbuRange($dari_tanggal, $sampai_tanggal);
        $data['countAnak'] = $this->DataAnak->countAnakRange($dari_tanggal, $sampai_tanggal);
        $data['dataKMS'] = $this->DataKMS->printKMSRange($dari_tanggal, $sampai_tanggal);
        $data['dataAnak'] = $this->DataAnak->printAnakRange($dari_tanggal, $sampai_tanggal);
        $data['dataIbu'] = $this->DataIbu->printIbuRange($dari_tanggal, $sampai_tanggal);
        $data['dataImunisasi'] = $this->DataImunisasi->printImunisasiRange($dari_tanggal, $sampai_tanggal);
        $this->load->view('Petugas/dataLaporan_view', $data);
    }

    public function DataAkun()
    {
        $data['dataAkun'] = $this->DataAkun->printAkun();
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataAkun_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function DataAkun_edit($id)
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $id = base64_decode($id);
        $data['dataAkun'] = $this->DataAkun->printAkunId($id);
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/dataAkunEdit_view', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function TambahDataAkun()
    {
        if ($this->DataAkun->countAkunNik($this->input->post('nik')) > 0) {
            $this->session->set_flashdata('error_tambah', 'Error tambah data.');
        } else {
            $this->DataAkun->saveData();
        }
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/DataAkun');
    }

    public function UbahDataAkun($id)
    {
        $this->DataAkun->ubahData($id);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/DataAkun');
    }

    public function HapusDataAkun($id)
    {
        $id = base64_decode($id);
        $this->DataAkun->hapusData($id);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/DataAkun');
    }

    public function artikel()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['kode_posyandu'] = $getKode['kode_posyandu'];


        $data['title'] = 'Data Artikel';
        $data['artikel'] = $this->db->query(" SELECT * FROM artikel WHERE created_by = '$spesifik_kode'")->result_array();
        $data['kategori'] = [
            'Berat badan sangat kurang',
            'Berat badan kurang',
            'Berat badan normal',
            'Berat badan lebih',
        ];
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/artikel', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function tambah_artikel()
    {

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/img/artikel/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto   = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto gagal, silahkan cek file yang anda masukan</div>');
                redirect('petugas/artikel');
            }
        }


        $data = [
            'judul'             => $this->input->post('judul'),
            'isi_artikel'       => $this->input->post('isi_artikel'),
            'view'              => 0,
            'foto'              => $foto,
            'id_kategori'       => $this->input->post('id_kategori'),
            'created_by'        => $this->input->post('created_by'),
            'created_date'      => date('Y-m-d'),
        ];

        $this->db->insert('artikel', $data);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/artikel');
    }

    public function edit_artikel()
    {

        $id_artikel     = $this->input->post('id_artikel');
        $judul          = $this->input->post('judul');
        $isi_artikel    = $this->input->post('isi_artikel');
        $id_kategori    = $this->input->post('id_kategori');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/img/artikel/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto   = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
            } else {
                $this->db->set('judul', $judul);
                $this->db->set('isi_artikel', $isi_artikel);
                $this->db->set('id_kategori', $id_kategori);
                $this->db->where('id_artikel', $id_artikel);
                $this->db->update('artikel');
                $this->session->set_flashdata('petugas', 'Success as a petugas.');
                redirect('Petugas/artikel');
            }
        }


        $this->db->set('judul', $judul);
        $this->db->set('isi_artikel', $isi_artikel);
        $this->db->set('id_kategori', $id_kategori);
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel');
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/artikel');
    }

    public function hapus_artikel($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('artikel');
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/artikel');
    }
    // public function pengetahuan()
    // {
    //     $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

    //     $spesifik_kode = $getKode['kode_posyandu'];
    //     $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

    //     $data['kode_posyandu'] = $getKode['kode_posyandu'];


    //     $data['title'] = 'Data pengetahuan';
    //     $data['pengetahuan'] = $this->db->query(" SELECT * FROM pengetahuan JOIN pengetahuan_kategori ON pengetahuan.id_kategori = pengetahuan_kategori.id_kategori WHERE kode_posyandu = '$spesifik_kode'")->result_array();
    //     $data['kategori'] = $this->db->get('pengetahuan_kategori')->result_array();
    //     $this->load->view('Petugas/template/header', $data);
    //     $this->load->view('Petugas/pengetahuan', $data);
    //     $this->load->view('Petugas/template/footer');
    // }

    // public function tambah_pengetahuan()
    // {
    //     $foto = $_FILES['foto'];
    //     if ($foto = '') {
    //     } else {
    //         $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
    //         $config['max_size']         = '2048';
    //         $config['upload_path']      = './assets/img/pengetahuan/';
    //         $this->load->library('upload', $config);
    //         if ($this->upload->do_upload('foto')) {
    //             $foto   = $this->upload->data('file_name');
    //         } else {
    //             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto gagal, silahkan cek file yang anda masukan</div>');
    //             redirect('petugas/pengetahuan');
    //         }
    //     }
    //     $data = [
    //         'judul'             => $this->input->post('judul'),
    //         'isi_pengetahuan'   => $this->input->post('isi_pengetahuan'),
    //         'id_kategori'       => $this->input->post('id_kategori'),
    //         'foto'              => $foto,
    //         'kode_posyandu'     => $this->input->post('kode_posyandu'),
    //         'created_date'      => date('Y-m-d'),
    //     ];

    //     $this->db->insert('pengetahuan', $data);
    //     $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //     redirect('Petugas/pengetahuan');
    // }

    // public function edit_pengetahuan()
    // {

    //     $id_pengetahuan     = $this->input->post('id_pengetahuan');
    //     $judul              = $this->input->post('judul');
    //     $isi_pengetahuan    = $this->input->post('isi_pengetahuan');
    //     $id_kategori        = $this->input->post('id_kategori');

    //     $foto = $_FILES['foto'];
    //     if ($foto = '') {
    //     } else {
    //         $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
    //         $config['max_size']         = '2048';
    //         $config['upload_path']      = './assets/img/pengetahuan/';
    //         $this->load->library('upload', $config);
    //         if ($this->upload->do_upload('foto')) {
    //             $foto   = $this->upload->data('file_name');
    //             $this->db->set('foto', $foto);
    //         } else {
    //             $this->db->set('judul', $judul);
    //             $this->db->set('isi_pengetahuan', $isi_pengetahuan);
    //             $this->db->set('id_kategori', $id_kategori);
    //             $this->db->where('id_pengetahuan', $id_pengetahuan);
    //             $this->db->update('pengetahuan');
    //             $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //             redirect('Petugas/pengetahuan');
    //         }
    //     }


    //     $this->db->set('judul', $judul);
    //     $this->db->set('isi_pengetahuan', $isi_pengetahuan);
    //     $this->db->set('id_kategori', $id_kategori);
    //     $this->db->where('id_pengetahuan', $id_pengetahuan);
    //     $this->db->update('pengetahuan');
    //     $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //     redirect('Petugas/pengetahuan');
    // }

    // public function hapus_pengetahuan($id_pengetahuan)
    // {
    //     $this->db->where('id_pengetahuan', $id_pengetahuan);
    //     $this->db->delete('pengetahuan');
    //     $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //     redirect('Petugas/pengetahuan');
    // }
    // public function tambah_kategori()
    // {
    //     $data = [
    //         'kategori'             => $this->input->post('kategori')
    //     ];

    //     $this->db->insert('pengetahuan_kategori', $data);
    //     $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //     redirect('Petugas/pengetahuan');
    // }

    // public function edit_kategori()
    // {

    //     $id_kategori     = $this->input->post('id_kategori');
    //     $kategori              = $this->input->post('kategori');
    //     $this->db->set('kategori', $kategori);
    //     $this->db->where('id_kategori', $id_kategori);
    //     $this->db->update('pengetahuan_kategori');
    //     $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //     redirect('Petugas/pengetahuan');
    // }

    // public function hapus_kategori($id_kategori)
    // {
    //     $this->db->where('id_kategori', $id_kategori);
    //     $this->db->delete('pengetahuan_kategori');
    //     $this->session->set_flashdata('petugas', 'Success as a petugas.');
    //     redirect('Petugas/pengetahuan');
    // }


    public function kegiatan()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['kode_posyandu'] = $getKode['kode_posyandu'];


        $data['title'] = 'Data kegiatan';
        $data['kegiatan'] = $this->db->get_where('datakegiatan', ['kode_posyandu' => $spesifik_kode])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/kegiatan', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function tambah_kegiatan()
    {
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/img/kegiatan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto   = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto gagal, silahkan cek file yang anda masukan</div>');
                redirect('petugas/kegiatan');
            }
        }
        $data = [
            'kode_posyandu'         => $this->input->post('kode_posyandu'),
            'kegiatan'              => $this->input->post('kegiatan'),
            'isi_kegiatan'          => $this->input->post('isi_kegiatan'),
            'waktu'                 => $this->input->post('waktu'),
            'foto'                  => $foto
        ];

        $this->db->insert('datakegiatan', $data);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('petugas/kegiatan');
    }

    public function edit_kegiatan()
    {

        $id_kegiatan     = $this->input->post('id_kegiatan');
        $kegiatan        = $this->input->post('kegiatan');
        $isi_kegiatan    = $this->input->post('isi_kegiatan');
        $waktu           = $this->input->post('waktu');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/img/kegiatan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto   = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
            } else {
                $this->db->set('kegiatan', $kegiatan);
                $this->db->set('isi_kegiatan', $isi_kegiatan);
                $this->db->set('waktu', $waktu);
                $this->db->where('id_kegiatan', $id_kegiatan);
                $this->db->update('datakegiatan');
                $this->session->set_flashdata('petugas', 'Success as a petugas.');
                redirect('Petugas/kegiatan');
            }
        }


        $this->db->set('kegiatan', $kegiatan);
        $this->db->set('isi_kegiatan', $isi_kegiatan);
        $this->db->set('waktu', $waktu);
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('datakegiatan');
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/kegiatan');
    }

    public function hapus_kegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->delete('datakegiatan');
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/kegiatan');
    }
    public function jadwal_posyandu()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['kode_posyandu'] = $getKode['kode_posyandu'];


        $data['title'] = 'Data jadwal_posyandu';
        $data['hari']   = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $spesifik_kode])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/jadwal_posyandu', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function tambah_jadwal_posyandu()
    {
        $data = [
            'kode_posyandu'     => $this->input->post('kode_posyandu'),
            'hari'              => $this->input->post('hari'),
            'jam_buka'          => $this->input->post('jam_buka'),
            'jam_tutup'         => $this->input->post('jam_tutup')
        ];

        $this->db->insert('jadwal_posyandu', $data);
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/jadwal_posyandu');
    }

    public function edit_jadwal_posyandu()
    {

        $id_jadwal     = $this->input->post('id_jadwal');
        $hari          = $this->input->post('hari');
        $jam_buka    = $this->input->post('jam_buka');
        $jam_tutup    = $this->input->post('jam_tutup');

        $this->db->set('hari', $hari);
        $this->db->set('jam_buka', $jam_buka);
        $this->db->set('jam_tutup', $jam_tutup);
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('jadwal_posyandu');
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/jadwal_posyandu');
    }

    public function hapus_jadwal_posyandu($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->delete('jadwal_posyandu');
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
        redirect('Petugas/jadwal_posyandu');
    }

    public function laporan()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $spesifik_kode = $getKode['kode_posyandu'];
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['kode_posyandu'] = $getKode['kode_posyandu'];


        $data['title'] = 'Laporan';
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/index', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_anak()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_anak', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_ibu()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_anak', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_imunisasi()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_imunisasi', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_perkembanganAnak()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_perkembanganAnak', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_jadwal()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_jadwal', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_kegiatan()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_kegiatan', $data);
        $this->load->view('Petugas/template/footer');
    }

    public function laporan_artikel()
    {
        $data['user'] = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['kode_posyandu'] = $data['user']['kode_posyandu'];
        $data['title'] = 'Laporan';
        $data['jadwal_posyandu'] = $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $data['kode_posyandu']])->result_array();
        $this->load->view('Petugas/template/header', $data);
        $this->load->view('Petugas/laporan/laporan_artikel', $data);
        $this->load->view('Petugas/template/footer');
    }


    // CETAKKKKKK

    public function cetak_anak()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataanak'         => $this->DataAnak->printAnak($spesifik_kode)
        ];

        $this->load->view('petugas/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }

    public function cetak_anak_lk()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataanak'         => $this->db->get_where('dataanak', ['kode_posyandu' => $spesifik_kode, 'jk' => 'Laki-laki'])->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_anak_pr()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataanak'         => $this->db->get_where('dataanak', ['kode_posyandu' => $spesifik_kode, 'jk' => 'Perempuan'])->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_anak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }

    public function cetak_wali()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataibu'          => $this->db->get_where('dataibu', ['kode_posyandu' => $spesifik_kode])->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_wali', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_waliAnak()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataibu'          => $this->db->query("SELECT dataibu.nama AS nama_ibu, dataibu.no_telepon, dataibu.alamat, dataibu.nik, dataanak.nik_wali, dataanak.nama AS nama_anak FROM dataibu JOIN dataanak ON dataibu.nik = dataanak.nik_wali WHERE dataibu.kode_posyandu = '$spesifik_kode' ORDER BY dataibu.nama ASC")->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_waliAnak', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    // 
    public function cetak_imun()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataImunisasi' => $this->DataImunisasi->printImunisasi($spesifik_kode)
        ];

        $this->load->view('petugas/laporan/cetak_imun', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_kegiatan()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'kegiatan' => $this->db->get_where('datakegiatan', ['kode_posyandu' => $spesifik_kode])->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_kegiatan', $data);

        $paper_size         = 'A4';
        $orientation        = 'potrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_imunJenis()
    {
        $jenis_imunisasi = $this->input->post('jenis_imunisasi');
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataImunisasi' => $this->db->query("SELECT * FROM dataimunisasi WHERE kode_posyandu='$spesifik_kode' AND jenis_imunisasi = '$jenis_imunisasi' ORDER BY tanggal_imunisasi ASC")->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_imun', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }

    public function cetak_imunBulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataImunisasi' => $this->db->query("SELECT * FROM dataimunisasi WHERE MONTH(tanggal_imunisasi) = '$bulan' AND YEAR(tanggal_imunisasi) = '$tahun' AND kode_posyandu='$spesifik_kode' ORDER BY tanggal_imunisasi ASC")->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_imun', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_imunTanggal()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataImunisasi' => $this->db->query("SELECT * FROM dataimunisasi WHERE tanggal_imunisasi BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND kode_posyandu='$spesifik_kode' ORDER BY tanggal_imunisasi ASC")->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_imun', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }

    public function cetak_pa()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'datakms'          => $this->DataKMS->printKMS($spesifik_kode)
        ];

        $this->load->view('petugas/laporan/cetak_pa', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_jadwal()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'jadwal_posyandu'     => $this->db->get_where('jadwal_posyandu', ['kode_posyandu' => $spesifik_kode])->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_jadwal', $data);

        $paper_size         = 'A4';
        $orientation        = 'portrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
    public function cetak_paTanggal()
    {
        $getKode = $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array();
        $spesifik_kode = $getKode['kode_posyandu'];
        $this->load->library('dompdf_gen');
        $data = [
            'judul'            => 'Laporan',
            'gambar'        => FCPATH . 'assets/img/logo22.png',
            'user'             => $this->db->get_where('dataakun', ['nik' => $this->session->userdata('nik')])->row_array(),
            'dataposyandu'     => $this->db->get_where('dataposyandu', ['kode_posyandu' => $spesifik_kode])->row_array(),
            'dataibu'          => $this->db->query("SELECT dataibu.nama, dataibu.nik, dataanak.nik_wali, dataanak.nama FROM dataibu JOIN dataanak ON dataibu.nik = dataanak.nik_wali WHERE dataibu.kode_posyandu = '$spesifik_kode' ORDER BY dataibu.nama ASC")->result_array()
        ];

        $this->load->view('petugas/laporan/cetak_wali', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        $this->session->set_flashdata('petugas', 'Success as a petugas.');
    }
}
