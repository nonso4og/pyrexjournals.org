<?php

/*

Coupons are held in an array in the file: admin/coupon_1.php

The array consists of 7 elements:

1) COUPONCODE
	Definiton: Text code to identify coupon

2) COUPONTYPE
	Types of coupons:
		Free Shipping = free shipping
		Shipping = discount shipping
		% = percent discount
		$ = fixed price discount	

3) COUPONAMOUNT
	Definition: Maximum amount of discount
	
4) COUPONMINIMUM
	Definition: Minimum order that must be reached for coupon to be activated

5) COUPONEXPIRES
	Definiton: The day in which a coupon expires. Shown in format: YYYYMMDD

6) COUPONQUANTITY
	Definition: This field is used as quantity of coupons available for use. If quantity is blank, it is unlimited. If it is zero, then no coupons are available for use. If quantity > 1, then coupon can be used.

7) COUPONEXTRA -> PRODUCTID
	Definition: This field holds 1 or more product ID numbers separated by commas. If this field is populated, the cart software looks for this ID in the cart. If the ID is present, then it applies the coupon, if not, then it displays a "no product for this coupon in cart" error message.


In the phpCart software, the cart includes the function, GetCoupons() which returns an array of all the coupons contained in the file, admin/coupon_1.php.

This function is only called if a coupon has been submitted by the prospective customer. The coupon has already been checked to make sure that it exists in our coupon array and that it has not expired.

*/

function CalculateCoupon($coupon, $subtotal, $shipping){
	global $lang, $config;

	// calculate coupon
	$coupons = GetCoupons();
	$discount = 0;
	
	// $coupon is the coupon array that is associated with the coupon code submitted by customer
	
	// make sure subtotal submit exceeds the minimum amount required for this coupon to be in effect 
	if ($coupons[$coupon][COUPONMINIMUM] > $subtotal){		
		$config["MESSAGE"] = $lang["CouponMinimum"];
		return 0;
	}
	
	// make sure that coupon quantity is blank for unlimited or a number for quantity available
	if ($coupons[$coupon][COUPONQUANTITY] === 0 ){		
		echo 'coupon used';
		exit;
				$config["MESSAGE"] = $lang["CouponRedeemed"] ;
		return 0;
	}
	
	// if ID field is used, create array of ID numbers in coupon
	if (!empty($coupons[$coupon][COUPONEXTRA])){
		$products = db_read();	
		$productidArray = explode (',', $coupons[$coupon][COUPONEXTRA]);
	
		// create array with all product IDs in cart
		foreach ($products as $key => $value){
			$productArray[] = $value[0];	
		}
	}

	// get each coupon type and calculate discount
	switch ($coupons[$coupon][COUPONTYPE]){

		// shipping discount
		case "Free Shipping" : {
			
			if (!empty($productidArray)){ 
				foreach ($productArray as $value){
					if (in_array($value, $productidArray)){
						$discount = $shipping;
						break;
					}
				}
			}
			else {
				if ($shipping != ''){
					$discount = $shipping;
				}	
				break;
			}
		}

			
		// shipping discount
		case "Shipping" : {
			if (!empty($productidArray)){ 
				foreach ($productArray as $value){
					if (in_array($value, $productidArray)){
						if ($shipping > $coupons[$coupon][COUPONAMOUNT]){
							$discount = $coupons[$coupon][COUPONAMOUNT];
						}
						else {
							$discount = $shipping;
						}
						break;
					}
				}
			}			
			else {
				if ($shipping > $coupons[$coupon][COUPONAMOUNT]){
					$discount = $coupons[$coupon][COUPONAMOUNT];
				}
				else {
					$discount = $shipping;
				}
				break;
			}
		} // end shipping discount

		// percent discount
		case "%" : {		

			if (!empty($productidArray)){ 
				foreach ($productArray as $value){
					if (in_array($value, $productidArray)){
						$discount = $subtotal * ($coupons[$coupon][COUPONAMOUNT]/100);
						
						if ($subtotal - $discount < 0) {
							$discount = $subtotal;
						}
						break;
					}
				}
			}
			else {
				$discount = $subtotal * ($coupons[$coupon][COUPONAMOUNT]/100);
				
				if ($subtotal - $discount < 0) {
					$discount = $subtotal;
				}
				break;
			}
		} // end percent discount

		case "$" : {
			if (!empty($productidArray)){ 
				foreach ($productArray as $value){
					if (in_array($value, $productidArray)){
						if ($subtotal < $coupons[$coupon][COUPONAMOUNT]) {
							$discount = $subtotal;
						}
						else {
							$discount = $coupons[$coupon][COUPONAMOUNT];
						}
						break;
					}
				}
			}
			else {
				if ($subtotal < $coupons[$coupon][COUPONAMOUNT]) {
					$discount = $subtotal;
				}
				else {
					$discount = $coupons[$coupon][COUPONAMOUNT];
				}
				break;
			}
		} // end $ discount
	} // end switch command


	return $discount;
}

function ReduceCouponQuantity($data) {
	
	$coupons = GetCoupons();

	// coupon used in this cart
	$coupon = $data["COUPON"];
	
	if ($data["COUPON"] == ''){
		return;
	}
	
		$couponarray = "";
		$coupondata = '';
	
	// if coupon is limited by quantity check to see if we need to decrement available quantity
	if ($coupon != '' AND $coupons[$coupon][COUPONQUANTITY] != '' AND $coupons[$coupon][COUPONQUANTITY] != 0 and $data[RAWDISCOUNT] != '0.00'){
		
		$x = 0;

		foreach ($coupons as $coupondata){
			
			// if coupon used name is not equal to coupon name in admin array, make no changes
			if($coupon != $coupondata[0]){

				if ($couponarray != "") {
					$couponarray .= ";";
				}
				
				$couponarray .= $coupondata[0].":".$coupondata[1].":".$coupondata[2].":".$coupondata[3].":".$coupondata[4].":".$coupondata[5].":".$coupondata[6];
			}
			// if coupon used is equal to coupon value, decrement quantity
			else {
				// subract 1 from quantity
				$coupon_quantity = $coupondata[5] - 1;

				$couponarray .= ";".$coupondata[0].":".$coupondata[1].":".$coupondata[2].":".$coupondata[3].":".$coupondata[4].":".$coupon_quantity.":".$coupondata[6];
			}
			$x++;
		}
	
	$filePointer = fopen("admin/coupon_1.php", "w");
	fwrite($filePointer, "<?php \$couponarray=\"".$couponarray."\"; ?>");
	fclose($filePointer);
	
	}
	return;
}

?>