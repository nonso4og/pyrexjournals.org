<?php

function Gatewaystratapay(){

	return "remote";

}



function Configstratapay(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Strata Pay:</td>

	</tr>

	<tr>

		<td width='59%'>Account Number:</td>

		<td width='41%'><input type='text' name='modulestratapay_number' size='10' value='<?php echo $PROCESSOR["modulestratapay_number"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutstratapay($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form action="https://www.stratapay.com.au/paypage.aspx" name="payment" method="post">

<input type="hidden" name="stringStrataPayNumber" value="<?php echo $PROCESSOR["modulestratapay_number"]?>">

<input type="hidden" name="decimalAmount" value="<?php echo $totals["RAWTOTAL"]?>">

<input type="hidden" name="stringText" value="<?php echo $orderid?>">

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