<?php 
require_once('../../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');
require_once(CLASS_PATH.'/note.php');
require_once(SERVICE_PATH.'/order-assign.php');


$agent_notes = $note->agent_notes();

foreach($agent_notes as $notes){
	$order_id = $notes['cmb2']['note_metabox']['note_agent_note_id'];
	$note_unique = $notes['cmb2']['note_metabox']['note_unique'];
	/** 
	** OPERATOR ASSIGNED / Latest notes
	**/
	if($order_id ==  $wc_orders->id && $note_unique == "OP" ){
		$notes['id'];
		$order_id;
		$notes_content = $notes['content']['rendered'];
		$title_notes = $notes['title']['rendered'];
		$note_event = $notes['cmb2']['note_metabox']['note_event'];
		$note_related_id = $notes['cmb2']['note_metabox']['note_related_id'];
		$note_assigned_by = $notes['cmb2']['note_metabox']['note_assigned_by'];
		break;
	}

	/** 
	** 	Dispatch Status / Latest notes
	**/
	if($order_id == $wc_orders->id && $note_unique == "DS"){
		$notes['id'];
		$order_id;
		$notes_content = $notes['content']['rendered'];
		$title_notes = $notes['title']['rendered'];
		$note_event = $notes['cmb2']['note_metabox']['note_event'];
		$note_related_id = $notes['cmb2']['note_metabox']['note_related_id'];
		break;
	}

	/** 
	** 	Florist Name / Latest notes
	**/
	if($order_id == $wc_orders->id && $note_unique == "FA"){
		$notes['id'];
		$order_id;
		$notes_content = $notes['content']['rendered'];
		$title_notes = $notes['title']['rendered'];
		$note_event = $notes['cmb2']['note_metabox']['note_event'];
		$note_related_id = $notes['cmb2']['note_metabox']['note_related_id'];
		break;
	}

	/** 
	** 	Pay to  florist / Latest notes
	**/
	if($order_id == $wc_orders->id && $note_unique == "PF"){
		$notes['id'];
		$order_id;
		$notes_content = $notes['content']['rendered'];
		$title_notes = $notes['title']['rendered'];
		$note_event = $notes['cmb2']['note_metabox']['note_event'];
		$note_related_id = $notes['cmb2']['note_metabox']['note_related_id'];
		break;
	}

	/** 
	** 	Note Added / Latest notes
	**/
	if($order_id == $wc_orders->id && $note_unique == "NT"){
		$notes['id'];
		$order_id;
		$notes_content = $notes['content']['rendered'];
		$title_notes = $notes['title']['rendered'];
		$note_event = $notes['cmb2']['note_metabox']['note_event'];
		$note_related_id = $notes['cmb2']['note_metabox']['note_related_id'];
		break;
	}
}

$fruitArrayObject = new ArrayObject($agent_notes);
$fruitArrayObject->asort();

foreach($fruitArrayObject as $notes){
	$order_id = $notes['cmb2']['note_metabox']['note_agent_note_id'];
	if($order_id ==  $wc_orders->id){
		$allnotes[]=[
			'content' => $notes['content']['rendered'],
			'title' => $notes['title']['rendered'],
			'note_event' => $notes['cmb2']['note_metabox']['note_event'],
			'note_assigned_by' => $notes['cmb2']['note_metabox']['note_assigned_by']
		];
	}
}

if(!empty($orders['agent_pay_to_florist'])){
	$agent_pay_florist = $orders['agent_pay_to_florist'];
} else {
	$agent_pay_florist = "";
}

if(!empty($orders['notes_agent'])){
	$notes_agent_customer = $orders['notes_agent'];
} else {
	$notes_agent_customer = "";
}

if(isset($orders['assign_agent_id'])){
	$assign_agent_id=$orders['assign_agent_id'];
} else {
	$assign_agent_id="";
}

$dispatch_status = $order_obj::dispatch_status_order_assign($order_obj::DISPATCH_STATUS);

$new_array=[
 	'billing'				=> $orders['billing'],
 	'delivery_info' 		=> $orders['delivery_info'],
 	'time_order_date' 		=> $orders['time_order_date'],
 	'product_title' 		=> $orders['product_title'],
 	'occasion_type' 		=> $orders['occasion_type'], 
 	'add_on_name'			=> $orders['add_on_name'],
 	'add_on_price'			=> $orders['add_on_price'],
 	'item_price'			=> $orders['item_price'],
 	'shipping_lines' 		=> $orders['shipping_lines'],
 	'order_amount' 			=> $orders['order_amount'],
 	'customer_notes' 		=> $orders['customer_notes'],
 	'shipping' 				=> $orders['shipping'],
 	'shipping_phone' 		=> $orders['shipping_phone'],
 	'build_list' 			=> $orders['build_list'],
 	'agent_pay_to_florist' 	=> $agent_pay_florist,
 	'dispatch_status' 		=> $dispatch_status,
 	'notes_agent' 			=> $notes_agent_customer,
 ];

$billing_address1 	= $new_array['billing'][0]['address_1'];
$billing_address2	= $new_array['billing'][0]['address_2'];
$billing_town_city 	= $new_array['billing'][0]['city'];
$billing_state 	  	= $new_array['billing'][0]['state'];
$billing_country 	= $new_array['billing'][0]['country'];
$billing_postcode	= $new_array['billing'][0]['postcode'];

if(empty($billing_address1)){
	$b_address = " ";
} else {
	$b_address = $billing_address1.", ";
}

if(empty($billing_address2)){
	$b_address2 = "";
} else {
	$b_address2 = $billing_address2.", ";
}

if(empty($billing_town_city)){
	$b_town_city ="";
} else {
	$b_town_city = $billing_town_city.", ";
}

if(empty($billing_state)){
	$b_state = "";
} else {
	$b_state = $billing_state.", ";
}

if(empty($billing_country)){
	$b_country = "";
} else {
	$b_country = $billing_country.", ";
}

if(empty($billing_postcode)){
	$b_postcode = "";
} else {
	$b_postcode = $billing_postcode;
}
$info_address = $b_address.$b_address2.$b_town_city.$b_state.$b_country.$b_postcode;

$shipping_address1 	= $new_array['shipping'][0]['address_1'];
$shipping_address2	= $new_array['shipping'][0]['address_2'];
$shipping_town_city 	= $new_array['shipping'][0]['city'];
$shipping_state 	  	= $new_array['shipping'][0]['state'];
$shipping_country 	= $new_array['shipping'][0]['country'];
$shipping_postcode	= $new_array['shipping'][0]['postcode'];

if(empty($shipping_address1)){
	$s_address = " ";
} else {
	$s_address = $shipping_address1.", ";
}

