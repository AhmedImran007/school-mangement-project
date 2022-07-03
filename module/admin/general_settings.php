<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>


<?php 
    $ge_query ="SELECT * FROM sms_ge_setting";
    $ge_up_view =mysqli_query($db->link,$ge_query);
    $row = mysqli_fetch_array($ge_up_view);
    
 ?>
<!-- Date Picker -->
<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../../plugins/image-upload/bootstrap-imageupload.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            General Setting
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
                        <h3 class="box-title">General Setting Form</h3>
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
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
     
                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">School Logo</label>
                                <!-- bootstrap-imageupload. -->
                                <div class="col-sm-9">
                                    <div class="imageupload panel panel-default">
                                        <!--
                                        <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left">Upload Image</h3>
                                        </div>
                                        -->
                                        <div><img src="image/logo/<?php echo $row['logo']; ?>"  width="200px" alt=""/></div>
                                        <div class="file-tab panel-body">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                            <!-- The file is stored here. -->
                                                <input type="file" name="logo" id="logo">
                                            </label>
                                            <button type="button" class="btn btn-default">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

        
                        <input type="hidden" name="pastlogo" id="pastlogo" value="<?php echo $row['logo']; ?>" >
                        <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sc_name">School Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="sc_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sc_name" required="required" type="text" value="<?php echo $row['sch_name']?>">
                        </div>
                      </div>
                       
                       
                        <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="description" required="required" name="description" class="form-control col-md-7 col-xs-12" name="description"><?php echo $row['description']?></textarea>
                        </div>
                      </div>
                       
                       
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="address" required="required" name="address" class="form-control col-md-7 col-xs-12"><?php echo $row['address']?></textarea>
                        </div>
                      </div>
                       
                       
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="telephone" name="telephone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $row['telephone']?>">
                        </div>
                      </div>
                       
                       
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fax">Fax</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fax" name="fax" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $row['fax']?>">
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['email']?>">
                        </div>
                      </div>
                       
                       
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12" value="<?php echo $row['web_url']?>">
                        </div>
                      </div>
                        
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tradeli">Trade License</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tradeli" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tradeli" required="required" type="text" value="<?php echo $row['trade_license']?>">
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="owner_name">Owner Name </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="owner_name" type="text" name="owner_name" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['owner_name']?>">
                        </div>
                      </div>
                        
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tin">TIN Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tin" type="text" name="tin" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['tin_num']?>">
                        </div>
                      </div>
                        
                      
                      <div class="form-group">
                                <label for="es_date" class="col-sm-3 control-label">Establishment Date</label>
                                <div class="col-sm-6" id="es_date">
                                    <div class="input-group date" name="estabdate">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="est_date" name="est_date" data-date-format="yyyy-mm-dd" value="<?php echo $row['establish_date']?>">
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
                            <button type="submit" name="update" id="update" class="btn btn-info pull-right">Update Setting</button>
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
        $('#est_date').datepicker({
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
if(isset($_POST['update'])){
    $sc_name = $_POST['sc_name'];
    $descrip = $_POST['description'];
    $address = $_POST['address'];
    $tele = $_POST['telephone'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $tra_li = $_POST['tradeli'];
    $owne_name = $_POST['owner_name'];
    $tin = $_POST['tin'];
    $es_date = $_POST['est_date'];
	//$pastlogo = $_POST['pastlogo'];

    //$exte=explode(".", $pastlogo);
	$logo = $_FILES['logo']['name'];
	//$extension=end(explode(".", $logo));
	//if($logo=="") {
		//$newlogoname = $_POST['pastlogo'];	
	//}
	//else {
    	//$newphotoname=$dd .".".$extension;
	//}
	if(
	$logo == '' || $sc_name =='' || $descrip == '' || $address =='' || $tele == '' || $fax =='' || $email == '' || $website =='' || $tra_li == '' || $owne_name =='' || $tin == ''|| $es_date ==''
	){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
        echo $msg;
		}else{
// query for insertion
$ge_upda_query = "UPDATE sms_ge_setting
             SET 
             `logo`='$logo',
             `sch_name`='$sc_name',
             `description`='$descrip',
             `address`='$address',
             `telephone`='$tele',
             `fax`='$fax',
             `email`='$email',
             `web_url`='$website',
             `trade_license`='$tra_li',
             `owner_name`='$owne_name',
             `tin_num`='$tin',
             `establish_date`='$es_date'";
			 //echo $st_query;

//query execution

$result_ins=mysqli_query($db->link,$ge_upda_query);
move_uploaded_file(
$_FILES['logo']['tmp_name'], "image/logo/".$logo);

      
}
?>

<?php
}
?>