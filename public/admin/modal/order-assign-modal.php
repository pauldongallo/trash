<!-- Modal -->
<!-- Sender's Information -->
<form id="sender_form">
	<div class="modal fade" id="senderInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  	<div class="col-md-8">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Sender's Information</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body">
			      		<input type="hidden" name="modal_order_id" value="<?php echo $wc_orders->id; ?>" />
		        		<input type="hidden" name="sender_customer_id" value="<?php echo $new_array['billing'][0]['customer_id']; ?>" />
						<div class="form-group row">
						    <label for="firstName" class="col-sm-3 col-form-label"><strong class="stdard_font_label">First Name</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="first_name" value="<?php echo $new_array['billing'][0]['first_name']; ?>" placeholder="First name">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Last Name</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="last_name" value="<?php echo $new_array['billing'][0]['last_name']; ?>" placeholder="Last name">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="company" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Company</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="company" value="<?php echo $new_array['billing'][0]['company']; ?>" placeholder="Company">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Country</strong></label>
						    <div class="col-sm-6">		
						      	<!-- <input type="text" class="form-control" disabled name="country" id="postalCodeZip" value="<?php //echo $new_array['billing'][0]['country']; ?>" placeholder=""> -->
						   		<input type="hidden" id="sender_current_country" value="<?php echo $new_array['billing'][0]['country']; ?>" />
						   		<select id="countryBase" name="country_base" class="form-control form-control-sm">
								</select>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Street address</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="address_1" value="<?php echo $new_array['billing'][0]['address_1']; ?>" placeholder="House number and street name">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="streetAddressOpt" class="col-sm-3 col-form-label"></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="address_2" value="<?php echo $new_array['billing'][0]['address_2']; ?>" placeholder="Apartment, suite, unit etc.(optional)">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="townCity" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Town/City</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="city" value="<?php echo $new_array['billing'][0]['city']; ?>" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="stateCountry" class="col-sm-3 col-form-label"><strong class="stdard_font_label">State/Country</strong></label>
						    <div class="col-sm-6">
						       <input type="hidden" class="form-control" id="sender_current_state" value="<?php echo $new_array['billing'][0]['state']; ?>" placeholder="">					     			     
						   		<select id="modal_billing_state" name="country_state" class="form-control form-control-sm">
								</select>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">PostCode/Zip</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="postal_code_zip" value="<?php echo $new_array['billing'][0]['postcode']; ?>" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Email</strong></label>
						    <div class="col-sm-6">
						      <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $new_array['billing'][0]['email']; ?>" placeholder="">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Phone</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="phone" value="<?php echo $new_array['billing'][0]['phone']; ?>"placeholder="Phone">
						    </div>
						</div>
						<h5 class="card-title">Instant Messaging</h5>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Facebook</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="billing_im_facebook" value="<?php echo $var = isset($orders['billing_facebook'][0]['billing_facebook']) ? $orders['billing_facebook'][0]['billing_facebook'] : $orders['billing_facebook'][0]['billing_facebook'] = ""; ?>" placeholder="">
						   		
						   </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">WeChat</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="billing_im_wechat" value="<?php echo $var = isset($orders['billing_wechat'][0]['billing_wechat']) ? $orders['billing_wechat'][0]['billing_wechat'] : $orders['billing_wechat'][0]['billing_wechat'] = ""; ?>" placeholder="">

						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">WhatsApp</strong></label>
						    <div class="col-sm-6">
						      	<input type="text" class="form-control form-control-sm" name="billing_im_whatsapp" value="<?php echo $var = isset($orders['billing_whatsapp'][0]['billing_whatsapp']) ? $orders['billing_whatsapp'][0]['billing_whatsapp'] : $orders['billing_whatsapp'][0]['billing_whatsapp'] = ""; ?>" placeholder="">						    
						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Skype</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="billing_im_skype"  value="<?php echo $var = isset($orders['billing_skype'][0]['billing_skype']) ? $orders['billing_skype'][0]['billing_skype'] : $orders['billing_skype'][0]['billing_skype'] = ""; ?>" placeholder="">

						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Viber</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="billing_im_viber" value="<?php echo $var = isset($orders['billing_viber'][0]['billing_viber']) ? $orders['billing_viber'][0]['billing_viber'] : $orders['billing_viber'][0]['billing_viber'] = ""; ?>" placeholder="">						      
						    </div>
						</div>
			     	</div>
				    <div class="modal-footer">				   
			     	   	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      	  	<button type="button" id="updateSenderInfo" class="btn btn-primary">Save changes</button>
			      	  	<input type="hidden" name="update_sender_info" value="update" />
				    </div>
				    <div class="col-md-12">
			        	<div class="alert alert-danger updating_info text-center" role="alert">
							 updating sender information...please wait
						</div>
				    </div>
			    </div>
	  		</div>
		</div>	
	</div>
