<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$admin = array( 
			'judul' => 'BERANDA ADMIN', 
		);
		$this->load->view('inc/link-head-admin',$admin); 
		$this->load->view('admin/sidebar');

		$this->load->view('wo_laporan/dashboard');




		$this->load->view('inc/footer-js-admin');
		$this->load->view('inc/function-js-admin-baru');
	}

	public function tampilLaporan()
	{
		$admin = array(
			'judul' => 'BERANDA ADMIN', 
		);
		$this->load->view('inc/link-head-admin',$admin);
		$this->load->view('admin/sidebar');

		$this->load->model('Wo_pemesanan_model');


		$namaLaporan = $this->input->post('pilihLaporan');
		$tanggalAwal = $this->input->post('tanggalAwal');
		$tanggalAkhir = $this->input->post('tanggalAkhir');

		$dateBegin=date_create($tanggalAwal);
		$dateBegin = date_format($dateBegin,"d F Y");

		$datefinish=date_create($tanggalAkhir);
		$datefinish = date_format($datefinish,"d F Y");



		$wo_pemesanan = $this->Wo_pemesanan_model->get_limit_data_laporan(0,$tanggalAwal,$tanggalAkhir,'tanggal_'.$namaLaporan);
		$config['total_rows'] = $this->Wo_pemesanan_model->total_rows_laporan($tanggalAwal,$tanggalAkhir,'tanggal_'.$namaLaporan);

		$data = array(
			'namaLaporan' => $namaLaporan,
			'tanggalAwal' => $dateBegin,
			'tanggalAkhir' => $datefinish,
			'dataTanggalAwal' => $tanggalAwal,
			'dataTanggalAkhir' => $tanggalAkhir,

			'wo_pemesanan_data' => $wo_pemesanan,
			'total_rows' => $config['total_rows'],
			'start' => 0,

		);
		$this->load->view('wo_laporan/tampilan_laporan', $data);

		$this->load->view('inc/footer-js-admin');
	}
	public function cetakLaporan($namaLaporan,$tanggalAwal,$tanggalAkhir)
	{
		$this->load->view('print/tempelateHeader');



		$this->load->model('Wo_pemesanan_model');


		$dateBegin=date_create($tanggalAwal);
		$dateBegin = date_format($dateBegin,"d F Y");

		$datefinish=date_create($tanggalAkhir);
		$datefinish = date_format($datefinish,"d F Y");



		$wo_pemesanan = $this->Wo_pemesanan_model->get_limit_data_laporan(0,$tanggalAwal,$tanggalAkhir,'tanggal_'.$namaLaporan);
		$config['total_rows'] = $this->Wo_pemesanan_model->total_rows_laporan($tanggalAwal,$tanggalAkhir,'tanggal_'.$namaLaporan);


		$data = array(
			'namaLaporan' => $namaLaporan,
			'tanggalAwal' => $dateBegin,
			'tanggalAkhir' => $datefinish,

			'wo_pemesanan_data' => $wo_pemesanan,
			'total_rows' => $config['total_rows'],
			'start' => 0,

		);
		$this->load->view('wo_laporan/tampilan_cetak', $data);







		$this->load->view('print/tempelateFooter');
	}


}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */