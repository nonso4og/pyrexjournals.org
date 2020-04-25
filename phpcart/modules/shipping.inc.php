<?php

/*

LEGACY SHIPPING = CalculateTotalShipping
	Results:
		1) return calculated shipping (including 0 if calculated shipping = 0)
		2) return false if shipping not calculated yet (i.e.; no address info)
	
	If $_SESSION['SHIPPING'] is not an array, then shipping has not been calculated yet.
	
	Calculations are done using: function, CalculateBaseShipping
		Processes these in order
			1) Checks level for free shipping to subtotal
			2) Gets shipping/handling fee per item
			3) Calculates total weight of item in cart
			4) Calculates product-based shipping fees
			5) Adds shipping/handling per order
			6) Calculates shipping by percent of total
			7) Calculates shipping by weight
			8) Checks for minimum order amount
			9) Checks for maximum order amount 
	
	Template Variables:
		PRODUCTSHIPPING = Shipping per item
		PRODUCTSHIPPING1 = Shipping for first item
		PRODUCTSHIPPING2 = Shipping for each item after the first item
		PRODUCTQUANTITY = Quantity of item
		PRODUCTWEIGHT = Weight of item

	Configuration Variables:
		$config["ShippingFreeLevel"] = If total is greater or equal to this then shipping is free
		$config["ShippingPerOrder"] = Shipping fee added to every order
		$config["ShippingPerItem"] = Shipping fee added for every single item in the cart
		$config["ShippingPercent"] = Shipping fee as a percent of total order
		$config["ShippingMinimum"] = Minimum amount that will be charged for shipping
		$config["ShippingMaximum"] = Maximum amount that will be charged for shipping
		
	Uses Function: GetShippingWeights() = Returns an array of shipping weights
	
============================================================

ZONE SHIPPING = CalculateZoneShipping

Zone shipping uses two files which store arrays (flat files) for use in determing shipping values.

1) shipping_1.php:
	This file holds the shipping zones array. This is a list of each array and stores the following values:
		1) Zone ID
		2) Zone Name
		3) Zone Type
		4) Countries
		5) States
		6) Zip Codes
		7) Enable Pickup
		8) Pickup fee
		9) Handling fee
		10) Handling percent
		11) Minimum shipping fee
		12) Maxiumum shipping fee
		
		The Zone Type can be one of 6 different methods:
			Type 1 - none
			Type 2 - free shipping
			Type 3 - currency discount 
			Type 4 - percent discount
			Type 5 - order quantity
			Type 6 - weight
		
2) shipping_methods_1.php
	The file holds 2 arrays for each shipping zone. They are:
	a) shipping_method_name - which hold 4 values:
		1) Name 1
		2) Name 2
		3) Name 3
		4) Name 4
	b) shipping_method - which holds up to 10 arrays, one for each set of ranges and shipping prices. 

	


*/


