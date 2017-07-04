<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_user_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tb_user/tb_user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tb_user_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tb_user_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'password' => $row->password,
		'nama' => $row->nama,
		'level' => $row->level,
		'is_blokir' => $row->is_blokir,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('tb_user/tb_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_user/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama' => set_value('nama'),
	    'level' => set_value('level'),
	    'is_blokir' => set_value('is_blokir'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('tb_user/tb_user_form', $data);
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
		'nama' => $this->input->post('nama',TRUE),
		'level' => $this->input->post('level',TRUE),
		'is_blokir' => $this->input->post('is_blokir',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tb_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_user/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nama' => set_value('nama', $row->nama),
		'level' => set_value('level', $row->level),
		'is_blokir' => set_value('is_blokir', $row->is_blokir),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('tb_user/tb_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'level' => $this->input->post('level',TRUE),
		'is_blokir' => $this->input->post('is_blokir',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tb_user_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_user_model->get_by_id($id);

        if ($row) {
            $this->Tb_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('is_blokir', 'is blokir', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_user.xls";
        $judul = "tb_user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Blokir");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->Tb_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_blokir);
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
        header("Content-Disposition: attachment;Filename=tb_user.doc");

        $data = array(
            'tb_user_data' => $this->Tb_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_user/tb_user_doc',$data);
    }

}

/* End of file Tb_user.php */
/* Location: ./application/controllers/Tb_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-11 09:43:30 */
/* http://harviacode.com */