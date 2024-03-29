<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'judul' => 'KAMPUS DEKORASI', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');
		$this->load->view('user/beranda');
		$this->load->view('inc/footer-js-admin');
	}
	
	public function packageGedung_Aula()
	{
		$this->load->helper('form');
		$data = array(
			'judul' => 'KAMPUS DEKORASI', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');


		$this->load->model('Wo_package_model');

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'wo_package/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'wo_package/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'wo_package/index.html';
			$config['first_url'] = base_url() . 'wo_package/index.html';
		}

		$config['per_page'] = 12;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Wo_package_model->total_rows_gedung($q);
		$wo_package = $this->Wo_package_model->get_limit_data_gedung($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);


		$this->load->model('Wo_user_model');

		$wo_user = $this->Wo_user_model->get_limit_data(999);
    // $wo_package = $this->Wo_package_model->get_limit_data(999);


		$this->load->model('Wo_pemesanan_model');
		$jumlahPemesananHariIni = $this->Wo_pemesanan_model->total_pemesanan_hari_ini();



		$data = array(
			'judulPackage' => 'Daftar Package Gedung / Aula',
			'wo_package_data' => $wo_package,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'jumlahPemesananHariIni'=>$jumlahPemesananHariIni,

// PEMESANANAN
			'button' => 'Buat',
			'action' => site_url('wo_pemesanan/create_action_user'),
			'id_pemesanan' => set_value('id_pemesanan'),
			'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
			'tanggal_booking' => set_value('tanggal_booking'),
			'total_uang_masuk' => set_value('total_uang_masuk'),
			'total_uang_bayar' => set_value('total_uang_bayar'),
			'foto_bukti' => set_value('foto_bukti'),

			'wo_user_data' => $wo_user,
			'wo_package_data' => $wo_package,

		);
		$this->load->model('Wo_user_model');
		$this->load->model('Wo_package_model');





		$this->load->view('user/package', $data);
		$this->load->view('inc/footer-js-admin');
		$this->load->view('inc/function-js-admin');
		$this->load->view('_adds-on/upload');
	}

	public function packageRumahan()
	{

		$this->load->helper('form');

		$data = array(
			'judul' => 'KAMPUS DEKORASI', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');


		$this->load->model('Wo_package_model');
		$this->load->model('Wo_include_model');

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'wo_package/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'wo_package/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'wo_package/index.html';
			$config['first_url'] = base_url() . 'wo_package/index.html';
		}

		$config['per_page'] = 12;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Wo_package_model->total_rows_rumahan($q);
		$wo_package = $this->Wo_package_model->get_limit_data_rumahan($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$this->load->model('Wo_user_model');

		$wo_user = $this->Wo_user_model->get_limit_data(999);
		// $wo_package = $this->Wo_package_model->get_limit_data(999);



		$wo_include = $this->Wo_include_model->get_limit_data(999);


		// $this->load->view('wo_include/wo_include_list', $data1);
		$this->load->model('Wo_pemesanan_model');
		$jumlahPemesananHariIni = $this->Wo_pemesanan_model->total_pemesanan_hari_ini();


		$data = array(
			'judulPackage' => 'Daftar Package Rumahan',
			'wo_package_data' => $wo_package,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'jumlahPemesananHariIni'=>$jumlahPemesananHariIni,

// PEMESANANAN
			'button' => 'Buat',
			'action' => site_url('wo_pemesanan/create_action'),
			'id_pemesanan' => set_value('id_pemesanan'),
			'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
			'tanggal_booking' => set_value('tanggal_booking'),
			'total_uang_masuk' => set_value('total_uang_masuk'),
			'total_uang_bayar' => set_value('total_uang_bayar'),
			'foto_bukti' => set_value('foto_bukti'),

			'wo_user_data' => $wo_user,
			'wo_package_data' => $wo_package,
			'wo_include_data' => $wo_include,

		);
		$this->load->model('Wo_user_model');
		$this->load->model('Wo_package_model');


		$this->load->view('user/package', $data);
		$this->load->view('inc/footer-js-admin');
		$this->load->view('inc/function-js-admin');
		$this->load->view('_adds-on/upload');
	}

	public function include_package()
	{
		$data = array(
			'judul' => 'KAMPUS DEKORASI', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');


		$this->load->model('Wo_include_model');

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'beranda/include_package.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'beranda/include_package.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'beranda/include_package.html';
			$config['first_url'] = base_url() . 'beranda/include_package.html';
		}

		$config['per_page'] = 5;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Wo_include_model->total_rows($q);
		$wo_include = $this->Wo_include_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'judulPackage' => 'Daftar Add On Package Rumahan',
			'wo_include_data' => $wo_include,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);

		$this->load->view('user/include', $data);
		$this->load->view('inc/footer-js-admin');
	}
	public function syarat_ketentuan()
	{
		$data = array(
			'judul' => 'Kampus Dekorasi', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');

		$data = array(
			'judulPackage' => 'Prosedur Pemesanan',
		);

		$this->load->view('user/syarat_ketentuan',$data);
		$this->load->view('inc/footer-js-admin');
	}
	public function pendaftaran($foto='')
	{

		$this->load->helper('form');

		$data = array(
			'judul' => 'KAMPUS DEKORASI', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/nav');

		$data = array(
			'button' => 'Buat',
			'action' => site_url('beranda/pendaftaran_action'),
			'id_user' => set_value('id_user'),
			'nama_user' => set_value('nama_user'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'alamat' => set_value('alamat'),
			'hp' => set_value('hp'),
			'foto_identitas' => set_value('foto_identitas'),
			'foto' => $foto,
			'email' => set_value ('email')
		);

		$this->load->view('user/pendaftaran',$data);
		$this->load->view('inc/footer-js-admin');
		$this->load->view('_adds-on/upload');
	}


	public function pendaftaran_action($foto='')
	{

		$this->load->model('Wo_user_model');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_user', 'nama user', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('hp', 'hp', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[wo_user.email]');
		$this->form_validation->set_rules('foto_identitas', 'foto_identitas', 'trim');

		$this->form_validation->set_rules('id_user', 'id_user', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$angka = range(0,9);
		$shuffle = shuffle($angka);
		$ambilangka = array_rand($angka,6); 
		$angkastring = implode($ambilangka);
		$code = $angkastring;


		// $code = rand('100000','999999');


		if ($this->form_validation->run() == FALSE) {
			$this->pendaftaran('- Upload kembali');
		} else {
			$this->load->model('Upload_model');
			$foto_identitas = 'foto_identitas';
			$foto_identitas = $this->Upload_model->ambiltempatupload($foto_identitas,'identitas',$this->input->post('nama_user',TRUE).'_'.$this->input->post('hp', TRUE));

			if (is_array($foto_identitas)) {
				$this->pendaftaran($foto_identitas['error']);
			}else{
				$md5_code = md5($code);


				$data = array(
					'nama_user' => $this->input->post('nama_user',TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
					'alamat' => $this->input->post('alamat',TRUE),
					'hp' => $this->input->post('hp',TRUE),
					'foto_identitas' => $foto_identitas,
					'email' => $this->input->post('email',TRUE),
					'random_code' => $md5_code,
					'verify' => '1'
				);

				$this->Wo_user_model->insert($data);
				$this->session->set_flashdata('pesan', 'Berhasil melakukan Pendaftaran, silahkan cek email untuk verifikasi');
				// redirect(site_url('beranda'));


				?>



				<script src="<?php echo base_url() ?>assets/node_modules/mdbootstrap/js/mdb-pro.min.js"></script>
				<script src="<?php echo base_url() ?>assets/node_modules/mdbootstrap/js/file-upload.js"></script>  
				<script src="<?php echo base_url() ?>assets/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
				<script src="<?php echo base_url() ?>assets/node_modules/jquery-validation/dist/localization/messages_id.js"></script>
				<script src="<?php echo base_url() ?>assets/node_modules/chart.js/dist/Chart.bundle.js"></script>

				<script src="<?php echo base_url() ?>assets/jquery-ui/jquery-ui.min.js"></script>

				<script>

					let email = '<?php echo $this->input->post('email',TRUE) ?>';
					let nama = '<?php echo $this->input->post('nama_user',TRUE) ?>';
					let random_code = '<?php echo $md5_code ?>';


					$.ajax({
						url: "<?php echo base_url("email/send_email")?>",
            type: "post", // To protect sensitive data
            data: 
            {
            	email: email,
            	nama:nama,
            	random_code:random_code
            },
            success:function(data){
            	if (data ==  'send') {
            		location.href="pindahHalaman";
            	}else if(data == 'failed'){
            		location.href="pindahHalamanGagal";            	
            	}
            },
            error: function() {
            	alert('Gagal Melakukan Ajax');
            }
        });	
		// alert('Error internet');
	</script>



	<?php




}
}
}

public function pindahHalaman()
{
	$this->session->set_flashdata('pesan', 'Berhasil untuk segera melakukan verifikasi');
	redirect(site_url('beranda'));
}

public function pindahHalamanGagal()
{
	$this->session->set_flashdata('pesan', 'Gagal verifikasi Email');

	redirect(site_url('beranda/pendaftaran'));
	
}

public function verify_email($code)
{
$this->load->model('Wo_user_model');
	                $data = array(
                  'verify' => '2',
              );
                $this->Wo_user_model->update_verify($code, $data);	
	$this->session->set_flashdata('pesan', 'Berhasil, EMAIL ANDA SUDAH TERVERIFIKASI');

	redirect(site_url('beranda/pendaftaran'));


}




public function pemesanan($foto='')
{
	$user = $this->session->userdata('id_user');

	if (is_null($user)) {
		$this->session->set_flashdata('pesan', 'Anda Belum Login');
		$this->session->set_flashdata('jenisPesan', 'info');
		redirect('beranda');
	}

	$this->load->helper('form');

	$data = array(
		'judul' => 'KAMPUS DEKORASI', 
	);
	$this->load->view('inc/link-head-admin',$data);
	$this->load->view('user/nav');

	$this->load->model('Wo_pemesanan_model');

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
	$config['total_rows'] = $this->Wo_pemesanan_model->total_rows_pemesanan($q,$user);
	$wo_pemesanan = $this->Wo_pemesanan_model->get_limit_data_pemesanan($config['per_page'], $start, $q, $user);
	$this->load->library('pagination');
	$this->pagination->initialize($config);

	$data = array(
		'wo_pemesanan_data' => $wo_pemesanan,
		'q' => $q,
		'pagination' => $this->pagination->create_links(),
		'total_rows' => $config['total_rows'],
		'start' => $start,
	);

	$this->load->view('user/pemesanan', $data);
	$this->load->view('inc/footer-js-admin');
	$this->load->view('inc/function-js-admin');
	$this->load->view('_adds-on/upload');

}

public function profile()
{
	$data = array(
		'judul' => 'KAMPUS DEKORASI', 
	);
	$this->load->view('inc/link-head-admin',$data);
	$this->load->view('user/nav');

	$this->load->model('Wo_user_model');
	$row = $this->Wo_user_model->get_by_id($this->session->userdata('id_user'));
	if ($row) {
		$data = array(
			'id_user' => $row->id_user,
			'nama_user' => $row->nama_user,
			'tempat_lahir' => $row->tempat_lahir,
			'tanggal_lahir' => $row->tanggal_lahir,
			'alamat' => $row->alamat,
			'hp' => $row->hp,
			'foto_identitas' => $row->foto_identitas,
		);
		$this->load->view('user/profile', $data);
		$this->load->view('inc/footer-js-admin');
	} else {
		show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
	}
}


public function loginAdmin($value='')
{
		# code...
}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */