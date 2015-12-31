<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'./libraries/REST_Controller.php');

class Shift extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
	
		// Configure limits on our controller methods
		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		$this->methods['shift_get']['limit'] = 500; // 500 requests per hour per shift/key
		$this->methods['shift_post']['limit'] = 100; // 100 requests per hour per shift/key
		$this->methods['shift_delete']['limit'] = 50; // 50 requests per hour per shift/key
		
		// Load the Shift Model
		$this->load->model(array('shift_model'));
	}

	public function shifts_get()
	{
		// Shifts from Database
		
		$shifts = $this->shift_model->shifts_get();
		if ($shifts == false) {
			echo '{"error":"nodata"}';
		}
		else {
			$id = $this->get('id');
			
			// If the id parameter doesn't exist return all the users
			
			if ($id === NULL)
			{
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($shifts)
				{
					// Set the response and exit
					$this->response($shifts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
							'status' => FALSE,
							'message' => 'No shifts were found'
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
			
			$shift = NULL;
			
			if (!empty($shifts))
			{
				foreach ($shifts as $key => $value)
				{
					if (isset($value['id']) && $value['id'] === $id)
					{
						$shift = $value;
					}
				}
			}
			
			if (!empty($shift))
			{
				$this->set_response($shift, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
						'status' => FALSE,
						'message' => 'Shifts could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}			
		}
	}
	
	public function shifts_post() {
		
	}
	
	public function shifts_put() {
		
	}
	
	public function shifts_delete($id) {
		$this->response(['returned from delete:' => $id,]);
	}
}

/* End of file shift.php */
/* Location: ./application/controllers/shift.php */