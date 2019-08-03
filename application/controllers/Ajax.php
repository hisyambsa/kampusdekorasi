<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller {

  public function cekPasswordAdmin()
  {
    $this->load->model('login_model');
    $user       = 'admin';
    $password   = $this->input->post('pass');
    $loginadmin = $this->login_model->loginadmin($user, $password);

    if ($loginadmin) {
      echo "true";
    }else{
      echo "false";
    }
  }

  public function insertPemesanan($value='')
  {

    $this->load->model('Wo_pemesanan_model');

    
    $data_terakhir = $this->Wo_pemesanan_model->get_limit_data(1);
    if ($data_terakhir) {

      $data_terakhir_pemesanan = $data_terakhir[0]->id_pemesanan+1;
    }else{
      $data_terakhir_pemesanan = 1;
    }

    $this->load->model('Upload_model');
    $foto_bukti = 'foto_bukti';
    $foto_bukti = $this->Upload_model->ambiltempatupload($foto_bukti,'bukti',$data_terakhir_pemesanan.'_'.$this->input->post('tanggal_pemesanan',TRUE));


    if (is_array($foto_bukti)) {
      echo($foto_bukti['error']);
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


      $data_filter = array_filter($_POST);
      $data_post = array_keys($data_filter);

      $data_cek_pesan = array();
      $start_data = 0;
      foreach ($data_post as $key) {
        if ($start_data > 7) {
          $data_key = substr($key, 8);
          array_push($data_cek_pesan, $data_key);
        }
        $start_data++;
      }




      $data_cek_jumlah = array();
      $start_data = 0;
      foreach ($data_filter as $key) {
        if ($start_data > 7) {
          // $data_key = substr($key, 8);
          array_push($data_cek_jumlah, $key);
        }
        $start_data++;
      }




      // var_dump($data_cek_pesan);
      // var_dump($data_cek_jumlah);

      $i=0;
      foreach ($data_cek_pesan as $key) {


        $this->load->model('Wo_include_model');
        $this->load->model('Wo_detail_include_model');
        $row = $this->Wo_include_model->get_by_id($data_cek_pesan[$i]);



        $data_include = array(
          'id_detail_include_pemesanan' => $data_terakhir_pemesanan,
          'id_detail_include_include' => $data_cek_pesan[$i],
          'jumlah' => $data_cek_jumlah[$i],
          'harga_total' => $row->harga_include * $data_cek_jumlah[$i],
        );
        $i++;

        $this->Wo_detail_include_model->insert($data_include);
      }


      $this->session->set_flashdata('pesan', 'Berhasil melakukan Pemesanan');
      echo "berhasil";


    }
  }


}
/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */