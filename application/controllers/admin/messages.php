<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Messages extends CI_Controller {
	
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
			//Load template
		$data['messages'] = $this->message_model->get_messages();
		$data['main'] = "admin/messages/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{
		// var_dump($this->session->userdata('user_id')); die();
		$data['message_types'] = $this->message_type_model->get_message_types();
		$data['sessions'] = $this->academic_session_model->get_academic_sessions();
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('message_type', 'Message type',  'trim|required|greater_than[0]');

		$this->form_validation->set_message('greater_than', 'Please select %s.');

		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/messages/add";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'message_type' => $this->input->post('message_type'),
				'sent'		 => 0,
				'admin' => $this->session->userdata('user_id')
				// 'sent_time'=> $this->input->post('admin')
				);
			//insert message
			$this->message_model->add($data);
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'message',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new message  was added by '. $this->session->userdata('user_id'),
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Message has been added');
			redirect('admin/messages','refresh');
		}
		
	}
	public function edit($id = 0)
	{
		if ($this->message_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

			$data['message_types'] = $this->message_type_model->get_message_types();
			$data['sessions'] = $this->academic_session_model->get_academic_sessions();
			$this->form_validation->set_rules('message_type', 'Message type', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('message_type', 'Message type',  'trim|required|greater_than[0]');

			$this->form_validation->set_message('greater_than', 'Please select %s.');


			$data['message'] = $this->message_model->get_message($id);

			if ($this->form_validation->run() == FALSE) {
				//getcurrent subject
				
				$data['main'] = "admin/messages/edit";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'title' => $this->input->post('title'),
					'message' => $this->input->post('message'),
						'message_type'	=> $this->input->post('message_type')
					// 'sent_time'=> $this->input->post('admin')
				);
				//update message
				$this->message_model->update($id, $data);

				$data  = array(
					'resource_id' => $id,
					'type' => 'message',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'message was updated',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Message has been updated');
				redirect('admin/messages','refresh');
			}
		}
	}
	public function detail($id = 0)
	{
		if ($this->message_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			//Load template
		$data['message'] = $this->message_model->get_message($id);
		$data['main'] = "admin/messages/detail";
		$this->load->view('admin/layout/main', $data);
		}
	}
	public function delete($id = 0)
	{
		if ($this->message_model->check_if_id_exists($id) == NULL) {
			$this->load->view('admin/error');
		} else {
			//$name = $this->message_model->get_message();
			$this->message_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'message',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'message was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Message has been deleted');
				redirect('admin/messages','refresh');
		}
	}
	public function send($id = 0)
	{

		if ($this->message_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			//Load template
			$data['message_types'] = $this->message_type_model->get_message_types();
			$data['message'] = $this->message_model->get_message($id);
			$data['sessions'] = $this->academic_session_model->get_academic_sessions();
			$data['courses'] = $this->course_model->get_courses();
			// var_dump($data['courses']); die();

			
			$title = $this->input->post('title');
			$message = $this->input->post('message');
			$message_radio = $this->input->post('message_radio');
			$academic_session =  $this->input->post('academic_session');
			$phonenumbers =  $this->input->post('phonenumbers');
			$course =  $this->input->post('course');
					
			$message_radio = $this->input->post('message_radio');

			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$data['main'] = "admin/messages/send";
				$this->load->view('admin/layout/main', $data);
			} 
			elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
			
				if ($message_radio == "all") {

					$this->form_validation->set_rules('academic_session', 'Academic session', 'trim|required|greater_than[0]');	
					$this->form_validation->set_message('greater_than', 'Please select %s of recipients.');

					$this->form_validation->set_rules('course', 'Course', 'trim|required|greater_than[0]');	
					// $this->form_validation->set_message('greater_than', 'Please select Course.');	
	

					if ($this->form_validation->run() == FALSE) {
						$data['main'] = "admin/messages/send";
						$this->load->view('admin/layout/main', $data);
					} else{
						$numbers = $this->core_model->get_phonenumbers($academic_session, $course);
						//var_dump($numbers); die();

						$message_count = 0;
						foreach ($numbers as $number) {
							if(!is_null($number)){
								$this->core_model->send_message($number, $message);
								$message_count++;
							}				
						}

					//Set user activity data
					$data  = array(
						'resource_id' => $id,
						'type' => 'message',
						'action' => 'updated',
						'user_id' => $this->session->userdata('user_id'),
						'message' => $message_count . ' message(s) were sent',
					);

					//Insert user Activivty
					$this->activity_model->add($data);

						$this->session->set_flashdata('success', $message_count . ' messages has been sent');
						redirect('admin/messages','refresh');
					}

			}
			elseif ($message_radio == "custom") {
						//var_dump($phonenumbers); die();
					

					$this->form_validation->set_rules('phonenumbers', 'Phonenumber', 'trim|required');	
					

					if ($this->form_validation->run() == FALSE) {
						
						$data['main'] = "admin/messages/send";
						$this->load->view('admin/layout/main', $data);
					} else{

						$numbers = explode(",", $phonenumbers);
						//var_dump($numbers); die();

						$message_count = 0;
						foreach ($numbers as $number) {
							if(!is_null(trim($number))){
								$this->core_model->send_message($number, $message);;
								$message_count++;
							}				
						}


					//Set user activity data
					$data  = array(
						'resource_id' => $id,
						'type' => 'message',
						'action' => 'updated',
						'user_id' => $this->session->userdata('user_id'),
						'message' => $message_count . ' message(s) were sent',
					);

					//Insert user Activivty
					$this->activity_model->add($data);

						$this->session->set_flashdata('success', $message_count . ' messages has been sent');
						redirect('admin/messages','refresh');
					}
					
				}
			}
		}

		
	}

}