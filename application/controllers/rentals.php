<?php 

/**
* 
*/
class rentals extends CI_controller
{

	public function index(){
		$data['title'] = 'รายการหนังสือที่ถูกยืม';
		$data['rentals'] = $this->Rentals_model->get_rentals();
		$data['content_view'] = 'rental/rental_index_view';

		$this->load->view('layout/main_layout', $data);
	}

	public function borrow(){

		$this->form_validation->set_rules('member_id', 'Member ID', 'trim|is_natural_no_zero',
				array('is_natural_no_zero' => 'ยังไม่ได้เลือกเลือกสมาชิก')
				);

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'ทำรายการยืมหนังสือ';
			$data['members'] = $this->Members_model->get_members();
			$data['books'] = $this->Books_model->get_books();
			$data['content_view'] = 'rental/rental_borrow_view';

			$this->load->view('layout/main_layout', $data);
		} else {

			if($this->Rentals_model->create_rental()){
				redirect('rentals');
			} else {
				redirect('rentals/borrow');
			}
		}
	}
}


?>