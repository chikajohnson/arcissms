<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Semesters extends CI_Controller {
	
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
		$data['semesters'] = $this->semester_model->get_semesters();

		$data['main'] = "admin/semesters/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/semesters/add";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'name' => $this->input->post('name')
				);
			//insert semester
			$this->semester_model->add($data);
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'Semesters',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new Semester was added(' .$data['name'].')',
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Semester has been added');
			redirect('admin/semesters','refresh');
		}
		
	}
	public function edit($id=0)
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		if ($this->semester_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		}else{
				if ($this->form_validation->run() == FALSE) {
					//getcurrent subject
					$data['semester'] = $this->semester_model->get_semester($id);

					$data['main'] = "admin/semesters/edit";
					$this->load->view('admin/layout/main', $data);
				} else {
					$data  = array(
						'name' => $this->input->post('name')
						);
					//update semester
					$this->semester_model->update($id, $data);
					$data  = array(
						'resource_id' => $id,
						'type' => 'semester',
						'action' => 'updated',
						'user_id' => $this->session->userdata('user_id'),
						'message' => ' semester was updated',
						);
					//Insert Activivty
					$this->activity_model->add($data);
					//Set Message
					$this->session->set_flashdata('success', 'Semester has been updated');
					redirect('admin/semesters','refresh');
				}
			}
	}
	public function detail($id=0)
	{
			//Load template
		if ($this->semester_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		}else{
			$data['semester'] = $this->semester_model->get_semester($id);
			$data['main'] = "admin/semesters/detail";
			$this->load->view('admin/layout/main', $data);
		}
	}
	public function delete($id=0)
	{
		//$name = $this->semester_model->get_semester();
		if ($this->semester_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else{

			$this->semester_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'Semester',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => ' Semester was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Semester has been deleted');
				redirect('admin/semesters','refresh');
		}
	}
}