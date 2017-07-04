<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Realisasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('realisasi/realisasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Realisasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Realisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'productID' => $row->productID,
		'year' => $row->year,
		'month' => $row->month,
		'nominal' => $row->nominal,
	    );
            $this->load->view('realisasi/realisasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realisasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('realisasi/create_action'),
	    'npp' => set_value('npp'),
	    'productID' => set_value('productID'),
	    'year' => set_value('year'),
	    'month' => set_value('month'),
	    'nominal' => set_value('nominal'),
	);
        $this->load->view('realisasi/realisasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
	    );

            $this->Realisasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('realisasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Realisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('realisasi/update_action'),
		'npp' => set_value('npp', $row->npp),
		'productID' => set_value('productID', $row->productID),
		'year' => set_value('year', $row->year),
		'month' => set_value('month', $row->month),
		'nominal' => set_value('nominal', $row->nominal),
	    );
            $this->load->view('realisasi/realisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realisasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('npp', TRUE));
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
	    );

            $this->Realisasi_model->update($this->input->post('npp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('realisasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Realisasi_model->get_by_id($id);

        if ($row) {
            $this->Realisasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('realisasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realisasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');

	$this->form_validation->set_rules('npp', 'npp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "realisasi.xls";
        $judul = "realisasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");

	foreach ($this->Realisasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=realisasi.doc");

        $data = array(
            'realisasi_data' => $this->Realisasi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('realisasi/realisasi_doc',$data);
    }

}

/* End of file Realisasi.php */
/* Location: ./application/controllers/Realisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */