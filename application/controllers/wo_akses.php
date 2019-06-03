<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyam.ismul.com ......... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/

class wo_akses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('wo_Akses_model');
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
            $config['base_url'] = base_url() . 'wo_akses/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wo_akses/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wo_akses/index.html';
            $config['first_url'] = base_url() . 'wo_akses/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->wo_Akses_model->total_rows($q);
        $wo_akses = $this->wo_Akses_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wo_akses_data' => $wo_akses,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('wo_akses/akses_list', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function read($id) 
    {
        $row = $this->wo_Akses_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_akses' => $row->id_akses,
              'nama_akses' => $row->nama_akses,
              'grup' => $row->grup,
          );
            $this->load->view('wo_akses/akses_read', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('wo_akses/create_action'),
            'id_akses' => set_value('id_akses'),
            'nama_akses' => set_value('nama_akses'),
            'grup' => set_value('grup'),
        );
        $this->load->view('wo_akses/akses_form', $data);
        $this->load->view('inc/footer-js-admin');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_akses' => $this->input->post('nama_akses',TRUE),
              'grup' => $this->input->post('grup',TRUE),
          );

            $this->wo_Akses_model->insert($data);
            $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
            redirect(site_url('wo_akses'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->wo_Akses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wo_akses/update_action'),
                'id_akses' => set_value('id_akses', $row->id_akses),
                'nama_akses' => set_value('nama_akses', $row->nama_akses),
                'grup' => set_value('grup', $row->grup),
            );
            $this->load->view('wo_akses/akses_form', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update(encrypt_url($this->input->post('id_akses', TRUE)));
        } else {
            $data = array(
              'nama_akses' => $this->input->post('nama_akses',TRUE),
              'grup' => $this->input->post('grup',TRUE),
          );
            $this->wo_Akses_model->update($this->input->post('id_akses', TRUE), $data);
            $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
            redirect(site_url('wo_akses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->wo_Akses_model->get_by_id($id);

        if ($row) {
            $this->wo_Akses_model->delete($id);
            $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
            redirect(site_url('wo_akses'));
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama_akses', 'nama akses', 'trim|required');
       $this->form_validation->set_rules('grup', 'grup', 'trim|required');

       $this->form_validation->set_rules('id_akses', 'id_akses', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}

/* End of file wo_Akses.php */
/* Location: ./application/controllers/wo_Akses.php */
/* Please DO NOT modify this information : */
/* Generated by HISYAM 2018-11-03 14:57:18 */
/* http://hisyam.ismul.com */