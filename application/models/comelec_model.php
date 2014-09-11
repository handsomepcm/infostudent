<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comelec_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function check($table,$field,$data)
    {
        $query = $this->db->get_where($table,array($field=>$data));
        return $query -> num_rows();
    }

    function check_expiry()
    {
    	$query = $this->db->get_where('election',array('election_status'=>'activated'));
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $value) 
			{
				$id=$value->election_id;
				$votestart=$value->voting_start;
				$filestart=$value->filing_start;
				$voteend=$value->voting_end;
				$fileend=$value->filing_end;
			}
			$cur_time = date("m/d/Y H:i");
		    $now = strtotime($cur_time);
		    $vstart = strtotime($votestart);
		    $fstart = strtotime($filestart);
		    $vend = strtotime($voteend);
		    $fend = strtotime($fileend);
				
			

			if ($fstart < $now && $fend > $now) 
			{
				$data = array(
					'filing_status' => 'activated',  
					);
				$this->db->where('election_id',$id);
				$this->db->update('election',$data);
			}
			else if ($fend <= $now) 
			{
				$data = array(
					'filing_status' => 'deactivated',  
					);
				$this->db->where('election_id',$id);
				$this->db->update('election',$data);
			}

			
			if($vstart < $now || $vend > $now) 
			{
				$data = array(
					'voting_status' => 'activated'
					);
				$this->db->where('election_id',$id);
				$this->db->update('election',$data);
			}
			else if ($vend<=$now) 
			{
				$data = array(
					'voting_status' => 'deactivated'
					);
				$this->db->where('election_id',$id);
				$this->db->update('election',$data);
			}
			else
			{
				//no action
			}
		}
		/*echo $now ."n<br>";
	    echo $vstart ."vs<br>";
	    echo $fstart ."fs<br>";
	    echo $vend ."ve<br>";
	    echo $fend ."fe<br>";*/
    }

    function data_all_election()
    {
		$this->datatables
		->select('election_id,election_name,election_status')
		->from('election');
		echo $this->datatables->generate();
	}

	function data_all_candidates()
    {
		$this->datatables
		->select('candidate_id,candidate_position,candidate_party,candidate_votes,candidate_status')
		->from('candidates')
		->join('users', 'candidates.user_id = users.user_id')
	    ->select('last_name')
	    ->join('election', 'candidates.election_id = election.election_id')
	    ->select('election_name')
	    ->where('election.election_status = "activated"')
		->add_column('approve', '<button type="button" id="approve" name="$1" class="btn btn-info">Approve</button>', 'candidate_id')
		->add_column('disapprove', '<button type="button" id="disapprove" name="$1" class="btn btn-danger">Disapprove</button>', 'candidate_id');
		echo $this->datatables->generate();
	}

	function get_all_election()
    {
        $query = $this->db->get_where('election');
        return $query->result_array();
    }

	function edit_election_name()
    {
        $data = array(
            'election_name' => $this->input->post('value')
            );
        $this->db->where('election_id',$this->input->post('id'));
        $this->db->update('election',$data);
    }

    function add_election()
    {
		$id=null;
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) {
			$id=$value->election_id;
		}
		if($id!=NULL){
			$data = array(
				'election_status' => 'deactivated', 
				);
			$this->db->where('election_id',$id);
			$this->db->update('election',$data);
		}
		$data = array(
			'election_name' => $this->input->post('election_name'), 
			'election_status' => 'activated', 
			'voting_status' => 'deactivated',
			'filing_status' => 'activated', 
			'total_voters' =>  $this->db->count_all('student'),  
			);
		$this->db->insert('election',$data);
	}

	function get_election_data()
	{
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $value) {
				$id=$value->election_id;
			}
			$query = $this->db->get_where('election',array('election_id'=>$id));
			return $query->row_array();
		}
		else{
			return FALSE;
		}
	}

	function filing_time()
	{
		$data = array(
			'filing_start' => $this->input->post('filing_start'),
			'filing_end' => $this->input->post('filing_end')
			);
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) {
			$id=$value->election_id;
		}
		$this->db->where('election_id',$id);
		$this->db->update('election',$data);
	}

	function filing_end()
	{
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) {
			$id=$value->election_id;
		}
		$data = array(
			'filing_status' => 'deactivated'
			);
		$this->db->where('election_id',$id);
		$this->db->update('election',$data);
	}

	function voting_time()
	{
		$data = array(
			'voting_start' => $this->input->post('voting_start'),
			'voting_end' => $this->input->post('voting_end')
			);
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) {
			$id=$value->election_id;
		}
		$this->db->where('election_id',$id);
		$this->db->update('election',$data);
	}

	function voting_end()
	{
		$query = $this->db->get_where('election',array('election_status'=>'activated'));
		foreach ($query->result() as $value) {
			$id=$value->election_id;
		}
		$data = array(
			'voting_status' => 'deactivated'
			);
		$this->db->where('election_id',$id);
		$this->db->update('election',$data);
	}

	function get_voting_results($from_control)
	{
		$data=array();
		$pos = array('0' => 'president','1' => 'vpexternal','2' => 'vpinternal',
					'3' => 'secretary','4' => 'treasurer','5' => 'auditor','6' => 'pro' );
		$ctr=0;
		$querye = $this->db->get_where('election',array('election_id'=>$from_control));
		foreach ($querye->result() as $value) {
			$eid=$value->election_id;
			$name=$value->election_name;
		}
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
					$votes=$value->candidate_votes;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="$val->last_name,$val->first_name";
						$data['vote'.$ctr]="$votes";
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
					$votes=$value->candidate_votes;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="$val->last_name,$val->first_name";
						$data['vote'.$ctr]="$votes";
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
				'candidate_party'=>'independent',
				'candidate_status' => 'approved'
			);
			$query = $this->db->get_where('candidates',$where);
			$ctr++;
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$id=$value->user_id;
					$votes=$value->candidate_votes;
					$query1 = $this->db->get_where('users',array('user_id'=>$id));
					foreach ($query1->result() as $val) {
						$data['pos'.$ctr]="$val->last_name,$val->first_name";
						$data['vote'.$ctr]="$votes";
					}
				}
			}
			else{
				$data['pos'.$ctr]=NULL;
				$data['vote'.$ctr]=NULL;
			}
		}
		//print_r($data);
		$data['name']=$name;
		return $data;
	}

	function get_voting_details($id)
	{
		$this->db->like('election_id',$id);
		$this->db->from('vote_log');
		$data['voted']=$this->db->count_all_results();
		
		$this->db->select('total_voters');
		$this->db->from('election');
		$this->db->where('election_id',$id);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
		    $data['votee']=$row->total_voters;
		}
		return $data;
	}

	function get_students_list()
	{
		$this->db->like('user_id', '5', 'after'); 
		$query = $this->db->get('users');
		//print_r($query->result());
		return $query->result();
	}

	function status_approve($id)
	{
		$this -> db -> select('candidate_position,candidate_party');
		$this -> db -> from('candidates');
		$this -> db -> where('candidate_id = ' . "'" . $id . "'");

		$query = $this -> db -> get();
		foreach ($query -> result_array() as $row) {
			$pos=$row['candidate_position'];
			$par=$row['candidate_party'];
		}
		$this->db->where('candidate_id',$id);
		$this->db->update('candidates',array('candidate_status'=>'approved')); 

		$where = array(
						'candidate_position'=>$pos,
						'candidate_party'=>$par
					);
		$this->db->where($where);
		$this->db->update('candidates',array('candidate_status'=>'disapproved'),"candidate_id != $id");
	}

	function status_disapprove($id)
	{
		$this -> db -> select('candidate_position,candidate_party');
		$this -> db -> from('candidates');
		$this -> db -> where('candidate_id = ' . "'" . $id . "'");

		$query = $this -> db -> get();
		foreach ($query -> result_array() as $row) {
			$pos=$row['candidate_position'];
			$par=$row['candidate_party'];
		}
		$where = array(
						'candidate_position'=>$pos,
						'candidate_party'=>$par
					);
		$this->db->where('candidate_id',$id);
		$this->db->update('candidates',array('candidate_status'=>'disapproved')); 

	}
}

/* End of file comelec_model.php */
/* Location: ./application/models/comelec_model.php */