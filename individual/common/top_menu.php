<?php $pending = ''; ?>
<?php
$project_id = '';
					if(isset($_POST['project_id'])){
						$project_id = $_POST['project_id'];
					}
					if(isset($_GET['pid'])){
						$project_id = $_GET['pid'];
					}
					
					
					$query_pro = "select * from individual_project where owner = '$username' and id = '$project_id'";
					$result_pro = mysqli_query($con_global, $query_pro);
					
					if(mysqli_num_rows($result_pro)>0){
						while($row_pro = mysqli_fetch_array($result_pro)){		
							$project_id = $row_pro['id'];
							$project_name = $row_pro['project_name'];
							$client_name = $row_pro['client_name'];
							$scope = $row_pro['scope'];
							$contact = $row_pro['contact'];
						}
					}
					?>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $pending; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $pending; ?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> <?php echo $pending; ?> Subscriptions
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->