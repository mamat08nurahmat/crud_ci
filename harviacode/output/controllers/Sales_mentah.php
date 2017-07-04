<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales_mentah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_mentah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sales_mentah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sales_mentah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sales_mentah/index.html';
            $config['first_url'] = base_url() . 'sales_mentah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sales_mentah_model->total_rows($q);
        $sales_mentah = $this->Sales_mentah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sales_mentah_data' => $sales_mentah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sales_mentah/sales_mentah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sales_mentah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'sales_name' => $row->sales_name,
		'sales_type' => $row->sales_type,
		'officeID' => $row->officeID,
		'activedate' => $row->activedate,
		'grade' => $row->grade,
		'status' => $row->status,
		'upliner_npp' => $row->upliner_npp,
		'keterangan' => $row->keterangan,
		'non_activedate' => $row->non_activedate,
		'address' => $row->address,
		'phone' => $row->phone,
		'last_updatetime' => $row->last_updatetime,
	    );
            $this->load->view('sales_mentah/sales_mentah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_mentah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales_mentah/create_action'),
	    'npp' => set_value('npp'),
	    'sales_name' => set_value('sales_name'),
	    'sales_type' => set_value('sales_type'),
	    'officeID' => set_value('officeID'),
	    'activedate' => set_value('activedate'),
	    'grade' => set_value('grade'),
	    'status' => set_value('status'),
	    'upliner_npp' => set_value('upliner_npp'),
	    'keterangan' => set_value('keterangan'),
	    'non_activedate' => set_value('non_activedate'),
	    'address' => set_value('address'),
	    'phone' => set_value('phone'),
	    'last_updatetime' => set_value('last_updatetime'),
	);
        $this->load->view('sales_mentah/sales_mentah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sales_name' => $this->input->post('sales_name',TRUE),
		'sales_type' => $this->input->post('sales_type',TRUE),
		'officeID' => $this->input->post('officeID',TRUE),
		'activedate' => $this->input->post('activedate',TRUE),
		'grade' => $this->input->post('grade',TRUE),
		'status' => $this->input->post('status',TRUE),
		'upliner_npp' => $this->input->post('upliner_npp',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'non_activedate' => $this->input->post('non_activedate',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'last_updatetime' => $this->input->post('last_updatetime',TRUE),
	    );

            $this->Sales_mentah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sales_mentah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sales_mentah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales_mentah/update_action'),
		'npp' => set_value('npp', $row->npp),
		'sales_name' => set_value('sales_name', $row->sales_name),
		'sales_type' => set_value('sales_type', $row->sales_type),
		'officeID' => set_value('officeID', $row->officeID),
		'activedate' => set_value('activedate', $row->activedate),
		'grade' => set_value('grade', $row->grade),
		'status' => set_value('status', $row->status),
		'upliner_npp' => set_value('upliner_npp', $row->upliner_npp),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'non_activedate' => set_value('non_activedate', $row->non_activedate),
		'address' => set_value('address', $row->address),
		'phone' => set_value('phone', $row->phone),
		'last_updatetime' => set_value('last_updatetime', $row->last_updatetime),
	    );
            $this->load->view('sales_mentah/sales_mentah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_mentah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('npp', TRUE));
        } else {
            $data = array(
		'sales_name' => $this->input->post('sales_name',TRUE),
		'sales_type' => $this->input->post('sales_type',TRUE),
		'officeID' => $this->input->post('officeID',TRUE),
		'activedate' => $this->input->post('activedate',TRUE),
		'grade' => $this->input->post('grade',TRUE),
		'status' => $this->input->post('status',TRUE),
		'upliner_npp' => $this->input->post('upliner_npp',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'non_activedate' => $this->input->post('non_activedate',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'last_updatetime' => $this->input->post('last_updatetime',TRUE),
	    );

            $this->Sales_mentah_model->update($this->input->post('npp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sales_mentah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_mentah_model->get_by_id($id);

        if ($row) {
            $this->Sales_mentah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales_mentah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_mentah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sales_name', 'sales name', 'trim|required');
	$this->form_validation->set_rules('sales_type', 'sales type', 'trim|required');
	$this->form_validation->set_rules('officeID', 'officeid', 'trim|required');
	$this->form_validation->set_rules('activedate', 'activedate', 'trim|required');
	$this->form_validation->set_rules('grade', 'grade', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('upliner_npp', 'upliner npp', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('non_activedate', 'non activedate', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('last_updatetime', 'last updatetime', 'trim|required');

	$this->form_validation->set_rules('npp', 'npp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sales_mentah.xls";
        $judul = "sales_mentah";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sales Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Sales Type");
	xlsWriteLabel($tablehead, $kolomhead++, "OfficeID");
	xlsWriteLabel($tablehead, $kolomhead++, "Activedate");
	xlsWriteLabel($tablehead, $kolomhead++, "Grade");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Upliner Npp");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Non Activedate");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Updatetime");

	foreach ($this->Sales_mentah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sales_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sales_type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->officeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activedate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->grade);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->upliner_npp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->non_activedate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_updatetime);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sales_mentah.doc");

        $data = array(
            'sales_mentah_data' => $this->Sales_mentah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sales_mentah/sales_mentah_doc',$data);
    }

}

/* End of file Sales_mentah.php */
/* Location: ./application/controllers/Sales_mentah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */