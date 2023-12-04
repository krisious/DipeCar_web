<?php  

/**
* 
*/
class login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("m_user");
	}

	function index(){
		if (!empty($this->session->userdata("USERNAME")))
			redirect(base_url("mobil"));

		$this->load->view("v_login");
	}

	function login_proses(){
		$username=$this->input->post("email");
		$password=md5($this->input->post("password"));
		$user=$this->m_user->login($username,$password);
		
		if ($user) {
			$this->session->set_userdata((array)$user);
			redirect(site_url("mobil"));
		}else{
			redirect($this->index());
		}
	}

	function logout(){
		$array_items = array('ID_USER','USERNAME','NAME','EMAIL','NO_TELP','JENIS_KELAMIN','ALAMAT','ACTIVATED','CREATED', 'GROUP_USER','LAST_LOGIN','LAST_UPDATE','PASSWORD','PHOTO');
		$this->session->unset_userdata($array_items);
		redirect($this->index());
	}
}

?>