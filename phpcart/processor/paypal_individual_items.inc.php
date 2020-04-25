<?php

function Gatewaypaypal_individual_items(){

	return "remote";

}



function Configpaypal_individual_items(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">PayPal (Coupons will not work with this module):</td>

	</tr>


	<tr>

		<td width='59%'>Paypal Email:</td>

		<td width='41%'><input type='text' name='modulepaypal_individual_items_email' size='20' value='<?php echo $PROCESSOR["modulepaypal_individual_items_email"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Return URL:</td>

		<td width='41%'><input type='text' name='modulepaypal_individual_items_returnurl' size='20' value='<?php echo $PROCESSOR["modulepaypal_individual_items_returnurl"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Cancel URL:</td>

		<td width='41%'><input type='text' name='modulepaypal_individual_items_cancelurl' size='20' value='<?php echo $PROCESSOR["modulepaypal_individual_items_cancelurl"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Notify URL (IPN):</td>

		<td width='41%'><input type='text' name='modulepaypal_individual_items_notify_url' size='20' value='<?php echo $PROCESSOR["modulepaypal_individual_items_notify_url"]; ?>'></td>

	</tr>
    
    <tr>
    	<td width="59%">
        	<p>Test Mode:</p>
        </td>
        
        <td width='41%'>
			<select name="modulepaypal_url">
            <option value="Yes" <?php if ($PROCESSOR['modulepaypal_url'] == 'Yes'){echo ' selected';}?>>Yes</option>
            <option value="No" <?php if ($PROCESSOR['modulepaypal_url'] == 'No'){echo ' selected';}?>>No</option>
            </select>
        </td>
    </tr>

</table><br>

<?php

}



function Checkoutpaypal_individual_items($products, $totals, $orderid, $billing){
	global $PROCESSOR, $lang, $config;



	$p = explode('-',$billing['PHONE']);

	$p1 = $p[0];

	$p2 = $p[1];

	$p3 = $p[2];



?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>

<?php
// select live or test mode
if ($PROCESSOR['modulepaypal_url'] == "Yes") { 
	echo '<form name="payment" action=" https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">';
}
else {
	echo '<form name="payment" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
}

?>

<input type="hidden" name="cmd" value="_cart"> 

<input type="hidden" name="upload" value="1"> 

<input type="hidden" name="bn" value="Webrigger_Cart_WPS" />

<input type="hidden" name="currency_code" value="<?php echo $billing["PAYPALCODE"]; ?>"> 

<input type="hidden" name="notify_url" value="<?php echo $PROCESSOR["modulepaypal_individual_items_notify_url"]; ?>"> 

<input type="hidden" name="business" value="<?php echo $PROCESSOR["modulepaypal_individual_items_email"]; ?>"> 

<! input type="hidden" name="amount" value="<?php echo $totals["RAWTOTAL"] - $totals["RAWSHIPPING"] - $totals["RAWTAX"]; ?>"> 

<input type="hidden" name="return" value="<?php echo $PROCESSOR["modulepaypal_individual_items_returnurl"].'&invoice='.$orderid; ?>"> 

<input type="hidden" name="cancel_return" value="<?php echo $PROCESSOR["modulepaypal_individual_items_cancelurl"].'&invoice='.$orderid; ?>"> 

<input type="hidden" name="invoice" value="<?php echo $orderid; ?>"> 

<input type="hidden" name="first_name" value="<?php echo $billing["FIRSTNAME"]; ?>"> 

<input type="hidden" name="last_name" value="<?php echo $billing["LASTNAME"]; ?>"> 

<input type="hidden" name="address1" value="<?php echo $billing["ADDRESS"]; ?>"> 

<input type="hidden" name="address2" value="<?php echo $billing["ADDRESS2"]; ?>"> 

<input type="hidden" name="city" value="<?php echo $billing["CITY"]; ?>"> 

<input type="hidden" name="state" value="<?php echo $billing["STATE"]; ?>"> 

<input type="hidden" name="zip" value="<?php echo $billing["ZIP"]; ?>"> 

<input type="hidden" name="country" value="<?php echo $billing["COUNTRY2"]; ?>"> 

<input type="hidden" name="night_phone_a" value="<?php echo $p1; ?>">

<input type="hidden" name="night_phone_b" value="<?php echo $p2; ?>">

<input type="hidden" name="night_phone_c" value="<?php echo $p3; ?>">

<input type="hidden" name="email" value="<?php echo $billing["EMAIL"]; ?>"> 

<input type="hidden" name="rm" value="2"> 

<?php

// id, description, price, quantity, postage

$x = 1;

foreach ($products as $product) {

	if($product[PRODUCTQUANTITY] > 0){

		echo "<input type='hidden' name='item_number_$x' value='".$product[PRODUCTID]."'>\n";

		echo "<input type='hidden' name='item_name_$x' value='".$product[PRODUCTDESCRIPTION]."'>\n";

		$producttotal = $product[PRODUCTPRICE] + GetOptionsTotal($product);

		echo "<input type='hidden' name='amount_$x' value='".$producttotal."'>\n";

		echo "<input type='hidden' name='quantity_$x' value='".$product[PRODUCTQUANTITY]."'>\n";

		$x++;

	}

}



if ($totals["RAWSHIPPING"] > 0){ ?>

<input type="hidden" name="handling_cart" value="<?php echo $totals["RAWSHIPPING"]; ?>">

<?php } ?>

<input type="hidden" name="tax_cart" value="<?php echo $totals["RAWTAX"]; ?>">

<?php if($totals['RAWDISCOUNT'] > 0) { ?>

<input type="hidden" name="discount_amount_cart" value="<?php echo $totals["RAWDISCOUNT"]; ?>">

<?php } ?>

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