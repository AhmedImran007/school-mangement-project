

 <?php
session_start();
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/database.php');
$db  = new Database();



$dd=$_GET['dd'];


$st_delect = "delete from sms_staff where id='$dd'";
$q=mysqli_query($db->link,$st_delect);
    
    header('location:staff_information.php');

?>