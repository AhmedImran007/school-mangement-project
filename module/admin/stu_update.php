<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $stu_query ="SELECT * FROM sms_student where id ='$dd'";
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
            Update Student
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
            <section class="col-lg-7 connectedSortable" id="addStudent">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Student Form</h3>
                    </div>
                    <div id="result"></div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="add_student_form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="s_name" name="s_name" value="<?php echo $row['s_name']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-3 control-label">Father's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $row['f_name']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mname" class="col-sm-3 control-label">Mother's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_name" name="m_name" value="<?php echo $row['m_name']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class-select" class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-9" id="class-select">
                                    <select class="form-control" id="addclass" name="addclass">
                                        <option value="01" <?php if($row['class']=='01'){echo "selected"; }?>>Class One</option>
                                        <option value="02" <?php if($row['class']=='02'){echo "selected"; }?>>Class Two</option>
                                        <option value="03" <?php if($row['class']=='03'){echo "selected"; }?>>Class Three</option>
                                        <option value="04" <?php if($row['class']=='04'){echo "selected"; }?>>Class Four</option>
                                        <option value="05" <?php if($row['class']=='05'){echo "selected"; }?>>Class Five</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section-select" class="col-sm-3 control-label">Section</label>
                                <div class="col-sm-9" id="section-section">
                                    <select class="form-control" id="sections" name="sections">
                                        <option value="A" <?php if($row['sections']=='A'){echo "selected"; }?>>A</option>
                                        <option value="B" <?php if($row['sections']=='B'){echo "selected"; }?>>B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roll" class="col-sm-3 control-label">Roll</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="roll" name="roll" value="<?php echo $row['roll']?>">
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label for="birthday" class="col-sm-3 control-label">Birth Date</label>
                                <div class="col-sm-9" id="birthday">
                                    <div class="input-group date" name="b_date" >
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="datepicker" name="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $row['b_date']?>">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9" id="gender">
                                    <select class="form-control" id="s_gender" name="s_gender">
                                        <option value="1" <?php if($row['gender']=='1'){echo "selected"; }?>>Male</option>
                                        <option value="2" <?php if($row['gender']=='2'){echo "selected"; }?>>Female</option>
                                        <option value="3" <?php if($row['gender']=='3'){echo "selected"; }?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['s_address']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="s_phone" name="s_phone" value="<?php echo $row['s_phone']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="s_email" name="s_email" value="<?php echo $row['s_email']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="s_password" name="s_password" value="<?php echo $row['s_password']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-3 control-label">Photo</label>
                                <!-- bootstrap-imageupload. -->
                                <div class="col-sm-9">
                                    <div class="imageupload panel panel-default">
                                        <!--
                                        <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left">Upload Image</h3>
                                        </div>
                                        -->
										<div><img src="image/student/<?php echo $row['photo']; ?>"  width="200px" alt=""/></div>
                                        <div class="file-tab panel-body">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                            <!-- The file is stored here. -->
                                                <input type="file" name="photo" id="photo" >
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
   
   <?php
//insertion
if(isset($_POST['update'])){
    $s_name = $_POST['s_name'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $addclass = $_POST['addclass'];
    $sections = $_POST['sections'];
    $roll = $_POST['roll'];
    $datepicker = $_POST['datepicker'];
    $s_gender = $_POST['s_gender'];
    $address = $_POST['address'];
    $s_email = $_POST['s_email'];
    $s_phone = $_POST['s_phone'];
    $s_password = $_POST['s_password'];
	$pastPhoto = $_POST['pastPhoto'];

    
	$photo = $_FILES['photo']['name'];
	$extension=end(explode(".", $photo));
	if($photo=="") {
		$newphotoname = $_POST['pastPhoto'];	
	}
	else {
    	$newphotoname=$dd .".".$extension;
	}
	if(
	$s_name == '' || $f_name =='' || $m_name == '' || $addclass =='' || $sections == '' || $roll =='' || $datepicker == '' || $s_gender =='' || $address == '' || $s_email =='' || $s_phone == ''|| $s_password ==''
	){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
        echo $msg;
		}else{
// query for insertion
$st_query = "UPDATE sms_student
             SET 
             `s_name`='$s_name',
             `f_name`='$f_name',
             `m_name`='$m_name',
             `class`='$addclass',
             `sections`='$sections',
             `roll`='$roll',
             `b_date`='$datepicker',
             `gender`='$s_gender',
             `s_address`='$address',
             `s_email`='$s_email',
             `s_phone`='$s_phone',
             `s_password`='$s_password',
             `photo`='$newphotoname' where id ='".$dd."'";
			 //echo $st_query;

//query execution

$result_ins=mysqli_query($db->link,$st_query);
move_uploaded_file(
$_FILES['photo']['tmp_name'], "image/student/".$newphotoname);

      
}
?>
<script>
window.location="student_information.php";

</script>
<?php
}
?>

    