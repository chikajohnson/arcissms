<?php 
/**
* 
*/
class Activity_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'activities';
	}

	public function get_activities()
	{
		$this->db->select('a.*, b.user_name as username');
		$this->db->from('activities as a');
		$this->db->join('users as b', 'b.id = a.user_id', 'left');
	 	$this->db->order_by('a.id', 'DESC');
		$query = $this->db->get();		
		return $query->result();;
	}

	public function get_user_activities()
	{
		$this->db->select('*');
		$this->db->from('sms_requests');
		$query = $this->db->get();		
		return $query->result();;
	}

	public function add($data)
	{
		 $this->db->insert($this->table, $data);
	}

	public function count()
	{
		return $this->db->count_all('courses');
	}
	
}