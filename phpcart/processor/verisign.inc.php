<?php

function Gatewayverisign(){

	return "remote";

}



function Configverisign(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Verisign (Payflow):</td>

	</tr>

	<tr>

		<td width='59%'>Login:</td>

		<td width='41%'><input type='text' name='moduleverisign_login' size='10' value='<?php echo $PROCESSOR["moduleverisign_login"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Return URL:</td>

		<td width='41%'><input type='text' name='moduleverisign_returnurl' size='30' value='<?php echo $PROCESSOR["moduleverisign_returnurl"]; ?>'></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutverisign($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form action="https://payflowlink.verisign.com/payflowlink.cfm" name="form1" method="post">

<input type="hidden" name="LOGIN" value="<?php echo $PROCESSOR["moduleverisign_login"]; ?>">

<input type="hidden" name="PARTNER" value="VeriSign">

<input type="hidden" name="DESCRIPTION" value="<?php echo $config["CARTDESCRIPTION"]."-".$orderid; ?>">

<input type="hidden" name="NAMETOSHIP" value="<?php echo $billing["FIRSTNAME"]." ".$billing["LASTNAME"]; ?>"> 

<input type="hidden" name="ADDRESSTOSHIP" value="<?php echo $billing["ADDRESS"];; ?>"> 

<input type="hidden" name="CITYTOSHIP" value="<?php echo $billing["CITY"]; ?>"> 

<input type="hidden" name="STATETOSHIP" value="<?php echo $billing["STATE"]; ?>"> 

<input type="hidden" name="ZIPTOSHIP" value="<?php echo $billing["ZIP"]; ?>" size="30" maxlength="60"> 

<input type="hidden" name="EMAILTOSHIP" value="<?php echo $billing["EMAIL"]; ?>" size="30" maxlength="60"> 

<input type="hidden" name="AMOUNT" value="<?php echo $totals["RAWTOTAL"]?>">

<input type="hidden" name="TYPE" value="S">

<input type="hidden" name="TEST_TRAN" value="0">

<input type="hidden" name="EMAILCUSTOMER" value="1">

<input type="hidden" name="ORDERFORM" value="1">

<input type="hidden" name="SHOWCONFIRM" value="1">

<input type="hidden" name="RETURNMETHOD" value="1">

<input type="hidden" name="RETURNURL" value="<?php echo $PROCESSOR["moduleverisign_returnurl"]?>">

<input type="hidden" name="DISPNAME" value="<?php echo $config["COMPANYNAME"]; ?>">

<input type="hidden" name="BACKCOLOR" value="ffffff">

<input type="hidden" name="RECEIPTHEADER" value="We have successfully received your order. If you have any questions regarding your order, you may email us <?php echo $salesEmail?>.">

<input type="hidden" name="RECEIPTFOOTER" value="Thank you for shopping with <?php echo $config["COMPANYNAME"]; ?>">

<input type="hidden" name="BUTTONTEXT" value="Return to <?php echo $config["COMPANYNAME"]; ?>">

<input type="hidden" name="JUSTIFY" value="1">

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