<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                        <?php /*?><div class="col-2">
                                        <input type="text" class="form-control" value="<?php echo $core_process_ref.'.'.$this_activity_ref; ?>" disabled><br>
                                        </div><?php */?>
                                        
                                        
                                              <table class="table table-bordered asset">
                                                  <thead>
                                                    <tr>
                                                      <th style="width:35%">Annexure Reference / External Link</th>
                                                      <th style="width:35%">Annexure Description</th>
                                                      <th style="width:20%">Attachment</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td><input type="text" class="form-control" name="annexure_reference[]"></td>
                                                      <td><input type="text" class="form-control" name="annexure_description[]"></td>
                                                      <td><input type="file" class="form-control" name="pdf_files" accept=".pdf"></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                             
              <div style="text-align:right; float:right;"><input type="button" class="fa fa-plus add-row-asset btn btn-block bg-gradient-success" value="+" /></div>
                                                
                                                
                                                
                                                   
                                  </div>