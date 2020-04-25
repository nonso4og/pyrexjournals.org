<?php

function Gatewayauthorize_aim(){

	return "creditcards";

}



function Configauthorize_aim(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Authorize.net AIM:<input type="hidden" name="moduleauthorize_aim_creditcards" value="Yes"></td>

	</tr>

	<tr>

		<td width='59%'>Login:</td>

		<td width='41%'><input type='text' name='moduleauthorize_aim_login' size='10' value='<?php echo $PROCESSOR["moduleauthorize_aim_login"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Key:</td>

		<td width='41%'><input type='text' name='moduleauthorize_aim_tran_key' size='10' value='<?php echo $PROCESSOR["moduleauthorize_aim_tran_key"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Credit Cards Accepted:<br>(separate with a comma)</td>

		<td width='41%'><input type='text' name='moduleauthorize_aim_cardnames' size='40' value='<?php echo $PROCESSOR["moduleauthorize_aim_cardnames"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutauthorize_aim($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config, $MONTHS;;



	$authnet_values				= array

	(

		"x_login"				=> $PROCESSOR["moduleauthorize_aim_login"],

		"x_version"				=> "3.1",

		"x_delim_char"			=> "|",

		"x_delim_data"			=> "TRUE",

		"x_url"					=> "FALSE",

		"x_type"				=> "AUTH_CAPTURE",

		"x_method"				=> "CC",

		"x_tran_key"			=> $PROCESSOR["moduleauthorize_aim_tran_key"],

		"x_relay_response"		=> "FALSE",

		"x_invoice_num"			=> $orderid,

		"x_card_num"			=> $billing["CCNUMBER"],

		"x_card_code"			=> $billing["CVVCODE"],

		"x_exp_date"			=> $billing["CCMONTH"].$billing["CCYEAR"],

		"x_description"			=> $lang["CartDescription"],

		"x_amount"				=> $totals["RAWTOTAL"],

		"x_first_name"			=> $billing["FIRSTNAME"],

		"x_last_name"			=> $billing["LASTNAME"],

		"x_address"				=> $billing["ADDRESS"],

		"x_city"				=> $billing["CITY"],

		"x_state"				=> $billing["STATE"],

		"x_country"				=> $billing["COUNTRY"],

		"x_zip"					=> $billing["ZIP"],

		"x_phone"				=> $billing["PHONE"],

		"x_email"				=> $billing["EMAIL"],

		"x_customer_ip"			=> $billing["IP"]

	);

	

	$fields = "";

	foreach( $authnet_values as $key => $value ) $fields .= "$key=" . urlencode( $value ) . "&";

	

	$ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); // URL of gateway for cURL to post to

	curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)

	curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data

	### curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###

	$resp = curl_exec($ch); //execute post and get results

	curl_close ($ch);

	

	$response = explode("|",$resp);



	if ($response[0] == "1")

		PaymentComplete();

	else{

		$config["MESSAGE"] = $response[3];

		PaymentDeclined();

	}

}

?>