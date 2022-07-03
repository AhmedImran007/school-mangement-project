<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');


$dt = $_GET['dt'];
//error_reporting(0);

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
            Daily Attendance
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
            <section class="col-lg-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Attendance Update</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    

                </div>


            </section>
            <!-- /.Left col -->
               <div class="row text-center">
           
            <a href="st_date_view.php"><button type="button" class="btn btn-success"> Back </button></a>
            <a href="daily_attendance.php"><button type="button" class="btn btn-danger">Take Attendance</button></a>
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <div class="well text-center" style="font-size:20px;">
                <strong>Date: </strong>
                <?php  echo $dt;?>
            </div>
                           
                <?php
                    $query = "SELECT sms_student.s_name, sms_stu_attend.* FROM sms_student 
                    INNER JOIN sms_stu_attend ON sms_student.roll=sms_stu_attend.roll and sms_student.class=sms_stu_attend.class
                    WHERE att_time = '$dt'";
                $get_read = mysqli_query($db->link,$query);


                ?>
                <?php
                   if(isset($_POST['update'])){
                        $attend = $_POST['attend'];
                        $class = $_POST['class'];     
                        foreach($attend as $attn_key => $attn_value){
                            if($attn_value == "present"){
                               $up_query = "UPDATE sms_stu_attend
                                            SET attend ='present'
                                            WHERE roll = '".$attn_key."' AND class = '".$class."' AND att_time = '".$dt."'";
                                 $attn_update = mysqli_query($db->link,$up_query);
                            }
                            elseif($attn_value == "absent"){
                                $up_query = "UPDATE sms_stu_attend
                                            SET attend ='absent'
                                            WHERE roll = '".$attn_key."' AND class = '".$class."' AND att_time = '".$dt."'";
                                 $attn_update = mysqli_query($db->link,$up_query);
                                
                            }
                            
                        }
                        if($attn_update){
                                echo "<div class='alert alert-success'><strong>success !</strong> Attendance Data Updated successfully</div>";
                            }
                        else{
                            echo "<div class='alert alert-danger'><strong>Error !</strong> Attendance Data not Updated</div>";
                        }
                       
                   }
                ?>
                <div class='alert alert-danger' style="display:none;" id="alert"><strong>Error !</strong> Student Row Missing !</div>;
                
             <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8 col-md-offset-2">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                    $i=1;
                                    while($row = mysqli_fetch_array($get_read)){
                                ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                  <input type="hidden" name="class" id="class" value="<?php echo $row['class']; ?>">
                                    <?php echo $row['s_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['roll']; ?>
                                </td>


                                <td>
                                    <input type="radio" name="attend[<?php echo $row['roll']; ?>]" value="present" <?php if($row['attend'] == 'present'){
                                    echo "checked";
                                } ?>>P
                                    <input type="radio" name="attend[<?php echo $row['roll']; ?>]" value="absent" <?php if($row['attend'] == 'absent'){
                                    echo "checked";
                                } ?>>A
                                </td>
                            </tr>
                            <?php } ?>



                            <tr>
                                <td>
                                    <input type="submit" class="btn btn-primary" name="update" value="update" id="update">
                                </td>

                            </tr>

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

