<?php
/**
*
*/
class Student_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'students';
	}
	public function get_students()
	{
		$this->db->select('students.*, p.name as program, a.name as session' );
		$this->db->from($this->table);
		$this->db->join('programs as p','students.program = p.id', 'left');
		$this->db->join('academicsessions as a','students.academic_session = a.id', 'left');
		$query = $this->db->get();
		//var_dump($query->result());die();
		return $query->result();


	}
	public function get_student($id)
	{
		
		$this->db->select('students.*, p.name as program,p.id as program_id, a.name as session' );
		$this->db->from($this->table);
		$this->db->join('programs as p','students.program = p.id', 'left');
		$this->db->join('academicsessions as a','students.academic_session = a.id', 'left');
		$this->db->where('students.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function search($table_column,$parameter)
	{
		$this->db->select('students.*, p.name as program, a.name as session' );
		$this->db->from($this->table);
		$this->db->join('programs as p','students.program = p.id', 'left');
		$this->db->join('academicsessions as a','students.academic_session = a.id', 'left');
		$this->db->like($table_column, $parameter);
		$query = $this->db->get()->result();
		return $query;
	}
	public function paginate($limit )
	{
		$this->db->limit($limit);
		$this->db->select('students.*, p.name as program, a.name as session' );
		$this->db->from($this->table);
		$this->db->join('programs as p','students.program = p.id', 'left');
		$this->db->join('academicsessions as a','students.academic_session = a.id', 'left');
		$query = $this->db->get()->result();	
		
		return $query;
	}

	public function count()
	{
		return $this->db->count_all($this->table);
	}

	public function update($id, $data) {
			
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	public function add($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	public function matric_isvalid($matric)
	{
		$this->db->select('matric');
		$this->db->from('students');
		$this->db->where('matric', $matric);
		$result =  $this->db->count_all_results();
		if ($result ==  1) {
			return True;
		} else {
			return false;
		}
		
	}

	public function matric_exist($matric)
	{
		$this->db->select('matric');
		$this->db->from('students');
		$this->db->where('matric', $matric);

		$result =  $this->db->count_all_results();
		//var_dump($result); die();
		if ($result >=  1) {
			return True;
		} else {
			return false;
		}
		
	}

	public function email_exist($email)
	{
		$this->db->select('email');
		$this->db->from('students');
		$this->db->where('email', $email);

		$result =  $this->db->count_all_results();
		//var_dump($result); die();
		if ($result >=  1) {
			return True;
		} else {
			return false;
		}
	}

	public function application_number_check($number)
	{
		$this->db->select('application_number');
		$this->db->from('students');
		$this->db->where('application_number', $number);

		$result =  $this->db->count_all_results();
		//var_dump($result); die();
		if ($result >=  1) {
			return True;
		} else {
			return false;
		}
	}

	public function check_if_id_exists($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row(); 
	}
}