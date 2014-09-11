<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function check_user()
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('user_id = ' . "'" . $this->input->post('username') . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            foreach ($query -> result() as $record) 
            {
                $activation = $record->status;
                $password = $record->password;
            }
            if ($activation == "activated") 
            {
                if ($password == md5($this->input->post('password'))) 
                {
                    return TRUE;
                }
                else
                {
                    return "Username or Password Incorrect.";
                }
            }
            else
            {
                return "Account not activated. Please Contact Administrator.";
            }
        }
        else
        {
            return "Username does not exist.";
        }
    }

    function details($username)
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('user_id = ' . "'" . $username . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query -> result();
        }
        else
        {
            return false;
        }
    }

    function password_update()
    {
        $data = array(
            'password' => md5($this->input->post('confirm_new_password'))
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data); 

    }

    function password_compare($password,$id)
     {
        $this -> db -> select('password');
        $this -> db -> from('users');
        $this -> db -> where('id = ' . "'" . $id . "'");

        $query = $this -> db -> get();
        foreach ($query -> result_array() as $row) {
            $item=$row['password'];
        }
        if(strcmp($item,md5($password))==0)
        {
            return true;
        }
        else
        {
            return false;
        }
     }

    function email_update()
    {
        $data = array(
            'email_address' => $this->input->post('confirm_email_address')
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',$data);
     }
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */