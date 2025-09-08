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

	
$query_p = "select id, owner from individual_project where owner = '$username'";
$result_p = mysqli_query($con_global, $query_p);
					
if(mysqli_num_rows($result_p)>0){
	while($row_p = mysqli_fetch_array($result_p)){		
//		$project_id = $row_p['id'];
	}
}

$project_id = $_POST['project_id'];
if(empty($project_id)){
	$project_id = $_GET['p'];
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
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
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
	.counter{
		background-color: #5dc991;
		color: #fff;
		font-size: 12px;
		padding: 2px 5px;
		line-height: 12px;
		height: 14px;
		text-align: center;
		border-top-right-radius: 4px;
		border-bottom-left-radius: 4px;
		font-weight: 400;
	}

	</style>
    
    
 	
    
    
		<script>
        $(document).ready(function(){
        	$('input[type="radio"]').click(function(){
        		var inputValue = $(this).attr("value");
        		var targetBox = $("." + inputValue);
        		$(".box").not(targetBox).hide();
        		$(targetBox).show();
        		});
        	});
        </script>
        
        <script type="text/javascript">
			$(document).ready(function() {
			  $('.summernote').summernote({
			  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['superscript', 'subscript']],
				['fontsize', ['fontname', 'fontsize']],
				['color', ['color', 'forecolor', 'picture']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'fullscreen']]
			  ]
			});
		});
		$(document).ready(function() {
		  $('.summernote_con').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
		});
		$(document).ready(function() {
		  $('.summernote_edit').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
			
		  $('.summernote_sec_notes').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
		  $('.summernote_use_notes').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
		$('.summernote_use_diagram').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
		$('.summernote_use_security').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
		$('.summernote_use_acc').summernote({
		  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color', 'forecolor']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['link', 'undo', 'redo', 'fullscreen']]
			  ]
			});
		});
  		</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    
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


<style>
    .box{
        display: none;
    }
