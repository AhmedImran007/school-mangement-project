<?php


include 'dbconnect.php';
 include 'database.php';
 
$db =new Database;
    if(isset($_POST['forgot'])){
        $email = $db->link->real_escape_string($_POST['email']);
        $data = $db->link->query("select id from sms_users where email ='$email'");
        if($data->num_rows >0){
            $str ="146451286211556565";
            $str =str_shuffle($str);
            $str = substr($str,0,10);
            
            echo $str;
        }
        else{
            echo "Please check your email";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <from action="forgotpass.php" method="post">
    <input type="text" name="email" id="email" placeholder="email">
    <input type="button" name="forgot" value="Request Password">
    </from>
</body>
</html>