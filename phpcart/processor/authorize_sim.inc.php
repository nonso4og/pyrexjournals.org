<?php

function Gatewayauthorize_sim(){

	return "remote";

}

function Configauthorize_sim(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

 	<tr>

		<td width="100%" colspan="2" align="center">

		Authorize.net SIM</td>

	</tr>

	<tr>

		<td>Authorize.net Login:</td>

		<td width='10%'><input type='text' name='moduleauthorize_sim_login' size='25' value='<?php echo $PROCESSOR["moduleauthorize_sim_login"]; ?>'></td>

	</tr>

	<tr>

		<td>Authorize.net Key:</td>

		<td width='10%'><input type='text' name='moduleauthorize_sim_key' size='25' value='<?php echo $PROCESSOR["moduleauthorize_sim_key"]; ?>'></td>

	</tr>

	<tr>

		<td>Relay URL:</td>

		<td width='10%'><input type='text' name='moduleauthorize_sim_relay' size='25' value='<?php echo $PROCESSOR["moduleauthorize_sim_relay"]; ?>'></td>

	</tr>

</table>



<?php

}



function Checkoutauthorize_sim($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>

<form name="payment" action="https://secure.authorize.net/gateway/transact.dll" method="POST">

<?php

include ("authorize-simlib.php");



// Seed random number for security and better randomness.

srand(time());

$sequence = rand(1, 1000);

// Insert the form elements required for SIM by calling InsertFP

$ret = InsertFP ($PROCESSOR["moduleauthorize_sim_login"], $PROCESSOR["moduleauthorize_sim_key"], $totals["RAWTOTAL"], $sequence);

?>

<?php if (file_exists("../testflag.txt")) { ?>

<input type="hidden" name="x_test_request" value="TRUE">

<?php } ?>

<input type="hidden" name="x_login" value="<?php echo $PROCESSOR["moduleauthorize_sim_login"]?>">

<?php if ($PROCESSOR["moduleauthorize_sim_relay"]) { ?>

<input type="hidden" name="x_relay_url " value="<?php echo $PROCESSOR["moduleauthorize_sim_relay"]?>">

<input type="hidden" name="x_relay_response" value="TRUE">

<?php } ?>

<input type="hidden" name="x_amount" value="<?php echo $totals["RAWTOTAL"]?>">

<input type="hidden" name="x_invoice_num" value="<?php echo $orderid; ?>">

<input type="hidden" name="x_email" value="<?php echo $billing["EMAIL"]?>">

<input type="hidden" name="x_first_name" value="<?php echo $billing["FIRSTNAME"]; ?>">

<input type="hidden" name="x_last_name" value="<?php echo $billing["LASTNAME"]; ?>">

<input type="hidden" name="x_company" value="<?php echo $billing['COMPANY'];?>">

<input type="hidden" name="x_address" value="<?php echo $billing['ADDRESS']; ?>">

<input type="hidden" name="x_city" value="<?php echo $billing['CITY']; ?>">

<input type="hidden" name="x_state" value="<?php echo $billing['STATE']; ?>">

<input type="hidden" name="x_zip" value="<?php echo $billing['ZIP'];?>">

<input type="hidden" name="x_country" value="<?php echo $billing['COUNTRY']; ?>">

<input type="hidden" name="x_phone" value="<?php echo $billing['PHONE'];?>">

<input type="hidden" name="x_show_form" value="PAYMENT_FORM">

<input type="hidden" name="x_description" value="<?php echo $config["CARTDESCRIPTION"]; ?>">

<input type="submit" value="<?php echo $lang["PaymentSubmit"]; ?>">

</form>

<script language="JavaScript">

<!--

window.setTimeout(GoPayment,4000);

function GoPayment(){

	document.payment.submit();

}

-->

</script>

<?php } ?>