</style>
<?php include('common/role_list.php'); ?>



                               
                                
                                

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include('common/top_menu_build.php'); ?>

  <?php include('common/side_menu_build_sub.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
        	
            
            <!--  Activity Section -->
            <div class="col-12">
            <div class="card">
            
            
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <form action="build_sub.php" method="post" enctype="multipart/form-data">
                <table class="table table-hover text-wrap">
                  <thead>
                    <tr bgcolor="#CCCCCC">
                      <th style="width:10%;">Ref. No.</th>
                      <th style="width:70%;">Activity</th>
                      <th style="width:10%;">Next Step</th>
                      <th style="width:10%;"></th>
                    </tr>
                  </thead>
                  <tbody id="detailsTableBody">
                  
                  <?php
				  //// --- add activity
				  if(isset($_POST['add_activity'])){
					  
					  $system_activity_id = NULL; $usecase_activity_ref = NULL;
					  
					  	$this_activity = $_POST['this_activity'];
					  	$next_activity_ref = $_POST['next_activity_ref'];
						$core_process_id = $_POST['core_process_id'];
						$core_process_ref = $_POST['core_process_ref'];
						$sub_process_id = $_POST['sub_process_id'];
						$this_activity_ref = $_POST['this_activity_ref'];
						$next_activity_ref = $_POST['next_activity_ref'];
											  
					  //--------- Setting Check start
					 	$set = $_POST['set']; 
						$alt_process = $_POST['alt_process'];
						$footnote = $_POST['footnote'];
						$e_role = $_POST['e_role'];
						$ext_form = $_POST['ext_form'];
						$new_form_name = $_POST['new_form_name'];
						$new_form_description = $_POST['new_form_description'];
					//	$system_activity_id = $_POST['system_activity_id'];
					//	$this_activity_ref = $_POST['this_activity_ref'];
						$this_activity = $_POST['this_activity'];
						$next_activity_ref = $_POST['next_activity_ref'];
				//		$usecase_activity_ref = $_POST['usecase_activity_ref'];
						$usecase_note = $_POST['usecase_note'];
						$usecase_database_info = $_POST['usecase_database_info'];
						$usecase_security_info = $_POST['usecase_security_info'];
						$usecase_accept_info = $_POST['usecase_accept_info'];
						
						$today = date('Y-m-d h:i:s');
						
						if($set == "Sequential"){ //--Sequential Start
							$sequential_note = $_POST['sequential_note'];
							//---- Activity Entry Query Start
							$query_activity = "INSERT INTO individual_m1_core_activity(core_process_id, sub_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('$core_process_id', '$sub_process_id', '$core_process_ref', 0, '$this_activity_ref', '$next_activity_ref', '$this_activity', '$e_role', '$project_id', '$username', '1', '$today')";
							$result_activity = mysqli_query($con_global, $query_activity);
							//---- Activity Entry Query End

							
						}  //--Sequential Ends
						elseif($set == "Usecase"){  //--Usecase Start

							$query1 = "Select * from individual_m1_core_activity where sub_process_id = '$sub_process_id' and settings = '3' order by id DESC limit 1";
							$result1 = mysqli_query($con_global, $query1);
							
							if(mysqli_num_rows($result1)>0){  //--- Core Process Available
								while($row1 = mysqli_fetch_array($result1)){		
									$usecase_activity_ref = $row1['activity_ref'];
								}
								$usecase_activity_ref++;	
							}
							else{
								$usecase_activity_ref = 'a';
							}
								
							//---- Activity Entry Query Start
							$query_activity = "INSERT INTO individual_m1_core_activity(core_process_id, sub_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('$core_process_id', '$sub_process_id', '$core_process_ref', 0, '$usecase_activity_ref', '', '$this_activity', '$e_role', '$project_id', '$username', '3', '$today')";
							$result_activity = mysqli_query($con_global, $query_activity);
							//---- Activity Entry Query End
							
						}  //--Usecase Ends
				  }
				  if(isset($_POST['edit_activity'])){					  
					  	$id = $_POST['id'];
						$core = $_POST['core'];
						$project_id = $_POST['project_id'];
						$this_activity = $_POST['this_activity'];
						$next_activity_ref = $_POST['next_activity_ref'];
						//---- Activity Edit Query Start
						$query_edit = "UPDATE individual_m1_core_activity SET activity_ref_next='$next_activity_ref', activity='$this_activity' WHERE id='$id'";
						$result_edit = mysqli_query($con_global, $query_edit);
						//---- Activity Edit Query End
						$listing = "edit";
				  }
				  if(isset($_POST['add_condition'])){ ///---- condition start
				  		$today = date('Y-m-d h:i:s');
						include('common/add_condition_sub.php');
						$listing = "condition";	
						$core = $core_process_id;
				  } ///-- condition end
				  
				  ?>
                  
                  <?php
				  
				
				  
				  //--------From the begining - Start
				  		$should_usecase = NULL;
						$preview = NULL;
						if(isset($_GET['sub'])){
								$core = $_GET['core'];
								$sub = $_GET['sub'];  
								$query = "Select id, owner, core_process_ref, project_id from individual_m1_core_process where owner = '$username' and project_id = '$project_id' and id = '$core' order by id DESC limit 1";	
						  }
						  else{
							  $query = "Select id, owner, core_process_ref, project_id from individual_m1_core_process where owner = '$username' and project_id = '$project_id' order by id DESC limit 1";
						  }
						$result = mysqli_query($con_global, $query);
						
						if(mysqli_num_rows($result)>0){  //--- Core Process Available
							while($row = mysqli_fetch_array($result)){		
								$core_process_id = $row['id'];
								$core_process_ref = $row['core_process_ref'];
								
								if(isset($_GET['sub'])){
										$core = $_GET['core'];
										$sub = $_GET['sub'];  	
										$query_sub = "Select id, core_process_id, sub_process_ref from individual_m1_sub_process where core_process_id = '$core' and id = '$sub' order by id DESC limit 1";
								  }
								  else{
									  $query_sub = "Select id, core_process_id, sub_process_ref from individual_m1_sub_process where core_process_id = '$core_process_id' order by id DESC limit 1";
								  }
								$result_sub = mysqli_query($con_global, $query_sub);
								
								if(mysqli_num_rows($result_sub)>0){  //--- Core Process Available
									while($row_sub = mysqli_fetch_array($result_sub)){		
										$sub_pro_id = $row_sub['id'];
										$sub_pro_ref = $row_sub['sub_process_ref'];
										
										$query_act = "Select * from individual_m1_core_activity where sub_process_id = '$sub_pro_id' order by id ASC";
										$result_act = mysqli_query($con_global, $query_act);
										
										if(mysqli_num_rows($result_act)>0){ 
											while($row_act = mysqli_fetch_array($result_act)){		
												$activity_ref = $row_act['activity_ref']; 
												$activity_ref_next = $row_act['activity_ref_next']; 
												$activity = $row_act['activity']; 
												$settings = $row_act['settings']; 
												
												if($settings == '3'){$css_settings = ' style="font-weight:bold;"';}
												elseif($settings == '2'){$css_settings = ' style="color:#009;"';}
												elseif($settings == '4'){$css_settings = ' style="font-style:italic; color:#039;"';}
												else{$css_settings = '';}
												
												echo '<tr>
													  <td'.$css_settings.'>'.$core_process_ref.''.$sub_pro_ref.'.'.$activity_ref.'</td>
													  <td'.$css_settings.'>'.$activity.'</td>
													  <td>'.$activity_ref_next.'</td>
													  <td>';
														  include('common/activity_menu.php');
													echo '</td>
														</tr>';	
													$chint = intval($activity_ref);
													if($chint != 0){$preview = $chint;}
											}
											if($chint == 0){$activity_ref = 0; $this_system_activity_id = $preview + 1;}
											else{
												$this_system_activity_id = $activity_ref + 1;
											}
										}
										else{
											$activity_ref = 0;	
											$this_system_activity_id = 1;
											$should_usecase = 'yes';
										}
									}
								}
								else{

									echo '<script type="text/javascript">
											window.location = "add_sub_process.php?core='.$core_id.'&p='.$project_id.'";
										</script>';				
								}
							}
						}
						else{
							echo '<script type="text/javascript">
									window.location = "add_core.php?p='.$project_id.'";
								</script>';			
						}
						$next_activity_ref = $this_system_activity_id + 1;
				  ?>
                  <tr id="myDiv">
                  	 <input type="hidden" name="core_process_id" value="<?php echo $core_process_id; ?>" />
                     <input type="hidden" name="core_process_ref" value="<?php echo $core_process_ref; ?>" />
                  	 <input type="hidden" name="sub_process_id" value="<?php echo $sub_pro_id; ?>" />
                     <input type="hidden" name="this_activity_ref" value="<?php echo $this_system_activity_id; ?>" />
                     <input type="hidden" name="next_activity_ref" value="<?php echo $next_activity_ref; ?>" />
                     <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />
                      <td><?php echo $core_process_ref.'.'.$sub_pro_ref.'.'.$this_system_activity_id; ?></td>
                      <td>
                      
                      <!--<textarea class="form-control" rows="2" placeholder="Activity" name="this_activity" id="activityoriginal"></textarea>-->
                      <div class="card-body" style="margin-left:-20px; margin-right:-20px; margin-top:-20px;">
                      	<textarea class="summernote form-control" rows="5" placeholder="Activity" name="this_activity" id="activityoriginal"></textarea>
                      </div>
                      
                      
                      </td>
                      <td><input type="text" class="form-control" name="next_activity_ref" value="<?php echo $core_process_ref.''.$sub_pro_ref.'.'.$next_activity_ref; ?>"></td>
                      <td><input type="submit" class="btn btn-sm btn-warning" value="Add" name="add_activity" /></td>
                    </tr>
                    
                    <tr>
                      <td colspan="4">
                    
                      	<!--        Botton Section -->
                            <div class="col-12 col-sm-12">
                            <div class="card card-secondary card-outline card-outline-tabs">
                              <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">Settings</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Alt. Process</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Role</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Annexures</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Forms/Formats</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                  <?php include('common/setting_view.php'); ?>
                                  
								  <?php include('common/alt_process_view.php'); ?>
                                  
                                  <?php include('common/role_view.php'); ?>
                                  
                                  <?php include('common/annexure_view.php'); ?>
                                  
                                  <?php include('common/form_view.php'); ?>
                                  
                                  
                                    
                                </div>
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                          <!--   Botton Section -->
                          
                          
                          
                          </td>
                      </tr>
                      
					
 
                      </tbody>
                </table>
                      </form>
                      
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
            <!--  Activity Section -->
            
     
 <?php include('common/modal_above_type_2.php'); ?>     
     
     <script>
var count = <?php echo $this_system_activity_id; ?>;
count = count + 1;
    $(document).ready(function(){
        $(".add-row-asset").click(function(){
            var markup = "<tr><td><input type='text' class='form-control' name='annexure_reference[]'></td><td><input type='text' class='form-control' name='annexure_description[]'></td><td><input type='file' class='form-control' name='pdf_file[]'></td></tr>";
            $(markup).appendTo(".asset");
        });

        $(".add-row-condition-mo").click(function(){
			
			
			count = count + 1;
			
            var markup_con = "<tr><td><textarea class='form-control' rows='1' placeholder='<?php echo $core_process_ref.'.'.$sub_pro_id; ?>."+count+"' name='option[]'></textarea></td><td><?php echo $role_list_drop; ?></td><td><input type='text' class='form-control' placeholder='Go To' name='next_option_activity_ref[]'></td></tr>";
            $(markup_con).appendTo(".condition_mo");
        });
		
	});	
</script>       
          
          
          
          
       <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Conditions</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build_sub.php" method="post" name="condition_form">
            <div class="modal-body">
            	
                
                <input type="hidden" name="core_process_id" value="<?php echo $core_process_id; ?>">
                <input type="hidden" name="core_process_ref" value="<?php echo $core_process_ref; ?>">
                <input type="hidden" name="this_activity_ref" value="<?php echo $this_system_activity_id; ?>">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <input type="hidden" name="sub_process_id" value="<?php echo $sub_pro_id; ?>" />
            	
                <table class="table table-hover text-wrap">
                  <thead>
                    <tr bgcolor="#CCCCCC">
                      <th style="width:10%;">Ref. No.</th>
                      <th style="width:70%;">Condition</th>
                      <th style="width:10%;">Next</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<select name="c_role" style="display:none;"><?php echo $role_list; ?></select>
            		<tr>
                      <td><?php echo $core_process_ref.'.'.$sub_pro_id.'.'.$this_system_activity_id; ?></td>
                      <td><textarea class="form-control summernote_con" rows="2" placeholder="Condition" name="this_condition" id="activityduplicate"></textarea></td>
                      <td><input type="text" class="form-control" name="next_option_ref" value="<?php echo $core_process_ref.'.'.$sub_pro_id.'.'.$next_activity_ref; ?>"></td>
                    </tr>
                    
                  </tbody>
                </table>
                    
              	<table class="table table-bordered condition_mo">
                  <thead>
                    <tr>
                      <th width="70%">Options</th>
                      <th width="15%">Role</th>
                      <th width="15%">Go To</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><textarea class="form-control" rows="1" placeholder="<?php echo $core_process_ref.'.'.$sub_pro_id.'.'.$next_activity_ref; ?>" name="option[]"></textarea></td>
                      <td><?php echo $role_list_drop; ?></td>
                      <td><input type="text" class="form-control" placeholder="Go To" name="next_option_activity_ref[]"></td>
                    </tr>
                  </tbody>
                </table>
      <div style="text-align:right; float:right;"><input type="button" class="fa fa-plus add-row-condition-mo btn btn-block bg-gradient-success" value="+" /></div>
            </div>
            
<?php 
if(isset($_GET['above'])){
	echo '<div class="modal-footer justify-content-between"><input type="submit" class="btn btn-success" value="Add" name="add_above_condition" /></div>';
}
else{
	echo '<div class="modal-footer justify-content-between"><input type="submit" class="btn btn-success" value="Add" name="add_condition" /></div>';
}
			?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      
      
      <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">View Activities</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build.php" method="post" name="condition_form">
            <div class="modal-body">
            	<div id="activityHere"><b>Loading....</b></div>
            	
                
            </div>
            

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Activities</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build.php" method="post" name="condition_form">
            <div class="modal-body">
            	<div id="activityHereEdit"><b>Loading....</b></div>
            	
                
            </div>
            

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Activity</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build.php" method="post" name="condition_form">
            <div class="modal-body">
            	<div class="callout callout-danger">
                  <h5>Are you sure you want to delete Actvity (A.2)</h5>

                  <p>---Function under construction----</p>
                  <div class="card-footer">
                 <!-- <button type="submit" class="btn btn-success" class="close" data-dismiss="modal">Yes</button>
                  <button type="submit" class="btn btn-danger float-right" class="close" data-dismiss="modal">No</button>-->
               		</div>
                </div>
            	
                
            </div>
            

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
          
   
            
            
            
            
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
      <b>Version</b> 1.8 Pre
    </div>
    <strong>Copyright &copy; 2021 <a href="https://ezyblu.com">ezyBLU</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->











        

                                <script type='text/javascript'>$(document).ready(function(){

$(".tabs").click(function(){
    
    $(".tabs").removeClass("active");
    $(".tabs h6").removeClass("font-weight-bold");    
    $(".tabs h6").addClass("text-muted");    
    $(this).children("h6").removeClass("text-muted");
    $(this).children("h6").addClass("font-weight-bold");
    $(this).addClass("active");

    current_fs = $(".active");

    next_fs = $(this).attr('id');
    next_fs = "#" + next_fs + "1";

    $("fieldset").removeClass("show");
    $(next_fs).addClass("show");

    current_fs.animate({}, {
        step: function() {
            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({
                'display': 'block'
            });
        }
    });
});

});</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
















<script type="text/javascript">
$(function() {
    $('textarea[id$=original]').keyup(function() {
        var txtClone = $(this).val();
        $('textarea[id$=duplicate]').val(txtClone);
    });
});

var el_t = document.getElementById('usecase_accept');
var length = el_t.getAttribute("maxlength");
var el_c = document.getElementById('count');
el_c.innerHTML = length;
el_t.onkeyup = function () {
  document.getElementById('count').innerHTML = (length - this.value.length + ' Characters Left');
};
</script>
  
<script src="table2.js"></script>

<script type="text/javascript">
document.getElementById("myDiv").scrollIntoView();
</script>
<!-- jQuery
<script src="../plugins/jquery/jquery.min.js"></script>  -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>  
<script src="../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>

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
