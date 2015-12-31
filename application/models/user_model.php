<?php
class User_model extends CI_Model {
	
	var $email    = '';
	var $name     = '';
	var $user_id  = '';
	var $role     = '';
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function users_get()
	{
		$sql = 'SELECT * FROM shift';
		$this->db->trans_start();
		$query = $this->db->query($sql);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'Could not process users_get method in user_model. Query Failed.');
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
								'manager_id' => $row->manager_id, 
								'employee_id' => $row->employee_id, 
								'break' => $row->break, 
								'start_time' => $row->start_time,
								'end_time' => $row->end_time
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

	function check_login($email,$pass)
	{
		$sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
		$this->db->trans_start();
		$query = $this->db->query($sql, array($email,md5($pass)));
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'Could not process check_login method in login_model. Query Failed.');
			$this->db->trans_rollback();
			return false;
		}
		else {
			$this->db->trans_commit();
	
			$row = $query->row();
				
			if ($query->num_rows() > 0) {
				/* Set User Session Data */
				$datalogin = array(
						'user_id'     		 => $row->id,
						'name'				 => $row->name,
						'role'               => $row->role,
				);
				// Delete Session Variables - For Switching Users
				$array_items = array('user_id' => '', 'name' => '', 'role' => '');
				$this->session->unset_userdata($array_items);
				$this->session->set_userdata($datalogin);
					
				return true;
			}
			else {
				return false;
			}
		}
		$this->db->flush_cache();
	}
	
	function logout() {
		$array_items = array('user_id' => '', 'name' => '', 'role' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		return true;
	}	
	
}