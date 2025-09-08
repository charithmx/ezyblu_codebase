										<div class="tab-pane fade active show" id="custom-tabs-four-other-edit" role="tabpanel" aria-labelledby="custom-tabs-four-other-tab-edit">
											<?php
											
											
											
											if($should_usecase == 'yes'){
												$disabled_status = ' disabled="disabled"';
												$seq_check_status = '';
												$usecase_check_status = 'checked';
												$box_status = '';
												$display_status = 'none';
											}
											else{
												$seq_check_status = 'checked';
												$usecase_check_status = '';
												$disabled_status = ' disabled="disabled';
												$box_status = ' box';
												$display_status = 'inline';
											}
											?>
                                            <div class="form-group row">
                                                <div class="custom-control custom-radio" style="margin-right:20px;">
                                                  <input class="custom-control-input" type="radio" id="customRadio1" value="Sequential" name="set" <?php echo $disabled_status; echo $seq_check_status; echo $usecase_check_status;?>>
                                                  <label for="customRadio1" class="custom-control-label">Sequential</label>
                                                </div>
                                                <div class="custom-control custom-radio" style="margin-right:20px;">
                                                  <input class="custom-control-input" type="radio" id="customRadio2" value="Condition" name="set" data-toggle="modal" data-target="#modal_above_type_1_condition" <?php echo $disabled_status; ?>>
                                                  <label for="customRadio2" class="custom-control-label">Condition</label>
                                                </div>
                                                <div class="custom-control custom-radio" style="margin-right:20px;">
                                                  <input class="custom-control-input" type="radio" id="customRadio3" value="Usecase" name="set" <?php echo $usecase_check_status; ?>>
                                                  <label for="customRadio3" class="custom-control-label">Usecase</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                  <input class="custom-control-input" type="radio" id="customRadio4" value="End" name="set" <?php echo $disabled_status; ?>>
                                                  <label for="customRadio4" class="custom-control-label">End</label>
                                                </div>
                                             </div>
                                             
                                           <hr>
                                  
                                          <!-- /.Usecase Section -->  
                                          <div class="Usecase <?php echo $box_status; ?>">
                                                <div class="row">
                                                  <div class="col-5 col-sm-3">
                                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                      <a class="nav-link active" id="vert-tabs-note-tab" data-toggle="pill" href="#vert-tabs-note" role="tab" aria-controls="vert-tabs-note" aria-selected="true">Note</a>
                                                      <a class="nav-link" id="vert-tabs-database-tab" data-toggle="pill" href="#vert-tabs-database" role="tab" aria-controls="vert-tabs-database" aria-selected="false">Usecase Diagram</a>
                                                      <a class="nav-link" id="vert-tabs-security-tab" data-toggle="pill" href="#vert-tabs-security" role="tab" aria-controls="vert-tabs-security" aria-selected="false">Security Information</a>
                                                      <a class="nav-link" id="vert-tabs-accept-tab" data-toggle="pill" href="#vert-tabs-accept" role="tab" aria-controls="vert-tabs-accept" aria-selected="false">Acceptance Criteria</a>
                                                    </div>
                                                  </div>
                                                  <div class="col-7 col-sm-9">
                                                    <div class="tab-content" id="vert-tabs-tabContent">
                                                      <div class="tab-pane text-left fade show active" id="vert-tabs-note" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                         <textarea class="form-control summernote_use_notes" rows="4" placeholder="Description" name="usecase_note"></textarea>
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-database" role="tabpanel" aria-labelledby="vert-tabs-database-tab">
                                                         <textarea class="form-control summernote_use_diagram" rows="4" placeholder="Description" name="usecase_database_info"></textarea>
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-security" role="tabpanel" aria-labelledby="vert-tabs-security-tab">
                                                         <textarea class="form-control summernote_use_security" rows="4" placeholder="Description" name="usecase_security_info"></textarea>  
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-accept" role="tabpanel" aria-labelledby="vert-tabs-accept-tab">
                                                         <textarea class="form-control summernote_use_acc" rows="4" placeholder="Description" name="usecase_accept_info" onKeyUp="count_it()" id="usecase_accept" maxlength="2000"></textarea>
                                                         <span id="count" class="counter"></span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>	
                                          </div>
                                          <!-- /.Condition Section -->
                                          <div class="Condition box">Conditions</div>
                                          
                                          <!-- /.Sequential Section -->
                                          <div class="Sequential box" style="display:<?php echo $display_status; ?>;">
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Notes : </label>
                                                    <div class="col-10">
                                                        <textarea class="form-control summernote_sec_notes" rows="2" name="sequential_note"></textarea>
                                                    </div>
                                                </div>   
                                          </div>
                                           
                                  </div>