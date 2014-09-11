<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    function check_expiry()
    {
    	$query = $this->db->get_where('feedback',array('feedback_status'=>'activated'));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $value) 
			{
				$fstart=$value->feedback_end;
				$fend=$value->feedback_end;
			}
			$cur_time = date("m/d/Y H:i");
		    $now = strtotime($cur_time);
		    $fstart = strtotime($fstart);
		    $fend = strtotime($fend);
				
			if ($fstart<$now && $fend>$now) {
				$data = array(
					'feedback_status' => 'activated',  
					);
				$this->db->update('feedback',$data);
			}
			else if ($fend<=$now) {
				$data = array(
					'feedback_status' => 'deactivated',  
					);
				$this->db->update('feedback',$data);
			}
			else
			{
				//no action
			}
		}
    }

    function get_feedback_data()
    {
        $query = $this->db->get_where('feedback');
        return $query->row_array();
    }

    function get_instrument_content($id)
    {
        $query = $this->db->get_where("feedback_output",array("index_name"=>$id));
        return $query->row_array();
    }

    function data_all_instrument()
    {
		$this->datatables
		    ->select('index_name,personnel,question,type')
		    ->from('feedback_output')
		    ->add_column('input', '<a href="input_instrument/$1" class="btn btn-info">Edit</a>', 'index_name')
		    ->add_column('remove', '<button type="button" id="delete" name="$1" class="btn btn-danger">Delete</button>>', 'index_name');
		echo $this->datatables->generate();
	}

    function data_instrument($personnel)
    {
		$this->datatables
		    ->select('index_name,personnel,question,type')
		    ->from('feedback_output')
		    ->where('personnel',$personnel)
		    ->add_column('input', '<a href="input_instrument/$1" class="btn btn-info">Edit</a>', 'index_name')
		    ->add_column('remove', '<button type="button" id="delete" name="$1" class="btn btn-danger">Delete</button>', 'index_name');
		echo $this->datatables->generate();
	}

	function feedback()
	{
		$data = array(
			'feedback_start' => $this->input->post('feedback_start'),
			'feedback_end' => $this->input->post('feedback_end'),
			'feedback_status' => 'activated'
			);
		
		$this->db->update('feedback',$data);
	}

	function force_end_feedback()
	{
		$data = array(
			'feedback_status' => 'deactivated'
			);
		
		$this->db->update('feedback',$data);
	}

	function remove_instrument($int)
	{
		$this->db->delete('feedback_output', array('index_name' => $int)); 
	}
	function entry_insert_instrument()
	{
		$index = "a".($this->db->count_all('feedback_output')+1);
		$this->load->dbforge();
		$data = array(
			'index_name' => $index,
			'personnel' => $this->input->post('personnel'), 
			'question' => $this->input->post('question'), 
			'type' => $this->input->post('type')
			);
		$this->db->insert('feedback_output',$data);

		if ($this->input->post('type')=="radio") {
			$type="INT";
		}
		else{
			$type="VARCHAR(50)";
		}
		$index = "a".$this->db->count_all('feedback_output');
		if ($this->db->field_exists($index, 'feedback_record')){
			$query="ALTER TABLE feedback_record DROP COLUMN $index";
			$this->db->query($query); 
		}
		$query="ALTER TABLE feedback_record ADD $index $type";
		$this->db->query($query); 
	}

	function entry_update_instrument()
	{
		$data = array(
				'personnel' => $this->input->post('personnel'), 
				'question' => $this->input->post('question'), 
				'type' => $this->input->post('type')
				);
		$this->db->where('index_name',$this->input->post('index_name'));
		$this->db->update('feedback_output',$data);

	}

	function view_form($personnel)
	{
		$query = $this->db->get_where('feedback_output',array('personnel' => $personnel));;
		return $query->result();
	}

	function get_feedback_ratings()
	{
		$query = $this->db->get_where('feedback_output',array('type' => 'radio'));
		return $query->result();
	}

	function get_feedback_text()
	{
		$query = $this->db->get_where('feedback_output',array('type' => 'text'));
		return $query->result();
	}

	function get_feedback_students_list()
	{
		$this->db->like('user_id', '5', 'after'); 
		$query = $this->db->get('users');
		return $query->result();
	}
}

/* End of file services_model.php */
/* Location: ./application/models/services_model.php */