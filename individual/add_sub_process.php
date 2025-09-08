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
		$project_id = $row_p['id'];
	}
}

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
					
			if(isset($_POST['add_sub'])){
				$core_pro_id = $_POST['core'];
				$project_id = $_POST['project_id'];
				$sub_process_ref = $_POST['sub_process_ref'];
				$sub_process_ref = addslashes($_POST['sub_process_ref']);
				$sub_process_name = addslashes($_POST['sub_process_name']);
				$sub_process_objective = addslashes($_POST['sub_process_objective']);
				$sub_process_boundary = addslashes($_POST['sub_process_boundary']);	
				
				$query_sub_add = "INSERT INTO individual_m1_sub_process(core_process_id, sub_process_ref, sub_process_name, sub_process_objective, sub_process_boundary) VALUES ('$core_pro_id', '$sub_process_ref', '$sub_process_name', '$sub_process_objective', '$sub_process_boundary')";
				$result_sub_add = mysqli_query($con_global, $query_sub_add);
				
				if(!empty($result_sub_add)){
					$msg =  '<div class="alert alert-success alert-dismissible">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <h5><i class="icon fas fa-check"></i> Alert</h5>
						  Sub Process Successfully Created.
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
			elseif(isset($_POST['edit_sub'])){
				$sub_id = $_POST['sub'];
				$core_id = $_POST['core_id'];
				$project_id = $_POST['project_id'];
				$sub_process_name = addslashes($_POST['sub_process_name']);
				$sub_process_objective = addslashes($_POST['sub_process_objective']);
				$sub_process_boundary = addslashes($_POST['sub_process_boundary']);
				
				echo $query_edit = "UPDATE individual_m1_sub_process SET sub_process_name='$sub_process_name', sub_process_objective='$sub_process_objective', sub_process_boundary='$sub_process_boundary' WHERE id = '$sub_id'";
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
				$sub_process_name = NULL;
				$sub_process_objective = NULL;
				$sub_process_boundary = NULL;
				
				$query = "select id, core_process_id from individual_m1_sub_process where core_process_id = '$core_id' order by id ASC";
				$result = mysqli_query($con_global, $query);
												
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){		
						$sub_count = $sub_count + 1;
					}
					$new_sub_ref = ++$sub_count;
				}
				else{
					$new_sub_ref = 1;	
				}
			}
		//	$project_id = $_POST['project_id'];
			$query = "Select id from individual_project where owner = '$username'";
			$result = mysqli_query($con_global, $query);
												
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){		
					$project_id = $row['id'];
				}
			}
			?>	
    
  <?php include('common/top_menu_build.php'); ?>

  <?php include('common/side_menu_build_sub.php'); ?>

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
          <h3 class="card-title">Add Sub Process</h3>
        </div>
        <div class="card-body">
        	
            		<?php
					if($_GET['s']){
						$s = $_GET['s'];
						$query = "select * from individual_m1_sub_process where id = '$s'";
						$result = mysqli_query($con_global, $query);
												
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){		
								$new_sub_ref = $row['sub_process_ref'];
								$sub_process_name = $row['sub_process_name'];
								$sub_process_objective = $row['sub_process_objective'];
								$sub_process_boundary = $row['sub_process_boundary'];
							}
						}
						
					}
					elseif(isset($_GET['core'])){
						$core = $_GET['core'];
						$p = $_GET['core'];	
					
						$query = "select id, core_process_id from individual_m1_sub_process where core_process_id = '$core' order by id ASC";
						$result = mysqli_query($con_global, $query);
												
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){		
								$sub_count = $sub_count + 1;
							}
							$new_sub_ref = ++$sub_count;
						}
						else{
							$new_sub_ref = 1;	
						}
						$sub_process_name = NULL;
						$sub_process_objective = NULL;
						$sub_process_boundary = NULL;
					}
					?>
                    <?php echo $msg; ?>
            <form class="form-horizontal" action="add_sub_process.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Sub Process Reference : </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" readonly="readonly" value="<?php echo $new_sub_ref; ?>" name="sub_process_ref">
                    </div>
                  </div>
					<input type="hidden" name="sub" value="<?php echo $s; ?>">
                  	<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Sub Process Name : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="sub_process_name" value="<?php echo $sub_process_name; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Sub Process Objective : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="sub_process_objective" value="<?php echo $sub_process_objective; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-align:right;">Sub Process Boundary : </label>
                    <div class="col-sm-8">
                      <textarea rows="3" class="form-control" name="sub_process_boundary"><?php echo $sub_process_boundary; ?></textarea>
                    </div>
                  </div>
                  
                  
                  <div class="card-footer">
                  <?php
				  if(isset($_GET['s'])){
					  	echo '<input type="submit" class="btn btn-info" value="Edit Sub Process" name="edit_sub">';
				  }
				  else{
						echo '<input type="submit" class="btn btn-info" value="Add Sub Process" name="add_sub">';	  
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
