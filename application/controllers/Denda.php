<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Denda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Denda_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $denda = $this->Denda_model->get_all();
        $data = array(
            'denda_data' => $denda,
        );

        $this->load->view('template/header');
        $this->load->view('denda/tb_denda_list', $data);
        $this->load->view('template/footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Denda_model->json();
    }

    public function read($id) 
    {
        $row = $this->Denda_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_DENDA' => $row->ID_DENDA,
		'ID_DETAIL_TRANSAKSI' => $row->ID_DETAIL_TRANSAKSI,
		'JUMLAH_HARI' => $row->JUMLAH_HARI,
		'TOTAL_DENDA' => $row->TOTAL_DENDA,
	    );
            $this->load->view('template/header');
            $this->load->view('denda/tb_denda_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('denda/create_action'),
	    'ID_DENDA' => set_value('ID_DENDA'),
	    'ID_DETAIL_TRANSAKSI' => set_value('ID_DETAIL_TRANSAKSI'),
	    'JUMLAH_HARI' => set_value('JUMLAH_HARI'),
	    'TOTAL_DENDA' => set_value('TOTAL_DENDA'),
	);
        $this->load->view('template/header');
        $this->load->view('denda/tb_denda_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_DETAIL_TRANSAKSI' => $this->input->post('ID_DETAIL_TRANSAKSI',TRUE),
		'JUMLAH_HARI' => $this->input->post('JUMLAH_HARI',TRUE),
		'TOTAL_DENDA' => $this->input->post('TOTAL_DENDA',TRUE),
	    );

            $this->Denda_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('denda'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Denda_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('denda/update_action'),
		'ID_DENDA' => set_value('ID_DENDA', $row->ID_DENDA),
		'ID_DETAIL_TRANSAKSI' => set_value('ID_DETAIL_TRANSAKSI', $row->ID_DETAIL_TRANSAKSI),
		'JUMLAH_HARI' => set_value('JUMLAH_HARI', $row->JUMLAH_HARI),
		'TOTAL_DENDA' => set_value('TOTAL_DENDA', $row->TOTAL_DENDA),
	    );
            $this->load->view('template/header');
            $this->load->view('denda/tb_denda_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_DENDA', TRUE));
        } else {
            $data = array(
		'ID_DETAIL_TRANSAKSI' => $this->input->post('ID_DETAIL_TRANSAKSI',TRUE),
		'JUMLAH_HARI' => $this->input->post('JUMLAH_HARI',TRUE),
		'TOTAL_DENDA' => $this->input->post('TOTAL_DENDA',TRUE),
	    );

            $this->Denda_model->update($this->input->post('ID_DENDA', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('denda'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Denda_model->get_by_id($id);

        if ($row) {
            $this->Denda_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('denda'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_DETAIL_TRANSAKSI', 'id detail transaksi', 'trim|required');
	$this->form_validation->set_rules('JUMLAH_HARI', 'jumlah hari', 'trim|required');
	$this->form_validation->set_rules('TOTAL_DENDA', 'total denda', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_DENDA', 'ID_DENDA', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Denda.php */
/* Location: ./application/controllers/Denda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-21 21:49:18 */
/* http://harviacode.com */