<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
if(isset($_SESSION['usr_id'])!="") {

include"inc/header.php" ;

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
		  <?php 
			$query_students = mysqli_query($db->link,"select * from sms_student ")or die(mysqli_error());
			$count_students = mysqli_num_rows($query_students);
					?>
            <div class="inner">
              <h3><?php echo $count_students; ?></h3>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="student_information.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
		  <?php 
			$query_teacher = mysqli_query($db->link,"select * from sms_teacher ")or die(mysqli_error());
			$count_teacher = mysqli_num_rows($query_teacher);
					?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_teacher; ?><sup style="font-size: 20px"></sup></h3>

              <p>Teachers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="teacher_information.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
		  <?php 
			$query_parents = mysqli_query($db->link,"select * from sms_parent ")or die(mysqli_error());
			$count_parents = mysqli_num_rows($query_parents);
					?>
            <div class="inner">
              <h3><?php echo $count_parents; ?></h3>

              <p>Parents</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="parent_information.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
		  <?php 
			$query_staffs = mysqli_query($db->link,"select * from sms_staff ")or die(mysqli_error());
			$count_staffs = mysqli_num_rows($query_staffs);
					?>
            <div class="inner">
              <h3><?php echo $count_staffs; ?></h3>

              <p>Staffs</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="staff_information.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->

          </div>

          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
           
          <!-- /.box-header -->
            
          <!-- /.box -->

          <!-- quick email widget -->
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visitors
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Total
                  <?php

					$counter_name = "counter.txt";
					// Check if a text file exists. If not create one and initialize it to zero.
					if (!file_exists($counter_name)) {
					  $f = fopen($counter_name, "w");
					  fwrite($f,"0");
					  fclose($f);
					}
					// Read the current value of our counter file
					$f = fopen($counter_name,"r");
					$counterVal = fread($f, filesize($counter_name));
					fclose($f);
					// Has visitor been counted in this session?
					// If not, increase counter value by one
					if(!isset($_SESSION['hasVisited'])){
					  $_SESSION['hasVisited']="yes";
					  $counterVal++;
					  $f = fopen($counter_name, "w");
					  fwrite($f, $counterVal);
					  fclose($f); 
					}
					echo $counterVal;
	
					?>
                  Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Exists</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  
  <?php include_once('inc/footer.php') ?>
  <?php } else{
    header("Location: ../../index.php");
}
?>
  
