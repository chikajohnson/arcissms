<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SMS extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		$data['sessions'] = $this->academic_session_model->get_academic_sessions();
		$data['semesters'] = $this->semester_model->get_semesters();
		$data['courses'] = $this->course_model->get_courses();
		$data['message'] = 'Welcome to messenger';

		$this->load->view('siteindex', $data);
	}

	public function get_help()
	{
		//request input from SMS API
		$sms_request =array();
		
		
		// $error = array();
		$data = array(
			//'message_type' => $this->input->post('keyword'),
			'matric' => $sms_request[0],
			'number' =>  $sms_request[1],
			'keyword' =>  $sms_request[2],
			'password' => $sms_request[3]
			);
			
		//check if keyword is 'help'
		$output['message'] = '';
		if ($this->core_model->get_keyword($data['keyword']) == 'help')
		{
			
			if ($this->core_model->user_credentials_exist($data['matric'], $data['password']))
			{
				if ($this->core_model->validate_user($data['matric'], $data['password']))
				{
					$sms_long_code = $this->core_model->get_longCode();
					$output['message'] = trim($this->core_model->get_helptext(). $sms_long_code);
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
		else
		{
				$output['message'] = "incorrect message format";
		}
		
		$this->core_model->send_message($phonenumber, $output);	
			
										
	}
	
	
	public function change_password()
	{
			//request input from SMS API
		$sms_request =array();
		
		
		// $error = array();
		$data = array(
			//'message_type' => $this->input->post('keyword'),
			'matric' => $sms_request[0],
			'number' =>  $sms_request[1],
			'keyword' =>  $sms_request[2],
			'old_password' => $sms_request[3]
			'password1' => $sms_request[4]
			'password2' => $sms_request[5]
			);
			
			//get the sms long code
			$sms_long_code = $this->core_model->get_longCode();	

			//check if keyword is 'password'
			$output['message'] = '';
			if (count($data) != 6) {
				$output['message'] = 'Incorrect message format, send HELP to '. $sms_long_code;
			} 
			elseif ($this->core_model->get_keyword(trim($data['keyword'])) != 'password') {
				$output['message'] = 'Invalid keyword';
			}
			elseif (!$this->core_model->matric_exists($data['matric'])) {
				$output['message'] = 'Matric number does not exist.';
			}
			elseif (!$this->core_model->password_match($data['matric'], $data['old_password'])) {
				$output['message'] = 'Incorrect paswsword, try again';
			}
			elseif (!$this->core_model->new_passwords_match($data['password1'], $data['password2'])) {
				$output['message'] = 'new passwords do not match.';

			}elseif($this->core_model->new_password_same_as_old_password($data['old_password'], $data['password1'])){
					$output['message'] = 'new password cannot be the same as old password.';

			}
			else
			{			
				
				if ($this->core_model->user_credentials_exist($data['matric'], $data['old_password']))
				{
					if ($this->core_model->validate_user($data['matric'], $data['old_password']))
					{
						$this->core_model->change_password($data['matric'],$data['password1']);
						$output['message'] = 'password successfully changed';
					}
					else
					{
						$output['message'] = "Invalid user credentails, try again";
					}
				}
				else
				{
						$output['message'] = "Invalid user credentails, try again";
				}
						
			}
			
			$this->core_model->send_message($phonenumber, $output);				
															
		}
	
	public function check_result()
	{
		//request input from SMS API
		$sms_request =array();
		
		
		$data = array(
				'keyword' =>$sms_request[0],
				'matric' => $sms_request[1],
				'number' =>$sms_request[2],
				'password' => $sms_request[3],
				'course' => $sms_request[4],
				'session' => $sms_request[5],
				'semester' =>$sms_request[6],
				);	
			
			//get the sms long code
			$sms_long_code = $this->core_model->get_longCode();	

							
			
			$output['message'] = '';

			if (count($data) != 7) {
				$output['message'] = 'Incorrect message format, send HELP to '. $sms_long_code;
			} 
			elseif ($this->core_model->get_keyword(trim($data['keyword'])) != 'result') {
				$output['message'] = 'Invalid keyword';
			}
			elseif (!$this->core_model->matric_exists($data['matric'])) {
				$output['message'] = 'Matric number does not exist.';
			}
			elseif (!$this->core_model->password_match($data['matric'], $data['password'])) {
				$output['message'] = 'user password does not exist.';
				
			}
			else
			{
				if (($this->core_model->get_keyword($data['keyword']) == 'result') && ($this->core_model->user_credentials_exist($data['matric'], $data['password'])))
				{	
					if ($this->core_model->validate_user($data['matric'], $data['password']))
					{
						if (count($data) == 4) {
							
							$output['result'] = $this->core_model->get_result($data['matric'], $data['course']);
							

						}
						 elseif($data['course_radio'] == 'all') 
						{
							$output['results'] = $this->core_model->get_all_results($data['matric'], $data['semester'],$data['session']);
													
						}							
						
					}
					else
					{
						$output['message'] = "Invalid user credentails";
					}
				}
				else
				{
					$output['message'] = "Invalid user credentails";
				}
						
				
			}			
		$this->core_model->send_message($phonenumber, $output);		
		
	}
}