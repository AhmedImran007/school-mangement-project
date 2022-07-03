<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');


$cur_date = date('Y-m-d');
error_reporting(0);

?>
<script>
$(document).ready(function(){
    $.("form").submit(function(){
        var roll =true;
        $(':radio').each(function(){
            name = $(this).attr('name');
            if(roll && !$(':radio[name="'+name+'"]:checked').length){
              // alert(name + "Roll Missing !");
                $('#alert').show();
                roll = false;
               }
        });
        return roll;
    });
});
</script>

<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Show Class routine
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Show Class routine</li>
        </ol>
    </section>

    <?php include('sidebar.php') ?>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Manage Class routine</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select class="form-control" name="s_cla" id="s_cla">
                                    <?php
										$query = "SELECT class_name FROM sms_classes";
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Section</label>
                                    <select class="form-control" name="sec" id="sec">
                                    
                                    <?php
										$query = "SELECT sec_name FROM sms_cl_section";
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-primary form-control" name="manag" id="manag">Manage</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <div class="well text-center" style="font-size:20px;">
                <strong>Today's Date: </strong>
                <?php  echo $cur_date;?>
            </div>
                            

               

        </div>
        <!-- /.row (main row) -->
        <div class="row text-center">
              <?php
                   if(isset($_POST['manag'])){
                    $s_class = $_POST['s_cla'];
                    $s_section = $_POST['sec'];
                    $query = "SELECT * FROM sms_class_routine WHERE sms_class_name='$s_class' AND sms_sec_name='$s_section' ORDER BY time DESC;";
                $read = mysqli_query($db->link,$query);


                ?>
                
             <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8 col-md-offset-2">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial</th>
                               <th>Class Name</th>
                               <th>subject Name</th>
                               <th>section Name</th>
                               <th>Teacher Name</th>
                               <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                    $i=1;
                                    while($row = mysqli_fetch_array($read)){
                                ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                
                                
                                <td><?php echo $row['class_name']; ?></td>
                                 <td><?php echo $row['subject_name']; ?></td>
                                 <td><?php echo $row['sec_name']; ?></td>
                                 <td><?php echo $row['teacher_name']; ?></td>
                                 <td><?php echo $row['time']; ?></td>

                                
                            </tr>
                            <?php } ?>

                        </tbody>
                        <?php }
                            ?>


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

