<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('wo_admin_model');
		$this->load->library('form_validation');


		$admin = array(
			'judul' => 'BERANDA ADMIN', 
		);
		// $this->load->view('inc/link-head-admin',$admin);
		// $this->load->view('admin/sidebar');
	}

	public function index()
	{
		$data = array(
			'judul' => 'Login WO Dekokrasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/login');
		$this->load->view('inc/footer-js-admin');
	}
	public function auth()
	{
		$this->load->model('login_model');
		$user       = $this->input->post('username');
		$password   = $this->input->post('password');
		$loginAdmin = $this->login_model->loginAdmin($this->input->post('username'), $this->input->post('password'));
		$ambilDataLogin   = $this->login_model->data_loginAdmin($this->input->post('username'));

		// $login = $this->login_model->login($this->input->post('username'), $this->input->post('password'));
		// $ambilData   = $this->login_model->data_login($this->input->post('username'));
		$login = false;
		$ambildata = array('' => '', );

		if ($loginAdmin) {
			date_default_timezone_set("Asia/Bangkok");
			$updateLogin = array(
				'last_login' => date("Y-m-d H:i:s"),
			);
			$coba = $this->wo_admin_model->update($ambilDataLogin->id_admin, $updateLogin);

			$data = array(
				'id_admin' => $ambilDataLogin->id_admin,
				'username' => $ambilDataLogin->username,
				'akses' => $ambilDataLogin->id_akses,
			);
			$this->session->set_userdata($data);

			redirect('admin','refresh');
		}elseif ($login) {
			$data = array(
				'id_user' => $ambilData->id_pegawai,
				'nik' => $ambilData->NIK,
				'username' => $ambilData->nama,
				'akses' => '0',
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('pesan', 'Berhasil Masuk');
			redirect('admin','refresh');
		}else {
			$this->session->set_flashdata('pesan', 'gagal Masuk');
			redirect('login','refresh');
			// redirect(site_url('wo_admin'));
		}
	}
	public function beranda()
	{
		if ($this->session->userdata('akses')==0) {
			$this->load->view('admin/berandaPegawai');
		}elseif ($this->session->userdata('akses')==2) {
			$this->load->view('admin/beranda');
		}
		$this->load->view('inc/footer-js-admin');
	}


	public function logout()
	{
		$this->session->sess_destroy();	
		redirect('beranda','refresh');
	}
		public function logoutAdmin()
	{
		$this->session->sess_destroy();	
		redirect('login','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */