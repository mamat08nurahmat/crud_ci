<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_peserta_model extends CI_Model
{

    public $table = 'tb_peserta';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,email,username,password,nisn,nama,nama_panggilan,jenis_kelamin,agama,ket_agama,tempat_lahir,tanggal_lahir,berat_badan,tinggi_badan,golongan_darah,status_anak,anak_ke,jumlah_saudara,tmp_tinggal_dengan,tmp_ket_tinggal_dengan,tmp_alamat,tmp_telepon,tmp_jarak_sekolah,tmp_kendaraan,ort_nama_ayah,ort_pekerjaan_ayah,ort_ket_pekerjaan_ayah,ort_nama_ibu,ort_pekerjaan_ibu,ort_ket_pekerjaan_ibu,ort_alamat,ort_telepon,ort_penghasilan,ska_nama,ska_status,ska_alamat,ska_telepon,ska_kelas,ska_tahun_lulus,ska_no_ijazah,nil_bin_1,nil_bin_2,nil_bin_3,nil_bin_4,nil_bin_5,nil_bin_rata,nil_big_1,nil_big_2,nil_big_3,nil_big_4,nil_big_5,nil_big_rata,nil_mat_1,nil_mat_2,nil_mat_3,nil_mat_4,nil_mat_5,nil_mat_rata,nil_ipa_1,nil_ipa_2,nil_ipa_3,nil_ipa_4,nil_ipa_5,nil_ipa_rata,nil_ips_1,nil_ips_2,nil_ips_3,nil_ips_4,nil_ips_5,nil_ips_rata,status_pendaftaran,status_biodata,status_verifikasi,status_seleksi,created_at,updated_at');
        $this->datatables->from('tb_peserta');
        //add this line for join
        //$this->datatables->join('table2', 'tb_peserta.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tb_peserta/read/$1'),'Read')." | ".anchor(site_url('tb_peserta/update/$1'),'Update')." | ".anchor(site_url('tb_peserta/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
	$this->db->or_like('email', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('nisn', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nama_panggilan', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('ket_agama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('golongan_darah', $q);
	$this->db->or_like('status_anak', $q);
	$this->db->or_like('anak_ke', $q);
	$this->db->or_like('jumlah_saudara', $q);
	$this->db->or_like('tmp_tinggal_dengan', $q);
	$this->db->or_like('tmp_ket_tinggal_dengan', $q);
	$this->db->or_like('tmp_alamat', $q);
	$this->db->or_like('tmp_telepon', $q);
	$this->db->or_like('tmp_jarak_sekolah', $q);
	$this->db->or_like('tmp_kendaraan', $q);
	$this->db->or_like('ort_nama_ayah', $q);
	$this->db->or_like('ort_pekerjaan_ayah', $q);
	$this->db->or_like('ort_ket_pekerjaan_ayah', $q);
	$this->db->or_like('ort_nama_ibu', $q);
	$this->db->or_like('ort_pekerjaan_ibu', $q);
	$this->db->or_like('ort_ket_pekerjaan_ibu', $q);
	$this->db->or_like('ort_alamat', $q);
	$this->db->or_like('ort_telepon', $q);
	$this->db->or_like('ort_penghasilan', $q);
	$this->db->or_like('ska_nama', $q);
	$this->db->or_like('ska_status', $q);
	$this->db->or_like('ska_alamat', $q);
	$this->db->or_like('ska_telepon', $q);
	$this->db->or_like('ska_kelas', $q);
	$this->db->or_like('ska_tahun_lulus', $q);
	$this->db->or_like('ska_no_ijazah', $q);
	$this->db->or_like('nil_bin_1', $q);
	$this->db->or_like('nil_bin_2', $q);
	$this->db->or_like('nil_bin_3', $q);
	$this->db->or_like('nil_bin_4', $q);
	$this->db->or_like('nil_bin_5', $q);
	$this->db->or_like('nil_bin_rata', $q);
	$this->db->or_like('nil_big_1', $q);
	$this->db->or_like('nil_big_2', $q);
	$this->db->or_like('nil_big_3', $q);
	$this->db->or_like('nil_big_4', $q);
	$this->db->or_like('nil_big_5', $q);
	$this->db->or_like('nil_big_rata', $q);
	$this->db->or_like('nil_mat_1', $q);
	$this->db->or_like('nil_mat_2', $q);
	$this->db->or_like('nil_mat_3', $q);
	$this->db->or_like('nil_mat_4', $q);
	$this->db->or_like('nil_mat_5', $q);
	$this->db->or_like('nil_mat_rata', $q);
	$this->db->or_like('nil_ipa_1', $q);
	$this->db->or_like('nil_ipa_2', $q);
	$this->db->or_like('nil_ipa_3', $q);
	$this->db->or_like('nil_ipa_4', $q);
	$this->db->or_like('nil_ipa_5', $q);
	$this->db->or_like('nil_ipa_rata', $q);
	$this->db->or_like('nil_ips_1', $q);
	$this->db->or_like('nil_ips_2', $q);
	$this->db->or_like('nil_ips_3', $q);
	$this->db->or_like('nil_ips_4', $q);
	$this->db->or_like('nil_ips_5', $q);
	$this->db->or_like('nil_ips_rata', $q);
	$this->db->or_like('status_pendaftaran', $q);
	$this->db->or_like('status_biodata', $q);
	$this->db->or_like('status_verifikasi', $q);
	$this->db->or_like('status_seleksi', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('nisn', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nama_panggilan', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('ket_agama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('golongan_darah', $q);
	$this->db->or_like('status_anak', $q);
	$this->db->or_like('anak_ke', $q);
	$this->db->or_like('jumlah_saudara', $q);
	$this->db->or_like('tmp_tinggal_dengan', $q);
	$this->db->or_like('tmp_ket_tinggal_dengan', $q);
	$this->db->or_like('tmp_alamat', $q);
	$this->db->or_like('tmp_telepon', $q);
	$this->db->or_like('tmp_jarak_sekolah', $q);
	$this->db->or_like('tmp_kendaraan', $q);
	$this->db->or_like('ort_nama_ayah', $q);
	$this->db->or_like('ort_pekerjaan_ayah', $q);
	$this->db->or_like('ort_ket_pekerjaan_ayah', $q);
	$this->db->or_like('ort_nama_ibu', $q);
	$this->db->or_like('ort_pekerjaan_ibu', $q);
	$this->db->or_like('ort_ket_pekerjaan_ibu', $q);
	$this->db->or_like('ort_alamat', $q);
	$this->db->or_like('ort_telepon', $q);
	$this->db->or_like('ort_penghasilan', $q);
	$this->db->or_like('ska_nama', $q);
	$this->db->or_like('ska_status', $q);
	$this->db->or_like('ska_alamat', $q);
	$this->db->or_like('ska_telepon', $q);
	$this->db->or_like('ska_kelas', $q);
	$this->db->or_like('ska_tahun_lulus', $q);
	$this->db->or_like('ska_no_ijazah', $q);
	$this->db->or_like('nil_bin_1', $q);
	$this->db->or_like('nil_bin_2', $q);
	$this->db->or_like('nil_bin_3', $q);
	$this->db->or_like('nil_bin_4', $q);
	$this->db->or_like('nil_bin_5', $q);
	$this->db->or_like('nil_bin_rata', $q);
	$this->db->or_like('nil_big_1', $q);
	$this->db->or_like('nil_big_2', $q);
	$this->db->or_like('nil_big_3', $q);
	$this->db->or_like('nil_big_4', $q);
	$this->db->or_like('nil_big_5', $q);
	$this->db->or_like('nil_big_rata', $q);
	$this->db->or_like('nil_mat_1', $q);
	$this->db->or_like('nil_mat_2', $q);
	$this->db->or_like('nil_mat_3', $q);
	$this->db->or_like('nil_mat_4', $q);
	$this->db->or_like('nil_mat_5', $q);
	$this->db->or_like('nil_mat_rata', $q);
	$this->db->or_like('nil_ipa_1', $q);
	$this->db->or_like('nil_ipa_2', $q);
	$this->db->or_like('nil_ipa_3', $q);
	$this->db->or_like('nil_ipa_4', $q);
	$this->db->or_like('nil_ipa_5', $q);
	$this->db->or_like('nil_ipa_rata', $q);
	$this->db->or_like('nil_ips_1', $q);
	$this->db->or_like('nil_ips_2', $q);
	$this->db->or_like('nil_ips_3', $q);
	$this->db->or_like('nil_ips_4', $q);
	$this->db->or_like('nil_ips_5', $q);
	$this->db->or_like('nil_ips_rata', $q);
	$this->db->or_like('status_pendaftaran', $q);
	$this->db->or_like('status_biodata', $q);
	$this->db->or_like('status_verifikasi', $q);
	$this->db->or_like('status_seleksi', $q);
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

/* End of file Tb_peserta_model.php */
/* Location: ./application/models/Tb_peserta_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-11 09:43:30 */
/* http://harviacode.com */