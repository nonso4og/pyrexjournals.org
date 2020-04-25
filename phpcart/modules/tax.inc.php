<?php

/*

PRODUCTTAXID = the tax rate id (either 1 or 2)

TAXID1 = the tax rate for tax id 1
TAXID2 = the tax rate for tax id 2

PRODUCTQUANTITY = the quantity ordered for that product
PRODUCTPRICE = the price for one item

$config["TaxAllProducts"] = Taxrate to tax all products
$config["TaxShipping"] = do we tax the shipping total

GetOptionsTotal() = Returns the total for the options for that product

*/

function CalculateTotalTax($products, $shipping, $taxrate1, $taxrate2){
	global $config;

	// set basic values
	$producttax = 0;
	$totaltax = 0;
	$tax1 = 0;
	$tax2 = 0;
	$TaxTitle1 = '';
	$TaxTitle2 = '';
	
	// set tax rate default
	$product[PRODUCTTAXID] = 1;
	
	// do we even need to calculate tax?
	if ($taxrate1 < .01 && $taxrate2 < .01) {
		return array($totaltax,$tax1,$tax2,$TaxDisplaySeparate);
	}

	// calculate tax on products
	foreach ($products as $product){ 

		if ($product[PRODUCTTAX] > 0){
			if ($config["TaxShipping"] == "Yes") {
				$producttax += ($product[PRODUCTTAX] * ($product[PRODUCTQUANTITY] + ($product[PRODUCTSHIPPING1] + ($product[PRODUCTSHIPPING] * $product[PRODUCTQUANTITY]) + ($product[PRODUCTSHIPPING2] * ($product[PRODUCTQUANTITY] - 1)))));
			}
			else {
				$producttax += ($product[PRODUCTTAX] * $product[PRODUCTQUANTITY]);
			}
		}
		else{
			
			// if we pass in a taxid or if we tax all products
			if ($product[PRODUCTTAXID] > 0 || $config["TaxAllProducts"] == "Yes"){ 
		
				// check if we should be using taxrate 1
				if ($product[PRODUCTTAXID] == 1) {
					$taxrate = $taxrate1;
			
					// calculate totaltax
					$tax1 += round((($product[PRODUCTPRICE] + GetOptionsTotal($product)) * $product[PRODUCTQUANTITY]) * $taxrate / 100, 2);
				}

				// check if we should be using taxrate 2
				if ($product[PRODUCTTAXID] == 2) {
					$taxrate = $taxrate2;
				
					// calculate totaltax
					$tax2 += round((($product[PRODUCTPRICE] + GetOptionsTotal($product)) * $product[PRODUCTQUANTITY]) * $taxrate / 100, 2);
				}
				
				// if taxrate = 3, then add taxrate1 and taxrate2
				if ($product[PRODUCTTAXID] == 3) {

					// calculate tax for taxrate1
					$tax1 += round((($product[PRODUCTPRICE] + GetOptionsTotal($product)) * $product[PRODUCTQUANTITY]) * $taxrate1 / 100,2);	
			
					// calculate tax for taxrate2
					$tax2 += round((($product[PRODUCTPRICE] + GetOptionsTotal($product)) * $product[PRODUCTQUANTITY]) * $taxrate2 / 100, 2);

				}
			} // end if taxid exists and tax all items		
		} // end else option
	} // end foreach loop
	
	// calculate tax on shipping
	if ($config["TaxShipping"] != "Yes"){
		$shipping = 0;
	}
	else {
		// calculate tax on taxrate1, taxrate2 and totaltax
		
		$tax1 = $tax1 + ($shipping * ($taxrate1 / 100));
		$tax2 = $tax2 + ($shipping * ($taxrate2 / 100));
	}
	
	// add up taxes
	$totaltax += $producttax + $tax1 + $tax2;
	
	// 2013 CANADIAN TAXES CHANGES
	//check bililng for Canada and P	rovince 
	
	//BC requires show both PST (province tax) and GST (government tax) after 4/1/2013
	// All other provinces show GST/HST and Total Tax
	
	$billing = getBilling();

	$customer_country = LookupCountry3($billing["SCOUNTRYID"]);

	// if canada is the country then look up province
	if ($customer_country == "CAN") {

		$customer_region = LookupState($billing["SSTATEID"]);
	
		// check for BC
		if ($customer_region == "BC"){
			$TaxTitle1 = 'PST';
			$TaxTitle2 = 'GST';
		}
		else {
			$TaxTitle2 = 'GST/HST';
		}
	} // end separte shipping check

	return array($totaltax,$tax1,$tax2,$TaxTitle1,$TaxTitle2);
}

?>