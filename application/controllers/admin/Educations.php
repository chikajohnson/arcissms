<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Educations extends CI_Controller {
	
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
		$data['educations'] = $this->education_model->get_educations();
		$data['index']= 'All';
		$data['count'] = $this->course_model->count();

		$data['main'] = "admin/educations/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{
		
		$this->form_validation->set_rules('matric', 'matric', 'trim|required');
		$this->form_validation->set_rules('school_attended', 'school_attended', 'trim|required');
		$this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('study_period_start', 'study_period_start', 'trim|required');
		$this->form_validation->set_rules('study_period_end', 'study_period_end', 'trim|required');
		$this->form_validation->set_rules('award_date', 'award_date', 'trim|required');
		$this->form_validation->set_rules('discipline', 'discipline', 'trim|required');
		$this->form_validation->set_rules('department', 'department', 'trim|required');
		$this->form_validation->set_rules('faculty', 'faculty', 'trim|required');
		$this->form_validation->set_rules('degree_obtained', 'degree_obtained', 'trim|required');
		$this->form_validation->set_rules('degree_class', 'degree_class', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/educations/add";
		$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'matric' => $this->input->post('matric'),
				'school_attended' => $this->input->post('school_attended'),
				'city'			 => $this->input->post('city'),
				'country'		 => $this->input->post('country'),
				'study_period_start' => $this->input->post('study_period_start'),
				'study_period_end' => $this->input->post('award_date'),
				'award_date' => $this->input->post('award_date'),
				'discipline' => $this->input->post('discipline'),
				'department' => $this->input->post('department'),
				'faculty' => $this->input->post('faculty'),
				'degree_obtained' => $this->input->post('degree_obtained'),
				'degree_class' => $this->input->post('degree_class')
				);

			//insert education
			$this->education_model->add($data);
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'education',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new Educational qualification was added(' .$data['degree_obtained'].' - '.$data['discipline'].')',
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Educational qualification has been added');
			redirect('admin/educations','refresh');
		}
		
	}
	public function edit($id=0)
	{

		if ($this->education_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$data['education'] = $this->education_model->get_education($id);
					//var_dump($data['educations']);var_dump($data['groups']);die();

			$this->form_validation->set_rules('matric', 'matric', 'trim|required');
			$this->form_validation->set_rules('school_attended', 'school_attended', 'trim|required');
			$this->form_validation->set_rules('city', 'city', 'trim|required');
			$this->form_validation->set_rules('country', 'country', 'trim|required');
			$this->form_validation->set_rules('study_period_start', 'study_period_start', 'trim|required');
			$this->form_validation->set_rules('study_period_end', 'study_period_end', 'trim|required');
			$this->form_validation->set_rules('award_date', 'award_date', 'trim|required');
			$this->form_validation->set_rules('discipline', 'discipline', 'trim|required');
			$this->form_validation->set_rules('department', 'department', 'trim|required');
			$this->form_validation->set_rules('faculty', 'faculty', 'trim|required');
			$this->form_validation->set_rules('degree_obtained', 'degree_obtained', 'trim|required');
			$this->form_validation->set_rules('degree_class', 'degree_class', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				//getcurrent subject
				$data['education'] = $this->education_model->get_education($id);

				$data['main'] = "admin/educations/edit";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'matric' => $this->input->post('matric'),
					'school_attended' => $this->input->post('school_attended'),
					'city'			 => $this->input->post('city'),
					'country'		 => $this->input->post('country'),
					'study_period_start' => $this->input->post('study_period_start'),
					'study_period_end' => $this->input->post('award_date'),
					'award_date' => $this->input->post('award_date'),
					'discipline' => $this->input->post('discipline'),
					'department' => $this->input->post('department'),
					'faculty' => $this->input->post('faculty'),
					'degree_obtained' => $this->input->post('degree_obtained'),
					'degree_class' => $this->input->post('degree_class')
					);

				//update education
				$this->education_model->update($id, $data);
				$data  = array(
					'resource_id' => $id,
					'type' => 'education',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => ' educational qualification was updated',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Educational qualification has been updated');
				redirect('admin/educations','refresh');
			}
		}
	}
	public function detail($id=0)
	{
		if ($this->education_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

		$data['education'] = $this->education_model->get_education($id);

		$data['main'] = "admin/educations/detail";
		$this->load->view('admin/layout/main', $data);
		}
	}
	public function delete($id=0)
	{
		//$name = $this->education_model->get_education();
		if ($this->education_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$this->education_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'education',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'education was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Educational qualification has been deleted');
				redirect('admin/educations','refresh');
		}
	}

	public function search()
	{
		if (!isset($_POST['education'])){
			redirect('admin/educations/index','refresh');
		}

		$data['educations'] = null;
		$data['index'] = "All";

		$this->form_validation->set_rules('education', 'education', 'trim|required|differs[0]');

		// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// var_dump($data); die();
			$data['main'] = "admin/educations/index";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'education' => $this->input->post('education'),
				'search_param' => $this->input->post('search_param')
				 );
			
			$data['count'] = $this->course_model->count();

			//insert course
			$data['index'] = "All";
			$data['educations'] = $this->education_model->search($data['education'], $data['search_param']);

			$data['main'] = "admin/educations/index";
			$this->load->view('admin/layout/main', $data);

			
		}
		
	}

	public function paginate()
	{
		if(isset($_POST['education'])){
		

			$this->form_validation->set_rules('education', 'education', 'trim|required');

			$data['index'] = "All";
			// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data['main'] = "admin/educations/index";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'education' => $this->input->post('education')
					 );
				
				$data['count'] = $this->course_model->count();	
				$data['index'] = $data['education'];
				$data['educations'] = $this->education_model->paginate($data['education']);

				$data['main'] = "admin/educations/index";
				$this->load->view('admin/layout/main', $data);
				
			}

		} else {
			redirect('admin/educations/index','refresh');
		}
	}
	
}