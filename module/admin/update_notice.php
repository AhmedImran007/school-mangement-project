<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php');
$cur_date = date('Y-m-d');
?>

<?php


if(isset($_POST['update']))
{
    $sub= $_POST['sub'];
    $details= $_POST['details'];
    $user= $_POST['user'];
    
foreach($user as $v)
		{
            $query = "update sms_notice set subject='$sub',Description='$details',user='$v' where notice_id='".$_GET['id']."'";
            $update_note= mysqli_query($db->link,$query);
		}
		
		$err="<font color='green'>Notice updated Successfully</font>";	
	
}


//select old notice 
$notice_query="select * from sms_notice where notice_id='".$_GET['id']."'";
$q=mysqli_query($db->link,$notice_query);
$res=mysqli_fetch_array($q);
?>

<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        <h1>
            Update Notice
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
                        <h3 class="box-title">Update Notice </h3>
                    </div>
                    <div id="result"><?php echo @$err;?></div>
                     <div class="well text-center" style="font-size:20px;">
                <strong>Today's Date: </strong>
                <?php  echo $cur_date;?>
            </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" id="add_notice_form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Subject</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="sub" name="sub" value="<?php echo $res['subject']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-9">
                                    <textarea class="form-control" id="details" name="details"><?php echo $res['Description']; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="class-select" class="col-sm-3 control-label">Select User</label>
                                <div class="col-sm-9" id="class-select">
                                    <select class="form-control" id="user[]" name="user[]">
                                       <?php 
                                        $n_user= "select name,email from sms_users";
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
                            <button type="submit" name="update" id="update" class="btn btn-info pull-right"> Update</button>
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
   
   
    