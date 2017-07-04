<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Office extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Office_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'office/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'office/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'office/index.html';
            $config['first_url'] = base_url() . 'office/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Office_model->total_rows($q);
        $office = $this->Office_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'office_data' => $office,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('office/office_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Office_model->get_by_id($id);
        if ($row) {
            $data = array(
		'officeID' => $row->officeID,
		'office_type' => $row->office_type,
		'office_name' => $row->office_name,
		'address' => $row->address,
		'phone' => $row->phone,
	    );
            $this->load->view('office/office_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('office'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('office/create_action'),
	    'officeID' => set_value('officeID'),
	    'office_type' => set_value('office_type'),
	    'office_name' => set_value('office_name'),
	    'address' => set_value('address'),
	    'phone' => set_value('phone'),
	);
        $this->load->view('office/office_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'office_type' => $this->input->post('office_type',TRUE),
		'office_name' => $this->input->post('office_name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
	    );

            $this->Office_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('office'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Office_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('office/update_action'),
		'officeID' => set_value('officeID', $row->officeID),
		'office_type' => set_value('office_type', $row->office_type),
		'office_name' => set_value('office_name', $row->office_name),
		'address' => set_value('address', $row->address),
		'phone' => set_value('phone', $row->phone),
	    );
            $this->load->view('office/office_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('office'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('officeID', TRUE));
        } else {
            $data = array(
		'office_type' => $this->input->post('office_type',TRUE),
		'office_name' => $this->input->post('office_name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
	    );

            $this->Office_model->update($this->input->post('officeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('office'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Office_model->get_by_id($id);

        if ($row) {
            $this->Office_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('office'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('office'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('office_type', 'office type', 'trim|required');
	$this->form_validation->set_rules('office_name', 'office name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');

	$this->form_validation->set_rules('officeID', 'officeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "office.xls";
        $judul = "office";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Office Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Office Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");

	foreach ($this->Office_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->office_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->office_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=office.doc");

        $data = array(
            'office_data' => $this->Office_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('office/office_doc',$data);
    }

}

/* End of file Office.php */
/* Location: ./application/controllers/Office.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */