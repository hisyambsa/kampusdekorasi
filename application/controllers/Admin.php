<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'judul' => 'ADMIN KAMPUS DEKORASI', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/beranda');
		$this->load->view('inc/footer-js-admin');
		$this->load->view('_adds-on/carousel-3d.php');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */