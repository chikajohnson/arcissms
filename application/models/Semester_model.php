<?php
/**
*
*/
class Semester_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'semesters';
	}
	public function get_semesters()
	{
		$this->db->order_by("id", "asc");
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function get_semester($id)
	{
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_semester_name($id)
	{		
		$this->db->select('name');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row()->name;
	}


	public function update($id, $data)
	{
			
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

	public function check_if_id_exists($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row(); 


	}
}