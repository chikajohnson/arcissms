<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		
	}
	
	public function index()
	{
		//var_dump('am here'); die();
		
		if ($this->session->userdata('user_type')!= 'examiner') {
			redirect('welcome');
		 }

		
		$data['activities']  = $this->activity_model->get_activities();

		$data['main'] = 'examiner/index';
		$this->load->view('examiner/layout/main', $data);
	}

	public function login()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('welcome');
		}

		
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			$data['main'] = 'login/examiner_login';
			$this->load->view('login/layout/main', $data);
		} else {
			
			$email =  $this->input->post('email');
			$password = $this->input->post('password');
				
			$enc_password = md5($password);
			
			$user_id = $this->user_model->login($email, $enc_password);
			$user_type = $this->user_model->get_usertype($email);
			$full_name = $this->user_model->get_user_fullname($email);

						
			
			if ($user_id) {
				

				if ($user_type != 'examiner') {				
					$this->session->set_flashdata('not_allowed', 'Only the Chief Examiner can login here!');
					redirect('examiner/dashboard/login');
				} 

				$user_data  = array(
					'user_id' => $user_id, 
					'user_name' => $email,
					'logged_in' => True,
					'user_type' => 'examiner',
					'full_name' => $full_name
					);

				//set session data
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login', 'Login successful');
				redirect('examiner/dashboard');

			} else {

				$this->session->set_flashdata('error', 'Invalid login');

				$data['main'] = 'login/examiner_login';
				$this->load->view('login/layout/main', $data);				
			}
		}


	}

	public function logout()
	{
		$unset_items  = array('user_id','user_name','logged_in','user_type');

		$this->session->unset_userdata($unset_items);
		
		$this->session->sess_destroy();
		redirect('welcome');
	}
}