	<div class="modal fade" id="modal_above_type_1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">View Activities</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build.php" method="post" name="condition_form">
            <div class="modal-body">
            	
                 <!-- Data will be loaded here -->

            	
                
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      <div class="modal fade" id="modal_edit_type_1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Activities</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build_act.php" method="post" name="edit_activity">
            <div class="modal-body">
            	
                 <!-- Data will be loaded here -->

            	
                
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      
      <div class="modal fade" id="modal_delete_type_1">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Activity</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build_act.php" method="post" name="delete_activity">
            <div class="modal-body">
            	
            	
                
            </div>
            

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      
      
      <div class="modal fade" id="modal_above_type_1_condition">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Conditions</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="build_act.php" method="post" name="condition_form">
            <div class="modal-body">
            
                     
            	<input type="hidden" name="core_process_id" value="<?php echo $core_process_id; ?>">
                <input type="hidden" name="core_process_ref" value="<?php echo $core_process_ref; ?>">
                <input type="hidden" name="this_activity_ref" value="<?php echo $this_system_activity_id; ?>">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
            	
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
                      <td><?php echo $core_process_ref.'.'.$this_system_activity_id; ?></td>
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