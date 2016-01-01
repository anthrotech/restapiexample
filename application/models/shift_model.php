<?php
class Shift_model extends CI_Model {
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function shifts_get()
	{
		$sql = "SELECT * FROM shift";
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
				foreach ($query->result() as $row){
					// Get the Manager's Name
					$manager_sql = "SELECT u.name FROM shift as s INNER JOIN users AS u ON s.manager_id = u.id WHERE s.id = $row->id";
					$manager_query = $this->db->query($manager_sql);				
					if ($manager_query->num_rows() > 0) {
						foreach ($manager_query->result() as $manager_row) {
							$manager_name = $manager_row->name;
						}
					}
					else {
						$manager_name = 'N/A';
					}
					
					// Get the Employee's Name
					$employee_sql = "SELECT u.name FROM shift as s INNER JOIN users AS u ON s.employee_id = u.id WHERE s.id = $row->id";
					$employee_query = $this->db->query($employee_sql);
					if ($employee_query->num_rows() > 0) {
						foreach ($employee_query->result() as $employee_row) {
							$employee_name = $employee_row->name;
						}
					}
					else {
						$employee_name = 'N/A';
					}					
					
					$results[] = array(
								'id' => $row->id, 
								'manager' => $manager_name, 
								'employee' => $employee_name, 
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