<?php

function Gatewaysagepayments(){

	return "remote";

}



function Configsagepayments(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Sage Payment Solutions:</td>

	</tr>

	<tr>

		<td width='59%'>Merchant ID:</td>

		<td width='41%'><input type='text' name='modulesagepayments_merchantid' size='15' value='<?php echo $PROCESSOR["modulesagepayments_merchantid"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutsagepayments($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<! form name="payment" action="https://va.eftsecure.net/eftcart/forms/order.asp" method="post">

<form name="payment" action="https://www.sagepayments.net/eftcart/forms/express.asp" method="post">

<input type="hidden" name="M_id" value="<?php echo $PROCESSOR["modulesagepayments_merchantid"]?>">

<input type="hidden" name="T_amt" value="<?php echo $totals["RAWTOTAL"]?>">

<input type="hidden" name="T_shipping" value="<?php echo $totals["RAWSHIPPING"]?>">

<input type="hidden" name="T_tax" value="<?php echo $totals["RAWTAX"]?>">

<input type="hidden" name="T_ordernum" value="<?php echo $orderid?>">

<input type="hidden" name="C_email" value="<?php echo $billing["EMAIL"]?>">

<input type="hidden" name="C_company" value="<?php echo $billing["COMPANY"]?>">

<input type="hidden" name="C_fname" value="<?php echo $billing["FIRSTNAME"]?>">

<input type="hidden" name="C_lname" value="<?php echo $billing["LASTNAME"]?>">

<input type="hidden" name="C_address" value="<?php echo $billing["ADDRESS"]?>">

<input type="hidden" name="C_billing_apt" value="<?php echo $billing["ADDRESS2"]?>">

<input type="hidden" name="C_city" value="<?php echo $billing["CITY"]?>">

<input type="hidden" name="C_state" value="<?php echo $billing["STATE"]?>">

<input type="hidden" name="C_zip" value="<?php echo $billing["ZIP"]?>">

<input type="hidden" name="C_country" value="<?php echo $billing["COUNTRY"]?>">

<input type="hidden" name="C_telephone" value="<?php echo $billing["PHONE"]?>">

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