function CalculateTotalShipping($products, $subtotal){
	global $config;

	$totalshipping = 0;
	$totalweight = 0;

	// free shipping if total is greater or equal
	if ($config["ShippingFreeLevel"] <= $subtotal && trim($config["ShippingFreeLevel"]) != "")  
		return 0;

	// if no products in cart, return
	if (sizeof($products) == 0)
		return 0;

	// create array of all products so that we can apply shipping rates to them
	$tmp = array();

	foreach ($products as $product){

		$productid = $product[PRODUCTID];

		if ($tmp[$productid][PRODUCTQUANTITY] > 0){

			$tmp[$productid][PRODUCTQUANTITY] = $tmp[$productid][PRODUCTQUANTITY] + $product[PRODUCTQUANTITY];

		}
		else {

			$tmp[$productid] = array();

			$tmp[$productid][PRODUCTSHIPPING] = $product[PRODUCTSHIPPING];
			$tmp[$productid][PRODUCTSHIPPING1] = $product[PRODUCTSHIPPING1];
			$tmp[$productid][PRODUCTSHIPPING2] = $product[PRODUCTSHIPPING2];
			$tmp[$productid][PRODUCTWEIGHT] = $product[PRODUCTWEIGHT];
			$tmp[$productid][PRODUCTQUANTITY] = $product[PRODUCTQUANTITY];
		}
	}

	// calculate shipping
	foreach ($tmp as $product){ 

		$totalshipping += $product[PRODUCTSHIPPING1] + ($product[PRODUCTSHIPPING] * $product[PRODUCTQUANTITY]) + ($product[PRODUCTSHIPPING2] * ($product[PRODUCTQUANTITY] - 1)) + ($config["ShippingPerItem"] * $product[PRODUCTQUANTITY]);

		$totalweight += $product[PRODUCTWEIGHT] * $product[PRODUCTQUANTITY];
	}


	// calculate shipping based on flat fee per order
	$totalshipping += $config["ShippingPerOrder"];


	// calculate shipping based on percentage
	if ($config["ShippingPercent"] > 0)
		$totalshipping += $config["ShippingPercent"] * $subtotal / 100;


	// calculate shipping based on weight
	$weights = GetShippingWeights();

	if (sizeof($weights) > 0 && $weights != ""){

		// find the weight scale that matches
		$weightshipping = 0;

		foreach ($weights as $weight){

			if ($totalweight > $weight[0])
				$weightshipping = $weight[1];
		}

		$totalshipping += $weightshipping;
	}

	
	// min shipping
	if ($config["ShippingMinimum"] > $totalshipping)
		$totalshipping = $config["ShippingMinimum"];

	// max shipping
	if ($config["ShippingMaximum"] < $totalshipping && trim($config["ShippingMaximum"]) != "")
		$totalshipping = $config["ShippingMaximum"];

	return $totalshipping;

}


function GetShippingWeights(){
	global $config;

	$shippingweights = array();

	$items = explode(";",$config["ShippingWeights"]);

	foreach($items as $item){

		$data = explode(":",$item);
		$shippingweights[] = array($data[0],$data[1]);
	}

	return $shippingweights;
}


// CALCULATE ZONE SHIPPING

// zone shipping calculator
function CalculateZoneShipping($records, $order_subtotal, $itemcount, $total_weight, $shippingmethod){
	global $config, $lang;

	$shipping_ready = IsShippingReady();
	$_SESSION['BILLING']['SKIPSHIPPING'] = FALSE;
	
	$totalshipping = 0;
	
	// get shipping arrays for this zone
	if (file_exists($config["FilePath"].'admin/shipping_method_1.php')){
		include ($config['FilePath'].'admin/shipping_method_1.php');	
	}
	elseif ('admin/shipping_method_1.php'){
		include ('admin/shipping_method_1.php');		
	}
	
	
	if (file_exists($config["FilePath"].'admin/shipping_1.php')){
		include ($config['FilePath'].'admin/shipping_1.php');	
	}
	elseif ('admin/shipping_1.php'){
		include ($config['FilePath'].'admin/shipping_1.php');	
	}
	
	
	
	// get count of arrays
	$countShipping = count($shipping);
	
	// if more than 1 zone, get zone#
	if ($countShipping > 1){	
	
		if ($shipping_ready === FALSE){
			return FALSE;
		}
		else {
			// determine which zone this customer fails within, returns 1 if no location info
			$zone_id = getZone();	
		}
	}


	if ($countShipping >= 1 AND $zone_id != ''){

		// now that we know the zone, get the zone type
		$type_id = $shipping[$zone_id][2];

		// get zone extras
		$enable_pickup = $shipping[$zone_id][6];
		$pickup_amount = $shipping[$zone_id][7];
		$handling_fee = $shipping[$zone_id][8];
		$handling_percent = $shipping[$zone_id][9];
		$min_shipping = $shipping[$zone_id][10];
		$max_shipping = $shipping[$zone_id][11];
			

		// no shipping
		if ($type_id == '1'){
			$totalshipping = '0.00';
			$_SESSION['BILLING']['SHIPPINGNAME'] = 'None';
			$_SESSION['BILLING']['SKIPSHIPPING'] = TRUE;
		}
		// Free Shipping
		elseif ($type_id == '2'){
			$totalshipping = '0.00';
			$_SESSION['BILLING']['SHIPPINGNAME'] = $lang['langFreeShipping'];
			$_SESSION['BILLING']['SKIPSHIPPING'] = TRUE;
		}
		// Order Subtotal - Currency Discount
		elseif ($type_id == '3' || $type_id == '4' || $type_id == '5' || $type_id == '6'){	
				
			// check for active names
			if ($shipping_method_name[$zone_id][0] == ''){
				return '0.00';
			}
			else {
				$name1 = $shipping_method_name[$zone_id][0];
			}
			
			$name2 = $shipping_method_name[$zone_id][1];
			$name3 = $shipping_method_name[$zone_id][2];
			$name4 = $shipping_method_name[$zone_id][3];	
				
			// get shipping rates for this zone
			for ($s = 1; $s <= sizeof(${'shipping_method'.$zone_id}); $s++){

				$zone_min = ${'shipping_method'.$zone_id}[$s][0];
				$zone_max = ${'shipping_method'.$zone_id}[$s][1];
				$shipping_price1 = ${'shipping_method'.$zone_id}[$s][2];
				$shipping_price2 = ${'shipping_method'.$zone_id}[$s][3];
				$shipping_price3 = ${'shipping_method'.$zone_id}[$s][4];
				$shipping_price4 = ${'shipping_method'.$zone_id}[$s][5];
			
				// Order Subtotal - Currency
				if ($type_id == '3'){
	
					if ($order_subtotal > $zone_min AND $order_subtotal <= $zone_max){
						
						$final_shipping_price1 = $shipping_price1;
										
						if ($name2 != ''){
							$final_shipping_price2 = $shipping_price2;
						}
						
						if ($name3 != ''){
							$final_shipping_price3 = $shipping_price3;
						}
						
						if ($name4 != ''){
							$final_shipping_price4 = $shipping_price4;
						}
						break;	
					}
					
				} // end type = 3
				
				// type_id = 4 - Order Subtotal - Discount Percent
				if ($type_id == '4'){
					if ($order_subtotal > $zone_min AND $order_subtotal <= $zone_max){
						$final_shipping_price1 = $order_subtotal * ($shipping_price1 / 100);
						
						if ($name2 != ''){
							$final_shipping_price2 = $order_subtotal * ($shipping_price2 / 100);
						}
						
						if ($name3 != ''){
							$final_shipping_price3 = $order_subtotal * ($shipping_price3 / 100);
						}
						
						if ($name4 != ''){
							$final_shipping_price4 = $order_subtotal * ($shipping_price4 / 100);
						}
						
						break;	
					}
				} // end type = 4
				
				// type 5 - Order Quantity
				elseif ($type_id == '5' ){
					
					if ($itemcount > $zone_min AND $total_weight <= $zone_max){
					
						if ($itemcount == 1){				
							$final_shipping_price1 = ${'shipping_method'.$zone_id}[1][2];
							
							if ($name2 != ''){
								$final_shipping_price2 = ${'shipping_method'.$zone_id}[1][3];
							}
							
							if ($name3 != ''){
								$final_shipping_price3 = ${'shipping_method'.$zone_id}[1][4];
							}
							
							if ($name4 != ''){
								$final_shipping_price4 = ${'shipping_method'.$zone_id}[1][5];
							}
						}
						elseif ($itemcount > 1){
							$final_shipping_price1 = ${'shipping_method'.$zone_id}[1][2] + (${'shipping_method'.$zone_id}[2][2] * ($itemcount - 1));
							
							if ($name2 != ''){
								$final_shipping_price2 = ${'shipping_method'.$zone_id}[1][3] + (${'shipping_method'.$zone_id}[2][3] * ($itemcount - 1));
							}
							
							if ($name3 != ''){
								$final_shipping_price3 = ${'shipping_method'.$zone_id}[1][4] + (${'shipping_method'.$zone_id}[2][4] * ($itemcount - 1));
							}
							
							if ($name4 != ''){
								$final_shipping_price4 = ${'shipping_method'.$zone_id}[1][5] + (${'shipping_method'.$zone_id}[2][5] * ($itemcount - 1));
							}
						} // end elseif > 1
					}
					$_SESSION['BILLING']['SKIPSHIPPING'] = TRUE;
				}// end type_id = 5
					
				// type_id = 6 Weight
				elseif ($type_id == '6'){

					if ($total_weight > $zone_min AND $total_weight <= $zone_max){
						$final_shipping_price1 = $shipping_price1;
						 		
						if ($name2 != ''){
							$final_shipping_price2 = $shipping_price2;
						}
						
						if ($name3 != ''){
							$final_shipping_price3 = $shipping_price3;
						}
						
						if ($name4 != ''){
							$final_shipping_price4 = $shipping_price4;
						}
						break;
					}	
					$_SESSION['BILLING']['SKIPSHIPPING'] = TRUE;			
				} // end type_id = 6
			} // end get shipping rates while loop
			
			
			// if only one shipping choice available, then just select it
			if (count($_SESSION['SHIPPING']['RATES']) == 1){
				$shippingmethod = 1;	
			}
			
			// if shipping selected by customer, get correct shipping price
			if ($shippingmethod != ''){	

				switch ($shippingmethod){		
					case "1":
						$shipping_name = $name1;
						$totalshipping = $final_shipping_price1;
						break;
					case "2":
						$shipping_name = $name2;
						$totalshipping = $final_shipping_price2;
						break;
					case "3":
						$shipping_name = $name3;
						$totalshipping = $final_shipping_price3;
						break;
					case "4":
						$shipping_name = $name4;
						$totalshipping = $final_shipping_price4;
						break;
				} // end switch
			
				// now apply extra fees
			
				// handling fee $
				if ($handling_fee != ''){
						$totalshipping = $totalshipping + $handling_fee;
				} 
					
				// handling fee %
				if ($handling_percent != ''){
						$totalshipping = $totalshipping + ($totalshipping * ($handling_percent / 100));
				} 
				
				// max shipping
				if ($max_shipping != ''){
					if ($max_shipping< $totalshipping && $max_shipping > .01){
						$totalshipping = $max_shipping;
					}
				}
					
				// min shipping
				if ($min_shipping != ''){
					if ($min_shipping > $totalshipping) {
						$totalshipping = $min_shipping;
					}
				}
		
				if ($shippingmethod == '5' AND $shipping[$zone_id][6] == 'Yes'){

					$_SESSION['SHIPPING']['RATES'][5]['name'] = $lang['langPickup'];
					$shipping_name = $lang['langPickup'];
					
					if ($shipping[$zone_id][7] != ''){

						$totalshipping = $totalshipping + $shipping[$zone_id][7];
						
					}
					$_SESSION['SHIPPING']['RATES'][5]['amount'] = $totalshipping;
				} // end pickup
				
				// store shipping name in billing session
				$_SESSION['BILLING']['SHIPPINGNAME'] = $shipping_name;

			}
			// process shipping rates when customer has not yet selected one
			else {
				
				for ($x = 1; $x <= 4; $x++) {
					
					$_SESSION['SHIPPING']['RATES'][$x]['name'] = ${'name'.$x};
					
					// if shipping fee, add extras
					if (${'final_shipping_price'.$x} != '' ) {
	
						// handling fee $
						if ($handling_fee != '' AND $handling_fee != '0.00'){
								${'final_shipping_price'.$x} = ${'final_shipping_price'.$x} + $handling_fee;
						} 
							
						// handling fee %
						if ($handling_percent != '' AND $handling_percent != '0.00'){
								${'final_shipping_price'.$x} = ${'final_shipping_price'.$x} + (${'final_shipping_price'.$x} * ($handling_percent / 100));
						} 
						
						// max shipping
						if ($max_shipping != '' AND $max_shipping != '0.00'){
							if ($max_shipping< ${'final_shipping_price'.$x} && $max_shipping > .01){
								${'final_shipping_price'.$x} = $max_shipping;
							}
						}
							
						// min shipping
						if ($min_shipping != '' AND $min_shipping != '0.00'){
							if ($min_shipping > ${'final_shipping_price'.$x}) {
								${'final_shipping_price'.$x} = $min_shipping;
							}
						}
					} // end if price not blank
					
					// now create rates for shipping template to use
					$_SESSION['SHIPPING']['RATES'][$x]['amount'] = ${'final_shipping_price'.$x};
				} // end for loop

				if ($shipping[$zone_id][6] == 'Yes'){

					$_SESSION['SHIPPING']['RATES'][5]['name'] = $lang['langPickup'];
					$_SESSION['BILLING']['SHIPPINGNAME'] = $lang['langPickup'];
					
					if ($shipping_zone[$zone_id][7] != ''){
						$_SESSION['SHIPPING']['RATES'][5]['amount'] = $shipping[$zone_id][7];
					}
					else {
						$_SESSION['SHIPPING']['RATES'][5]['amount'] = '0.00';
					}
				} // end pickup
				
		} // end if no customer selection
			
			
		} // end if type_id = 3,4.5.6,7				
	} // end if only 1 zone
	
	if ($totalshipping < 0){
		$totalshipping = 0;
	}
	
	return $totalshipping;;
} // end calculate zone shipping
	
	

