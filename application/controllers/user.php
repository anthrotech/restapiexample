<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model'));
	}
	
	public function index() {
		redirect('/','location');
	}
	
	public function login()
	{
		$data['title'] = "Codeigniter REST API Code Sample";
		
		$email= $this->input->post("email");
		$pass = $this->input->post("password");		
		
		/* Rules */
		$login_config = array(
       	 	array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                        'required' => 'You must provide a valid %s.',
            	),
       	 	),
       		array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
             	),
       		)
        );

		$this->form_validation->set_rules($login_config);
		
		if ($this->form_validation->run() == FALSE) {
				$data['message'] = 'All Fields are Required.';
				$this->load->view('welcome_message',$data);
		}
		else {
				/* Process Form */
				$check_login = $this->user_model->check_login($email,$pass);
				if ($check_login == false) {
					$data['message'] = "User Account not found. Please try again.";
					$this->load->view('welcome_message',$data);
				}
				else {
					redirect('/dashboard','location');
				}
		}	
	}
	
	public function logout()
	{
		$log_out = $this->user_model->logout();
		if ($log_out == true) {
			redirect('/','location');
		}
	}	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */