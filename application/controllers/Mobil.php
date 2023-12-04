<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mobil');
        $this->load->model('M_fasilitas');
        $this->load->model('M_fasilitas_mobil');
        $this->load->library('form_validation');        
        $this->load->library('upload');
    	$this->load->library('datatables');
    }

    public function index()
    {
        $data['data']=$this->M_mobil->get_all();
        $this->load->view('template/header');
        $this->load->view('mobil/tb_mobil_list',$data);
        $this->load->view('template/footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_mobil->json();
    }

    public function read($id) 
    {
        $row = $this->M_mobil->get_by_id($id);
        
        if ($row) {
            $data = array(
        		'ID_MOBIL' => $row->ID_MOBIL,
        		'NAMA_MOBIL' => $row->NAMA_MOBIL,
        		'MERK_MOBIL' => $row->MERK_MOBIL,
        		'DESKRIPSI_MOBIL' => $row->DESKRIPSI_MOBIL,
        		'TAHUN_MOBIL' => $row->TAHUN_MOBIL,
        		'KAPASITAS_MOBIL' => $row->KAPASITAS_MOBIL,
        		'HARGA_MOBIL' => $row->HARGA_MOBIL,
        		'WARNA_MOBIL' => $row->WARNA_MOBIL,
        		'BENSIN_MOBIL' => $this->bensin($row->BENSIN_MOBIL),
        		'PLAT_NO_MOBIL' => $row->PLAT_NO_MOBIL,
        		'STATUS_SEWA' => $row->STATUS_SEWA,
        		'STATUS_MOBIL' => $row->STATUS_MOBIL,
        		'CREATED_MOBIL' => $row->CREATED_MOBIL,
                'IMAGE' => $row->IMAGE,
                'FASILITAS' => $this->M_fasilitas_mobil->get_by_id($id),
	        );
            $this->load->view('template/header');
            $this->load->view('mobil/tb_mobil_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mobil/create_action'),
    	    'ID_MOBIL' => set_value('ID_MOBIL'),
    	    'NAMA_MOBIL' => set_value('NAMA_MOBIL'),
    	    'MERK_MOBIL' => set_value('MERK_MOBIL'),
    	    'DESKRIPSI_MOBIL' => set_value('DESKRIPSI_MOBIL'),
    	    'TAHUN_MOBIL' => set_value('TAHUN_MOBIL'),
    	    'KAPASITAS_MOBIL' => set_value('KAPASITAS_MOBIL'),
    	    'HARGA_MOBIL' => set_value('HARGA_MOBIL'),
    	    'WARNA_MOBIL' => set_value('WARNA_MOBIL'),
    	    'BENSIN_MOBIL' => set_value('BENSIN_MOBIL'),
    	    'PLAT_NO_MOBIL' => set_value('PLAT_NO_MOBIL'),
	        'STATUS_SEWA' => set_value('STATUS_SEWA'),
	        'STATUS_MOBIL' => set_value('STATUS_MOBIL'),
	        'CREATED_MOBIL' => set_value('CREATED_MOBIL'),
    	);
        $data['fasilitas']=$this->M_fasilitas->get_all();
        
        foreach ($data['fasilitas'] as $var) {
            $data['fasilitas_mobil'][$var->ID_FASILITAS]="";
        }
            
        // $data['fasilitas_mobil']=$this->M_fasilitas_mobil->get_by_id(0);
        $this->load->view('template/header');
        $this->load->view('mobil/tb_mobil_form', $data);
        $this->load->view('template/footer');        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data["data"] = array(
        		'NAMA_MOBIL' => $this->input->post('NAMA_MOBIL',TRUE),
        		'MERK_MOBIL' => $this->input->post('MERK_MOBIL',TRUE),
        		'DESKRIPSI_MOBIL' => $this->input->post('DESKRIPSI_MOBIL',TRUE),
        		'TAHUN_MOBIL' => $this->input->post('TAHUN_MOBIL',TRUE),
        		'KAPASITAS_MOBIL' => $this->input->post('KAPASITAS_MOBIL',TRUE),
        		'HARGA_MOBIL' => $this->input->post('HARGA_MOBIL',TRUE),
        		'WARNA_MOBIL' => $this->input->post('WARNA_MOBIL',TRUE),
        		'BENSIN_MOBIL' => $this->input->post('BENSIN_MOBIL',TRUE),
        		'PLAT_NO_MOBIL' => $this->input->post('PLAT_NO_MOBIL',TRUE),
        		'STATUS_SEWA' => $this->input->post('STATUS_SEWA',TRUE),
        		'STATUS_MOBIL' => $this->input->post('STATUS_MOBIL',TRUE),
        		'CREATED_MOBIL' => date('Y-m-d H:i:s'),
    	    );
            $data["fasilitas"]=array();
            $data["photo"]=array();
            $fasilitas=$this->input->post('FASILITAS',TRUE);

            foreach ($fasilitas as $row) {
                $data["fasilitas"][]=array('ID_FASILITAS'=> $row);
            }

                $nama_photo=date("YmdHis").".jpg";
                $config=$this->config_image($nama_photo,"./upload/mobil");
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('PHOTO')){
                    $data["photo"]=array('IMAGE'=> $nama_photo);
                }


            $this->M_mobil->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mobil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_mobil->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mobil/update_action'),
        		'ID_MOBIL' => set_value('ID_MOBIL', $row->ID_MOBIL),
        		'NAMA_MOBIL' => set_value('NAMA_MOBIL', $row->NAMA_MOBIL),
        		'MERK_MOBIL' => set_value('MERK_MOBIL', $row->MERK_MOBIL),
        		'DESKRIPSI_MOBIL' => set_value('DESKRIPSI_MOBIL', $row->DESKRIPSI_MOBIL),
        		'TAHUN_MOBIL' => set_value('TAHUN_MOBIL', $row->TAHUN_MOBIL),
        		'KAPASITAS_MOBIL' => set_value('KAPASITAS_MOBIL', $row->KAPASITAS_MOBIL),
        		'HARGA_MOBIL' => set_value('HARGA_MOBIL', $row->HARGA_MOBIL),
        		'WARNA_MOBIL' => set_value('WARNA_MOBIL', $row->WARNA_MOBIL),
        		'BENSIN_MOBIL' => set_value('BENSIN_MOBIL', $row->BENSIN_MOBIL),
        		'PLAT_NO_MOBIL' => set_value('PLAT_NO_MOBIL', $row->PLAT_NO_MOBIL),
        		'STATUS_SEWA' => set_value('STATUS_SEWA', $row->STATUS_SEWA),
        		'STATUS_MOBIL' => set_value('STATUS_MOBIL', $row->STATUS_MOBIL),
        		'CREATED_MOBIL' => set_value('CREATED_MOBIL', $row->CREATED_MOBIL),
	        );

            $data['fasilitas']=$this->M_fasilitas->get_all();
            $fasilitas_mobil=$this->M_fasilitas_mobil->get_by_id($id);
            foreach ($data['fasilitas'] as $var) {
                $data['fasilitas_mobil'][$var->ID_FASILITAS]="";
            }

            foreach ($fasilitas_mobil as $var) {
                $data['fasilitas_mobil'][$var->ID_FASILITAS]="checked";
            }


            $this->load->view('template/header');
            $this->load->view('mobil/tb_mobil_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_MOBIL', TRUE));
        } else {
            $data['data'] = array(
        		'NAMA_MOBIL' => $this->input->post('NAMA_MOBIL',TRUE),
        		'MERK_MOBIL' => $this->input->post('MERK_MOBIL',TRUE),
        		'DESKRIPSI_MOBIL' => $this->input->post('DESKRIPSI_MOBIL',TRUE),
        		'TAHUN_MOBIL' => $this->input->post('TAHUN_MOBIL',TRUE),
        		'KAPASITAS_MOBIL' => $this->input->post('KAPASITAS_MOBIL',TRUE),
        		'HARGA_MOBIL' => $this->input->post('HARGA_MOBIL',TRUE),
        		'WARNA_MOBIL' => $this->input->post('WARNA_MOBIL',TRUE),
        		'BENSIN_MOBIL' => $this->input->post('BENSIN_MOBIL',TRUE),
        		'PLAT_NO_MOBIL' => $this->input->post('PLAT_NO_MOBIL',TRUE),
        		'STATUS_SEWA' => $this->input->post('STATUS_SEWA',TRUE),
        		'STATUS_MOBIL' => $this->input->post('STATUS_MOBIL',TRUE),
    	    );

            $data["fasilitas"]=array();
            $data["photo"]=array();
            $fasilitas=$this->input->post('FASILITAS',TRUE);

            if ($fasilitas) {
                foreach ($fasilitas as $row) {
                    $data["fasilitas"][]=array('ID_FASILITAS'=> $row);
                }
            }

            $nama_photo=date("YmdHis").".jpg";
            $config=$this->config_image($nama_photo,"./upload/mobil");
            $this->upload->initialize($config);
                
            if($this->upload->do_upload('PHOTO')){
                $data["photo"]=array('IMAGE'=> $nama_photo);
            }


            $this->M_mobil->update($this->input->post('ID_MOBIL', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mobil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_mobil->get_by_id($id);

        if ($row) {
            $this->M_mobil->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NAMA_MOBIL', 'nama mobil', 'trim|required');
	$this->form_validation->set_rules('MERK_MOBIL', 'merk mobil', 'trim|required');
	$this->form_validation->set_rules('DESKRIPSI_MOBIL', 'deskripsi mobil', 'trim|required');
	$this->form_validation->set_rules('TAHUN_MOBIL', 'tahun mobil', 'trim|required');
	$this->form_validation->set_rules('KAPASITAS_MOBIL', 'kapasitas mobil', 'trim|required');
	$this->form_validation->set_rules('HARGA_MOBIL', 'harga mobil', 'trim|required|numeric');
	$this->form_validation->set_rules('WARNA_MOBIL', 'warna mobil', 'trim|required');
	$this->form_validation->set_rules('BENSIN_MOBIL', 'bensin mobil', 'trim|required');
	$this->form_validation->set_rules('PLAT_NO_MOBIL', 'plat no mobil', 'trim|required');
	$this->form_validation->set_rules('STATUS_SEWA', 'status sewa', 'trim|required');
	$this->form_validation->set_rules('STATUS_MOBIL', 'status mobil', 'trim|required');
	// $this->form_validation->set_rules('CREATED_MOBIL', 'created mobil', 'trim|required');

	$this->form_validation->set_rules('ID_MOBIL', 'ID_MOBIL', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function config_image($file_name,$path){
        $config['image_library'] = 'gd2';
        $config['file_name']=$file_name;
        $config['upload_path']=$path;
        $config['allowed_types']='png|jpg|gif';
        $config['max_size']=50000;
        $config['max_height']=50000;
        $config['max_width']=50000;
        $config['overwrite']=TRUE;
        return $config;
    }

    public function bensin($key){
        $bensin = array('','Premium','Pertalite','Pertamax');
        return $bensin[$key];
    }

}