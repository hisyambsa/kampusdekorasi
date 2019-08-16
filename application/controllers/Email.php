<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('phpmailer/src/PHPMailer');
	}

	public function index()
	{

	}
	public function sendEmail($email,$subject,$message,$attach=NULL)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'serverdekorasi@gmail.com', 
			'smtp_pass' => 'dekorasi24', 
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);


		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('serverdekorasi@gmail.com');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->attach($attach);



		if($this->email->send())
		{
			echo 'send';
		}
		else
		{
			// echo 'failed';
			show_error($this->email->print_debugger());
		}

	}
// show_error($this->email->print_debugger());
	public function send_email() 
	{
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$random_code = $this->input->post('random_code');

		if (isset($email)) {
			$email = $this->input->post('email');
		}else{
			$email = "amailiacahya@gmail.com";
		}
		if (isset($nama)) {
			$nama = $this->input->post('nama');
		}else{
			$nama = "Amai";
		}
		if (isset($random_code)) {
			$random_code = $this->input->post('random_code');
		}else{
			$random_code = "24051996";
		}
		$base_url = base_url(); 
		$subject="Verfication! ";
		$message="
		<p>hi, ".$nama."....</p>
		<p>anda menerima email ini karena email anda terdaftar untuk verifikasi</p>
		<p>silahkan klik link berikut atau abaikan jika anda tidak pernah mendaftar :&nbsp;</p>
		<p>".$base_url."beranda/verify_email/".$random_code."
		<p>Kampus Dekorasi</p>
		<p>Kantor:</p>
		<p>Bojong Gede</p>
		";
		$this->sendEmail($email,$subject,$message);
	}

}
/* End of file email.php */
/* Location: ./application/controllers/email.php */


?>