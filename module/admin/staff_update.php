<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $stu_query ="SELECT * FROM sms_staff where id ='$dd'";
    $stu_up_view =mysqli_query($db->link,$stu_query);
    $row = mysqli_fetch_array($stu_up_view);
    
 ?>
 


<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        <h1>
            Update staff
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
            <section class="col-lg-10 connectedSortable" id="addstaff">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update staff Form</h3>
                    </div>
                    <div id="result"></div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="add_staff_form" enctype="multipart/form-data">
                        <div class="box-body">
                           <div class="form-group">
                                <label for="staff_id" class="col-sm-3 control-label">staff ID</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="staff_id" name="staff_id" value="<?php echo $row['staff_id']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="t_name" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="st_name" name="st_name" value="<?php echo $row['st_name']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qualification" class="col-sm-3 control-label">Educational Qualification</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="responsibility" class="col-sm-3 control-label">Academic Responsibility</label>

                                <div class="col-sm-9" id="type-select">
                                    <select class="form-control" id="responsibility" name="responsibility">
                                        <option value="0" selected>-- Select Type --</option>
                                        <option value="01" <?php if($row['responsibility']=='1'){echo "selected"; }?>>Accountant</option>
                                        <option value="02" <?php if($row['responsibility']=='2'){echo "selected"; }?>>Librarian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="f_name" class="col-sm-3 control-label">Father's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $row['f_name']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="m_name" class="col-sm-3 control-label">Mother's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_name" name="m_name" value="<?php echo $row['m_name']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="col-sm-3 control-label">Birth Date</label>
                                <div class="col-sm-9" id="birthday">
                                    <div class="input-group date" name="birth_date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right datepicker" id="datepicker_1" name="birth_date" data-date-format="yyyy-mm-dd" value="<?php echo $row['birth_date']?>">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Joining Date</label>
                                <div class="col-sm-9" id="birthday">
                                    <div class="input-group date" name="join_date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right datepicker" id="datepicker_2" name="join_date" data-date-format="yyyy-mm-dd" value="<?php echo $row['join_date']?>">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            
                            <!-- Date -->
                            <div class="form-group">
                                <label for="type-select" class="col-sm-3 control-label">staff Type</label>
                                <div class="col-sm-9" id="type-select">
                                    <select class="form-control" id="staff_type" name="staff_type">
                                        <option value="0" selected>-- Select Type --</option>
                                        <option value="01" <?php if($row['staff_type']=='1'){echo "selected"; }?>>Full Time</option>
                                        <option value="02" <?php if($row['staff_type']=='2'){echo "selected"; }?>>Part Time</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="numeric_code" class="col-sm-3 control-label">Numeric Code</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numeric_code" name="numeric_code" value="<?php echo $row['numeric_code']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9" id="gender">
                                    <select class="form-control" id="st_gender" name="st_gender">
                                        <option value="0" selected>-- Select Type --</option>
                                        <option value="1" <?php if($row['st_gender']=='1'){echo "selected"; }?>>Male</option>
                                        <option value="2" <?php if($row['st_gender']=='2'){echo "selected"; }?>>Female</option>
                                        <option value="3" <?php if($row['st_gender']=='3'){echo "selected"; }?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="st_phone" name="st_phone" value="<?php echo $row['st_phone']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="st_email" name="st_email" value="<?php echo $row['st_email']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="st_password" name="st_password" value="<?php echo $row['st_password']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-3 control-label">Photo</label>
                                <!-- bootstrap-imageupload. -->
                                <div class="col-sm-9">
                                    <div class="imageupload panel panel-default">
                                       <div><img src="image/staff/<?php echo $row['photo']; ?>"  width="200px" alt=""/></div>
                                        <div class="file-tab panel-body">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                            <!-- The file is stored here. -->
                                                <input type="file" name="photo" id="photo">
                                            </label>
                                            <button type="button" class="btn btn-default">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="pastPhoto" id="pastPhoto" value="<?php echo $row['photo']; ?>" >
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
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" name="update" id="update" class="btn btn-info pull-right">Update</button>
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

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- Page script -->
<script>
    $(function() {
        //Date picker
        $('#datepicker_1,#datepicker_2').datepicker({
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
   
   <?php
//insertion
if(isset($_POST['update'])){
    $staff_id = $_POST['staff_id'];
    $st_name = $_POST['st_name'];
    $qualification = $_POST['qualification'];
    $responsibility = $_POST['responsibility'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $birth_date = $_POST['birth_date'];
    $join_date = $_POST['join_date'];
    $staff_type = $_POST['staff_type'];
    $numeric_code = $_POST['numeric_code'];
    $st_gender = $_POST['st_gender'];
    $address = $_POST['address'];
    $st_phone = $_POST['st_phone'];
    $st_email = $_POST['st_email'];
    $st_password = $_POST['st_password'];
    
    
	$photo = $_FILES['photo']['name'];
	$extension=end(explode(".", $photo));
	if($photo=="") {
		$newphotoname = $_POST['pastPhoto'];	
	}
	else {
    	$newphotoname=$dd .".".$extension;
	}
	
	if($staff_id == '' || $st_name =='' || $qualification=='' || $responsibility=='' || $f_name =='' || $m_name == '' || $birth_date =='' || $join_date == ''|| $staff_type =='' || $numeric_code == ''|| $st_gender =='' || $address == ''|| $st_phone =='' || $st_email == ''|| $st_password ==''
      ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
        echo $msg;
		}else{
// query for insertion
$st_query = "UPDATE sms_staff
             SET 
             `staff_id`='$staff_id',
             `st_name`='$st_name',
             `qualification`='$qualification',
             `responsibility`='$responsibility',
             `f_name`='$f_name',
             `m_name`='$m_name',
             `birth_date`='$birth_date',
             `join_date`='$join_date',
             `staff_type`='$staff_type',
             `numeric_code`='$numeric_code',
             `st_gender`='$st_gender',
             `address`='$address',
             `st_phone`='$st_phone',
             `st_email`='$st_email',
             `st_password`='$st_password',
             `photo`='$newphotoname' where id ='".$dd."'";
			 //echo $st_query;

//query execution

$result_ins=mysqli_query($db->link,$st_query);
move_uploaded_file(
$_FILES['photo']['tmp_name'], "image/staff/".$newphotoname);

      
}
?>
<script>
window.location="staff_information.php";

</script>
<?php
}
?>

    