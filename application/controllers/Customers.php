<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'customers/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'customers/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'customers/index.html';
            $config['first_url'] = base_url() . 'customers/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Customers_model->total_rows($q);
        $customers = $this->Customers_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'customers_data' => $customers,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('customers/customers_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Customers_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'FirstName' => $row->FirstName,
		'LastName' => $row->LastName,
		'phone' => $row->phone,
		'address' => $row->address,
		'city' => $row->city,
		'country' => $row->country,
	    );
            $this->load->view('customers/customers_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customers'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customers/create_action'),
	    'id' => set_value('id'),
	    'FirstName' => set_value('FirstName'),
	    'LastName' => set_value('LastName'),
	    'phone' => set_value('phone'),
	    'address' => set_value('address'),
	    'city' => set_value('city'),
	    'country' => set_value('country'),
	);
        $this->load->view('customers/customers_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'FirstName' => $this->input->post('FirstName',TRUE),
		'LastName' => $this->input->post('LastName',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'address' => $this->input->post('address',TRUE),
		'city' => $this->input->post('city',TRUE),
		'country' => $this->input->post('country',TRUE),
	    );

            $this->Customers_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customers'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customers_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customers/update_action'),
		'id' => set_value('id', $row->id),
		'FirstName' => set_value('FirstName', $row->FirstName),
		'LastName' => set_value('LastName', $row->LastName),
		'phone' => set_value('phone', $row->phone),
		'address' => set_value('address', $row->address),
		'city' => set_value('city', $row->city),
		'country' => set_value('country', $row->country),
	    );
            $this->load->view('customers/customers_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customers'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'FirstName' => $this->input->post('FirstName',TRUE),
		'LastName' => $this->input->post('LastName',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'address' => $this->input->post('address',TRUE),
		'city' => $this->input->post('city',TRUE),
		'country' => $this->input->post('country',TRUE),
	    );

            $this->Customers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customers'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customers_model->get_by_id($id);

        if ($row) {
            $this->Customers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customers'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('FirstName', 'firstname', 'trim|required');
	$this->form_validation->set_rules('LastName', 'lastname', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('city', 'city', 'trim|required');
	$this->form_validation->set_rules('country', 'country', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customers.xls";
        $judul = "customers";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "City");
	xlsWriteLabel($tablehead, $kolomhead++, "Country");

	foreach ($this->Customers_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FirstName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LastName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->city);
	    xlsWriteLabel($tablebody, $kolombody++, $data->country);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=customers.doc");

        $data = array(
            'customers_data' => $this->Customers_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('customers/customers_doc',$data);
    }

}

/* End of file Customers.php */
/* Location: ./application/controllers/Customers.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:54:12 */
/* http://harviacode.com */