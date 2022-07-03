
 <?php
session_start();
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/database.php');
$db  = new Database();



$dd=$_GET['dd'];


$st_delect = "delete from sms_admission_form_fee where id='$dd'";
$q=mysqli_query($db->link,$st_delect);
    
    header('location:manage_admission_form.php');

?>