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
		});
  		</script>
<script>
function showActivity(str) {
    if (str == "") {
        document.getElementById("activityHere").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("activityHere").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../common/activity_view.php?activity="+str,true);
        xmlhttp.send();
    }
}
function showActivityEdit(str) {
    if (str == "") {
        document.getElementById("activityHereEdit").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("activityHereEdit").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../common/activity_view.php?edit="+str,true);
        xmlhttp.send();
    }
}
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

  <?php include('common/side_menu_build.php'); ?>

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
              <form action="build.php" method="post" enctype="multipart/form-data">
                <table class="table table-hover text-wrap">
                  <thead>
                    <tr bgcolor="#CCCCCC">
                      <th style="width:10%;">Ref. No.</th>
                      <th style="width:70%;">Activity</th>
                      <th style="width:10%;">Next Step</th>
                      <th style="width:10%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                  
					<?php
					if(isset($_POST['add_edit_activity'])){
						include('build_files/add_edit_activity.php');
					}
					if(isset($_POST['add_above_activity'])){
						include('build_files/add_above_entry.php');
					}
					if(isset($_POST['add_above_condition'])){
						include('build_files/add_above_condition.php');
					}
					if(isset($_POST['add_condition'])){ ///---- condition start
						include('build_files/add_condition.php');	
					} ///-- condition end
					
					if(isset($_POST['add_activity'])){
						
						$annexure_reference_count = 0;
						
						//--------- Setting Check start
						$set = $_POST['set']; 
						$alt_process = $_POST['alt_process'];
						$footnote = $_POST['footnote'];
						$e_role = $_POST['e_role'];
						$ext_form = $_POST['ext_form'];
						$new_form_name = $_POST['new_form_name'];
						$new_form_description = $_POST['new_form_description'];
						$core_process_id = $_POST['core_process_id'];
						$core_process_ref = $_POST['core_process_ref'];
						$system_activity_id = $_POST['system_activity_id'];
						$this_activity_ref = $_POST['this_activity_ref'];
						$this_activity = $_POST['this_activity'];
						$next_activity_ref = $_POST['next_activity_ref'];
						$usecase_activity_ref = $_POST['usecase_activity_ref'];
						$usecase_note = $_POST['usecase_note'];
						$usecase_database_info = $_POST['usecase_database_info'];
						$usecase_security_info = $_POST['usecase_security_info'];
						$usecase_accept_info = $_POST['usecase_accept_info'];
						
						$today = date('Y-m-d h:i:s');
						
						if($set == "Sequential"){ //--Sequential Start
							$sequential_note = $_POST['sequential_note'];
							
							//---- Activity Entry Query Start
							$query_activity = "INSERT INTO individual_m1_core_activity(core_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('$core_process_id', '$core_process_ref', '$system_activity_id', '$this_activity_ref', '$next_activity_ref', '$this_activity', '$e_role', '$project_id', '$username', '1', '$today')";
							$result_activity = mysqli_query($con_global, $query_activity);
							//---- Activity Entry Query End

							//---- Alt Process Entry Query Start
							include('build_files/alt_process.php');
							//---- Alt Process Entry Query End
							
							//---- Annexure Entry Query Start
							include('build_files/annexure_entry.php');
							//---- Annexure Entry Query End
							
							//---- Form Entry Query Start
							include('build_files/form.php');
							//---- Form Entry Query End
							
						}  //--Sequential Ends
						elseif($set == "Condition"){  //--Condition Start
							echo 'Condition';
						}  //--Condition Ends
						elseif($set == "Usecase"){  //--Usecase Start
								
							//---- Activity Entry Query Start
							$query_activity = "INSERT INTO individual_m1_core_activity(core_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('$core_process_id', '$core_process_ref', '$system_activity_id', '$usecase_activity_ref', '', '$this_activity', '$e_role', '$project_id', '$username', '3', '$today')";
							$result_activity = mysqli_query($con_global, $query_activity);
							//---- Activity Entry Query End
							
							//---- Alt Process Entry Query Start
							include('build_files/alt_process.php');
							//---- Alt Process Entry Query End
							
							//---- Usecase Entry Query Start
							if($usecase_note != '' or $usecase_database_info != '' or $usecase_security_info != '' or $usecase_accept_info != ''){
					//		$query_usecase = "INSERT INTO individual_m1_core_usecase(owner, project_id, core_process_id, activity_id, note, database_info, security_info, accept_info) VALUES ('$username', '$project_id', '$core_process_id', '$system_activity_id', '$usecase_note', '$usecase_database_info', '$usecase_security_info', '$usecase_accept_info')";
							$result_usecase = mysqli_query($con_global, $query_usecase);
							}
							//---- Usecase Entry Query End
							
							//---- Annexure Entry Query Start
							include('build_files/annexure_entry.php');
							//---- Annexure Entry Query End
							
							//---- Form Entry Query Start
							include('build_files/form.php');
							//---- Form Entry Query End
						}  //--Usecase Ends
						
						  //--End Start
						elseif($set == "End"){
							//---- Activity Entry Query Start
							$query_activity = "INSERT INTO individual_m1_core_activity(id, core_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('', '$core_process_id', '$core_process_ref', '$system_activity_id', '$this_activity_ref', '', '<b>End</b>', '$e_role', '$project_id', '$username', '5', '$today')";
							$result_activity = mysqli_query($con_global, $query_activity);
							//---- Activity Entry Query End
						}
						  //--End Ends
						
						//--------- Setting Check end	
					}
					if(isset($_GET['above'])){		//-------- If click on add above - start									
						include('build_files/add_above_view.php');
					}	
					if(isset($_GET['edit'])){		//-------- If click on add above - start
						include('build_files/add_edit_view.php');	
					}								//-------- If click on add above - end
					
					?>
					<?php
				
					//--------From the begining - Start
					if(isset($_POST['from_begin'])){
						$project_id = $_POST['project_id'];	
						$query = "Select id, owner, core_process_ref, project_id from individual_m1_core_process where owner = '$username' and project_id = '$project_id' order by id ASC";
						$result = mysqli_query($con_global, $query);
						
						if(mysqli_num_rows($result)>0){  //--- Core Process Available
							while($row = mysqli_fetch_array($result)){		
								$core_process_id = $row['id'];
								$core_process_ref = $row['core_process_ref'];	
							}
						}
						else{  // --- Core process Not Available
							echo "<script>location='add_core.php'</script>";
						}
						//-- Usecase letter
						include('build_files/usecase_letter_generate.php');
						//-- Usecase letter
						
						//-- System Activity Key
						include('build_files/system_activity_id_generate.php');
						//-- System Activity Key
						
					}
					//--------From the begining - End
					
					///-----------From Add activity Pro tree - start
					elseif(isset($_GET['core'])){
						$core_process_id = $_GET['core'];
						$project_id = $_GET['p'];
						
						//-- Usecase letter
						include('build_files/usecase_letter_generate.php');
						//-- Usecase letter
						
						//-- System Activity Key
						include('build_files/system_activity_id_generate.php');
						//-- System Activity Key
					}
					///-----------From Add activity Pro tree - end
					
					///-----------When submit activity - start
					else{
						$core_process_id = $_POST['core_process_id'];
						$core_process_ref = $_POST['core_process_ref'];
						$project_id = $_POST['project_id'];
						
						//-- Usecase letter
						
						include('build_files/usecase_letter_generate.php');
						//-- Usecase letter
						
						//-- System Activity Key
						include('build_files/system_activity_id_generate.php');
						//-- System Activity Key
					}
					///-----------When submit activity - end
					
					/////--------- build for last core process
					if(isset($_GET['above'])){}
					elseif(isset($_GET['edit'])){}
					else{
					$query_act = "Select * from individual_m1_core_activity where owner = '$username' and project_id = '$project_id' and core_process_id = '$core_process_id' order by system_activity_id ASC";
					$result_act = mysqli_query($con_global, $query_act);
																	
					if(mysqli_num_rows($result_act)>0){
						while($row_act = mysqli_fetch_array($result_act)){		
							$act_id = $row_act['id'];
							$core_process_id = $row_act['core_process_id'];
							$core_process_ref = $row_act['core_process_ref'];
							$act_activity_ref = $row_act['activity_ref'];
							$act_activity_ref_next = $row_act['activity_ref_next'];
							$act_activity = $row_act['activity'];
							$act_project_id = $row_act['project_id'];
							$edit_system_activity_id = $row_act['system_activity_id'];
							$act_owner = $row_act['owner'];
							$settings = $row_act['settings'];
							if(is_numeric($act_activity_ref)){$previous_act_activity_ref = $act_activity_ref;}else{}
										
							if($settings == '3'){$style = ' style="font-weight:bold;"';}
							elseif($settings == '4'){$style = ' class="text-indigo"';}
							elseif($settings == '1'){$style = '';}
							elseif($settings == '2'){$style = '';}
								
							echo '<tr>
								  <td'.$style.'>'.$core_process_ref.'.'.$act_activity_ref.'</td>
								  <td'.$style.'>'.$act_activity.'</td>';
								  if($settings == '4' and $act_activity_ref_next == ''){echo '<td><input type="text" class="form-control" style="border:2px solid #eb5757;" readonly="readonly"/></td>';}else{echo '<td'.$style.'>'.$act_activity_ref_next.'</td>';}
								  
								  echo '<td>
								  <div class="input-group-prepend">
								  	<button type="button" class="btn btn-sm btn-default" data-toggle="dropdown">...</button>
									<ul class="dropdown-menu">';
									
							if($settings == '3'){}
							else{
								echo '<li class="dropdown-item"><i class="fas fa-level-up-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="build.php?above='.$edit_system_activity_id.'&core='.$core_process_id.'&p='.$project_id.'">Add Above</a></li><li class="dropdown-item"><i class="fas fa-level-down-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="#">Add Below</a></li>';
							}
								echo '<li class="dropdown-item"><i class="fas fa-eye" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="#" data-toggle="modal" data-target="#modal-view" id="'.$act_id.'" onClick="showActivity(this.id)">View</a></li><li class="dropdown-item"><i class="fas fa-edit" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="build.php?edit='.$edit_system_activity_id.'&core='.$core_process_id.'&p='.$project_id.'">Edit</a></li>
								<li class="dropdown-item"><i class="fas fa-trash-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete</a></li>
										</ul>
								  </div>
								  </td>
						    	  </tr>';
							
								
								
						}
					}
					else{ ///-- No Activity Available yet
						$act_activity_ref = 0;	
						$query_c = "Select id, project_id, core_process_ref from individual_m1_core_process where project_id = '$project_id' and id = '$core_process_id'";
						$result_c = mysqli_query($con_global, $query_c);
														
						if(mysqli_num_rows($result_c)>0){
							while($row = mysqli_fetch_array($result_c)){
								$core_process_ref = $row['core_process_ref'];
							}
						}
						  ///-- No Activity Available yet	
					}
					}
					/////--------- build for last core process
					if(is_numeric($act_activity_ref)){
						
						if(isset($_GET['above'])){$this_activity_ref = $ifabove_activity_ref;}
						else{
						$this_activity_ref = $act_activity_ref + 1;
						$next_activity_ref = $act_activity_ref + 2;
						}
					}
					else{
						
						$this_activity_ref = $previous_act_activity_ref	 + 1;
						$next_activity_ref = $previous_act_activity_ref	 + 2;
					}
					
					if($active_ref_no != ''){
						if(is_numeric($active_ref_no)){
							if(isset($_GET['above'])){$this_activity_ref = $ifabove_activity_ref; $next_activity_ref = $ifabove_activity_ref + 1;}
							else{
								$this_activity_ref = $active_ref_no;
								$next_activity_ref = $active_ref_no + 1;
							}
						}
						else{
						$this_activity_ref = $previous_act_activity_ref	 + 1;
						$next_activity_ref = $previous_act_activity_ref	 + 2;
						}
					}
					?>
                    
                    <?php
					//----- Adding entry section last - start
					if(isset($_GET['above'])){}
					elseif(isset($_GET['edit'])){}
					else{include('build_files/adding_activity_box.php');}
					//----- Adding entry section last - end
					
					?>
 
                      </tbody>
                </table>
                      </form>
                      
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
            <!--  Activity Section -->
            
     
     
     
     <script>
