
<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../../lib/database.php');
	


class Student{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    
    public function insertAttend($s_name,$class,$sections,$cur_date,$attend = array()){
        $attn_query = "SELECT DISTINCT att_time FROM stu_attend;";
        $att_read = $this->db->select($attn_query);
         while($result = $att_read->fetch_assoc()){
                $db_date = $result['att_time'];
                if($cur_date == $db_date){
                $msg= "<div class='alert alert-danger'><strong>Error !</strong> Attendance already taken</div>";
                    return $msg;
                  }
                 }
         foreach($attend as $attn_key => $attn_value){
                            if($attn_value == "present"){
                                $stu_query = "INSERT INTO stu_attend(s_name,roll,class,sections,attend,att_time) VALUES('$s_name','$attn_key','$class','$sections','present',now())";
                                
                                $att_insert =$this->db->insert($stu_query);
                            }
                            elseif($attn_value == "absent"){
                                $stu_query = "INSERT INTO stu_attend(s_name,roll,class,sections,attend,att_time) VALUES('$s_name','$attn_key','$class','$sections','absent','now()')";
                                
                                $att_insert = $this->db->insert($stu_query);
                                
                            }
                             
                            
                        }
                        if($att_insert){
                            $msg= "<div class='alert alert-success'><strong>success !</strong> Attendance Data Inserted successfully</div>";
                            return $msg;
                            }
                        else{
                           $msg= "<div class='alert alert-danger'><strong>Error !</strong> Attendance Data not inserted</div>";
                            return $msg;
                        }
                       
        
    }
    
}
?>