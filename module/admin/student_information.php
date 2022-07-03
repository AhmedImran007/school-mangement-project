<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>

<?php
$query = "SELECT * FROM sms_student";
$read = $db->select($query);
?>
    <script>
        function DeleteStudent(id) {
            if (confirm("You want to delete this record ?")) {
                window.location.href = "st_delete.php?dd=" + id;
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
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>
        <?php include('sidebar.php') ?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Student Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php 
                         $db = new Database();
                         $query = "SELECT * FROM add_student";
                         $read = $db->select($query);
                        ?>

                            <?php 
                        if(isset($_GET['msg'])){
                         echo "<span style='color:green'>".$_GET['msg']."</span>";
                        }
                        ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:10%">Serial</th>
                                        <th style="width:10%">Photo</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody style="v-align:center">
                                    <?php if($read){?>
                                    <?php 
                                    $i=1;
                                    while($row = $read->fetch_assoc()){
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $i++ ?>
                                        </td>
                                        <td>
                                            <!--<img src="img/students.jpg" alt="">-->
                                            <img class="img-responsive img-circle" style="float: left;width: 35px;height: 35px;border-radius: 50%;margin-right: 10px;margin-top: -2px;" src="<?php echo 'image/student/'.$row['photo'] ?>" alt="User profile picture">
                                        </td>
                                        <td>
                                            <?php echo $row['s_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['s_address']; ?>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action <span class="caret"></span>
                                                </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="student_profile.php?id=<?php echo $row['id']?>">Profile</a></li>
                                                        <li><a href="#">MarkSheet</a></li>
                                                        <li><a href="stu_update.php?dd=<?php echo $row['id']?>">Edit</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li>
                                                            <a href="javascript:DeleteStudent('<?php echo $row['id']; ?>')" >Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                                                <?php } ?>
                                <?php } else { ?>
                                <p>Data is not available !!</p>
                                <?php } ?>
                                
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
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->
  <footer class="main-footer ">
    <div class="pull-right hidden-xs ">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="# ">School Management System</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js "></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js "></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js "></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js "></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js "></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js "></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js "></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js "></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1 ").DataTable();
        $('#example2').DataTable({
            "paging ": true,
            "lengthChange ": false,
            "searching ": false,
            "ordering ": true,
            "info ": true,
            "autoWidth ": false
        });
    });

</script>
</body>

</html>
