<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('comelec_model','comelecdb',TRUE);
	    $this->load->model('student_model','studentdb',TRUE);
	    $this->load->model('services_model','servicesdb',TRUE);
	}

	public function index()
	{
		$data = $this->check->privilege("student");
		$data['home'] = 'active';
		$data['news'] = $this->studentdb->get_news();
		$data['announce'] = $this->studentdb->get_announce();
		$data['event'] = $this->studentdb->get_event();
		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/home_sidebar_view',$data);
		$this->load->view('student/main_view');
		$this->load->view('student/footer_view',$data);
	}

	public function settings()
	{
		$data = $this->check->privilege("student");
		$data['settings'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/settings.js"></script>';
		
		$session_data = $this->session->userdata('logged_in');
		$data['user_id'] = $session_data['user_id'];
		$data['first_name'] =  $session_data['first_name'];
		$data['last_name'] = $session_data['last_name'];
		$data['email_address'] = $session_data['email_address'];
		
		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/home_sidebar_view',$data);
		$this->load->view('student/settings_view',$data);
		$this->load->view('student/footer_view',$data);
	}

	public function change_password()
	{
		$data = $this->check->privilege("student");
		$data['settings'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/settings.js"></script>';
		$session_data = $this->session->userdata('logged_in');

		$data['id'] = $session_data['id'];
		$data['username']= $session_data['first_name']." ".$session_data['last_name'];

		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/home_sidebar_view',$data);
		$this->load->view('student/settings_password_view',$data);
		$this->load->view('student/footer_view',$data);
	}

	public function change_email_address()
	{
		$data = $this->check->privilege("student");
		$data['settings'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/settings.js"></script>';
		$session_data = $this->session->userdata('logged_in');

		$data['id'] = $session_data['id'];

		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/home_sidebar_view',$data);
		$this->load->view('student/settings_email_view',$data);
		$this->load->view('student/footer_view',$data);
	}

	public function sc_voting()
	{
		$data = $this->check->privilege("student");
		$data['sc_voting'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/tiny_mce/tiny_mce.js"></script>
			<script type="text/javascript" src="'.base_url().'public/js/custom/sc_voting.js"></script>';
		
		$this->comelecdb->check_expiry();

		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/home_sidebar_view',$data);

		$check_election_active=$this->studentdb->check_election_activated();
		if ($check_election_active==TRUE) //check if election is ongoing 
		{
			$check_filing_active=$this->studentdb->check_filing_activated();
			if ($check_filing_active==TRUE) //check if election is for filing 
			{
				$check_filing_me=$this->studentdb->check_filed_me();
				if ($check_filing_me==TRUE)//check if student has filed
				{
					$this->load->view('student/filing_not_view');
				}
				else//if student has not filed
				{
					$this->load->view('student/filing_view'); 
				}
			}
			else//if filing deactivated
			{
				$check_voting_active=$this->studentdb->check_voting_activated();
				if ($check_voting_active==TRUE)//check if election voting started
				{
					$check_voting_me=$this->studentdb->check_voted_me();
					if ($check_voting_me==TRUE)//check if student voted
					{
						$data=$this->studentdb->get_voting_results();
						$data['details']=$this->studentdb->get_voting_details();
						$this->load->view('student/election_results_view',$data);
					}
					else//if student did not vote
					{
						$this->load->helper(array('form'));
						$data=$this->studentdb->get_candidates();
						$this->load->view('student/voting_view',$data);
					}
				}
				else//if voting deactivated
				{
					$this->load->view('student/voting_not_view');
				}
			}
		}
		else//if no election activated
		{
			$this->load->view('student/election_not_view');
		}
		$this->load->view('student/footer_view',$data);
	}
	function vote_party()
	{
		$this->studentdb->vote_party();
		echo true;
	}
	function vote_individual()
	{
		$this->studentdb->vote_individual();
		echo true;
	}
	function check_submission_input()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('reason', 'Reason', 'trim|required');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');
		$this->form_validation->set_rules('party', 'Party', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->studentdb->submit_candidacy();
			echo true;
		}
	}

	public function feedback()
	{
		$data = $this->check->privilege("student");
		$data['feedback'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/feedback.js"></script>';
		
		$this->servicesdb->check_expiry();

		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/home_sidebar_view',$data);

		$check_feedback_active=$this->studentdb->check_feedback_activated();
		if ($check_feedback_active==TRUE) //check if feedback is ongoing 
		{
			$check_feedback_me=$this->studentdb->check_feedback_finished();
			if ($check_feedback_me==TRUE)
			{
				$this->load->view('student/feedback_finish_view');
			}
			else
			{
				$data['result1']=$this->servicesdb-> view_form('lecturer');
			    $data['result2']=$this->servicesdb-> view_form('classroom');
			    $data['result3']=$this->servicesdb-> view_form('courseconsult');
			    $data['result4']=$this->servicesdb-> view_form('others');
				$this->load->view('student/feedback_view',$data);
			}	
		}
		else//if no feedback activated
		{
			$this->load->view('student/feedback_not_view');
		}
		$this->load->view('student/footer_view',$data);
	}

	function feedback_submit(){
		$this->studentdb->submit_feedback('lecturer');
		$this->studentdb->submit_feedback('classroom');
		$this->studentdb->submit_feedback('courseconsult');
		$this->studentdb->submit_feedback('others');
		$this->studentdb->record_submission();
		redirect('student/feedback', 'refresh');
	}

	public function my_account()
	{
		$data = $this->check->privilege("student");
		$data['my_account'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/jqueryprint.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/custom/account.js"></script>';
		$data['result']=$this->studentdb->view_grades();
		if ($data['result']==NULL) 
		{
			$data['none']="no-grade";
		}
		else
		{
			$data['none']=NULL;
		}
		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/account_sidebar_view',$data);
		$this->load->view('student/grade_view',$data);
		$this->load->view('student/footer_view',$data);
	}

	public function my_account_schedule()
	{
		$data = $this->check->privilege("student");
		$data['my_account'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/jqueryprint.js">
		<script type="text/javascript" src="'.base_url().'public/js/custom/account.js"></script>';
		$data['result']=$this->studentdb->view_schedule();
		if ($data['result']==NULL) 
		{
			$data['none']="no-sched";
		}
		else
		{
			$data['none']=NULL;
		}
		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/account_sidebar_view',$data);
		$this->load->view('student/schedule_view',$data);
		$this->load->view('student/footer_view',$data);
	}

	public function my_account_curriculum()
	{
		$data = $this->check->privilege("student");
		$data['my_account'] = 'active';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/account.js"></script>';
		$names=$this->studentdb->course_name_sy();
		foreach ($names as $row) 
		{
			$data['course']=$row['name'];
			$data['sy']=$row['sy'];
			$data['years']=$row['years'];
		}
		$data['result']=$this->studentdb->data_all_course_sy();
		$data['grades']=$this->studentdb->grade_details();
		$this->load->view('student/header_view');
		$this->load->view('student/nav_view',$data);
		$this->load->view('student/account_sidebar_view',$data);
		$this->load->view('student/curriculum_view',$data);
		$this->load->view('student/footer_view',$data);
	}
}

/* End of file Comelec.php */
/* Location: ./application/controllers/Comelec.php */