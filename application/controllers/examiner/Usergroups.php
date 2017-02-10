<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usergroups extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect('welcome');
		} else {
			if ($this->session->userdata('user_type')!= 'examiner') {
			redirect('welcome');
		 }

		}
		
	}
	
	public function index()
	{
			//Load template
		$data['usergroups'] = $this->usergroup_model->get_usergroups();

		$data['main'] = "examiner/usergroups/index";
		$this->load->view('examiner/layout/main', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "examiner/usergroups/add";
		$this->load->view('examiner/layout/main', $data);
		} else {
			$data  = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
				 );

			//insert UserGroup
			$this->usergroup_model->add($data);

			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'User Group',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new usergroup was added(' .$data['name'].')',
				 );

			//Insert Activivty
			$this->activity_model->add($data);

			//Set Message
			$this->session->set_flashdata('success', 'User Group has been added');

			redirect('examiner/usergroups','refresh');
		}
		
	}

	public function edit($id = 0)
	{

		if ($this->usergroup_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'examiner/error';
			$this->load->view('examiner/layout/main', $data);
		} else {

			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				//getcurrent User Group
				$data['usergroup'] = $this->usergroup_model->get_usergroup($id);			

				$data['main'] = "examiner/usergroups/edit";
				$this->load->view('examiner/layout/main', $data);

			} else {
				$data  = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description')
					 );

				//update Usergroup
				$this->usergroup_model->update($id, $data);

				$data  = array(
					'resource_id' => $id,
					'type' => 'Usergroup',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => ' Usergroup was updated',
					 );

				//Insert Activivty
				$this->activity_model->add($data);

				//Set Message
				$this->session->set_flashdata('success', 'Usergroup has been updated');

				redirect('examiner/usergroups','refresh');
			}
		}
	}

	public function detail($id = 0)
	{
		if ($this->usergroup_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'examiner/error';
			$this->load->view('examiner/layout/main', $data);
		} else {
			//Load template
			$data['user_group'] = $this->usergroup_model->get_usergroup($id);

			$data['main'] = "examiner/usergroups/detail";
			$this->load->view('examiner/layout/main', $data);
		}
	}
	public function delete($id = 0)
	{
		
		if ($this->usergroup_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'examiner/error';
			$this->load->view('examiner/layout/main', $data);
		} else {

			$this->usergroup_model->delete($id);

			$data  = array(
					'resource_id' => $id,
					'type' => 'usergroup',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => ' Usergroup was deleted',
					 );

				//Insert Activivty
				$this->activity_model->add($data);

				//Set Message
				$this->session->set_flashdata('success', 'Usergroup has been deleted');

				redirect('examiner/usergroups','refresh');
		}
	}
}
