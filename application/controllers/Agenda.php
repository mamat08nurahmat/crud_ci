<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('agenda/agenda_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Agenda_model->json();
    }

    public function read($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);
        if ($row) {
            $data = array(
		'user_id' => $row->user_id,
		'year' => $row->year,
		'month' => $row->month,
		'agenda' => $row->agenda,
	    );
            $this->load->view('agenda/agenda_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agenda/create_action'),
	    'user_id' => set_value('user_id'),
	    'year' => set_value('year'),
	    'month' => set_value('month'),
	    'agenda' => set_value('agenda'),
	);
        $this->load->view('agenda/agenda_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'year' => $this->input->post('year',TRUE),
		'month' => $this->input->post('month',TRUE),
		'agenda' => $this->input->post('agenda',TRUE),
	    );

            $this->Agenda_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agenda'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agenda/update_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'year' => set_value('year', $row->year),
		'month' => set_value('month', $row->month),
		'agenda' => set_value('agenda', $row->agenda),
	    );
            $this->load->view('agenda/agenda_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'year' => $this->input->post('year',TRUE),
		'month' => $this->input->post('month',TRUE),
		'agenda' => $this->input->post('agenda',TRUE),
	    );

            $this->Agenda_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agenda'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $this->Agenda_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agenda'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('year', 'year', 'trim|required');
	$this->form_validation->set_rules('month', 'month', 'trim|required');
	$this->form_validation->set_rules('agenda', 'agenda', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "agenda.xls";
        $judul = "agenda";
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
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Year");
	xlsWriteLabel($tablehead, $kolomhead++, "Month");
	xlsWriteLabel($tablehead, $kolomhead++, "Agenda");

	foreach ($this->Agenda_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->year);
	    xlsWriteNumber($tablebody, $kolombody++, $data->month);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agenda);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=agenda.doc");

        $data = array(
            'agenda_data' => $this->Agenda_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('agenda/agenda_doc',$data);
    }

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-09 04:37:01 */
/* http://harviacode.com */