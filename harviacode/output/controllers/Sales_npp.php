<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales_npp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_npp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sales_npp/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sales_npp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sales_npp/index.html';
            $config['first_url'] = base_url() . 'sales_npp/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sales_npp_model->total_rows($q);
        $sales_npp = $this->Sales_npp_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sales_npp_data' => $sales_npp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sales_npp/sales_npp_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sales_npp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'sales_name' => $row->sales_name,
		'activedate' => $row->activedate,
	    );
            $this->load->view('sales_npp/sales_npp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_npp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales_npp/create_action'),
	    'npp' => set_value('npp'),
	    'sales_name' => set_value('sales_name'),
	    'activedate' => set_value('activedate'),
	);
        $this->load->view('sales_npp/sales_npp_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'sales_name' => $this->input->post('sales_name',TRUE),
		'activedate' => $this->input->post('activedate',TRUE),
	    );

            $this->Sales_npp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sales_npp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sales_npp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales_npp/update_action'),
		'npp' => set_value('npp', $row->npp),
		'sales_name' => set_value('sales_name', $row->sales_name),
		'activedate' => set_value('activedate', $row->activedate),
	    );
            $this->load->view('sales_npp/sales_npp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_npp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'sales_name' => $this->input->post('sales_name',TRUE),
		'activedate' => $this->input->post('activedate',TRUE),
	    );

            $this->Sales_npp_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sales_npp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_npp_model->get_by_id($id);

        if ($row) {
            $this->Sales_npp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales_npp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_npp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npp', 'npp', 'trim|required');
	$this->form_validation->set_rules('sales_name', 'sales name', 'trim|required');
	$this->form_validation->set_rules('activedate', 'activedate', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sales_npp.xls";
        $judul = "sales_npp";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sales Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Activedate");

	foreach ($this->Sales_npp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sales_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activedate);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sales_npp.doc");

        $data = array(
            'sales_npp_data' => $this->Sales_npp_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sales_npp/sales_npp_doc',$data);
    }

}

/* End of file Sales_npp.php */
/* Location: ./application/controllers/Sales_npp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */