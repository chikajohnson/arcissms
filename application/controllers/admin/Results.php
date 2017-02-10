<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Results extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
		 	redirect('welcome');
		}

		if ($this->session->userdata('user_type') != 'admin') {
		 	redirect('welcome');
		}

		// var_dump(date('d-m-Y:H:i:s')); die();
		// var_dump($this->student_model->matric_isvalid('189921')) ; die();
		
	}
			

	public	function upload_result()	
	{
		$data['courses'] = $this->course_model->get_courses();
		$data['semesters'] = $this->semester_model->get_semesters();
		$data['sessions'] = $this->academic_session_model->get_academic_sessions();

		$config['upload_path'] = "";
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size']  = '0';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		
		$this->form_validation->set_rules('course_lecturer1', 'Course lecturer1', 'trim|required');
		$this->form_validation->set_rules('chief_examiner', 'Chief examiner', 'trim|required');

		$this->form_validation->set_rules('semester', 'Semester',  'trim|required|greater_than[0]');
		$this->form_validation->set_rules('session', 'Academic session',  'trim|required|greater_than[0]');
		$this->form_validation->set_rules('course', 'Course',  'trim|required|greater_than[0]');

		$this->form_validation->set_message('greater_than', 'Please select %s.');


		#var_dump('reacheable'); die();
		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/results/batch_upload";
			$this->load->view('admin/layout/main', $data);
		}
		elseif (!$this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());

			$data['main'] = "admin/results/batch_upload";
			$this->load->view('admin/layout/main', $data);			
		}
		else
		{


			if(isset($_POST["import"]))
	            {
	            	$current_date = date('d-m-Y:H:i:s');
					$item = $this->course_model->get_course_code($this->input->post('course'));
			    	$item = strtolower($item->code) . "-" . $current_date;

	            	$batch_upload_code = NULL;
	            	$heading = True;
	                $filename=$_FILES["file"]["tmp_name"];
	                $csv_result_batch = array();
	                if($_FILES["file"]["size"] > 0)
	                  {
	                    $file = fopen($filename, "r");

	                     while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	                     {
	                     	 if($heading) {
						        // unset the heading flag
						        $heading = false;
						        // skip the loop
						        continue;
						        
						    }
						    						    	
								$batch_upload_code = $item;

							    $batch_data = array(
	                                'matric' => trim($emapData[0]),
	                                'assessment' => trim($emapData[1]),
	                                'exam_score' => trim($emapData[2]),
	                                'total_score' => trim($emapData[3]),
	                                'adjusted_mark' => trim($emapData[4]),
									'remark' => trim($emapData[5]),
									'course'	 => $this->input->post('course'),
									'semester'	 => $this->input->post('semester'),
									'session' => $this->input->post('session'),
									'course_lecturer1' => $this->input->post('course_lecturer1'),
									'course_lecturer2' => $this->input->post('course_lecturer2'),
									'course_lecturer3' => $this->input->post('course_lecturer3'),
									'course_lecturer4' => $this->input->post('course_lecturer4'),
									'chief_examiner' => $this->input->post('chief_examiner'),
									'batch_upload_code'	 => $item,
									'uploaded_in_batch' => True,
	                               );

	                               // if ($this->student_model->matric_isvalid($batch_data['matric']) == false) {
	                               //  	$batch_data['isvalid'] = 0;
	                               //  } 
	                                 
	                           array_push($csv_result_batch, $batch_data);
	                           //$insertId = $this->result_model->insertCSV($data); 	                     
	                 }
	                fclose($file);
	               
	                $insertId = $this->result_model->insert_batch_CSV($csv_result_batch);

	                $number = $this->result_model->count_last_inserted_tempresults($batch_upload_code);	       
	                $msg = $number." results have been prepared for batch upload. Click <strong>FINISH UPLOAD</strong> to upload results or <strong>CANCEL UPLOAD </strong> to cancel the upload process.";

	                // Insert users activity
	                $activity  = array(
						'resource_id' => $batch_upload_code,
						'type' => 'result',
						'action' => 'updated',
						'user_id' => $this->session->userdata('user_id'),
						'message' => $number . ' Results have been prepared  for upload'
					);
					//Insert Activivty
					$this->activity_model->add($activity);	                 

	                $this->session->set_flashdata('info', $msg);
	                $data['results'] = $this->result_model->get_last_inserted_results($batch_upload_code);
	              	
	              	$data['main'] = "admin/results/batch_upload_final";
					$this->load->view('admin/layout/main', $data);	
	              }	             
            }	
        }
	}
	
	public function commit_batch_upload($batch_upload_code)
	{
		$upload_count = 0;
		$results = $this->result_model->get_last_inserted_tempresults($batch_upload_code);
		$batch_result  = array();
		if ($results) {
			foreach ($results as $result) {
				$data  = array(
					'matric' 			=>  $result->matric,
                    'assessment'	 	=> $result->assessment,
                    'exam_score'	 	=> $result->exam_score,
                    'total_score'	 	=> $result->total_score,
                    'adjusted_mark'  	=> $result->adjusted_mark,
					'remark' 		 	=> $result->remark,
					'course'		 	=> $result->course,
					'semester'	 	 	=> $result->semester,
					'session' 		 	=> $result->session,
					'course_lecturer1'  => $result->course_lecturer1,
					'course_lecturer2'  => $result->course_lecturer2,
					'course_lecturer3'  => $result->course_lecturer3,
					'course_lecturer4'  => $result->course_lecturer4,
					'chief_examiner'    => $result->chief_examiner,
					'batch_upload_code' => $result->batch_upload_code,
					'uploaded_in_batch' => $result->uploaded_in_batch,
					'isvalid'			=>$result->isvalid
				);
				if ($data['isvalid'] == 1) {					
					#$this->db->trans_start();
					array_push($batch_result, $data);
					$upload_count++;
				}				
								
			}

				$this->result_model->add_batch($batch_result);
			
				$this->result_model->delete_last_inserted_tempresults($batch_upload_code);

				$number = $this->result_model->count_last_inserted_results($batch_upload_code);	       
	            $msg = $upload_count." Result have been succesfully inserted into the results table.";

	            // Insert users activity
	                $activity  = array(
						'resource_id' => $batch_upload_code,
						'type' => 'result',
						'action' => 'updated',
						'user_id' => $this->session->userdata('user_id'),
						'message' => $upload_count . ' Results have been committed into the results table'
					);
					//Insert Activivty
					

					$this->activity_model->add($activity);	  

	            $this->session->set_flashdata('success', $msg);   
				redirect('admin/results','refresh');
		}
		
	}
	public function cancel_batch_upload($batch_upload_code)
	{   
		$this->result_model->delete_last_inserted_tempresults($batch_upload_code);	

		// Insert users activity
        $activity  = array(
			'resource_id' => $batch_upload_code,
			'type' => 'result',
			'action' => 'updated',
			'user_id' => $this->session->userdata('user_id'),
			'message' => 'Batch Upload has been cancelled'
		);
		//Insert Activivty
		$this->activity_model->add($activity);	  

		$this->session->set_flashdata('cancel_upload', 'Batch upload process has been terminated');
		redirect('admin/results','refresh');	
	}

	public function index()
	{
			//Load template

		$data['index'] = '100';

		$data['results'] = $this->result_model->get_results($data['index']);
		$data['courses'] = $this->course_model->get_courses();
		$data['count'] = $this->result_model->count();

		

		$data['main'] = "admin/results/index";
		$this->load->view('admin/layout/main', $data);
	}
	public function add()
	{
		$data['courses'] = $this->course_model->get_courses();
		$data['semesters'] = $this->semester_model->get_semesters();
		$data['sessions'] = $this->academic_session_model->get_academic_sessions();
		
		$this->form_validation->set_rules('matric', 'matric', 'trim|required');
		$this->form_validation->set_rules('course', 'course', 'trim|required');
		$this->form_validation->set_rules('semester', 'semester', 'trim|required');
		$this->form_validation->set_rules('assessment', 'assessment', 'trim|required');
		$this->form_validation->set_rules('exam_score', 'Exam Score', 'trim|required');
		$this->form_validation->set_rules('adjusted_mark', 'adjusted_mark', 'trim|required');
		$this->form_validation->set_rules('session', 'session', 'trim|required');
		$this->form_validation->set_rules('remark', 'remark', 'trim|required');
		$this->form_validation->set_rules('course_lecturer1', 'course lecturer1', 'trim|required');
		$this->form_validation->set_rules('chief_examiner', 'chief_examiner', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['main'] = "admin/results/add";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'matric' => $this->input->post('matric'),
				'course' => $this->input->post('course'),
					'semester'	 => $this->input->post('semester'),
				'assessment' => $this->input->post('assessment'),
				'exam_score' => $this->input->post('exam_score'),
				'adjusted_mark' => $this->input->post('adjusted_mark'),
				'session' => $this->input->post('session'),
				'remark' => $this->input->post('remark'),
				'course_lecturer1' => $this->input->post('course_lecturer1'),
				'course_lecturer2' => $this->input->post('course_lecturer2'),
				'course_lecturer3' => $this->input->post('course_lecturer3'),
				'course_lecturer4' => $this->input->post('course_lecturer4'),
				'chief_examiner' => $this->input->post('chief_examiner')
				);
			//insert results
			$this->result_model->add($data);
			$result = $this->course_model->get_course($this->input->post('course'));
			$data  = array(
				'resource_id' => $this->db->insert_id(),
				'type' => 'result',
				'action' => 'added',
				'user_id' => $this->session->userdata('user_id'),
				'message' => 'A new result  was added('. $result->code . ' for student - '.  $data['matric'] .')'
				);
			//Insert Activivty
			$this->activity_model->add($data);
			//Set Message
			$this->session->set_flashdata('success', 'Result has been added');
			redirect('admin/results','refresh');
		}
		
	}
	public function edit($id = 0)
	{
		if ($this->result_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			$data['result'] = $this->result_model->get_result($id);
			$data['courses'] = $this->course_model->get_courses();
			$data['semesters'] = $this->semester_model->get_semesters();
			$data['sessions'] = $this->academic_session_model->get_academic_sessions();
					//var_dump($data['results']);var_dump($data['groups']);die();
			$this->form_validation->set_rules('matric', 'matric', 'trim|required');
			$this->form_validation->set_rules('course', 'course', 'trim|required');
			$this->form_validation->set_rules('semester', 'semester', 'trim|required');
			$this->form_validation->set_rules('assessment', 'assessment', 'trim|required');
			$this->form_validation->set_rules('exam_score', 'exam_score', 'trim|required');
			$this->form_validation->set_rules('adjusted_mark', 'adjusted_mark', 'trim|required');
			$this->form_validation->set_rules('session', 'session', 'trim|required');
			$this->form_validation->set_rules('remark', 'remark', 'trim|required');
			$this->form_validation->set_rules('course_lecturer1', 'course lecturer1', 'trim|required');
			$this->form_validation->set_rules('chief_examiner', 'chief_examiner', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				//getcurrent subject
				$data['result'] = $this->result_model->get_result($id);
				//var_dump($data['result']); die();
				$data['main'] = "admin/results/edit";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'matric' => $this->input->post('matric'),
					'course' => $this->input->post('course'),
					'semester'	 => $this->input->post('semester'),
					'assessment' => $this->input->post('assessment'),
					'exam_score' => $this->input->post('exam_score'),
					'adjusted_mark' => $this->input->post('adjusted_mark'),
					'session' => $this->input->post('session'),
					'remark' => $this->input->post('remark'),
					'course_lecturer1' => $this->input->post('course_lecturer1'),
					'course_lecturer2' => $this->input->post('course_lecturer2'),
					'course_lecturer3' => $this->input->post('course_lecturer3'),
					'course_lecturer4' => $this->input->post('course_lecturer4'),
					'chief_examiner' => $this->input->post('chief_examiner')
					);
				//update result
				$this->result_model->update($id, $data);
				$data  = array(
					'resource_id' => $id,
					'type' => 'result',
					'action' => 'updated',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'Result was updated',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Result has been updated');
				redirect('admin/results','refresh');
			}
		}
	}
	public function detail($id = 0)
	{
		if ($this->result_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			//Load template
			$data['result'] = $this->result_model->get_result($id);

			$data['main'] = "admin/results/detail";
			$this->load->view('admin/layout/main', $data);
		}
	}

	public function delete($id = 0)
	{
		if ($this->result_model->check_if_id_exists($id) == NULL) {
			$data['main'] = 'admin/error';
			$this->load->view('admin/layout/main', $data);
		} else {
			//$name = $this->result_model->get_result();
			$this->result_model->delete($id);
			$data  = array(
					'resource_id' => $id,
					'type' => 'result',
					'action' => 'Deleted',
					'user_id' => $this->session->userdata('user_id'),
					'message' => 'result was deleted',
					);
				//Insert Activivty
				$this->activity_model->add($data);
				//Set Message
				$this->session->set_flashdata('success', 'Result has been deleted');
				redirect('admin/results','refresh');
		}
	}

	public function search()
	{
		if (!isset($_POST['result'])){
			redirect('admin/results/index','refresh');
		}
		
		$data['results'] = null;
		$data['index'] = "All";

		$this->form_validation->set_rules('result', 'result', 'trim|required|differs[0]');

		// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// var_dump($data); die();
			$data['main'] = "admin/results/index";
			$this->load->view('admin/layout/main', $data);
		} else {
			$data  = array(
				'result' => $this->input->post('result'),
				'search_param' => $this->input->post('search_param')
				 );
			
			$data['count'] = $this->result_model->count();

			//insert result
			$data['index'] = "All";
			$data['results'] = $this->result_model->search($data['result'], $data['search_param']);
			$data['main'] = "admin/results/index";
			$this->load->view('admin/layout/main', $data);

			
		}
		
	}

	public function paginate()
	{
		if(isset($_POST['result'])){
		

			$this->form_validation->set_rules('result', 'result', 'trim|required');

			$data['index'] = "All";
			// $this->form_validation->set_rules('search_param', 'Search parameter', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data['main'] = "admin/results/index";
				$this->load->view('admin/layout/main', $data);
			} else {
				$data  = array(
					'result' => $this->input->post('result')
					 );
				
				$data['count'] = $this->result_model->count();	
				$data['index'] = $data['result'];
				$data['results'] = $this->result_model->paginate($data['result']);

				$data['main'] = "admin/results/index";
				$this->load->view('admin/layout/main', $data);

				
			}

		} else {
			redirect('admin/results/index','refresh');
		}
	}


		
}