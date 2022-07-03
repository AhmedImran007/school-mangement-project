<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $c_query ="SELECT * FROM sms_exam_fee where id ='$dd'";
    $c_up_view =mysqli_query($db->link,$c_query);
    $rows = mysqli_fetch_array($c_up_view);
    
 ?>
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Exam fee
            <small>Update Exam fee</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Exam fee</a></li>
            <li class="active">Update Exam fee</li>
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

                            <h1>Exam fee Update</h1>

                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#" data-toggle="tab">Exam fee Update List</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="exam-name" class="col-sm-3 control-label">Exam Fee Name</label>

                                                       <div class="col-sm-9" id="exam-select">
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
                                                        <label for="exam_name" class="col-sm-3 control-label">Exam Name</label>
                                                        

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="exam_name" name="exam_name" value="<?php echo $rows['exam_name']; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exam_fee" class="col-sm-3 control-label">Exam Fee</label>
                                                        

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="exam_fee" name="exam_fee" value="<?php echo $rows['exam_fee']; ?>">
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
     $cls_name = $_POST['class-name'];
    $ex_name = $_POST['exam_name'];
    $ex_fee = $_POST['exam_fee'];
    
    
	if($cls_name == '' || $ex_name ==''||$ex_fee == '' ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}
    
        else{
// query for insertion
$cls_query = "UPDATE sms_exam_fee
             SET 
            class_name ='$cls_name',
            exam_name='$ex_name' ,
            exam_fee='$ex_fee' 
             where id = '$dd'
             ";


//query execution

$result_ins=mysqli_query($db->link,$cls_query);


        

       
      
}
?>
    <script>
        window.location = "manage_exam_fee.php";

    </script>
    <?php
}
?>
