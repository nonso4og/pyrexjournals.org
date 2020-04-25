<?php
// NoChex NPP Remote Gateway
// Version 3.0
// Dennis Daudelin

function Gatewaynochex(){
	return "remote";
}

function Confignochex(){

	global $PROCESSOR;

?>
	<table border='1' cellpadding='0' cellspacing='4' width='100%'>
    
    <tr>
    	<td colspan="2" align="center"><p><b>NoChex NPP Remote Gateway</b><br />Version 3.0</p></td>
    </tr>
    
	<tr>
		<td style="padding-left:5px"><strong>Nochex Merchant ID:</strong></td>
		<td><input type='text' name='modulenochex_merchant_id' size='25' value='<? echo $PROCESSOR["modulenochex_merchant_id"]; ?>'></td>
	</tr>
    
	<tr>
		<td style="padding-left:5px"><strong>Test Mode:</strong></td>
		<td>
        	<select name="modulenochex_testmode">
				<option value="No" <?php if ($PROCESSOR["modulenochex_testmode"] != 'Yes'){echo ' selected="selected"';}?> >No</option>
				<option value="Yes" <?php if ($PROCESSOR["modulenochex_testmode"] == 'Yes'){echo ' selected="selected"';} ?> >Yes</option>
			</select>
        </td>
	</tr>
    </table>

<?php

} // close function



function Checkoutnochex($products, $totals, $invoice, $billing ){
	global $config, $PROCESSOR, $lang;

	// create products purchased list
	foreach ($products as $product) {
		$description .= $product[PRODUCTCODE]." - ".$product[PRODUCTDESCRIPTION]." ".$config["Currency"].$product[PRODUCTPRICE]." qty ".$product[PRODUCTQUANTITY]."%0D";

	}

	// create the possible return urls	
	$returnurl = $config['CartPath']."phpcart.php?action=returned";
	$respondurl = $config['CartPath']."phpcart.php?action=status";
	$cancelurl = $config['CartPath']."phpcart.php?action=canceled";
	$declinedurl = $config['CartPath']."phpcart.php?action=declined";


?>

<center>

<?php 

echo $config["langgatewayredirect"]; ?>

<form name="payment" action="https://secure.nochex.com/" method="post">

<input type="hidden" name="merchant_id" value="<?php echo $PROCESSOR["modulenochex_merchant_id"]; ?>">

<input type="hidden" name="amount" value="<?php echo $totals["RAWTOTAL"]; ?>">

<input type="hidden" name="description" value="<? echo $description; ?>">

<input type="hidden" name="order_id" value="<?php echo $invoice; ?>">

<?php 

	$address = $billing['ADDRESS'];
	
	if ($billing['ADDRESS2'] != '') {
		$address .= "\n".$billing['ADDRESS2'];
	}
	
	$address .= "\n".$billing['CITY'];
	
	if ($billing['STATE'] != '') {
		$address .= "\n".$billing['STATE'];
	}
	else {
		$address .= "\n".$billing['STATEOTHER'];
	}
?>

<input type="hidden" name="billing_fullname" value="<?php echo $billing["FIRSTNAME"].' '.$billing["LASTNAME"]; ?>">

<input type="hidden" name="billing_address" value="<?php echo $address; ?>">

<input type="hidden" name="billing_postcode" value="<?php echo $billing['ZIP'];?>">

<input type="hidden" name ="customer_phone_number" value="<?php echo $billing['PHONE'];?>">

<input type="hidden" name="email_address" value="<?php echo $billing['EMAIL']; ?>">

<input type="hidden" name="success_url" value="<?php echo $returnurl; ?>">
	    
<input type="hidden" name="cancel_url" value="<?php echo $cancelurl; ?>">	    

<input type="hidden" name="declined_url" value="<?php echo $declinedurl; ?>">
	    
<?php 

	 if ($PROCESSOR["modulenochex_testmode"] == 'Yes') { ?>

		<input type="hidden" name="test_transaction" value="100">
		<input type="hidden" name ="test_success_url" value= "<?php echo $returnurl; ?>">
<?php } ?>


<input type="hidden" name="callback_url" value="<?php echo $respondurl; ?>">

<input type="button" name="submit" value="Redirecting to Payment Gateway. If you are not redirected click the button below">

</form>

<script language="JavaScript">

<!--

window.setTimeout(GoPayment,4000);

function GoPayment(){

	document.payment.submit();

}

-->

</script>

</center>

<? } ?>