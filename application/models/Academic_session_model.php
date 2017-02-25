<?php
/**
*
*/
class Academic_session_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'academicsessions';
	}
	public function get_academic_sessions()
	{
		$this->db->order_by("id", "asc");
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function get_academic_session($id)
	{
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_session_name($id)
	{
		$this->db->select('name');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row()->name;
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