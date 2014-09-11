<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_news()
    {	
    	$this->db->order_by("news_id", "desc"); 
    	$this->db->limit(2);
		$query = $this->db->get_where("news",array("type"=>"news"));
		return $query->result();
	}

	function get_announce()
    {
    	$this->db->order_by("news_id", "desc"); 
    	$this->db->limit(2);
		$query = $this->db->get_where("news",array("type"=>"announce"));
		return $query->result();
	}

	function get_event()
    {
    	$this->db->order_by("news_id", "desc"); 
    	$this->db->limit(2);
		$query = $this->db->get_where("news",array("type"=>"event"));
		return $query->result();
	}

	function check_election_activated()
	{
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		if ($query->num_rows() > 0) 
		{
			return TRUE;
		}
		return FALSE;
	}

	function check_feedback_activated()
	{
		$query = $this->db->get_where('feedback',array('feedback_status'=>'activated'));
		if ($query->num_rows() > 0) 
		{
			return TRUE;
		}
		return FALSE;
	}

	function check_filing_activated()
	{
		$query = $this->db->get_where('election',array('filing_status'=>'activated'));
		if ($query->num_rows() > 0) 
		{
			return TRUE;
		}
		return FALSE;
	}

	function check_voting_activated()
	{
		$query = $this->db->get_where('election',array('voting_status'=>'activated'));
		if ($query->num_rows() > 0) 
		{
			return TRUE;
		}
		return FALSE;
	}

	function check_filed_me()
	{
		$session_data = $this->session->userdata('logged_in');
		$id=$session_data['user_id'];
		$querye = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($querye->result() as $value) 
		{
			$eid=$value->election_id;
		}
		$query = $this->db->get_where('candidates',array('user_id'=>$id,'election_id'=>$eid));
		if ($query->num_rows() > 0) 
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function check_voted_me()
	{
		$session_data = $this->session->userdata('logged_in');
		$id=$session_data['user_id'];
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) 
		{
			$eid=$value->election_id;
		}
		$query = $this->db->get_where('vote_log',array('user_id'=>$id,'election_id'=>$eid));
		if ($query->num_rows() > 0) 
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function submit_candidacy()
	{
		$session_data = $this->session->userdata('logged_in');
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) {
			$id=$value->election_id;
		}
		$data = array(
			'election_id' => $id,
			'user_id' => $session_data['user_id'],
			'candidate_position' => $this->input->post('position'),
			'candidate_party' => $this->input->post('party'),
			'candidate_reason' => $this->input->post('reason'),  
			'candidate_status' => 'pending',  
			);
		$this->db->insert('candidates',$data);
	}

	function get_candidates()
	{
		$querye = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($querye->result() as $value) {
			$eid=$value->election_id;
		}
		$data=array();
		$pos = array('0' => 'president','1' => 'vpexternal','2' => 'vpinternal',
					'3' => 'secretary','4' => 'treasurer','5' => 'auditor','6' => 'pro' );
		$ctr=0;
		for ($i=0; $i < 7; $i++) { 
			$position=$pos[$i];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>'globe',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$cid=$value->candidate_id;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="<input type='radio' name='$position' value='$cid'/>$val->last_name,$val->first_name";
					}

				}				
			}
			else{
				$data['pos'.$ctr]=NULL;
			}
		}
		for ($g=0; $g < 7; $g++) { 
			$position=$pos[$g];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>'smart',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$cid=$value->candidate_id;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="<input type='radio' name='$position' value='$cid'/>$val->last_name,$val->first_name";
					}
				}
				
			}
			else{
				$data['pos'.$ctr]=NULL;
			}
		}
		for ($g=0; $g < 7; $g++) { 
			$position=$pos[$g];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>'independent',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$cid=$value->candidate_id;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="<input type='radio' name='$position' value='$cid'/>$val->last_name,$val->first_name";
					}
				}
			}
			else{
				$data['pos'.$ctr]=NULL;
			}
		}
		//print_r($data);
		return $data;
	}
	function vote_party()
	{
		$querye = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($querye->result() as $value) {
			$eid=$value->election_id;
		}
		$pos = array('0' => 'president','1' => 'vpexternal','2' => 'vpinternal',
					'3' => 'secretary','4' => 'treasurer','5' => 'auditor','6' => 'pro' );
		for ($i=0; $i < 7; $i++) { 
			$position=$pos[$i];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>$this->input->post('party'),
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$vote=$value->candidate_votes;
					$id=$value->candidate_id;
					$vote=$vote+1;
					$this->db->where('candidate_id',$id);
					$this->db->update('candidates',array('candidate_votes' => $vote )); 
				}				
			}
		}
		$this->load->helper('date');
		$session_data = $this->session->userdata('logged_in');
		$format = 'DATE_RFC850';
		$time = time();

		$log2 = array(
		      'user_id' => $session_data['user_id'],
		      'time' => standard_date($format, $time),
		      'election_id' => $eid
		      );
		$this->db->insert('vote_log',$log2);
	}
	//vote individual record to database
	function vote_individual()
	{
		$querye = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($querye->result() as $value) {
			$eid=$value->election_id;
		}
		$pos = array('0' => 'president','1' => 'vpexternal','2' => 'vpinternal',
					'3' => 'secretary','4' => 'treasurer','5' => 'auditor','6' => 'pro' );
		for ($i=0; $i < 7; $i++) { 
			$position=$pos[$i];
			if($this->input->post($position)==NULL){
				continue;
			}
			$where = array(
				'candidate_position'=>$position,
				'candidate_id' => $this->input->post($position),
				'election_id'=>$eid
			);
			$query = $this->db->get_where('candidates',$where);
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$vote=$value->candidate_votes;
					//$id=$value->candidate_id;
					$vote=$vote+1;
					$this->db->where('candidate_id',$this->input->post($position));
					$this->db->update('candidates',array('candidate_votes' => $vote )); 
				}				
			}
		}
		$this->load->helper('date');
		$session_data = $this->session->userdata('logged_in');
		$format = 'DATE_RFC850';
		$time = time();

		$log2 = array(
		      'user_id' => $session_data['user_id'],
		      'time' => standard_date($format, $time),
		      'election_id' => $eid
		      );
		$this->db->insert('vote_log',$log2);
	}

	function get_voting_details()
	{
		$session_data = $this->session->userdata('logged_in');
		$where = array(
			'user_id'=>$session_data['user_id']
		);
		$querye = $this->db->get_where('vote_log',$where);
		foreach ($querye->result() as $value) {
			$eid=$value->election_id;
		}
	
		$this->db->like('election_id',$eid);
		$this->db->from('vote_log');
		$data['voted']=$this->db->count_all_results();
		
		$this->db->select('total_voters,election_name');
		$this->db->from('election');
		$this->db->where('election_id',$eid);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
		    $data['votee']=$row->total_voters;
			$data['name']=$row->election_name;
		}
		//print_r($data);
		return $data;
	}
	//return the voting results if voting finished
	function get_voting_results()
	{
		$session_data = $this->session->userdata('logged_in');
		$where = array(
			'user_id'=>$session_data['user_id']
		);
		$querye = $this->db->get_where('vote_log',$where);
		foreach ($querye->result() as $value) {
			$eid=$value->election_id;
		}
		$data=array();
		$pos = array('0' => 'president','1' => 'vpexternal','2' => 'vpinternal',
					'3' => 'secretary','4' => 'treasurer','5' => 'auditor','6' => 'pro' );
		$ctr=0;
		for ($i=0; $i < 7; $i++) { 
			$position=$pos[$i];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>'globe',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$data['vote'.$ctr]=$value->candidate_votes;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="$val->last_name,$val->first_name";
						//$data['vote'.$ctr]="$votes";
					}

				}				
			}
			else{
				$data['pos'.$ctr]=NULL;
				$data['vote'.$ctr]=NULL;
			}
		}
		for ($g=0; $g < 7; $g++) { 
			$position=$pos[$g];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>'smart',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$data['vote'.$ctr]=$value->candidate_votes;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="$val->last_name,$val->first_name";
						//$data['vote'.$ctr]="$votes";
					}
				}
				
			}
			else{
				$data['pos'.$ctr]=NULL;
				$data['vote'.$ctr]=NULL;
			}
		}
		for ($h=0; $h < 7; $h++) { 
			$position=$pos[$h];
			$where = array(
				'election_id'=>$eid,
				'candidate_position'=>$position,
				'candidate_party'=>'independent',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$data['vote'.$ctr]=$value->candidate_votes;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="$val->last_name,$val->first_name";
						//$data['vote'.$ctr]="$votes";
					}
				}
			}
			else{
				$data['pos'.$ctr]=NULL;
				$data['vote'.$ctr]=NULL;
			}
		}
		
		//$query = $this->db->get('candidates');
		//print_r($data);
		//print_r($query->result());
		
		return $data;
	}

	function submit_feedback($personnel)
	{
		$session_data = $this->session->userdata('logged_in');
		$query = $this->db->get_where('feedback_record',array('username'=>$session_data['user_id']));
		if ($query->result()==NULL) {
			$this->db->insert('feedback_record',array('username'=>$session_data['user_id'])); 
		}
		$query = $this->db->get_where('feedback_output',array('personnel'=>$personnel));
		foreach ($query->result() as $value) {
			//for ($i=0; $i <1000 ; $i++) { 
				if ($this->db->field_exists($value->index_name, 'feedback_record')){
				   $data = array(
					      $value->index_name => $this->input->post($value->index_name),
					      );
				   	$this->db->where('username',$session_data['user_id']);
					$this->db->update('feedback_record',$data);
				}
			//}
		}
	}
	//record submission of feedback
	function record_submission()
	{
		$session_data = $this->session->userdata('logged_in');
		$this->load->helper('date');
		$format = 'DATE_RFC850';
		$time = time();
		$log = array(
		      'user_id' => $session_data['user_id'],
		      'time' => standard_date($format, $time)
		      );
		$this->db->insert('feedback_log',$log); 
	}

	function check_feedback_finished()
	{
		$session_data = $this->session->userdata('logged_in');
		$query = $this->db->get_where('feedback_log',array('user_id'=>$session_data['user_id']));
		if ($query->result()==NULL) {
			return FALSE;
		}
		return TRUE;
	}

	function view_grades()
	{
		$session_data = $this->session->userdata('logged_in');
		$name=$session_data['last_name'];
		$term=$this->input->post('term');
		$year=$this->input->post('year'); 

		$where=array(
			'last_name'=>$name,
			'year'=>$year,
			'term'=>$term,
			);
		$this->db->select('course_name, grade, section');
		$this->db-> from('grades');
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
		//echo $query->result();
	}

	function view_schedule(){
		$session_data = $this->session->userdata('logged_in');
		$name=$session_data['last_name'];
		$term=$this->input->post('term');
		$year=$this->input->post('year'); 
		$where = array(
				'last_name'=>$name
			);
		$query = $this->db->get_where('grades',$where);
		if ($query->num_rows() > 0) {
		$ctr=0;
		foreach ($query->result() as $value) {
			//print_r($query->result());
			$cname=$value->course_name;
			$sterm=$value->term;
			$section=$value->section;
			if ($sterm==$term) {
				$where=array(
					'course_name'=>$cname,
					'year'=>$year,
					'term'=>$term,
					'section'=>$section,
					);
				//print_r($where);
				//$this->db->select('*');
				$this->db->where($where);
				$this -> db -> from('schedule');
				$query = $this->db->get();
				/*if ($query->result()==NULL) {
					continue;
				}*/
				$data[$ctr]=$query->result();
				$ctr++;
			}
		}
		$data[$ctr]=NULL;
		//print_r($data);
		return $data;
		}
	}
	function grade_details(){
		$session_data = $this->session->userdata('logged_in');
		$query = $this->db->get_where('grades',array('last_name'=>$session_data['last_name']));

			return $query->result();


	}
	//returns courses of that school year
	function data_all_course_sy()
	{
	 	$session_data = $this->session->userdata('logged_in');
	 	$id=$session_data['user_id'];
	 	$query = $this->db->get_where('student',array('user_id'=>$id));
		foreach ($query->result() as $value) {
			$curi_name=$value->curi_name;
			$sy=$value->sy;
		}
		$query = $this->db->get_where('curriculum',array('name'=>$curi_name));
		foreach ($query->result() as $value) {
			$curi_id=$value->curi_id;
		}
	 	$query = $this->db->query("SELECT sub.*,combi.term,combi.year
	 		FROM course AS sub INNER JOIN curriculum_courses AS combi ON sub.course_id=combi.course_id
	 		WHERE combi.curi_id=$curi_id;
	 		");
	 	//print_r($query->result());
		return $query -> result();
	 }
	 //returns course by name
	 function course_name_sy()
	 {
	 	$session_data = $this->session->userdata('logged_in');
	 	$id=$session_data['user_id'];
	 	$query = $this->db->get_where('student',array('user_id'=>$id));
		foreach ($query->result() as $value) {
			$curi_name=$value->curi_name;
			$sy=$value->sy;
		}
		$query = $this->db->get_where('curriculum',array('name'=>$curi_name));
		foreach ($query->result() as $value) {
			$curi_id=$value->curi_id;
		}
	 	$query = $this->db->get_where('curriculum',array('curi_id'=>$curi_id));
		return $query -> result_array();
	 }

	 function data_curriculum($id)
    {
        $query = $this->db->get_where("newcourse",array("curi_id"=>$id));
        return $query->result();
    }
}

/* End of file student_model.php */
/* Location: ./application/models/student_model.php */