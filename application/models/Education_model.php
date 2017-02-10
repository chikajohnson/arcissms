<?php
/**
*
*/
class Education_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'educations';
	}
	public function get_educations()
	{
		$this->db->select('*' );
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result();


	}
	public function get_education($id)
	{
		
		$this->db->select('e.*, s.last_name, s.first_name, s.other_names');
		$this->db->from('educations as e');
		$this->db->join('students as s', 'e.matric = s.matric', 'left');
		$this->db->where('e.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function search($table_column,$parameter)
	{
		
		$this->db->select('*');
		$this->db->like($table_column, $parameter);
		$this->db->from($this->table);
		$query = $this->db->get()->result();
		return $query;
	}
	public function paginate($limit )
	{
		$this->db->limit($limit);
		$query = $this->db->get($this->table);
		$result = $query->result();
		
		return $result;
	}

	public function count()
	{
		return $this->db->count_all($this->table);
	}

	public function update($id, $data)
	{
			
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	public function add($data)
	{
		$this->db->insert('educations', $data);
	}
	public function delete($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$this->db->delete($this->table);
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