var count = <?php echo $this_activity_ref; ?>;
count = count + 1;
    $(document).ready(function(){
        $(".add-row-asset").click(function(){
            var markup = "<tr><td><input type='text' class='form-control' name='annexure_reference[]'></td><td><input type='text' class='form-control' name='annexure_description[]'></td><td><input type='file' class='form-control' name='pdf_file[]'></td></tr>";
            $(markup).appendTo(".asset");
        });

        $(".add-row-condition-mo").click(function(){
			
			
			count = count + 1;
			
            var markup_con = "<tr><td><textarea class='form-control' rows='1' placeholder='<?php echo $core_process_ref; ?>."+count+"' name='option[]'></textarea></td><td><?php echo $role_list_drop; ?></td><td><input type='text' class='form-control' placeholder='Go To' name='next_option_activity_ref[]'></td></tr>";
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
            <form action="build.php" method="post" name="condition_form">
            <div class="modal-body">
            	<input type="hidden" name="core_process_id" value="<?php echo $core_process_id; ?>">
                <input type="hidden" name="core_process_ref" value="<?php echo $core_process_ref; ?>">
                <input type="hidden" name="this_activity_ref" value="<?php echo $this_activity_ref; ?>">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <input type="hidden" name="system_activity_id" value="<?php echo $this_system_activity_id; ?>">
                <input type="hidden" name="above_system_activity_id" value="<?php echo $above_id; ?>">
            	
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
                      <td><?php echo $core_process_ref.'.'.$this_activity_ref; ?></td>
                      <td><textarea class="form-control summernote_con" rows="2" placeholder="Condition" name="this_condition" id="activityduplicate"></textarea></td>
                      <td><input type="text" class="form-control" name="next_option_ref" value="<?php echo $core_process_ref.'.'.$next_activity_ref; ?>"></td>
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
                      <td><textarea class="form-control" rows="1" placeholder="<?php echo $core_process_ref.'.'.$next_activity_ref; ?>" name="option[]"></textarea></td>
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
                  <button type="submit" class="btn btn-success" class="close" data-dismiss="modal">Yes</button>
                  <button type="submit" class="btn btn-danger float-right" class="close" data-dismiss="modal">No</button>
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
