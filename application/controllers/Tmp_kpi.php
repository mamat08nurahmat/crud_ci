<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tmp_kpi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tmp_kpi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tmp_kpi/tmp_kpi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tmp_kpi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tmp_kpi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'SALES_TYPE' => $row->SALES_TYPE,
		'nama_kpi' => $row->nama_kpi,
		'BOBOT' => $row->BOBOT,
		'kpiid' => $row->kpiid,
	    );
            $this->load->view('tmp_kpi/tmp_kpi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_kpi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tmp_kpi/create_action'),
	    'SALES_TYPE' => set_value('SALES_TYPE'),
	    'nama_kpi' => set_value('nama_kpi'),
	    'BOBOT' => set_value('BOBOT'),
	    'kpiid' => set_value('kpiid'),
	);
        $this->load->view('tmp_kpi/tmp_kpi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'SALES_TYPE' => $this->input->post('SALES_TYPE',TRUE),
		'nama_kpi' => $this->input->post('nama_kpi',TRUE),
		'BOBOT' => $this->input->post('BOBOT',TRUE),
		'kpiid' => $this->input->post('kpiid',TRUE),
	    );

            $this->Tmp_kpi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tmp_kpi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tmp_kpi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tmp_kpi/update_action'),
		'SALES_TYPE' => set_value('SALES_TYPE', $row->SALES_TYPE),
		'nama_kpi' => set_value('nama_kpi', $row->nama_kpi),
		'BOBOT' => set_value('BOBOT', $row->BOBOT),
		'kpiid' => set_value('kpiid', $row->kpiid),
	    );
            $this->load->view('tmp_kpi/tmp_kpi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_kpi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'SALES_TYPE' => $this->input->post('SALES_TYPE',TRUE),
		'nama_kpi' => $this->input->post('nama_kpi',TRUE),
		'BOBOT' => $this->input->post('BOBOT',TRUE),
		'kpiid' => $this->input->post('kpiid',TRUE),
	    );

            $this->Tmp_kpi_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tmp_kpi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tmp_kpi_model->get_by_id($id);

        if ($row) {
            $this->Tmp_kpi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tmp_kpi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_kpi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('SALES_TYPE', 'sales type', 'trim|required');
	$this->form_validation->set_rules('nama_kpi', 'nama kpi', 'trim|required');
	$this->form_validation->set_rules('BOBOT', 'bobot', 'trim|required');
	$this->form_validation->set_rules('kpiid', 'kpiid', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tmp_kpi.xls";
        $judul = "tmp_kpi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "SALES TYPE");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kpi");
	xlsWriteLabel($tablehead, $kolomhead++, "BOBOT");
	xlsWriteLabel($tablehead, $kolomhead++, "Kpiid");

	foreach ($this->Tmp_kpi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SALES_TYPE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kpi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BOBOT);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kpiid);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tmp_kpi.doc");

        $data = array(
            'tmp_kpi_data' => $this->Tmp_kpi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tmp_kpi/tmp_kpi_doc',$data);
    }

}

/* End of file Tmp_kpi.php */
/* Location: ./application/controllers/Tmp_kpi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */