<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performances extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performances_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'performances/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'performances/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'performances/index.html';
            $config['first_url'] = base_url() . 'performances/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Performances_model->total_rows($q);
        $performances = $this->Performances_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'performances_data' => $performances,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('performances/performances_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Performances_model->get_by_id($id);
        if ($row) {
            $data = array(
		'npp' => $row->npp,
		'kpiid' => $row->kpiid,
		'year' => $row->year,
		'month' => $row->month,
		'bobot' => $row->bobot,
		'realisasi' => $row->realisasi,
		'performance' => $row->performance,
	    );
            $this->load->view('performances/performances_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performances'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('performances/create_action'),
	    'npp' => set_value('npp'),
	    'kpiid' => set_value('kpiid'),
	    'year' => set_value('year'),
	    'month' => set_value('month'),
	    'bobot' => set_value('bobot'),
	    'realisasi' => set_value('realisasi'),
	    'performance' => set_value('performance'),
	);
        $this->load->view('performances/performances_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bobot' => $this->input->post('bobot',TRUE),
		'realisasi' => $this->input->post('realisasi',TRUE),
		'performance' => $this->input->post('performance',TRUE),
	    );

            $this->Performances_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('performances'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Performances_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('performances/update_action'),
		'npp' => set_value('npp', $row->npp),
		'kpiid' => set_value('kpiid', $row->kpiid),
		'year' => set_value('year', $row->year),
		'month' => set_value('month', $row->month),
		'bobot' => set_value('bobot', $row->bobot),
		'realisasi' => set_value('realisasi', $row->realisasi),
		'performance' => set_value('performance', $row->performance),
	    );
            $this->load->view('performances/performances_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performances'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('npp', TRUE));
        } else {
            $data = array(
		'bobot' => $this->input->post('bobot',TRUE),
		'realisasi' => $this->input->post('realisasi',TRUE),
		'performance' => $this->input->post('performance',TRUE),
	    );

            $this->Performances_model->update($this->input->post('npp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('performances'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Performances_model->get_by_id($id);

        if ($row) {
            $this->Performances_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('performances'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performances'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bobot', 'bobot', 'trim|required');
	$this->form_validation->set_rules('realisasi', 'realisasi', 'trim|required');
	$this->form_validation->set_rules('performance', 'performance', 'trim|required');

	$this->form_validation->set_rules('npp', 'npp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "performances.xls";
        $judul = "performances";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Bobot");
	xlsWriteLabel($tablehead, $kolomhead++, "Realisasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Performance");

	foreach ($this->Performances_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bobot);
	    xlsWriteLabel($tablebody, $kolombody++, $data->realisasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->performance);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=performances.doc");

        $data = array(
            'performances_data' => $this->Performances_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('performances/performances_doc',$data);
    }

}

/* End of file Performances.php */
/* Location: ./application/controllers/Performances.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */