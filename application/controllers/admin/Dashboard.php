<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('welcome');
		}
		
		if ($this->session->userdata('user_type') != 'admin') {
		 	redirect('welcome');
		}

		$data['student_count'] = $this->student_model->count();
		$data['course_count'] = $this->course_model->count();
		$data['sms_count'] = $this->message_model->count();
		$data['result_count'] = $this->result_model->count();
		$data['program_count'] = $this->program_model->count();

		$data['main'] = 'admin/dashboard';
		$this->load->view('admin/layout/main', $data);
	}

	public function login()
	{


		if ($this->session->userdata('logged_in')) {
			redirect('welcome');
		}
		
		
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			$data['main'] = 'login/login';
			$this->load->view('login/layout/main', $data);
		} else {
			
			$email =  trim($this->input->post('email'));
			$password = $this->input->post('password');
				
			$enc_password = md5($password);
			$user_id = $this->user_model->login($email, $enc_password);
			$user_type = $this->user_model->get_usertype($email);
			$full_name = $this->user_model->get_user_fullname($email);
								
			

			if ($user_id) {

				if ($user_type != 'admin') {

					$this->session->set_flashdata('not_allowed', 'Only an administrator can login here!');
					redirect('admin/dashboard/login');
				} 

				//var_dump($this->user_model->is_user_active($email));die();

				if (($this->user_model->is_user_active($email)) == '0') {				
					$this->session->set_flashdata('not_allowed', 'The account has been suspended! Contact the Chief Examiner.');
					redirect('welcome');
				} 

				

				$user_data  = array(
					'user_id' => $user_id, 
					'user_name' => $email,
					'logged_in' => True,
					'user_type' => $user_type,
					'full_name' => $full_name
					);
				

				//set session data
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login', 'Login successful');

				$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'User',
				'action' => 'Login',
				'user_id' => $this->session->userdata('user_id'),
				'message' => $user_data['user_name'] . '  logged into the system'
				);
			//Insert Activivty
			$this->activity_model->add($data);				


				redirect('admin/dashboard');
			} else {

				$this->session->set_flashdata('error', 'Invalid login');

				$data['main'] = 'login/login';
				$this->load->view('login/layout/main', $data);				
			}
		}
	}
	public function logout()
	{
		$unset_items  = array('user_id','user_name','logged_in','user_type');

		$data  = array(
			'resource_id' => $this->db->insert_id(),
			'type' => 'User',
			'action' => 'Login',
			'user_id' => $this->session->userdata('user_id'),
			'message' => $this->session->userdata('user_name') . ' logged out of the system'
			);

		//Insert Activivty
		$this->activity_model->add($data);
		$this->session->unset_userdata($unset_items);		
		$this->session->sess_destroy();


		redirect('welcome');
	}
}