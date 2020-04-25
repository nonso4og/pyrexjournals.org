<?php

// cybersource_hosted.com documentation

// https://www.cybersource_hosted.com/2co/admin/site_setup?oid=74168&page=2

// http://apps.cybersource.com/library/documentation/sbc/HOP_UG/Hosted_Order_Page_UG.pdf

function Gatewaycybersource_hosted(){

	return "remote";

}



function Configcybersource_hosted(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">Cybersource Hosted Checkout:</td>

	</tr>

	<tr>

		<td width='59%'>Merchant ID:</td>

		<td width='41%'><input type='text' name='modulecybersource_hosted_merchantid' size='10' value='<?php echo $PROCESSOR["modulecybersource_hosted_merchantid"]; ?>'></td>

	</tr>

	<tr>

	<td colspan="2"><strong>Actions</strong> (create and upload security key)<br>

		- Log in to the <a href="https://businesscenter.cybersource.com/" target="_blank">CyberSource Business Center</a> using your CyberSource merchant ID.<br>

			- Choose ‘Settings’ => ‘Security Keys’.<br>

			- Review the ‘Generate HOP Script’ section, choose ‘PHP’ as your language, and click the ‘Generate Script’ button. Choose ‘OK’ when a dialog box appears.<br>

			- Choose ‘Save’ to save the ‘HOP.php’ file to your Local PC. <br>

			- FTP this file to the phpcart directory on your server</td></tr>

</table>

<br>

<?php

}



function Checkoutcybersource_hosted($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;



	include("HOP.php");

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<! form action="https://orderpagetest.ic3.com/hop/orderform.jsp" method="post">

<form action="https://orderpage.ic3.com/hop/orderform.jsp" method="post">

<?php InsertSignature($totals["RAWTOTAL"], "usd") ?>

<input type="hidden" name="merchantid" value="<?php echo $PROCESSOR["modulecybersource_hosted_merchantid"];  ?>"> 

<input type="hidden" name="ordernumber" value="<?php echo $orderid; ?>"> 

<input type="hidden" name="orderPage_transactionType" value="sale"> 



<input type="hidden" name="billTo_firstName" value="<?php echo $billing["FIRSTNAME"]; ?>">

<input type="hidden" name="billTo_lastName" value="<?php echo $billing["LASTNAME"]; ?>">

<input type="hidden" name="billTo_street1" value="<?php echo $billing["ADDRESS"]; ?>">

<input type="hidden" name="billTo_street2" value="<?php echo $billing["ADDRESS2"]; ?>">

<input type="hidden" name="billTo_city" value="<?php echo $billing["CITY"]; ?>">

<input type="hidden" name="billTo_state" value="<?php echo $billing["STATE2"]; ?>">

<input type="hidden" name="billTo_postalCode" value="<?php echo $billing["ZIP"]; ?>">

<input type="hidden" name="billTo_country" value="<?php echo $billing["COUNTRY2"]; ?>">

<input type="hidden" name="billTo_email" value="<?php echo $billing["EMAIL"]; ?>">

<input type="hidden" name="billTo_phoneNumber" value="<?php echo $billing["PHONE"]; ?>">

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