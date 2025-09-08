<?php require_once('../Connections/db_connect.php'); ?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$username =  htmlspecialchars($_SESSION["username"]);
?>
<?php
		   if(isset($_POST['project_c'])){
				$owner = $_POST['owner'];
				$project_name = $_POST['project_name'];
				$client_name = $_POST['client_name'];
				$client_address = $_POST['client_address'];
				$country_code = $_POST['country_code'];
				$contact = $_POST['contact'];
				$client_city = $_POST['client_city'];
				$email = $_POST['email'];
				$country = $_POST['country'];
				$scope = $_POST['scope'];
				$design_architect = $_POST['design_architect'];
				$method = $_POST['method']; 
				
			 	$sql1 = "INSERT INTO individual_project(owner, project_name, client_name, client_address, country_code, contact, client_city, email, country, scope, design_architect, method) VALUES ('$owner', '$project_name', '$client_name', '$client_address', '$country_code', '$contact', '$client_city', '$email', '$country', '$scope', '$design_architect', '$method')";
				$result1 = mysqli_query($con_global, $sql1);
				
				$sql2 = "INSERT INTO individual_m1_roles(owner, new_role, role_description) VALUES ('$owner', 'System', 'System Role')";
				$result2 = mysqli_query($con_global, $sql2);
						
				if(!empty($result1)){
					$msg =  '<div class="alert alert-success alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h5><i class="icon fas fa-check"></i> Alert</h5>
						  Project successfully created. Click <a href="dashboard.php">here</a> to start build
						</div>';	
				}
				else{
					$msg = '<div class="alert alert-danger alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h5><i class="icon fas fa-ban"></i> Alert</h5>
						  Command Failed. Please contact Administrator
						</div>';
				}
		  }
		   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EzyBlu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include('common/top_menu.php'); ?>

  <?php include('common/side_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          
          
          
           <!-- Horizontal Form -->
           <?php
		  echo $msg;
		   ?>
           
          
                
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Please fill the form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="create_project.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Created By : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" readonly="readonly" value="<?php echo $full_name; ?>">
                      <input type="hidden" name="owner" value="<?php echo $username; ?>" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Project Name : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control is-invalid" required="required" name="project_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Client Name : </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control is-invalid" required="required" name="client_name">
                    </div>
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Client Address : </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control is-invalid" required="required" name="client_address">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Client Contact No : </label>
                    <div class="col-sm-1">
                      <?php include('../common/country_code.php');?>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control is-invalid" required="required" name="contact">
                    </div>
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Client City : </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control is-invalid" required="required" name="client_city">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Email : </label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control is-invalid" required="required" name="email">
                    </div>
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Client Country : </label>
                    <div class="col-sm-4">
                      <?php include('../common/country.php');?>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Project Description & Scope : </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="scope"></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Design Architect : </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="required" name="design_architect" value="<?php echo $full_name; ?>" readonly="readonly">
                    </div>
                    <label class="col-sm-2 col-form-label" style="text-align:right;">Building Method : </label>
                    <div class="col-sm-4">
                      		<select class="form-control" required="required" name="method">
                            	<option value="1">Core Process + Activities Only</option>
                                <option value="2">Core Process + Sub-Process + Activities</option>
                                <option value="3">Core Process + Sub-Process + Sub Sub Process + Activities</option>
                            </select>
                    </div>
                  </div>
                  
               
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-info" value="Create Now" name="project_c">
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          
          
          
        </div>	
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.6 Pre
    </div>
    <strong>Copyright &copy; 2021 <a href="https://ezyblu.com">EzyBlu</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'You do not have permission to create multiple projects'
      })
    });
    
  });
</script>
</body>
</html>
