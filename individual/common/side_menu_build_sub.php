<?php include('../common/user_details.php'); ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../images/logo.png" width="100" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">.</span>
    </a>
	
	
    
    
    <div class="spacer">
		<a name="zero"></a>
		<ul id="zeroTree">
        
			<?php /*?><li><a href="#" style="color:#dde2e5;"><b><?php echo $project_name; ?></b></a>
            	<ul><?php */?>
            	<?php
				$sub_process_name = NULL;
				$sub_count = 0;
					$query = "Select id, owner, project_id, core_process_ref, core_process_name from individual_m1_core_process where owner = '$username' and project_id = '$project_id' order by core_process_ref ASC";
					$result = mysqli_query($con_global, $query);
														
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result)){		
							$core_id = $row['id'];
							$core_process_ref = $row['core_process_ref'];
							$core_process_name = $row['core_process_name'];
							$project_id = $row['project_id'];
							echo '<li><a href="add_core.php?e='.$core_id.'&p='.$project_id.'" style="color:#dde2e5;" title="'.$core_process_name.'">'.$core_process_ref.'-'.substr($core_process_name, 0, 20).'..</a>
									<ul>';
									$query_sub = "Select * from individual_m1_sub_process where core_process_id = '$core_id' order by id ASC";
									$result_sub = mysqli_query($con_global, $query_sub);
									$is_sub_process = '0';										
									if(mysqli_num_rows($result_sub)>0){ $is_sub_process = '1';
										while($row_sub = mysqli_fetch_array($result_sub)){		
											$sub_process_name = $row_sub['sub_process_name'];
											$sub_process_id = $row_sub['id'];
											$sub_process_ref = $row_sub['sub_process_ref'];
											$sub_count = $sub_count + 1;
											echo '<li><a href="add_sub_process.php?s='.$sub_process_id.'&c='.$core_id.'" style="color:#dde2e5;" title="'.$core_process_name.'"><i class="far fa-circle" style="color:#f8f9fa;" title="'.$sub_process_name.'"></i><i style="color:#dde2e5; margin-left:5px;"><strong>'.$core_process_ref.'.'.$sub_process_ref.''.$sub_count.'-'.substr($sub_process_name, 0, 15).'..</strong></a></i>';
											
											
											
											
											
											
											echo '<ul>';
											//////////// activiy
											$query_act_l = "Select * from individual_m1_core_activity where owner = '$username' and project_id = '$project_id' and sub_process_id = '$sub_process_id' order by system_activity_id ASC";
											$result_act_l = mysqli_query($con_global, $query_act_l);
											
											$is_usecase = '0';
																					
											if(mysqli_num_rows($result_act_l)>0){
												while($row_act_l = mysqli_fetch_array($result_act_l)){		
													$activity = $row_act_l['activity'];
													$activity_ref = $row_act_l['activity_ref'];
													$activity_core_process_ref = $row_act_l['core_process_ref'];
													$settings = $row_act_l['settings'];
													$show_activity = strip_tags($activity);

													if($settings == '3'){
													//	if($is_usecase == '1'){echo '</ul>';}
														echo '<li><i class="fa-solid fa-square" style="color:#f8f9fa;"></i><i style="color:#dde2e5; margin-left:5px;" title="'.$show_activity.'"><strong>'.$activity_core_process_ref.'.'.$activity_ref.'-'.substr($show_activity, 0, 15).'..</strong></i>';	
														$is_usecase = '1';
													}
													else{
														echo '<li><a style="color:#dde2e5;" title="'.$show_activity.'">'.$activity_core_process_ref.'.'.$activity_ref.'-'.substr($show_activity, 0, 15).'..</a></li>';
													}
											//		echo '<li><a style="color:#dde2e5;" title="'.$show_activity.'">'.$activity_core_process_ref.'.'.$activity_ref.'-'.substr($show_activity, 0, 15).'..</a></li>';
												}
											}
											echo '<li><a href="build_sub.php?core='.$core_id.'&sub='.$sub_process_id.'&p='.$project_id.'" style="color:#e3e3e3;">-- Add Activity --</a></li></ul></li>';
											
											
											
											
											
											
											
										}
										echo '<li><strong><a href="add_sub_process.php?core='.$core_id.'&p='.$project_id.'" style="color:#e3e3e3;">- Add Sub Process -</a></strong></li>';
										$sub_count = 0;
									}
									else{
										echo '<li><strong><a href="add_sub_process.php?core='.$core_id.'&p='.$project_id.'" style="color:#e3e3e3;">- Add Sub Process -</a></strong></li>';	
									}
									
									////////////////////
							echo '</ul></li>';
						}
						echo '<li><a href="add_core.php?p='.$project_id.'" style="color:#e3e3e3;">-- Add Core Process --</a></li>';
					}
				?>
				<?php /*?></ul>
			</li><?php */?>
		</ul>
	</div>   
    
     

    
    <!-- /.sidebar -->
  </aside>