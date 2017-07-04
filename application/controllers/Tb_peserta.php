<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_peserta_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tb_peserta/tb_peserta_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tb_peserta_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tb_peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'email' => $row->email,
		'username' => $row->username,
		'password' => $row->password,
		'nisn' => $row->nisn,
		'nama' => $row->nama,
		'nama_panggilan' => $row->nama_panggilan,
		'jenis_kelamin' => $row->jenis_kelamin,
		'agama' => $row->agama,
		'ket_agama' => $row->ket_agama,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'berat_badan' => $row->berat_badan,
		'tinggi_badan' => $row->tinggi_badan,
		'golongan_darah' => $row->golongan_darah,
		'status_anak' => $row->status_anak,
		'anak_ke' => $row->anak_ke,
		'jumlah_saudara' => $row->jumlah_saudara,
		'tmp_tinggal_dengan' => $row->tmp_tinggal_dengan,
		'tmp_ket_tinggal_dengan' => $row->tmp_ket_tinggal_dengan,
		'tmp_alamat' => $row->tmp_alamat,
		'tmp_telepon' => $row->tmp_telepon,
		'tmp_jarak_sekolah' => $row->tmp_jarak_sekolah,
		'tmp_kendaraan' => $row->tmp_kendaraan,
		'ort_nama_ayah' => $row->ort_nama_ayah,
		'ort_pekerjaan_ayah' => $row->ort_pekerjaan_ayah,
		'ort_ket_pekerjaan_ayah' => $row->ort_ket_pekerjaan_ayah,
		'ort_nama_ibu' => $row->ort_nama_ibu,
		'ort_pekerjaan_ibu' => $row->ort_pekerjaan_ibu,
		'ort_ket_pekerjaan_ibu' => $row->ort_ket_pekerjaan_ibu,
		'ort_alamat' => $row->ort_alamat,
		'ort_telepon' => $row->ort_telepon,
		'ort_penghasilan' => $row->ort_penghasilan,
		'ska_nama' => $row->ska_nama,
		'ska_status' => $row->ska_status,
		'ska_alamat' => $row->ska_alamat,
		'ska_telepon' => $row->ska_telepon,
		'ska_kelas' => $row->ska_kelas,
		'ska_tahun_lulus' => $row->ska_tahun_lulus,
		'ska_no_ijazah' => $row->ska_no_ijazah,
		'nil_bin_1' => $row->nil_bin_1,
		'nil_bin_2' => $row->nil_bin_2,
		'nil_bin_3' => $row->nil_bin_3,
		'nil_bin_4' => $row->nil_bin_4,
		'nil_bin_5' => $row->nil_bin_5,
		'nil_bin_rata' => $row->nil_bin_rata,
		'nil_big_1' => $row->nil_big_1,
		'nil_big_2' => $row->nil_big_2,
		'nil_big_3' => $row->nil_big_3,
		'nil_big_4' => $row->nil_big_4,
		'nil_big_5' => $row->nil_big_5,
		'nil_big_rata' => $row->nil_big_rata,
		'nil_mat_1' => $row->nil_mat_1,
		'nil_mat_2' => $row->nil_mat_2,
		'nil_mat_3' => $row->nil_mat_3,
		'nil_mat_4' => $row->nil_mat_4,
		'nil_mat_5' => $row->nil_mat_5,
		'nil_mat_rata' => $row->nil_mat_rata,
		'nil_ipa_1' => $row->nil_ipa_1,
		'nil_ipa_2' => $row->nil_ipa_2,
		'nil_ipa_3' => $row->nil_ipa_3,
		'nil_ipa_4' => $row->nil_ipa_4,
		'nil_ipa_5' => $row->nil_ipa_5,
		'nil_ipa_rata' => $row->nil_ipa_rata,
		'nil_ips_1' => $row->nil_ips_1,
		'nil_ips_2' => $row->nil_ips_2,
		'nil_ips_3' => $row->nil_ips_3,
		'nil_ips_4' => $row->nil_ips_4,
		'nil_ips_5' => $row->nil_ips_5,
		'nil_ips_rata' => $row->nil_ips_rata,
		'status_pendaftaran' => $row->status_pendaftaran,
		'status_biodata' => $row->status_biodata,
		'status_verifikasi' => $row->status_verifikasi,
		'status_seleksi' => $row->status_seleksi,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('tb_peserta/tb_peserta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_peserta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_peserta/create_action'),
	    'id' => set_value('id'),
	    'email' => set_value('email'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nisn' => set_value('nisn'),
	    'nama' => set_value('nama'),
	    'nama_panggilan' => set_value('nama_panggilan'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'agama' => set_value('agama'),
	    'ket_agama' => set_value('ket_agama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'berat_badan' => set_value('berat_badan'),
	    'tinggi_badan' => set_value('tinggi_badan'),
	    'golongan_darah' => set_value('golongan_darah'),
	    'status_anak' => set_value('status_anak'),
	    'anak_ke' => set_value('anak_ke'),
	    'jumlah_saudara' => set_value('jumlah_saudara'),
	    'tmp_tinggal_dengan' => set_value('tmp_tinggal_dengan'),
	    'tmp_ket_tinggal_dengan' => set_value('tmp_ket_tinggal_dengan'),
	    'tmp_alamat' => set_value('tmp_alamat'),
	    'tmp_telepon' => set_value('tmp_telepon'),
	    'tmp_jarak_sekolah' => set_value('tmp_jarak_sekolah'),
	    'tmp_kendaraan' => set_value('tmp_kendaraan'),
	    'ort_nama_ayah' => set_value('ort_nama_ayah'),
	    'ort_pekerjaan_ayah' => set_value('ort_pekerjaan_ayah'),
	    'ort_ket_pekerjaan_ayah' => set_value('ort_ket_pekerjaan_ayah'),
	    'ort_nama_ibu' => set_value('ort_nama_ibu'),
	    'ort_pekerjaan_ibu' => set_value('ort_pekerjaan_ibu'),
	    'ort_ket_pekerjaan_ibu' => set_value('ort_ket_pekerjaan_ibu'),
	    'ort_alamat' => set_value('ort_alamat'),
	    'ort_telepon' => set_value('ort_telepon'),
	    'ort_penghasilan' => set_value('ort_penghasilan'),
	    'ska_nama' => set_value('ska_nama'),
	    'ska_status' => set_value('ska_status'),
	    'ska_alamat' => set_value('ska_alamat'),
	    'ska_telepon' => set_value('ska_telepon'),
	    'ska_kelas' => set_value('ska_kelas'),
	    'ska_tahun_lulus' => set_value('ska_tahun_lulus'),
	    'ska_no_ijazah' => set_value('ska_no_ijazah'),
	    'nil_bin_1' => set_value('nil_bin_1'),
	    'nil_bin_2' => set_value('nil_bin_2'),
	    'nil_bin_3' => set_value('nil_bin_3'),
	    'nil_bin_4' => set_value('nil_bin_4'),
	    'nil_bin_5' => set_value('nil_bin_5'),
	    'nil_bin_rata' => set_value('nil_bin_rata'),
	    'nil_big_1' => set_value('nil_big_1'),
	    'nil_big_2' => set_value('nil_big_2'),
	    'nil_big_3' => set_value('nil_big_3'),
	    'nil_big_4' => set_value('nil_big_4'),
	    'nil_big_5' => set_value('nil_big_5'),
	    'nil_big_rata' => set_value('nil_big_rata'),
	    'nil_mat_1' => set_value('nil_mat_1'),
	    'nil_mat_2' => set_value('nil_mat_2'),
	    'nil_mat_3' => set_value('nil_mat_3'),
	    'nil_mat_4' => set_value('nil_mat_4'),
	    'nil_mat_5' => set_value('nil_mat_5'),
	    'nil_mat_rata' => set_value('nil_mat_rata'),
	    'nil_ipa_1' => set_value('nil_ipa_1'),
	    'nil_ipa_2' => set_value('nil_ipa_2'),
	    'nil_ipa_3' => set_value('nil_ipa_3'),
	    'nil_ipa_4' => set_value('nil_ipa_4'),
	    'nil_ipa_5' => set_value('nil_ipa_5'),
	    'nil_ipa_rata' => set_value('nil_ipa_rata'),
	    'nil_ips_1' => set_value('nil_ips_1'),
	    'nil_ips_2' => set_value('nil_ips_2'),
	    'nil_ips_3' => set_value('nil_ips_3'),
	    'nil_ips_4' => set_value('nil_ips_4'),
	    'nil_ips_5' => set_value('nil_ips_5'),
	    'nil_ips_rata' => set_value('nil_ips_rata'),
	    'status_pendaftaran' => set_value('status_pendaftaran'),
	    'status_biodata' => set_value('status_biodata'),
	    'status_verifikasi' => set_value('status_verifikasi'),
	    'status_seleksi' => set_value('status_seleksi'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('tb_peserta/tb_peserta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nama_panggilan' => $this->input->post('nama_panggilan',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'ket_agama' => $this->input->post('ket_agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'status_anak' => $this->input->post('status_anak',TRUE),
		'anak_ke' => $this->input->post('anak_ke',TRUE),
		'jumlah_saudara' => $this->input->post('jumlah_saudara',TRUE),
		'tmp_tinggal_dengan' => $this->input->post('tmp_tinggal_dengan',TRUE),
		'tmp_ket_tinggal_dengan' => $this->input->post('tmp_ket_tinggal_dengan',TRUE),
		'tmp_alamat' => $this->input->post('tmp_alamat',TRUE),
		'tmp_telepon' => $this->input->post('tmp_telepon',TRUE),
		'tmp_jarak_sekolah' => $this->input->post('tmp_jarak_sekolah',TRUE),
		'tmp_kendaraan' => $this->input->post('tmp_kendaraan',TRUE),
		'ort_nama_ayah' => $this->input->post('ort_nama_ayah',TRUE),
		'ort_pekerjaan_ayah' => $this->input->post('ort_pekerjaan_ayah',TRUE),
		'ort_ket_pekerjaan_ayah' => $this->input->post('ort_ket_pekerjaan_ayah',TRUE),
		'ort_nama_ibu' => $this->input->post('ort_nama_ibu',TRUE),
		'ort_pekerjaan_ibu' => $this->input->post('ort_pekerjaan_ibu',TRUE),
		'ort_ket_pekerjaan_ibu' => $this->input->post('ort_ket_pekerjaan_ibu',TRUE),
		'ort_alamat' => $this->input->post('ort_alamat',TRUE),
		'ort_telepon' => $this->input->post('ort_telepon',TRUE),
		'ort_penghasilan' => $this->input->post('ort_penghasilan',TRUE),
		'ska_nama' => $this->input->post('ska_nama',TRUE),
		'ska_status' => $this->input->post('ska_status',TRUE),
		'ska_alamat' => $this->input->post('ska_alamat',TRUE),
		'ska_telepon' => $this->input->post('ska_telepon',TRUE),
		'ska_kelas' => $this->input->post('ska_kelas',TRUE),
		'ska_tahun_lulus' => $this->input->post('ska_tahun_lulus',TRUE),
		'ska_no_ijazah' => $this->input->post('ska_no_ijazah',TRUE),
		'nil_bin_1' => $this->input->post('nil_bin_1',TRUE),
		'nil_bin_2' => $this->input->post('nil_bin_2',TRUE),
		'nil_bin_3' => $this->input->post('nil_bin_3',TRUE),
		'nil_bin_4' => $this->input->post('nil_bin_4',TRUE),
		'nil_bin_5' => $this->input->post('nil_bin_5',TRUE),
		'nil_bin_rata' => $this->input->post('nil_bin_rata',TRUE),
		'nil_big_1' => $this->input->post('nil_big_1',TRUE),
		'nil_big_2' => $this->input->post('nil_big_2',TRUE),
		'nil_big_3' => $this->input->post('nil_big_3',TRUE),
		'nil_big_4' => $this->input->post('nil_big_4',TRUE),
		'nil_big_5' => $this->input->post('nil_big_5',TRUE),
		'nil_big_rata' => $this->input->post('nil_big_rata',TRUE),
		'nil_mat_1' => $this->input->post('nil_mat_1',TRUE),
		'nil_mat_2' => $this->input->post('nil_mat_2',TRUE),
		'nil_mat_3' => $this->input->post('nil_mat_3',TRUE),
		'nil_mat_4' => $this->input->post('nil_mat_4',TRUE),
		'nil_mat_5' => $this->input->post('nil_mat_5',TRUE),
		'nil_mat_rata' => $this->input->post('nil_mat_rata',TRUE),
		'nil_ipa_1' => $this->input->post('nil_ipa_1',TRUE),
		'nil_ipa_2' => $this->input->post('nil_ipa_2',TRUE),
		'nil_ipa_3' => $this->input->post('nil_ipa_3',TRUE),
		'nil_ipa_4' => $this->input->post('nil_ipa_4',TRUE),
		'nil_ipa_5' => $this->input->post('nil_ipa_5',TRUE),
		'nil_ipa_rata' => $this->input->post('nil_ipa_rata',TRUE),
		'nil_ips_1' => $this->input->post('nil_ips_1',TRUE),
		'nil_ips_2' => $this->input->post('nil_ips_2',TRUE),
		'nil_ips_3' => $this->input->post('nil_ips_3',TRUE),
		'nil_ips_4' => $this->input->post('nil_ips_4',TRUE),
		'nil_ips_5' => $this->input->post('nil_ips_5',TRUE),
		'nil_ips_rata' => $this->input->post('nil_ips_rata',TRUE),
		'status_pendaftaran' => $this->input->post('status_pendaftaran',TRUE),
		'status_biodata' => $this->input->post('status_biodata',TRUE),
		'status_verifikasi' => $this->input->post('status_verifikasi',TRUE),
		'status_seleksi' => $this->input->post('status_seleksi',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tb_peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_peserta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_peserta/update_action'),
		'id' => set_value('id', $row->id),
		'email' => set_value('email', $row->email),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nisn' => set_value('nisn', $row->nisn),
		'nama' => set_value('nama', $row->nama),
		'nama_panggilan' => set_value('nama_panggilan', $row->nama_panggilan),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'agama' => set_value('agama', $row->agama),
		'ket_agama' => set_value('ket_agama', $row->ket_agama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'berat_badan' => set_value('berat_badan', $row->berat_badan),
		'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
		'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
		'status_anak' => set_value('status_anak', $row->status_anak),
		'anak_ke' => set_value('anak_ke', $row->anak_ke),
		'jumlah_saudara' => set_value('jumlah_saudara', $row->jumlah_saudara),
		'tmp_tinggal_dengan' => set_value('tmp_tinggal_dengan', $row->tmp_tinggal_dengan),
		'tmp_ket_tinggal_dengan' => set_value('tmp_ket_tinggal_dengan', $row->tmp_ket_tinggal_dengan),
		'tmp_alamat' => set_value('tmp_alamat', $row->tmp_alamat),
		'tmp_telepon' => set_value('tmp_telepon', $row->tmp_telepon),
		'tmp_jarak_sekolah' => set_value('tmp_jarak_sekolah', $row->tmp_jarak_sekolah),
		'tmp_kendaraan' => set_value('tmp_kendaraan', $row->tmp_kendaraan),
		'ort_nama_ayah' => set_value('ort_nama_ayah', $row->ort_nama_ayah),
		'ort_pekerjaan_ayah' => set_value('ort_pekerjaan_ayah', $row->ort_pekerjaan_ayah),
		'ort_ket_pekerjaan_ayah' => set_value('ort_ket_pekerjaan_ayah', $row->ort_ket_pekerjaan_ayah),
		'ort_nama_ibu' => set_value('ort_nama_ibu', $row->ort_nama_ibu),
		'ort_pekerjaan_ibu' => set_value('ort_pekerjaan_ibu', $row->ort_pekerjaan_ibu),
		'ort_ket_pekerjaan_ibu' => set_value('ort_ket_pekerjaan_ibu', $row->ort_ket_pekerjaan_ibu),
		'ort_alamat' => set_value('ort_alamat', $row->ort_alamat),
		'ort_telepon' => set_value('ort_telepon', $row->ort_telepon),
		'ort_penghasilan' => set_value('ort_penghasilan', $row->ort_penghasilan),
		'ska_nama' => set_value('ska_nama', $row->ska_nama),
		'ska_status' => set_value('ska_status', $row->ska_status),
		'ska_alamat' => set_value('ska_alamat', $row->ska_alamat),
		'ska_telepon' => set_value('ska_telepon', $row->ska_telepon),
		'ska_kelas' => set_value('ska_kelas', $row->ska_kelas),
		'ska_tahun_lulus' => set_value('ska_tahun_lulus', $row->ska_tahun_lulus),
		'ska_no_ijazah' => set_value('ska_no_ijazah', $row->ska_no_ijazah),
		'nil_bin_1' => set_value('nil_bin_1', $row->nil_bin_1),
		'nil_bin_2' => set_value('nil_bin_2', $row->nil_bin_2),
		'nil_bin_3' => set_value('nil_bin_3', $row->nil_bin_3),
		'nil_bin_4' => set_value('nil_bin_4', $row->nil_bin_4),
		'nil_bin_5' => set_value('nil_bin_5', $row->nil_bin_5),
		'nil_bin_rata' => set_value('nil_bin_rata', $row->nil_bin_rata),
		'nil_big_1' => set_value('nil_big_1', $row->nil_big_1),
		'nil_big_2' => set_value('nil_big_2', $row->nil_big_2),
		'nil_big_3' => set_value('nil_big_3', $row->nil_big_3),
		'nil_big_4' => set_value('nil_big_4', $row->nil_big_4),
		'nil_big_5' => set_value('nil_big_5', $row->nil_big_5),
		'nil_big_rata' => set_value('nil_big_rata', $row->nil_big_rata),
		'nil_mat_1' => set_value('nil_mat_1', $row->nil_mat_1),
		'nil_mat_2' => set_value('nil_mat_2', $row->nil_mat_2),
		'nil_mat_3' => set_value('nil_mat_3', $row->nil_mat_3),
		'nil_mat_4' => set_value('nil_mat_4', $row->nil_mat_4),
		'nil_mat_5' => set_value('nil_mat_5', $row->nil_mat_5),
		'nil_mat_rata' => set_value('nil_mat_rata', $row->nil_mat_rata),
		'nil_ipa_1' => set_value('nil_ipa_1', $row->nil_ipa_1),
		'nil_ipa_2' => set_value('nil_ipa_2', $row->nil_ipa_2),
		'nil_ipa_3' => set_value('nil_ipa_3', $row->nil_ipa_3),
		'nil_ipa_4' => set_value('nil_ipa_4', $row->nil_ipa_4),
		'nil_ipa_5' => set_value('nil_ipa_5', $row->nil_ipa_5),
		'nil_ipa_rata' => set_value('nil_ipa_rata', $row->nil_ipa_rata),
		'nil_ips_1' => set_value('nil_ips_1', $row->nil_ips_1),
		'nil_ips_2' => set_value('nil_ips_2', $row->nil_ips_2),
		'nil_ips_3' => set_value('nil_ips_3', $row->nil_ips_3),
		'nil_ips_4' => set_value('nil_ips_4', $row->nil_ips_4),
		'nil_ips_5' => set_value('nil_ips_5', $row->nil_ips_5),
		'nil_ips_rata' => set_value('nil_ips_rata', $row->nil_ips_rata),
		'status_pendaftaran' => set_value('status_pendaftaran', $row->status_pendaftaran),
		'status_biodata' => set_value('status_biodata', $row->status_biodata),
		'status_verifikasi' => set_value('status_verifikasi', $row->status_verifikasi),
		'status_seleksi' => set_value('status_seleksi', $row->status_seleksi),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('tb_peserta/tb_peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_peserta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nama_panggilan' => $this->input->post('nama_panggilan',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'ket_agama' => $this->input->post('ket_agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'status_anak' => $this->input->post('status_anak',TRUE),
		'anak_ke' => $this->input->post('anak_ke',TRUE),
		'jumlah_saudara' => $this->input->post('jumlah_saudara',TRUE),
		'tmp_tinggal_dengan' => $this->input->post('tmp_tinggal_dengan',TRUE),
		'tmp_ket_tinggal_dengan' => $this->input->post('tmp_ket_tinggal_dengan',TRUE),
		'tmp_alamat' => $this->input->post('tmp_alamat',TRUE),
		'tmp_telepon' => $this->input->post('tmp_telepon',TRUE),
		'tmp_jarak_sekolah' => $this->input->post('tmp_jarak_sekolah',TRUE),
		'tmp_kendaraan' => $this->input->post('tmp_kendaraan',TRUE),
		'ort_nama_ayah' => $this->input->post('ort_nama_ayah',TRUE),
		'ort_pekerjaan_ayah' => $this->input->post('ort_pekerjaan_ayah',TRUE),
		'ort_ket_pekerjaan_ayah' => $this->input->post('ort_ket_pekerjaan_ayah',TRUE),
		'ort_nama_ibu' => $this->input->post('ort_nama_ibu',TRUE),
		'ort_pekerjaan_ibu' => $this->input->post('ort_pekerjaan_ibu',TRUE),
		'ort_ket_pekerjaan_ibu' => $this->input->post('ort_ket_pekerjaan_ibu',TRUE),
		'ort_alamat' => $this->input->post('ort_alamat',TRUE),
		'ort_telepon' => $this->input->post('ort_telepon',TRUE),
		'ort_penghasilan' => $this->input->post('ort_penghasilan',TRUE),
		'ska_nama' => $this->input->post('ska_nama',TRUE),
		'ska_status' => $this->input->post('ska_status',TRUE),
		'ska_alamat' => $this->input->post('ska_alamat',TRUE),
		'ska_telepon' => $this->input->post('ska_telepon',TRUE),
		'ska_kelas' => $this->input->post('ska_kelas',TRUE),
		'ska_tahun_lulus' => $this->input->post('ska_tahun_lulus',TRUE),
		'ska_no_ijazah' => $this->input->post('ska_no_ijazah',TRUE),
		'nil_bin_1' => $this->input->post('nil_bin_1',TRUE),
		'nil_bin_2' => $this->input->post('nil_bin_2',TRUE),
		'nil_bin_3' => $this->input->post('nil_bin_3',TRUE),
		'nil_bin_4' => $this->input->post('nil_bin_4',TRUE),
		'nil_bin_5' => $this->input->post('nil_bin_5',TRUE),
		'nil_bin_rata' => $this->input->post('nil_bin_rata',TRUE),
		'nil_big_1' => $this->input->post('nil_big_1',TRUE),
		'nil_big_2' => $this->input->post('nil_big_2',TRUE),
		'nil_big_3' => $this->input->post('nil_big_3',TRUE),
		'nil_big_4' => $this->input->post('nil_big_4',TRUE),
		'nil_big_5' => $this->input->post('nil_big_5',TRUE),
		'nil_big_rata' => $this->input->post('nil_big_rata',TRUE),
		'nil_mat_1' => $this->input->post('nil_mat_1',TRUE),
		'nil_mat_2' => $this->input->post('nil_mat_2',TRUE),
		'nil_mat_3' => $this->input->post('nil_mat_3',TRUE),
		'nil_mat_4' => $this->input->post('nil_mat_4',TRUE),
		'nil_mat_5' => $this->input->post('nil_mat_5',TRUE),
		'nil_mat_rata' => $this->input->post('nil_mat_rata',TRUE),
		'nil_ipa_1' => $this->input->post('nil_ipa_1',TRUE),
		'nil_ipa_2' => $this->input->post('nil_ipa_2',TRUE),
		'nil_ipa_3' => $this->input->post('nil_ipa_3',TRUE),
		'nil_ipa_4' => $this->input->post('nil_ipa_4',TRUE),
		'nil_ipa_5' => $this->input->post('nil_ipa_5',TRUE),
		'nil_ipa_rata' => $this->input->post('nil_ipa_rata',TRUE),
		'nil_ips_1' => $this->input->post('nil_ips_1',TRUE),
		'nil_ips_2' => $this->input->post('nil_ips_2',TRUE),
		'nil_ips_3' => $this->input->post('nil_ips_3',TRUE),
		'nil_ips_4' => $this->input->post('nil_ips_4',TRUE),
		'nil_ips_5' => $this->input->post('nil_ips_5',TRUE),
		'nil_ips_rata' => $this->input->post('nil_ips_rata',TRUE),
		'status_pendaftaran' => $this->input->post('status_pendaftaran',TRUE),
		'status_biodata' => $this->input->post('status_biodata',TRUE),
		'status_verifikasi' => $this->input->post('status_verifikasi',TRUE),
		'status_seleksi' => $this->input->post('status_seleksi',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tb_peserta_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_peserta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_peserta_model->get_by_id($id);

        if ($row) {
            $this->Tb_peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_peserta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_peserta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nama_panggilan', 'nama panggilan', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('ket_agama', 'ket agama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|required');
	$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|required');
	$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
	$this->form_validation->set_rules('status_anak', 'status anak', 'trim|required');
	$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|required');
	$this->form_validation->set_rules('jumlah_saudara', 'jumlah saudara', 'trim|required');
	$this->form_validation->set_rules('tmp_tinggal_dengan', 'tmp tinggal dengan', 'trim|required');
	$this->form_validation->set_rules('tmp_ket_tinggal_dengan', 'tmp ket tinggal dengan', 'trim|required');
	$this->form_validation->set_rules('tmp_alamat', 'tmp alamat', 'trim|required');
	$this->form_validation->set_rules('tmp_telepon', 'tmp telepon', 'trim|required');
	$this->form_validation->set_rules('tmp_jarak_sekolah', 'tmp jarak sekolah', 'trim|required');
	$this->form_validation->set_rules('tmp_kendaraan', 'tmp kendaraan', 'trim|required');
	$this->form_validation->set_rules('ort_nama_ayah', 'ort nama ayah', 'trim|required');
	$this->form_validation->set_rules('ort_pekerjaan_ayah', 'ort pekerjaan ayah', 'trim|required');
	$this->form_validation->set_rules('ort_ket_pekerjaan_ayah', 'ort ket pekerjaan ayah', 'trim|required');
	$this->form_validation->set_rules('ort_nama_ibu', 'ort nama ibu', 'trim|required');
	$this->form_validation->set_rules('ort_pekerjaan_ibu', 'ort pekerjaan ibu', 'trim|required');
	$this->form_validation->set_rules('ort_ket_pekerjaan_ibu', 'ort ket pekerjaan ibu', 'trim|required');
	$this->form_validation->set_rules('ort_alamat', 'ort alamat', 'trim|required');
	$this->form_validation->set_rules('ort_telepon', 'ort telepon', 'trim|required');
	$this->form_validation->set_rules('ort_penghasilan', 'ort penghasilan', 'trim|required');
	$this->form_validation->set_rules('ska_nama', 'ska nama', 'trim|required');
	$this->form_validation->set_rules('ska_status', 'ska status', 'trim|required');
	$this->form_validation->set_rules('ska_alamat', 'ska alamat', 'trim|required');
	$this->form_validation->set_rules('ska_telepon', 'ska telepon', 'trim|required');
	$this->form_validation->set_rules('ska_kelas', 'ska kelas', 'trim|required');
	$this->form_validation->set_rules('ska_tahun_lulus', 'ska tahun lulus', 'trim|required');
	$this->form_validation->set_rules('ska_no_ijazah', 'ska no ijazah', 'trim|required');
	$this->form_validation->set_rules('nil_bin_1', 'nil bin 1', 'trim|required');
	$this->form_validation->set_rules('nil_bin_2', 'nil bin 2', 'trim|required');
	$this->form_validation->set_rules('nil_bin_3', 'nil bin 3', 'trim|required');
	$this->form_validation->set_rules('nil_bin_4', 'nil bin 4', 'trim|required');
	$this->form_validation->set_rules('nil_bin_5', 'nil bin 5', 'trim|required');
	$this->form_validation->set_rules('nil_bin_rata', 'nil bin rata', 'trim|required');
	$this->form_validation->set_rules('nil_big_1', 'nil big 1', 'trim|required');
	$this->form_validation->set_rules('nil_big_2', 'nil big 2', 'trim|required');
	$this->form_validation->set_rules('nil_big_3', 'nil big 3', 'trim|required');
	$this->form_validation->set_rules('nil_big_4', 'nil big 4', 'trim|required');
	$this->form_validation->set_rules('nil_big_5', 'nil big 5', 'trim|required');
	$this->form_validation->set_rules('nil_big_rata', 'nil big rata', 'trim|required');
	$this->form_validation->set_rules('nil_mat_1', 'nil mat 1', 'trim|required');
	$this->form_validation->set_rules('nil_mat_2', 'nil mat 2', 'trim|required');
	$this->form_validation->set_rules('nil_mat_3', 'nil mat 3', 'trim|required');
	$this->form_validation->set_rules('nil_mat_4', 'nil mat 4', 'trim|required');
	$this->form_validation->set_rules('nil_mat_5', 'nil mat 5', 'trim|required');
	$this->form_validation->set_rules('nil_mat_rata', 'nil mat rata', 'trim|required');
	$this->form_validation->set_rules('nil_ipa_1', 'nil ipa 1', 'trim|required');
	$this->form_validation->set_rules('nil_ipa_2', 'nil ipa 2', 'trim|required');
	$this->form_validation->set_rules('nil_ipa_3', 'nil ipa 3', 'trim|required');
	$this->form_validation->set_rules('nil_ipa_4', 'nil ipa 4', 'trim|required');
	$this->form_validation->set_rules('nil_ipa_5', 'nil ipa 5', 'trim|required');
	$this->form_validation->set_rules('nil_ipa_rata', 'nil ipa rata', 'trim|required');
	$this->form_validation->set_rules('nil_ips_1', 'nil ips 1', 'trim|required');
	$this->form_validation->set_rules('nil_ips_2', 'nil ips 2', 'trim|required');
	$this->form_validation->set_rules('nil_ips_3', 'nil ips 3', 'trim|required');
	$this->form_validation->set_rules('nil_ips_4', 'nil ips 4', 'trim|required');
	$this->form_validation->set_rules('nil_ips_5', 'nil ips 5', 'trim|required');
	$this->form_validation->set_rules('nil_ips_rata', 'nil ips rata', 'trim|required');
	$this->form_validation->set_rules('status_pendaftaran', 'status pendaftaran', 'trim|required');
	$this->form_validation->set_rules('status_biodata', 'status biodata', 'trim|required');
	$this->form_validation->set_rules('status_verifikasi', 'status verifikasi', 'trim|required');
	$this->form_validation->set_rules('status_seleksi', 'status seleksi', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_peserta.xls";
        $judul = "tb_peserta";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Nisn");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Panggilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat Badan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tinggi Badan");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Anak");
	xlsWriteLabel($tablehead, $kolomhead++, "Anak Ke");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Saudara");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Tinggal Dengan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Ket Tinggal Dengan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Jarak Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Nama Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Pekerjaan Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Ket Pekerjaan Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Nama Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Pekerjaan Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Ket Pekerjaan Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Ort Penghasilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska Tahun Lulus");
	xlsWriteLabel($tablehead, $kolomhead++, "Ska No Ijazah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Bin 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Bin 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Bin 3");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Bin 4");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Bin 5");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Bin Rata");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Big 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Big 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Big 3");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Big 4");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Big 5");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Big Rata");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Mat 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Mat 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Mat 3");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Mat 4");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Mat 5");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Mat Rata");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ipa 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ipa 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ipa 3");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ipa 4");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ipa 5");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ipa Rata");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ips 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ips 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ips 3");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ips 4");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ips 5");
	xlsWriteLabel($tablehead, $kolomhead++, "Nil Ips Rata");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Pendaftaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Biodata");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Verifikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Seleksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->Tb_peserta_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nisn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_panggilan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berat_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tinggi_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golongan_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_anak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->anak_ke);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_saudara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_tinggal_dengan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_ket_tinggal_dengan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_jarak_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_nama_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_pekerjaan_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_ket_pekerjaan_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_pekerjaan_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_ket_pekerjaan_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ort_penghasilan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_tahun_lulus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ska_no_ijazah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_bin_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_bin_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_bin_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_bin_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_bin_5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_bin_rata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_big_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_big_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_big_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_big_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_big_5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_big_rata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_mat_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_mat_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_mat_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_mat_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_mat_5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_mat_rata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ipa_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ipa_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ipa_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ipa_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ipa_5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ipa_rata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ips_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ips_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ips_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ips_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ips_5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nil_ips_rata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_pendaftaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_biodata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_verifikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_seleksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_peserta.doc");

        $data = array(
            'tb_peserta_data' => $this->Tb_peserta_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_peserta/tb_peserta_doc',$data);
    }

}

/* End of file Tb_peserta.php */
/* Location: ./application/controllers/Tb_peserta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-11 09:43:30 */
/* http://harviacode.com */