<?php

						$core_process_id = $_POST['core_process_id'];
						$core_process_ref = $_POST['core_process_ref'];
				//		$system_activity_id = $_POST['system_activity_id'];
						
						$this_activity_ref = $_POST['this_activity_ref'];
						$this_condition = $_POST['this_condition'];
						$con_role = $_POST['con_role'];
						$c_role = $_POST['c_role'];
						$project_id = $_POST['project_id'];
						$next_option_ref = $_POST['next_option_ref'];
						
						$sub_process_id = $_POST['sub_process_id'];
						
						$query_activity = "INSERT INTO individual_m1_core_activity(core_process_id, sub_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('$core_process_id', '$sub_process_id', '$core_process_ref', '', '$this_activity_ref', '$next_option_ref', '$this_condition', '$c_role', '$project_id', '$username', '2', '$today')";
						$result_activity = mysqli_query($con_global, $query_activity);
						
						$option_count = 0;
						$con_role_count = 0;
						$next_option_activity_ref_count = 0;
																				
						$option = $_POST['option'];		
						if($_POST['option']){
							foreach(($_POST['option']) as $option_fill){
								$option_count = $option_count + 1;
								${"option_variable$option_count"} = $option_fill;
							}
						}
						$con_role = $_POST['con_role'];		
						if($_POST['con_role']){
							foreach(($_POST['con_role']) as $con_role_fill){
								$con_role_count = $con_role_count + 1;
								${"con_role_variable$con_role_count"} = $con_role_fill;
							}
						}
						$next_option_activity_ref = $_POST['next_option_activity_ref'];		
						if($_POST['next_option_activity_ref']){
							foreach(($_POST['next_option_activity_ref']) as $next_option_activity_ref_fill){
								$next_option_activity_ref_count = $next_option_activity_ref_count + 1;
								${"next_option_activity_ref_variable$next_option_activity_ref_count"} = $next_option_activity_ref_fill;
							}
						}
						$next_option_activity_ref_count;
						if(!empty($option_variable1)){				
							for ($x = 1; $x <= $option_count; $x++) {
							//	$system_activity_id = $system_activity_id + 1;
								$this_activity_ref = $this_activity_ref + 1;
								
								$query_option = "INSERT INTO individual_m1_core_activity(core_process_id, sub_process_id, core_process_ref, system_activity_id, activity_ref, activity_ref_next, activity, role, project_id, owner, settings, date) VALUES ('$core_process_id', '$sub_process_id', '$core_process_ref', '', '$this_activity_ref', '${'next_option_activity_ref_variable'.$x}', '${'option_variable'.$x}', '${'con_role_variable'.$x}', '$project_id', '$username', '4', '$today')";
								$result_option = mysqli_query($con_global, $query_option);
							}
						}

?>