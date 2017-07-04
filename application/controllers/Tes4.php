<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tes4 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tes4_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tes4/tes4_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tes4_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tes4_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'year' => $row->year,
		'month' => $row->month,
	    );
            $this->load->view('tes4/tes4_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tes4'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tes4/create_action'),
	    'npp' => set_value('npp'),
	    'year' => set_value('year'),
	    'month' => set_value('month'),
	);
        $this->load->view('tes4/tes4_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'year' => $this->input->post('year',TRUE),
		'month' => $this->input->post('month',TRUE),
	    );

            $this->Tes4_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tes4'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tes4_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tes4/update_action'),
		'npp' => set_value('npp', $row->npp),
		'year' => set_value('year', $row->year),
		'month' => set_value('month', $row->month),
	    );
            $this->load->view('tes4/tes4_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tes4'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('npp', TRUE));
        } else {
            $data = array(
		'year' => $this->input->post('year',TRUE),
		'month' => $this->input->post('month',TRUE),
	    );

            $this->Tes4_model->update($this->input->post('npp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tes4'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tes4_model->get_by_id($id);

        if ($row) {
            $this->Tes4_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tes4'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tes4'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('year', 'year', 'trim|required');
	$this->form_validation->set_rules('month', 'month', 'trim|required');

	$this->form_validation->set_rules('npp', 'npp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tes4.xls";
        $judul = "tes4";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Year");
	xlsWriteLabel($tablehead, $kolomhead++, "Month");

	foreach ($this->Tes4_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->year);
	    xlsWriteNumber($tablebody, $kolombody++, $data->month);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tes4.doc");

        $data = array(
            'tes4_data' => $this->Tes4_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tes4/tes4_doc',$data);
    }

}

/* End of file Tes4.php */
/* Location: ./application/controllers/Tes4.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */