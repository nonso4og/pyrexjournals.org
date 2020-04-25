<?php

function Gatewayeway(){

	return "remote";

}

function Configeway(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

 	<tr>

		<td width="100%" colspan="2" align="center">

		EWay</td>

	</tr>

	<tr>

		<td>Customer ID:</td>

		<td width='10%'><input type='text' name='moduleeway_customerid' size='25' value='<?php echo $PROCESSOR["moduleeway_customerid"]; ?>'></td>

	</tr>

	<tr>

		<td>Return URL:</td>

		<td width='10%'><input type='text' name='moduleeway_url' size='25' value='<?php echo $PROCESSOR["moduleeway_url"]; ?>'></td>

	</tr>

</table>



<?php

}



function Checkouteway($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form method="post" action="https://www.eway.com.au/gateway/payment.asp" name="payment">

<input type="hidden" name="ewayCustomerID" value="<?php echo $PROCESSOR["moduleeway_customerid"]?>">

<input type="hidden" name="ewayTotalAmount" value="<?php echo number_format(($totals["RAWTOTAL"] * 100),0,"",""); ?>">

<input type="hidden" name="ewayCustomerFirstName" value="<?php echo $billing["FIRSTNAME"]?>">

<input type="hidden" name="ewayCustomerLastName" value="<?php echo $billing["LASTNAME"]?>">

<input type="hidden" name="ewayCustomerEmail" value="<?php echo $billing["EMAIL"]?>">

<input type="hidden" name="ewayCustomerAddress" value="<?php echo $billing["ADDRESS"]?>">

<input type="hidden" name="ewayCustomerPostcode" value="<?php echo $billing["ZIP"]?>">

<input type="hidden" name="ewayCustomerInvoiceDescription" value="<?php echo $config["CARTDESCRIPTION"]; ?>">

<input type="hidden" name="ewayCustomerInvoiceRef" value="<?php echo $orderid?>">

<input type="hidden" name="eWAYURL" value="<?php echo $PROCESSOR["moduleeway_url"]?>">

<input type="hidden" name="ewaySiteTitle" value="<?php echo $config["COMPANYNAME"]?>">

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