<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('services_model','servicesdb',TRUE);
	    $this->_check_expiry();
	}

	function _check_expiry()
	{
		$this->servicesdb->check_expiry();
	}

	public function index()
	{
		/*$data = $this->check->privilege("services");
		$data['overview'] = 'class="active"';
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/main_view');
		$this->load->view('footer_view',$data);*/
		redirect('services/manage_instrument', 'refresh');
	}

	public function manage_instrument()
	{
		$data = $this->check->privilege("services");
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_instrument.js"></script>';
		$data['manage_instrument'] = 'class="active"';
		$query = $this->servicesdb->get_feedback_data();
		if ($query != NULL) 
		{	
	        $feedback_status=$query['feedback_status'];
	        if ($feedback_status=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
		}
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/manage_instrument_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function manage_instrument_classroom()
	{
		$data = $this->check->privilege("services");
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_instrument.js"></script>';
		$data['manage_instrument_classroom'] = 'class="active"';
		$query = $this->servicesdb->get_feedback_data();
		if ($query != NULL) 
		{	
	        $feedback_status=$query['feedback_status'];
	        if ($feedback_status=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
		}
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/manage_instrument_classroom_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function manage_instrument_lecturer()
	{
		$data = $this->check->privilege("services");
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_instrument.js"></script>';
		$data['manage_instrument_lecturer'] = 'class="active"';
		$query = $this->servicesdb->get_feedback_data();
		if ($query != NULL) 
		{	
	        $feedback_status=$query['feedback_status'];
	        if ($feedback_status=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
		}
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/manage_instrument_lecturer_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function manage_instrument_course()
	{
		$data = $this->check->privilege("services");
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_instrument.js"></script>';
		$data['manage_instrument_course'] = 'class="active"';
		$query = $this->servicesdb->get_feedback_data();
		if ($query != NULL) 
		{	
	        $feedback_status=$query['feedback_status'];
	        if ($feedback_status=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
		}
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/manage_instrument_course_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function manage_instrument_others()
	{
		$data = $this->check->privilege("services");
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_instrument.js"></script>';
		$data['manage_instrument_others'] = 'class="active"';
		$query = $this->servicesdb->get_feedback_data();
		if ($query != NULL) 
		{	
	        $feedback_status=$query['feedback_status'];
	        if ($feedback_status=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['fieldset']="";
	        }
		}
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/manage_instrument_others_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function feedback_preview()
	{
		$data = $this->check->privilege("services");
		$data['feedback_preview'] = 'class="active"';
		$data['result1']=$this->servicesdb-> view_form('lecturer');
	    $data['result2']=$this->servicesdb-> view_form('classroom');
	    $data['result3']=$this->servicesdb-> view_form('courseconsult');
	    $data['result4']=$this->servicesdb-> view_form('others');

		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
	    $this->load->view('services/feedback_preview_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function feedback_activation()
	{
		$data = $this->check->privilege("services");
		$data['feedback_activation'] = 'class="active"';
		
		$data['customcss'] = '<link href="'.base_url().'public/css/mobiscroll.android-2.2.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'public/css/mobiscroll.datetime-2.2.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'public/css/mobiscroll.core-2.2.css" rel="stylesheet" type="text/css">';
		
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.android-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.core-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/mobiscroll.datetime-2.2.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/custom/feedback_panel.js"></script>';
		
		$this->load->view('header_view',$data);
		$this->load->view('services/menu_view',$data);

		$query = $this->servicesdb->get_feedback_data();

		$data['feedback_start']=$query['feedback_start'];
        $data['feedback_end']=$query['feedback_end'];
        $data['feedback_status']=$query['feedback_status'];
		$this->load->view('services/feedback_control_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function get_all_instrument_data()
	{
		$this->servicesdb->data_all_instrument();
	}

	public function get_instrument_lecturer_data()
	{
		$this->servicesdb->data_instrument('lecturer');
	}

	public function get_instrument_classroom_data()
	{
		$this->servicesdb->data_instrument('classroom');
	}

	public function get_instrument_course_data()
	{
		$this->servicesdb->data_instrument('courseconsult');
	}

	public function get_instrument_others_data()
	{
		$this->servicesdb->data_instrument('others');
	}

	public function check_feedback()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('feedback_start', 'Feedback Start', 'trim|required');
		$this->form_validation->set_rules('feedback_end', 'Feedback End', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->servicesdb->feedback();
			echo true;
		}
	}

	public function force_end_feedback()
	{
		$this->servicesdb->force_end_feedback();
		echo true;
	}

	public function remove_instrument()
	{
		$this->servicesdb->remove_instrument($this->input->post('id'));
		echo true;
	}
	
	public function input_instrument($id=NULL)
	{
		$data = $this->check->privilege("services");
		if($id > NULL)
		{
			$data['manage_instrument'] = 'class="active"';
			$data['page_title'] = 'Edit';
			$query = $this->servicesdb->get_instrument_content($id);
			$data['index_name']=$query['index_name'];
			$data['personnel']=$query['personnel'];
			$data['question']=$query['question'];
			$data['type']=$query['type'];
		}
		else
		{
			$data['input_instrument'] = 'class="active"';
			$data['page_title'] = 'Add';
		}
		
		$query = $this->servicesdb->get_feedback_data();
		if ($query != NULL) 
		{	
	        $feedback_status=$query['feedback_status'];
	        if ($feedback_status=="activated") 
	        {
	        	$data['fieldset']="disabled";
	        }
	        else
	        {
	        	$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/custom/add_instrument.js"></script>';
	        	$data['fieldset']="";
	        }
		}
		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
		$this->load->view('services/add_instrument_view',$data); 
		$this->load->view('footer_view',$data);
	}

	public function check_instrument_input()
	{
		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('personnel', 'Personnel', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			if($this->input->post('index_name')>NULL)
			{
				$this->servicesdb->entry_update_instrument();   
			}
			else
			{
				$this->servicesdb->entry_insert_instrument();
			}
				echo true;
		}
	}

	public function feedback_ratings()
	{
		$data = $this->check->privilege("services");
		$data['result']=$this->servicesdb-> get_feedback_ratings();
		$data['feedback_ratings'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
	    $this->load->view('services/feedback_ratings_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function feedback_text()
	{
		$data = $this->check->privilege("services");
		$data['result']=$this->servicesdb-> get_feedback_text();
		$data['feedback_text'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
	    $this->load->view('services/feedback_text_view',$data);
		$this->load->view('footer_view',$data);
		
	}

	public function feedback_student_list()
	{
		$data = $this->check->privilege("services");
		$data['result']=$this->servicesdb-> get_feedback_students_list();
		$data['feedback_student_list'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('services/menu_view',$data);
	    $this->load->view('services/feedback_student_list_view',$data);
		$this->load->view('footer_view',$data);	
	}  
}

/* End of file Services.php */
/* Location: ./application/controllers/Services.php */