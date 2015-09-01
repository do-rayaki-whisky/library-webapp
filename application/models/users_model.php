<?php

/**
* 
*/
class Users_model extends CI_model
{
	
	public function get_user($username, $password){

		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);

		$query = $this->db->get('users');

		return $query;
	}

}


?>