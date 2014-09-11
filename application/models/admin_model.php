<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function log($action)
    {
        $session_data = $this->session->userdata('logged_in');
        $this->load->helper('date');
        $format = 'DATE_RFC850';
        $time = time();
        $log = array(
              'user_id' => $session_data['user_id'],
              'action' => $action,
              'time' => standard_date($format, $time)
              );
        $this->db->insert('logs',$log);
    }

    function retrieve_all_data()
    {
        $this->datatables
            ->select('id,user_id,last_name,first_name,privilege,email_address,status')
            ->from('users')
            ->add_column('activation', '<button type="button" id="reset_password" name="$1" class="btn btn-danger">Reset Password</button>', 'id');
        echo $this->datatables->generate();
    }

    function get_log_data(){
        $this->load->library('datatables');
        $this->datatables
            ->select('id,user_id,action,time')
            ->from('logs');
        echo $this->datatables->generate();
    }

    function edit_user_id()
    {
        $data = array(
            'user_id' => $this->input->post('value')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
        $this->log("Edit User ID");
    }

    function edit_last_name()
    {
        $data = array(
            'last_name' => $this->input->post('value')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
        $this->log("Edit Last Name");
    }

    function edit_first_name()
    {
        $data = array(
            'first_name' => $this->input->post('value')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
        $this->log("Edit First Name");
    }

    function edit_privilege()
    {
        $data = array(
            'privilege' => $this->input->post('value')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
        $this->log("Edit Privilege");
    }

    function edit_email()
    {
        $data = array(
            'email_address' => $this->input->post('value')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
        $this->log("Edit Email");
    }

    function edit_activation()
    {
        $data = array(
            'status' => $this->input->post('value')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
        $this->log("Edit Activation");
    }

    function reset_password()
    {
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',array('password'=>'c21f969b5f03d33d43e04f8f136e7682')); 
        $this->log("Reset Password");
    }

    function check_user()
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('user_id = ' . "'" . $this->input->post('user_id') . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function add_user(){
        $data = array(
        'user_id' => $this->input->post('user_id'), 
        'last_name' => $this->input->post('last_name'), 
        'first_name' => $this->input->post('first_name'), 
        'privilege' => $this->input->post('privilege'),
        'password' => 'c21f969b5f03d33d43e04f8f136e7682',
        'email_address' => $this->input->post('email_address'),
        'status' => 'activated' 
        );
        $this->db->insert('users',$data);
        $this->log("Add New User");
    }

    function save_csv($dir){
        $row = 1;
        if (($handle = fopen($dir, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row>1){
                    for ($c=0; $c < $num; $c++) {
                        $storage[$c]=$data[$c];
                    
                    }

                    $query="INSERT IGNORE INTO 
                            student (user_id, curi_name,sy) 
                            VALUES ('$storage[0]', '$storage[3]', '$storage[4]')";
                    $this->db->query($query); 

                    $query="INSERT IGNORE INTO 
                            users (user_id, last_name, first_name,password,privilege,status) 
                            VALUES ('$storage[0]', '$storage[1]', '$storage[2]','c21f969b5f03d33d43e04f8f136e7682','student','activated')";
                    $this->db->query($query);  
                    
                }
                $row++;
            }
        }
    }
    function log_query(){
        $this->db->empty_table('logs'); 
        $session_data = $this->session->userdata('logged_in');
        $this->load->helper('date');
        $format = 'DATE_RFC850';
        $time = time();
        $log = array(
              'user_id' => $session_data['username'],
              'action' => "Exported Log Data",
              'time' => standard_date($format, $time)
              );
        $this->db->insert('logs',$log);
    }
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */