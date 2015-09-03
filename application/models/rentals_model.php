<?php

/**
* 
*/
class Rentals_model extends CI_model
{
	
	public function create_rental(){

		$rental_quantity = $this->input->post('rental_quantity');
		$book_id = $this->input->post('book_id');
		$member_id = $this->input->post('member_id');

		$data = array(
			'member_id' => $member_id,
			'book_id' => $book_id,
			'rental_quantity' => $rental_quantity
			);

		// Get Book Number in Books Table
		$book_quantity = $this->Books_model->get_book_quantity($book_id); 

		if($rental_quantity < $book_quantity->book_quantity){

			$book_remain = $book_quantity->book_quantity - $rental_quantity;

			$this->Books_model->update_book_quantity($book_id, $book_remain);

			$insert_data = $this->db->insert('rentals', $data);
		}

		return $insert_data;
	}

	public function get_rentals(){

		//$this->db->join('comments', 'comments.id = blogs.id');
		$this->db->join('members', 'members.member_id = rentals.member_id');
		$this->db->join('books', 'books.book_id = rentals.book_id');
		$this->db->order_by('rental_date', 'DESC');
		$query = $this->db->get('rentals');

		return $query->result();
	}

}

?>