</form>
<!-- Receiver's Information -->
<form id="receiver_form">
	<div class="modal fade" id="receiverInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  	<div class="col-md-8">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Receiver's Information</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body">
			        	<form id="formSendersInfo">        		
			        		<input type="hidden" name="receiver_modal_order_id" value="<?php echo $wc_orders->id; ?>" />
			        		<input type="hidden" name="receiver_customer_id" value="<?php echo $new_array['billing'][0]['customer_id']; ?>" />
							<div class="form-group row">
							    <label for="firstName" class="col-sm-3 col-form-label"><strong class="stdard_font_label">First Name</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_first_name" value="<?php echo $orders['shipping'][0]['first_name']; ?>" placeholder="First name">							      
							    </div>
							</div>
							<div class="form-group row">
							    <label for="lastName" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Last Name</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_last_name" value="<?php echo $new_array['shipping'][0]['last_name']; ?>" placeholder="Last name">
							    </div>
							</div>
							<div class="form-group row">
							    <label for="company" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Company</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_company" value="<?php echo $new_array['shipping'][0]['company']; ?>" placeholder="Company">
							    </div>
							</div>
							<div class="form-group row">							
							    <label for="Country" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Country</strong></label>
							    <div class="col-sm-6">
							    	<input type="hidden" id="inputTypeCurrentReceiverCountry" value="<?php echo $new_array['shipping'][0]['country']; ?>" />
							    	<select id="modalSelectCurrentReceiverCountry" disabled="disabled" name="receiver_country" class="form-control form-control-sm">
									</select>
							    </div>
							</div>
							<div class="form-group row">
							    <label for="streetAddress" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Street address</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_address_1" value="<?php echo $new_array['shipping'][0]['address_1']; ?>" placeholder="House number and street name">
							    </div>
							</div>
							<div class="form-group row">
							    <label for="streetAddressOpt" class="col-sm-3 col-form-label"></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_address_2" value="<?php echo $new_array['shipping'][0]['address_2']; ?>" placeholder="Apartment, suite, unit etc.(optional)">
							    </div>
							</div>
							<div class="form-group row">
							    <label for="townCity" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Town/City</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_city" value="<?php echo $new_array['shipping'][0]['city']; ?>" placeholder="">
							    </div>
							</div>
							<div class="form-group row">
							    <label for="stateCountry" class="col-sm-3 col-form-label"><strong class="stdard_font_label">State/Country</strong></label>
							    <div class="col-sm-6">						      
							       <input type="hidden" class="form-control" id="inputTypeCurrentReceiverState" value="<?php echo $new_array['billing'][0]['state']; ?>" >
							       <select id="modalSelectCurrentReceiverState" name="receiver_state" class="form-control form-control-sm">
									</select>
							    </div>
							</div>
							<div class="form-group row">
							    <label for="postalCodeZip" class="col-sm-3 col-form-label"><strong class="stdard_font_label">PostCode/Zip</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_postal_code_zip" value="<?php echo $new_array['shipping'][0]['postcode']; ?>" placeholder="">
							    </div>
							</div>
							<div class="form-group row">
							    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Phone</strong></label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control form-control-sm" name="receiver_phone" value="<?php echo $new_array['shipping_phone'][0]['phone']; ?>"placeholder="Phone">
							    </div>
							</div>
							<h5 class="card-title">Instant Messaging</h5>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Facebook</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="shipping_im_facebook" value="<?php echo $var = isset($orders['shipping_facebook'][0]['shipping_facebook']) ? $orders['shipping_facebook'][0]['shipping_facebook'] : $orders['shipping_facebook'][0]['shipping_facebook'] = ""; ?>" placeholder="">						     
						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">WeChat</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="shipping_im_wechat" value="<?php echo $var = isset($orders['shipping_wechat'][0]['shipping_wechat']) ? $orders['shipping_wechat'][0]['shipping_wechat'] : $orders['shipping_wechat'][0]['shipping_wechat'] = ""; ?>" placeholder=""> 
						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">WhatsApp</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="shipping_im_whatsapp" value="<?php echo $var = isset($orders['shipping_whatsapp'][0]['shipping_whatsapp']) ? $orders['shipping_whatsapp'][0]['shipping_whatsapp'] : $orders['shipping_whatsapp'][0]['shipping_whatsapp'] = ""; ?>" placeholder="">				      
						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Skype</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="shipping_im_skype" value="<?php echo $var = isset($orders['shipping_skype'][0]['shipping_skype']) ? $orders['shipping_skype'][0]['shipping_skype'] : $orders['shipping_skype'][0]['shipping_skype'] = ""; ?>" placeholder="">						      
						    </div>
						</div>
						<div class="form-group row">
						    <label for="phone_reciever" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Viber</strong></label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control form-control-sm" name="shipping_im_viber" value="<?php echo $var = isset($orders['shipping_viber'][0]['shipping_viber']) ? $orders['shipping_viber'][0]['shipping_viber'] : $orders['shipping_viber'][0]['shipping_viber'] = ""; ?>" placeholder="">

						    </div>
						</div>
						</form>
			     	</div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" id="updateReceiverInfo" class="btn btn-primary">Save changes</button>
				        <input type="hidden" name="update_receiver_info" value="update" />
				    </div>
				    <div class="col-md-12">
			        	<div class="alert alert-danger updating_info text-center" role="alert">
							 updating receiver information...please wait
						</div>
				    </div>
			    </div>
	  		</div>
		</div>	
	</div>
