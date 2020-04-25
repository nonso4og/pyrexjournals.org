<?php

// yourpay.com documentation

// https://www.yourpay.com/manuals/ypumcon.pdf



function Gatewayyourpay(){

	return "remote";

}



function Configyourpay(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">YourPay:</td>

	</tr>

	<tr>

		<td width='59%'>Store Name:</td>

		<td width='41%'><input type='text' name='moduleyourpay_storename' size='10' value='<?php echo $PROCESSOR["moduleyourpay_storename"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Response Success URL:</td>

		<td width='41%'><input type='text' name='moduleyourpay_responsesuccessurl' size='25' value='<?php echo $PROCESSOR["moduleyourpay_responsesuccessurl"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Response Fail URL:</td>

		<td width='41%'><input type='text' name='moduleyourpay_responsefailurl' size='25' value='<?php echo $PROCESSOR["moduleyourpay_responsefailurl"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutyourpay($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://secure.linkpt.net/lpcentral/servlet/lppay" method="post">

<input type="hidden" name="mode" value="fullpay">

<input type="hidden" name="txntype" value="sale">

<input type="hidden" name="responseSuccessURL" value="<?php echo $PROCESSOR["moduleyourpay_responsesuccessurl"];  ?>">

<input type="hidden" name="responseFailURL" value="<?php echo $PROCESSOR["moduleyourpay_responsefailurl"];  ?>">

<input type="hidden" name="storename" value="<?php echo $PROCESSOR["moduleyourpay_storename"];  ?>"> 

<input type="hidden" name="chargetotal" value="<?php echo $totals["RAWTOTAL"]; ?>"> 

<input type="hidden" name="oid" value="<?php echo $orderid; ?>"> 

<input type="hidden" name="bname" value="<?php echo $billing["FIRSTNAME"]." ".$billing["LASTNAME"]; ?>">

<input type="hidden" name="baddr1" value="<?php echo $billing["ADDRESS"]; ?>">

<input type="hidden" name="baddr2" value="<?php echo $billing["ADDRESS2"]; ?>">

<input type="hidden" name="bcity" value="<?php echo $billing["CITY"]; ?>">

<input type="hidden" name="bstate" value="<?php echo $billing["STATE"]; ?>">

<input type="hidden" name="bzip" value="<?php echo $billing["ZIP"]; ?>">

<input type="hidden" name="bcountry" value="<?php echo $billing["COUNTRY2"]; ?>">

<input type="hidden" name="email" value="<?php echo $billing["EMAIL"]; ?>">

<input type="hidden" name="phone" value="<?php echo $billing["PHONE"]; ?>">

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