
 <?php
session_start();
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/database.php');
$db  = new Database();



$dd=$_GET['dd'];


$book_list_delect = "delete from sms_book_list where id='$dd'";
$q=mysqli_query($db->link,$book_list_delect);
    
    header('location:manage_library.php');

?>