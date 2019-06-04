<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Wo_detail_include_model extends CI_Model
{

    public $table = 'wo_detail_include';
    public $id = 'id_detail_include';
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
        $this->db->like('id_detail_include', $q);
	$this->db->or_like('id_detail_include_pemesanan', $q);
	$this->db->or_like('id_detail_include_include', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('harga_total', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_detail_include', $q);
	$this->db->or_like('id_detail_include_pemesanan', $q);
	$this->db->or_like('id_detail_include_include', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('harga_total', $q);
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

/* End of file Wo_detail_include_model.php */
/* Location: ./application/models/Wo_detail_include_model.php */
/* Please DO NOT modify this information : */
/* Generated :2019-06-04 05:59:33 */
