<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Students extends CI_Controller {
	
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
		$data['count'] = $this->course_model->count();
		$data['index'] = '100';

		$data['students'] = $this->student_model->get_students();
		$data['main'] = "admin/students/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{

		//var_dump($this->session->userdata('user_id')); die();
		$data['programs'] = $this->program_model->get_programs();
		$data['academic_sessions'] = $this->academic_session_model->get_academic_sessions();

		$this->form_validation->set_rules('matric', 'matric number', 'trim|required|callback_matric_check');
		$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('other_names', 'other names', 'trim|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|required');
		//$this->form_validation->set_rules('password', 'password', 'trim|required');
		//$this->form_validation->set_rules('photo', 'photo', 'trim|required');
		$this->form_validation->set_rules('phonenumber1', 'phonenumber1', 'trim|required');
		$this->form_validation->set_rules('phonenumber2', 'phonenumber2', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|callback_email_check');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('state', 'state', 'trim|required');
		$this->form_validation->set_rules('lga', 'lga', 'trim|required');
		//$this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
		$this->form_validation->set_rules('postal_address', 'postal address', 'trim|required');
		$this->form_validation->set_rules('home_address', 'home address', 'trim|required');
		$this->form_validation->set_rules('academic_session', 'Academic session', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('application_number', 'application number', 'trim|required|callback_application_number_check');
		$this->form_validation->set_rules('program', 'Program of study', 'trim|required|greater_than[0]');
		//$this->form_validation->set_rules('sponsor', 'sponsor', 'trim|required');
		//$this->form_validation->set_rules('interest', 'interest', 'trim|required');
		$this->form_validation->set_message('greater_than', 'Please select %s.');

		
		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/students/add";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'matric' 			=> $this->input->post('matric'),
				'last_name' 		=> $this->input->post('last_name'),
				'first_name'		=> $this->input->post('first_name'),
				'other_names'		=> $this->input->post('other_names'),
				'gender'			=> $this->input->post('gender'),
				'password'			=> $this->input->post('matric'),
				'phonenumber1'		=> $this->input->post('phonenumber1'),
				'phonenumber2'		=> $this->input->post('phonenumber2'),
				'email'				=> $this->input->post('email'),
				'country'			=> $this->input->post('country'),
				'state' 			=> $this->input->post('state'),
				'lga' 				=> $this->input->post('lga'),
				'user_id' 			=>  $this->session->userdata('user_id'),
				'postal_address'	=> $this->input->post('postal_address'),
				'home_address'		=> $this->input->post('home_address'),
				'academic_session'	=> $this->input->post('academic_session'),		
				'application_number' => $this->input->post('application_number'),
				'program' 			=> $this->input->post('program'),
				'interests' 			=> $this->input->post('interests')
				);

			if ($this->student_model->matric_exist($this->input->post('matric')) == true) {
				//var_dump($this->student_model->matric_exist($this->input->post('matric'))); die();
				$this->session->set_flashdata('unique', 'Maric Number already Exists');
				redirect('admin/students/add');
			} 

			//insert student
			$this->student_model->add($data);
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'student',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new student  was added(' .$data['last_name'].'-'.$data['first_name'].' - '.$data['matric'].')'
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Student has been added');
			redirect('admin/students','refresh');
		}
		
	}
	public function edit($id = 0)
	{

		if ($this->student_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {

			$this->form_validation->set_rules('matric', 'matric', 'trim|required');	
			$this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
			$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
			$this->form_validation->set_rules('other_names', 'other_names', 'trim|required');
			$this->form_validation->set_rules('gender', 'gender', 'trim|required');
			//$this->form_validation->set_rules('password', 'password', 'trim|required');
			//$this->form_validation->set_rules('photo', 'photo', 'trim|required');
			$this->form_validation->set_rules('phonenumber1', 'phonenumber1', 'trim|required');
			$this->form_validation->set_rules('phonenumber2', 'phonenumber2', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('country', 'country', 'trim|required');
			$this->form_validation->set_rules('state', 'state', 'trim|required');
			$this->form_validation->set_rules('lga', 'lga', 'trim|required');
			//$this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
			$this->form_validation->set_rules('postal_address', 'postal_address', 'trim|required');
			$this->form_validation->set_rules('home_address', 'home_address', 'trim|required');
			$this->form_validation->set_rules('academic_session', 'academic_session', 'trim|required|greater_than[0]');
			$this->form_validation->set_rules('application_number', 'application number', 'trim|required');
			$this->form_validation->set_rules('program', 'program', 'trim|required|greater_than[0]');
			$this->form_validation->set_rules('interests', 'interests', 'trim|required');

			$this->form_validation->set_message('greater_than', 'Please select  %s');

			if ($this->form_validation->run() == FALSE) {
				//getcurrent student
				$data['programs'] = $this->program_model->get_programs();
				$data['sessions'] = $this->academic_session_model->get_academic_sessions();
				$data['student'] = $this->student_model->get_student($id);

				//var_dump($data); die();
				$data['main'] = "admin/students/edit";
				$this->load->view('admin/layout/main', $data);

			} else {
				$data  = array(
					'matric' 			=> $this->input->post('matric'),
					'last_name' 		=> $this->input->post('last_name'),
					'first_name'		=> $this->input->post('first_name'),
					'other_names'		=> $this->input->post('other_names'),
					'gender'			=> $this->input->post('gender'),
					'password'			=> $this->input->post('matric'),
					//'photo'				=> $this->input->post('photo'),
					'phonenumber1'		=> $this->input->post('phonenumber1'),
					'phonenumber2'		=> $this->input->post('phonenumber2'),
					'email'				=> $this->input->post('email'),
					'country'			=> $this->input->post('country'),
					'state' 			=> $this->input->post('state'),
					'lga' 				=> $this->input->post('lga'),
					'user_id' 			=>  $this->session->userdata('user_id'),
					'postal_address'	=> $this->input->post('postal_address'),
					'home_address'		=> $this->input->post('home_address'),
					'academic_session'	=> $this->input->post('academic_session'),		
					'application_number' => $this->input->post('application_number'),
					'program' 			=> $this->input->post('program'),
					'interests' 		=> $this->input->post('interests')
					);
				//update student
				$this->student_model->update($id, $data);
				$data  = array(
					'resource_id' => $id,
					'type' => 'student',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'student was updated',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Student has been updated');
				redirect('admin/students','refresh');
			}
		}
	}
	
	public function detail($id = 0)
	{
		if ($this->student_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
				//Load template
			$data['student'] = $this->student_model->get_student($id);
			$data['main'] = "admin/students/detail";
			$this->load->view('admin/layout/main', $data);
		}
	}

	public function delete($id = 0)
	{
		if ($this->student_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			//$name = $this->student_model->get_student();
			$this->student_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'student',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'student was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Student has been deleted');
				redirect('admin/students','refresh');
		}
	}

	public function matric_check($matric)
    {
        if ($this->student_model->matric_exist(trim($matric)) == true)
        {
                $this->form_validation->set_message('matric_check', 'The {field} ' .' <strong>'. $matric.'</strong>'. ' already Exists');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }


    public function email_check($email)
    {
        if ($this->student_model->email_exist(trim($email)) == true)
        {
                $this->form_validation->set_message('email_check', 'The {field} ' .' <strong>'. $email.'</strong>'. ' already Exists');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }

    public function application_number_check($number)
    {
        if ($this->student_model->application_number_check(trim($number)) == true)
        {
                $this->form_validation->set_message('application_number_check', 'The {field} ' .' <strong>'. $number.'</strong>'. ' already Exists');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }

    public function search()
	{
		if (!isset($_POST['student'])){

			redirect('admin/students/index','refresh');
		}
		
		$data['students'] = null;
		$data['index'] = "All";

		$this->form_validation->set_rules('student', 'student', 'trim|required|differs[0]');

		// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// var_dump($data); die();
			$data['main'] = "admin/students/index";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'student' => $this->input->post('student'),
				'search_param' => $this->input->post('search_param')
				 );
			
			$data['count'] = $this->student_model->count();

			//insert student
			$data['index'] = "All";
			$data['students'] = $this->student_model->search($data['student'], $data['search_param']);
			$data['main'] = "admin/students/index";
			$this->load->view('admin/layout/main', $data);
			
		}
			
	}

	public function paginate()
	{
		if(isset($_POST['student']))
		{
		

			$this->form_validation->set_rules('student', 'student', 'trim|required');

			$data['index'] = "All";
			// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data['main'] = "admin/students/index";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'student' => $this->input->post('student')
					 );
				
				$data['count'] = $this->student_model->count();	
				$data['index'] = $data['student'];
				$data['students'] = $this->student_model->paginate($data['student']);
				
				$data['main'] = "admin/students/index";
				$this->load->view('admin/layout/main', $data);

				
			}

		} else {
			redirect('admin/students/index','refresh');
		}
	}	
	
}