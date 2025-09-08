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

$pending = 0;
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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>
        </div>
        <div class="card-body">
        	
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Project Name</th>
                      <th>Client Name</th>
                      <th>Contact No.</th>
                      <th colspan="2" align="center"><div style="text-align:center;">Actions</div></th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
					$query_pro = "select * from individual_project where owner = '$username'";
					$result_pro = mysqli_query($con_global, $query_pro);
					
					if(mysqli_num_rows($result_pro)>0){
						while($row_pro = mysqli_fetch_array($result_pro)){		
							$project_id = $row_pro['id'];
							$project_name = $row_pro['project_name'];
							$client_name = $row_pro['client_name'];
							$country_code = $row_pro['country_code'];
							$contact = $row_pro['contact'];
							$method = $row_pro['method'];
							
							if(isset($_POST['from_begin_d'])){
								$token = uniqid(); 
								$projectid = $_POST['project_id']; 
								
								$query_ck = "select username, token_id, project_id from project_details where username = '$username' and project_id = '$projectid'";
								$result_ck = mysqli_query($con_global, $query_ck);
								
								$query_ck_sec = "select * from user_projects where username = '$username' and project_id = '$projectid' and form_id = '0'";
								$result_ck_sec = mysqli_query($con_global, $query_ck_sec);
								
								if(mysqli_num_rows($result_ck)>0){
									while($row_ck = mysqli_fetch_array($result_ck)){		
										$token = $row_ck['token_id'];
										$exist_p1 = true;
									}
								}
								else{
									$sql1 = "INSERT INTO project_details(username, project_id, project_name, project_document_url, form_id, form_name, user_role, user_role_name, token_id) VALUES ('$username', '$projectid', '$project_name', '-', '0', '', '1', 'Project Admin', '$token')";
									$result1 = mysqli_query($con_global, $sql1);
								}
								
								echo $query_ck_sec = "select * from user_projects where username = '$username' and project_id = '$projectid' and form_id = '0'";
								$result_ck_sec = mysqli_query($con_global, $query_ck_sec);
								
								if(mysqli_num_rows($result_ck_sec)>0){
								}
								else{
									$sql2 = "INSERT INTO user_projects(username, project_id, form_id) VALUES ('$username', '$projectid', '0')";
									$result2 = mysqli_query($con_global, $sql2);	
								}
								echo '<script>
									setTimeout(function () {
                    window.location.href= \'http://137.184.41.180:82/login/'.$username.'/'.$token.'\';
									},1000);
									</script>';
							
							}
							else{
							echo '<tr>
									  <td>'.$project_id.'</td>
									  <td>'.$project_name.'</td>
									  <td>'.$client_name.'</td>
									  <td>'.$country_code.' '.$contact.'</td>
									  <td><form action="dashboard.php" method="post" name="direct"><input type="hidden" name="project_id" value="'.$project_id.'"><input type="submit" class="btn btn-success btn-sm" value="UI Design" name="from_begin_d"></form></td>';
									  if($username == 'design_user@gmail.com' or $username == 'province_education@ezyblu.com'){}
									  elseif($username == 'pase_client@pase.com'){
										  echo '<script>
													setTimeout(function () {
									window.location.href= \'http://137.184.41.180/EzyBluFinal/individual/viewonly.php\';
													},1000);
													</script>';
										  }
									  else{
										  if($method == '1'){	echo '<td align="right"><form action="build_act.php" method="post"><input type="hidden" value="'.$project_id.'" name="project_id"><input type="submit" class="btn btn-success btn-sm" value="Process Design" name="from_begin"></form></td>';}
										  elseif($method == '2'){	echo '<td align="right"><form action="build_sub.php" method="post"><input type="hidden" value="'.$project_id.'" name="project_id"><input type="submit" class="btn btn-success btn-sm" value="Process Design" name="from_begin"></form></td>';}
									  
									  	echo '<td><form action="project_dashboard.php" method="post"><input type="hidden" value="'.$project_id.'" name="project_id"><input type="submit" class="btn btn-success btn-sm" value="Solution Design" name="from_begin"></form></td>';
									  }
									echo '</tr>';
							}
						}
					}
					else{
						echo '<tr><td rowspan="5" style="text-align:center;"><a href="create_project.php">---- Create Project ----</a></td></tr>';
					}
					?>
                    
                    
           
                    
                  </tbody>
                </table>
              </div>
            
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
      <b>Version</b> 2.6 Pre
    </div>
    <strong>Copyright &copy; 2025 <a href="https://ezyblu.com">EzyBlu</a>.</strong> All rights reserved.
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
