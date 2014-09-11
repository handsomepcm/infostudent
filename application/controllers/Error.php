<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	}

	public function page_not_found()
	{
		//$this->output->set_status_header('404');
		$this->load->view('page_not_found_view');
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */