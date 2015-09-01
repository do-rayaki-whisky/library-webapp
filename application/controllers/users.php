<?php

/**
* 
*/
class Users extends CI_Controller
{
	
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user_login = $this->Users_model->get_user($username, $password);

		if($user_login->num_rows() == 1){
			$user_data = array(
				'displayname' => $user_login->row(0)->user_displayname,
				'logged_in' => TRUE
				);

			$this->session->set_userdata($user_data);
			redirect('books');
		} else {
			$this->session->set_flashdata('login_failed', 'ไม่สามารถเข้าสู่ระบบได้ ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
			redirect('books');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('books');
	}

}


?>