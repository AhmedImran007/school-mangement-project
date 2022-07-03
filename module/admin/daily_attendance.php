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
                        <h3 class="box-title">Manage Daily Attendance</h3>
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
<!--
                                    <option value="01">Class One</option>
                                        <option value="02">Class Two</option>
                                        <option value="03">Class Three</option>
                                        <option value="04">Class Four</option>
                                        <option value="05">Class Five</option>
-->
                           
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
<!--
                                    <option>A</option>
                                    <option>B</option>
-->
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
                            <?php
                    if(isset($_POST['submit'])){
                        $attend = $_POST['attend'];
						//var_dump($attend);
                        //$attend = array();
                        $s_name = $_POST['s_name'];
                        $class = $_POST['class'];
                        $sections = $_POST['sections'];
                        
                    $attn_query = "SELECT DISTINCT att_time,class,sections FROM sms_stu_attend;";
                $att_read = mysqli_query($db->link,$attn_query);
                        while($result = $att_read->fetch_assoc()){
                            $db_cal = $result['class'];
                            $db_section = $result['sections'];
                            $db_date = $result['att_time'];
                            if($cur_date == $db_date & $db_cal==$class & $db_section==$sections){
                                echo "<div class='alert alert-danger'><strong>Error !</strong> Attendance already taken</div>";
                                return false;
                            }
                        }
                        foreach($attend as $attn_key => $attn_value){
							//echo "<h1>".$attn_key." : ".$attn_value."</h1>";
                            if($attn_value == "present"){
                                $query = "INSERT INTO stu_attend(s_name,roll,class,sections,attend,att_time) VALUES('$s_name','$attn_key','$class','$sections','present',now())";
								//echo $query."\n";
                                
                                $attn_insert = mysqli_query($db->link,$query);
                                
                            }
                            elseif($attn_value == "absent"){
                                $query = "INSERT INTO stu_attend(s_name,roll,class,sections,attend,att_time) VALUES('$s_name','$attn_key','$class','$sections','absent',now())";
								//echo $query."\n";
                                
                                $attn_insert = mysqli_query($db->link,$query);
                                
                            }elseif($attn_value == ""){
                                echo "<div class='alert alert-danger'><strong>Error !</strong> Attendance is not Empty !</div>";
                            }
                            
                        }
                        if($attn_insert){
                                echo "<div class='alert alert-success'><strong>success !</strong> Attendance Data Inserted successfully</div>";
                            }
                        else{
                            echo "<div class='alert alert-danger'><strong>Error !</strong> Attendance Data not inserted</div>";
                        }
                        
                    }
                ?>

               

        </div>
        <!-- /.row (main row) -->
        <div class="row text-center">
           
            <a href="st_date_view.php"><button type="button" class="btn btn-success">View All</button></a>
            <a href="add_student.php"><button type="button" class="btn btn-danger">Add Student</button></a>
              <?php
                   if(isset($_POST['manag'])){
                    $s_class = $_POST['s_cla'];
                    $s_section = $_POST['sec'];
                    $query = "SELECT * FROM sms_student WHERE class='$s_class' AND sections='$s_section';";
                $read = mysqli_query($db->link,$query);


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
                                <th>Photo</th>
                                <th>Roll</th>
                                <th>Attendance</th>
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
                                <td>
                                  <input type="hidden" name="s_name" id="s_name" value="<?php echo $row['s_name']; ?>">
                                  <input type="hidden" name="class" id="class" value="<?php echo $row['class']; ?>">
                                  <input type="hidden" name="sections" id="sections" value="<?php echo $row['sections']; ?>">
                                  
                                    <?php echo $row['s_name']; ?>
                                </td>
                                <td>
                                    <!--<img src="img/students.jpg" alt="">-->
                                    <img class="profile-user-img img-responsive img-circle" src="<?php echo 'image/student/'.$row['photo'] ?>" alt="User profile picture">
                                </td>
                                <td>
                                    <?php echo $row['roll']; ?>
                                </td>


                                <td>
                                    <input type="radio" name="attend[<?php echo $row['roll']; ?>]" value="present">P
                                    <input type="radio" name="attend[<?php echo $row['roll']; ?>]" value="absent">A
                                </td>
                            </tr>
                            <?php } ?>



                            <tr>
                                <td>
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit">
                                </td>

                            </tr>

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

