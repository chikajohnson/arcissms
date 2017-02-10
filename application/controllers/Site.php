<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect('welcome');
		}
		if ($this->session->userdata('user_type') != 'admin') {
		 	redirect('welcome');
		}

		
	}
	
	public function index()
	{
		
		$data['sessions'] = $this->academic_session_model->get_academic_sessions();
		$data['semesters'] = $this->semester_model->get_semesters();
		$data['courses'] = $this->course_model->get_courses();
		$data['message'] = 'Welcome to the student dashboard!';

		$data['main'] = 'site/index';
		$this->load->view('site/layout/main', $data);
	}

	public function get_help()
	{
		
		$this->form_validation->set_rules('matric', 'matric number','trim|required');		
		$this->form_validation->set_rules('password', 'password','trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) {
			$data['main'] = 'site/help';
			$this->load->view('site/layout/main', $data);
		} else {
			$error = array();
			$data = array(
				//'message_type' => $this->input->post('keyword'),
				'matric' => $this->input->post('matric'),
				// 'number' => $this->input->post('phonenumber'),
				// 'help' => $this->input->post('help'),
				'password' => $this->input->post('password')
				);
				
			//check if keyword is 'help'
			$output['message'] = '';
			if ($this->core_model->get_keyword($data['help']) == 'help')
			{
				
				if ($this->core_model->user_credentials_exist($data['matric'], $data['password']))
				{
					if ($this->core_model->validate_user($data['matric'], $data['password']))
					{
						
						$output['message'] = 'Dear &nbsp;'.$data['number'].'&nbsp;-'. 'Send text message using the format "HELP phonenumber matric password" to 08099990009';
					}
					else{
						$output['message'] = "invalid user credentails";
							}
				}
				else
				{
						$output['message'] = "invalid user credentails";
				}
					
			}
			else
			{
					$output['message'] = "incorrect message format";
			}
			
				$this->load->view('site/index', $output);
		}
			
										
		}
	
	
	public function change_password()
	{
		
		$this->form_validation->set_rules('matric', 'matric number','trim|required');		
		$this->form_validation->set_rules('password', 'password','trim|required');
		$this->form_validation->set_rules('password1', 'new password ','trim|required|min_length[4]|max_length[5]|numeric');
		$this->form_validation->set_rules('password2', 'repeat password','trim|required|min_length[4]|max_length[5]|numeric');

		
		$output['message'] = '';
		if ($this->form_validation->run() == FALSE) {
			$output['main'] = 'site/change_password';
			$this->load->view('site/layout/main', $output);
		} else {
			$error = array();
			$data = array(				
				'matric' => $this->input->post('matric'),				
				'password' => $this->input->post('password'),
				'password1' => $this->input->post('password1'),
				'password2' => $this->input->post('password2')
				);
				
						
			//check if keyword is 'password'
			
			if (!$this->core_model->matric_exists($data['matric'])){
				$output['message'] = 'Matric number does not exist.';

				$output['main'] = 'site/change_password';
				$this->load->view('site/layout/main', $output);
			}
			elseif (!$this->core_model->password_match($data['matric'], $data['password'])) {
				$output['message'] = 'user password does not exist.';
				$output['main'] = 'site/change_password';
				$this->load->view('site/layout/main', $output);
			}
			elseif (!$this->core_model->new_passwords_match($data['password1'], $data['password2'])) {
				$output['message'] = 'new passwords do not match.';
				$output['main'] = 'site/change_password';
				$this->load->view('site/layout/main', $output);
			}
			elseif($this->core_model->new_password_same_as_old_password($data['password'], $data['password1'])){
					$output['message'] = 'new password cannot be the same as old password.';
					$output['main'] = 'site/change_password';
					$this->load->view('site/layout/main', $output);
				
			}
			else{				
				
				if ($this->core_model->user_credentials_exist($data['matric'], $data['password']))
				{
					if ($this->core_model->validate_user($data['matric'], $data['password']))
					{
						$this->core_model->change_password($data['matric'],$data['password1']);
						$output['message'] = 'password successfully changed';
					}
					else{
						$output['message'] = "invalid user credentails";
							}
				}
				else
				{
						$output['message'] = "invalid user credentails";
				}					
			
			
			$output['main'] = 'site/index';
			$this->load->view('site/layout/main', $output);
		}
			
															}
	}
	
	public function check_result()
	{
		$data['sessions'] = $this->academic_session_model->get_academic_sessions();
		$data['semesters'] = $this->semester_model->get_semesters();
		$data['courses'] = $this->course_model->get_courses();

		$data['message'] = '';
		
		$this->form_validation->set_rules('matric', 'matric number','trim|required');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		$this->form_validation->set_rules('session', 'Academic Session ','trim|required');		
		$this->form_validation->set_rules('course', 'Course','trim|required');
		$this->form_validation->set_rules('semester', 'Semester','trim|required');

		$this->form_validation->set_rules('session', 'Academic session', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('semester', 'Semester', 'trim|required|greater_than[0]');
		
		$this->form_validation->set_message('greater_than', 'Please select %s.');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['main'] = 'site/check_result';
			$this->load->view('site/layout/main', $data);
		}
		else 
		{
			
			$data = array(
				
				'matric' => $this->input->post('matric'),				
				'password' => $this->input->post('password'),
				'course' => $this->input->post('course'),
				'session' => $this->input->post('session'),
				'semester' => $this->input->post('semester'),
				'course_radio' => $this->input->post('course_radio')
				);	
				
						
			
			if (!$this->core_model->matric_exists($data['matric'])){

				$data['message'] = 'Matric number does not exist.';
				$data['sessions'] = $this->academic_session_model->get_academic_sessions();
				$data['semesters'] = $this->semester_model->get_semesters();
				$data['courses'] = $this->course_model->get_courses();

				$data['main'] = 'site/check_result';
				$this->load->view('site/layout/main', $data);
			}
			elseif (!$this->core_model->password_match($data['matric'], $data['password'])) {

				$data['message'] = 'user password is incorrect.';
				$data['sessions'] = $this->academic_session_model->get_academic_sessions();
				$data['semesters'] = $this->semester_model->get_semesters();
				$data['courses'] = $this->course_model->get_courses();
				
				$data['main'] = 'site/check_result';
				$this->load->view('site/layout/main', $data);
			}
			else
			{
								
				if ($this->core_model->user_credentials_exist($data['matric'], $data['password']))
				{
					if ($this->core_model->validate_user($data['matric'], $data['password']))
					{
						if ($data['course_radio'] == 'one') {

							$data['message'] = 'Please Select a course.';
							$data['sessions'] = $this->academic_session_model->get_academic_sessions();
							$data['semesters'] = $this->semester_model->get_semesters();
							$data['courses'] = $this->course_model->get_courses();



							if ($data['course'] == 0)
							{
								$data['main'] = 'site/check_result';
								$this->load->view('site/layout/main', $data);
							}
							else{

							
							$data['result'] = $this->core_model->get_result($data['matric'], $data['course']);

							
							$data['main'] = 'site/result_detail';
							$this->load->view('site/layout/main', $data);
							}						

						}
						elseif($data['course_radio'] == 'all') {

							$data['results'] = $this->core_model->get_all_results($data['matric'], $data['semester'],$data['session']);

							//var_dump($output['results']); die();

							$data['main'] = 'site/all_results';
							$this->load->view('site/layout/main', $data);
							
						}							
						
					}
					else
					{
						$output['message'] = "invalid user credentails";
					}
				}
				else
				{
						$output['message'] = "invalid user credentails";
				}	


				
			}			
		}		
		
	}

	public function activities(){

		if ($this->session->userdata('user_type')!= 'admin') {
			redirect('welcome');
		 }

		
		$data['activities']  = $this->activity_model->get_user_activities();

		$data['main'] = 'site/activities';
		$this->load->view('site/layout/main', $data);
	}
}