<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $transaksi = $this->Transaksi_model->get_all();
        $data = array(
            'transaksi_data' => $transaksi,
        );

        $this->load->view('template/header');
        $this->load->view('transaksi/tb_transaksi_list', $data);
        $this->load->view('template/footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            
            $data = array(
        		'KODE_TRANSAKSI' => $row->KODE_TRANSAKSI,
        		'ID_USER' => $row->ID_USER,
                'NAMA_USER' => $row->NAME,
        		'TGL_ORDER' => $row->TGL_ORDER,
        		'TOTAL_PEMBAYARAN' => $row->TOTAL_PEMBAYARAN,
        		'TGL_PEMBAYARAN' => $row->TGL_PEMBAYARAN,
        		'BUKTI_PEMBAYARAN' => $row->BUKTI_PEMBAYARAN,
        		'STATUS_PEMBAYARAN' => $row->STATUS_PEMBAYARAN,
        		'STATUS_TRANSAKSI' => $row->STATUS_TRANSAKSI,
        	    'DETAIL_TRANSAKSI' => $this->Transaksi_model->get_detail_id($id),
            );


            $this->load->view('template/header');
            $this->load->view('transaksi/tb_transaksi_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'KODE_TRANSAKSI' => set_value('KODE_TRANSAKSI'),
	    'ID_USER' => set_value('ID_USER'),
	    'TGL_ORDER' => set_value('TGL_ORDER'),
	    'TOTAL_PEMBAYARAN' => set_value('TOTAL_PEMBAYARAN'),
	    'TGL_PEMBAYARAN' => set_value('TGL_PEMBAYARAN'),
	    'BUKTI_PEMBAYARAN' => set_value('BUKTI_PEMBAYARAN'),
	    'STATUS_PEMBAYARAN' => set_value('STATUS_PEMBAYARAN'),
	    'STATUS_TRANSAKSI' => set_value('STATUS_TRANSAKSI'),
	);
        $this->load->view('template/header');
        $this->load->view('transaksi/tb_transaksi_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_USER' => $this->input->post('ID_USER',TRUE),
		'TGL_ORDER' => $this->input->post('TGL_ORDER',TRUE),
		'TOTAL_PEMBAYARAN' => $this->input->post('TOTAL_PEMBAYARAN',TRUE),
		'TGL_PEMBAYARAN' => $this->input->post('TGL_PEMBAYARAN',TRUE),
		'BUKTI_PEMBAYARAN' => $this->input->post('BUKTI_PEMBAYARAN',TRUE),
		'STATUS_PEMBAYARAN' => $this->input->post('STATUS_PEMBAYARAN',TRUE),
		'STATUS_TRANSAKSI' => $this->input->post('STATUS_TRANSAKSI',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'KODE_TRANSAKSI' => set_value('KODE_TRANSAKSI', $row->KODE_TRANSAKSI),
		'ID_USER' => set_value('ID_USER', $row->ID_USER),
		'TGL_ORDER' => set_value('TGL_ORDER', $row->TGL_ORDER),
		'TOTAL_PEMBAYARAN' => set_value('TOTAL_PEMBAYARAN', $row->TOTAL_PEMBAYARAN),
		'TGL_PEMBAYARAN' => set_value('TGL_PEMBAYARAN', $row->TGL_PEMBAYARAN),
		'BUKTI_PEMBAYARAN' => set_value('BUKTI_PEMBAYARAN', $row->BUKTI_PEMBAYARAN),
		'STATUS_PEMBAYARAN' => set_value('STATUS_PEMBAYARAN', $row->STATUS_PEMBAYARAN),
		'STATUS_TRANSAKSI' => set_value('STATUS_TRANSAKSI', $row->STATUS_TRANSAKSI),
	    );
            $this->load->view('template/header');
            $this->load->view('transaksi/tb_transaksi_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('KODE_TRANSAKSI', TRUE));
        } else {
            $data = array(
		'ID_USER' => $this->input->post('ID_USER',TRUE),
		'TGL_ORDER' => $this->input->post('TGL_ORDER',TRUE),
		'TOTAL_PEMBAYARAN' => $this->input->post('TOTAL_PEMBAYARAN',TRUE),
		'TGL_PEMBAYARAN' => $this->input->post('TGL_PEMBAYARAN',TRUE),
		'BUKTI_PEMBAYARAN' => $this->input->post('BUKTI_PEMBAYARAN',TRUE),
		'STATUS_PEMBAYARAN' => $this->input->post('STATUS_PEMBAYARAN',TRUE),
		'STATUS_TRANSAKSI' => $this->input->post('STATUS_TRANSAKSI',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('KODE_TRANSAKSI', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_USER', 'id user', 'trim|required');
	$this->form_validation->set_rules('TGL_ORDER', 'tgl order', 'trim|required');
	$this->form_validation->set_rules('TOTAL_PEMBAYARAN', 'total pembayaran', 'trim|required|numeric');
	$this->form_validation->set_rules('TGL_PEMBAYARAN', 'tgl pembayaran', 'trim|required');
	$this->form_validation->set_rules('BUKTI_PEMBAYARAN', 'bukti pembayaran', 'trim|required');
	$this->form_validation->set_rules('STATUS_PEMBAYARAN', 'status pembayaran', 'trim|required');
	$this->form_validation->set_rules('STATUS_TRANSAKSI', 'status transaksi', 'trim|required');

	$this->form_validation->set_rules('KODE_TRANSAKSI', 'KODE_TRANSAKSI', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function cancel($id){
        $data["STATUS"]=2;
        $kode=$this->Transaksi_model->cancel($data,$id);
        redirect(site_url('transaksi/read/'.$kode));
    }
    
    public function confirm($id){
        $data["STATUS"]=1;
        $kode=$this->Transaksi_model->confirm($data,$id);
        redirect(site_url('transaksi/read/'.$kode));
    }

    public function selesai($id){
        $data["STATUS_MOBIL"]=2;
        $data["STATUS"]=3;
        $kode=$this->Transaksi_model->selesai($data,$id);
        redirect(site_url('transaksi/read/'.$kode));
    }


}
