<?php
class Employee_model extends CI_Model {
	
	var $email    = '';
	var $name     = '';
	var $user_id  = '';
	var $role     = '';
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function employees_get()
	{
		$sql = 'SELECT * FROM users';
		$this->db->trans_start();
		$query = $this->db->query($sql);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'Could not process employees_get method in employee_model. Query Failed.');
			$this->db->trans_rollback();
			return false;
		}
		else {
			$this->db->trans_commit();
			
			if ($query->num_rows() > 0) {
				$results = array();
				foreach ($query->result() as $row){
					$results[] = array(
								'id' => $row->id, 
								'name' => $row->name, 
								'role' => $row->role, 
								'email' => $row->email, 
								'phone' => $row->phone,
								'created_at' => $row->created_at,
								'updated_at' => $row->updated_at
					);
				}
				return $results;
			}
			else {
				return false;
			}
		}
		$this->db->flush_cache();
	}
	
}