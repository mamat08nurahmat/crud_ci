<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persons extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persons_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'persons/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'persons/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'persons/index.html';
            $config['first_url'] = base_url() . 'persons/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Persons_model->total_rows($q);
        $persons = $this->Persons_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'persons_data' => $persons,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('persons/persons_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Persons_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'firstName' => $row->firstName,
		'lastName' => $row->lastName,
		'gender' => $row->gender,
		'address' => $row->address,
		'dob' => $row->dob,
	    );
            $this->load->view('persons/persons_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persons'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('persons/create_action'),
	    'id' => set_value('id'),
	    'firstName' => set_value('firstName'),
	    'lastName' => set_value('lastName'),
	    'gender' => set_value('gender'),
	    'address' => set_value('address'),
	    'dob' => set_value('dob'),
	);
        $this->load->view('persons/persons_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'firstName' => $this->input->post('firstName',TRUE),
		'lastName' => $this->input->post('lastName',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'address' => $this->input->post('address',TRUE),
		'dob' => $this->input->post('dob',TRUE),
	    );

            $this->Persons_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('persons'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Persons_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('persons/update_action'),
		'id' => set_value('id', $row->id),
		'firstName' => set_value('firstName', $row->firstName),
		'lastName' => set_value('lastName', $row->lastName),
		'gender' => set_value('gender', $row->gender),
		'address' => set_value('address', $row->address),
		'dob' => set_value('dob', $row->dob),
	    );
            $this->load->view('persons/persons_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persons'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'firstName' => $this->input->post('firstName',TRUE),
		'lastName' => $this->input->post('lastName',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'address' => $this->input->post('address',TRUE),
		'dob' => $this->input->post('dob',TRUE),
	    );

            $this->Persons_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('persons'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Persons_model->get_by_id($id);

        if ($row) {
            $this->Persons_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('persons'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persons'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('firstName', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastName', 'lastname', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('dob', 'dob', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "persons.xls";
        $judul = "persons";
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
	xlsWriteLabel($tablehead, $kolomhead++, "FirstName");
	xlsWriteLabel($tablehead, $kolomhead++, "LastName");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Dob");

	foreach ($this->Persons_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->firstName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lastName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dob);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=persons.doc");

        $data = array(
            'persons_data' => $this->Persons_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('persons/persons_doc',$data);
    }

}

/* End of file Persons.php */
/* Location: ./application/controllers/Persons.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:54:12 */
/* http://harviacode.com */