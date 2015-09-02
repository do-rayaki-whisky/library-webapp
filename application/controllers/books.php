<?php 

class Books extends CI_Controller {

	public function index()
	{
		$data['title'] = "ระบบงานห้องสมุด";

		$this->load->model('Books_model');
		$data['book'] = $this->Books_model->get_books();

		$data['content_view'] = 'books/main';
		$this->load->view('layout/main_layout', $data);
	}

	public function newbook(){
		if($this->session->userdata('logged_in')){
			

			$this->form_validation->set_rules('bookname', 'Book Name', 'trim|required',
				array('required' => 'ชื่อหนังสือ เว้นว่าง ไม่ได้')
				);
			$this->form_validation->set_rules('writer', 'Writer', 'trim|required',
				array('required' => 'ชื่อผู้เขียน เว้นว่าง ไม่ได้')
				);
			$this->form_validation->set_rules('isbn', 'ISBN', 'trim|numeric|exact_length[13]',
				array(
					'numeric' => 'หมายเลข ISBN ต้องเป็นตัวเลขเท่านั้น',
					'exact_length' => 'หมายเลข ISBN ต้องมี 13 หลัก'
					)
				);
			$this->form_validation->set_rules('price', 'Price', 'trim|numeric',
				array('numeric' => 'ราคา ต้องเป็นตัวเลขเท่านั้น')
				);
			$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|integer',
				array(
					'required' => 'จำนวนหนังสือ เว้นว่างไม่ได้',
					'integer' => 'จำนวนหนังสือ ต้องเป็นตัวเลขเท่านั้น'
					)
				);

			if($this->form_validation->run() == FALSE){


				$data['title'] = "เพิ่มรายการหนังสือใหม่";
				$data['content_view'] = 'books/book_add_view';

				$data['bookname'] = $this->input->post('bookname');
				$data['writer'] = $this->input->post('writer');
				$data['isbn'] = $this->input->post('isbn');
				$data['price'] = $this->input->post('price');
				$data['quantity'] = $this->input->post('quantity');

				$this->load->view('layout/main_layout', $data);

			} else {

				$this->load->model('Books_model');
				if($this->Books_model->create_book()){

					$notification = "หนังสือ " . $this->input->post('bookname') . " ถูกจักเก็บลงฐานข้อมูลเรียบร้อยแล้ว";

					$this->session->set_flashdata('create_book_success', $notification);

					redirect('books/index');
				}
				
			}

		} else {
			redirect('books');
		}
	}

}

?>

