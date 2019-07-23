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


}
/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */