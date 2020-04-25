<?php

// Include this file to display mini-cart totals. 
// This file uses the minicart.php template to display the product count and subtotal

if (!isset($_SESSION)) {
	session_start();
}

// if your product pages are not within the phpcart directory, then you must insert your filepath in the format: /home/youraccount/topleveldirectory/phpcart/
$filepath = '';

include ($filepath."admin/configuration_1.php");

include ($filepath."admin/regions_1.php");

include ($filepath."admin/countries_1.php");

include ($filepath."modules/coupon.inc.php");

include ($filepath."includes/functions.inc.php");

include ($filepath."localization/".$config["Language"].".php");

include ($filepath."modules/shipping.inc.php");

include ($filepath."modules/tax.inc.php");

include ($filepath."modules/misc.inc.php");

$config["TEMPLATEPATH"] = $filepath."templates/".$config["Template"]."/";



	if ($_SESSION["sessionid"] != ""){

		include ($filepath."includes/filebase.inc.php");

		//$totals = GetTotals();	
		list($data, $records) = GetTotals();
		$totals = array_merge($data, $records);	

	}

	else {

		$totals["PRODUCTCOUNT"] = 0;

		$totals["ITEMCOUNT"] = 0;

		$totals["RAWSUBTOTAL"] = number_format(0,$config["Num_Decimal"],$config["Decimal_Char"],"");

		$totals["RAWTAX"] = number_format(0,$config["Num_Decimal"],$config["Decimal_Char"],"");

		$totals["RAWSHIPPING"] = number_format(0,$config["Num_Decimal"],$config["Decimal_Char"],"");

		$totals["RAWDISCOUNT"] = number_format(0,$config["Num_Decimal"],$config["Decimal_Char"],"");

	

		$total = $totals["RAWSUBTOTAL"] + $totals["RAWTAX"] + $totals["RAWSHIPPING"] - $totals["RAWDISCOUNT"];

		$totals["RAWTOTAL"] = number_format(0,$config["Num_Decimal"],$config["Decimal_Char"],"");

	

		$totals["SUBTOTAL"] = CurrencyFormat(0);

		$totals["TOTALSHIPPING"] = CurrencyFormat(0);

		$totals["TOTALTAX"] = CurrencyFormat(0);

		$totals["DISCOUNT"] = CurrencyFormat(0);

		$totals["GRANDTOTAL"] = CurrencyFormat(0);

}

	

	$template = ReadAFile("minicart.php");

	foreach ($config as $key => $value)

		$template = str_replace("%%$key%%", $value, $template);

	foreach ($totals as $key => $value)

		$template = str_replace("%%$key%%", $value, $template);

	Evaluate($template);
?>