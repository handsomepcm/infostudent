<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check{

	public function __construct()
	{
	    $this->ci =& get_instance();
	}
	public function privilege($privilege=NULL)
	{
		$session_data = $this->ci->session->userdata('logged_in');
	    if($session_data == NULL && $privilege=="login")
	    {
	    	//login page	
	    }
	    elseif ($session_data == NULL) 
	    {
	    	redirect('', 'refresh');
	    }
	    elseif ($session_data['privilege']==$privilege) 
	    {
	    	$data['username']= $session_data['first_name']." ".$session_data['last_name'];
	    	return $data;
	    }
	    elseif ($session_data['privilege']!=$privilege)
	    {
	    	if($session_data['privilege']=='student')
		    {
		    	redirect('student', 'refresh');
		    }
		    else if($session_data['privilege']=='administrator')
		    {
		    	redirect('admin', 'refresh');
		    }
		    else if($session_data['privilege']=='acadhead')
		    {
		    	redirect('acadhead', 'refresh');
		    }
		    else if($session_data['privilege']=='comelec')
		    {
		    	redirect('comelec', 'refresh');
		    }
		    else if($session_data['privilege']=='registrar')
		    {
		    	redirect('registrar', 'refresh');
		    }
		    else if($session_data['privilege']=='services')
		    {
		    	redirect('services', 'refresh');
		    }
		    else if($session_data['privilege']=='schooladmin')
		    {
		    	redirect('schooladmin', 'refresh');
		    }
		    else
		    {
		    	//no action; trap for non-existent privileges
		    }
	    }
	    else
	    {
	    	//no action
	    } 
	}
}

/* End of file check.php */
/* Location: ./application/libraries/check.php */