if(empty($shipping_address2)){
	$s_address2 = "";
} else {
	$s_address2 = $shipping_address2.", ";
}

if(empty($shipping_town_city)){
	$s_town_city ="";
} else {
	$s_town_city = $shipping_town_city.", ";
}

if(empty($shipping_state)){
	$s_state = "";
} else {
	$s_state = $shipping_state.", ";
}

if(empty($shipping_country)){
	$s_country = "";
} else {
	$s_country = $shipping_country.", ";
}

if(empty($shipping_postcode)){
	$s_postcode = "";
} else {
	$s_postcode = $shipping_postcode;
}
$info_shipping_address = $s_address.$s_address2.$s_town_city.$s_state.$s_country.$s_postcode;

$shipping_address1 	= $new_array['shipping'][0]['address_1'];
$shipping_address2	= $new_array['shipping'][0]['address_2'];
$shipping_town_city 	= $new_array['shipping'][0]['city'];
$shipping_state 	  	= $new_array['shipping'][0]['state'];
$shipping_country 	= $new_array['shipping'][0]['country'];
$shipping_postcode	= $new_array['shipping'][0]['postcode'];

if(empty($shipping_address1)){
	$s_address = " ";
} else {
	$s_address = $shipping_address1.", ";
}

if(empty($shipping_address2)){
	$s_address2 = "";
} else {
	$s_address2 = $shipping_address2.", ";
}

if(empty($shipping_town_city)){
	$s_town_city ="";
} else {
	$s_town_city = $shipping_town_city.", ";
}

if(empty($shipping_state)){
	$s_state = "";
} else {
	$s_state = $shipping_state.", ";
}

if(empty($shipping_country)){
	$s_country = "";
} else {
	$s_country = $shipping_country.", ";
}

if(empty($shipping_postcode)){
	$s_postcode = "";
} else {
	$s_postcode = $shipping_postcode;
}
$info_shipping_address = $s_address.$s_address2.$s_town_city.$s_state.$s_country.$s_postcode;

$page_title = 'Opening Order';
include(SHARED_PATH.'/admin_header.php'); ?>

