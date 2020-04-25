<?php

function Gatewaylinkpoint(){

	return "creditcards";

}



function Configlinkpoint(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Linkpoint:<input type="hidden" name="modulelinkpoint_creditcards" value="Yes"></td>

	</tr>

	<tr>

		<td width='59%'>Host:</td>

		<td width='41%'><input type='text' name='modulelinkpoint_host' size='10' value='<?php echo $PROCESSOR["modulelinkpoint_host"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Port:</td>

		<td width='41%'><input type='text' name='modulelinkpoint_port' size='10' value='<?php echo $PROCESSOR["modulelinkpoint_port"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Key File:</td>

		<td width='41%'><input type='text' name='modulelinkpoint_keyfile' size='10' value='<?php echo $PROCESSOR["modulelinkpoint_keyfile"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Store:</td>

		<td width='41%'><input type='text' name='modulelinkpoint_store' size='10' value='<?php echo $PROCESSOR["modulelinkpoint_store"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Path:</td>

		<td width='41%'><input type='text' name='modulelinkpoint_cpath' size='10' value='<?php echo $PROCESSOR["modulelinkpoint_cpath"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Card Names (Visa,MasterCard):</td>

		<td width='41%'><input type='text' name='modulelinkpoint_cardnames' size='10' value='<?php echo $PROCESSOR["modulelinkpoint_cardnames"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutlinkpoint($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config, $MONTHS;;



	// process linkpoint gateway credit card info

	include ("processor/linkpoint-lib.php");

	$mylphp=new lphp;

	# constants

	$myorder["host"] = $PROCESSOR["modulelinkpoint_host"];

	$myorder["port"] = $PROCESSOR["modulelinkpoint_port"];

	$myorder["keyfile"] = $PROCESSOR["modulelinkpoint_keyfile"]; # Change this to the name and location of your certificate file

	$myorder["configfile"] = $PROCESSOR["modulelinkpoint_store"]; # Change this to your store number



	$myorder["cardnumber"] = $billing["CCNUMBER"];

	$myorder["cardexpmonth"] = $billing["CCMONTH"];

	$myorder["cardexpyear"] = $billing["CCYEAR"];

	$myorder["chargetotal"] = $totals["RAWTOTAL"];

	$myorder["ordertype"] = "Sale";

		if ($_POST["debugging"])

	$myorder["debugging"]="true";

	if ($PROCESSOR["modulelinkpoint_cpath"] != ""){

		$myorder["cbin"] = "true";

		$myorder["cpath"] = $PROCESSOR["modulelinkpoint_cpath"];

	}

	# Send transaction. Use one of two possible methods



	$response = $mylphp->curl_process($myorder); # or use curl methods



	if (strstr($response,"APPROVED"))

		ThankYou();

	else

		PaymentDeclined();

}

?>