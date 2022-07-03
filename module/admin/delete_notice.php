
<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/database.php');
$db  = new Database();



$nid=$_GET['id'];
$delect_notice = "delete from sms_notice where notice_id='$nid'";
$q=mysqli_query($db->link,$delect_notice);

header('location:view_notice.php');

?>