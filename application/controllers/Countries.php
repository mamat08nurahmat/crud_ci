<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Countries extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Countries_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('countries/countries_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Countries_model->json();
    }

    public function read($id) 
    {
        $row = $this->Countries_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'iso' => $row->iso,
		'name' => $row->name,
		'printable_name' => $row->printable_name,
		'iso3' => $row->iso3,
		'numcode' => $row->numcode,
		'created_date' => $row->created_date,
	    );
            $this->load->view('countries/countries_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countries'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('countries/create_action'),
	    'id' => set_value('id'),
	    'iso' => set_value('iso'),
	    'name' => set_value('name'),
	    'printable_name' => set_value('printable_name'),
	    'iso3' => set_value('iso3'),
	    'numcode' => set_value('numcode'),
	    'created_date' => set_value('created_date'),
	);
        $this->load->view('countries/countries_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iso' => $this->input->post('iso',TRUE),
		'name' => $this->input->post('name',TRUE),
		'printable_name' => $this->input->post('printable_name',TRUE),
		'iso3' => $this->input->post('iso3',TRUE),
		'numcode' => $this->input->post('numcode',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Countries_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('countries'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Countries_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('countries/update_action'),
		'id' => set_value('id', $row->id),
		'iso' => set_value('iso', $row->iso),
		'name' => set_value('name', $row->name),
		'printable_name' => set_value('printable_name', $row->printable_name),
		'iso3' => set_value('iso3', $row->iso3),
		'numcode' => set_value('numcode', $row->numcode),
		'created_date' => set_value('created_date', $row->created_date),
	    );
            $this->load->view('countries/countries_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countries'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'iso' => $this->input->post('iso',TRUE),
		'name' => $this->input->post('name',TRUE),
		'printable_name' => $this->input->post('printable_name',TRUE),
		'iso3' => $this->input->post('iso3',TRUE),
		'numcode' => $this->input->post('numcode',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Countries_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('countries'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Countries_model->get_by_id($id);

        if ($row) {
            $this->Countries_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('countries'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countries'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('iso', 'iso', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('printable_name', 'printable name', 'trim|required');
	$this->form_validation->set_rules('iso3', 'iso3', 'trim|required');
	$this->form_validation->set_rules('numcode', 'numcode', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "countries.xls";
        $judul = "countries";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Iso");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Printable Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Iso3");
	xlsWriteLabel($tablehead, $kolomhead++, "Numcode");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

	foreach ($this->Countries_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->iso);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->printable_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->iso3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->numcode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=countries.doc");

        $data = array(
            'countries_data' => $this->Countries_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('countries/countries_doc',$data);
    }

}

/* End of file Countries.php */
/* Location: ./application/controllers/Countries.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 11:44:22 */
/* http://harviacode.com */