<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wo_pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wo_pemesanan_model');
        $this->load->library('form_validation');

        $admin = array(
            'judul' => 'BERANDA ADMIN', 
        );
        $this->load->view('inc/link-head-admin',$admin);
        $this->load->view('admin/sidebar');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wo_pemesanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wo_pemesanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wo_pemesanan/index.html';
            $config['first_url'] = base_url() . 'wo_pemesanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wo_pemesanan_model->total_rows($q);
        $wo_pemesanan = $this->Wo_pemesanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wo_pemesanan_data' => $wo_pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('wo_pemesanan/wo_pemesanan_list', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function read($id) 
    {
        $row = $this->Wo_pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemesanan' => $row->id_pemesanan,
		'id_user_pemesanan' => $row->id_user_pemesanan,
		'id_package_pemesanan' => $row->id_package_pemesanan,
		'id_detail_include_pemesanan' => $row->id_detail_include_pemesanan,
		'tanggal_pemesanan' => $row->tanggal_pemesanan,
		'tanggal_booking' => $row->tanggal_booking,
		'total_uang_masuk' => $row->total_uang_masuk,
		'total_uang_bayar' => $row->total_uang_bayar,
		'foto_bukti' => $row->foto_bukti,
		'status' => $row->status,
	    );
            $this->load->view('wo_pemesanan/wo_pemesanan_read', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('wo_pemesanan/create_action'),
	    'id_pemesanan' => set_value('id_pemesanan'),
	    'id_user_pemesanan' => set_value('id_user_pemesanan'),
	    'id_package_pemesanan' => set_value('id_package_pemesanan'),
	    'id_detail_include_pemesanan' => set_value('id_detail_include_pemesanan'),
	    'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
	    'tanggal_booking' => set_value('tanggal_booking'),
	    'total_uang_masuk' => set_value('total_uang_masuk'),
	    'total_uang_bayar' => set_value('total_uang_bayar'),
	    'foto_bukti' => set_value('foto_bukti'),
	    'status' => set_value('status'),
	);
        $this->load->view('wo_pemesanan/wo_pemesanan_form', $data);
        $this->load->view('inc/footer-js-admin');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user_pemesanan' => $this->input->post('id_user_pemesanan',TRUE),
		'id_package_pemesanan' => $this->input->post('id_package_pemesanan',TRUE),
		'id_detail_include_pemesanan' => $this->input->post('id_detail_include_pemesanan',TRUE),
		'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
		'tanggal_booking' => $this->input->post('tanggal_booking',TRUE),
		'total_uang_masuk' => $this->input->post('total_uang_masuk',TRUE),
		'total_uang_bayar' => $this->input->post('total_uang_bayar',TRUE),
		'foto_bukti' => $this->input->post('foto_bukti',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Wo_pemesanan_model->insert($data);
            $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
            redirect(site_url('wo_pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wo_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wo_pemesanan/update_action'),
		'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
		'id_user_pemesanan' => set_value('id_user_pemesanan', $row->id_user_pemesanan),
		'id_package_pemesanan' => set_value('id_package_pemesanan', $row->id_package_pemesanan),
		'id_detail_include_pemesanan' => set_value('id_detail_include_pemesanan', $row->id_detail_include_pemesanan),
		'tanggal_pemesanan' => set_value('tanggal_pemesanan', $row->tanggal_pemesanan),
		'tanggal_booking' => set_value('tanggal_booking', $row->tanggal_booking),
		'total_uang_masuk' => set_value('total_uang_masuk', $row->total_uang_masuk),
		'total_uang_bayar' => set_value('total_uang_bayar', $row->total_uang_bayar),
		'foto_bukti' => set_value('foto_bukti', $row->foto_bukti),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('wo_pemesanan/wo_pemesanan_form', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesanan', TRUE));
        } else {
            $data = array(
		'id_user_pemesanan' => $this->input->post('id_user_pemesanan',TRUE),
		'id_package_pemesanan' => $this->input->post('id_package_pemesanan',TRUE),
		'id_detail_include_pemesanan' => $this->input->post('id_detail_include_pemesanan',TRUE),
		'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
		'tanggal_booking' => $this->input->post('tanggal_booking',TRUE),
		'total_uang_masuk' => $this->input->post('total_uang_masuk',TRUE),
		'total_uang_bayar' => $this->input->post('total_uang_bayar',TRUE),
		'foto_bukti' => $this->input->post('foto_bukti',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Wo_pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);
            $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
            redirect(site_url('wo_pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wo_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Wo_pemesanan_model->delete($id);
            $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
            redirect(site_url('wo_pemesanan'));
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user_pemesanan', 'id user pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_package_pemesanan', 'id package pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_detail_include_pemesanan', 'id detail include pemesanan', 'trim|required');
	$this->form_validation->set_rules('tanggal_pemesanan', 'tanggal pemesanan', 'trim|required');
	$this->form_validation->set_rules('tanggal_booking', 'tanggal booking', 'trim|required');
	$this->form_validation->set_rules('total_uang_masuk', 'total uang masuk', 'trim|required|numeric');
	$this->form_validation->set_rules('total_uang_bayar', 'total uang bayar', 'trim|required|numeric');
	$this->form_validation->set_rules('foto_bukti', 'foto bukti', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wo_pemesanan.php */
/* Location: ./application/controllers/Wo_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated : 2019-06-04 05:59:24 */
