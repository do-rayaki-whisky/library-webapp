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
}

?>

