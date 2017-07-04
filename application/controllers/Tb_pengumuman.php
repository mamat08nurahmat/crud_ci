<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_pengumuman_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tb_pengumuman/tb_pengumuman_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tb_pengumuman_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tb_pengumuman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'slug' => $row->slug,
		'isi' => $row->isi,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('tb_pengumuman/tb_pengumuman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pengumuman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_pengumuman/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'slug' => set_value('slug'),
	    'isi' => set_value('isi'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('tb_pengumuman/tb_pengumuman_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'isi' => $this->input->post('isi',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tb_pengumuman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_pengumuman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_pengumuman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_pengumuman/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'slug' => set_value('slug', $row->slug),
		'isi' => set_value('isi', $row->isi),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('tb_pengumuman/tb_pengumuman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pengumuman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'isi' => $this->input->post('isi',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tb_pengumuman_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_pengumuman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_pengumuman_model->get_by_id($id);

        if ($row) {
            $this->Tb_pengumuman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_pengumuman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pengumuman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_pengumuman.xls";
        $judul = "tb_pengumuman";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Slug");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->Tb_pengumuman_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->slug);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_pengumuman.doc");

        $data = array(
            'tb_pengumuman_data' => $this->Tb_pengumuman_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_pengumuman/tb_pengumuman_doc',$data);
    }

}

/* End of file Tb_pengumuman.php */
/* Location: ./application/controllers/Tb_pengumuman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-11 09:43:30 */
/* http://harviacode.com */