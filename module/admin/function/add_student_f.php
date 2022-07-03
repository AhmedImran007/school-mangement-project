<?php 
session_start();
include '../../dbconnect.php';
include '../../database.php';
 
$db =new Database;
 ?>

<?php
if( action:'imran'){
	$s_name =  $_POST['s_name']);
	$f_name = mysqli_real_escape_string($db->link, $_POST['f_name']);
	$m_name = mysqli_real_escape_string($db->link, $_POST['m_name']);
	$classe = mysqli_real_escape_string($db->link, $_POST['classes']);
	$sections = mysqli_real_escape_string($db->link, $_POST['sections']);
	$roll = mysqli_real_escape_string($db->link, $_POST['roll']);
	$b_date = mysqli_real_escape_string($db->link, $_POST['datepicker']);
	$gender = mysqli_real_escape_string($db->link, $_POST['s_gender']);
	$s_address = mysqli_real_escape_string($db->link, $_POST['address']);
	$s_email = mysqli_real_escape_string($db->link, $_POST['s_email']);
	$s_phone = mysqli_real_escape_string($db->link, $_POST['s_phone']);
	$s_password = mysqli_real_escape_string($db->link, $_POST['s_password']);
	if($s_name == '' || $f_name =='' || $m_name == '' || $classe =='' || $sections == ''|| $roll =='' || $b_date == ''|| $gender =='' || $s_address == ''|| $s_email =='' || $s_phone == ''|| $s _password =='' ){
		echo "<h2>Field must not be Empty !!</h2>";
		}
		else{
			$query = "INSERT INTO add_student (s_name,f_name,m_name,class,sections,roll,b_date,gender,s_address,s_email,s_phone,s_password) Values('$s_name','$f_name','$m_name','$classe','$sections','$roll','$b_date','$gender','$s_address','$s_email','$s_phone','$s_password')";
			//$create = $db->insert($query);
			$insert_row = mysqli_query($db->link,$query);
			if($insert_row){
				echo 'Data Insrted Successfully.';
				exit;
				}

			}
	}
?>