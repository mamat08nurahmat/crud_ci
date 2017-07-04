<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales_target extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_target_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sales_target/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sales_target/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sales_target/index.html';
            $config['first_url'] = base_url() . 'sales_target/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sales_target_model->total_rows($q);
        $sales_target = $this->Sales_target_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sales_target_data' => $sales_target,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sales_target/sales_target_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sales_target_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'year' => $row->year,
		'month' => $row->month,
		'productID' => $row->productID,
		'target' => $row->target,
		'realisasi' => $row->realisasi,
	    );
            $this->load->view('sales_target/sales_target_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_target'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales_target/create_action'),
	    'npp' => set_value('npp'),
	    'year' => set_value('year'),
	    'month' => set_value('month'),
	    'productID' => set_value('productID'),
	    'target' => set_value('target'),
	    'realisasi' => set_value('realisasi'),
	);
        $this->load->view('sales_target/sales_target_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'target' => $this->input->post('target',TRUE),
		'realisasi' => $this->input->post('realisasi',TRUE),
	    );

            $this->Sales_target_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sales_target'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sales_target_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales_target/update_action'),
		'npp' => set_value('npp', $row->npp),
		'year' => set_value('year', $row->year),
		'month' => set_value('month', $row->month),
		'productID' => set_value('productID', $row->productID),
		'target' => set_value('target', $row->target),
		'realisasi' => set_value('realisasi', $row->realisasi),
	    );
            $this->load->view('sales_target/sales_target_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_target'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('npp', TRUE));
        } else {
            $data = array(
		'target' => $this->input->post('target',TRUE),
		'realisasi' => $this->input->post('realisasi',TRUE),
	    );

            $this->Sales_target_model->update($this->input->post('npp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sales_target'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_target_model->get_by_id($id);

        if ($row) {
            $this->Sales_target_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales_target'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_target'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('target', 'target', 'trim|required');
	$this->form_validation->set_rules('realisasi', 'realisasi', 'trim|required');

	$this->form_validation->set_rules('npp', 'npp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sales_target.xls";
        $judul = "sales_target";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Target");
	xlsWriteLabel($tablehead, $kolomhead++, "Realisasi");

	foreach ($this->Sales_target_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->target);
	    xlsWriteLabel($tablebody, $kolombody++, $data->realisasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sales_target.doc");

        $data = array(
            'sales_target_data' => $this->Sales_target_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sales_target/sales_target_doc',$data);
    }

}

/* End of file Sales_target.php */
/* Location: ./application/controllers/Sales_target.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */