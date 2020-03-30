<?php 
require_once('../../../private/initialize.php');
include(SERVICE_PATH.'/invoice_print.php');
include(SHARED_PATH.'/admin_header.php');

?>
<div class="wrapper" style="width:100%">
	<div>		
		<div id="printableTable">	
			<table border="0" cellpadding="1">
				<tbody>
					<tr>
						<td colspan="4">
							<img src="https://mabuhayflowers.com/wp-content/uploads/2019/01/MabuhayFlowers-Logo-FINAL.png" alt="Mabuhay Flowers" id="logo-print-page" width="150px">
						</td>
						<td colspan="4"> 
							<p class="text-right" style="padding:5px;"> <button class="Button Button--outline btn btn-danger" onclick="printDiv()"> <i class="fas fa-print"></i> Print</button> </p>
						</td>
					</tr>
					<tr>
						<td colspan="3" style="font-family:Arial;"> 
							Order #<?php echo $wc_orders->number;?>
						</td>
						<td colspan="4" style="font-family:Arial;"> 
							 <b> Delivery Date: </b><?php echo $orders['delivery_info'][0]['delivery_date'];?>
						</td>
					</tr>
					<tr height="20">
						<td></td>
					</tr>
					<tr>
						<td colspan="3" style="font-family:Arial;"><b>Customer Information</b></td>
						<td colspan="2" style="font-family:Arial;"><b> ID No.</b><?php echo $wc_orders->id;?></td>
						<td style="font-family:Arial;"><b> No. of Orders Sent : </b> <?php echo $customer_order_sent;?></td>
					</tr>
					<tr>
						<td colspan="3" style="font-family:Arial;">
							<strong> Date of Last Purchase : </strong>  <?php echo $last_purchased; ?>
						</td>
						<td colspan="4" style="font-family:Arial;">
							<strong> No. of Orders Received : </strong> <?php echo $customer_orders_received; ?>
						</td>
					</tr>
					<tr>
						<td colspan="4" style="font-family:Arial;font-size:16px;font-weight:bold;"> Sende'rs Information </td>
						<td colspan="3" style="font-family:Arial;font-size:16px;font-weight:bold;"> Receiver's Information </td>
					</tr>	
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">First Name</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"> <?php echo $orders['billing'][0]['first_name']; ?>  </td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> First Name </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"> <?php echo $orders['shipping'][0]['first_name']; ?> </td>
					</tr>	
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Last Name  </td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['last_name'];?></td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Last Name </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['last_name']; ?> </td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">Company</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['company'];?></td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">Company</td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['company'];?></td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Country </td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['country'];?></td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">Country</td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['country'];?> </td>
					</tr>	
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Street address </td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['address_1'];?></td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Street address</td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['address_1'];?></td>
					</tr>
					<tr>
						<td colspan="1"></td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['address_2'];?></td>
						<td colspan="1"></td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['address_2'];?></td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">Town/City</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['city'];?></td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">Town/City</td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['city'];?></td>
					</tr>	
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">State</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"> <?php echo $orders['billing'][0]['state'];?> </td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">State</td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"> <?php echo $orders['shipping'][0]['state'];?> </td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">  PostCode/Zip </td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['postcode'];?> </td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> PostCode/Zip </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;"><?php echo $orders['shipping'][0]['postcode'];?> </td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">  Email </td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['email'];?> </td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">  Email </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;">								
							<?php
			        			if(isset($orders['shipping_email'][0]['email'])){
			        				$shipping_phone = $orders['shipping_email'][0]['email'];
			        			} else {
			        				$shipping_phone = " ";
			        			}
			        			echo $shipping_phone;
			        		?>	
						</td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Phone </td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"><?php echo $orders['billing'][0]['phone'];?> </td>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Phone </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;">
							<?php
			        			if(isset($orders['shipping_phone'][0]['phone'])){
			        				$shipping_phone = $orders['shipping_phone'][0]['phone'];
			        			} else {
			        				$shipping_phone = " ";
			        			}
			        			echo $shipping_phone;
			        		?>	
						</td>
					</tr>
					<tr>
						<td colspan="7"> &nbsp; </td>
					</tr>
					<tr> 
						<td colspan="4" style="font-family:Arial;font-size:16px;font-weight:bold;font-size:12px;"> Order Information  </td>
						<td colspan="4" style="font-family:Arial;font-size:16px;font-weight:bold;font-size:12px;"> Order Status Information </td>
					</tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;font-size:12px;" width="100">Order Date</td>	
						<td colspan="1" style="font-family:Arial;font-size:12px;" width="200"><?php echo $orders['delivery_info'][0]['order_date'];?></td>		
						<td colspan="2" style="font-family:Arial;font-size:12px;font-weight:bold;font-size:12px;"> <!-- <span> Price </span> --> </td>	
						<td colspan="4" rowspan="6" valign="top"> 
							<table border="0" cellpadding="2">
								<tbody>
									<tr>
										<td style="font-family:Arial;font-size:12px;font-weight:bold;" width="100">Operator Name</td>
										<td style="font-family:Arial;font-size:12px;"><?php echo $orders['assign_agent'];?></td>
									</tr>
									<tr>
										<td style="font-family:Arial;font-size:12px;font-weight:bold;">Order Status</td>
										<td style="font-family:Arial;font-size:12px;"> 
										  	<?php foreach($order_status as $key => $value){
										  		if( $key == $wc_orders->status ) { 
										  			echo $wc_orders->status;
										  		} 
										  	}?> 
										</td>
									</tr>
									<tr>
										<td style="font-family:Arial;font-size:12px;font-weight:bold;">Dispatch Status</td>
										<td style="font-family:Arial;font-size:12px;"><?php echo $orders['dispatch_status'];?></td>
									</tr>
									<tr>
										<td style="font-family:Arial;font-size:12px;font-weight:bold;">Assign Florist</td>
										<td style="font-family:Arial;font-size:12px;"> <?php echo $orders['assign_florist']; ?> </td>
									</tr>
									<tr>
										<td style="font-family:Arial;font-size:12px;font-weight:bold;">Pay To Florist </td>
										<td style="font-family:Arial;font-size:12px;"><?php echo $orders['agent_pay_to_florist'][0]['agent_pay_to_florist']; ?></td>
									</tr>
									<tr>
										<td style="font-family:Arial;font-size:12px;font-weight:bold;">Fraud Score</td>
										<td style="font-family:Arial;font-size:12px;"></td>
									</tr>
									<tr>
										<td rowspan="2" style="font-family:Arial;font-size:12px;font-weight:bold;">Notes:</td>
										<td rowspan="2" colspan="2" style="font-family:Arial;font-size:12px;"> <?php echo $orders['notes_agent'][0]['notes_agent']; ?>  </td>
									</tr>
								</tbody>
							</table>
						</td>		
					</tr>		
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;font-size:12px;"> Time </td>
						<td colspan="1">  </td>
						<td colspan="2">  </td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;" >Delivery Date</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;"> <?php echo $orders['delivery_info'][0]['delivery_date'];?> </td>	
						<td style="font-family:Arial;font-size:12px;font-weight:bold;font-size:12px;"> <span> Price </span> </td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;">Product</td>
						<td colspan="1" style="font-family:Arial;font-size:12px;">  
							<?php
			        			$new_array=[
								 	'products' => $orders['product_title'],
								 ];
								foreach($new_array['products'] as $product ){
									echo $product['product_name'];
								}
			        		?>
						</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;" align="right"> 
							<?php 
				        		foreach($orders['item_price'] as $value){
				        			echo "<span style='padding-right:15px'>".$value['price']."</span><br>";
				        		}
			        		?>
						</td>	
					</tr>
					<tr style="line-height:20px;">
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold; " valign="top"> Add On</td>
						<td colspan="1" style="font-family:Arial;font-size:12px;" valign="top"> 
							<?php 
							foreach($orders['add_on_name'] as $key => $value){
								$orders['add_ons']=[
									'add_a_tedy_bear' => $value['add_a_tedy_bear'],
									'add_a_chocolates' => $value['add_a_chocolates'],
									'add_a_bottle_of_wine'	=> $value['add_a_bottle_of_wine'],
									'add_a_balloon'  => $value['add_a_balloon']
								];
							}
							foreach($orders['add_ons'] as $value){
								echo $value."<br>";
							}
							 ?> 
						</td>
						<td colspan="2" style="font-family:Arial;font-size:12px;" align="right" valign="top">
							<?php 
								foreach($orders['add_on_price'] as $value){
									echo "<span style='padding-right:15px'>".$value['add_on_price']."</span><br>";
								}
							?>
						</td>	
					</tr>
					<tr>
						<?php 
  							foreach($orders['shipping_lines'] as $shipping_lines)
							{
								echo "<td style='text-align:left;font-family:Arial;font-size:12px;font-weight:bold;' valign='top'>".$shipping_lines['method_title']."</td>";
								echo "<td> </td>";
								echo "<td colspan='2' style='font-family:Arial;font-size:12px;' align='right' valign='top'><span style='padding-right:15px'>".phil_money_currency_format($shipping_lines['total'])."</span></td>";
							}
  						?> 
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"> Order Amount </td>
						<td colspan="1"></td>
						<td colspan="2" style="font-family:Arial;font-size:12px;" align='right'> 
							<span style="padding-right:15px"><?php echo $orders['order_amount'][0]['total']; ?></span><br>
					 	</td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;"  valign="top">Payment Method</td>
						<td colspan="1" style="font-family:Arial;font-size:12px;"  valign="top"><?php echo $orders['payment_method']; ?></td>
						<td colspan="2"></td>
						<td rowspan="4" style="font-family:Arial;font-size:12px;font-weight:bold;" valign="top"> Build List </td>
						<td rowspan="4" style="font-family:Arial;font-size:12px;">							
							<?php 
	      						foreach($orders['build_list'] as $build_list)
								{
									echo $build_list['build_list'];
								}	
      						?>
						</td>
						<td rowspan="4" valign="top"> 
							<picture>
							  	<source srcset="<?php echo $orders['image']; ?>" type="image/svg+xml">
							  	<img src="<?php echo $orders['image']; ?>" width="100" height="100" class="img-thumbnail" alt="...">
							</picture>
					 	</td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;" valign="top"> Occassion </td>
						<td colspan="1" style="font-family:Arial;font-size:12px;" valign="top"> 
							<?php if(isset($orders['occasion_type'][0]['occasion'])){
								$occasion = $orders['occasion_type'][0]['occasion'];
							}else{
								$occasion="";
							} 
							echo $occasion;
							?> 
						</td>
						<td colspan="2"></td>	
					</tr>
					<tr>
						<td colspan="4" style="font-family:Arial;font-size:14px;font-weight:bold;">
							 Product Information
						</td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;" valign="top"> Message On Card </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;" width="100px"><?php echo $orders['customer_notes'][0]['message_on_card']; ?></td>
					</tr>
					<tr>
						<td colspan="1" style="font-family:Arial;font-size:12px;font-weight:bold;" valign="top"> Special Delivery Instructions </td>
						<td colspan="3" style="font-family:Arial;font-size:12px;" width="100px">
							<?php 
							if(isset($orders['special_instruction'])){
								echo $orders['special_instruction'];
							} else {
								echo $orders['special_instruction'] = "no instruction";
							} ?>					      						
						</td>
					</tr>	
				</tbody>
			</table>
			<!-- <table border="1">
				<thead>
					<tr>
						<td colspan="2"> Sende'rs Information </td>
					</tr>
					<tr>
						<td> <strong> First Name </strong> </td>
						<td> ~~~ </td>
					</tr>
				</thead>
			</table> -->
		</div>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
	</div>
</div>
<?php include('../template/javascript.php'); ?>
<script>
    function printDiv() {
     	window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
     	window.frames["print_frame"].window.focus();
     	window.frames["print_frame"].window.print();
   	}
</script>
<?php include('../template/footer.php'); ?>