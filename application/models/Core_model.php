<?php
/**
*
*/
class Core_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'messages';
	}

	public function validate_user($matric, $password)
	{
		# valididate user matric and password
		$this->db->select('matric, password');
		$this->db->from('students');
		$this->db->where('matric', $matric);
		$row = $this->db->get()->row();
		if ($matric == $row->matric && $password == $row->password) {
			return true;
		} else {

			return false;
		}
		
	}
	
	public function matric_password_exists($matric, $password)
	{		
		$this->db->select('matric, password');
		$this->db->from('students');
		$this->db->where('matric', $matric);
		$this->db->where('password', $password);
		$query = $this->db->count_all_results();
		if ($query == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function password_match($matric, $password)
	{
		
		$this->db->select('password');
		$this->db->from('students');
		$this->db->where('matric', $matric);
		$row = $this->db->get()->row();
		if($row && $this->db->count_all_results() == 1){
			$password1 = $row->password;
			if($password1 == $password) {
				return true;
			} else {
				return false;
			}
		}
		
	}
	public function new_passwords_match($password1, $password2)
	{
		if (is_numeric($password1) && is_numeric($password2)) {

				if (trim($password1) == trim($password2)) 
				{
					return true;
				} else {
					return false;
				}						
		}else
		{
			return false;
		}
						
	}
	public function new_password_same_as_old_password($password1, $password2)
	{
		if (is_numeric($password1) && is_numeric($password2)) {

				if (trim($password1) == trim($password2)) 
				{
					return true;
				} else {
					return false;
				}						
		}
		else
		{
			return false;
		}
						
	}
	public function user_credentials_exist($matric, $password)
	{
		
		$this->db->select('matric,');
		$this->db->from('students');
		$this->db->where('matric', $matric);
		$this->db->where('password', $password);
		$query = $this->db->count_all_results();
		if ($query == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function course_exists($code)
	{
		
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('code', $code);
		$query = $this->db->count_all_results();
		if ($query == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function matric_exists($matric)
	{
		
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('matric', $matric);
		$query = $this->db->count_all_results();
		if ($query == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function get_keyword($key)
	{
		$key = strtolower($key);
		switch ($key) {
			case strtolower('result'):
				return 'result';
				break;
			case strtolower('password'):
				return 'password';
				break;
			case strtolower('help'):
				return 'help';
				break;
			default :
				return 'error';
				break;
		}
	}

	public function contains_array_item($arrays, $item)
	{
		for ($index = 0; $index < count($arrays); $index++) { 
			
			if ($arrays[$index] == $item) {
				return true;
			} 
		}
	}

	public function change_password($matric, $new_password)
	{
		$this->db->set('password', $new_password);
		$this->db->where('matric', $matric);
		$this->db->update('students'); 
	}

	public function get_program($matric)
	{
		
		$this->db->select('p.name as program, s.matric');
		$this->db->from('programs as p');
		$this->db->join('students as s', 'p.id = s.program', 'left');		
		$this->db->where('s.matric', $matric);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_coursecode($id)
	{
		
		$this->db->select('code');
		$this->db->from('courses');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row()->code;
	}

	
	public function get_result($matric, $course)
	{
		$this->db->select('r.* , c.code as code,  c.title as course, se.title as semester, session.name as session, s.last_name as last_name, s.first_name as first_name, s.other_names as other_names, p.name as program' );
		$this->db->from('results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$this->db->join('students as s', 'r.matric = s.matric', 'left');
		$this->db->join('programs as p', 'p.id = s.program', 'left');	
		$this->db->where('r.matric', $matric);
		$this->db->where('c.id', $course);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_all_results($matric, $semester, $session)
	{
		$this->db->select('r.* , c.code as code,  c.title as course, se.title as semester, sess.name as session, s.last_name as last_name, s.first_name as first_name, s.other_names as other_names, p.name as program, sess.name as session' );
		$this->db->from('results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$this->db->join('students as s', 'r.matric = s.matric', 'left');
		$this->db->join('programs as p', 'p.id = s.program', 'left');	
		$this->db->join('academicsessions as sess', 'r.session = sess.id', 'left');
		$this->db->where('r.matric', $matric);
		$this->db->where('se.id', $semester);
		$this->db->where('sess.id', $session);

		$query = $this->db->get();
		return $query->result();
		
	}

	
	public function send_message($phonenumber, $message)
	{
		return true;		
	}

	public function get_helptext()
	{
		return 'Send text message using the format "HELP phonenumber matric password" to ';
	}

	public function get_phonenumbers($session, $course)
	{
		
		$numbers = array();
		$query = "SELECT DISTINCT students.phonenumber1 from students 	where students.matric in (	SELECT results.matric from results
			    WHERE results.course = $course AND results.session = $session )";
		$results = $this->db->query($query)->result();
		foreach ($results as $number) {
			array_push($numbers, $number->phonenumber1);
		}
		return $numbers;
	}	
	
		
	public function insert_sms($data)
	{
		$this->db->insert('sms', $data);
	}
		
}