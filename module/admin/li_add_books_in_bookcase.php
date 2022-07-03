<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') 

?>

<?php
//for adding books

if (isSet($_POST['ADDBOOK']) && isSet($_POST['D1']) && isSet($_POST['D2']) && isSet($_POST['D3']) && isSet($_POST['D4']) && isSet($_POST['D5'])  && isSet($_POST['D6']) )
{ 
	
	if( $_POST['D2'] != ''   && $_POST['D3'] != '' && $_POST['D4'] != ''  && $_POST['D5'] != ''   && $_POST['D6'] != ''  &&
		$_POST['D2'] != 'Title'  && $_POST['D3'] != 'Author'   && $_POST['D4'] != 'Genre' && $_POST['D5'] != 'ISBN'  && $_POST['D6'] != 0  ) {

		list($bookcase, $shelf_id) = explode("-", $_POST['D1'], 2);
		$title=$_POST['D2'];
		$author=$_POST['D3'];
		$gener=$_POST['D4'];
		$isbn=$_POST['D5'];
		$price=$_POST['D6'];
					
			
	
			//For checking if the shelf is full or not
			$q1 = mysqli_query($db->link, "SELECT * FROM sms_books  WHERE user_email=\"'".$_SESSION['usr_name']."'\" and bookcase=\"$bookcase\" and shelf_id=\"$shelf_id\"  "  ) ;
    		$count=mysqli_num_rows($q1) ;

			
			$q2 = mysqli_query($db->link,  "SELECT shelf_cap FROM   sms_bookcases  WHERE  user_email=\"'".$_SESSION['usr_name']."'\" and bookcase=\"$bookcase\" "  );
			$row = mysqli_fetch_assoc($q2) ;
			$limit=$row['shelf_cap'];
			
			if($count>=$limit){
				echo '<script language="javascript">';
				echo 'alert("This Shelf is full! Try other Shelfs.")';
				echo '</script>';
			}  //end of checking if the shelf is full
			else{

					$sql2 = "INSERT INTO sms_books  (user_email,bookcase, shelf_id, title,author,gener,isbn,price)VALUES ('".$_SESSION['usr_name']."','$bookcase', '$shelf_id', '$title','$author','$gener', '$isbn', '$price') ";

					if (mysqli_query($db->link, $sql2)) {echo "New record created successfully";} 
					else {echo "Error: " . $sql2 . "<br>" . mysqli_error($db->link);}
			
			}
	}else{echo 'POST';}
}else {echo 'ISSET';}
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
                    Add Book
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
                                <h3 class="box-title">Add Books to Your BookCase Form</h3>
                            </div>
                            <div id="result"> </div>
                            <!-- /.box-header -->
                            <!-- form start -->

                            <div class="title_box">
                                <div id="title"><b>Add Books to Your BookCase <b></div>
                        <div id="content">
						
						<!-- Form for Adding Bookcases -->
						
						  <form method="post"  action="">
									<table width="70%" border="1" cellpadding="1" cellspacing="1" class="test">
									  <tr>
										<td>Select Book Case</td>
									  </tr>
									  
									  <tr>
										<td>
										 <select  name="D1" style="width: 142px"  >
										 <?php
											//Dynamically filling the combo box  with Bookcases
											$result = mysqli_query($db->link,  "SELECT * FROM   sms_bookcases  WHERE  user_email = '".$_SESSION['usr_name']."' " );
											if ($result  && mysqli_num_rows($result) ) {
												while ($row = mysqli_fetch_assoc($result)) {
													$b= $row["bookcase"];
													$c= $row["shelf_count"];
													for($i=1;$i<=$c;$i++){
														echo " <option value=\"$b-$i\">$b , Shelf $i </option> ";
													}
												}
										}
										?>
										</select> 
										</td>
										
										<td><input name="D2" value="Title" onfocus="if (this.value == 'Title') this.value=''"/></td>
										<td><input name="D3" value="Author" onfocus="if (this.value == 'Author') this.value=''"/></td>
									  </tr>

									  <tr>
										<td><input name="D4" value="Genre" onfocus="if (this.value == 'Genre') this.value=''"/></td>
										<td><input name="D5" value="ISBN" onfocus="if (this.value == 'ISBN') this.value=''"/></td>
										<td><input name="D6" value="Last Price" onfocus="if (this.value == 'Last Price') this.value=''"/></td>
									  </tr>
									  <tr>
									  <td><input type="submit" value="Add" style="width:142px; margin-top: 10px;margin-bottom: 10px;  " name="ADDBOOK" /></td>
									  </tr>
									  
									</table>
									</form>
									
									<!-- Table For the Books -->
									<table class="hovertable"    style="width:570px;">
									<tr><th>Bookcase</th><th>Shelf_ID</th><th> Title  </th><th>Author   </th><th> Gener  </th><th>ISBN   </th><th> Price  </th></tr>

									<?php
									//filling data into the table Books
									$result = mysqli_query($db->link,  "SELECT * FROM   sms_books   WHERE  user_email = '".$_SESSION['usr_name']."' and bookcase NOT LIKE 'heap'  order by bookcase " );

									if (!$result) {
										echo "Could not successfully run query ($sql) from DB: " . mysql_error();
										exit;
									}
									if (!mysqli_num_rows($result)) {
										echo "No rows found.";

									}
									else{
										while ($row = mysqli_fetch_assoc($result)) {
											
										$a= $row["bookcase"];
										$b= $row["shelf_id"];
										$c= $row["title"];
										$d= $row["author"];
										$e= $row["gener"];
										$f= $row["isbn"];
										$g= $row["price"];
											
										echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
										echo "<td>$a</td>";
										echo "<td>$b</td>";
										echo "<td>$c</td>";
										echo "<td>$d</td>";
										echo "<td>$e</td>";
										echo "<td>$f</td>";
										echo "<td>$g</td>";	
										echo "</tr>";

										}
									}
									?>
									</table>



					
				
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
