<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>



<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <?php
		if(isset($error)){
			echo "<span style='color:red'>".$error."</span>";
			}
		?>
        <h1>
            Add Student
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
            <section class="col-lg-7 connectedSortable" id="addStudent">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Admit Student Form</h3>
                    </div>
                    <div id="result"></div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="add_student_form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-3 control-label">Father's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Father's Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mname" class="col-sm-3 control-label">Mother's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_name" name="m_name" placeholder="Mother's Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class-select" class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-9" id="class-select">
                                    <select class="form-control" id="addclass" name="addclass">
                                        <option value="Class One">Class One</option>
                                        <option value="Class Two">Class Two</option>
                                        <option value="Class Three">Class Three</option>
                                        <option value="Class Four">Class Four</option>
                                        <option value="Class Five">Class Five</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section-select" class="col-sm-3 control-label">Section</label>
                                <div class="col-sm-9" id="section-section">
                                    <select class="form-control" id="sections" name="sections">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roll" class="col-sm-3 control-label">Roll</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll">
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label for="birthday" class="col-sm-3 control-label">Birth Date</label>
                                <div class="col-sm-9" id="birthday">
                                    <div class="input-group date" name="b_date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="datepicker" name="datepicker" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9" id="gender">
                                    <select class="form-control" id="s_gender" name="s_gender">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="s_phone" name="s_phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="s_email" name="s_email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="s_password" name="s_password" placeholder="Password">
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
                            <button type="submit" name="submit" id="submit" class="btn btn-info pull-right">Add Student</button>
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
if(isset($_POST['submit'])){
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
	
	$photo = $_FILES['photo']['name'];
move_uploaded_file(
$_FILES['photo']
['tmp_name'],"image/".$_FILES['photo']['name']);
	
	
// query for insertion
$query = "insert into sms_student values ('','$s_name','$f_name','$m_name','$addclass','$sections','$roll','$datepicker','$s_gender','$address','$s_email','$s_phone','$s_password','$photo');";

//query execution

$result_ins=mysqli_query($db->link,$query);

?>
<script>
window.location="add_student.php";

</script>
<?php
}
?>

    