<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

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

	public function index($Starting=0)
	{
		$data['courses'] = $this->course_model->get_courses();
		$data['count'] = $this->course_model->count();
		$data['index'] = 'All';
		
		$data['main'] = "admin/courses/index";
		$this->load->view('admin/layout/main', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('code', 'code', 'trim|required');
		$this->form_validation->set_rules('credit', 'credit', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/courses/add";
		$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'title' => $this->input->post('title'),
				'code' => $this->input->post('code'),
				'credit' => $this->input->post('credit'),
				'description' => $this->input->post('description')
				 );

			//insert course
			$this->course_model->add($data);

			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'subject',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new course was added(' .$data['title'].')',
				 );

			//Insert Activivty
			$this->activity_model->add($data);

			//Set Message
			$this->session->set_flashdata('success', 'Course has been added');

			redirect('admin/courses','refresh');
		}
		
	}

	public function edit($id=0)
	{
		if ($this->course_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('code', 'code', 'trim|required');
			$this->form_validation->set_rules('credit', 'credit', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				//getcurrent subject
				$data['course'] = $this->course_model->get_course($id);			

				$data['main'] = "admin/courses/edit";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'title'	 		=> 	$this->input->post('title'),
					'code' 			=>	$this->input->post('code'),
					'credit'		=> 	$this->input->post('credit'),
					'description' 	=> 	$this->input->post('description')
					 );

				//update course
				$this->course_model->update($id, $data);

				$data  = array(
					'resource_id' => $id,
					'type' => 'Course',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => ' Course was updated',
					 );

				//Insert Activivty
				$this->activity_model->add($data);

				//Set Message
				$this->session->set_flashdata('success', 'Course has been updated');

				redirect('admin/courses','refresh');
			}
			
		}

		
	}

	
	public function delete($id=0)
	{
		if ($this->course_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

			$this->course_model->delete($id);

			$data  = array(
					'resource_id' => $id,
					'type' => 'Course',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => ' Course was deleted',
					 );

			//Insert Activivty
			$this->activity_model->add($data);

			//Set Message
			$this->session->set_flashdata('success', 'Course has been deleted');

			redirect('admin/courses','refresh');
		}
	}

	public function detail($id=0)
	{
			//Load template
		if ($this->course_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$data['course'] = $this->course_model->get_course($id);
			$data['course_count'] = $this->course_model->count();

			$data['main'] = "admin/courses/detail";
			$this->load->view('admin/layout/main', $data);
		}
	}


	public function search()
	{
		if (!isset($_POST['course'])){
			redirect('admin/courses/index','refresh');
		}
		
		$data['courses'] = null;
		$data['index'] = "All";

		$this->form_validation->set_rules('course', 'course', 'trim|required|differs[0]');

		// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// var_dump($data); die();
			$data['main'] = "admin/courses/index";
		$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'course' => $this->input->post('course'),
				'search_param' => $this->input->post('search_param')
				 );
			
			$data['count'] = $this->course_model->count();

			//insert course
			$data['index'] = "All";
			$data['courses'] = $this->course_model->search($data['course'], $data['search_param']);
			

			$data['main'] = "admin/courses/index";
			$this->load->view('admin/layout/main', $data);
			
		}
		
	}

	public function paginate()
	{
		if(isset($_POST['course'])){
		

			$this->form_validation->set_rules('course', 'course', 'trim|required');

			$data['index'] = "All";
			// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data['main'] = "admin/courses/index";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'course' => $this->input->post('course')
					 );
				
				$data['count'] = $this->course_model->count();	
				$data['index'] = $data['course'];
				$data['courses'] = $this->course_model->paginate($data['course']);

				$data['main'] = "admin/courses/index";
				$this->load->view('admin/layout/main', $data);

				
			}

		} else {
			redirect('admin/courses/index','refresh');
		}
	}
	
}
