<?php 

class Books_model extends CI_model
{
	public function get_books(){
		$query = $this->db->get('books');
		return $query->result();
	}

	public function get_book_quantity($book_id){

		$this->db->where('book_id', $book_id);
		$query = $this->db->get('books');

		return $query->row();
	}

	public function create_book(){

		$data = array(

			'book_isbn' => $this->input->post('isbn'),
			'book_name' => $this->input->post('bookname'),
			'book_writer' => $this->input->post('writer'),
			'book_price' => $this->input->post('price'),
			'book_quantity' => $this->input->post('quantity'),

			);

		$insert_data = $this->db->insert('books', $data);

		return $insert_data;
	}

	public function update_book_quantity($book_id, $book_quantity){
		$data = array('book_quantity'=> $book_quantity);
		$this->db->where('book_id', $book_id);
		$this->db->update('books', $data);
	}



}


?>