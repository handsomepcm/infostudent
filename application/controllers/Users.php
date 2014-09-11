<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('user_model','userdb',TRUE);
	}

	public function index()
	{
		$data = $this->check->privilege("login");
		$data['customcss'] = '<link type="text/css" href="'.base_url().'public/css/signin.css" rel="stylesheet">';
		$data['page_header'] = 'index';
		$this->load->view('header_view',$data);
		$this->load->view('login_view');
		$this->load->view('footer_view');
	}

	//validation of login
	public function check()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback__user_check');

		if ($this->form_validation->run() == FALSE)
		{
			$data['customcss'] = '<link type="text/css" href="'.base_url().'public/css/signin.css" rel="stylesheet">';
			$data['page_header'] = 'index';
			$this->load->view('header_view',$data);
			$this->load->view('login_view');
			$this->load->view('footer_view');
		}
		else
		{
			$record = $this ->userdb->details($this->input->post('username'));
			$sess_array = array();
			foreach($record as $row)
			{
				$sess_array = array(
					'id' => $row->id,
					'user_id' => $row->user_id,
					'last_name' => $row->last_name,
           			'first_name' => $row->first_name,
           			'privilege' => $row->privilege,
					'email_address' => $row->email_address
				);
				$this->session->set_userdata('logged_in', $sess_array);
				$privilege = $row->privilege;
			}
			
			$data = $this->check->privilege("login");
		}
	}

	//validation to database
	function _user_check($password)
	{
		$check = $this->userdb->check_user();
		if ($check != 1)
		{
			$this->form_validation->set_message('_user_check', $check);
			return FALSE;
		}
		return TRUE;
	}

	public function settings()
	{
		$this->load->view('header_view');
		$session_data = $this->session->userdata('logged_in');

		$data['user_id'] = $session_data['user_id'];
		$data['first_name'] =  $session_data['first_name'];
		$data['last_name'] = $session_data['last_name'];
		$data['email_address'] = $session_data['email_address'];
		$data['privilege'] = $session_data['privilege'];
		$data['username']= $session_data['first_name']." ".$session_data['last_name'];

		if ($session_data['privilege']=="administrator")
		{
			$this->load->view('admin/menu_view',$data);
		}
		else if ($session_data['privilege']=="acadhead")
		{
			$this->load->view('acadhead/menu_view',$data);
		}
		else if ($session_data['privilege']=="comelec")
		{
			$this->load->view('comelec/menu_view',$data);
		}
		else if ($session_data['privilege']=="registrar")
		{
			$this->load->view('registrar/menu_view',$data);
		}
		else if ($session_data['privilege']=="services")
		{
			$this->load->view('services/menu_view',$data);
		}
		else if ($session_data['privilege']=="schooladmin")
		{
			$this->load->view('schooladmin/menu_view',$data);
		}
		else
		{
			//trap
		}
		$this->load->view('user/settings_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function change_password()
	{
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/settings.js"></script>';
		$this->load->view('header_view');
		$session_data = $this->session->userdata('logged_in');

		$data['id'] = $session_data['id'];
		$data['username']= $session_data['first_name']." ".$session_data['last_name'];

		if ($session_data['privilege']=="administrator")
		{
			$this->load->view('admin/menu_view',$data);
		}
		else if ($session_data['privilege']=="acadhead")
		{
			$this->load->view('acadhead/menu_view',$data);
		}
		else if ($session_data['privilege']=="comelec")
		{
			$this->load->view('comelec/menu_view',$data);
		}
		else if ($session_data['privilege']=="registrar")
		{
			$this->load->view('registrar/menu_view',$data);
		}
		else if ($session_data['privilege']=="services")
		{
			$this->load->view('services/menu_view',$data);
		}
		else if ($session_data['privilege']=="schooladmin")
		{
			$this->load->view('schooladmin/menu_view',$data);
		}
		else
		{
			//trap
		}
		$this->load->view('user/settings_password_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function check_password()
	{
		$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback__verify_password');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|matches[confirm_new_password]|min_length[7]|max_length[20]');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->userdb->password_update();
			echo true;
		}

	}

	function _verify_password()
	{
		$result = $this->userdb->password_compare($this->input->post('old_password'),$this->input->post('id'));
		if ($result == false) 
		{
			$this->form_validation->set_message('_verify_password', 'Old Password match');
			return false;
		}
		else
		{
			return true;
		}
	}

	public function change_email_address()
	{
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/settings.js"></script>';
		$this->load->view('header_view');
		$session_data = $this->session->userdata('logged_in');

		$data['id'] = $session_data['id'];
		$data['username']= $session_data['first_name']." ".$session_data['last_name'];

		if ($session_data['privilege']=="administrator")
		{
			$this->load->view('admin/menu_view',$data);
		}
		else if ($session_data['privilege']=="acadhead")
		{
			$this->load->view('acadhead/menu_view',$data);
		}
		else if ($session_data['privilege']=="comelec")
		{
			$this->load->view('comelec/menu_view',$data);
		}
		else if ($session_data['privilege']=="registrar")
		{
			$this->load->view('registrar/menu_view',$data);
		}
		else if ($session_data['privilege']=="services")
		{
			$this->load->view('services/menu_view',$data);
		}
		else if ($session_data['privilege']=="schooladmin")
		{
			$this->load->view('schooladmin/menu_view',$data);
		}
		else
		{
			//trap
		}
		$this->load->view('user/settings_email_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function check_email_address()
	{
		$this->form_validation->set_rules('new_email_address', 'New Email Address', 'trim|required|valid_email|matches[confirm_email_address]');
		$this->form_validation->set_rules('confirm_email_address', 'Confirm Email Address', 'trim|required|valid_email');
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->userdb->email_update();
			echo true;
		}
	}

	public function forgot_password()
	{
		$data = $this->check->privilege("login");
		$data['customcss'] = '<link type="text/css" href="'.base_url().'public/css/signin.css" rel="stylesheet">';
		$data['page_header'] = 'index';
		$this->load->view('header_view',$data);
		$this->load->view('forgot_password_view');
		$this->load->view('footer_view');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('', 'refresh');
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */