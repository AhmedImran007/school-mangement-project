<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>



<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Add Holiday
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
            <section class="col-lg-10 connectedSortable" id="addStudent">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add Holiday Form</h3>
                    </div>
                    <div id="result">
                        <?php
		      if(isset($msg)){
                    echo $msg;
              }
                        ?>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="add_student_form" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Event Name</label>

                                <div class="col-sm-6">
                                    <input type="text" name="event_name"class="form-control"  value="" id="field-1" placeholder="Enter Your Event Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    <textarea style="height: 100px" name="description" class="form-control" id="field-1"   placeholder="Enter Your Description"></textarea>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="s_date" class="col-sm-3 control-label">Start Date</label>
                                <div class="col-sm-6" id="s_date">
                                    <div class="input-group date" name="sdate">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="start_date" name="start_date" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                  
                             <div class="form-group">
                                <label for="e_date" class="col-sm-3 control-label">End Date</label>
                                <div class="col-sm-6" id="e_date">
                                    <div class="input-group date" name="edate">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="end_date" name="end_date" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> All information is correct.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-info pull-right">Add holiday</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>


            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">



            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

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
        $('#start_date').datepicker({
            autoclose: true
        });
        $('#end_date').datepicker({
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
<!-------------------------------------         -------------------->
<?php
//insertion
if(isset($_POST['submit'])){
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
   
    
	if($event_name == '' || $description =='' || $start_date == '' || $end_date == '' ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}else{
// query for insertion
$st_query = "insert into sms_holiday values ('','$event_name','$description','$start_date','$end_date');";


//query execution

$result_ins=mysqli_query($db->link,$st_query);
$inserted_id = mysqli_insert_id($db->link);

        
        // query for insertion
$att_query = "insert into sms_stu_attend (start_date,end_date) values ('$start_date','$end_date');";

//query execution

$result_ins=mysqli_query($db->link,$att_query);
    if($result_ins){
        $msg="<div class='alert alert-success'><strong>success ! </strong> successfullly Added Data </div>";
    }
       
      
}
?>
    <script>
        window.location = "holiday_list.php";

    </script>
    <?php
}
?>

