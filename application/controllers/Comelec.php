<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comelec extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('comelec_model','comelecdb',TRUE);
	    $this->_check_expiry();
	}
	function _check_expiry()
	{
		$this->comelecdb->check_expiry();
	}

	public function index()
	{
		/*$data = $this->check->privilege("comelec");
		$data['overview'] = 'class="active"';
		$this->load->view('header_view');
		$this->load->view('comelec/menu_view',$data);
		$this->load->view('comelec/main_view');
		$this->load->view('footer_view',$data);*/
		redirect('comelec/manage_election', 'refresh');
	}

	public function manage_election()
	{
		$data = $this->check->privilege("comelec");
		$data['manage_election'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_election.js"></script>';
		$this->load->view('header_view');
		$this->load->view('comelec/menu_view',$data);
		$this->load->view('comelec/manage_election_view');
		$this->load->view('footer_view',$data);
	}

	public function add_election()
	{
		$data = $this->check->privilege("comelec");
		$data['add_election'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_election.js"></script>';
		$this->load->view('header_view');
		$this->load->view('comelec/menu_view',$data);
		$this->load->view('comelec/add_election_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_candidates()
	{
		$data = $this->check->privilege("comelec");
		$data['manage_candidates'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_candidates.js"></script>';
		$query = $this->comelecdb->get_election_data();
		if ($query != NULL) 
		{	
	        $data['voting_status']=$query['filing_status'];
	        if ($query['voting_status']=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
		}

		$this->load->view('header_view');
		$this->load->view('comelec/menu_view',$data);
		$this->load->view('comelec/manage_candidates_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function filing_control()
	{
		$data = $this->check->privilege("comelec");
		$data['filing_control'] = 'class="active"';
		
		$data['customcss'] = '<link href="'.base_url().'public/css/mobiscroll.android-2.2.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'public/css/mobiscroll.datetime-2.2.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'public/css/mobiscroll.core-2.2.css" rel="stylesheet" type="text/css">';
		
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.android-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.core-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.datetime-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/custom/control_panel.js"></script>';
		
		$this->load->view('header_view',$data);
		$this->load->view('comelec/menu_view',$data);

		$query = $this->comelecdb->get_election_data();
		if ($query == NULL) 
		{	
			$this->load->view('comelec/no_election_view');
		}
		else
		{
			$data['filing_start']=$query['filing_start'];
	        $data['filing_end']=$query['filing_end'];
	        $data['filing_status']=$query['filing_status'];
	        if ($query['voting_status']=="activated"&&$query['election_status']=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
			$this->load->view('comelec/filing_control_view',$data);
		}
		$this->load->view('footer_view',$data);
	}

	public function voting_control()
	{
		$data = $this->check->privilege("comelec");
		$data['voting_control'] = 'class="active"';
		
		$data['customcss'] = '<link href="'.base_url().'public/css/mobiscroll.android-2.2.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'public/css/mobiscroll.datetime-2.2.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'public/css/mobiscroll.core-2.2.css" rel="stylesheet" type="text/css">';
		
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.android-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.core-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.datetime-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/custom/control_panel.js"></script>';
		
		$this->load->view('header_view',$data);
		$this->load->view('comelec/menu_view',$data);

		$query = $this->comelecdb->get_election_data();
		if ($query == NULL) 
		{	
			$this->load->view('comelec/no_election_view');
		}
		else
		{
			$data['voting_start']=$query['voting_start'];
	        $data['voting_end']=$query['voting_end'];
	        $data['voting_status']=$query['voting_status'];
	        if ($query['filing_status']=="activated"&&$query['election_status']=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
			$this->load->view('comelec/voting_control_view',$data);
		}
		$this->load->view('footer_view',$data);
	}

	public function election_results()
	{
		$data = $this->check->privilege("comelec");
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/election_results.js"></script>';
		$data['election_results'] = 'class="active"';
		$data['election']=$this->comelecdb->get_all_election();
		$this->load->view('header_view');
		$this->load->view('comelec/menu_view',$data);
		$this->load->view('comelec/election_results_view');
		$this->load->view('footer_view',$data);
	}

	public function get_all_election_data()
	{
		$this->comelecdb->data_all_election();
	}

	public function get_all_candidates_data()
	{
		$this->comelecdb->data_all_candidates();
	}

	public function edit_election_name()
	{
		$value = $this->input->post('value');
		$check = $this->comelecdb->check('election','election_name',$value);
		if ($this->form_validation->required($value) == FALSE || $check == 1)
		{
			echo false;
		}
		else
		{
			$this ->comelecdb->edit_election_name();
			echo $value;
		}
	}

	public function check_add_election()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('election_name', 'Election Name', 'trim|required|callback__election_name_check');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->comelecdb->add_election();
			echo true;
		}
	}

	function _election_name_check($election_name)
	{
		$check = $this->comelecdb->check('election','election_name',$election_name);
		if ($check == 1)
		{
			$this->form_validation->set_message('_election_name_check', "Election Name Exists.");
			return FALSE;
		}
		return TRUE;
	}

	public function check_filing()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('filing_start', 'Filing Start', 'trim|required');
		$this->form_validation->set_rules('filing_end', 'Filing End', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->comelecdb->filing_time();
			echo true;
		}
	}

	function force_end_filing()
	{
		$this->comelecdb->filing_end();
		echo true;
	}

	public function check_voting()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('voting_start', 'Voting Start', 'trim|required');
		$this->form_validation->set_rules('voting_end', 'Voting End', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->comelecdb->voting_time();
			echo true;
		}
	}

	function force_end_voting()
	{
		$this->comelecdb->voting_end();
		echo true;
	}

	function get_election_results()
	{
		$id = $this->input->post('election_id');
		$data=$this->comelecdb->get_voting_results($id);
      	$data['details']=$this->comelecdb->get_voting_details($id);
		$this->load->view('comelec/each_election_result_view',$data);
	}

	function get_election_voters_list()
	{
		$data['result']=$this->comelecdb-> get_students_list();
		$data['id'] = $this->input->post('election_id');
		$this->load->view('comelec/each_election_voters_list_view',$data);
	}

	function approve()
	{
		$id = $this->input->post("id");
		if((int)$id > 0)
		{
			$this->comelecdb->status_approve($id);
		}
	}
	function disapprove()
	{
		$id = $this->input->post("id");
		if((int)$id > 0)
		{
			$this->comelecdb->status_disapprove($id);
		}
	}
}

/* End of file Comelec.php */
/* Location: ./application/controllers/Comelec.php */