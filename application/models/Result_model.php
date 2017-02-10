<?php
/**
*
*/
class Result_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'results';
	}
	public function get_results($index)
	{
		$this->db->select('r.* , c.code as code,  c.title as course, se.name as semester, session.name as session' );
		$this->db->limit($index);		
		$this->db->from('results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_result($id)
	{
		$this->db->select('r.* , c.code as code,  c.title as course,c.id as course_id,  se.title as semester, se.id as semester_id, session.name as session,session.id as session_id, s.last_name as last_name, s.first_name as first_name, s.other_names as other_names, p.name as program' );
		$this->db->from('results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$this->db->join('students as s', 'r.matric = s.matric', 'left');
		$this->db->join('programs as p', 'p.id = s.program', 'left');
		$this->db->where('r.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function search($table_column,$parameter)
	{
		
		$this->db->select('r.* , c.code as code,  c.title as course, se.name as semester, session.name as session' );
		$this->db->from('results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$this->db->like($table_column, $parameter);
		$query = $this->db->get()->result();
		return $query;
	}
	public function paginate($limit )
	{
		$this->db->limit($limit);
		$this->db->select('r.* , c.code as code,  c.title as course, se.name as semester, session.name as session' );
		$this->db->from('results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$query = $this->db->get($this->table);
		$result = $query->result();
		
		return $result;
	}

	public function count()
	{
		return $this->db->count_all($this->table);
	}



	public function check_if_id_exists($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row(); 
	}
	

	public function update($id, $data)
	{
			
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	public function add($data)
	{
		$this->db->insert('results', $data);
	}
	public function delete($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	public function insert_batch_CSV($data)
	{
		$this->db->insert_batch('temp_results', $data);
		return $this->db->insert_id();
	}

	public function add_batch($data)
	{
		$this->db->insert_batch('temp_results', $data);

	}

	public function get_last_inserted_results($batch_upload_code)
	{
		$this->db->select('r.* , c.code as code,  c.title as course, se.name as semester, session.name as session' );
		$this->db->from('temp_results as r');
		$this->db->join('courses as c', 'r.course = c.id', 'left');
		$this->db->join('semesters as se', 'r.semester = se.id', 'left');
		$this->db->join('academicsessions as session', 'r.session = session.id', 'left');
		$this->db->where('r.batch_upload_code', $batch_upload_code);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_last_inserted_tempresults($batch_upload_code)
	{
		$this->db->select('*' );
		$this->db->from('temp_results as r');
		$this->db->where('r.batch_upload_code', $batch_upload_code);
		$query = $this->db->get();
		return $query->result();
	}

	public function delete_last_inserted_tempresults($batch_upload_code)
	{
		$this->db->select('*' );
		$this->db->from('temp_results');
		$this->db->where('batch_upload_code', $batch_upload_code);
		$this->db->delete('temp_results');
	}

	public function count_last_inserted_tempresults($batch_upload_code)
	{
		$this->db->count_all_results('temp_results');
		$this->db->where('batch_upload_code', $batch_upload_code);
		return $this->db->count_all_results('temp_results');
	}

	public function count_last_inserted_results($batch_upload_code)
	{
		$this->db->count_all_results('results');
		$this->db->where('batch_upload_code', $batch_upload_code);
		return $this->db->count_all_results('results');
	}
	
}