<?php

function Gatewayematters(){

	return "remote";

}

function Configematters(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

 	<tr>

		<td width="100%" colspan="2" align="center">

		EMatters</td>

	</tr>

	<tr>

		<td>Username:</td>

		<td width='10%'><input type='text' name='moduleematters_username' size='25' value='<?php echo $PROCESSOR["moduleematters_username"]; ?>'></td>

	</tr>

	<tr>

		<td>Return URL:</td>

		<td width='10%'><input type='text' name='moduleematters_returnurl' size='25' value='<?php echo $PROCESSOR["moduleematters_returnurl"]; ?>'></td>

	</tr>

</table>



<?php

}



function Checkoutematters($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://merchant.ematters.com.au/cmaonline.nsf/<?php echo $PROCESSOR["moduleematters_username"]?>?OpenForm&<?php echo $totals["RAWTOTAL"]?>&<?php echo $orderid; ?>&<?php echo urlencode($billing["FIRSTNAME"]." ".$billing["LASTNAME"]); ?>&<?php echo $billing["EMAIL"]?>&<?php echo $PROCESSOR["moduleematters_returnurl"]?>&13&01" method="post">

<input type="submit" name="submit" value="<?php echo $lang["PaymentSubmit"]; ?>">

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