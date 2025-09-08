<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    
                                        	<div class="row">
                                                  <div class="col-5 col-sm-3">
                                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                      <a class="nav-link active" id="vert-tabs-erole-tab" data-toggle="pill" href="#vert-tabs-erole" role="tab" aria-controls="vert-tabs-erole" aria-selected="true">Existing Role</a>
                                                      <a class="nav-link" id="vert-tabs-nrole-tab" data-toggle="pill" href="#vert-tabs-nrole" role="tab" aria-controls="vert-tabs-nrole" aria-selected="false">New Role</a>
                                                    </div>
                                                  </div>
                                                  <div class="col-7 col-sm-9">
                                                    <div class="tab-content" id="vert-tabs-tabContent">
                                                      <div class="tab-pane text-left fade show active" id="vert-tabs-erole" role="tabpanel" aria-labelledby="vert-tabs-erole-tab">
                                                         <div class="col-lg-10">
                                                            <div class="form-group row">
                                                                <label class="col-4 col-form-label" style="text-align:right;">Select Role : </label>
                                                                <div class="col-6">
                                                                
                                                                <script>				
																$(document).ready(function() {
																	$('#butsave').on('click', function() {
																		$("#butsave").attr("disabled", "disabled");
																		var new_role = $('#new_role').val();
																		var role_description = $('#role_description').val();
																		var owner = $('#owner').val();
																		if(new_role!="" && role_description!=""){
																			$.ajax({
																				url: "role_save.php",
																				type: "POST",
																				data: {
																					owner: owner,
																					new_role: new_role,
																					role_description: role_description				
																				},
																				cache: false,
																				success: function(dataResult){
																					var dataResult = JSON.parse(dataResult);
																					if(dataResult.statusCode==200){
																						document.getElementById('new_role').value = "";
																						document.getElementById('role_description').value = "";
																						$("#butsave").removeAttr("disabled");
																						$('#fupForm').find('input:text').val('');
																						$("#success").show();
																						$('#success').html('Data added successfully !'); 	
																						$("#success_a").show();
																				//		$("#success_b").hide();
												$('#success_a').html("<option value="+dataResult.roleId+" selected>"+dataResult.roleName+"</option>");					
																					}
																					else if(dataResult.statusCode==201){
																					   alert("Error occured !");
																					}
																				}
																			});
																		}
																		else{
																			alert('Please fill all the field !');
																		}
																	});
																	
																});
																</script>
                                                                
                                                                  
                                                                  <select class="form-control" id="success_a" name="e_role">

																	<?php echo $role_list; ?>
                                                                    
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="tab-pane fade" id="vert-tabs-nrole" role="tabpanel" aria-labelledby="vert-tabs-nrole-tab">
                                                      	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                        </div>
                                                        
                                                         <input type="hidden" name="owner" value="<?php echo $username; ?>" id="owner">
                                                         <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" style="text-align:right;">New Role (Short Name)</label>
                                                            <div class="col-sm-6">
                                                              <input type="text" class="form-control" placeholder="Role" id="new_role" name="new_role">
                                                            </div>
                                                          </div>
                                                          <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label" style="text-align:right;">New Role(Long Name)</label>
                                                            <div class="col-sm-6">
                                                              <input type="text" class="form-control" rows="3" placeholder="Long Name" id="role_description" name="role_description">
                                                            </div>
                                                          </div>
                                                          <input type="button" name="save" class="btn btn-primary" value="Save Role" id="butsave" onclick="$('#vert-tabs-erole-tab').trigger('click')">
														
                                                        
                                                      </div>
             
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                              
                                       
                                  </div>