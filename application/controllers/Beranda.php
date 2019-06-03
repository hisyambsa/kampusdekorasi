<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'judul' => 'Wo Dekorasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');
		$this->load->view('user/beranda');
		$this->load->view('inc/footer-js-admin');
		
		
	}
	
	public function package()
	{
		$data = array(
			'judul' => 'Wo Dekorasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');
		$this->load->view('user/package');
		$this->load->view('inc/footer-js-admin');
	}

	public function include()
	{
		$data = array(
			'judul' => 'Wo Dekorasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');
		$this->load->view('user/include');
		$this->load->view('inc/footer-js-admin');
	}
	public function syarat_ketentuan()
	{
		$data = array(
			'judul' => 'Wo Dekorasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');
		$this->load->view('user/syarat_ketentuan');
		$this->load->view('inc/footer-js-admin');
	}
		public function pendaftaran()
	{
		$data = array(
			'judul' => 'Wo Dekorasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');
		$this->load->view('user/pendaftaran');
		$this->load->view('inc/footer-js-admin');
	}

	public function loginAdmin($value='')
	{
		# code...
	}
	
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */