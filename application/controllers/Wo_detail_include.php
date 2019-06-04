<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wo_detail_include extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wo_detail_include_model');
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
            $config['base_url'] = base_url() . 'wo_detail_include/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wo_detail_include/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wo_detail_include/index.html';
            $config['first_url'] = base_url() . 'wo_detail_include/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wo_detail_include_model->total_rows($q);
        $wo_detail_include = $this->Wo_detail_include_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wo_detail_include_data' => $wo_detail_include,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('wo_detail_include/wo_detail_include_list', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function read($id) 
    {
        $row = $this->Wo_detail_include_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detail_include' => $row->id_detail_include,
		'id_detail_include_pemesanan' => $row->id_detail_include_pemesanan,
		'id_detail_include_include' => $row->id_detail_include_include,
		'jumlah' => $row->jumlah,
		'harga_total' => $row->harga_total,
	    );
            $this->load->view('wo_detail_include/wo_detail_include_read', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('wo_detail_include/create_action'),
	    'id_detail_include' => set_value('id_detail_include'),
	    'id_detail_include_pemesanan' => set_value('id_detail_include_pemesanan'),
	    'id_detail_include_include' => set_value('id_detail_include_include'),
	    'jumlah' => set_value('jumlah'),
	    'harga_total' => set_value('harga_total'),
	);
        $this->load->view('wo_detail_include/wo_detail_include_form', $data);
        $this->load->view('inc/footer-js-admin');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_detail_include_pemesanan' => $this->input->post('id_detail_include_pemesanan',TRUE),
		'id_detail_include_include' => $this->input->post('id_detail_include_include',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_total' => $this->input->post('harga_total',TRUE),
	    );

            $this->Wo_detail_include_model->insert($data);
            $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
            redirect(site_url('wo_detail_include'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wo_detail_include_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wo_detail_include/update_action'),
		'id_detail_include' => set_value('id_detail_include', $row->id_detail_include),
		'id_detail_include_pemesanan' => set_value('id_detail_include_pemesanan', $row->id_detail_include_pemesanan),
		'id_detail_include_include' => set_value('id_detail_include_include', $row->id_detail_include_include),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'harga_total' => set_value('harga_total', $row->harga_total),
	    );
            $this->load->view('wo_detail_include/wo_detail_include_form', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail_include', TRUE));
        } else {
            $data = array(
		'id_detail_include_pemesanan' => $this->input->post('id_detail_include_pemesanan',TRUE),
		'id_detail_include_include' => $this->input->post('id_detail_include_include',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_total' => $this->input->post('harga_total',TRUE),
	    );

            $this->Wo_detail_include_model->update($this->input->post('id_detail_include', TRUE), $data);
            $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
            redirect(site_url('wo_detail_include'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wo_detail_include_model->get_by_id($id);

        if ($row) {
            $this->Wo_detail_include_model->delete($id);
            $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
            redirect(site_url('wo_detail_include'));
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_detail_include_pemesanan', 'id detail include pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_detail_include_include', 'id detail include include', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('harga_total', 'harga total', 'trim|required|numeric');

	$this->form_validation->set_rules('id_detail_include', 'id_detail_include', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wo_detail_include.php */
/* Location: ./application/controllers/Wo_detail_include.php */
/* Please DO NOT modify this information : */
/* Generated : 2019-06-04 05:59:33 */
