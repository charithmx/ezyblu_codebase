<?php require_once('../Connections/db_connect.php'); ?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
$username =  htmlspecialchars($_SESSION["username"]);

$query_p = "select id, owner from individual_project where owner = '$username'";
$result_p = mysqli_query($con_global, $query_p);
					
if(mysqli_num_rows($result_p)>0){
	while($row_p = mysqli_fetch_array($result_p)){		
//		$project_id = $row_p['id'];
	}
}
$project_id = $_GET['p'];
$active_ref_no = '';
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
  <link rel="stylesheet" href="../css/simpletree.css">
  
  
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

	<style>
		div.spacer {
			margin-bottom: 20px;
		}

		#buttons {
			display: none;
		}

	</style>

	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="../js/jquery.simpletree.js?v=150623"></script>

	<script>

	$(function(){

		// zero tree start on document ready
		$('#zeroTree').simpleTree({startCollapsed: false});

		// manage first tree
		$('#maketree_one').on('click',function(){
			$('#firstTree').simpleTree();
		});

		$('#destroytree_one').on('click',function(){
			$('#firstTree').simpleTree('destroy');
		});

		// manage second tree
		$('#maketree_two').on('click',function(){
			$('#secondTree').simpleTree({startCollapsed: false});
			$('#buttons').fadeIn();
		});

		$('#destroytree_two').on('click',function(){
			$('#buttons').fadeOut();
			$('#secondTree').simpleTree('destroy');
		});

		$('#maketree_two_collapse').on('click',function() {
			$('#secondTree').simpleTree('collapse');
		});

		$('#maketree_two_expand').on('click',function() {
			$('#secondTree').simpleTree('expand');
		});

		// ul of class tree
		$('#maketree_tree').on('click',function(){
			$('.mytree').simpleTree({startCollapsed: false});
		});

		// add elements to a tree and repaint
		$('.add_element').on('click',function() {
			var ref_node = $(this).data('add');
			var $element = $('#'+ref_node);
			if ($element.length) {
				var added_element = '<li>Added li under ' + ref_node + '</li>';
				if (($element).prop("tagName") == 'UL') {
					$element.append(added_element);
				} else {
					var $ul = $element.children('ul');
					if (!$ul.length) {
						$ul = $("<ul></ul>").appendTo($element);
					}
					$ul.eq(0).append(added_element);
				}
			} else {
				console.warn("Element #%s not found", ref_node);
			}

			// repaint the treeview
			var topmost_parent = $element.parents('ul').last();
			if (!topmost_parent.length)
				topmost_parent = $element;

			topmost_parent.simpleTree('repaint');
		});

		// remove elements from a tree and repaint
		$('.remove_element').on('click',function() {
			var ref_node = $(this).data('remove');
			var $element = $('#'+ref_node);
			var topmost_parent = $element.parents('ul').last();
			if (!topmost_parent.length)
				topmost_parent = $element;

			if ($element.length) {
				$element.remove();
			} else {
				console.warn("Element #%s not found", ref_node);
			}

			// repaint the treeview
			topmost_parent.simpleTree('repaint');
		});

	});

	</script>
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php
				
			$msg = '';
					
			if(isset($_POST['add_core'])){
				$owner = $_POST['owner'];
				$project_id = $_POST['project_id'];
				$core_process_ref = addslashes($_POST['core_process_ref']);
				$core_process_name = addslashes($_POST['core_process_name']);
				$core_process_objective = addslashes($_POST['core_process_objective']);
				$core_process_boundary = addslashes($_POST['core_process_boundary']);
				$stretch_goal = addslashes($_POST['stretch_goal']);
				$sub_processes = addslashes($_POST['sub_processes']);
				$core_process_owner = addslashes($_POST['core_process_owner']);	
				
				$query_add = "INSERT INTO individual_m1_core_process(owner, project_id, core_process_ref, core_process_name, core_process_objective, core_process_boundary, stretch_goal, sub_processes, core_process_owner) VALUES ('$owner', '$project_id', '$core_process_ref', '$core_process_name', '$core_process_objective', '$core_process_boundary', '$stretch_goal', '$sub_processes', '$core_process_owner')";
				$result_add = mysqli_query($con_global, $query_add);
				
				if(!empty($result_add)){
					$msg =  '<div class="alert alert-success alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h5><i class="icon fas fa-check"></i> Alert</h5>
						  Core Process Successfully Created.
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
			elseif(isset($_POST['edit_core'])){
				$core_id = $_POST['core_id'];
				$owner = $_POST['owner'];
				$project_id = $_POST['project_id'];
				$core_process_ref = addslashes($_POST['core_process_ref']);
				$core_process_name = addslashes($_POST['core_process_name']);
				$core_process_objective = addslashes($_POST['core_process_objective']);
				$core_process_boundary = addslashes($_POST['core_process_boundary']);
				$stretch_goal = addslashes($_POST['stretch_goal']);
				$sub_processes = addslashes($_POST['sub_processes']);
				$core_process_owner = addslashes($_POST['core_process_owner']);	
				
				$query_edit = "UPDATE individual_m1_core_process SET core_process_name='$core_process_name', core_process_objective='$core_process_objective', core_process_boundary='$core_process_boundary', stretch_goal='$stretch_goal' WHERE id = '$core_id'";
				$result_edit = mysqli_query($con_global, $query_edit);
				
				if(!empty($result_edit)){
					$msg =  '<div class="alert alert-success alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h5><i class="icon fas fa-check"></i> Alert</h5>
						  Core Process Successfully Updated.
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
		//	$project_id = $_POST['project_id'];
			$query = "Select id from individual_project where id = '$project_id'";
			$result = mysqli_query($con_global, $query);
												
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){		
			//		$project_id = $row['id'];
				}
			}
			?>	
    
  <?php include('common/top_menu_build.php'); ?>

  <?php include('common/side_menu_build.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Core Process</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Processes</li>
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
          <h3 class="card-title">Add Core Process</h3>
        </div>
        <div class="card-body">
        	
            		<?php
					if($_GET['e']){
						$e = $_GET['e'];
						$query = "select * from individual_m1_core_process where id = '$e'";
						$result = mysqli_query($con_global, $query);
												
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){		
								$core_ref = $row['core_process_ref'];
								$project_id = $row['project_id'];
								$core_process_name = $row['core_process_name'];
								$core_process_objective = $row['core_process_objective'];
								$core_process_boundary = $row['core_process_boundary'];
								$stretch_goal = $row['stretch_goal']; 
								$core_process_owner = $row['core_process_owner']; 
							}
						}
						
					}
					else{
						$query = "select id, core_process_ref, owner from individual_m1_core_process where owner = '$username' and project_id = '$project_id' order by id ASC";
						$result = mysqli_query($con_global, $query);
												
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){		
								$core_process_ref = $row['core_process_ref'];  
								$core_process_name = NULL;
								$core_process_objective = NULL;
								$core_process_boundary = NULL;
								$stretch_goal = NULL; 
								$core_process_owner = NULL; 
								
							}
							$core_ref = ++$core_process_ref;
						}
						else{
							$core_ref = 'A';	
						}
					}
					?>
                    <?php echo $msg; ?>
            <form class="form-horizontal" action="add_core.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Core Process Reference : </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" readonly="readonly" value="<?php echo $core_ref; ?>" name="core_process_ref">
                    </div>
                  </div>
                  <input type="hidden" name="owner" value="<?php echo $username; ?>">
                  <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                  <input type="hidden" name="core_id" value="<?php echo $e; ?>">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Core Process Name : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="core_process_name" value="<?php echo $core_process_name; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Core Process Objective : </label>
                    <div class="col-sm-8">
                      <textarea rows="3" class="form-control" name="core_process_objective"><?php echo $core_process_objective; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Core Process Boundary : </label>
                    <div class="col-sm-8">
                      <textarea rows="3" class="form-control" name="core_process_boundary"><?php echo $core_process_boundary; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Stretch Goals / CSF : </label>
                    <div class="col-sm-8">
                      <textarea rows="3" class="form-control" name="stretch_goal"><?php echo $stretch_goal; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Sub Processes / Modules : </label>
                    <div class="col-sm-8">
                      <textarea rows="3" class="form-control" name="sub_processes"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">User Story : </label>
                    <div class="col-sm-8">
                      <input type="file" name="diagram" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Core Process Owner : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="core_process_owner" value="<?php echo $core_process_owner; ?>">
                    </div>
                  </div>
                  
                  <div class="card-footer">
                  <?php
				  if(isset($_GET['e'])){
					  	echo '<input type="submit" class="btn btn-info" value="Edit Core Process" name="edit_core">';
				  }
				  else{
						echo '<input type="submit" class="btn btn-info" value="Add Core Process" name="add_core">';	  
				  }
				  ?>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  
                </div>
             </form>
            
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

<!-- jQuery
<script src="../plugins/jquery/jquery.min.js"></script>  -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>  
<script src="../dist/js/adminlte.min.js"></script>


<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
		document.getElementById("myDiv").scrollIntoView();
	</script> 
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
