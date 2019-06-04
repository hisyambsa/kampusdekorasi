<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Wo_admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('wo_admin_model');
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
      $config['base_url'] = base_url() . 'wo_admin/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'wo_admin/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'wo_admin/index.html';
      $config['first_url'] = base_url() . 'wo_admin/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->wo_admin_model->total_rows($q);
    $wo_admin = $this->wo_admin_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'wo_admin_data' => $wo_admin,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
    );

    $this->load->view('wo_admin/admin_list', $data);
    $this->load->view('inc/footer-js-admin');
    $this->load->view('inc/function-js-admin');

  }

  public function read($id) 
  {
    $id = decrypt_url($id);

    $row = $this->wo_admin_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_admin' => $row->id_admin,
        'username' => $row->username,
        'nama' => $row->nama,
        'password' => $row->password,
        'created' => $row->created,
        'last_login' => $row->last_login,
        'id_akses' => $row->id_akses,
        'nama_akses' => $row->nama_akses,
      );

      $this->load->view('wo_admin/admin_read', $data);
      $this->load->view('inc/footer-js-admin');
    } else {
      show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
    }
  }

  public function create($dataAksesId=null) 
  {
    $this->load->model('wo_akses_model');
    $data_akses = $this->wo_akses_model->get_limit_data('100','', ''); 
    $data = array(
      'button' => 'Buat',
      'action' => site_url('wo_admin/create_action'),
      'id_admin' => set_value('id_admin'),
      'username' => set_value('username'),
      'nama' => set_value('nama'),
      'password' => set_value('password'),
      're_password' => set_value(''),
      'password_baru' => set_value(''),
      'created' => set_value('created'),
      'last_login' => set_value('last_login'),
      'id_akses' => set_value('id_akses'),
      'data_akses_data' => $data_akses,
      'dataAksesId' => $dataAksesId,
    );
    $this->load->view('wo_admin/admin_form', $data);
    $this->load->view('inc/footer-js-admin');
  }

  public function create_action() 
  {
    $this->_rules(); 
    if ($this->form_validation->run() == FALSE) {
      $this->create($this->input->post('id_akses', TRUE));
    } else {
      $data = array(
        'username' => $this->input->post('username',TRUE),
        'nama' => $this->input->post('nama',TRUE),
        'password' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
        'created' => $this->input->post('created',TRUE),
        'last_login' => $this->input->post('last_login',TRUE),
        'id_akses' => $this->input->post('id_akses',TRUE),
      );

      $this->wo_admin_model->insert($data);
      $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
      redirect(site_url('wo_admin'));
    }
  }

  public function update($id,$dataAksesId=null) 
  {
   $id =  decrypt_url($id);

   $this->load->model('wo_akses_model');
   $data_akses = $this->wo_akses_model->get_all(); 

   if (isset($dataAksesId)) {
    $ambil_dataAksesId = $this->wo_akses_model->get_by_id($dataAksesId);
   }else{
     $row = $this->wo_admin_model->get_by_id($id);
     $data = $this->wo_admin_model->get_by_id($row->id_akses);
     $ambil_dataAksesId = $this->wo_akses_model->get_by_id($data->id_akses);
   }
    $row = $this->wo_admin_model->get_by_id($id);

     if ($row) {
      $data = array(
        'button' => 'Ubah',
        'action' => site_url('wo_admin/update_action'),
        'id_admin' => set_value('id_admin', $row->id_admin),
        'username' => set_value('username', $row->username),
        'nama' => set_value('nama', $row->nama),
        'password' => set_value(''),
        're_password' => set_value(''),
        'password_baru' => set_value(''),
        'created' => set_value('created', $row->created),
        'last_login' => set_value('last_login', $row->last_login),
        'id_akses' => set_value('id_akses', $row->id_akses),
        'nama_akses' => set_value('nama_akses', $row->nama_akses),
        'data_akses_data' => $data_akses,
        'dataAksesId' => $ambil_dataAksesId->id_akses,
      );
      $this->load->view('wo_admin/admin_form', $data);
      $this->load->view('inc/footer-js-admin');
      $this->load->view('inc/function-js-admin');
      }else {
        show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
      }
  }

  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update(encrypt_url($this->input->post('id_admin', TRUE)),$this->input->post('id_akses', TRUE));
    } else {
      $data = array(
        'username' => $this->input->post('username',TRUE),
        'nama' => $this->input->post('nama',TRUE),
        'password' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
        'created' => $this->input->post('created',TRUE),
        'last_login' => $this->input->post('last_login',TRUE),
        'id_akses' => $this->input->post('id_akses',TRUE),
      );
      
      $this->wo_admin_model->update($this->input->post('id_admin', TRUE), $data);
      $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
      redirect(site_url('wo_admin'));
    }
  }

  public function delete($id) 
  {
    $id =  decrypt_url($id);

    $row = $this->wo_admin_model->get_by_id($id);
    if ($row) {
      $this->wo_admin_model->delete($id);
      $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
      redirect(site_url('wo_admin'));
    } else {
      show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
    }
  }

  public function _rules() 
  {
   $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]|max_length[32]');
   $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[6]|max_length[64]');
   $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[32]');
   $this->form_validation->set_rules('re_password', 're_password', 'trim|required|matches[password]');
   $this->form_validation->set_rules('id_akses', 'id_akses', 'trim|required');
   $this->form_validation->set_rules('id_admin', 'id_admin', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}

/* End of file wo_admin.php */
/* Location: ./application/controllers/wo_admin.php */
/* Please DO NOT modify this information : */
/* Generated by HISYAM 2018-11-03 16:07:17 */
/* http://hisyam.ismul.com */