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

        <h1>
            Add New Teacher
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
            <section class="col-lg-10 connectedSortable" id="teacher">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Teacher Form</h3>
                    </div>
                    <div id="result">
                        <?php
		      if(isset($msg)){
                    echo $msg;
              }
                        ?>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="add_teacher_form" enctype="multipart/form-data">
                        <div class="box-body">
                           <div class="form-group">
                                <label for="teacher_id" class="col-sm-3 control-label">Teacher ID</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="teacher_id" name="teacher_id" placeholder="teacher_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="t_name" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="t_name" name="t_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qualification" class="col-sm-3 control-label">Educational Qualification</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Educational Qualification">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="responsibility" class="col-sm-3 control-label">Academic Responsibility</label>
                                

                                <div class="col-sm-9" id="type-select">
                                   
                                    <select class="form-control" id="responsibility" name="responsibility">
                                      <?php
										$query = "SELECT subject_name FROM subject";
                                                             $c_read = $db->select($query);
                                                            if($c_read){                                                                                    while($rowss = $c_read->fetch_assoc()) {      

                                                            ?>
                                                                <option value="<?php echo $rowss['subject_name']; ?>"><?php echo $rowss['subject_name']; ?></option>
                                                              <?php 
                                                            }
                                                                       }
										?>
                                       

<!--
                                        <option value="01">Physics</option>
                                        <option value="02">Mathematics</option>
                                                              
-->
                                    </select>
                                    
                                </div>
                                                              
                            </div>
                            <div class="form-group">
                                <label for="f_name" class="col-sm-3 control-label">Father's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Father's Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="m_name" class="col-sm-3 control-label">Mother's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_name" name="m_name" placeholder="Mother's Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="col-sm-3 control-label">Birth Date</label>
                                <div class="col-sm-9" id="birthday">
                                    <div class="input-group date" name="birth_date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right datepicker" id="datepicker_1" name="birth_date" data-date-format="yyyy-mm-dd">
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

                                        <input type="text" class="form-control pull-right datepicker" id="datepicker_2" name="join_date" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            
                            <!-- Date -->
                            <div class="form-group">
                                <label for="type-select" class="col-sm-3 control-label">Teacher Type</label>
                                <div class="col-sm-9" id="type-select">
                                    <select class="form-control" id="teacher_type" name="teacher_type">
                                        <option value="0" selected>-- Select Type --</option>
                                        <option value="01">Full Time</option>
                                        <option value="02">Part Time</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="numeric_code" class="col-sm-3 control-label">Numeric Code</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numeric_code" name="numeric_code" placeholder="numeric_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9" id="gender">
                                    <select class="form-control" id="t_gender" name="t_gender">
                                        <option value="0" selected>-- Select Type --</option>
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
                                    <input type="text" class="form-control" id="t_phone" name="t_phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="t_email" name="t_email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="t_password" name="t_password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-3 control-label">Photo</label>
                                <!-- bootstrap-imageupload. -->
                                <div class="col-sm-9">
                                    <div class="imageupload panel panel-default">
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
                            <button type="submit" name="submit" id="submit" class="btn btn-info pull-right">Submit</button>
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
if(isset($_POST['submit'])){
    $teacher_id = $_POST['teacher_id'];
    $t_name = $_POST['t_name'];
    $qualification = $_POST['qualification'];
    $responsibility = $_POST['responsibility'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $birth_date = $_POST['birth_date'];
    $join_date = $_POST['join_date'];
    $teacher_type = $_POST['teacher_type'];
    $numeric_code = $_POST['numeric_code'];
    $t_gender = $_POST['t_gender'];
    $address = $_POST['address'];
    $t_phone = $_POST['t_phone'];
    $t_email = $_POST['t_email'];
    $t_password = $_POST['t_password'];
	
	$photo = $_FILES['photo']['name'];
    $extension=end(explode(".", $photo));
	
	if($teacher_id == '' || $t_name =='' || $qualification =='' || $responsibility =='' || $f_name =='' || $m_name == '' || $birth_date =='' || $join_date == ''|| $teacher_type =='' || $numeric_code ==''|| $t_gender =='' || $address == ''|| $t_phone =='' || $t_email == ''|| $t_password ==''|| $photo =='' ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
        
		}else{
// query for insertion
$st_query = "insert into sms_teacher values ('','$teacher_id', '$t_name','$qualification','$responsibility', '$f_name','$m_name', '$birth_date', '$join_date', '$teacher_type', '$numeric_code', '$t_gender', '$address', '$t_phone', '$t_email', '$t_password', '');";



//query execution

$result_ins=mysqli_query($db->link,$st_query);
$inserted_id = mysqli_insert_id($db->link);
move_uploaded_file(
$_FILES['photo']['tmp_name'], "image/teacher/".$inserted_id.".".$extension);
        
        $newphotoname=$inserted_id.".".$extension;
        $photo_query = "UPDATE teacher
             SET 
             photo ='$newphotoname' where id ='".$inserted_id."'";
        $result_photo=mysqli_query($db->link,$photo_query);
        
   echo $st_query;
	echo $result_photo;

     
}
?>
    <script>
        window.location = "teacher_information.php";

    </script>
    <?php
}
?>
