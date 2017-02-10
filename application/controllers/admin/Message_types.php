s<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Message_types extends CI_Controller {
	
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
		$data['message_types'] = $this->message_type_model->get_message_types();

		$data['main'] = "admin/message_types/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{
		
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/message_types/add";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'name' => $this->input->post('name'),
				'description'	=> $this->input->post('description')
				);

			//insert message_type
			$this->message_type_model->add($data);
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'message_type',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new message type was added(' .$data['name'].')',
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Message type has been added');
			redirect('admin/message_types','refresh');
		}
		
	}
	public function edit($id = 0)
	{
		if ($this->message_type_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$data['message_type'] = $this->message_type_model->get_message_type($id);
					//var_dump($data['message_types']);var_dump($data['groups']);die();

			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				//getcurrent subject
				$data['message_type'] = $this->message_type_model->get_message_type($id);
				
				$data['main'] = "admin/message_types/edit";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'name' => $this->input->post('name'),
					'description'	=> $this->input->post('description')
					);

				//update message_type
				$this->message_type_model->update($id, $data);
				$data  = array(
					'resource_id' => $id,
					'type' => 'message_type',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'A message_type was updated - (' .$data['name'].')',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Message type has been updated');
				redirect('admin/message_types','refresh');
			}
		}
	}
	public function detail($id = 0)
	{
		if ($this->message_type_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			//Load template
			$data['message_type'] = $this->message_type_model->get_message_type($id);

			$data['main'] = "admin/message_types/detail";
			$this->load->view('admin/layout/main', $data);
		}
	}
	public function delete($id = 0)
	{
		if ($this->message_type_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$name = $this->message_type_model->get_message_type($id);
			$this->message_type_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'message_type',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'message_type was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message

				$this->session->set_flashdata('success', 'Message type has been deleted');
				redirect('admin/message_types','refresh');
		}

		
	}
	
}