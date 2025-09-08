<?php

$activity=$_GET["activity"];
$edit=$_GET["edit"];

require_once('../Connections/db_connect.php');

if (!$con_global)
 {
  die('Could not connect: ' . mysql_error());
 }
global $con_global;

if(isset($_GET['activity'])){
	$idd = $_GET['activity'];
	echo '<table class="table table-hover text-wrap">
                  <thead>
				  <tr bgcolor="#CCCCCC"><th style="width:10%;">Ref. No.</th> <th style="width:70%;">Activity</th><th style="width:10%;">Next</th></tr>
                  </thead><tbody>';
	
	$query = "select * from individual_m1_core_activity where id = '$idd'";
	$result = mysqli_query($con_global, $query);
										
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$core_process_ref = $row['core_process_ref'];
			$activity_ref = $row['activity_ref'];
			$activity_ref_next = $row['activity_ref_next'];
			$activity = $row['activity'];
			$role = $row['role'];
			$project_id = $row['project_id'];
			$owner = $row['owner'];
			$settings = $row['settings'];
			$system_activity_id = $row['system_activity_id'];
			
			echo '<tr><td>'.$core_process_ref.'.'.$activity_ref.'</td><td>'.$activity.'</td><td>'.$activity_ref_next.'</td></tr>';
			echo '
			
			
			
			<tr>
                      <td colspan="4">
                      	<!--        Botton Section -->
                            <div class="col-12 col-sm-12">
							
                            <div class="card card-secondary card-outline card-outline-tabs">
                              <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-viewother-tab" data-toggle="pill" href="#custom-tabs-four-viewother" role="tab" aria-controls="custom-tabs-four-viewother" aria-selected="false">Settings</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-viewhome-tab" data-toggle="pill" href="#custom-tabs-four-viewhome" role="tab" aria-controls="custom-tabs-four-viewhome" aria-selected="true">Alt. Process</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-viewprofile-tab" data-toggle="pill" href="#custom-tabs-four-viewprofile" role="tab" aria-controls="custom-tabs-four-viewprofile" aria-selected="false">Role and Form</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-viewmessages-tab" data-toggle="pill" href="#custom-tabs-four-viewmessages" role="tab" aria-controls="custom-tabs-four-viewmessages" aria-selected="false">Annexures</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">';
			
			//--- alt process
			$query_alt = "select * from individual_m1_core_alt_process where owner = '$owner' and project_id = '$project_id' and activity_id = '$system_activity_id'";
			$result_alt = mysqli_query($con_global, $query_alt);
												
			if(mysqli_num_rows($result_alt)>0){
				while($row_alt = mysqli_fetch_array($result_alt)){
					$alt_process = $row_alt['alt_process'];
					$footnote = $row_alt['footnote'];
				}
			}
			echo '<div class="tab-pane fade" id="custom-tabs-four-viewhome" role="tabpanel" aria-labelledby="custom-tabs-four-viewhome-tab">
                                     			<div class="row">
                                                  <div class="col-5 col-sm-3">
                                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                      <a class="nav-link active" id="vert-tabs-viewhome-tab" data-toggle="pill" href="#vert-tabs-viewhome" role="tab" aria-controls="vert-tabs-viewhome" aria-selected="true">Alt. Process</a>
                                                      <a class="nav-link" id="vert-tabs-viewprofile-tab" data-toggle="pill" href="#vert-tabs-viewprofile" role="tab" aria-controls="vert-tabs-viewprofile" aria-selected="false">Footnote</a>
                                                    </div>
                                                  </div>
                                                  <div class="col-7 col-sm-9">
                                                    <div class="tab-content" id="vert-tabs-tabContent">
                                                      <div class="tab-pane text-left fade show active" id="vert-tabs-viewhome" role="tabpanel" aria-labelledby="vert-tabs-viewhome-tab">
                                                         <textarea class="form-control" rows="3" readonly="readonly">'.$alt_process.'</textarea>
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-viewprofile" role="tabpanel" aria-labelledby="vert-tabs-viewprofile-tab">
                                                         <textarea class="form-control" rows="3" readonly="readonly">'.$footnote.'</textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                  </div>';
			//--- alt process
			
			//--- role
			$query_role = "select * from individual_m1_roles where id = '$role'";
			$result_role = mysqli_query($con_global, $query_role);
												
			if(mysqli_num_rows($result_role)>0){
				while($row_role = mysqli_fetch_array($result_role)){
					$new_role = $row_role['new_role'];
				}
			}
			//--- role
			
			//--- annexure
			$query_alt = "select * from individual_m1_core_annexure where owner = '$owner' and project_id = '$project_id' and activity_id = '$system_activity_id'";
			$result_alt = mysqli_query($con_global, $query_alt);
			
			echo '<div class="tab-pane fade" id="custom-tabs-four-viewmessages" role="tabpanel" aria-labelledby="custom-tabs-four-viewmessages-tab">
                  	<div class="col-2">
                    	</div>
                        	<table class="table table-bordered asset">
                            	<thead>
                                	<tr>
                                    	<th style="width:35%">Annexure Reference / External Link</th>
                                        <th style="width:35%">Annexure Description</th>
                                    </tr>
                                </thead>
                                <tbody>';
												
			if(mysqli_num_rows($result_alt)>0){
				while($row_alt = mysqli_fetch_array($result_alt)){
					$annexure_ref = $row_alt['annexure_ref'];
					$annexure_des = $row_alt['annexure_des'];
					echo '<tr>
							<td><input type="text" class="form-control" value="'.$annexure_ref.'" readonly="readonly"></td>
							<td><input type="text" class="form-control" value="'.$annexure_des.'" readonly="readonly"></td>
                          </tr>';
				}
			}
			echo '</tbody></table></div>';
			//--- annexure
			
			//--- form
			$query_form = "select * from individual_m1_core_form where owner = '$owner' and project_id = '$project_id' and activity_id = '$system_activity_id'";
			$result_form = mysqli_query($con_global, $query_form);
												
			if(mysqli_num_rows($result_form)>0){
				while($row_form = mysqli_fetch_array($result_form)){
					$form_name = $row_form['form_name'];
					$ext_form_id = $row_form['ext_form_id'];
				}
			}
			//--- form
			
			echo '
                                  
                                  <div class="tab-pane fade" id="custom-tabs-four-viewprofile" role="tabpanel" aria-labelledby="custom-tabs-four-viewprofile-tab">
                                      <div class="form-group row">
                                        <label class="col-2 col-form-label" style="text-align:right;">Role : </label>
                                        <div class="col-10">
                                          <input type="text" class="form-control" readonly="readonly" value="'.$new_role.'">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-2 col-form-label" style="text-align:right;">Form : </label>
                                        <div class="col-10">
                                          <input type="text" class="form-control" readonly="readonly" value="">
                                        </div>
                                      </div>
                                  </div>
                                  
                                  
                                  
                                  
                                  
                                  <div class="tab-pane fade active show" id="custom-tabs-four-viewother" role="tabpanel" aria-labelledby="custom-tabs-four-viewother-tab">';

                                   if($settings == '1'){
									  echo '<div class="form-group row">
									  <div class="custom-control custom-radio" style="margin-right:20px;">
                                                  <input class="custom-control-input" type="radio" id="customRadio1" value="Sequential" name="set" checked>
                                                  <label for="customRadio1" class="custom-control-label">Sequential</label>
                                                </div>
												</div><hr>
												<div class="Sequential box" style="display:inline;">
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Notes : </label>
                                                    <div class="col-10">
                                                        <textarea class="form-control" rows="2" name="sequential_note"></textarea>
                                                    </div>
                                                </div>   
                                          </div>
										  </div>';
								  }
								  elseif($settings == '3'){
									  //--- usecase
									$query_usecase = "select * from individual_m1_core_usecase where owner = '$owner' and project_id = '$project_id' and activity_id = '$system_activity_id'";
									$result_usecase = mysqli_query($con_global, $query_usecase);
																		
									if(mysqli_num_rows($result_usecase)>0){
										while($row_usecase = mysqli_fetch_array($result_usecase)){
											$note = $row_usecase['note'];
											$database_info = $row_usecase['database_info'];
											$security_info = $row_usecase['security_info'];
											$accept_info = $row_usecase['accept_info'];
										}
									}
									//--- usecase
									  echo '<div class="form-group row">
									  <div class="custom-control custom-radio" style="margin-right:20px;">
                                                  <input class="custom-control-input" type="radio" id="customRadio3" value="Usecase" name="set" checked>
                                                  <label for="customRadio3" class="custom-control-label">Usecase</label>
                                                </div></div>
												<div class="Usecase">
                                                <div class="row">
                                                  <div class="col-5 col-sm-5">
                                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                      <a class="nav-link active" id="vert-tabs-viewnote-tab" data-toggle="pill" href="#vert-tabs-viewnote" role="tab" aria-controls="vert-tabs-viewnote" aria-selected="true">Note</a>
                                                      <a class="nav-link" id="vert-tabs-viewdatabase-tab" data-toggle="pill" href="#vert-tabs-viewdatabase" role="tab" aria-controls="vert-tabs-viewdatabase" aria-selected="false">Database Information</a>
                                                      <a class="nav-link" id="vert-tabs-viewsecurity-tab" data-toggle="pill" href="#vert-tabs-viewsecurity" role="tab" aria-controls="vert-tabs-viewsecurity" aria-selected="false">Security Information</a>
                                                      <a class="nav-link" id="vert-tabs-viewaccept-tab" data-toggle="pill" href="#vert-tabs-viewaccept" role="tab" aria-controls="vert-tabs-viewaccept" aria-selected="false">Acceptance Criteria</a>
                                                    </div>
                                                  </div>
                                                  <div class="col-7 col-sm-7">
                                                    <div class="tab-content" id="vert-tabs-tabContent">
                                                      <div class="tab-pane text-left fade show active" id="vert-tabs-viewnote" role="tabpanel" aria-labelledby="vert-tabs-viewnote-tab">
                                                         <textarea class="form-control" rows="4" readonly="readonly">'.$note.'</textarea>
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-viewdatabase" role="tabpanel" aria-labelledby="vert-tabs-viewdatabase-tab">
                                                         <textarea class="form-control" rows="4" readonly="readonly">'.$database_info.'</textarea>
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-viewsecurity" role="tabpanel" aria-labelledby="vert-tabs-viewsecurity-tab">
                                                         <textarea class="form-control" rows="4" readonly="readonly">'.$security_info.'</textarea>  
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-viewaccept" role="tabpanel" aria-labelledby="vert-tabs-viewaccept-tab">
                                                         <textarea class="form-control" rows="4">'.$accept_info.'</textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>	
                                          </div>';
								  }
								  elseif($settings == '2'){
										echo '<div class="form-group row">
										<div class="custom-control custom-radio" style="margin-right:20px;">
                                                  <input class="custom-control-input" type="radio" id="customRadio2" value="Condition" name="set" checked>
                                                  <label for="customRadio2" class="custom-control-label">Condition</label>
                                                </div></div>';  
								  }
								  elseif($settings == '4'){
										echo '<div class="form-group row">
										<div class="custom-control custom-radio">
                                                  <input class="custom-control-input" type="radio" id="customRadio4" value="End" name="set" checked>
                                                  <label for="customRadio4" class="custom-control-label">Condition Option</label>
                                                </div></div>';  
								  }
								  elseif($settings == '5'){
										echo '<div class="form-group row">
										<div class="custom-control custom-radio">
                                                  <input class="custom-control-input" type="radio" id="customRadio5" value="Condition Option" name="set" checked>
                                                  <label for="customRadio5" class="custom-control-label">End</label>
                                                </div></div>';  
								  }         
                                           
                                  echo '</div>
                                    
                                </div>
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                          <!--   Botton Section -->
                          </td>
                      </tr>';
								
			
		}
	}

	echo '</tbody>
                </table>';
}




?>
