<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	}
	
	public function index()
	{
		if (!$this->session->has_userdata('user_id')) {
			redirect('/','location');
		}
		else {
			$data['title'] = "Codeigniter REST API Code Sample - <a href='/user/logout'>Logout</a>";
			$data['message'] = "You can access various features via the following links.";
			$this->load->view('dashboard',$data);			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */