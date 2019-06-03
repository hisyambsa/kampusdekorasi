<?php 
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyam.ismul.com ......... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
            
    }

    function ambiltempatupload($tempat,$folder='',$namaFile='')
    {


// $config['upload_path'] = ''.'uploads/data_karyawan/foto_karyawan'.'/';
        $config['upload_path'] = 'uploads/'.$folder.'/';
        $config['allowed_types']= '|jpg|png|jpeg'; 
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;//untuk menghilangkan karakter spasi
        $config['overwrite'] = TRUE;//untuk mengoverwrite
        if ($namaFile != '') {
           $config['file_name'] = $namaFile;
       }

       $this->load->library('upload', $config);    
       if ( ! $this->upload->do_upload($tempat)){
        $error = array('error' => $this->upload->display_errors());
        return $error;
    }
    else{
        $tempatfile = array('upload_data' => $this->upload->data());
        $namatempatfile = $tempatfile['upload_data']['file_name'];
        $simpan['tempatfile'] = $namatempatfile; 
        return $simpan['tempatfile'];
    }
}
}

/* End of file Upload_model.php */
/* Location: ./application/models/Upload_model.php */