<script type="text/javascript">
		$(document).ready(function() { 

		$('.summernote_act_edit').summernote({
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
        
        
        
        
<?php
// get_details.php
require_once('../../Connections/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM individual_m1_core_activity WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
		$core_process_id = $row['core_process_id'];
		$core_process_ref = $row['core_process_ref'];
		$sub_pro_id = $row['sub_process_id'];
		$activity_ref = $row['activity_ref'];
		$activity = $row['activity'];
		$project_id = $row['project_id'];
		$activity_ref_next = $row['activity_ref_next'];
		

		echo '<input type="hidden" name="id" value="'.$id.'"><input type="hidden" name="core" value="'.$core_process_id .'"><input type="hidden" name="project_id" value="'.$project_id .'">
			<table class="table table-hover text-wrap">
                <tbody>
                
                
                <tr id="myDiv">
                      <td>'.$core_process_ref.'.'.$activity_ref.'</td>
                      <td>
                      	<textarea class="summernote_act_edit form-control" rows="5" placeholder="Activity" name="this_activity" id="activityoriginal">'.$activity.'</textarea>
                      </td>
                      <td><input type="text" class="form-control" name="next_activity_ref" value="'.$activity_ref_next.'"></td>
                      <td><input type="submit" class="btn btn-sm btn-warning" value="Update" name="edit_activity" /></td>
                    </tr>
					<tr>
                      <td colspan="4">
					  
					  
					  
					  
					  
                    
                      	<!--        Botton Section -->
                            <div class="col-12 col-sm-12">						
							
                            <div class="card card-secondary card-outline card-outline-tabs">
                              <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab-edit" role="tablist">
								  <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-viewother-tab" data-toggle="pill" href="#custom-tabs-four-viewother" role="tab" aria-controls="custom-tabs-four-viewother" aria-selected="true">Settings</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-edit-alt-tab-edit" data-toggle="pill" href="#custom-tabs-edit-alt-edit" role="tab" aria-controls="custom-tabs-edit-alt-edit" aria-selected="false">Alt. Process</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-edit-role-tab-edit" data-toggle="pill" href="#custom-tabs-edit-role-edit" role="tab" aria-controls="custom-tabs-edit-role-edit" aria-selected="false">Role</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab-edit" data-toggle="pill" href="#custom-tabs-four-messages-edit" role="tab" aria-controls="custom-tabs-four-messages-edit" aria-selected="false">Annexures</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab-edit" data-toggle="pill" href="#custom-tabs-four-settings-edit" role="tab" aria-controls="custom-tabs-four-settings-edit" aria-selected="false">Forms/Formats</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">';
                                  
								  include('setting_view_edit.php');
                                  
								  include('alt_process_view_edit.php');
                                  
                                  include('role_view_edit.php');
                                  
                                  include('annexure_view_edit.php');
                                  
                                  include('form_view_edit.php');
                                  
                                  
                                    
                                echo '</div>
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                          <!--   Botton Section -->
                          </td>
                      </tr>
                    
                    
                </tbody>
                </table>';
    } else {
        echo 'No details found for the selected ID.';
    }
} else {
    echo 'Invalid request.';
}

mysqli_close($conn);
?>


