<?php  

/**
* 
*/
class m_user extends CI_Model
{


	function login($username,$password){
		$this->db->where("EMAIL",$username);
		$this->db->where("PASSWORD",$password);
		return $this->db->get("tb_users")->row();
	}

}


?>