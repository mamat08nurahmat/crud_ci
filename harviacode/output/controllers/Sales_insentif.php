<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales_insentif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_insentif_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sales_insentif/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sales_insentif/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sales_insentif/index.html';
            $config['first_url'] = base_url() . 'sales_insentif/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sales_insentif_model->total_rows($q);
        $sales_insentif = $this->Sales_insentif_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sales_insentif_data' => $sales_insentif,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sales_insentif/sales_insentif_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sales_insentif_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'year' => $row->year,
		'month' => $row->month,
		'performance' => $row->performance,
		'insentif' => $row->insentif,
	    );
            $this->load->view('sales_insentif/sales_insentif_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_insentif'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales_insentif/create_action'),
	    'npp' => set_value('npp'),
	    'year' => set_value('year'),
	    'month' => set_value('month'),
	    'performance' => set_value('performance'),
	    'insentif' => set_value('insentif'),
	);
        $this->load->view('sales_insentif/sales_insentif_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'performance' => $this->input->post('performance',TRUE),
		'insentif' => $this->input->post('insentif',TRUE),
	    );

            $this->Sales_insentif_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sales_insentif'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sales_insentif_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales_insentif/update_action'),
		'npp' => set_value('npp', $row->npp),
		'year' => set_value('year', $row->year),
		'month' => set_value('month', $row->month),
		'performance' => set_value('performance', $row->performance),
		'insentif' => set_value('insentif', $row->insentif),
	    );
            $this->load->view('sales_insentif/sales_insentif_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_insentif'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('npp', TRUE));
        } else {
            $data = array(
		'performance' => $this->input->post('performance',TRUE),
		'insentif' => $this->input->post('insentif',TRUE),
	    );

            $this->Sales_insentif_model->update($this->input->post('npp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sales_insentif'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_insentif_model->get_by_id($id);

        if ($row) {
            $this->Sales_insentif_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales_insentif'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_insentif'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('performance', 'performance', 'trim|required');
	$this->form_validation->set_rules('insentif', 'insentif', 'trim|required');

	$this->form_validation->set_rules('npp', 'npp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sales_insentif.xls";
        $judul = "sales_insentif";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Performance");
	xlsWriteLabel($tablehead, $kolomhead++, "Insentif");

	foreach ($this->Sales_insentif_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->performance);
	    xlsWriteLabel($tablebody, $kolombody++, $data->insentif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sales_insentif.doc");

        $data = array(
            'sales_insentif_data' => $this->Sales_insentif_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sales_insentif/sales_insentif_doc',$data);
    }

}

/* End of file Sales_insentif.php */
/* Location: ./application/controllers/Sales_insentif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */