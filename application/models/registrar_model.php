<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar_model extends CI_Model {

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

    function get_enrollment_data()
    {
		$this->datatables
		    ->select('user_id,last_name,first_name,course_name,year,term,section,grade')
		    ->from('grades')
            ->where('grade != "Credited"');
		echo $this->datatables->generate();
	}

    function data_all_student()
    {
        $this->datatables
        ->select('users.user_id')
        ->select('last_name')
        ->select('first_name')
        ->select('curi_name')
        ->from('student')
        ->join('users', 'student.user_id = users.user_id','RIGHT JOIN');
        
        echo $this->datatables->generate();
    }

    function data_all_grade()
    {
        $this->datatables
            ->select('user_id,last_name,first_name,course_name,grade')
            ->from('grades');
        echo $this->datatables->generate();
    }

    function enroll_save_csv($dir){
        $row = 1;
        if (($handle = fopen($dir, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row>1){
                    for ($c=0; $c < $num; $c++) {
                        $storage[$c]=$data[$c];
                    }
                    $query="INSERT IGNORE INTO 
                            grades (year,term,course_name, section, last_name,first_name,user_id) 
                            VALUES ('$storage[0]', '$storage[1]', '$storage[2]', '$storage[3]', '$storage[4]', '$storage[5]', '$storage[6]')";
                    $this->db->query($query); 
                }
                $row++;
            }
        }
    }
    function grades_save_csv($dir){
        $row = 1;
        if (($handle = fopen($dir, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row>1){
                    for ($c=0; $c < $num; $c++) {
                        $storage[$c]=$data[$c];
                    
                    }
                    $data = array(
                        'grade' => $storage[5]
                    );
                    $where = array(
                        'year'=>$storage[0],
                        'term'=>$storage[1],
                        'course_name'=>$storage[2],
                        'section'=>$storage[3],
                        'user_id'=>$storage[4],
                    );
                    $this->db->where($where);
                    $this->db->update('grades',$data);
                }
                $row++;
            }
        }
    }

    function student_save_csv($dir){
        $row = 1;
        if (($handle = fopen($dir, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row>1){
                    for ($c=0; $c < $num; $c++) {
                        $storage[$c]=$data[$c];
                    
                    }

                    $query="INSERT IGNORE INTO 
                            student (user_id, curi_name) 
                            VALUES ('$storage[0]', '$storage[3]')";
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

    function credited_save_csv($dir){
        $row = 1;
        if (($handle = fopen($dir, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row>1){
                    for ($c=0; $c < $num; $c++) {
                        $storage[$c]=$data[$c];
                    
                    }

                    $query = $this->db->get_where("users",array("user_id"=>$storage[1]));
                    if($query->row_array()!=NULL)
                    {
                        $row = $query->row_array(); 
                        $last_name=$row['last_name'];
                        $first_name=$row['first_name'];
                    }

                    $data = array(
                        'grade' => $storage[2],
                        'last_name'=>$last_name,
                        'first_name'=>$first_name,
                        'course_name'=>$storage[0],
                        'user_id'=>$storage[1]
                    );
                    $this->db->insert('grades',$data);
                    
                }
                $row++;
            }
        }
    }

    function delete_data()
    {
        $this->db->delete('grades', array('user_id' => "50205129434",'course_name' => "BA221"));
        $this->db->delete('grades', array('user_id' => "50205129434",'course_name' => "ENG123")); 
    }

}

/* End of file registrar_model.php */
/* Location: ./application/models/registrar_model.php */