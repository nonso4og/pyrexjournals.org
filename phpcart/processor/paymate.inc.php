<?php

function Gatewaypaymate(){

	return "remote";

}



function Configpaymate(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Paymate:</td>

	</tr>

	<tr>

		<td width='59%'>Merchant ID:</td>

		<td width='41%'><input type='text' name='modulepaymate_merchantid' size='10' value='<?php echo $PROCESSOR["modulepaymate_merchantid"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Currency:</td>

		<td width='41%'><input type='text' name='modulepaymate_currency' size='10' value='<?php echo $PROCESSOR["modulepaymate_currency"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Return URL:</td>

		<td width='41%'><input type='text' name='modulepaymate_return' size='20' value='<?php echo $PROCESSOR["modulepaymate_return"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutpaymate($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://www.paymate.com.au/PayMate/ExpressPayment" method="post">

<input type="hidden" name="mid" value="<?php echo $PROCESSOR["modulepaymate_merchantid"]; ?>"> 

<input type="hidden" name="currency" value="<?php echo $PROCESSOR["modulepaymate_currency"]; ?>"> 

<input type="hidden" name="return" value="<?php echo $PROCESSOR["modulepaymate_return"]; ?>"> 

<input type="hidden" name="amt" value="<?php echo $totals["RAWTOTAL"]; ?>"> 

<input type="hidden" name="ref" value="<?php echo $orderid; ?>"> 

<input type="hidden" name="pmt_sender_email" value="<?php echo $billing["EMAIL"]; ?>"> 

<input type="hidden" name="pmt_contact_firstname" value="<?php echo $billing["FIRSTNAME"]; ?>"> 

<input type="hidden" name="pmt_contact_surname" value="<?php echo $billing["LASTNAME"]; ?>"> 

<input type="hidden" name="pmt_contact_phone" value="<?php echo $billing["PHONE"]; ?>"> 

<input type="hidden" name="pmt_country" value="<?php echo $billing["COUNTRY"]; ?>"> 

<input type="hidden" name="regindi_address1" value="<?php echo $billing["ADDRESS"]; ?>"> 

<input type="hidden" name="regindi_address2" value="<?php echo $billing["ADDRESS2"]; ?>"> 

<input type="hidden" name="regindi_sub" value="<?php echo $billing["CITY"]; ?>"> 

<input type="hidden" name="regindi_pcode" value="<?php echo $billing["ZIP"]; ?>"> 

<input type="hidden" name="popup" value="false"> 

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