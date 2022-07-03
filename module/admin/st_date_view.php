<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');


$cur_date = date('Y-m-d');
//error_reporting(0);

?>


<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Attendance Report
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

        <!-- /.row (main row) -->
        <div class="row text-center">
           
            <a href="add_student.php"><button type="button" class="btn btn-success">Add Student</button></a>
            <a href="daily_attendance.php"><button type="button" class="btn btn-danger">Take Attendence</button></a>
              <?php
                    $attn_query = "SELECT DISTINCT att_time,class FROM sms_stu_attend;";
                $att_view= mysqli_query($db->link,$attn_query);


                ?>
             <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8 col-md-offset-2">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Attendance Date</th>
                                <th>class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                    $i=1;
                                    while($row = mysqli_fetch_array($att_view)){
                                ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                  
                                    <?php echo $row['att_time']; ?>
                                </td>
                                <td>
                                    <?php echo $row['class']; ?>
                                </td>


                                <td>
                                    <a class="btn btn-primary" href="stu_view.php?dt=<?php echo $row['att_time']; ?>">View</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>


                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            </form>

        </div>

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
