<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('login/login_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Login_model->json();
    }

    public function read($id) 
    {
        $row = $this->Login_model->get_by_id($id);
        if ($row) {
            $data = array(
		'user_id' => $row->user_id,
		'username' => $row->username,
		'password' => $row->password,
		'user_nama' => $row->user_nama,
		'user_email' => $row->user_email,
		'user_level' => $row->user_level,
		'user_status' => $row->user_status,
		'foto' => $row->foto,
	    );
            $this->load->view('login/login_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('login/create_action'),
	    'user_id' => set_value('user_id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'user_nama' => set_value('user_nama'),
	    'user_email' => set_value('user_email'),
	    'user_level' => set_value('user_level'),
	    'user_status' => set_value('user_status'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('login/login_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'user_nama' => $this->input->post('user_nama',TRUE),
		'user_email' => $this->input->post('user_email',TRUE),
		'user_level' => $this->input->post('user_level',TRUE),
		'user_status' => $this->input->post('user_status',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Login_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('login'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Login_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('login/update_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'user_nama' => set_value('user_nama', $row->user_nama),
		'user_email' => set_value('user_email', $row->user_email),
		'user_level' => set_value('user_level', $row->user_level),
		'user_status' => set_value('user_status', $row->user_status),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('login/login_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'user_nama' => $this->input->post('user_nama',TRUE),
		'user_email' => $this->input->post('user_email',TRUE),
		'user_level' => $this->input->post('user_level',TRUE),
		'user_status' => $this->input->post('user_status',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Login_model->update($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('login'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Login_model->get_by_id($id);

        if ($row) {
            $this->Login_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('login'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('user_nama', 'user nama', 'trim|required');
	$this->form_validation->set_rules('user_email', 'user email', 'trim|required');
	$this->form_validation->set_rules('user_level', 'user level', 'trim|required');
	$this->form_validation->set_rules('user_status', 'user status', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('user_id', 'user_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "login.xls";
        $judul = "login";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "User Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "User Email");
	xlsWriteLabel($tablehead, $kolomhead++, "User Level");
	xlsWriteLabel($tablehead, $kolomhead++, "User Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");

	foreach ($this->Login_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=login.doc");

        $data = array(
            'login_data' => $this->Login_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('login/login_doc',$data);
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */