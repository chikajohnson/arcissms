<?php
/**
*
*/
class Message_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'messages';
	}
	public function get_messages()
	{		
		$this->db->select('m.* , mt.name as message_type, u.email as admin' );
		$this->db->from('messages as m');
		$this->db->join('messagetypes as mt', 'mt.id = m.message_type', 'left');
		$this->db->join('users as u', 'm.admin = u.id', 'left');
		$query = $this->db->get();
		return $query->result();


	}
	public function get_message($id)
	{
		
		$this->db->select('m.*, mt.name as message_type, mt.id as message_type_id');
		$this->db->from('messages as m');
		$this->db->join('messagetypes as mt', 'mt.id = m.message_type', 'left');
		$this->db->where('m.id', $id);
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
		$this->db->insert('messages', $data);
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

	public function count()
	{
		return $this->db->count_all('sms_requests');
	}
}

