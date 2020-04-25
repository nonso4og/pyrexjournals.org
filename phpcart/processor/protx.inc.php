<?php

function Gatewayprotx(){

	return "remote";

}



function Configprotx(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Protx:</td>

	</tr>

	<tr>

		<td width='59%'>Vendor ID:</td>

		<td width='41%'><input type='text' name='moduleprotx_vendor' size='10' value='<?php echo $PROCESSOR["moduleprotx_vendor"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Encryption Password :</td>

		<td width='41%'><input type='text' name='moduleprotx_password' size='10' value='<?php echo $PROCESSOR["moduleprotx_password"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Currency:</td>

		<td width='41%'><input type='text' name='moduleprotx_currency' size='6' value='<?php echo $PROCESSOR["moduleprotx_currency"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Send Customer An Email:</td>

		<td width='41%'><input name="moduleprotx_customeremail" type="radio" value="Yes" <?php if ($PROCESSOR["moduleprotx_customeremail"] == "Yes") echo "checked"; ?>>Yes&nbsp;&nbsp;&nbsp;&nbsp;<input name="moduleprotx_customeremail" type="radio" value="No" <?php if ($PROCESSOR["moduleprotx_customeremail"] != "Yes") echo "checked"; ?>>

		No</td>

	</tr>

	<tr>

		<td width='59%'>Send Admin An Email:</td>

		<td width='41%'><input name="moduleprotx_vendoremail" type="radio" value="Yes" <?php if ($PROCESSOR["moduleprotx_vendoremail"] == "Yes") echo "checked"; ?>>Yes&nbsp;&nbsp;&nbsp;&nbsp;<input name="moduleprotx_vendoremail" type="radio" value="No" <?php if ($PROCESSOR["moduleprotx_vendoremail"] != "Yes") echo "checked"; ?>>

		No</td>

	</tr>

	<tr>

		<td width='59%'>Success URL:</td>

		<td width='41%'><input type='text' name='moduleprotx_successurl' size='10' value='<?php echo $PROCESSOR["moduleprotx_successurl"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Failure URL:</td>

		<td width='41%'><input type='text' name='moduleprotx_failureurl' size='10' value='<?php echo $PROCESSOR["moduleprotx_failureurl"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutprotx($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

$crypt = "VendorTxCode=".$orderid;

$crypt .= "&Amount=".$totals["RAWTOTAL"];

$crypt .= "&Currency=".$PROCESSOR["moduleprotx_currency"];

$crypt .= "&Description=".$lang["CartDescription"];

$crypt .= "&SuccessURL=".$PROCESSOR["moduleprotx_successurl"];

$crypt .= "&FailureURL=".$PROCESSOR["moduleprotx_failureurl"];

$crypt .= "&CustomerName=".$billing["FIRSTNAME"]." ".$billing["LASTNAME"];

if ($PROCESSOR["moduleprotx_CustomerEMail"] == "Y")

	$crypt .= "&CustomerEmail=".$billing["EMAIL"];

if ($PROCESSOR["moduleprotx_VendorEMail"] == "Y")

	$crypt .= "&VendorEmail=".$config["AdminEmail"];

$crypt .= "&BillingAddress=".$billing["ADDRESS"];

$crypt .= "&BillingPostCode=".$billing["ZIP"];

$crypt .= "&BillingAddress=".$billing["ADDRESS"];

$crypt = base64Encode(SimpleXor($crypt,$PROCESSOR["moduleprotx_password"]));



?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://ukvps.protx.com/vps2Form/submit.asp" method="post">

<input type="hidden" name="VPSProtocol" value="2.22"> 

<input type="hidden" name="TxType" value="PAYMENT"> 

<input type="hidden" name="Vendor" value="<?php echo $PROCESSOR["moduleprotx_vendor"]; ?>"> 

<input type="hidden" name="Crypt" value="<?php echo $crypt; ?>"> 

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

<?php } 



function base64Encode($plain) {

  $output = base64_encode($plain);

  return $output;

}

function base64Decode($scrambled) {

  $scrambled = str_replace(" ","+",$scrambled);

  $output = base64_decode($scrambled);

  return $output;

}



function simpleXor($InString, $Key) {

  $KeyList = array();

  for($i = 0; $i < strlen($Key); $i++){

    $KeyList[$i] = ord(substr($Key, $i, 1));

  }

  for($i = 0; $i < strlen($InString); $i++) {

    $output.= chr(ord(substr($InString, $i, 1)) ^ ($KeyList[$i % strlen($Key)]));

  }

  return $output;

}

?>