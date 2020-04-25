<?php

function Gatewaylayawaycart(){

	return "remote";

}

function Configlayawaycart(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

 	<tr>

		<td width="100%" colspan="2" align="center">LayawayCart</td>

	</tr>

	<tr>

		<td>Merchant Code:</td>

		<td width='10%'><input type='text' name='modulelayawaycart_merchantcode' size='25' value='<?php echo $PROCESSOR["modulelayawaycart_merchantcode"]; ?>'></td>

	</tr>

	<tr>

		<td>Hash Code:</td>

		<td width='10%'><input type='text' name='modulelayawaycart_hashcode' size='25' value='<?php echo $PROCESSOR["modulelayawaycart_hashcode"]; ?>'></td>

	</tr>

	<tr>

		<td>Template Code:</td>

		<td width='10%'><input type='text' name='modulelayawaycart_templatecode' size='25', value='<?php echo $PROCESSOR["modulelayawaycart_templatecode"]; ?>'></td>

	</tr>

	<tr>

		<td colspan="2" align="center"><a href="http://www.layawaycart.com?aid=phpcart" target="_blank" style="color:#990000">Sign Up For Layaway Cart Now!</a></td>

	</tr>

</table>



<?php

}



function Checkoutlayawaycart($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://cart.layawaycart.com/layaway.php" method="post">

<input type="hidden" name="MerchantCode" value="<?php echo $PROCESSOR["modulelayawaycart_merchantcode"]; ?>"> 

<input type="hidden" name="TemplateCode" value="<?php echo $PROCESSOR["modulelayawaycart_templatecode"]; ?>"> 

<input type="hidden" name="Mode" value="Checkout"> 

<input type="hidden" name="Invoice" value="<?php echo $orderid; ?>"> 

<?php

// id, description, price, quantity, postage

$x = 1;

foreach ($products as $product){

	?>

	<input type="hidden" name="ItemID_<?php echo $x; ?>" value="<?php echo $product[PRODUCTID]; ?>"> 

	<input type="hidden" name="ItemName_<?php echo $x; ?>" value="<?php echo $product[PRODUCTDESCRIPTION]; ?>"> 

	<input type="hidden" name="ItemPrice_<?php echo $x; ?>" value="<?php echo $product[PRODUCTPRICE]; ?>"> 

	<input type="hidden" name="ItemQuantity_<?php echo $x; ?>" value="<?php echo $product[PRODUCTQUANTITY]; ?>"> 

	<input type="hidden" name="ItemKey_<?php echo $x; ?>" value="<?php echo md5($PROCESSOR["modulelayawaycart_hashcode"].$product[PRODUCTID].$product[PRODUCTPRICE]); ?>"> 

	<?php

	$x++;

}

?>

<input type="hidden" name="Tax" value="<?php echo $totals["RAWTAX"]; ?>"> 

<input type="hidden" name="Discount" value="<?php echo $totals["RAWDISCOUNT"]; ?>"> 

<input type="hidden" name="Shipping" value="<?php echo $totals["RAWSHIPPING"]; ?>"> 

<input type="hidden" name="Total" value="<?php echo $totals["RAWTOTAL"]; ?>"> 

<input type="hidden" name="Key" value="<?php echo md5($PROCESSOR["modulelayawaycart_hashcode"].$totals["RAWTOTAL"]); ?>"> 

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