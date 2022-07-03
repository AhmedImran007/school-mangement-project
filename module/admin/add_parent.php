<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Add Parent
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
            <section class="col-lg-7 connectedSortable" id="addStudent">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Parent Form</h3>
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
                    <form class="form-horizontal" action="" method="post" id="parent_form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Parent ID</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="parent_id" name="parent_id" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-sm-3 control-label">Father's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Father's Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mname" class="col-sm-3 control-label">Mother's Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_name" name="m_name" placeholder="Mother's Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Father's Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f_phone" name="f_phone" placeholder="Father's Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Mother's Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="m_phone" name="m_phone" placeholder="Mother's Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Father's Profession</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputemail" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="p_email" name="p_email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="p_password" name="p_password" placeholder="Password">
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
                            <a href="parent_information.php" class="btn btn-primary">Back</a>
                            <button type="submit" name="submit" id="submit" class="btn btn-info pull-right" style='margin:0 5px;' >Submit</button>
                            <button type="reset" class="btn btn-danger pull-right" style='margin:0 5px;'>Reset</button>
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


<?php include('inc/footer.php') ?>
<!-------------------------------------         -------------------->

<?php
//insertion
if(isset($_POST['submit'])){
    $parent_id = $_POST['parent_id'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $address = $_POST['address'];
    $profession = $_POST['profession']; 
    $f_phone = $_POST['f_phone'];
    $m_phone = $_POST['m_phone'];
    $p_email = $_POST['p_email'];
    $p_password = $_POST['p_password'];
    
	if($parent_id == '' || $f_name =='' || $m_name == '' || $address == ''|| $profession =='' || $f_phone == ''|| $m_phone =='' || $p_email == ''|| $p_password =='' ){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}else{
// query for insertion
$st_query = "insert into sms_parent values ('','$parent_id','$f_name','$m_name','$address','$profession','$f_phone','$m_phone','$p_email','$p_password');";


//query execution

$result_ins=mysqli_query($db->link,$st_query);
$inserted_id = mysqli_insert_id($db->link);

        

       
      
}
?>
    <script>
        window.location = "parent_information.php";

    </script>
    <?php
}
?>
