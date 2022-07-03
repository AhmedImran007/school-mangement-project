<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$cur_date = date('Y-m-d');
?>

<?php


if(isset($_POST['submit']))
{
    $sub= $_POST['sub'];
    $details= $_POST['details'];
    $user= $_POST['user'];
    
	if($details=="" || $sub=="" || $user=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
		foreach($user as $v)
		{
            $query = "insert into sms_notice values('','$v','$sub','$details',now())";
            $add_note= mysqli_query($db->link,$query);
		}
		
		$err="<font color='green'>Notice added Successfully</font>";	
	}
}


?>

<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        <h1>
            Create Student Payment
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
            <section class="col-lg-10 connectedSortable" id="addnotice">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Student Payment </h3>
                    </div>
                     <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select class="form-control" name="s_cla" id="s_cla">
                                    <option value="01">Class One</option>
                                        <option value="02">Class Two</option>
                                        <option value="03">Class Three</option>
                                        <option value="04">Class Four</option>
                                        <option value="05">Class Five</option>
                           
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Roll</label>
                                     <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-primary form-control" name="acc" id="acc">Account Manage</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="result"><?php echo @$err;?></div>
                     <div class="well text-center" style="font-size:20px;">
                <strong>Today's Date: </strong>
                <?php  echo $cur_date;?>
            </div>
                    <!-- /.box-header -->
                   
 
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="acc_stu_form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Subject</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="sub" name="sub" placeholder="subject">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-9">
                                    <textarea class="form-control" id="details" name="details" placeholder="Type Notice Description...."></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="class-select" class="col-sm-3 control-label">Select User</label>
                                <div class="col-sm-9" id="class-select">
                                    <select class="form-control" id="user[]" name="user[]">
                                       <?php 
                                        $n_user= "select name,email from users";
                                        $sql=mysqli_query($db->link,$n_user);
                                        while($row=mysqli_fetch_array($sql))
                                        {
                                            echo "<option value='".$row['email']."'>".$row['name']."</option>";
                                        }
                                                ?>
                                    </select>
                                </div>
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
                            <button type="submit" name="submit" id="submit" class="btn btn-info pull-right"> Submit</button>
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
   <!-------------------------------------         -------------------->
   
   
    