<div class="wrapper" style="width:100%;height:100%;">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
	<div id="content">
		<div class="container-fluid">
		  	<div class="row">
			    <div class="col">
			      	<h3 class="h3"> Order #<?php echo $wc_orders->number; ?> </h3>
			    </div>
			    <?php include(SHARED_PATH.'/username.php'); ?>
			</div>
		</div>
		<input type="hidden" name="page_title" value="<?php echo $page_title;?> ">
		<form id="OpeningOrderForm" action="<?php echo url_for('../private/service/order-assign-update.php');?>" method="POST"> 
			<input type="hidden" name="order_id" value="<?php echo $wc_orders->id; ?>" />
			<input type="hidden" name="dispatch_status_id" value="" />
			<table class="table-responsive orders-assign table table-borderless table-sm" >
			  <tbody>
			      	<td> 		      		
			      		<table class="table table-borderless table-sm">
			      			<thead>
			      				<tr> 
			      					<td scope="col" colspan="2">
				      					<h5 class="float-left"> <strong> Sender's Information </strong> </h5>
				      					<p class="float-left" style="padding-left:10px;"><a href="#" data-toggle="modal" id="currentSenderInfo" data-target="#senderInfoModal" ><i class="fas fa-edit text-primary"></i></a>
				      						<i class="fas fa-question-circle text-info" data-toggle="tooltip" data-placement="top" title="this will open a form to make changes on the info" ></i> 
				      					</p>
				      					<p class="float-left" style="padding-left:5px;">
				      						<a href="#" id="findSenderInfo" onClick="window.open('http://maps.google.com.au/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo $info_address;?>&ie=UTF8&z=17&iwloc=addr')" > <i class="fas fa-globe-asia fa-1x text-info"></i> </a>
				      					</p>
			      					</td>
			      				</tr>
			      			</thead>
			      			<tbody>
			      				<tr>
						      		<td scope="col" style="text-align:right;"><strong>Name<strong></td>		
						      		<td>
						      			<?php
						      				foreach($new_array['billing'] as $billing ){
												echo "<span class='none_bold'>".$billing_html[] = $billing['first_name']." ".$billing['last_name']."</span>";
											}
						      			 ?>					
						      		</td>				      	
						    	</tr>
							    <tr>
							      	<td class="align-top" style="text-align:right;"><strong>Address<strong></td>
							      	<td>								      		
							      		<input type="hidden" id="billingCountry" value="<?php echo $new_array['billing'][0]['country'] ?>" />
							      		<input type="hidden" id="billingState" value="<?php echo $new_array['billing'][0]['state'] ?>" />				      			      				
				
						      			<span class="none_bold"><?php echo $billing_address1; ?><br></span>
						      			<span class="none_bold"><?php echo $billing_address2; ?><br></span>
						      			<span class="none_bold"><?php echo $billing_town_city; ?><br></span>
						      			<span class="none_bold"><?php echo $billing_state; ?><br></span>
						      			<span class="none_bold"><?php echo $billing_country; ?><br></span>
						      			<span class="none_bold"><?php echo $billing_postcode; ?><br></span>
							      	</td>
							    </tr>
							    <tr>
							    	<td scope="col" style="text-align:right;"><strong>Email<strong></td>
							    	<td> 
							    		<?php
							    			foreach($new_array['billing'] as $billing ){
												echo "<span class='none_bold'>".$billing_email[]=$billing['email']."</span><br>";
											}
							    		?>
							    	</td>
							    </tr>
							    <tr>
							    	<td scope="col" style="text-align:right;"><strong>Phone<strong></td>
							    	<td>
							    		<?php
							    			foreach($new_array['billing'] as $billing ){
												echo "<span class='none_bold'>".$billing_phone[]=$billing['phone']."</span><br>";
											}
							    		?>
							    	</td>
							    </tr>
							    <tr>
			      					<td style="text-align:right;"><strong>Facebook</strong></td>
			      					<td> 
			      						<?php 
			      						if(isset($orders['billing_facebook'][0]['billing_facebook'])){
			      							$billing_facebook = $orders['billing_facebook'][0]['billing_facebook'];
			      						} else {
			      							$billing_facebook = "";
			      						}
			      						echo $billing_facebook;
			      						?>
			      					</td>
							    </tr>
							    <tr>
			      					<td style="text-align:right;"><strong>WeChat</strong></td>
			      					<td> 			      				
			      						<?php 
			      						if(isset($orders['billing_wechat'][0]['billing_wechat'])){
			      							$billing_wechat = $orders['billing_wechat'][0]['billing_wechat'];
			      						} else {
			      							$billing_wechat = "";
			      						}
			      						echo $billing_wechat;
			      						?>
			      					</td>
							    </tr>
							    <tr>
			      					<td style="text-align:right;"><strong>WhatsApp</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['billing_whatsapp'][0]['billing_whatsapp'])){
				      							$billing_whatsapp = $orders['billing_whatsapp'][0]['billing_whatsapp'];
				      						} else {
				      							$billing_whatsapp = "";
				      						}
				      						echo $billing_whatsapp;
			      						?>
			      					</td>
							    </tr>
							    <tr>
			      					<td style="text-align:right;"><strong>Skype</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['billing_skype'][0]['billing_skype'])){
				      							$billing_skype = $orders['billing_skype'][0]['billing_skype'];
				      						} else {
				      							$billing_skype = "";
				      						}
				      						echo $billing_skype;
			      						?>
			      					</td>
							    </tr>
							    <tr>
			      					<td style="text-align:right;"><strong>Viber</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['billing_viber'][0]['billing_viber'])){
				      							$billing_viber = $orders['billing_viber'][0]['billing_viber'];
				      						} else {
				      							$billing_viber = "";
				      						}
				      						echo $billing_viber;
			      						?>
			      					</td>
							    </tr>
							    <tr>
							    	<td rowspan="2"></td>
							    </tr>
							  </tbody>
							<thead>
			      				<tr> 
			      					<td scope="col" colspan="2">
			      						<h5 class="float-left"><strong> Receiver's Information</strong> </h5>
		      							<p class="float-left" style="padding-left:10px;"><a href="#" data-toggle="modal" data-target="#receiverInfoModal" ><i class="fas fa-edit text-primary"></i></a>
		      								<i class="fas fa-question-circle text-info" data-toggle="tooltip" data-placement="top" title="this will open a form to make changes on the info" ></i> 
			      						</p>  
			      						<p class="float-left" style="padding-left:5px;">
											<a href="#" id="findSenderInfo" onClick="window.open('http://maps.google.com.au/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo $info_shipping_address;?>&ie=UTF8&z=17&iwloc=addr')" > <i class="fas fa-globe-asia fa-1x text-info"></i> </a>
										</p> 					
			      					</td>
			      				</tr>
			      			</thead>
			      			<tbody>
			      				<tr>
			      					<td style="text-align:right;"><strong>Name</strong></td>	
			      					<td>
						      			<?php
						      				foreach($new_array['shipping'] as $shipping ){
												echo "<span class='none_bold'>".$shipping['first_name']." ".$shipping['last_name']."</span><br>";
											}
						      			 ?>					
						      		</td>	
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;"><strong>Address</strong></td>
			      					<td> 
			      						<input type="hidden" id="ground_receiver_country" value="<?php echo $new_array['shipping'][0]['country'] ?>" />
			      						<input type="hidden" id="ground_receiver_state" value="<?php echo $new_array['shipping'][0]['state'] ?>" />
			      						<?php
			      							foreach($new_array['shipping'] as $shipping ){
												$shipping_info_html[]=$shipping['address_1'];
												$shipping_info_html[]=$shipping['address_2'];
												$shipping_info_html[]=$shipping['city'];
												$shipping_info_html[]=$shipping['state'];									
												$shipping_info_html[]=$shipping['country'];
												$shipping_info_html[]=$shipping['postcode'];
											}
											foreach($shipping_info_html as $shipp_value)
											{
												echo "<span class='none_bold'>".$shipp_value."</span></br>";
											}
			      						?>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;"><strong>Phone</strong></td>
			      					<td> 
			      						<?php 
			      							foreach($new_array['shipping_phone'] as $shipping_phone ){
												echo $shipping_info_html[]="<span class='none_bold'>".$shipping_phone['phone']."</span><br>";
											}
			      						?>
			      					</td>
			      				</tr>	
			      				<tr>
			      					<td style="text-align:right;"><strong>Facebook</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['shipping_facebook'][0]['shipping_facebook'])){
				      							$shipping_facebook = $orders['shipping_facebook'][0]['shipping_facebook'];
				      						} else {
				      							$shipping_facebook = "";
				      						}
				      						echo $shipping_facebook;
			      						?>
			      					</td>
			      				</tr>	
			      				<tr>
			      					<td style="text-align:right;"><strong>WeChat</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['shipping_wechat'][0]['shipping_wechat'])){
				      							$shipping_wechat = $orders['shipping_wechat'][0]['shipping_wechat'];
				      						} else {
				      							$shipping_wechat = "";
				      						}
				      						echo $shipping_wechat;
			      						?>
			      					</td>
			      				</tr>	
			      				<tr>
			      					<td style="text-align:right;"><strong>WhatsApp</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['shipping_whatsapp'][0]['shipping_whatsapp'])){
				      							$shipping_whatsapp = $orders['shipping_whatsapp'][0]['shipping_whatsapp'];
				      						} else {
				      							$shipping_whatsapp = "";
				      						}
				      						echo $shipping_whatsapp;
			      						?>
			      					</td>
			      				</tr>    
			      				<tr>
			      					<td style="text-align:right;"><strong>Skype</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['shipping_skype'][0]['shipping_skype'])){
				      							$shipping_skype = $orders['shipping_skype'][0]['shipping_skype'];
				      						} else {
				      							$shipping_skype = "";
				      						}
				      						echo $shipping_skype;
			      						?>
			      					</td>
			      				</tr>  	
			      				<tr>
			      					<td style="text-align:right;"><strong>Viber</strong></td>
			      					<td> 
			      						<?php 
				      						if(isset($orders['shipping_viber'][0]['shipping_viber'])){
				      							$shipping_viber = $orders['shipping_viber'][0]['shipping_viber'];
				      						} else {
				      							$shipping_viber = "";
				      						}
				      						echo $shipping_viber;
			      						?>
			      					</td>
			      				</tr> 	
			      			</tbody>
						</table>	
			      	</td>
			      	<td>
			      		<table class="table table-borderless table-sm">
				      		<thead>
			      				<tr> 
			      					<td scope="col" colspan="3">
			      						<h5 class="float-left"> <strong> Order Information </strong></h5>
			      						<br><br>
			      					</td>
			      				</tr>
				      		</thead>
			      			<tbody>
			      				<tr>
			      					<td style="text-align:right;width:20%"> <strong>Order Date</strong></td>
			      					<td style="width:50%">  
			      						<?php
											foreach($new_array['delivery_info'] as $delivery_info)
											{
											 	echo "<span class='none_bold'>".$delivery_info['order_date']."</span><br>";
											}
			      						?>
			      					</td>
			      					<td style="width:30%">
			      						<strong> Price </strong>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;"><strong> Time </strong> </td>
			      					<td colspan="2"> 
			      						<?php

											foreach($new_array['time_order_date'] as $value)
											{
											 	echo "<span class='none_bold'>".$value['time_order_date']."</span><br>";
											}
			      						?>
			      					</td>
			      				</tr>
			      				<tr>				      			
				      				<td style="text-align:right;"> <strong> Delivery Date </strong> </td>
				      				<td colspan="2">  
			      						<p class="float-left">
			      							<span class='standard_text_label'> <?php echo $new_array['delivery_info'][0]['delivery_date']; ?></span>
			      							<a href="#" data-toggle="modal" data-target="#orderInfoModal" >
			      							<i class="fas fa-edit text-primary"></i></a>
			      							<i class="fas fa-question-circle text-info" data-toggle="tooltip" data-placement="top" title="this will open a form to make changes on the info" ></i> 
			      						</p>
				      				</td>
				      			</tr>
				      			<tr>
			      					<td style="text-align:right;"> <strong> Product </strong> </td>
			      					<?php 
			      						foreach($new_array['product_title'] as $value)
										{
											echo "<td><div class='row'><div class='col-md-10'>".$value['product_name']."</div></div></td>";
										}
										foreach($new_array['item_price'] as $item_price){
											echo "<td>". phil_money_currency_format($item_price['price'])."</td>";
										}
		      						?>
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;"> <strong> Occasion </strong> </td>
			      					<td colspan="2">
			      						<?php 
			      							foreach($new_array['occasion_type'] as $value)
											{
												echo $value['occasion'];
											}
			      						?>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;"> <strong> Add-On </strong> </td>
			      						<?php 
							      			foreach($new_array['add_on_name'] as $value)
											{	
												$add_on_name['add_on_name']=[
													'add_a_tedy_bear' => $value['add_a_tedy_bear'],
													'add_a_chocolates' => $value['add_a_chocolates'],
													'add_a_bottle_of_wine' => $value['add_a_bottle_of_wine'],
													'add_a_balloon' => $value['add_a_balloon']
												];								
											}		
											echo "<td>";
											foreach($add_on_name['add_on_name'] as $value)
											{													
												echo $value."<br>";
											}
											echo "</td>";											
											echo "<td>";
											foreach($new_array['add_on_price'] as $value)
											{	
												echo phil_money_currency_format($value['add_on_price'])."<br>";											 									
											}		
											echo "</td>";
			      						?>
			      				</tr>
			      				<tr>
		      						<?php 
		      							foreach($new_array['shipping_lines'] as $shipping_lines)
										{
											echo "<td style='text-align:right;'><strong>".$shipping_lines['method_title']."</strong></td>";
											echo "<td> </td>";
											echo "<td  colspan='2' >". phil_money_currency_format($shipping_lines['total'])."</td>";
										}
		      						?>
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;">
			      						<strong>Order Amount </strong>	
			      					</td>
			      					<?php 
			      					foreach($new_array['order_amount'] as $value){
			      							echo "<td> </td>";
											echo "<td>". phil_money_currency_format($value['total'])."</td>";
										}
									?>
			      				</tr>
			      				<tr>
									<td style="text-align:right;"> 
										<strong>Message On Card </strong>			      							
									</td>
	      							<td colspan="2"> 
										<div class="content_message" style="width:250px;padding-right:30px">
											<?php 
											foreach($new_array['customer_notes'] as $customer_notes)
											{
												echo "".$customer_notes['message_on_card']."";
											}
											?>
											<a href="#" data-toggle="modal" data-target="#messageOnCardModal" >
											<i class="fas fa-edit text-primary"></i></a>
											<i class="fas fa-question-circle text-info" data-toggle="tooltip" data-placement="top" title="this will open a form to make changes on the info" ></i> 
										</div>
									<td> 
								</tr>	
								<tr>
			      					<td style="text-align:right">			      					
			      						<strong> Special Delivery Insructions </strong>			      						
			      					</td>
			      					<td>
			      						<div class="content_message" style="width:250px;padding-right:30px">
					      					<?php
						      					if(isset($orders['special_instruction'])){
						      						echo $orders['special_instruction'];
						      					} else {
						      						echo $orders['special_instruction'] = "no instruction";
						      					}
					      					 ?>
					      					 <a href="#" data-toggle="modal" data-target="#specialDeliveryInstructionModal" >
	      									<i class="fas fa-edit text-primary"></i></a>
		      								<i class="fas fa-question-circle text-info" data-toggle="tooltip" data-placement="top" title="this will open a form to make changes on the info" ></i> 
			      						</div>
			      					</td>				      					
			      				</tr>
			      				<tr>
			      					<td style="text-align:right;"> <strong> Build List</strong> </td>	
			      					<td class="text-left build-list"> 
			      						<?php 
			      						foreach($new_array['build_list'] as $build_list)
										{
											echo $order_info_html[]=$build_list['build_list'];
										}	
			      						?>
			      					</td>
			      					<td >			      					
			      						<picture>
										  <source srcset="<?php echo $orders['image']; ?>" type="image/svg+xml">
										  <img src="<?php echo $orders['image']; ?>" width="150" height="150" class="img-thumbnail" alt="...">
										</picture>										
			      					</td>		      					
			      				</tr>

			      			</tbody>	
			      		</table>	
			      	</td>
			     	<td>	      		
			      		<table class="table table-borderless table-sm">
				      		<thead>
			      				<tr> 
			      					<td scope="col" colspan="3" width="80%">
			      						<h5 class="float-left"> <strong> Order Status </strong></h5>
			      						<br><br>
			      					</td>
			      				</tr>
				      		</thead>
			      			<tbody>
			      				<tr>
			      					<td> 	
			      						<label for="inputGroupSelect01"> <strong> Operator Name </strong> </label> 
			      					</td>		      							
		      						<td>	      							
		      							<input type="hidden" id="assign_operator" name="assign_operator_name" value="<?php echo $orders['assign_agent']; ?>" />
	
		      							<input type="hidden" id="assign_operator_id" value="<?php echo $assign_agent_id ?>" />
			      						<div class="form-group row">
										    <div class="col-sm-8">
										    	<select id="operator_output" name="operator_output" class="form-control">
										    	</select>
										    	<input type="hidden" id="get_operator" name="get_operator" />
										    	<input type="hidden" id="get_operator_name" name="get_operator_name" />
										    </div>
										</div>
		      						</td>
		      					<tr>
			      					<td>
			      						<label  for="inputGroupSelect01"> <strong> Order Status </strong> </label>
			      					</td>
			      					<td> 
			      						<div class="form-group row">
										    <div class="col-sm-8">
										       <select name="status" class="form-control" >
											  	<?php foreach($order_status as $key => $value){ ?>
											  		<?php if( $key == $wc_orders->status ) { 
											  			$selected = "selected";
											  			$status_temp=$key;
											  			} else {
											  			$selected = "";
											  		} ?> 
											  		<option value="<?php echo $key; ?>" <?php echo $selected; ?> > <?php echo $value; ?> </option>										  		
											  	<?php } ?>
											  </select>
											  <input type="hidden" name="current_status" value="<?php echo $status_temp; ?>" />
										    </div>
										</div>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td>
			      						<label  for="inputGroupSelect01"> <strong> Dispatch Status </strong> </label>
			      					</td>
			      					<td>
							      		<div class="form-group row">
										     <div class="col-sm-8">										      
											  	<select id="dispatch_status" name="dispatch_status" class="form-control">
											  		<option value=""> --select-- </option>
													<?php 
													foreach($dispatch_status['dispatch_status'] as $value){
														if($value == $orders['dispatch_status']){
															$selected="selected";
															$ds_status_temp=$value;
														} else {
															$selected="";
														}
													?>
													<option value="<?php  echo $value; ?>" <?php  echo $selected; ?> > <?php  echo $value; ?> </option>
												<?php } ?>																							  						  
												</select>
												<?php if(isset($ds_status_temp)){ ?>
													<input type="hidden" name="current_dis_status" value="<?php echo $ds_status_temp; ?>" />
												<?php  } ?>
												<input type="hidden" id="get_dispatch_status" />
										    </div>
									 	</div>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td> 	
			      						<label for="inputGroupSelect01"> <strong> Assign A Florist </strong> </label> 
			      					</td>		      							
		      						<td>
			      						<div class="form-group row">
										    <div class="col-sm-8">
										    	<select id="assign_florist" name="assign_florist" class="form-control">
										    		<option value="" >--select--</option>
													<?php 
											  		foreach($florists as $row){
								    					if($row['id'] == $florist_current_id){
								    						$selected="selected";
								    						$assign_florist_temp = $row['id'];
								    					} else {
															$selected="";
														}
													?>
													<option data-assign-florist="<?php echo $row['title']; ?>"  value="<?php echo $row['id']; ?>" <?php  echo $selected; ?> > <?php  echo $row['title']; ?> </option>
												<?php } ?>																							  						  
												</select>
												<?php if(isset($assign_florist_temp)){ ?>
													<input type="hidden" name="current_assign_florist" value="<?php echo $assign_florist_temp; ?>" />
												<?php  } ?>
													<input type="hidden" id="get_assign_florist" />
													<input type="hidden" id="get_assign_florist_name" />
										    </div>
										</div>
		      						</td>
			      				</tr>
			      				<tr>
			      					<td> 
			      						<label for="inputPassword"><strong>Pay to Florist</strong></label>
			      					</td>
			      					<td>			      						
				      					<div class="form-group row">										  
										    <div class="col-sm-8">
										    	<?php 	
											    if(!empty($new_array['agent_pay_to_florist'])){
											    	foreach($new_array['agent_pay_to_florist'] as $florist)
													{
														$agent_pay_to_florist=$florist['agent_pay_to_florist'];
													}
												} else {
													 $agent_pay_to_florist = "";
												}
										    	?>
										     	<input type="text" id="agent_pay_to_florist" name="agent_pay_to_florist" class="form-control" value="<?php echo $agent_pay_to_florist; ?>" >
										     	<input type="hidden" name="current_agent_pay_to_florist" value="<?php echo $agent_pay_to_florist; ?>">
										     	<input type="hidden" id="get_pay_to_florist" />
										    </div>
										 </div>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td> 
			      						 <label for="inputPassword" class="col-form-label"><b>Fraud Score</b></label>
			      					</td>
			      					<td>
								      	<div class="form-group row">	
								      		<div class="col-sm-8">
										    	<input type="text" class="form-control" id="inputPassword" placeholder="">	
										    </div>
										</div>
			      					</td>
			      				</tr>
			      				<tr>
			      					<td>
			      						<label for="comment"><b>Notes:</b> <small>Latest notes</small> </label>
			      					</td>
			      					<td> 
			      						<div class="form-group">
				      						<div class="card" style="width: 18rem;">
											  <div class="card-body">
											    <h6 class="card-title" style="font-size:12px;">
											    	<?php if(isset($title_notes)){
											    		$filled_title_notes = $title_notes;
											    	}else{
											    		$title_notes = "";
											    		$filled_title_notes = $title_notes;
											    	} ?>
											    	<?php echo $filled_title_notes; ?> 
											    </h6>

											    <?php if(isset($note_event)){
											    	$filled_note_event = $note_event;
											    } else {
											    	$note_event = "";
											    	$filled_note_event = $note_event;
											    } 
											    ?>
											    <?php echo $filled_note_event; ?>
							
											    <?php if(isset($notes_content)){
											    	$filled_notes_content = $notes_content;
											    } else {
											    	$notes_content = "";
											    	$filled_notes_content = $notes_content;
											    }
											    ?>
											    <?php echo $filled_notes_content; ?>

											    <?php if(isset($note_assigned_by)){
											    	$filled_note_assigned_by = "<br> Assigned By: ".$note_assigned_by;
											    } else {
											    	$note_assigned_by = "";
											    	$filled_note_assigned_by = $note_assigned_by;
											    } ?>
											    <?php echo $filled_note_assigned_by; ?>
											  </div>
											</div>	
										</div>							   						      			      				
			      					</td>
		      					</tr>
		      					<tr>
		      						<td colspan="3" >  
		      							<div class="row">
								          <div class="col-md-5 mb-3">
								           	 	<button type="button" data-target="#myModalNote" class="btn btn-primary btn-block" data-toggle="modal" data-order-id="<?php echo $wc_orders->id; ?>" >Add Notes</button>
								          </div>
								          <div class="col-md-5 mb-3">
								          		<button type="button" class="btn btn-info order-view-notes btn-block" data-toggle="modal" data-target="#orViewNotes"> View All Notes </button>
								          </div>				
									    </div>
									    <div class="row">
								          <div class="col-md-5 mb-3">
								          		<a href="../invoice/invoice.php?id=<?php echo $wc_orders->id; ?>" class="btn btn-info btn-block" target="_blank" alt="PDF Invoice"><i class="fas fa-file-invoice text-white"></i> Print Invoice </a>
								          </div>
								          <div class="col-md-5 mb-3">
								          	<button type="button" id="update_assign" class="btn btn-primary btn-block"> Update </button>	
					    					<input type="hidden" name="update_assign" /> <!-- remove comment for form to work -->
								          </div>				
									    </div>	 
									</td>
		      					</tr>
			      			</tbody>
				      	</table>	
			      	</td>	
			  	</tbody>
			</table>
		 </form> 
		<?php include("activity-log/log.php"); ?>
		<?php include('modal/order-assign-modal.php'); ?>
		<form id="agent_notes_form" >
			<div id="myModalNote" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			    <div class="modal-dialog modal-sm">
			        <div class="modal-content"  style="width:60%;">
			            <div class="modal-header bg-info">
			                <h5 id="modalTitle" class="text-white"> Notes </h5>
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			            </div>
			            <div class="modal-body">
			            	<h6 id="modalTitle" class="text-secondary"> Current Notes </h6>
			            	<input type="hidden" id="note_order_id" name="note_order_id" />
			            	<input type="hidden" name="shop_order_mbh_notes_agent" value="shop_order_mbh_notes_agent" />	 
			            	<div id="message_history"></div>  
					  			Add Notes
				   	 		<textarea id="notes_content" name="note_content" rows="10" class="form-control"></textarea>
				   	 		<div class="modal-footer">
				   	 			<p class="text-right"><button type="button" id="update_notes" value="update" class="btn btn-primary btn-sm">Save changes</button>
					   	 		<button class="btn close_notes btn-sm" data-dismiss="modal" aria-hidden="true">Close</button></p>              			
			               		<!--  <button type="submit" class="btn btn-primary">Save changes</button> -->
			               		<input type="hidden" name="update_notes" value="update" />
						    </div>    
			            </div>
						<!-- <div class="modal-footer">
			                <button class="btn close_notes" data-dismiss="modal" aria-hidden="true">Close</button>
			              	<button type="button" id="update_notes" value="update" class="btn btn-primary">Save changes</button> -->
			                <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->
			               <!--  <input type="hidden" name="update_notes" value="update" /> -->
			          	<!--   </div> -->
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<script>
$(document).ready(function(){

	$(".updating_info").hide();

	$('[data-toggle="tooltip"]').tooltip()

	$("#updateSpecialDeliveryInstruction").click(function(){
		$(".updating_info").show();
	})

	var o = new Option("option text", "value");
	$(o).html("---select---");
	$("#operator_output").append(o);

	var o = new Option("option text", "value");
	$(o).html("---select---");
	$("#florist_output").append(o);

	// ../../../private/service/orders.php

	$("#updateSpecialDeliveryInstruction").on('click', function(event){
		event.preventDefault();
		var formData = new FormData( $('form#specialDeliveryInstruction')[0] );
		$.ajax({
			type 		: "POST",
			url 		: "../../../private/service/special_delivery_instruction.php", 
			data 		: formData,
			cache 		: false,
			contentType : false,
			processData : false,
			success: 	function(data){
				console.log(data);
				if(data){
					location.reload(true)
				} else {
					alert("error inserting data");
				}		
			} 	
		});
		$("#myModal").modal('toggle');
		return false;
	});

	$("#updateMessageOnCard").click(function(){
		$(".updating_info").show();
	})
	$("#updateMessageOnCard").on('click', function(event){
		event.preventDefault();
		var formData = new FormData( $('form#messageOnCard')[0] );
		$.ajax({
			type 		: "POST",
			url 		: "../../../private/service/message_on_card_update.php", 
			data 		: formData,
			cache 		: false,
			contentType : false,
			processData : false,
			success: 	function(data){
				console.log(data);
				if(data){
					location.reload(true)
				} else {
					alert("error inserting data");
				}		
			} 	
		});
		$("#myModal").modal('toggle');
		return false;
	});

	$("#updateOrdeDeliveryDate").click(function(){
		$(".updating_info").show();
	})

	$("#updateOrdeDeliveryDate").on('click', function(event){
		event.preventDefault();
		var formData = new FormData( $('form#deliveryDate')[0] );
		$.ajax({
			type 		: "POST",
			url 		: "../../../private/service/order_delivery_date_update.php", 
			data 		: formData,
			cache 		: false,
			contentType : false,
			processData : false,
			success: 	function(data){
				console.log(data);
				if(data){
					location.reload(true)
				} else {
					alert("error inserting data");
				}		
			} 	
		});
		$("#myModal").modal('toggle');
		return false;
	});

	$("#updateReceiverInfo").click(function(){
		$(".updating_info").show();
	})

	$("#updateReceiverInfo").on('click', function(event){
		event.preventDefault();
		var formData = new FormData( $('form#receiver_form')[0] );
		$.ajax({
			type 		: "POST",
			url 		: "../../../private/service/receiver_info_update.php", 
			data 		: formData,
			cache 		: false,
			contentType : false,
			processData : false,
			success: 	function(data){
				console.log(data);
				if(data){
					location.reload(true)
				} else {
					alert("error inserting data");
				}		
			} 	
		});
		$("#myModal").modal('toggle');
		return false;
	});

	function buildLoadReceiverState(object){
		// console.log("checking");
		var JSONObject = JSON.parse(object);
		for(key in JSONObject.states){
			if(JSONObject.states.hasOwnProperty(key)){
				var code = JSONObject.states[key].code;
				var name = JSONObject.states[key].name;
				if(code == $("#ground_receiver_state").val()){
					var option = 'selected="selected"';
					$("#modalSelectCurrentReceiverState").append('<option value="'+code+'" '+option+'> '+name+' </option>');
				} else {
					$("#modalSelectCurrentReceiverState").append('<option value="'+code+'"> '+name+' </option>');
				}
			}
		}
	}
	function getLoadReceiverState(){
		var groundReceiverCountry = $("#ground_receiver_country").val();
		$.ajax({
			type: "POST",
			url: "../../../private/class/country.php",
			data: {'selectData': groundReceiverCountry },
	    	success:  function(object){
	    		buildLoadReceiverState(object)			
	    	}
		});
	}
	getLoadReceiverState();

	function buildLoadCountryReceiver(object){
		$.each(object, function(key, value){
			var code = value.code;
			var name = value.name;
			if(code == $("#inputTypeCurrentReceiverCountry").val() ){
				var option = 'selected="selected"';
				$("#modalSelectCurrentReceiverCountry").append('<option value="'+code+'" '+option+'> '+name+' </option>');
			} else {
				$("#modalSelectCurrentReceiverCountry").append('<option value="'+code+'"> '+name+' </option>');
			}	
		});
	}
	function getLoadCountryReceiver(){
		var receiverCountry = $("#inputTypeCurrentReceiverCountry").val();
		
		$.ajax({
			dataType : 'json',
			url 	 : '../../../private/class/countries.php'
		})
		.done(function(object){
			buildLoadCountryReceiver(object);
		})
		.fail(function(){
			console.error("REST Error. Nothing return for ajax");
		})
	}
	getLoadCountryReceiver();

	/*
	* Update form Sender Information
	*/
	$("#updateSenderInfo").click(function(){
		$(".updating_info").show();
	})
	$("#updateSenderInfo").on('click', function(event){
		event.preventDefault();
		var formData = new FormData( $('form#sender_form')[0] );
		$.ajax({
			type 		: "POST",
			url 		: "../../../private/service/sender_info_update.php",
			data 		: formData,
			cache 		: false,
			contentType : false,
			processData : false,
			success: 	function(data){
				console.log(data);
				if(data){
					console.log(data);
					location.reload(true)
				} else {
					alert("error inserting data");
				}		
			} 	
		});
		$("#myModal").modal('toggle');
		return false;
	});
	function buildBaseCountry(object){
		var JSONObject = JSON.parse(object);
		for(key in JSONObject.states){
			if(JSONObject.states.hasOwnProperty(key)){
				var code = JSONObject.states[key].code;
				var name = JSONObject.states[key].name;
				console.log(name);
				$("#modal_billing_state").append('<option value="'+code+'"> '+name+' </option>');
			}
		}
	}	
	$("#countryBase").change(function(event){
	  	var selectData = $(this).val();
  	   	var dropdown=$('#modal_billing_state');
		dropdown.empty(); 
	  	$.ajax({
   			type: "POST",
   			url: "../../../private/class/country.php",
   			data: {'selectData': selectData },
		    success:  function(object){
		    	buildBaseCountry(object)			
		    }
   		});
	});

	/*
	* order assign modal
	* Load first data and get the current state base country
	*/
	function buildLoadCountryBase(object){
		// console.log("checking");
		var JSONObject = JSON.parse(object);
		for(key in JSONObject.states){
			if(JSONObject.states.hasOwnProperty(key)){
				var code = JSONObject.states[key].code;
				var name = JSONObject.states[key].name;
				if(code == $("#billingState").val()){
					var option = 'selected="selected"';
					$("#modal_billing_state").append('<option value="'+code+'" '+option+'> '+name+' </option>');
				} else {
					$("#modal_billing_state").append('<option value="'+code+'"> '+name+' </option>');
				}
			}
		}
	}
	function getLoadCountryBase(){
		var billingCountry = $("#billingCountry").val();
		// console.log(billingCountry);
		$.ajax({
			type: "POST",
			url: "../../../private/class/country.php",
			data: {'selectData': billingCountry },
	    	success:  function(object){
	    		buildLoadCountryBase(object)			
	    	}
		});
	}
	getLoadCountryBase();

	/*
	* order assign modal
	* Load first data and get the current Country
	*/
	function buildCountry(object){
		$.each(object, function(key, value){
			var code = value.code;
			var name = value.name;
			if(code == $("#sender_current_country").val()){
				var option = 'selected="selected"';
				$("#countryBase").append('<option value="'+code+'" '+option+'> '+name+' </option>');
			} else {
				$("#countryBase").append('<option value="'+code+'"> '+name+' </option>');
			}	
		});
	}
	function getCountry(){
		$.ajax({
			dataType : 'json',
			url 	 : '../../../private/class/countries.php'
		})
		.done(function(object){
			buildCountry(object);
		})
		.fail(function(){
			console.error("REST Error. Nothing return for ajax");
		})
	}
	getCountry();

	function buildFlorist(object){
		// console.log(object);

		var assign_florist = $("#assign_florist").val();
		$.each(object,function(key, value) 
		{	 	
			var florist_id = value.id;		
			var title = value.title.rendered;
			if(assign_florist == title){
				var option = 'selected="selected"';
				$("#florist_output").append('<option value="'+florist_id+'" '+option+'> '+title+' </option>');
			} else {
				$("#florist_output").append('<option value="'+florist_id+'">'+title+'</option>');
			}	
		});
	}
	function getFlorist() {
		$.ajax({
			dataType: 'json',
			url: RESTROUTE
		})
		.done(function(object) {
			buildFlorist(object);
		})
		.fail(function() {
			console.error("REST error. Nothing returned for AJAX.");
		})
	}
	getFlorist();

	function selectedOperator(object){
		var assign_operator = $("#assign_operator_id").val();
		$.each(object,function(key, value) 
		{	 
			if(value.roles == 'administrator' || value.roles == 'mod_agent' ){
				var title = value.name;
				var id = value.id;
				if(id==assign_operator){
					var option = 'selected="selected"';
					$("#operator_output").append('<option data-operator-id="'+id+'" data-operator="'+title+'" value="'+id+'" '+option+'> '+title+' </option>');
				} else {
					$("#operator_output").append('<option data-operator-id="'+id+'" data-operator="'+title+'" value="'+id+'">'+title+'</option>');
				}
			}
		});
	}
	function getOperator(userRestRoute){
		$.ajax({
			dataType : 'json',
			url : userRestRoute
		})
		.done(function(object){
			selectedOperator(object)
		})
		.fail(function(){
			console.error("REST error. Nothing returned for AJAX");
		})
	}
	getOperator(USERROUTE);

});
	
	function formatAMPM(date) {
	  	var hours = date.getHours();
	  	var minutes = date.getMinutes();
	  	var ampm = hours >= 12 ? 'pm' : 'am';
	  	hours = hours % 12;
	  	hours = hours ? hours : 12; // the hour '0' should be '12'
	  	minutes = minutes < 10 ? '0'+minutes : minutes;
	  	var strTime = hours + ':' + minutes + ' ' + ampm;
	  	return strTime;
	}

	function buildAgentNotes(order_id, object){
			// console.log(object);
			var agentNotes = "";
			var msg_output = "";
			for(let i=0; i< object.length; i++){
				var id = object[i].id;
				var agent_order_note = object[i].cmb2.note_metabox.note_agent_note_id;
				var note_event = object[i].cmb2.note_metabox.note_event;
				var note_assigned_by = object[i].cmb2.note_metabox.note_assigned_by;

				var title = object[i].title.rendered;
				var content = object[i].content.rendered;
				if(agent_order_note==order_id){
					$("#order_id").val(order_id);
					$("#note_id").val(id);
					msg_output += '<div class="card text-white bg-info">';
					msg_output += '<div class="card-header"><small>'+title+'</small></div>';
					msg_output += '<div class="card-body">';
					msg_output += '<div id="message_content_event" class="card-text"><small>'+note_event+'</small></div>';
					msg_output += '<div id="message_content" class="card-text"><small>'+content+'</small></div>';
					msg_output += '<div id="message_content" class="card-text"><small> Assigned By: '+note_assigned_by+'</small></div>';
					msg_output += '</div>';
					msg_output += '</div><br>';
				}
			}
			$("#message_history").append(msg_output);
	}

	/** All js function here **/
	function getAgentNotes(order_id, orderRoutes){
		$.ajax({
			dataType: 'json',
			url : orderRoutes
		})
		.done(function(object){
			buildAgentNotes(order_id, object);
		})
		.fail(function(){
			console.error("REST error. Nothing returned for AJAX.");
		});
	}

	function addNotes(formData){
		jso.ajax({
			dataType: 'json',
			url: RESTCREATENOTESROUTE,
			method: "POST",
			data: formData,
		    success:  function(data){
		    	if(data){
		    		location.reload(true);		    		
		    	} else {
		    		alert("error inserting data");
		    	}
		    }
		});
	}

	function todayHours(){
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		var today = mm + '-' + dd + '-' + yyyy;
		var hours = formatAMPM(new Date);
		var today_hours = today+" "+hours;
		return today_hours;
    }

