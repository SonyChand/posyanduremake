<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("DataAkun");
	}
	public function index()
	{
		$this->load->view('login_admin');
	}

	public function loginKader()
	{
		$this->load->view('login_kader');
	}
	public function loginUser()
	{
		$this->load->view('login_user');
	}
	public function lupapassword()
	{
		$this->load->view('lupapassword');
	}

	public function postLogin()
	{
		if ($this->input->post()) {
			if ($this->DataAkun->doLogin() === '0') {
				$this->session->set_flashdata('admin', 'Success as a admin.');
				redirect('admin');
			} else {
				$this->session->set_tempdata('err', 'User Name / Password salah....!', 3);
				redirect('auth');
			}
		}
		// if($this->input->post('username') === "user" && $this->input->post('password') === "user"){
		// 	$this->session->set_flashdata('user', 'Success as a user.');
		// 	redirect('user');
		// }else if($this->input->post('username') === "admin" && $this->input->post('password') === "admin"){
		// 	$this->session->set_flashdata('admin', 'Success as a admin.');
		// 	redirect('admin');
		// }else if($this->input->post('username') === "petugas" && $this->input->post('password') === "petugas"){
		// 	$this->session->set_flashdata('petugas', 'Success as a petugas.');
		// 	redirect('petugas');
		// }else{
		// 	$this->session->set_flashdata('error', 'Something is wrong.');
		// 	redirect('auth');
		// }
	}

	public function postLogin2()
	{
		if ($this->input->post()) {
			if ($this->DataAkun->doLogin2() === '1') {
				$this->session->set_flashdata('petugas', 'Success as a petugas.');
				redirect('petugas');
			} else {

				$this->session->set_tempdata('err', 'Kode Posyandu / Password Salah....!', 3);
				// $this->session->set_flashdata('error', 'Kode Posyandu / Password Salah....!');
				redirect('auth/loginKader');
			}
		}
	}

	public function postLogin3()
	{
		if ($this->input->post()) {
			if ($this->DataAkun->doLogin3() == '1') {
				$this->session->set_flashdata('user', 'Success as a user.');
				redirect('user');
			} else {

				$this->session->set_tempdata('err', 'ID KMS / Password Salah....!', 3);
				// $this->session->set_flashdata('error', 'Kode Posyandu / Password Salah....!');
				redirect('auth/loginUser');
			}
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('nik');
		$this->session->set_tempdata('err', '<div class="alert alert-success" role="alert">You have been logged out!</div>', 3);
		redirect('auth');
	}
	public function logout_kader()
	{

		$this->session->unset_userdata('nik');
		$this->session->set_tempdata('err', '<div class="alert alert-success" role="alert">You have been logged out!</div>', 3);
		redirect('auth/loginKader');
	}
	public function logout_anak()
	{

		$this->session->unset_userdata('nik');
		$this->session->set_tempdata('err', '<div class="alert alert-success" role="alert">You have been logged out!</div>', 3);
		redirect('auth/loginUser');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'setiawan.agung866@gmail.com',
			'smtp_pass' => 'Jawatengah',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('setiawan.agung866@gmail.com', 'PanKesPos');
		$this->email->to($this->input->post('email'));

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik disini untuk reset password anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}


	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {

			$data['title']	= 'Lupa Password';
			$this->load->view('lupapassword', $data);
		} else {
			$email = $this->input->post('email');
			$dataakun  = $this->db->get_where('dataakun', ['email' => $email])->row_array();
			$dataanak	  = $this->db->get_where('dataanak', ['email' => $email])->row_array();

			if ($dataakun) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password</div>');
				redirect('auth/forgotPassword');
			} elseif ($dataanak) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password</div>');
				redirect('auth/forgotPassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum aktif</div>');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$dataakun  = $this->db->get_where('dataakun', ['email' => $email])->row_array();
		$dataanak  = $this->db->get_where('dataanak', ['email' => $email])->row_array();

		if ($dataakun) {
			$user_token = $this->db->get_where('user_token', ['email' => $email, 'token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changepassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
				redirect('auth/loginKader');
			}
		} elseif ($dataanak) {
			$user_token = $this->db->get_where('user_token', ['email' => $email, 'token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changepassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
				redirect('auth/loginKader');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! email salah</div>');
			redirect('auth');
		}
	}

	public function changepassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', [
			'required' 		=> 'Password tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek'
		]);


		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Ubah Password';
			$this->load->view('changepassword', $data);
		} else {
			$password = $this->input->post('password');
			$email = $this->session->userdata('reset_email');

			$dataakun  = $this->db->get_where('dataakun', ['email' => $email])->row_array();
			$dataanak	  = $this->db->get_where('dataanak', ['email' => $email])->row_array();

			if ($dataakun) {
				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('dataakun');
			} else {
				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('dataanak');
			}

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! Silahkan login!</div>');
			if ($dataakun) {
				redirect('auth/loginKader');
			} else {
				redirect('auth/loginUser');
			}
		}
	}
}
