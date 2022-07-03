<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $c_query ="SELECT * FROM sms_subject where id ='$dd'";
    $c_up_view =mysqli_query($db->link,$c_query);
    $row = mysqli_fetch_array($c_up_view);
    
 ?>
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subject
            <small>Update Subject</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Subject</a></li>
            <li class="active">Update Subject</li>
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

                            <h1>Subject Update</h1>

                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#" data-toggle="tab">Subject Update List</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="class-name" class="col-sm-3 control-label">Subject Name</label>

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="class-name" name="class-name" value="<?php echo $row['subject_name']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="numeric-code" class="col-sm-3 control-label">Numeric Code</label>

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="cl-numeric-code" name="cl-numeric-code" value="<?php echo $row['su_numeric']; ?>">
                                                        </div>
                                                    </div>
                                                  
													
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-info pull-right" name="update" id="update">Update Subject</button>
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
    $cl_numeric = $_POST['cl-numeric-code'];
    $t_name = $_POST['t_name'];
    
    $c_sel="SELECT * FROM sms_classes where cl_numeric= '$cl_numeric'";
    $c_ins=mysqli_query($db->link,$c_sel);
    $count = $c_ins->num_rows;
    
	if($cl_name == '' || $cl_numeric =='' || $t_name == ''){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}
    elseif($count>1){
        $msg="<div class='alert alert-danger'><strong>Error ! </strong> Insert Another Number!</div>";
    }
        else{
// query for insertion
$cl_query = "UPDATE sms_classes
             SET 
            class_name ='$cl_name',
            cl_numeric='$cl_numeric',
             t_name='$t_name'
             where id = '$dd'
             ";


//query execution

$result_ins=mysqli_query($db->link,$cl_query);
$inserted= mysqli_insert_id($db->link);

        

       
      
}
?>
    <script>
        window.location = "manage_subject.php";

    </script>
    <?php
}
?>