$(document).ready(function(){

    $("#myModalNote").on('show.bs.modal', function (e) {
	    var triggerLink = $(e.relatedTarget);
	    var order_id = triggerLink.data("order-id");
	    $("input[name=note_order_id]").val(order_id);
		getAgentNotes(order_id, RESTNOTESROUTE);	  	   
	});

   $(".close_notes").click(function(){
   		$("#notes_content").text("");
   		$("#message_history").text("");
   });

    $(".close").click(function(){
   		$("#notes_content").text("");
   		$("#message_history").text("");
    });
	  
   	$("#update_notes").on('click', function(event){
		event.preventDefault();

		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		var today = mm + '-' + dd + '-' + yyyy;
		var hours = formatAMPM(new Date);
		var today_hours = today+" "+hours;

		var note_content = $("#notes_content").val();
		var order_id = $("input[name=note_order_id]").val();

		let formData = {
			"status": "publish",
			"title" : today_hours,
			"content":  note_content,
			"cmb2": {
	            "note_metabox": {
	                "note_agent_note_id": order_id
	            }
	        },
		}
		addNotes(formData);
   		$('#myModalNote').modal('toggle');
			return false;
    });

   	/** Update Order
   	*****/
   	var current_operator_id = $("#assign_operator_id").val();
   	var current_dis_status = $("input[name=current_dis_status]").val();
	var current_assign_florist = $("input[name=current_assign_florist]").val(); 
	var current_pay_to_florist = $("input[namecurrent_agent_pay_to_florist]").val();  	
	var userNameLogin = $(".username").val();


   /** get operator
   	*****/
	$('#operator_output').on('change', function () {
	  	var change_operator_output =  $(this).find(':selected').data('operator-id');
	  	var change_operator_name =  $(this).find(':selected').data('operator');
	 	$("#get_operator").val(change_operator_output);
	 	$("#get_operator_name").val(change_operator_name);
	});

	$("#dispatch_status").on('change', function(){
		var change_dispatch = this.value;
		$("#get_dispatch_status").val(change_dispatch);
	});

	$("#assign_florist").on('change', function(){
		var change_assign_florist = this.value;
		$("#get_assign_florist").val(change_assign_florist);
		var change_assign_florist_name =  $(this).find(':selected').data('assign-florist');
		$("#get_assign_florist_name").val(change_assign_florist_name);
	});

	$("input[name=agent_pay_to_florist]").on('change', function(){
		var txt_pay_to_florist = this.value;
		$("#get_pay_to_florist").val(txt_pay_to_florist);
	});

	$("#update_assign").click(function(){
		// Declare variable
		var order_id = $("input[name=order_id]").val();
		var get_operator_name = $("#get_operator_name").val();
		var get_pay_to_florist = $("#get_pay_to_florist").val();

		var get_operator_id = $("#get_operator").val();
		if(get_operator_id){
			var unique = "OP";
			var desc = "OPERATOR ASSIGNED";
			var event = "Assigned Operator";
			console.log("user log in", username);

			if(get_operator_id != "" && get_operator_id != null  && get_operator_id != "value" && get_operator_id != current_operator_id ){
				today_hours = todayHours();
				var formData = {
					"status": "publish",
					"title" : today_hours+" - "+desc,
					"cmb2": {
			           "note_metabox": {
			           		"note_unique" : unique,
			               	"note_agent_note_id": order_id,
			               	"note_related_id": get_operator_id,
			                "note_event": event+" * "+get_operator_name,
			                "note_assigned_by" : username
			           },
				    },
				}
				// console.log("test ",formData);
				// console.log("test", formData);
				addNotes(formData);
			}	
		}
		
		var get_dispatch_status = $("#get_dispatch_status").val();
		if(get_dispatch_status){
			var unique = "DS";
			var desc = "DISPATCH STATUS";
			var event = "Status Dispatch";
			if(get_dispatch_status != "" && get_dispatch_status != null && get_dispatch_status != "value" && get_dispatch_status != current_dis_status ){
				today_hours = todayHours();
				var formData = {
					"status": "publish",
					"title" : today_hours+" - "+desc,
					 "cmb2": {
				           "note_metabox": {
				           		"note_unique" : unique,
				               	"note_agent_note_id": order_id,
				               	"note_related_id": get_dispatch_status,
				                "note_event": event+" * "+get_dispatch_status
				           },
				     },
				}
				addNotes(formData);
			}
		}	

		var get_assign_florist = $("#get_assign_florist").val();
		var get_assign_florist_name = $("#get_assign_florist_name").val();
		if(get_assign_florist){
			var unique = "FA";
			var desc = "FLORIST ASSIGNED";
			var event = "Assign Florist";
			if(get_assign_florist != "" && get_assign_florist != null && get_assign_florist != "value" && get_assign_florist != current_assign_florist){
				today_hours = todayHours();
				var formData = {
					"status": "publish",
					"title" : today_hours+" - "+desc,
					 "cmb2": {
				           "note_metabox": {
				           		"note_unique" : unique,
				               	"note_agent_note_id": order_id,
				               	"note_related_id": get_assign_florist,
				                "note_event": event+" * "+get_assign_florist_name
				           },
				     },
				}
				addNotes(formData);
			}
		}

		if(get_pay_to_florist){
			var unique = "PF";
			var desc = "FLORIST TO PAY";
			var event = "Pay to Florist";
			if(get_pay_to_florist != "" && get_pay_to_florist != null && get_pay_to_florist != "value" && get_pay_to_florist != current_pay_to_florist){
				today_hours = todayHours();
				var formData = {
					"status": "publish",
					"title" : today_hours+" - "+desc,
					 "cmb2": {
				           "note_metabox": {
				           		"note_unique" : unique,
				               	"note_agent_note_id": order_id,
				               	"note_related_id": get_pay_to_florist,
				                "note_event": event+" * "+get_pay_to_florist
				           },
				     },
				}
				addNotes(formData);
			}
		}

	});
});
</script>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>
