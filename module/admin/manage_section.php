<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>

 <script>
        function Deletesec(id) {
            if (confirm("You want to delete this record ?")) {
                window.location.href = "section_delete.php?dd=" + id;
            }
        }

    </script>
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            section
            <small>Manage section</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">section</a></li>
            <li class="active">Manage section</li>
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

                            <h1>section</h1>

                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1default" data-toggle="tab">section List</a></li>
                                        <li><a href="#tab2default" data-toggle="tab">Add section</a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Subject Name</th>
                                                            <th>Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php
    
                                                        $query = "SELECT * FROM sms_cl_section";
                                                         $cal = $db->select($query);
                                                               if($cal){
                                                            
                                                                $i=1;
                                                                while($row = $cal->fetch_assoc()){
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $row['sec_name']; ?>
                                                            </td>
                                                            
                                                            <td>
                                                               <div class="form-group">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action <span class="caret"></span>
                                                </button>
                                                    <ul class="dropdown-menu">
                                                        
                                                        <li>
                                                            <a href="javascript:Deletesec('<?php echo $row['id']; ?>')" >Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                                            </td>
                                                        </tr>
                                                        <?php }
                                                               }
                                                                    ?>
  
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <div class="tab-pane fade" id="tab2default">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="class-name" class="col-sm-3 control-label">section Name</label>

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="sec-name" name="sec-name" placeholder="section Name">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-info pull-right" name="submit" id="submit">Add section</button>
                                                </div>
                                                <!-- /.box-footer -->
                                            </form>
                                        </div>
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
    <strong>Copyright &copy; 2017 <a href="#">Student management system</a>.</strong> All rights reserved.
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
//insertion
if(isset($_POST['submit'])){
    $sec_name = $_POST['sec-name'];

    $s_sel="SELECT * FROM sms_cl_section where sec_name= '$sec_name' ";
    $s_ins=mysqli_query($db->link,$s_sel);
    $count = $s_ins->num_rows;
    
	if($sec_name == ''){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}
    elseif($count>0){
        $msg="<div class='alert alert-danger'><strong>Error ! </strong> Insert Another Number!</div>";
    }
        else{
// query for insertion
$s_query = "insert into sms_cl_section values ('','$sec_name');";


//query execution

$result_ins=mysqli_query($db->link,$s_query);
$inserted= mysqli_insert_id($db->link);

        

       
      
}
?>
    <script>
        window.location = "manage_section.php";

    </script>
    <?php
}
?>
