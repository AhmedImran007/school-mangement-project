<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') 

?>


<?php
//for deleting bookcase
if (isSet($_POST['DELBOOKCASE']) && isSet($_POST['del'])&& $_POST['del'] != '' ) {


		$bookcase=trim($_POST['del']);
			
		$sql4="DELETE FROM sms_bookcases WHERE user_email=\"'".$_SESSION['usr_name']."'\" AND bookcase=\"$bookcase\" ";
		echo $sql4;
		if (mysqli_query($db->link, $sql4)) {echo "delected Data";} 
		else {echo "Error: " . $sql4 . "<br>" . mysqli_error($db->link);}		
 }
?>
<?php
//For Adding Bookcases

if (isSet($_POST['ADDBCASE']) && 
	isSet($_POST['BOOKCASE']) && isSet($_POST['SHELFCOUNT'])  && isSet($_POST['SHELFCAP'])
	&& $_POST['BOOKCASE'] != ''  && $_POST['SHELFCOUNT'] != ''   && $_POST['SHELFCAP'] != '') {

	
	$bookcase=$_POST['BOOKCASE'];
	$shelf_count=$_POST['SHELFCOUNT'];
	$shelf_cap=$_POST['SHELFCAP'];

	$sql = "INSERT INTO sms_bookcases  (user_email, bookcase, shelf_count,shelf_cap)VALUES ('".$_SESSION['usr_name']."', '$bookcase', '$shelf_count','$shelf_cap')";

	if (mysqli_query($db->link, $sql)) {echo "New record created successfully";} 
	else {echo "Error: " . $sql . "<br>" . mysqli_error($db->link);}
 }
?>

<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">
<!-- <link rel="stylesheet"  media="all" href="../../dist/css/styles_profile.css">-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Add Bookcase
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>


    <?php include('sidebar.php') ?>

    <!-- Main content -->

    <section class="content">

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-10 connectedSortable" id="addStudent">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Bookcase Form</h3>
                    </div>
                    <div id="result"> </div>
                    <!-- /.box-header -->
                    <!-- form start -->
             
               <div class="title_box">
                   <div id="title"><b>Add BookCase <b></div>
<div id="content">
						
						<!-- Form for Adding Bookcases -->
						<table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
							<td>Bookcase Name</td>
							<td>Shelf Count</td>
							<td>Shelf Capacity</td>
						  </tr>		  
						  <form method="post"  action="">
						  <tr>
							<td><input type="text" class="txtbox" value="" name="BOOKCASE" /></td>
							<td><input type="text" class="txtbox" value="" name="SHELFCOUNT" /></td>
							<td><input type="text" class="txtbox" value="" name="SHELFCAP"/></td>
							<td><input type="submit" value="Add" name="ADDBCASE" /></td>
						  </tr>
						  </form>	
						</table>
						  

							  

						<!-- Table for Bookcase -->
						<form method="post"  action="">	  
						<table class="hovertable">
							<tr>
								<th>Bookcase Name</th><th>Shelf Count</th><th>Shelf Capacity</th><th>   </th>
							</tr>

						<?php
						//Dynamically filling Data into the Table Bookcase
						$result = mysqli_query($db->link,  "SELECT * FROM   sms_bookcases  WHERE  user_email = '".$_SESSION['usr_name']."' " );
						if (!$result) {
							echo "Could not successfully run query ($sql) from DB: " . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($result)) {
							echo "No rows found";
						}
						else{
							while ($row = mysqli_fetch_assoc($result)) {
							$a= $row["bookcase"];
							$b= $row["shelf_count"];
							$c= $row["shelf_cap"];
							
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$a</td>";
							echo "<td>$b</td>";
							echo "<td>$c</td>";
							echo "<td><input name='del' type=\"radio\" value=\" $a \"></td>";
							echo "</tr>";
							}
						}
						?>
						</table>
						<input type="submit" value="Delete BookCase" name="DELBOOKCASE" />
						</form>
</div>
                   
               </div>
               
               
                </div>


            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">



            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- Page script -->
<script>
    $(function() {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
    });

</script>
<script src="../../plugins/image-upload/bootstrap-imageupload.min.js"></script>
<script>
    var $imageupload = $('.imageupload');
    $imageupload.imageupload();

</script>
<?php include('inc/footer.php') ?>
<!-------------------------------------         -------------------->

<script >
$(function(){
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>