<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('registrar_model','registrardb',TRUE);
	}

	public function index()
	{
		/*$data = $this->check->privilege("registrar");
		$data['overview'] = 'class="active"';
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/main_view');
		$this->load->view('footer_view',$data);*/
		redirect('registrar/manage_enrollment', 'refresh');
	}

	public function manage_enrollment()
	{
		$data = $this->check->privilege("registrar");
		$data['manage_enrollment'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_enrollment.js"></script>';
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/manage_enrollment_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_student()
	{
		$data = $this->check->privilege("registrar");
		$data['manage_student'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_enrollment.js"></script>';
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/manage_student_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_grades()
	{
		$data = $this->check->privilege("registrar");
		$data['manage_grades'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_enrollment.js"></script>';
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/manage_grades_view');
		$this->load->view('footer_view',$data);
	}

	public function get_all_enrollment_data()
	{
		$this->registrardb->get_enrollment_data();
	}

	public function get_all_student_data()
	{
		$this->registrardb->data_all_student();
	}

	public function get_all_grade_data()
	{
		$this->registrardb->data_all_grade();
	}
	
	public function csv_enrollment($int=0)
	{
		$data = $this->check->privilege("registrar");
		$data['csv_enrollment'] = 'class="active"';
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
				$this->registrardb->enroll_save_csv($upload_data['full_path']);
				$data['ierror']= "Upload Successful<br>";
			}
		}
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/csv_enrollment_view',$data); 
		$this->load->view('footer_view',$data);
	}

	function csv_enrollment_download()
	{
	    $this->load->helper('download');
		$data = file_get_contents("assets/uploads/csv/enroll.csv");
	    $name = 'enroll.csv';

	    force_download($name, $data);
	}

	public function csv_grades($int=0)
	{
		$data = $this->check->privilege("registrar");
		$data['csv_grades'] = 'class="active"';
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
				$this->registrardb->grades_save_csv($upload_data['full_path']);
				$data['ierror']= "Upload Successful<br>";
			}
		}
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/csv_grades_view',$data); 
		$this->load->view('footer_view',$data);
	}

	function csv_grades_download()
	{
	    $this->load->helper('download');
		$data = file_get_contents("assets/uploads/csv/grades.csv");
	    $name = 'grades.csv';

	    force_download($name, $data);
	}

	public function csv_student($int=0)
	{
		$data = $this->check->privilege("registrar");
		$data['csv_student'] = 'class="active"';
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
				$this->registrardb->student_save_csv($upload_data['full_path']);
				$data['ierror']= "Upload Successful<br>";
			}
		}
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/csv_student_view',$data); 
		$this->load->view('footer_view',$data);
	}

	function csv_student_download()
	{
	    $this->load->helper('download');
		$data = file_get_contents("assets/uploads/csv/student.csv");
	    $name = 'student.csv';

	    force_download($name, $data);
	}

	public function csv_credited($int=0)
	{
		$data = $this->check->privilege("registrar");
		$data['csv_credited'] = 'class="active"';
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
				$this->registrardb->credited_save_csv($upload_data['full_path']);
				$data['ierror']= "Upload Successful<br>";
			}
		}
		$this->load->view('header_view');
		$this->load->view('registrar/menu_view',$data);
		$this->load->view('registrar/csv_credited_view',$data); 
		$this->load->view('footer_view',$data);
	}

	function csv_credited_download()
	{
	    $this->load->helper('download');
		$data = file_get_contents("assets/uploads/csv/credited.csv");
	    $name = 'credited.csv';

	    force_download($name, $data);
	}

	function delete_data()
	{
		$this->registrardb->delete_data();
	}
}

/* End of file Registrar.php */
/* Location: ./application/controllers/Registrar.php */