<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('admin_model','admindb',TRUE);
	}

	public function index()
	{
		/*$data = $this->check->privilege("administrator");
		$data['overview'] = 'class="active"';
		$this->load->view('header_view');
		$this->load->view('admin/menu_view',$data);
		$this->load->view('admin/main_view');
		$this->load->view('footer_view',$data);*/
		redirect('admin/manage_users', 'refresh');
	}

	public function manage_users()
	{
		$data = $this->check->privilege("administrator");
		$data['manage_users'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_admin.js"></script>';
		$this->load->view('header_view');
		$this->load->view('admin/menu_view',$data);
		$this->load->view('admin/manage_view');
		$this->load->view('footer_view',$data);
	}

	public function add_user()
	{
		$data = $this->check->privilege("administrator");
		$data['add_users'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/add_user.js"></script>';
		$this->load->view('header_view');
		$this->load->view('admin/menu_view',$data);
		$this->load->view('admin/add_user_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_logs()
	{
		$data = $this->check->privilege("administrator");
		$data['manage_logs'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_logs.js"></script>';
		$this->load->view('header_view');
		$this->load->view('admin/menu_view',$data);
		$this->load->view('admin/logs_view');
		$this->load->view('footer_view',$data);
	}

	public function get_all_logs_data()
	{
		$this->admindb->get_log_data();
	}

	public function export_clear_log(){
		$this->load->dbutil();
		$this->load->helper('download');
		$query = $this->db->query("SELECT * FROM `logs`");
		$data = $this->dbutil->csv_from_result($query, ';');
		$this->admindb->log_query();

		force_download('result.csv', $data); 

		redirect('admin/log','refresh');
	}

	public function add_csv_users($int=0)
	{
		$data = $this->check->privilege("administrator");
		$data['import_users'] = 'class="active"';
		if ($int==1) 
		{
			//do nothing
		}
		else
		{
			$config['upload_path'] = './assets/uploads/csv/';
			$config['allowed_types'] = 'csv';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('csv-upload'))
			{
				$data['ierror']= $this->upload->display_errors();
			}
			else
			{
				$upload_data = $this->upload->data();
				$this->admindb->save_csv($upload_data['full_path']);
				$data['ierror']= "Upload Successful<br>";
			}
		}
		$this->load->view('header_view');
		$this->load->view('admin/menu_view',$data);
		$this->load->view('admin/csv_users_view',$data); 
		$this->load->view('footer_view',$data);
	}

	function csv_download()
	{
	    $this->load->helper('download');
		$data = file_get_contents("assets/users.csv");
	    $name = 'users.csv';

	    force_download($name, $data);
	}

	public function check_add_user()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('user_id', 'User ID', 'trim|required|numeric|callback__user_check');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('privilege', 'Privilege', 'trim|required|alpha');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->admindb->add_user();
			echo true;
		}
	}

	function _user_check($user_id)
	{
		$check = $this->admindb->check_user();
		if ($check == 1)
		{
			$this->form_validation->set_message('_user_check', "User Exists.");
			return FALSE;
		}
		return TRUE;
	}

	public function get_all_users_data()
	{
		$this->admindb->retrieve_all_data();
	}

	public function edit_user_id()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE || $this->form_validation->numeric($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->admindb->edit_user_id();
			echo $value;
		}
	}

	public function edit_last_name()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE || $this->form_validation->alpha($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->admindb->edit_last_name();
			echo $value;	
		}
	}

	public function edit_first_name()
	{
		$value = $this->input->post('value');

		if ($this->form_validation->required($value) == FALSE || $this->form_validation->alpha($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->admindb->edit_first_name();
			echo $value;	
		}
	}

	public function edit_privilege()
	{
		$value = $this->input->post('value');

		if ($this->form_validation->required($value) == FALSE || $this->form_validation->alpha($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->admindb->edit_privilege();
			echo $value;	
		}
	}

	public function edit_email()
	{
		$value = $this->input->post('value');

		if ($this->form_validation->required($value) == FALSE || $this->form_validation->valid_email($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->admindb->edit_email();
			echo $value;	
		}
	}

	public function edit_activation()
	{
		$value = $this->input->post('value');

		if ($this->form_validation->required($value) == FALSE || $this->form_validation->alpha($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->admindb->edit_activation();
			echo $value;	
		}
	}

	public function reset_password()
	{
		if($this->input->post('id') != NULL)
		{
			$this->admindb->reset_password();
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */