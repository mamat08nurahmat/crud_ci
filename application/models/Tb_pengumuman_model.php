<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_pengumuman_model extends CI_Model
{

    public $table = 'tb_pengumuman';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,judul,slug,isi,created_at,updated_at');
        $this->datatables->from('tb_pengumuman');
        //add this line for join
        //$this->datatables->join('table2', 'tb_pengumuman.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tb_pengumuman/read/$1'),'Read')." | ".anchor(site_url('tb_pengumuman/update/$1'),'Update')." | ".anchor(site_url('tb_pengumuman/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
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
        $this->db->like('id', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('slug', $q);
	$this->db->or_like('isi', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('slug', $q);
	$this->db->or_like('isi', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
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

/* End of file Tb_pengumuman_model.php */
/* Location: ./application/models/Tb_pengumuman_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-11 09:43:30 */
/* http://harviacode.com */