
 <?php
session_start();
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/database.php');
$db  = new Database();



$dd=$_GET['dd'];


$book_author_delect = "delete from sms_books_author where id='$dd'";
$q=mysqli_query($db->link,$book_author_delect);
    
    header('location:manage_book_author.php');

?>