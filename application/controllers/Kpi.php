<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kpi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('kpi/kpi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kpi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kpi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kpiid' => $row->kpiid,
		'productID' => $row->productID,
		'nama_kpi' => $row->nama_kpi,
	    );
            $this->load->view('kpi/kpi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kpi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kpi/create_action'),
	    'kpiid' => set_value('kpiid'),
	    'productID' => set_value('productID'),
	    'nama_kpi' => set_value('nama_kpi'),
	);
        $this->load->view('kpi/kpi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'productID' => $this->input->post('productID',TRUE),
		'nama_kpi' => $this->input->post('nama_kpi',TRUE),
	    );

            $this->Kpi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kpi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kpi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kpi/update_action'),
		'kpiid' => set_value('kpiid', $row->kpiid),
		'productID' => set_value('productID', $row->productID),
		'nama_kpi' => set_value('nama_kpi', $row->nama_kpi),
	    );
            $this->load->view('kpi/kpi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kpi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kpiid', TRUE));
        } else {
            $data = array(
		'productID' => $this->input->post('productID',TRUE),
		'nama_kpi' => $this->input->post('nama_kpi',TRUE),
	    );

            $this->Kpi_model->update($this->input->post('kpiid', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kpi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kpi_model->get_by_id($id);

        if ($row) {
            $this->Kpi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kpi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kpi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('productID', 'productid', 'trim|required');
	$this->form_validation->set_rules('nama_kpi', 'nama kpi', 'trim|required');

	$this->form_validation->set_rules('kpiid', 'kpiid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kpi.xls";
        $judul = "kpi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ProductID");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kpi");

	foreach ($this->Kpi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->productID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kpi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kpi.doc");

        $data = array(
            'kpi_data' => $this->Kpi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kpi/kpi_doc',$data);
    }

}

/* End of file Kpi.php */
/* Location: ./application/controllers/Kpi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */