<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Wo_pemesanan_model extends CI_Model
{

    public $table = 'wo_pemesanan';
    public $id = 'id_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');

        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');

        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pemesanan', $q);
        $this->db->or_like('nama_user', $q);
        $this->db->or_like('nama_package', $q);
        $this->db->or_like('id_detail_include_pemesanan', $q);
        $this->db->or_like('tanggal_pemesanan', $q);
        $this->db->or_like('tanggal_booking', $q);
        $this->db->or_like('total_uang_masuk', $q);
        $this->db->or_like('total_uang_bayar', $q);
        $this->db->or_like('foto_bukti', $q);
        $this->db->or_like('status', $q);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');


        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pemesanan', $q);
        $this->db->or_like('nama_user', $q);
        $this->db->or_like('nama_package', $q);
        $this->db->or_like('id_detail_include_pemesanan', $q);
        $this->db->or_like('tanggal_pemesanan', $q);
        $this->db->or_like('tanggal_booking', $q);
        $this->db->or_like('total_uang_masuk', $q);
        $this->db->or_like('total_uang_bayar', $q);
        $this->db->or_like('foto_bukti', $q);
        $this->db->or_like('status', $q);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get total rows and where
    function total_rows_pemesanan($q = NULL, $user) {
        // $this->db->like('id_pemesanan', $q);
        // $this->db->or_like('nama_user', $q);
        // $this->db->or_like('nama_package', $q);
        // $this->db->or_like('id_detail_include_pemesanan', $q);
        // $this->db->or_like('tanggal_pemesanan', $q);
        // $this->db->or_like('tanggal_booking', $q);
        // $this->db->or_like('total_uang_masuk', $q);
        // $this->db->or_like('total_uang_bayar', $q);
        // $this->db->or_like('foto_bukti', $q);
        // $this->db->or_like('status', $q);

        $this->db->where('user.id_user', $user);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');


        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search and whire
    function get_limit_data_pemesanan($limit, $start = 0, $q = NULL, $user) {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_pemesanan', $q);
        // $this->db->or_like('nama_user', $q);
        // $this->db->or_like('nama_package', $q);
        // $this->db->or_like('id_detail_include_pemesanan', $q);
        // $this->db->or_like('tanggal_pemesanan', $q);
        // $this->db->or_like('tanggal_booking', $q);
        // $this->db->or_like('total_uang_masuk', $q);
        // $this->db->or_like('total_uang_bayar', $q);
        // $this->db->or_like('foto_bukti', $q);
        // $this->db->or_like('status', $q);

        $this->db->where('user.id_user', $user);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows_laporan($first_date, $second_date,$jenisLaporan) {
        $this->db->where($jenisLaporan.'>=', $first_date);
        $this->db->where($jenisLaporan.'<=', $second_date);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');


        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_laporan($limit,$first_date, $second_date,$jenisLaporan) {
        $this->db->order_by($jenisLaporan, $this->order);

        $this->db->where($jenisLaporan.'>=', $first_date);
        $this->db->where($jenisLaporan.'<=', $second_date);

        $this->db->join('user', 'user.id_user = pemesanan.id_user_pemesanan');
        $this->db->join('package', 'package.id_package = pemesanan.id_package_pemesanan');

        $this->db->limit($limit, 0);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Wo_pemesanan_model.php */
/* Location: ./application/models/Wo_pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated :2019-06-04 16:51:26 */
