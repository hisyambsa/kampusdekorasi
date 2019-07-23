<?php 

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $table = 'admin';
	public $table_pegawai = 'user';


//    untuk mengcek jumlah username dan password yang sesuai
	function loginAdmin($username,$password) {

		$this->db->where('username', $username);
        // $this->db->where('password', $password);
		$query =  $this->db->get($this->table);
		// var_dump($query);
		if ($query->num_rows() > 0)
		{
			$user_row = $query->row();
			password_verify($password, $user_row->password);
			if (password_verify($password, $user_row->password)) {
				return true;
			}
		}
		return false;
	}
	function password_verify($password,$hash)
	{
		$cek = password_verify($password, $hash);
		return $cek;
	}
//    untuk mengambil data hasil login
	function data_loginAdmin($username) {
	    // $pass = password_verify($password, $hash);
		$this->db->where('username', $username);
	    // $this->db->where('password', $password);
		return $this->db->get($this->table)->row();
	}

	function login($username,$password) {

		$this->db->where('hp', $username);
		$this->db->where('tanggal_lahir', $password);
		$query =  $this->db->get($this->table_pegawai);
		// var_dump($query);
		if ($query->num_rows() > 0)
		{
			return true;		
		}else{
			return false;	
		}		
	}

	//    untuk mengambil data hasil login
	function data_login($username) {
	    // $pass = password_verify($password, $hash);
		$this->db->where('hp', $username);
		// $this->db->where('tanggal_lahir', $password);
	    // $this->db->where('password', $password);
		return $this->db->get($this->table_pegawai)->row();
	}
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */