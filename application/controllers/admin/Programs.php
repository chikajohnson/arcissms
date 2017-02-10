<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Programs extends CI_Controller {
	
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

		$data['programs'] = $this->program_model->get_programs();

		$data['main'] = "admin/programs/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{
		
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('department', 'department', 'trim|required');
		$this->form_validation->set_rules('faculty', 'faculty', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/programs/add";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type'),
				'description'	=> $this->input->post('description'),
				'department' => $this->input->post('department'),
				'faculty' => $this->input->post('faculty')
				);

			//insert program
			$this->program_model->add($data);
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'program',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new program was added(' .$data['name'].')',
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Program has been added');
			redirect('admin/programs','refresh');
		}
		
	}
	public function edit($id = 0)
	{
		if ($this->program_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

			$data['program'] = $this->program_model->get_program($id);
					//var_dump($data['programs']);var_dump($data['groups']);die();

			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('type', 'type', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_rules('department', 'department', 'trim|required');
			$this->form_validation->set_rules('faculty', 'faculty', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				//getcurrent subject
				$data['program'] = $this->program_model->get_program($id);

				$data['main'] = "admin/programs/edit";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'name' => $this->input->post('name'),
					'type' => $this->input->post('type'),
					'description'	=> $this->input->post('description'),
					'department' => $this->input->post('department'),
					'faculty' => $this->input->post('faculty')
					);

				//update program
				$this->program_model->update($id, $data);
				$data  = array(
					'resource_id' => $id,
					'type' => 'program',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'A program was updated - (' .$data['name'].')',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Program has been updated');
				redirect('admin/programs','refresh');
			}
		}
	}
	public function detail($id = 0)
	{
			//Load template
		if ($this->program_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$data['program'] = $this->program_model->get_program($id);

			$data['main'] = "admin/programs/detail";
			$this->load->view('admin/layout/main', $data);
		}
	}
	
	public function delete($id = 0)
	{
		//$name = $this->program_model->get_program();
		if ($this->program_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

			$this->program_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'program',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'program was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Program has been deleted');
				redirect('admin/programs','refresh');
		}
	}
	
}