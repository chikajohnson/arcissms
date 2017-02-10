<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Results extends CI_Controller {
	
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
		$data['results'] = $this->result_model->get_results();
		$data['courses'] = $this->course_model->get_courses();

		$data['main'] = "examiner/results/index";
		$this->load->view('examiner/layout/main', $data);
	}
	
	public function detail($id=0)
	{
		if ($this->result_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'examiner/error';
			$this->load->view('examiner/layout/main', $data);
		} else {

			$data['result'] = $this->result_model->get_result($id);

			$data['main'] = "examiner/results/detail";
			$this->load->view('examiner/layout/main', $data);
		}
	}	
		
}