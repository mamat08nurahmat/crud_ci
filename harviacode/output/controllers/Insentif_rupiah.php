<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insentif_rupiah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Insentif_rupiah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'insentif_rupiah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'insentif_rupiah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'insentif_rupiah/index.html';
            $config['first_url'] = base_url() . 'insentif_rupiah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Insentif_rupiah_model->total_rows($q);
        $insentif_rupiah = $this->Insentif_rupiah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'insentif_rupiah_data' => $insentif_rupiah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('insentif_rupiah/insentif_rupiah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Insentif_rupiah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'performance' => $row->performance,
		'insentif' => $row->insentif,
	    );
            $this->load->view('insentif_rupiah/insentif_rupiah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insentif_rupiah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('insentif_rupiah/create_action'),
	    'performance' => set_value('performance'),
	    'insentif' => set_value('insentif'),
	);
        $this->load->view('insentif_rupiah/insentif_rupiah_form', $data);
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

            $this->Insentif_rupiah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('insentif_rupiah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Insentif_rupiah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('insentif_rupiah/update_action'),
		'performance' => set_value('performance', $row->performance),
		'insentif' => set_value('insentif', $row->insentif),
	    );
            $this->load->view('insentif_rupiah/insentif_rupiah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insentif_rupiah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'performance' => $this->input->post('performance',TRUE),
		'insentif' => $this->input->post('insentif',TRUE),
	    );

            $this->Insentif_rupiah_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('insentif_rupiah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Insentif_rupiah_model->get_by_id($id);

        if ($row) {
            $this->Insentif_rupiah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('insentif_rupiah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insentif_rupiah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('performance', 'performance', 'trim|required');
	$this->form_validation->set_rules('insentif', 'insentif', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "insentif_rupiah.xls";
        $judul = "insentif_rupiah";
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

	foreach ($this->Insentif_rupiah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->performance);
	    xlsWriteNumber($tablebody, $kolombody++, $data->insentif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=insentif_rupiah.doc");

        $data = array(
            'insentif_rupiah_data' => $this->Insentif_rupiah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('insentif_rupiah/insentif_rupiah_doc',$data);
    }

}

/* End of file Insentif_rupiah.php */
/* Location: ./application/controllers/Insentif_rupiah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */