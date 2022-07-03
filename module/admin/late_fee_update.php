<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$dd = $_GET['dd'];
?>

<?php 
    $c_query ="SELECT * FROM sms_late_fee where id ='$dd'";
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
            late fee
            <small>Update late fee</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">late fee</a></li>
            <li class="active">Update late fee</li>
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

                            <h1>late fee Update</h1>

                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#" data-toggle="tab">late fee Update List</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="box-body">
                                                    
                                                   
                                                    <div class="form-group">
                                                        <label for="late_fee" class="col-sm-3 control-label">Late Fee</label>
                                                        

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="late_fee" name="late_fee" value="<?php echo $rows['late_fee']; ?>">
                                                        </div>
                                                    </div>
                                                  
													
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-info pull-right" name="update" id="update">Update Late fee</button>
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
    $la_fee = $_POST['late_fee'];
    
    
	if($la_fee == '' ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}
    
        else{
// query for insertion
$cls_query = "UPDATE sms_late_fee
             SET 
            late_fee='$la_fee' 
             where id = '$dd'
             ";


//query execution

$result_ins=mysqli_query($db->link,$cls_query);


        

       
      
}
?>
    <script>
        window.location = "manage_late_fee.php";

    </script>
    <?php
}
?>
