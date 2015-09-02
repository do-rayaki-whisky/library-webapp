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
			
			$data['title'] = "เพิ่มรายการหนังสือใหม่";
			$data['content_view'] = 'books/book_add_view';
			$this->load->view('layout/main_layout', $data);

		} else {
			redirect('books');
		}
	}

	public function savebook(){
		echo "Save Book";
	}
}

?>

