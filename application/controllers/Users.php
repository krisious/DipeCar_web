<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $users = $this->Users_model->get_all();
        $data = array(
            'users_data' => $users,
        );

        $this->load->view('template/header');
        $this->load->view('users/tb_users_list', $data);
        $this->load->view('template/footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Users_model->json();
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_USER' => $row->ID_USER,
		'USERNAME' => $row->USERNAME,
		'NAME' => $row->NAME,
		'EMAIL' => $row->EMAIL,
		'NO_TELP' => $row->NO_TELP,
		'JENIS_KELAMIN' => $row->JENIS_KELAMIN,
		'ALAMAT' => $row->ALAMAT,
		'PASSWORD' => $row->PASSWORD,
		'PHOTO' => $row->PHOTO,
		'ACTIVATED' => $row->ACTIVATED,
		'CREATED' => $row->CREATED,
		'GROUP_USER' => $row->GROUP_USER,
		'LAST_LOGIN' => $row->LAST_LOGIN,
		'LAST_UPDATE' => $row->LAST_UPDATE,
	    );
            $this->load->view('template/header');
            $this->load->view('users/tb_users_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
    	    'ID_USER' => set_value('ID_USER'),
    	    'USERNAME' => set_value('USERNAME'),
    	    'NAME' => set_value('NAME'),
    	    'EMAIL' => set_value('EMAIL'),
    	    'NO_TELP' => set_value('NO_TELP'),
    	    'JENIS_KELAMIN' => set_value('JENIS_KELAMIN'),
    	    'ALAMAT' => set_value('ALAMAT'),
    	    'PASSWORD' => set_value('PASSWORD'),
    	    'PHOTO' => set_value('PHOTO'),
    	    'ACTIVATED' => set_value('ACTIVATED'),
    	    'CREATED' => set_value('CREATED'),
    	    'GROUP_USER' => set_value('GROUP_USER'),
    	    'LAST_LOGIN' => set_value('LAST_LOGIN'),
    	    'LAST_UPDATE' => set_value('LAST_UPDATE'),
    	);
        $this->load->view('template/header');
        $this->load->view('users/tb_users_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'USERNAME' => $this->input->post('USERNAME',TRUE),
		'NAME' => $this->input->post('NAME',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'NO_TELP' => $this->input->post('NO_TELP',TRUE),
		'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN',TRUE),
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'PASSWORD' => $this->input->post('PASSWORD',TRUE),
		'PHOTO' => $this->input->post('PHOTO',TRUE),
		'ACTIVATED' => $this->input->post('ACTIVATED',TRUE),
		'CREATED' => $this->input->post('CREATED',TRUE),
		'GROUP_USER' => $this->input->post('GROUP_USER',TRUE),
		'LAST_LOGIN' => $this->input->post('LAST_LOGIN',TRUE),
		'LAST_UPDATE' => $this->input->post('LAST_UPDATE',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'ID_USER' => set_value('ID_USER', $row->ID_USER),
		'USERNAME' => set_value('USERNAME', $row->USERNAME),
		'NAME' => set_value('NAME', $row->NAME),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'NO_TELP' => set_value('NO_TELP', $row->NO_TELP),
		'JENIS_KELAMIN' => set_value('JENIS_KELAMIN', $row->JENIS_KELAMIN),
		'ALAMAT' => set_value('ALAMAT', $row->ALAMAT),
		'PASSWORD' => set_value('PASSWORD', $row->PASSWORD),
		'PHOTO' => set_value('PHOTO', $row->PHOTO),
		'ACTIVATED' => set_value('ACTIVATED', $row->ACTIVATED),
		'CREATED' => set_value('CREATED', $row->CREATED),
		'GROUP_USER' => set_value('GROUP_USER', $row->GROUP_USER),
		'LAST_LOGIN' => set_value('LAST_LOGIN', $row->LAST_LOGIN),
		'LAST_UPDATE' => set_value('LAST_UPDATE', $row->LAST_UPDATE),
	    );
            $this->load->view('template/header');
            $this->load->view('users/tb_users_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_USER', TRUE));
        } else {
            $data = array(
		'USERNAME' => $this->input->post('USERNAME',TRUE),
		'NAME' => $this->input->post('NAME',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'NO_TELP' => $this->input->post('NO_TELP',TRUE),
		'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN',TRUE),
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'PASSWORD' => $this->input->post('PASSWORD',TRUE),
		'PHOTO' => $this->input->post('PHOTO',TRUE),
		'ACTIVATED' => $this->input->post('ACTIVATED',TRUE),
		'CREATED' => $this->input->post('CREATED',TRUE),
		'GROUP_USER' => $this->input->post('GROUP_USER',TRUE),
		'LAST_LOGIN' => $this->input->post('LAST_LOGIN',TRUE),
		'LAST_UPDATE' => $this->input->post('LAST_UPDATE',TRUE),
	    );

            $this->Users_model->update($this->input->post('ID_USER', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('USERNAME', 'username', 'trim|required');
    	$this->form_validation->set_rules('NAME', 'name', 'trim|required');
    	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
    	$this->form_validation->set_rules('NO_TELP', 'no telp', 'trim|required');
    	$this->form_validation->set_rules('JENIS_KELAMIN', 'jenis kelamin', 'trim|required');
    	$this->form_validation->set_rules('ALAMAT', 'alamat', 'trim|required');
    	$this->form_validation->set_rules('PASSWORD', 'password', 'trim|required');
    	$this->form_validation->set_rules('PHOTO', 'photo', 'trim|required');
    	$this->form_validation->set_rules('ACTIVATED', 'activated', 'trim|required');
    	$this->form_validation->set_rules('CREATED', 'created', 'trim|required');
    	$this->form_validation->set_rules('GROUP_USER', 'group user', 'trim|required');
    	$this->form_validation->set_rules('LAST_LOGIN', 'last login', 'trim|required');
    	$this->form_validation->set_rules('LAST_UPDATE', 'last update', 'trim|required');

    	$this->form_validation->set_rules('ID_USER', 'ID_USER', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
