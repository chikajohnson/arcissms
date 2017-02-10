<?php
class Message_type_model extends CI_MODEL
{	function __construct()
	{
		parent::__construct();
		$this->table = 'messagetypes';
	}
	public function get_message_types()
	{
		$this->db->select('*' );
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_message_type($id)
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