// GET ZONE - determine which zone applies to this customer
function getZone(){
		
	// get billing array
	$billing = GetBilling();
	
	$to_zip = trim($billing['SZIP']);
	$to_state = trim($billing['SSTATE']);
	$to_country = trim($billing['SCOUNTRY2']);
	
	if ($to_zip == '' || $to_state == '' || $to_country == ''){
		return FALSE;
	}
	
	
	// CHECK EACH ZONE FOR ZIP CODE	
	// get shipping arrays
	if (file_exists($config["FilePath"].'admin/shipping_1.php')){
		include ($config['FilePath'].'admin/shipping_1.php');	
	}
	elseif ('admin/shipping_1.php'){
		include ('admin/shipping_1.php');	
	}
	
	// get count of arrays
	$countShipping = count($shipping);
	
	// loop on results
	for ($x=1; $x <= $countShipping; $x++){
		
		$get_zip = '';
		$get_zip = $shipping[$x][5];
		
		$available_zips = array();
		
		if ($get_zip != ''){
			$available_zips = explode(",",$get_zip);	
		}
		
		// in_array(needle,haystack)
		// must match all digits exactly
		if (in_array($to_zip, $available_zips)){
			$zone_id = $x;
			return $zone_id;	
		}	
		
	} // end while zip loop

	// CHECK EACH ZONE FOR STATE
	
	for ($x=1; $x <= $countShipping; $x++){
		
		$get_states = '';
		$get_states = $shipping[$x][4];
		
		$available_states = array();
		
		if ($get_states != ''){
			$available_states = explode(",",$get_states);	
		}
		
		// in_array(needle,haystack)
		// must match state spelling exactly
		if (in_array($to_state, $available_states)){
			$zone_id = $x;
			return $zone_id;	
		}	
		
	} // end while zip loop	
			
		
	// CHECK EACH ZONE FOR COUNTRY	
		for ($x=1; $x <= $countShipping; $x++){
		
		$get_country = '';
		$get_country = $shipping[$x][3];
		
		$available_countries = array();
		
		if ($get_country != ''){
			$available_countries = explode(",",$get_country);	
		}
		
		// in_array(needle,haystack)
		// must match state spelling exactly
		if (in_array($to_country, $available_countries)){
			$zone_id = $x;
			return $zone_id;	
		}	
		
	} // end while zip loop	
			
	// zip, state and country were not found so return defalut zone, 1
	return 1;
} // end get zone


// IS SHIPPING READY
// Make sure that we have region, country and zip info to calculate shipping
function IsShippingReady(){
	
	// get billing array
	$billing = GetBilling();

	// check for region, country and zip code
	if ((isset($billing['SSTATEID']) && $billing['SSTATEID'] != '') && (isset($billing['SCOUNTRYID']) && $billing['SCOUNTRYID'] != '') && (isset($billing['SZIP']) && $billing['SZIP'] != '')){
		return TRUE;
	}
	else {
		return FALSE;
	}
}

?>