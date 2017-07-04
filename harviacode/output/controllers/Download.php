<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Download_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'download/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'download/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'download/index.html';
            $config['first_url'] = base_url() . 'download/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Download_model->total_rows($q);
        $download = $this->Download_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'download_data' => $download,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('download/download_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Download_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal_upload' => $row->tanggal_upload,
		'nama_file' => $row->nama_file,
		'tipe_file' => $row->tipe_file,
		'ukuran_file' => $row->ukuran_file,
		'file' => $row->file,
	    );
            $this->load->view('download/download_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('download/create_action'),
	    'id' => set_value('id'),
	    'tanggal_upload' => set_value('tanggal_upload'),
	    'nama_file' => set_value('nama_file'),
	    'tipe_file' => set_value('tipe_file'),
	    'ukuran_file' => set_value('ukuran_file'),
	    'file' => set_value('file'),
	);
        $this->load->view('download/download_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_upload' => $this->input->post('tanggal_upload',TRUE),
		'nama_file' => $this->input->post('nama_file',TRUE),
		'tipe_file' => $this->input->post('tipe_file',TRUE),
		'ukuran_file' => $this->input->post('ukuran_file',TRUE),
		'file' => $this->input->post('file',TRUE),
	    );

            $this->Download_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Download_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('download/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal_upload' => set_value('tanggal_upload', $row->tanggal_upload),
		'nama_file' => set_value('nama_file', $row->nama_file),
		'tipe_file' => set_value('tipe_file', $row->tipe_file),
		'ukuran_file' => set_value('ukuran_file', $row->ukuran_file),
		'file' => set_value('file', $row->file),
	    );
            $this->load->view('download/download_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tanggal_upload' => $this->input->post('tanggal_upload',TRUE),
		'nama_file' => $this->input->post('nama_file',TRUE),
		'tipe_file' => $this->input->post('tipe_file',TRUE),
		'ukuran_file' => $this->input->post('ukuran_file',TRUE),
		'file' => $this->input->post('file',TRUE),
	    );

            $this->Download_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Download_model->get_by_id($id);

        if ($row) {
            $this->Download_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('download'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_upload', 'tanggal upload', 'trim|required');
	$this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');
	$this->form_validation->set_rules('tipe_file', 'tipe file', 'trim|required');
	$this->form_validation->set_rules('ukuran_file', 'ukuran file', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "download.xls";
        $judul = "download";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Upload");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama File");
	xlsWriteLabel($tablehead, $kolomhead++, "Tipe File");
	xlsWriteLabel($tablehead, $kolomhead++, "Ukuran File");
	xlsWriteLabel($tablehead, $kolomhead++, "File");

	foreach ($this->Download_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_upload);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_file);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipe_file);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ukuran_file);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=download.doc");

        $data = array(
            'download_data' => $this->Download_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('download/download_doc',$data);
    }

}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 17:49:32 */
/* http://harviacode.com */