<?php

function Gatewaysecuretrading(){

	return "remote";

}



function Configsecuretrading(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Secure Trading:</td>

	</tr>

	<tr>

		<td width='59%'>Merchant ID:</td>

		<td width='41%'><input type='text' name='modulesecuretrading_merchant' size='10' value='<?php echo $PROCESSOR["modulesecuretrading_merchant"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Merchant Email:</td>

		<td width='41%'><input type='text' name='modulesecuretrading_merchantemail' size='10' value='<?php echo $PROCESSOR["modulesecuretrading_merchantemail"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Currency (GBP):</td>

		<td width='41%'><input type='text' name='modulesecuretrading_currency' size='10' value='<?php echo $PROCESSOR["modulesecuretrading_currency"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Send Custmomer An Email:</td>

		<td width='41%'><select size="1" name='modulesecuretrading_customeremail'> <option value='<?php echo $PROCESSOR["modulesecuretrading_customeremail"]; ?>'><?php echo $PROCESSOR["modulesecuretrading_customeremail"]; ?></option>

		<option value='Yes'>Yes</option>

		<option value='No'>No</option></select></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutsecuretrading($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://securetrading.net/authorize/form.cgi" method="POST">

<input type="hidden" name="merchant" value="<?php echo $PROCESSOR["modulesecuretrading_merchant"]; ?>">

<input type="hidden" name="merchantemail" value="<?php echo $PROCESSOR["modulesecuretrading_merchantemail"]; ?>">

<input type="hidden" name="amount" value="<?php echo (int)($totals["RAWTOTAL"] * 100); ?>">

<input type="hidden" name="currency" value="<?php echo $PROCESSOR["modulesecuretrading_currency"]; ?>">

<input type="hidden" name="orderref" value="<?php echo $orderid; ?>">

<input type="hidden" name="email" value="<?php echo $billing['EMAIL']; ?>">

<?php if ($PROCESSOR["modulesecuretrading_customeremail"] == "Yes"){ ?>

<input type="hidden" name="customeremail" value="1">

<?php } ?>

<input type=hidden name="orderinfo" value="<?php echo $config["COMPANYNAME"]; ?> Order Form">

<input type="hidden" name="name" value="<?php echo $billing['FIRSTNAME']." ".$billing["LASTNAME"]; ?>"><br>

<input type="hidden" name="company" value="<?php echo $billing['COMPANY']; ?>"><br>

<input type="hidden" name="address" value="<?php echo $billing['ADDRESS']; ?>"><br>

<input type="hidden" name="postcode" value="<?php echo $billing['ZIP']; ?>"><br>

<input type="hidden" name="telephone" value="<?php echo $billing['PHONE']; ?>"><br>

<input type="hidden" name="settlementday" value="1">

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