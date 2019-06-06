<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Wo_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wo_user_model');
        $this->load->library('form_validation');

        $admin = array(
            'judul' => 'WO - User', 
        );
        $this->load->view('inc/link-head-admin',$admin);
        $this->load->view('admin/sidebar');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wo_user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wo_user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wo_user/index.html';
            $config['first_url'] = base_url() . 'wo_user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wo_user_model->total_rows($q);
        $wo_user = $this->Wo_user_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wo_user_data' => $wo_user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('wo_user/wo_user_list', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function read($id) 
    {
        $row = $this->Wo_user_model->get_by_id($id);
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
            $this->load->view('wo_user/wo_user_read', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }

    public function create($foto = '') 
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('wo_user/create_action'),
            'id_user' => set_value('id_user'),
            'nama_user' => set_value('nama_user'),
            'tempat_lahir' => set_value('tempat_lahir'),
            'tanggal_lahir' => set_value('tanggal_lahir'),
            'alamat' => set_value('alamat'),
            'hp' => set_value('hp'),
            'foto_identitas' => set_value('foto_identitas'),
            'foto' => $foto,
        );
        $this->load->view('wo_user/wo_user_form', $data);
        $this->load->view('inc/footer-js-admin');
        $this->load->view('_adds-on/upload');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create('- Upload kembali');
        } else {
            $this->load->model('Upload_model');
            $foto_identitas = 'foto_identitas';
            $foto_identitas = $this->Upload_model->ambiltempatupload($foto_identitas,'identitas',$this->input->post('nama_user',TRUE).'_'.$this->input->post('hp', TRUE));

            if (is_array($foto_identitas)) {
                $this->create($foto_identitas['error']);
            }else{
                $data = array(
                  'nama_user' => $this->input->post('nama_user',TRUE),
                  'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                  'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                  'alamat' => $this->input->post('alamat',TRUE),
                  'hp' => $this->input->post('hp',TRUE),
                  'foto_identitas' => $foto_identitas,
              );
                $this->Wo_user_model->insert($data);
                $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
                redirect(site_url('wo_user'));
            }
        }
    }

    public function update($id,$foto = '') 
    {
        $row = $this->Wo_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wo_user/update_action'),
                'id_user' => set_value('id_user', $row->id_user),
                'nama_user' => set_value('nama_user', $row->nama_user),
                'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
                'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
                'alamat' => set_value('alamat', $row->alamat),
                'hp' => set_value('hp', $row->hp),
                'foto_identitas' => set_value('foto_identitas', $row->foto_identitas),
                'foto' => $foto
            );
            $this->load->view('wo_user/wo_user_form', $data);
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
            $this->update($this->input->post('id_user', TRUE),'- Upload kembali');
        } else {
            $this->load->model('Upload_model');
            $foto_identitas = 'foto_identitas';
            $foto_identitas = $this->Upload_model->ambiltempatupload($foto_identitas,'identitas',$this->input->post('nama_user',TRUE).'_'.$this->input->post('hp',TRUE));
            if (is_array($foto_identitas)) {
                $this->update($this->input->post('id_user', TRUE),$foto_identitas['error']);
            }else{ 
                $data = array(
                  'nama_user' => $this->input->post('nama_user',TRUE),
                  'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                  'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                  'alamat' => $this->input->post('alamat',TRUE),
                  'hp' => $this->input->post('hp',TRUE),
                  'foto_identitas' => $foto_identitas,
              );
                $this->Wo_user_model->update($this->input->post('id_user', TRUE), $data);
                $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
                var_dump($foto_identitas);
                redirect(site_url('wo_user'));
            }
        }
    }

    public function delete($id) 
    {
        $row = $this->Wo_user_model->get_by_id($id);

        if ($row) {
            $this->Wo_user_model->delete($id);
            $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
            redirect(site_url('wo_user'));
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');        }
        }

        public function _rules() 
        {
           $this->form_validation->set_rules('nama_user', 'nama user', 'trim|required');
           $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
           $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
           $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
           $this->form_validation->set_rules('hp', 'hp', 'trim|required|numeric');
           $this->form_validation->set_rules('foto_identitas', 'foto_identitas', 'trim');

           $this->form_validation->set_rules('id_user', 'id_user', 'trim');
           $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
       }

   }

   /* End of file Wo_user.php */
   /* Location: ./application/controllers/Wo_user.php */
   /* Please DO NOT modify this information : */
   /* Generated : 2019-06-04 05:59:28 */
