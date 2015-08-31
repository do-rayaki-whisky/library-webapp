<?php 

class Books_model extends CI_model
{
	public function get_books(){
		$query = $this->db->get('books');
		return $query->result();
	}
}


?>