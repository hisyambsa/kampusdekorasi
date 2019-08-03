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
    $this->load->view('inc/function-js-admin');
    $this->load->view('_adds-on/upload');
  }

  public function read($id) 
  {
    $row = $this->Wo_pemesanan_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_pemesanan' => $row->id_pemesanan,
        'id_user_pemesanan' => $row->id_user_pemesanan,
        'id_package_pemesanan' => $row->id_package_pemesanan,

        'nama_user' => $row->nama_user,
        'nama_package' => $row->nama_package,


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

  public function create($foto = '') 
  {
    $this->load->model('Wo_user_model');
    $this->load->model('Wo_package_model');

    $wo_user = $this->Wo_user_model->get_limit_data(999);
    $wo_package = $this->Wo_package_model->get_limit_data(999);


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
      'foto' => $foto,
      'wo_user_data' => $wo_user,
      'wo_package_data' => $wo_package,
    );
    $this->load->view('wo_pemesanan/wo_pemesanan_form', $data);
    $this->load->view('inc/footer-js-admin');
    $this->load->view('_adds-on/upload');
  }

  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create('- Upload kembali');
    } else {

      $data_terakhir = $this->Wo_pemesanan_model->get_limit_data(1);
      $data_terakhir_pemesanan = $data_terakhir[0]->id_pemesanan+1;

      $this->load->model('Upload_model');
      $foto_bukti = 'foto_bukti';
      $foto_bukti = $this->Upload_model->ambiltempatupload($foto_bukti,'bukti',$data_terakhir_pemesanan.'_'.$this->input->post('tanggal_pemesanan',TRUE));


      if (is_array($foto_bukti)) {
        $this->create($foto_bukti['error']);
      }else{
        $data = array(
          'id_user_pemesanan' => $this->input->post('id_user_pemesanan',TRUE),
          'id_package_pemesanan' => $this->input->post('id_package_pemesanan',TRUE),
          'id_detail_include_pemesanan' => $data_terakhir_pemesanan,
          'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
          'tanggal_booking' => $this->input->post('tanggal_booking',TRUE),
          'total_uang_masuk' => $this->input->post('total_uang_masuk',TRUE),
          'total_uang_bayar' => $this->input->post('total_uang_bayar',TRUE),
          'foto_bukti' => $foto_bukti,
          'status' => $this->input->post('status',TRUE),
        );

        $this->Wo_pemesanan_model->insert($data);
        $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
        redirect(site_url('wo_pemesanan'));
      }
    }
  }

  public function update($id,$foto = '') 
  {

    $this->load->model('Wo_user_model');
    $this->load->model('Wo_package_model');

    $wo_user = $this->Wo_user_model->get_limit_data(999, 0, '');
    $wo_package = $this->Wo_package_model->get_limit_data(999, 0, '');

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
        'foto' => $foto,
        'wo_user_data' => $wo_user,
        'wo_package_data' => $wo_package,
      );
      $this->load->view('wo_pemesanan/wo_pemesanan_form', $data);
      $this->load->view('inc/footer-js-admin');
      $this->load->view('_adds-on/upload');
    } else {
      show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
    }
  }

  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id_pemesanan', TRUE),'- Upload kembali');
    } else {

      $data_terakhir = $this->Wo_pemesanan_model->get_limit_data(1);
      $data_terakhir_pemesanan = $data_terakhir[0]->id_pemesanan;

      $this->load->model('Upload_model');
      $foto_bukti = 'foto_bukti';
      $foto_bukti = $this->Upload_model->ambiltempatupload($foto_bukti,'bukti',$data_terakhir_pemesanan.'_'.$this->input->post('tanggal_pemesanan',TRUE));

      if (is_array($foto_bukti)) {
        $this->update($this->input->post('id_include', TRUE),$foto_bukti['error']);
      }else{ 

        $data = array(
          'id_user_pemesanan' => $this->input->post('id_user_pemesanan',TRUE),
          'id_package_pemesanan' => $this->input->post('id_package_pemesanan',TRUE),
          'id_detail_include_pemesanan' => $this->input->post('id_detail_include_pemesanan',TRUE),
          'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
          'tanggal_booking' => $this->input->post('tanggal_booking',TRUE),
          'total_uang_masuk' => $this->input->post('total_uang_masuk',TRUE),
          'total_uang_bayar' => $this->input->post('total_uang_bayar',TRUE),
          'foto_bukti' => $foto_bukti,
          'status' => $this->input->post('status',TRUE),
        );

        $this->Wo_pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);
        $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
        redirect(site_url('wo_pemesanan'));
      }
    }
  }

  public function update_status($status)
  {
    if ($status ==1) {
      $data = array(
        'status' => 2,
      );  
      $this->session->set_flashdata('pesan', 'Berhasil Update Konfirmasi Booking');
    }else if ($status==2) {
      $data = array(
        'status' => 3,
      );
      $this->session->set_flashdata('pesan', 'Berhasil Update Status Pemesanan');
    }else if ($status==3) {
      $data = array(
        'status' => 4,
      );
      $this->session->set_flashdata('pesan', 'Berhasil Update Status Pelunasan');
    }else{
      $this->session->set_flashdata('pesan', 'gagal update status');
    }

    $this->Wo_pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);

    redirect(site_url('wo_pemesanan'));

        // redirect(site_url('wo_pemesanan'));
  }

  public function update_status_user($status)
  {
    if ($status ==1) {
      $data = array(
        'status' => 2,
      );  
      $this->session->set_flashdata('pesan', 'Berhasil Update Konfirmasi Booking');
    }else if ($status==2) {



    $this->load->model('Wo_pemesanan_model');

    
    $data_pemesanan = $this->Wo_pemesanan_model->get_by_id(1);

var_dump($data_pemesanan->foto_bukti);

    $this->load->model('Upload_model');
    $foto_bukti = 'foto_bukti';
    $foto_bukti = $this->Upload_model->ambiltempatupload($foto_bukti,'bukti',$data_pemesanan->foto_bukti);


    if (is_array($foto_bukti)) {
      $this->session->set_flashdata('pesan', 'Gagal Upload File');
    }else{
      $data = array(
        'foto_bukti' => $foto_bukti,
        'status' => 3,
      );
    }

var_dump($data);

    }else if ($status==3) {
      $data = array(
        'status' => 4,
      );
      $this->session->set_flashdata('pesan', 'Berhasil Update Status Pelunasan');
    }else{
      $this->session->set_flashdata('pesan', 'gagal update status');
    }

    $this->Wo_pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);

    // redirect(site_url('beranda/pemesanan'));


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
     // $this->form_validation->set_rules('id_detail_include_pemesanan', 'id detail include pemesanan', 'trim|required');
     $this->form_validation->set_rules('tanggal_pemesanan', 'tanggal pemesanan', 'trim|required');
     $this->form_validation->set_rules('tanggal_booking', 'tanggal booking', 'trim|required');
     $this->form_validation->set_rules('total_uang_masuk', 'total uang masuk', 'trim|required|numeric');
     $this->form_validation->set_rules('total_uang_bayar', 'total uang bayar', 'trim|required|numeric');
     $this->form_validation->set_rules('foto_bukti', 'foto bukti', 'trim');
     $this->form_validation->set_rules('status', 'status', 'trim|required');

     $this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "wo_pemesanan.xls";
    $judul = "wo_pemesanan";
    $tablehead = 0;
    $tablebody = 1;
    $nourut = 1;
        //penulisan header
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=" . $namaFile . "");
    header("Content-Transfer-Encoding: binary ");

    xlsBOF();

    $kolomhead = 0;
    xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Id User Pemesanan");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Package Pemesanan");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Detail Include Pemesanan");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pemesanan");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Booking");
    xlsWriteLabel($tablehead, $kolomhead++, "Total Uang Masuk");
    xlsWriteLabel($tablehead, $kolomhead++, "Total Uang Bayar");
    xlsWriteLabel($tablehead, $kolomhead++, "Foto Bukti");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->Wo_pemesanan_model->get_all() as $data) {
      $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteNumber($tablebody, $kolombody++, $data->id_user_pemesanan);
      xlsWriteNumber($tablebody, $kolombody++, $data->id_package_pemesanan);
      xlsWriteNumber($tablebody, $kolombody++, $data->id_detail_include_pemesanan);
      xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pemesanan);
      xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_booking);
      xlsWriteNumber($tablebody, $kolombody++, $data->total_uang_masuk);
      xlsWriteNumber($tablebody, $kolombody++, $data->total_uang_bayar);
      xlsWriteLabel($tablebody, $kolombody++, $data->foto_bukti);
      xlsWriteNumber($tablebody, $kolombody++, $data->status);

      $tablebody++;
      $nourut++;
    }

    xlsEOF();
    exit();
  }

}

/* End of file Wo_pemesanan.php */
/* Location: ./application/controllers/Wo_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated : 2019-06-04 16:51:26 */
