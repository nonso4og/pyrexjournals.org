<?php
// This is the remote gateway for Sage Pay in the UK

function Gatewaysagepay(){

	return "remote";

}



function Configsagepay(){
	global $PROCESSOR;

?>

<table border='1' cellpadding='5' cellspacing='0' width='100%'>

	<tr>
		<td width='100%' colspan="2">Sage Pay:</td>
	</tr>
    
    
	<tr>
    	<td width="50%">
        	<p>Choose Sage Pay URL</p>
        </td>
        
        <td><input type="radio" name="modulesagepay_url" value="LIVE" <?php if ($PROCESSOR['modulesagepay_url'] != 'TEST' AND $PROCESSOR['modulesagepay_url'] != 'SIMULATOR'){echo ' checked';} ?>  />
        Live<br>
		<input type="radio" name="modulesagepay_url" value="TEST" <?php if ($PROCESSOR['modulesagepay_url'] == 'TEST'){echo ' checked';}?>  />
		Test<br />
        <input type="radio" name="modulesagepay_url" value="SIMULATOR" <?php if ($PROCESSOR['modulesagepay_url'] == 'SIMULATOR'){echo ' checked';}?>  />
		Simulate<br />
        </td>
    </tr>
    
     <tr>
		<td width='59%'>Your Sage Pay Vendor Name:<br />(Max. 15 characters</td>
		<td width='41%'><input type='text' name='modulesagepay_vendor' size='20' value='<?php echo $PROCESSOR["modulesagepay_vendor"]; ?>'></td>
	</tr>
    
     <tr>
		<td width='59%'>Your Sage Pay Password:<br />
		</td>
		<td width='41%'><input type='text' name='modulesagepay_password' size='20' value='<?php echo $PROCESSOR["modulesagepay_password"]; ?>'></td>
	</tr>

	<tr>
		<td width='59%'>Currency:</td>
		<td width='41%'>

		<select size='1' name='modulesagepay_currency'>
        
        <option value='GBP' <?php if ($PROCESSOR["modulesagepay_currency"] != 'EUR' AND $PROCESSOR["modulesagepay_currency"] != 'USD'){echo ' selected';} ?>>Pounds Sterling</option>

		<option value='EUR' <?php if ($PROCESSOR["modulesagepay_currency"] == 'EUR'){echo ' selected';} ?>>Euro</option>	

		<option value='USD' <?php if ($PROCESSOR["modulesagepay_currency"] == 'USD'){echo ' selected';} ?>>US Dollar</option>
        
        </select>
	</tr>
    
    <tr>
		<td width='59%'>Sage Pay Confirmation Emails:</td>
		<td width='41%'>
        
        <!-- Confirmation Email Codes
        
        ** 0 = Do not send either customer or vendor e-mails, 
		** 1 = Send customer and vendor e-mails if address(es) are provided(DEFAULT). 
		** 2 = Send Vendor Email but not Customer Email. If you do not supply this field, 1 is assumed and e-mails are sent if addresses are provided. **/
		-->
		<select size='1' name='modulesagepay_bSendEMail'>


		<option value='0' <?php if ($PROCESSOR["modulesagepay_bSendEMail"] == '0'){echo ' selected';} ?>>Do not send either customer or vendor e-mails</option>

		<option value='1' <?php if($PROCESSOR["modulesagepay_bSendEMail"] == '1'){echo ' selected';} ?>>Send both customer and vendor e-mails</option>

		<option value='2' <?php if($PROCESSOR["modulesagepay_bSendEMail"] == '2'){echo ' selected';} ?>>Send vendor email but not customer email</option>
        
        </select>
	</tr>

	<tr>
		<td width='59%'>
		    <p>Return URL:</p>
		    <p>Example:<br />
		        (http://www.yourdomain.com/phpcart/phpcart.php?action=complete </p>
		</td>
		<td width='41%'><input type='text' name='modulesagepay_returnurl' size='60' value='<?php echo $PROCESSOR["modulesagepay_returnurl"]; ?>'></td>
	</tr>

	<tr>
		<td width='59%'>
		    <p>Failure URL:</p>
		    <p>Example:<br />
		        (http://www.yourdomain.com/phpcart/phpcart.php?action=declined)</p>
		</td>
		<td width='41%'><input type='text' name='modulesagepay_cancelurl' size='60' value='<?php echo $PROCESSOR["modulesagepay_cancelurl"]; ?>'></td>
	</tr>
		
</table>

<br>

<?php

}



function Checkoutsagepay($products, $totals, $orderid, $billing){
	global $PROCESSOR, $lang, $config, $strEncryptionPassword, $strEncryptionType;
	
	// get the sage pay specific functions
	include ('processor/sagepay_functions.php');
	
// check if we are in test mode or live
if ($PROCESSOR['modulesagepay_url']=="LIVE") 
	$strPurchaseURL="https://live.sagepay.com/gateway/service/vspform-register.vsp"; 
elseif ($PROCESSOR['modulesagepay_url']=="TEST")
	$strPurchaseURL="https://test.sagepay.com/gateway/service/vspform-register.vsp";
elseif ($PROCESSOR['modulesagepay_url']=="SIMULATOR")
	$strPurchaseURL="https://test.sagepay.com/Simulator/VSPFormGateway.asp";
	
//$strEncryptionPassword="IJdyRVZxp86aPd7D";
$strEncryptionPassword = $PROCESSOR["modulesagepay_password"];

//$strEncryptionType="AES";
$strEncryptionType = "XOR";


$strPost="VendorTxCode=" . $orderid;

// Amount formatted to 2 decimal places with leading digit
$sngTotal = $totals["RAWTOTAL"];
$strPost=$strPost . "&Amount=" . number_format($sngTotal,2); // Formatted to 2 decimal places with leading digit

// Currency
$strPost=$strPost . "&Currency=" . $PROCESSOR["modulesagepay_currency"];

// Company Description
$date = date('Y-m-d H:i:s');
$strPost=$strPost . "&Description=Purchase from ".$config['COMPANYNAME']." on ".$date;

/* The SuccessURL is the page to which Form returns the customer if the transaction is successful 
** You can change this for each transaction, perhaps passing a session ID or state flag if you wish */
$strPost=$strPost . "&SuccessURL=" . $PROCESSOR["modulesagepay_returnurl"];

/* The FailureURL is the page to which Form returns the customer if the transaction is unsuccessful
** You can change this for each transaction, perhaps passing a session ID or state flag if you wish */
$strPost=$strPost . "&FailureURL=" . $PROCESSOR["modulesagepay_cancelurl"];

// This is an Optional setting. Here we are just using the Billing names given.
$strPost=$strPost . "&CustomerName=" . $billing["FIRSTNAME"] . " " . $billing["LASTNAME"];	

/* Email settings:
** Flag 'SendEMail' is an Optional setting. 
** 0 = Do not send either customer or vendor e-mails, 
** 1 = Send customer and vendor e-mails if address(es) are provided(DEFAULT). 
** 2 = Send Vendor Email but not Customer Email. If you do not supply this field, 1 is assumed and e-mails are sent if addresses are provided. **/
if ($PROCESSOR["modulesagepay_bSendEMail"] == 0)
    $strPost=$strPost . "&SendEMail=0";
else {
    
    if ($PROCESSOR["modulesagepay_bSendEMail"] == 1) {
    	$strPost=$strPost . "&SendEMail=1";
    } else {
    	$strPost=$strPost . "&SendEMail=2";
    }
    
    if (strlen($billing["EMAIL"]) > 0)
        $strPost=$strPost . "&CustomerEMail=" . $billing["EMAIL"];  // This is an Optional setting
    
	$strPost=$strPost . "&VendorEMail=" . $config["COMPANYEMAIL"];  // This is an Optional setting

    // You can specify any custom message to send to your customers in their confirmation e-mail here
    // The field can contain HTML if you wish, and be different for each order.  This field is optional
    //$strPost=$strPost . "&eMailMessage=Thank you so very much for your order.";
}

// Billing Details:
$strPost=$strPost . "&BillingFirstnames=" . $billing["FIRSTNAME"];
$strPost=$strPost . "&BillingSurname=" . $billing["LASTNAME"];
$strPost=$strPost . "&BillingAddress1=" . $billing["ADDRESS"];
if (strlen($billing["ADDRESS2"]) > 0) $strPost=$strPost . "&BillingAddress2=" . $billing["ADDRESS2"];
$strPost=$strPost . "&BillingCity=" . $billing["CITY"];
$strPost=$strPost . "&BillingPostCode=" . $billing["ZIP"];
$strPost=$strPost . "&BillingCountry=" . $billing["COUNTRY2"];
if (strlen($billing["STATE"]) > 0) $strPost=$strPost . "&BillingState=" . $billing["STATE"];
if (strlen($billing["PHONE"]) > 0) $strPost=$strPost . "&BillingPhone=" . $billing["PHONE"];

// Delivery Details:

// 	if "shippingsamechecked" is checked, then use the billing info for shipping otherwise get shipping info

if ($billing["SHIPPINGSAME"] == 'Y' || !isset($billing["SHIPPINGSAME"])){
	
	$strPost=$strPost . "&DeliveryFirstnames=" . $billing["FIRSTNAME"];
	$strPost=$strPost . "&DeliverySurname=" . $billing["LASTNAME"];
	$strPost=$strPost . "&DeliveryAddress1=" . $billing["ADDRESS"];
	if (strlen($billing["ADDRESS2"]) > 0) $strPost=$strPost . "&DeliveryAddress2=" . $billing["ADDRESS2"];
	$strPost=$strPost . "&DeliveryCity=" . $billing["CITY"];
	$strPost=$strPost . "&DeliveryPostCode=" . $billing["ZIP"];
	$strPost=$strPost . "&DeliveryCountry=" . $billing["COUNTRY2"];
	if (strlen($billing["STATE"]) > 0) $strPost=$strPost . "&DeliveryState=" . $billing["STATE"];
	if (strlen($billing["PHONE"]) > 0) $strPost=$strPost . "&DeliveryPhone=" . $billing["PHONE"];
}
else {
	$strPost=$strPost . "&DeliveryFirstnames=" . $billing["SFIRSTNAME"];
	$strPost=$strPost . "&DeliverySurname=" . $billing["SLASTNAME"];
	$strPost=$strPost . "&DeliveryAddress1=" . $billing["SADDRESS"];
	if (strlen($billing["SADDRESS2"]) > 0) $strPost=$strPost . "&DeliveryAddress2=" . $billing["SADDRESS2"];
	$strPost=$strPost . "&DeliveryCity=" . $billing["SCITY"];
	$strPost=$strPost . "&DeliveryPostCode=" . $billing["SZIP"];
	$strPost=$strPost . "&DeliveryCountry=" . $billing["SCOUNTRY2"];
	if (strlen($billing["SSTATE"]) > 0) $strPost=$strPost . "&DeliveryState=" . $billing["SSTATE"];
	if (strlen($billing["SPHONE"]) > 0) $strPost=$strPost . "&DeliveryPhone=" . $billing["SPHONE"];
}

// Create product list
$sngTotal=0.0;
$strThisEntry=$strCart;
$strBasket="";
$iBasketItems=0;

// id, description, price, quantity, postage
$no_of_lines = $totals["PRODUCTCOUNT"];

// clean any null values out of array
$new_array_without_nulls = array_filter($products, 'strlen');

//echo '<pre>Totals';
//print_r ($totals);
//echo '</pre>';

foreach ($products as $product) {
	// calculate totals
	$line_total = $product[PRODUCTQUANTITY] * $product[PRODUCTPRICE];
	
	// Item description
	$strBasket=$strBasket . ":" . $product[PRODUCTDESCRIPTION];
	// Quantity
	$strBasket=$strBasket . ":" . $product[PRODUCTQUANTITY];
	// Item Value
	$strBasket=$strBasket . ":" .$product[PRODUCTPRICE];
	// Item Tax
	$strBasket=$strBasket . ":"; // no individual tax in phpcart
	// Item Total
	$strBasket=$strBasket . ":" . $product[PRODUCTPRICE];
	// Line Total
	$strBasket=$strBasket . ":" . $line_total;
	
}
// add tax 
$strBasket = $strBasket . ":Tax:::::".$totals["RAWTAX"];

// add shipping
$strBasket = ($no_of_lines + 2) . $strBasket . ":Delivery:::::".$totals["RAWSHIPPING"];

$strPost=$strPost . "&Basket=" . $strBasket; // As created above 

//echo $strPost;
//exit;

// Encrypt the plaintext string for inclusion in the hidden field
$strCrypt = encryptAndEncode($strPost);

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>

<form action="<?php echo $strPurchaseURL; ?>" method="POST" id="SagePayForm" name="SagePayForm"> 

<input type="hidden" name="VPSProtocol" value="2.23"> 

<input type="hidden" name="TXType" value="PAYMENT"> 

<input type="hidden" name="Vendor" value="<?php echo $PROCESSOR["modulesagepay_vendor"]; ?>"> 

<input type="hidden" name="Crypt" value="<?php echo $strCrypt; ?>"> 

<input type="submit" value="<?php echo $lang["PaymentSubmit"]; ?>">

</form>

<script language="JavaScript">

<!--

window.setTimeout(GoPayment,2000);

function GoPayment(){

	document.SagePayForm.submit();

}

-->

</script>

<?php } ?>
