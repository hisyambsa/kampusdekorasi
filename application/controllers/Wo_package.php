<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Wo_package extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wo_package_model');
        $this->load->library('form_validation');

        $admin = array(
            'judul' => 'WO - Package', 
        );
        $this->load->view('inc/link-head-admin',$admin);
        $this->load->view('admin/sidebar');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wo_package/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wo_package/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wo_package/index.html';
            $config['first_url'] = base_url() . 'wo_package/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wo_package_model->total_rows($q);
        $wo_package = $this->Wo_package_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wo_package_data' => $wo_package,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('wo_package/wo_package_list', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function read($id) 
    {
        $row = $this->Wo_package_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_package' => $row->id_package,
              'nama_package' => $row->nama_package,
              'jenis_package' => $row->jenis_package,
              'detail_package' => $row->detail_package,
              'harga_package' => $row->harga_package,
              'foto_package' => $row->foto_package,
          );
            $this->load->view('wo_package/wo_package_read', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');
        }
    }

    public function create($foto = '') 
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('wo_package/create_action'),
            'id_package' => set_value('id_package'),
            'nama_package' => set_value('nama_package'),
            'jenis_package' => set_value('jenis_package'),
            'detail_package' => set_value('detail_package'),
            'harga_package' => set_value('harga_package'),
            'foto_package' => set_value('foto_package'),
            'foto' => $foto,
        );
        $this->load->view('wo_package/wo_package_form', $data);
        $this->load->view('inc/footer-js-admin');
        $this->load->view('_adds-on/upload');
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('nama_package', 'nama package', 'trim|required|is_unique[package.nama_package]');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create('- Upload kembali');
        } else {
            $this->load->model('Upload_model');
            $foto_package = 'foto_package';
            $foto_package = $this->Upload_model->ambiltempatupload($foto_package,'package',$this->input->post('nama_package',TRUE));

            if (is_array($foto_package)) {
                $this->create($foto_package['error']);
            }else{
                $data = array(
                  'nama_package' => $this->input->post('nama_package',TRUE),
                  'jenis_package' => $this->input->post('jenis_package',TRUE),
                  'detail_package' => $this->input->post('detail_package',TRUE),
                  'harga_package' => $this->input->post('harga_package',TRUE),
                  'foto_package' => $foto_package,
              );

                $this->Wo_package_model->insert($data);
                $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
                redirect(site_url('wo_package'));
            }
        }
    }
    
    public function update($id,$foto = '') 
    {
        $row = $this->Wo_package_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wo_package/update_action'),
                'id_package' => set_value('id_package', $row->id_package),
                'nama_package' => set_value('nama_package', $row->nama_package),
                'jenis_package' => set_value('jenis_package', $row->jenis_package),
                'detail_package' => set_value('detail_package', $row->detail_package),
                'harga_package' => set_value('harga_package', $row->harga_package),
                'foto_package' => set_value('foto_package', $row->foto_package),
                'foto' => $foto
            );
            $this->load->view('wo_package/wo_package_form', $data);
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
            $this->update($this->input->post('id_package', TRUE),'- Upload kembali');
        } else {
            $this->load->model('Upload_model');
            $foto_package = 'foto_package';
            $foto_package = $this->Upload_model->ambiltempatupload($foto_package,'package',$this->input->post('nama_package',TRUE));
            if (is_array($foto_package)) {
                $this->update($this->input->post('id_package', TRUE),$foto_package['error']);
            }else{        
                $data = array(
                  'nama_package' => $this->input->post('nama_package',TRUE),
                  'jenis_package' => $this->input->post('jenis_package',TRUE),
                  'detail_package' => $this->input->post('detail_package',TRUE),
                  'harga_package' => $this->input->post('harga_package',TRUE),
                  'foto_package' => $foto_package,
              );

                $this->Wo_package_model->update($this->input->post('id_package', TRUE), $data);
                $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
                redirect(site_url('wo_package'));
            }
        }
    }

    public function delete($id) 
    {
        $row = $this->Wo_package_model->get_by_id($id);

        if ($row) {
            $this->Wo_package_model->delete($id);
            $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
            redirect(site_url('wo_package'));
        } else {
            show_error('Data tidak ditemukan atau hilang, hubungi administrator <br> <a href="javascript: history.go(-1)"> kembali ke ke halaman sebelumnya </a>');        }
        }

        public function _rules() 
        {
           $this->form_validation->set_rules('detail_package', 'detail package', 'trim|required');
           $this->form_validation->set_rules('harga_package', 'harga package', 'trim|required|numeric');
           $this->form_validation->set_rules('foto_package', 'foto package', 'trim');

           $this->form_validation->set_rules('id_package', 'id_package', 'trim');
           $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
       }

   }

   /* End of file Wo_package.php */
   /* Location: ./application/controllers/Wo_package.php */
   /* Please DO NOT modify this information : */
   /* Generated : 2019-06-04 05:59:20 */
