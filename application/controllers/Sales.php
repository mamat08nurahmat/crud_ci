<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('sales/sales_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sales_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sales_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'npp' => $row->npp,
		'sales_type' => $row->sales_type,
		'nama' => $row->nama,
		'status' => $row->status,
		'upliner' => $row->upliner,
		'keterangan' => $row->keterangan,
		'alamat' => $row->alamat,
		'officeID' => $row->officeID,
		'phone' => $row->phone,
	    );
            $this->load->view('sales/sales_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales/create_action'),
	    'id' => set_value('id'),
	    'npp' => set_value('npp'),
	    'sales_type' => set_value('sales_type'),
	    'nama' => set_value('nama'),
	    'status' => set_value('status'),
	    'upliner' => set_value('upliner'),
	    'keterangan' => set_value('keterangan'),
	    'alamat' => set_value('alamat'),
	    'officeID' => set_value('officeID'),
	    'phone' => set_value('phone'),
	);
        $this->load->view('sales/sales_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'sales_type' => $this->input->post('sales_type',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'status' => $this->input->post('status',TRUE),
		'upliner' => $this->input->post('upliner',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'officeID' => $this->input->post('officeID',TRUE),
		'phone' => $this->input->post('phone',TRUE),
	    );

            $this->Sales_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sales'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sales_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales/update_action'),
		'id' => set_value('id', $row->id),
		'npp' => set_value('npp', $row->npp),
		'sales_type' => set_value('sales_type', $row->sales_type),
		'nama' => set_value('nama', $row->nama),
		'status' => set_value('status', $row->status),
		'upliner' => set_value('upliner', $row->upliner),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'alamat' => set_value('alamat', $row->alamat),
		'officeID' => set_value('officeID', $row->officeID),
		'phone' => set_value('phone', $row->phone),
	    );
            $this->load->view('sales/sales_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'sales_type' => $this->input->post('sales_type',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'status' => $this->input->post('status',TRUE),
		'upliner' => $this->input->post('upliner',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'officeID' => $this->input->post('officeID',TRUE),
		'phone' => $this->input->post('phone',TRUE),
	    );

            $this->Sales_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sales'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_model->get_by_id($id);

        if ($row) {
            $this->Sales_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npp', 'npp', 'trim|required');
	$this->form_validation->set_rules('sales_type', 'sales type', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('upliner', 'upliner', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('officeID', 'officeid', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sales.xls";
        $judul = "sales";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Npp");
	xlsWriteLabel($tablehead, $kolomhead++, "Sales Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Upliner");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "OfficeID");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");

	foreach ($this->Sales_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sales_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->upliner);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->officeID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->phone);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sales.doc");

        $data = array(
            'sales_data' => $this->Sales_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sales/sales_doc',$data);
    }

}

/* End of file Sales.php */
/* Location: ./application/controllers/Sales.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */