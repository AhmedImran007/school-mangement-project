<?php 
session_start();
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/database.php');
	$db  = new Database();
include('inc/header.php') ?>

 <script>
        function Deletebooklist(id) {
            if (confirm("You want to delete this record ?")) {
                window.location.href = "book_list_delete.php?dd=" + id;
            }
        }

    </script>
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Library
            <small>Manage Library</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Library</a></li>
            <li class="active">Manage Library</li>
        </ol>
    </section>
    <?php include('sidebar.php') ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">

                            <h1>Library</h1>

                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Book List</a></li>
                                        <li><a href="#tab2default" data-toggle="tab">Add Book</a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Book Name</th>
                                                            <th>Author</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Class</th>
                                                            <th>Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php
    
                                                        $query = "SELECT * FROM sms_book_list";
                                                         $cal = $db->select($query);
                                                               if($cal){
                                                            
                                                                $i=1;
                                                                while($row = $cal->fetch_assoc()){
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $row['book_name']; ?>
                                                            </td>
                                                            <td><?php echo $row['author']; ?></td>
                                                            <td><?php echo $row['description']; ?></td>
                                                            <td><?php echo $row['price']; ?></td>
                                                            <td><?php echo $row['class_name']; ?></td>
                                                            <td>
                                                               <div class="form-group">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action <span class="caret"></span>
                                                </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="book_list_update.php?dd=<?php echo $row['id']?>">Edit</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li>
                                                            <a href="javascript:Deletebooklist('<?php echo $row['id']; ?>')" >Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                                            </td>
                                                        </tr>
                                                        <?php }
                                                               }
                                                                    ?>
  
                                                    </tbody>
                                                    <tfoot>
                                                         <tr>
                                                            <th>Serial</th>
                                                            <th>Book Name</th>
                                                            <th>Author</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Class</th>
                                                            <th>Options</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <div class="tab-pane fade" id="tab2default">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="book-name" class="col-sm-3 control-label">Book Name</label>

                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="book-name" name="book-name" placeholder="Book Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="auth" class="col-sm-3 control-label">Author Name</label>
                                                        <div class="col-sm-9" id="au-select">
                                    <select class="form-control" id="auth" name="auth">
                                       <?php
										$query = "SELECT author_name FROM sms_books_author";
                                                             $c_read = $db->select($query);
                                                            if($c_read){                                                                                    while($rows = $c_read->fetch_assoc()) {      

                                                            ?>
                                                                <option value="<?php echo $rows['author_name']; ?>"><?php echo $rows['author_name']; ?></option>
                                                              <?php 
                                                            }
                                                                       }
										?>

                                    </select>
                                </div>

                                                        
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="descrip" class="col-sm-3 control-label">Description</label>
 
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Book's Description">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                    <label for="price" class="col-sm-3 control-label">Price</label>
 
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="price" name="price" placeholder="Price...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="class-name" class="col-sm-3 control-label">Class Name</label>
                                                        <div class="col-sm-9" id="exam-select">
                                    <select class="form-control" id="class-name" name="class-name">
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

                                    </select>
                                </div>

                                                        
                                                    </div>  
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-info pull-right" name="submit" id="submit">Add Book</button>
                                                </div>
                                                <!-- /.box-footer -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </h3>
                        <hr>
                    </div>


                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

</script>
</body>

</html>
<?php
//insertion
if(isset($_POST['submit'])){
    $bo_name = $_POST['book-name'];
    $aut = $_POST['auth'];
    $desc = $_POST['descrip'];
    $pric = $_POST['price'];
    $cla_name = $_POST['class-name'];
    
    $c_sel="SELECT * FROM sms_book_list where author= '$aut' or class_name= '$cla_name' ";
    $c_ins=mysqli_query($db->link,$c_sel);
    $count = $c_ins->num_rows;
    
	if($bo_name == '' || $aut =='' || $desc == ''|| $pric == ''|| $cla_name == ''){
		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty !</div>";
		}
    elseif($count>0){
        $msg="<div class='alert alert-danger'><strong>Error ! </strong> Insert Another Number!</div>";
    }
        else{
// query for insertion
$bo_query = "insert into sms_book_list values ('','$bo_name','$aut','$desc','$pric','$cla_name');";


//query execution

$result_ins=mysqli_query($db->link,$bo_query);
$inserted= mysqli_insert_id($db->link);

        

       
      
}
?>
    <script>
        window.location = "manage_library.php";

    </script>
    <?php
}
?>
