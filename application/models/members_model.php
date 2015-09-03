<?php

/**
* 
*/
class Members_model extends CI_model
{
	
	public function get_members(){

		$query = $this->db->get('members');

		return $query;
	}


}



?>