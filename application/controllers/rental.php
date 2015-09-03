<?php 

/**
* 
*/
class rental extends CI_controller
{

	public function index(){

	}

	public function borrow(){

		$data['title'] = 'ทำรายการยืมหนังสือ';
		$data['members'] = $this->Members_model->get_members();
		$data['books'] = $this->Books_model->get_books();
		$data['content_view'] = 'rental/rental_borrow_view';

		$this->load->view('layout/main_layout', $data);
	}


}


?>