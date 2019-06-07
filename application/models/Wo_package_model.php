<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Wo_package_model extends CI_Model
{

    public $table = 'wo_package';
    public $id = 'id_package';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_package', $q);
        $this->db->or_like('nama_package', $q);
        $this->db->or_like('jenis_package', $q);
        $this->db->or_like('detail_package', $q);
        $this->db->or_like('harga_package', $q);
        $this->db->or_like('foto_package', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_package', $q);
        $this->db->or_like('nama_package', $q);
        $this->db->or_like('jenis_package', $q);
        $this->db->or_like('detail_package', $q);
        $this->db->or_like('harga_package', $q);
        $this->db->or_like('foto_package', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
        function get_limit_data_gedung($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('jenis_package', '1');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
        function get_limit_data_rumahan($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('jenis_package', '2');
        $this->db->limit($limit, $start);
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

/* End of file Wo_package_model.php */
/* Location: ./application/models/Wo_package_model.php */
/* Please DO NOT modify this information : */
/* Generated :2019-06-04 05:59:20 */
