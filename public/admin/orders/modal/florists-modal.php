<!-- Add New Florists Dashboard -->
<form id="addNewFlorist">
	<div class="modal fade" id="addNewFloristhsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="margin-left: 31%;">
		  	<div class="col-md-10">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"> Add New Florist </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body">		      			 	        	  
						<div class="form-group row">
						    <label for="firstName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Name </strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="add_florist_name">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Contact Person </strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="add_contact_person">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Mobile No. </strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="add_mobile_no" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Telephone No. </strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="add_telephone_no" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Email. </strong></label>
						    <div class="col-sm-6">
						      <input type="email" class="form-control form-control-sm" name="add_email" placeholder="">
						    </div>
						</div>				
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Country</strong></label>
					    	<div class="col-sm-6">
					    		<input type="hidden" id="addCountryFullName" />
					    		<select name="add_country" id="add_country" class="form-control form-control-sm"></select>				   			
					   		</div>	
						</div>			
						<div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Street address </strong></label>
						    <div class="col-sm-6">
						      <input type="text" name="add_address_1" class="form-control form-control-sm"  placeholder="House and number and street name">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label sr-only"> Address 2 </strong></label>
						    <div class="col-sm-6">
						      <input type="text"  name="add_address_2" class="form-control form-control-sm" placeholder="Apartment, suite, unit etc.(optional)">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Town/City </strong></label>
						    <div class="col-sm-6">
						      <input type="text" id="add_city" name="add_city" class="form-control form-control-sm" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="townCity" class="col-sm-3 col-form-label"><strong class="stdard_font_label">State/Country</strong></label>
						    <div class="col-sm-6">
						    	<input type="hidden" id="addStateFullName" />
						      	<select id="add_state" name="add_state" class="form-control form-control-sm"></select>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">PostCode/Zip</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="postal_code_zip" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Latitude</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="latitude" placeholder="">
						    </div>
						</div>		
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Longitude</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="longitude" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label">
						    	<strong class="stdard_font_label">
						    		Info						
								</strong>
							</label>
						    <div class="col-sm-6">
						     	<button type="button" id="view_on_google_maps" class="btn btn-info"><i class="fas fa-globe-asia fa-1x"></i> View on Google Maps</button>
						    </div>
						</div>	
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Status</strong></label>
						    <div class="col-sm-6">							     	
								<select class="form-control" name="status">
							      <option value="Active">Active</option>
							      <option value="Inactive">InActive</option>
							    </select>
						    </div>
						</div>
			     	</div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" id="addFlorist" class="btn btn-primary">Save changes</button>						
				    </div>
				     <div class="col-md-12">
			        	<div class="alert alert-danger updating_info text-center" role="alert">
							 updating special delivery insructions...please wait
						</div>
				    </div>
			    </div>
	  		</div>
		</div>	
	</div>
</form>

