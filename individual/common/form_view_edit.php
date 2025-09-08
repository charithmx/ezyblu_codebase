<div class="tab-pane fade" id="custom-tabs-four-settings-edit" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab-edit">
                                        <?php /*?><div class="col-2">
                                        <input type="text" class="form-control" value="<?php echo $core_process_ref.'.'.$this_activity_ref; ?>" disabled><br>
                                        </div><?php */?>
                                        <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" style="text-align:right;">Select Form : </label>
                                                <div class="col-sm-6">
                                                  <select class="form-control" name="ext_form">
                                                    <option value="">--Select Form--</option>
                                                    <?php
													$query_for = "Select * from individual_m1_core_form where owner = '$username' and project_id = '$project_id' order by id DESC";
													$result_for = mysqli_query($con_global, $query_for);							
													if(mysqli_num_rows($result_for)>0){
														while($row_for = mysqli_fetch_array($result_for)){		
															$form_name = $row_for['form_name'];
															$form_id = $row_for['id'];
															if($form_name != ''){echo "<option value='".$form_id."'>".$form_name."</option>";}																			
														}
													}
													?>
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                              <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" style="text-align:right;">Add New Form</label>
                                                <div class="col-lg-4">
                                                  <input type="text" class="form-control" name="new_form_name" placeholder="Form Name">
                                                </div>
                                                <div class="col-lg-2">
                                                  <input type="submit" value="Create Now" class="btn btn-sm btn-warning"/>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" style="text-align:right">New Form Description</label>
                                                <div class="col-lg-8">
                                                  <textarea class="form-control" rows="3" placeholder="Description" name="new_form_description"></textarea>
                                                </div>
                                              </div>
                                        </div>
                                     </div>
                                  </div>