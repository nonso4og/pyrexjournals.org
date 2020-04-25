<?php

$shipping = array();

$shipping["BC"] = "0:2.95;5:4.95;10:8.95";

$shipping["ALB"] = "0:2.95;5:4.95;10:8.95";

$shipping["ONT"] = "0:2.95;5:4.95;10:8.95";

$shipping["NWT"] = "0:2.95;5:4.95;10:8.95";

$shipping["USA"] = "0:5.95;5:8.95;10:12.95";



/*

PRODUCTQUANTITY = Quantity of item

PRODUCTWEIGHT = Weight of item

$config["ShippingFreeLevel"] = If total is greater or equal to this then shipping is free

$config["ShippingMinimum"] = Minimum amount that will be charged for shipping

$config["ShippingMaximum"] = Maximum amount that will be charged for shipping

*/



function CalculateTotalShipping($products, $subtotal){

	global $config, $shipping;

	

	$billing = GetBilling(); // so we can get the country

	$shipregion = LookupCountry3($billing["COUNTRYID"]);

	if ($shipregion == "CAN") // if canada is the country then look up province

		$shipregion = LookupState($billing["STATEID"]);

	$totalshipping = 0;

	$totalweight = 0;

	

	if ($config["ShippingFreeLevel"] <= $subtotal && trim($config["ShippingFreeLevel"]) != "")  // free shipping if total is greater or equal

		return 0;

	// check for duplicates

	foreach ($products as $product){ // calculate shipping

		$totalweight += $product[PRODUCTWEIGHT] * $product[PRODUCTQUANTITY];

	}

	if ($shipping[$shipregion] != "" && $totalweight > 0){

		$weightitems = explode(";",$shipping[$shipregion]);

		foreach ($weightitems as $weights){

			if (sizeof($weights) > 0 && $weights != ""){

				$weight = explode(":",$weights);

				// find the weight scale that matches

				$weightshipping = 0;

				if ($totalweight > $weight[0])

					$totalshipping = $weight[1];

			}

		}

	}

	

	if ($config["ShippingMinimum"] > $totalshipping)

		$totalshipping = $config["ShippingMinimum"];

	if ($config["ShippingMaximum"] < $totalshipping && trim($config["ShippingMaximum"]) != "")

		$totalshipping = $config["ShippingMaximum"];

	

	return $totalshipping;

}

?>