<!-- Edit Florist -->
<form id="updateFlorist">
	<input type="hidden" name="floristID" />
	<div class="modal fade" id="editFloristhsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="margin-left: 31%;">
		  	<div class="col-md-10">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"> Edit Florist </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="edit-florist-md-body modal-body">			      		
			      		<div class="form-group row">
						    <label for="firstName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Name  </strong></label>
						    <div class="col-sm-6">
						     	<input type="text"  name="edit_florist_name" class="form-control form-control-sm">
						   </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Contact Person </strong></label>
						    <div class="col-sm-6">
						     	<input type="text" name="edit_contact_person" class="form-control form-control-sm">
						   </div>
						</div>
						<div class="form-group row">
						   	<label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Mobile No. </strong></label>
						    <div class="col-sm-6">
						      	<input type="text" name="edit_mobile_no" class="form-control form-control-sm">
						    </div>
						</div>
						<div class="form-group row">
						   <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Telephone No. </strong></label>
						    <div class="col-sm-6">
						      	<input type="text" name="edit_telephone_no" class="form-control form-control-sm">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Email. </strong></label>'
						    <div class="col-sm-6">
						      	<input type="email" name="edit_email" class="form-control form-control-sm">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Country</strong></label>
					    	<div class="col-sm-6">	
					    		<input type="hidden" id="editCountryFullName" />				    		
					    		<select id="edit_country" name="edit_country" class="form-control form-control-sm"></select>
					   		</div>
						</div>
					   <div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Street address </strong></label>
						    <div class="col-sm-6">
						      <input type="text" name="edit_address_1" class="form-control form-control-sm"  placeholder="House and number and street name">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label sr-only"> Address 2 </strong></label>
						    <div class="col-sm-6">
						      <input type="text"  name="edit_address_2" class="form-control form-control-sm" placeholder="Apartment, suite, unit etc.(optional)">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Town/City </strong></label>
						    <div class="col-sm-6">
						      <input type="text" id="edit_city" name="edit_city" class="form-control form-control-sm" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="townCity" class="col-sm-3 col-form-label"><strong class="stdard_font_label">State/Country</strong></label>
						    <div class="col-sm-6">
						    	<input type="hidden" id="editStateFullName" />	
						      	<select id="edit_state" name="edit_state" class="form-control form-control-sm"></select>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">PostCode/Zip</strong></label>
						    <div class="col-sm-6">
						      <input type="text" id="edit_postal_code_zip" class="form-control form-control-sm" name="edit_postal_code_zip">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Latitude</strong></label>
						    <div class="col-sm-6">
						      <input type="text" id="edit_latitude" class="form-control form-control-sm" name="edit_latitude">
						    </div>
						</div> 
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Longitude</strong></label>
						    <div class="col-sm-6">
						      <input type="text" id="edit_longitude" class="form-control form-control-sm" name="edit_longitude">
						    </div>
						</div> 
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label">
						    	<strong class="stdard_font_label">
						    		Info						
								</strong>
							</label>
						    <div class="col-sm-6">
						     	<button type="button" id="edit_view_on_google_maps" class="btn btn-info"><i class="fas fa-globe-asia fa-1x"></i> View on Google Maps</button>
						    </div>
						</div>	
						<div class="form-group row">
						   	<label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Status</strong></label>
						    <div class="col-sm-6">		
								<select id="editStatus" class="form-control" name="edit_status">
									<option value="Active">Active</option>
							      	<option value="Inactive">InActive</option>
							    </select>
						    </div>
						</div>
			      	</div>	
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" id="addFlorist" class="btn btn-primary">Save changes</button>						
				    </div>
				     <div class="col-md-12">
			        	<div class="alert alert-danger updating_info text-center" role="alert">
							 updating special delivery insructions...please wait
						</div>
				    </div>
			    </div>
	  		</div>
		</div>	
	</div>
</form>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-left: 31%;">
	  	<div class="col-md-10">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">  </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<div class="modal-body">			      		
					<div class="alert alert-danger" role="alert">
						The <span class="florist_name text-danger"></span> you are tying to delete has a history of Orders - You cannot DELETE
					</div>
		      	</div>	
			    <div class="modal-footer">
			        <button type="button" id="" class="btn btn-secondary" data-dismiss="modal">Close</button>					
			    </div>
		    </div>
  		</div>
	</div>	
</div>

<div class="modal fade optiondelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-left: 31%;">
	  	<div class="col-md-10">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<div class="florist-modal-content modal-body">	
		      		<input type="hidden" name="delete_florist" value="">		      		
				    Are you sure you want to delete? <span class="florist_name text-danger"></span>
		      	</div>	
			    <div class="modal-footer">
			        <button type="button" class="close_option_florist btn btn-secondary" data-dismiss="modal">Close</button>
				    <button type="submit" id="deleteFlorist" class="btn btn-danger">Yes</button>					
			    </div>
		    </div>
  		</div>
	</div>	
</div>
