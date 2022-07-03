<?php 
session_start();
include('inc/header.php') ?>
<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
?>

    <?php
$id= $_SESSION['usr_id'];
//$query = "SELECT * FROM users WHERE id= $id";
//$getData = $db->select($query)->fetch_assoc();
if(isset($_POST['submit'])){
	$fullname = mysqli_real_escape_string($db->link, $_POST['fullname']);
	$experience = mysqli_real_escape_string($db->link, $_POST['experience']);
	$Skills = mysqli_real_escape_string($db->link, $_POST['Skills']);
	$Location = mysqli_real_escape_string($db->link, $_POST['Location']);
	if($fullname == ''||$experience == '' || $Skills =='' || $Location == ''){
		$error = "Field must not be Empty !!";
		}
		else{
			$query = "INSERT INTO sms_users (fullname,experience,Skills,Location) Values('$fullname','$experience','$Skills','$Location')";
			$create = $db->link->insert($query);
			}
	}
	// update function start


if(isset($_POST['update'])){
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	$fullname = mysqli_real_escape_string($db->link, $_POST['fullname']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$experience = mysqli_real_escape_string($db->link, $_POST['experience']);
	$Skills = mysqli_real_escape_string($db->link, $_POST['Skills']);
	$Location = mysqli_real_escape_string($db->link, $_POST['Location']);
	if($name == '' || $email =='' || $fullname == ''||$experience == '' || $Skills =='' || $Location == ''){
		$error = "Field must not be Empty !!";
		}
		
		else{
			$query = "UPDATE sms_users
			SET
			name = '$name',
			fullname = '$fullname',
			email = '$email',
			experience = '$experience',
			Skills = '$Skills',
			Location = '$Location'
			WHERE id = '$id'
			 ";
			$update = $db->update($query);
			$successmsg = "Successfully Registered! <a href='index.php'>Click here to Login</a>";
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
                <h1 class="col-md-6">
                    User Profile
                </h1>
                                    <div class="col-md-6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addInfo">
                      Add Information
                    </button>

                        <!-- Modal -->
                        <!-- /.col --------------add info------------------------------------------>

                        <div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="addInfoLabel">Add Information</h4>
                                    </div>
                                    <div class="modal-body">


                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="tab-pane">
                                                        <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                                                        <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="inputExperience" placeholder="Experience" name="experience"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills" name="Skills">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills" class="col-sm-2 control-label">Education</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputEducation" placeholder="Education" name="Education">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills" class="col-sm-2 control-label">Location</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputSkills" placeholder="Location" name="Location">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="yimg" class="col-sm-2 control-label">Photo</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" id="yimg">
                                                                    <p class="help-block">Only PNG or JPEG file select</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <div class="checkbox">
                                                                        <label>
                                                      <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.nav-tabs-custom -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" name="submit" id="submit">Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col---------------------------------------------------------end add setting -->
                        <!--------------------setting start------------------->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                      Edit Profile
                    </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div class="box-header with-border modal-title" id="myModalLabel">
                                            <h3 class="box-title">Edit Profile</h3>
                                        </div>
                                    </div>
                                    <div class="modal-body">





                                        <div class="col-md-12">

                                            <div class="box box-primary">

                                                <!-- /.tab-pane -->
                                                <div class="box-body">
                                                    <div class="tab-pane">
                                                        <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                                                        <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputName" value="<?php echo $_SESSION['usr_name'];?>" name="name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $_SESSION['usr_email']; ?>" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="fullname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="inputExperience" placeholder="Experience" name="experience"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills" name="Skills">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills" class="col-sm-2 control-label">Education</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputEducation" placeholder="Education" name="Education">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills" class="col-sm-2 control-label">Location</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="inputSkills" placeholder="Location" name="Location">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="yimg" class="col-sm-2 control-label">Photo</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" id="yimg">
                                                                    <p class="help-block">Only PNG or JPEG file select</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <div class="checkbox">
                                                                        <label>
                                                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->

                                                <!-- /.tab-content -->
                                            </div>
                                            <!-- /.nav-tabs-custom -->
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------setting end-------------------->
                
                <ol class="breadcrumb">
                    <li><a href="dashboard.php" class="btn btn-success"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">User profile</li>
                </ol>
            </section>
            <?php include('sidebar.php') ?>
            <!-- Main content -->
            <section class="content">

                <div class="row" style="margin-top:50px;">
                    <div class="col-md-8">

                        <!-- Profile Image -->
                        <?php if (isset($_SESSION['usr_id'])) { ?>
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/gry.jpg" alt="User profile picture">

                                <h3 class="profile-username text-center">
                                    <?php echo $_SESSION['usr_name']; ?>
                                </h3>

                                <p class="text-muted text-center">Admin</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <?php }?>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                                <p class="text-muted">
                                    B.B.A in Computer Science from the Prime University
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                <p class="text-muted">Mirpur, Dhaka-1216</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Experience</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                </div>
                <!-- /.row -->

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
