<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_kpi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_kpi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('product_kpi/product_kpi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Product_kpi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Product_kpi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'productID' => $row->productID,
		'kpiid' => $row->kpiid,
	    );
            $this->load->view('product_kpi/product_kpi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product_kpi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('product_kpi/create_action'),
	    'productID' => set_value('productID'),
	    'kpiid' => set_value('kpiid'),
	);
        $this->load->view('product_kpi/product_kpi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Product_kpi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('product_kpi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Product_kpi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('product_kpi/update_action'),
		'productID' => set_value('productID', $row->productID),
		'kpiid' => set_value('kpiid', $row->kpiid),
	    );
            $this->load->view('product_kpi/product_kpi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product_kpi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('productID', TRUE));
        } else {
            $data = array(
	    );

            $this->Product_kpi_model->update($this->input->post('productID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('product_kpi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Product_kpi_model->get_by_id($id);

        if ($row) {
            $this->Product_kpi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('product_kpi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product_kpi'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('productID', 'productID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "product_kpi.xls";
        $judul = "product_kpi";
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

	foreach ($this->Product_kpi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=product_kpi.doc");

        $data = array(
            'product_kpi_data' => $this->Product_kpi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('product_kpi/product_kpi_doc',$data);
    }

}

/* End of file Product_kpi.php */
/* Location: ./application/controllers/Product_kpi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */