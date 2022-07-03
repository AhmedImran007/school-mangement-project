<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $stu_query ="SELECT * FROM sms_parent where id ='$dd'";
    $stu_up_view =mysqli_query($db->link,$stu_query);
    $row = mysqli_fetch_array($stu_up_view);
    
 ?>
 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        <h1>
            Update parent
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
     <?php
		if(isset($result_ins)){
        echo "<div class='alert alert-success'><strong>success ! </strong> successfullly Added Data </div>";
    }
		?>

    <?php include('sidebar.php') ?>

    <!-- Main content -->
    
    
    <section class="content">
 
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable" id="addparent">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update parent Form</h3>
                    </div>
                    <div id="result"></div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="parent_form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Parent ID</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="parent_id" name="parent_id" value="<?php echo $row['parent_id']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-3 control-label">Father's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $row['f_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mname" class="col-sm-3 control-label">Mother's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_name" name="m_name" value="<?php echo $row['m_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Father's Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_phone" name="f_phone" value="<?php echo $row['f_phone']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Mother's Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_phone" name="m_phone" value="<?php echo $row['m_phone']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Father's Profession</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $row['profession']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="p_email" name="p_email" value="<?php echo $row['p_email']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="p_password" name="p_password" value="<?php echo $row['p_password']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> All information is correct.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="parent_information.php" class="btn btn-primary">Back</a>
                            <button type="submit" name="update" id="update" class="btn btn-info pull-right" style='margin:0 5px;' >Update</button>
                            <button type="reset" class="btn btn-danger pull-right" style='margin:0 5px;'>Reset</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
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



<?php include('inc/footer.php') ?>
   <!-------------------------------------         -------------------->
   
   <?php
//insertion
if(isset($_POST['update'])){
    $parent_id = $_POST['parent_id'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $address = $_POST['address'];
    $profession = $_POST['profession']; 
    $f_phone = $_POST['f_phone'];
    $m_phone = $_POST['m_phone'];
    $p_email = $_POST['p_email'];
    $p_password = $_POST['p_password'];
    
	if($parent_id == '' || $f_name =='' || $m_name == '' || $address == ''|| $profession =='' || $f_phone == ''|| $m_phone =='' || $p_email == ''|| $p_password =='' ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}else{
// query for insertion
$st_query = "UPDATE sms_parent
             SET 
             `parent_id`='$parent_id',
             `f_name`='$f_name',
             `m_name`='$m_name',
             `address`='$address',
             `profession`='$profession',
             `address`='$address', 
             `f_phone`='$f_phone',
             `m_phone`='$m_phone',
             `p_email`='$p_email',
             `p_password`='$p_password'";
			 //echo $st_query;

//query execution

$result_ins=mysqli_query($db->link,$st_query);


      
}
?>
<script>
window.location="parent_information.php";

</script>
<?php
}
?>

    