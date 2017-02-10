<?php
/**
*
*/
class User_model extends CI_MODEL
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'users';
	}
	public function get_users()
	{
		$this->db->select('a.*, b.name as group, b.id as user_group' );
		$this->db->from('users as a');
		$this->db->join('usergroups as b', 'a.user_group = b.id', 'left');
		$this->db->order_by('b.id', 'asc');
		$query = $this->db->get();
		return $query->result();


	}

	public function get_usertype($email)
	{
		$this->db->select('users.*, usergroups.*' );
		$this->db->from('users');
		$this->db->join('usergroups', 'usergroups.id = users.user_group', 'left');
		$this->db->where('users.email', $email);
		$query = $this->db->get()->row();
		
		if($query!== NULL){
			return strtolower(trim($query->name));
		}else{
			return NULL;
		}
		
	}

	public function get_user($id)
	{
		
		$this->db->select('a.*, b.name as group, b.name as user_group' );
		$this->db->from('users as a');
		$this->db->join('usergroups as b', 'a.user_group = b.id', 'left');
		$this->db->where('a.id', $id);
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

	public function login($email, $password)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('email', $email);
		$this->db->where('password', $password);		
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1)
		{
			return $query->row()->id;
		} else {
			return false;
		}
		
	}

	public function get_user_fullname($email)
	{
		$this->db->select('last_name, first_name');
		$this->db->from($this->table);
		$this->db->where('email', $email);

		$query = $this->db->get()->row();
		
		if($query!== NULL){
			return strtoupper(trim($query->last_name . " " . $query->first_name ));
		}else{
			return NULL;
		}
				
	}

	public function is_user_active($email)
	{
		$this->db->select('status');
		$this->db->from($this->table);
		$this->db->where('email', $email);

		$result = $this->db->get()->row()->status;

		return $result;		
					
	}

	public function suspend_account($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	public function activate_account($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	
	public function check_if_id_exist()
	{
		
		redirect('examiner/error','refresh');
	}

	public function check_if_id_exists($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function get_user_name($id)
	{
		$this->db->select('last_name, first_name, email');
		$this->db->from($this->table);
		$this->db->where('id', $id);

		$query = $this->db->get()->row();
		
		if($query!== NULL){
			return strtoupper(trim($query->last_name . " " . $query->first_name. ' - ' . $query->email));
		}else {
			return NULL;
		}				
	}

	public function get_admin_email($id)
	{
		$this->db->select(' email');
		$this->db->from($this->table);
		$this->db->where('id', $id);

		$query = $this->db->get()->row()->email;
		
		return $query;
				
	}

	
}