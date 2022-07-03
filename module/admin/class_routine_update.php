<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $c_query ="SELECT * FROM sms_class_routine where id ='$dd'";
    $c_up_view =mysqli_query($db->link,$c_query);
    $ros = mysqli_fetch_array($c_up_view);
    
 ?>
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Class Routine
            <small>Update Class Routine</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Class Routine</a></li>
            <li class="active">Update Class Routine</li>
        </ol>
    </section>
    <?php include('sidebar.php') ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">

                            <h1>Class Routine Update</h1>

                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#" data-toggle="tab">Class Routine Update List</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="class-name" class="col-sm-3 control-label">Class Routine Name</label>

                                                       <div class="col-sm-9" id="routine-select">
                                    <select class="form-control" id="class-name" name="class-name">
                                       <?php
										$query = "SELECT class_name FROM classes";
                                                             $c_read = $db->select($query);
                                                            if($c_read){                                                                                    while($row = $c_read->fetch_assoc()) {      

                                                            ?>
                                                                <option value="<?php echo $row['class_name']; ?>"><?php echo $row['class_name']; ?></option>
                                                              <?php 
                                                            }
                                                                       }
										?>

                                    </select>
                                </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subject-name" class="col-sm-3 control-label">Subject Name</label>
                                                        <div class="col-sm-9" id="subject-select">
                                    <select class="form-control" id="subject-name" name="subject-name">
                                       <?php
										$query = "SELECT subject_name FROM subject";
                                                             $c_read = $db->select($query);
                                                            if($c_read){                                                                                    while($rows = $c_read->fetch_assoc()) {      

                                                            ?>
                                                                <option value="<?php echo $rows['subject_name']; ?>"><?php echo $rows['subject_name']; ?></option>
                                                              <?php 
                                                            }
                                                                       }
										?>

                                    </select>
                                </div>

                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sec-name" class="col-sm-3 control-label">section Name</label>
                                                        <div class="col-sm-9" id="sec-select">
                                    <select class="form-control" name="sec-name" id="sec-name">
                                    
                                    <?php
										$query = "SELECT sec_name FROM cl_section";
                                                             $c_read = $db->select($query);
                                                            if($c_read){                                                                                    while($row = $c_read->fetch_assoc()) {      

                                                            ?>
                                                                <option value="<?php echo $row['sec_name']; ?>"><?php echo $row['sec_name']; ?></option>
                                                              <?php 
                                                            }
                                                                       }
										?>

                                </select>
                                </div>

                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="teacher-name" class="col-sm-3 control-label">Teacher Name</label>
                                                        <div class="col-sm-9" id="teacher-select">
                                    <select class="form-control" id="teacher-name" name="teacher-name">
                                       <?php
										$query = "SELECT t_name FROM teacher";
                                                             $c_read = $db->select($query);
                                                            if($c_read){                                                                                    while($ro = $c_read->fetch_assoc()) {      

                                                            ?>
                                                                <option value="<?php echo $ro['t_name']; ?>"><?php echo $ro['t_name']; ?></option>
                                                              <?php 
                                                            }
                                                                       }
										?>

                                    </select>
                                </div>

                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="class_time" class="col-sm-3 control-label">Class time</label>
                                                        

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="class_time" name="class_time" value="<?php echo $ros['time']; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                  
													
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-info pull-right" name="update" id="update">Update Exam fee</button>
                                                </div>
                                                <!-- /.box-footer -->
                                            </form>
                                        
                                    </div>
                                </div>
                            </div>


                        </h3>
                        <hr>
                    </div>


                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="ahmedimran.net">School Management System</a>.</strong> All rights reserved.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

</script>
</body>

</html>
<?php 
if(isset($_POST['update'])){
     $cl_name = $_POST['class-name'];
    $su_name = $_POST['subject-name'];
    $t_name = $_POST['teacher-name'];
	$sec_name = $_POST['sec-name'];
	$cl_time = $_POST['class_time'];
 
    
    
	if($cl_name == '' || $su_name ==''|| $t_name ==''|| $sec_name ==''){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}
    
        else{
// query for insertion
$cls_query = "UPDATE sms_class_routine
             SET 
            class_name ='$cl_name',
            subject_name ='$su_name' ,
			sec_name = '$sec_name',
            teacher_name ='$t_name', 
			time ='$cl_time'
             where id = '$dd'
             ";


//query execution

$result_ins=mysqli_query($db->link,$cls_query);


        

       
      
}
?>
    <script>
        window.location = "manage_class_routine.php";

    </script>
    <?php
}
?>
