<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'./libraries/REST_Controller.php');

class Employee extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
	
		// Configure limits on our controller methods
		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		$this->methods['shift_get']['limit'] = 500; // 500 requests per hour per employee/key
		$this->methods['shift_post']['limit'] = 100; // 100 requests per hour per employee/key
		$this->methods['shift_delete']['limit'] = 50; // 50 requests per hour per employee/key
		
		// Load the Employees Model
		$this->load->model(array('employee_model'));
	}

	public function employees_get()
	{
		// Employees from Database
		
		$employees = $this->employee_model->employees_get();
		if ($employees == false) {
			echo '{"error":"nodata"}';
		}
		else {
			$id = $this->get('id');
			
			// If the id parameter doesn't exist return all the users
			
			if ($id === NULL)
			{
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($employees)
				{
					// Set the response and exit
					$this->response($employees, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
							'status' => FALSE,
							'message' => 'No employees were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}
			
			// Find and return a single record for a particular user.
			
			$id = (int) $id;
			
			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}
			
			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.
			
			$employee = NULL;
			
			if (!empty($employees))
			{
				foreach ($employees as $key => $value)
				{
					if (isset($value['id']) && $value['id'] === $id)
					{
						$employee = $value;
					}
				}
			}
			
			if (!empty($employee))
			{
				$this->set_response($employee, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
						'status' => FALSE,
						'message' => 'Employees could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}			
		}
	}
	
	public function employees_post() {
		
	}
	
	public function employees_put() {
		
	}
	
	public function employees_delete($id) {
		$this->response(['returned from delete:' => $id,]);
	}
}

/* End of file employee.php */
/* Location: ./application/controllers/employee.php */