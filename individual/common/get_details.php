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
		$activity_ref_next = $row['activity_ref_next'];
		

		echo '<table class="table table-hover text-wrap">
                <tbody>
                
                
                <tr id="myDiv">
                  	 <input type="hidden" name="core_process_id" value="<?php echo $core_process_id; ?>" />
                     <input type="hidden" name="core_process_ref" value="<?php echo $core_process_ref; ?>" />
                  	 <input type="hidden" name="sub_process_id" value="<?php echo $sub_pro_id; ?>" />
                     <input type="hidden" name="this_activity_ref" value="<?php echo $this_system_activity_id; ?>" />
                     <input type="hidden" name="next_activity_ref" value="<?php echo $next_activity_ref; ?>" />
                     <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />
                      <td>'.$core_process_ref.'.'.$activity_ref.'</td>
                      <td>
                      
                      <!--<textarea class="form-control" rows="2" placeholder="Activity" name="this_activity" id="activityoriginal"></textarea>-->
                      <div class="card-body" style="margin-left:-20px; margin-right:-20px; margin-top:-20px;">
                      	<textarea class="summernote form-control" rows="5" placeholder="Activity" name="this_activity" id="activityoriginal"></textarea>
                      </div>
                      
                      
                      </td>
                      <td><input type="text" class="form-control" name="next_activity_ref" value="'.$activity_ref_next.'"></td>
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
                                <div class="tab-content" id="custom-tabs-four-tabContent">';
                                  
                                  include('../common/setting_view.php');
                                  include('../common/alt_process_view.php');
                                  include('../common/role_view.php');
                                  include('../common/annexure_view.php');
                                  include('../common/form_view.php');
                                    
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

