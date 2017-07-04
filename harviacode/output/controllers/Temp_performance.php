<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp_performance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Temp_performance_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'temp_performance/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'temp_performance/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'temp_performance/index.html';
            $config['first_url'] = base_url() . 'temp_performance/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Temp_performance_model->total_rows($q);
        $temp_performance = $this->Temp_performance_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'temp_performance_data' => $temp_performance,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('temp_performance/temp_performance_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Temp_performance_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
	    );
            $this->load->view('temp_performance/temp_performance_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('temp_performance'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('temp_performance/create_action'),
	    'npp' => set_value('npp'),
	);
        $this->load->view('temp_performance/temp_performance_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
	    );

            $this->Temp_performance_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('temp_performance'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Temp_performance_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('temp_performance/update_action'),
		'npp' => set_value('npp', $row->npp),
	    );
            $this->load->view('temp_performance/temp_performance_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('temp_performance'));
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
	    );

            $this->Temp_performance_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('temp_performance'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Temp_performance_model->get_by_id($id);

        if ($row) {
            $this->Temp_performance_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('temp_performance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('temp_performance'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npp', 'npp', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "temp_performance.xls";
        $judul = "temp_performance";
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

	foreach ($this->Temp_performance_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=temp_performance.doc");

        $data = array(
            'temp_performance_data' => $this->Temp_performance_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('temp_performance/temp_performance_doc',$data);
    }

}

/* End of file Temp_performance.php */
/* Location: ./application/controllers/Temp_performance.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */