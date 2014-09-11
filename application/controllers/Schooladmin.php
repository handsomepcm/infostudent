<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schooladmin extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('services_model','servicesdb',TRUE);
	}

	public function index()
	{
		/*$data = $this->check->privilege("schooladmin");
		$data['overview'] = 'class="active"';
		$this->load->view('header_view');
		$this->load->view('schooladmin/menu_view',$data);
		$this->load->view('schooladmin/main_view');
		$this->load->view('footer_view',$data);*/
		redirect('schooladmin/feedback_ratings', 'refresh');
	}

	public function feedback_ratings()
	{
		$data = $this->check->privilege("schooladmin");
		$data['result']=$this->servicesdb-> get_feedback_ratings();
		$data['feedback_ratings'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('schooladmin/menu_view',$data);
	    $this->load->view('services/feedback_ratings_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function feedback_text()
	{
		$data = $this->check->privilege("schooladmin");
		$data['result']=$this->servicesdb-> get_feedback_text();
		$data['feedback_text'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('schooladmin/menu_view',$data);
	    $this->load->view('services/feedback_text_view',$data);
		$this->load->view('footer_view',$data);
		
	}
	
}

/* End of file Schooladmin.php */
/* Location: ./application/controllers/Schooladmin.php */