</form>
<!-- Order Information -->
<form id="deliveryDate">
	<div class="modal fade" id="orderInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="margin-left: 31%;">
		  	<div class="col-md-5">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"> Delivery Date </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body">			      			 
			      			<label for="exampleInputEmail1"> Delivery Date (mm/dd/yyyy) </label>	        	  
			        		<div class="col-md-5">
								<div class="form-group">						   
								    <div class="input-group date">
								    	<input type="hidden" name="order_id_delivery_date" value="<?php echo $wc_orders->id; ?>" />
									    <input type="text" id="deliver_date" class="form-control" name="order_delivery_date" value="<?php echo $new_array['delivery_info'][0]['delivery_date']; ?>" placeholder="mm/dd/yyyy">
									    <div class="input-group-addon">
									        <span class="glyphicon glyphicon-th"></span>
									    </div>
									</div>
								</div>
							</div>
						</form>
			     	</div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" id="updateOrdeDeliveryDate" class="btn btn-primary">Save changes</button>
				        <input type="hidden" name="update_order_info" value="update" />
				    </div>
				     <div class="col-md-12">
			        	<div class="alert alert-danger updating_info text-center" role="alert">
							 updating Delivery Date...please wait
						</div>
				    </div>
			    </div>
	  		</div>
		</div>	
	</div>
</form>
<!-- Message On Card -->
<form id="messageOnCard">
	<div class="modal fade" id="messageOnCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="margin-left: 31%;">
		  	<div class="col-md-8">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"> Message On Card </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body">		      			 	        	  
		        		<div class="col-md-12">	
		        			<input type="hidden" name="order_id_message_on_card" value="<?php echo $wc_orders->id; ?>" />
		        			<textarea class="form-control" name="message_on_card" rows="8"><?php echo $new_array['customer_notes'][0]['message_on_card']; ?></textarea>					
						</div>
			     	</div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" id="updateMessageOnCard" class="btn btn-primary">Save changes</button>
				        <input type="hidden" name="update_message_on_card" value="update" />
				    </div>
				     <div class="col-md-12">
			        	<div class="alert alert-danger updating_info text-center" role="alert">
							 updating message on card...please wait
						</div>
				    </div>
			    </div>
	  		</div>
		</div>	
	</div>
</form>
<!-- Special Delivery Instruction -->
<form id="specialDeliveryInstruction">
	<div class="modal fade" id="specialDeliveryInstructionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="margin-left: 31%;">
		  	<div class="col-md-8">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"> Special Delivery Instructions </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body">		      			 	        	  
		        		<div class="col-md-12">	
		        			<input type="hidden" name="order_id_delivery_special_instruction" value="<?php echo $wc_orders->id; ?>" />
		        			<?php 
	        					if( isset($orders['special_instruction'])){
	        						$special_instruction = $orders['special_instruction'];
	        					} else {
	        						$special_instruction = $orders['special_instruction']="";
	        					}
	        				?>	
		        			<textarea class="form-control" name="special_delivery_instruction" rows="8" style="text-align:left;" ><?php echo $special_instruction; ?></textarea>					
						</div>
			     	</div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" id="updateSpecialDeliveryInstruction" class="btn btn-primary">Save changes</button>
				        <input type="hidden" name="update_special_delivery_instruction" value="update" />
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

<div class="modal" id="orViewNotes" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Notes </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<?php foreach($allnotes as $all){

       		if(isset($all['title'])){
       			$note_title = $all['title'];
       			$set_note_title = $note_title;		
       		} else {
       			$note_title = "";
       			$set_note_title = $note_title;	
       		}
       		echo $set_note_title."<br>";

       		if(isset($all['note_event'])){
       			$note_event = $all['note_event'];
       			$set_note_event= $note_event;		
       		} else {
       			$note_event = "";
       			$set_note_event = $note_event;	
       		}
       		echo $set_note_event;
  
       		if(isset($all['content'])){
       			$note_content = $all['content'];
       			$set_note_content= "<br>".$note_content;		
       		} else {
       			$note_content = "";
       			$set_note_content = $note_content;	
       		}
       		echo $set_note_content;
       		    
       		if(isset($all['note_assigned_by'])){
       			$note_assigned_by = $all['note_assigned_by'];
       			$set_note_assigned_by = "Assigned By: ".$note_assigned_by;		      		
       		} else {
       			$note_assigned_by = "";
       			$set_note_assigned_by = $note_assigned_by;	
       		}
       		echo $set_note_assigned_by."<br><br>";

       	}?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
