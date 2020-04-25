<?php

function Gatewayworldpay(){

	return "remote";

}



function Configworldpay(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Worldpay:</td>

	</tr>

	<tr>

		<td width='59%'>Worldpay ID:</td>

		<td width='41%'><input type='text' name='moduleworldpay_instid' size='10' value='<?php echo $PROCESSOR["moduleworldpay_instid"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Currency:<br><a target='_blank' href="http://support.worldpay.com/kb/integration_guides/junior/integration/help/appendicies/sjig_10200.html">List</a></td>

		<td width='41%'><input type='text' name='moduleworldpay_currency' size='10' value='<?php echo $PROCESSOR["moduleworldpay_currency"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutworldpay($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

	$amount = $totals["RAWTOTAL"];

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://select.worldpay.com/wcc/purchase" method="POST">

<input type="hidden" name="desc" value="<?php echo $config["CARTDESCRIPTION"]; ?>">

<input type="hidden" name="cartId" value="<?php echo $orderid; ?>">

<input type="hidden" name="instId" value="<?php echo $PROCESSOR["moduleworldpay_instid"]; ?>">

<input type="hidden" name="currency" value="<?php echo $PROCESSOR["moduleworldpay_currency"]; ?>">

<input type="hidden" name="amount" value="<?php echo $amount; ?>">

<input type="hidden" name="email" value="<?php echo $billing['EMAIL']; ?>">

<input type="hidden" name="name" value="<?php echo $billing['FIRSTNAME']." ".$billing['LASTNAME']; ?>">

<input type="hidden" name="address" value="<?php echo $billing['ADDRESS']." ".$billing['ADDRESS2']."&#10".$billing['CITY']."&#10;".$billing['STATE']; ?>">

<input type="hidden" name="postcode" value="<?php echo $billing['ZIP']; ?>">

<input type="hidden" name="country" value="<?php echo $billing['COUNTRY2']; ?>">

<input type="hidden" name="tel" value="<?php echo $billing['PHONE']; ?>">

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