<?php
class Shift_model extends CI_Model {
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function shifts_get()
	{
		$sql = "SELECT s.id, s.break, s.start_time, s.end_time, uman.name as manager_name, uemp.name as employee_name 
				FROM shift as s 
				LEFT JOIN users as uman ON s.manager_id = uman.id 
				LEFT JOIN users as uemp ON s.employee_id = uemp.id";
		$this->db->trans_start();
		$query = $this->db->query($sql);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'Could not process shifts_get method in shift_model. Query Failed.');
			$this->db->trans_rollback();
			return false;
		}
		else {
			$this->db->trans_commit();
			
			if ($query->num_rows() > 0) {
				$results = array();
				foreach ($query->result() as $row) {				
					$results[] = array(
								'id' => $row->id, 
								'manager' => $row->manager_name, 
								'employee' => $row->employee_name, 
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
}