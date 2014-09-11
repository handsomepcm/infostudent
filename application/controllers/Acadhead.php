<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acadhead extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    // Your own constructor code. Loaded before page is loaded.
	    $this->load->model('acadhead_model','acadheaddb',TRUE);
	    $this->load->model('services_model','servicesdb',TRUE);
	}

	public function index()
	{
		/*$data = $this->check->privilege("acadhead");
		$data['overview'] = 'class="active"';
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/main_view');
		$this->load->view('footer_view',$data);*/
		redirect('acadhead/manage_news', 'refresh');
	}

	public function manage_news()
	{
		$data = $this->check->privilege("acadhead");
		$data['manage_news'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_news.js"></script>';
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/manage_news_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_curriculum()
	{
		$data = $this->check->privilege("acadhead");
		$data['manage_curriculum'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_curriculum.js"></script>';
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/manage_curriculum_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_course_curriculum($id)
	{
		$data = $this->check->privilege("acadhead");
		$data['manage_curriculum'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_curriculum.js"></script>';
		
		$names=$this->acadheaddb->curriculum_name($id);
	    foreach ($names as $row) 
	    {
			$data['course']=$row['name'];
			$data['sy']=$row['sy'];
			$data['years']=$row['years'];
	    }
		$data['result'] = $this->acadheaddb->data_all_course($id);
		$data['all_subjects']=$this->acadheaddb->data_all_subjects();
		$data['id'] = $id;

		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/manage_course_curriculum_view');
		$this->load->view('footer_view',$data);
	}

	public function manage_course()
	{
		$data = $this->check->privilege("acadhead");
		$data['manage_course'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_course.js"></script>';
		
		$data['subject']=$this->acadheaddb->get_all_subjects();
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/manage_course_view');
		$this->load->view('footer_view',$data);
	}

	public function csv_curriculum($id=0,$upload=0)
	{
		$data = $this->check->privilege("acadhead");
		$data['manage_curriculum'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/manage_curriculum.js"></script>';
		$data['id']=$id;
		if ($upload==1) 
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
				$this->acadheaddb->save_csv($upload_data['full_path'],$id);
				$data['ierror']= "Upload Successful<br>";
			}
		}
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/csv_curriculum_view',$data);
		$this->load->view('footer_view',$data);
	}

	function csv_download()
	{
	    $this->load->helper('download');
		$data = file_get_contents("assets/uploads/csv/curriculum.csv");
	    $name = 'curriculum.csv';

	    force_download($name, $data);
	}

	public function feedback_ratings()
	{
		$data = $this->check->privilege("acadhead");
		$data['result']=$this->servicesdb-> get_feedback_ratings();
		$data['feedback_ratings'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
	    $this->load->view('services/feedback_ratings_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function feedback_text()
	{
		$data = $this->check->privilege("acadhead");
		$data['result']=$this->servicesdb-> get_feedback_text();
		$data['feedback_text'] = 'class="active"';

		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
	    $this->load->view('services/feedback_text_view',$data);
		$this->load->view('footer_view',$data);
		
	}

	public function get_all_news_data()
	{
		$this->acadheaddb->get_all_news();
	}

	public function get_all_curriculum_data()
	{
		$this->acadheaddb->get_all_curriculum();
	}

	public function get_all_course_data()
	{
		$this->acadheaddb->get_all_course();
	}


	public function input_news($id=0)
	{
		$data = $this->check->privilege("acadhead");
		if((int)$id > 0)
		{
			$data['manage_news'] = 'class="active"';
			$data['page_title'] = 'Edit';
			$query = $this->acadheaddb->get_news_content($id);
			$data['news_id']=$query['news_id'];
			$data['content']=$query['content'];
			$data['title']=$query['title'];
			$data['orig_image']=$query['image'];
			$data['type']=$query['type'];
		}
		else
		{
			$data['add_news'] = 'class="active"';
			$data['page_title'] = 'Add';
			$data['orig_image']="0.jpg";
		}
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="'.base_url().'public/js/custom/add_news.js"></script>';
		
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/add_news_view',$data); 
		$this->load->view('footer_view',$data);
	}

	public function check_news_input()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|callback__check_title');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			if(!empty($_FILES['image']['name']))
			{
				$config['upload_path'] = './assets/uploads/images';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '1000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				//$config['file_name']  = $this->input->post('news_id');

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					//$data = $this->upload->data();
					$upload_data    = $this->upload->data();
					$_POST['image'] = $upload_data['file_name'];
					if($this->input->post('news_id'))
					{
						$this->acadheaddb->entry_update_news();   
					}
					else
					{
						$this->acadheaddb->entry_insert_news();
					}
					echo true;

				}
			}
			else
			{
				if ($this->input->post('orig_image')==NULL)
				{
					$_POST['image'] ="0.jpg";
				}
				else
				{
					$_POST['image'] =$this->input->post('orig_image');
				}

				if($this->input->post('news_id')>0)
				{
					$this->acadheaddb->entry_update_news();   
				}
				else
				{
					$this->acadheaddb->entry_insert_news();
				}
				echo true;
			}

		}
	}
	
	function _check_title()
	{
		$result = $this->acadheaddb->get_news_title();
		if ($result != NULL) 
		{
			$this->form_validation->set_message('_check_title', 'News Title Exists');
			if($this->input->post('news_id')>0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return true;
	}

	public function edit_curriculum_name()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_curriculum_name();
			echo $value;
		}
	}

	public function edit_curriculum_description()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_curriculum_description();
			echo $value;
		}
	}

	public function edit_curriculum_years()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE || $this->form_validation->numeric($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_curriculum_years();
			echo $value;
		}
	}

	public function edit_curriculum_sy()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_curriculum_sy();
			echo $value;
		}
	}

	public function add_curriculum()
	{
		$data = $this->check->privilege("acadhead");
		$data['add_curriculum'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/add_curriculum.js"></script>';
		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/add_curriculum_view');
		$this->load->view('footer_view',$data);
	}

	public function check_add_curriculum()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('curi_name', 'Curriculum Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('years', 'Years', 'trim|required');
		$this->form_validation->set_rules('school_year', 'School Year', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->acadheaddb->add_curriculum();
			echo true;
		}
	}

	public function edit_course_name()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_course_name();
			echo $value;
		}
	}

	public function edit_course_prereq()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_course_prereq();
			echo $value;
		}
	}

	public function edit_course_coreq()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_course_coreq();
			echo $value;
		}
	}

	public function edit_course_unit_lec()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_course_unit_lec();
			echo $value;
		}
	}

	public function edit_course_unit_lab()
	{
		$value = $this->input->post('value');
		
		if ($this->form_validation->required($value) == FALSE)
		{
			echo false;
		}
		else
		{
			$this ->acadheaddb->edit_course_unit_lab();
			echo $value;
		}
	}

	public function add_course()
	{
		$data = $this->check->privilege("acadhead");
		$data['add_course'] = 'class="active"';
		$data['customjs'] = '<script type="text/javascript" src="'.base_url().'public/js/custom/add_course.js"></script>';
		
		$data['subject_list'] = $this->acadheaddb->get_all_subject_list();


		$this->load->view('header_view');
		$this->load->view('acadhead/menu_view',$data);
		$this->load->view('acadhead/add_course_view',$data);
		$this->load->view('footer_view',$data);
	}

	public function check_add_course()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('add_subject_id', 'Subject ID', 'trim|required');
		$this->form_validation->set_rules('add_term', 'Term', 'trim|required');
		$this->form_validation->set_rules('add_year', 'Year', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->acadheaddb->add_to_course();
			echo true;
		}
	}

	public function check_delete_course()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('del_subject_id', 'Subject ID', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this ->acadheaddb->delete_from_course();
			echo true;
		}
	}
}

/* End of file Acadhead.php */
/* Location: ./application/controllers/Acadhead.php */