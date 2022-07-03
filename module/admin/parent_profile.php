<?php 
session_start();
include('inc/header.php') ?>
<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
?>

<?php
    if(isset($_GET['id'])){
        $singleID = $_GET['id'];
    }
$query = "SELECT * FROM sms_parent WHERE id=".$singleID."";
$read = $db->select($query);
?>


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
                                                    <div class="row">
                                                        <div class="col-sm-4" style="background-color:lavender;"></div>
                                                        <div class="col-sm-8" style="background-color:lavenderblush;"></div>
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
                <div class="col-md-12">


                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Parent Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                                <?php if($read){?>
                                <?php 
                                    $row = $read->fetch_assoc();
                                ?>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $row['parent_id']; ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="Photo not found" src="<?php echo 'image/parent/'.$row['photo'] ?>" class="img-circle img-responsive"
                                        style="width:230px; height:230px;"> </div>

                                        <div class=" col-md-9 col-lg-9 ">
                                            <table class="table table-user-information table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Parent ID:</th>
                                                        <td><?php echo $row['parent_id']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Father's Name</th>
                                                        <td><?php echo $row['f_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother's Name</th>
                                                        <td><?php echo $row['m_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td><?php echo $row['address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Father's Profession</th>
                                                        <td><?php echo $row['profession']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Father's Phone</th>
                                                        <td><?php echo $row['f_phone']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother's Phone</th>
                                                        <td><?php echo $row['m_phone']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><a href="mailto:<?php echo $row['p_email']; ?>"><?php echo $row['p_email']; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Password</th>
                                                        <td><?php echo $row['p_password']; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                    <span class="pull-right">
                            <a href="parent_update.php?dd=<?php echo $row['id']?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                                </div>

                            </div>


                                <?php } else { ?>
                                <p>Data is not available !!</p>
                                <?php } ?>

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

    <?php include('inc/footer.php') ?>
