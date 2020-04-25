<?php

// 2checkout.com documentation

// https://www.2checkout.com/2co/admin/site_setup?oid=74168&page=2



function Gateway2checkout(){

	return "remote";

}



function Config2checkout(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">2Checkout:</td>

	</tr>

	<tr>

		<td width='59%'>Store ID:</td>

		<td width='41%'><input type='text' name='module2checkout_sid' size='10' value='<?php echo $PROCESSOR["module2checkout_sid"]; ?>'></td>

	</tr>
    
    <tr>
		<td>Test Mode:</td>

		<td>
        	<select name="module2checkout_testmode">
			<option value="Y" <?php if (!(strcmp("Y", $PROCESSOR["module2checkout_testmode"]))) {echo "selected=\"selected\"";} ?>>Yes</option>
			<option value="N" <?php if (!(strcmp("N", $PROCESSOR["module2checkout_testmode"]))) {echo "selected=\"selected\"";} ?>>No</option>
			</select>
        </td>
	</tr>


	<tr>

		<td colspan="2" align="center"><a href="http://www.2checkout.com/cgi-bin/aff.2c?affid=1890840" target="_blank" style="color:#990000">Sign Up For 2Checkout Now!</a></td>

	</tr>

</table>

<br>

<?php

}



function Checkout2checkout($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form name="payment" action="https://www.2checkout.com/2co/buyer/purchase" method="post">

<?php if ($PROCESSOR["module2checkout_testmode"] == "Y") { ?>

<input type="hidden" name="demo" value="Y" />

<?php } ?>

<input type="hidden" name="id_type" value="1"> 

<input type="hidden" name="sid" value="<?php echo $PROCESSOR["module2checkout_sid"];  ?>"> 

<input type="hidden" name="total" value="<?php echo $totals["RAWTOTAL"]; ?>"> 

<input type="hidden" name="cart_order_id" value="<?php echo $orderid; ?>"> 

<input type="hidden" name="card_holder_name" value="<?php echo $billing["FIRSTNAME"]." ".$billing["LASTNAME"]; ?>">

<input type="hidden" name="street_address" value="<?php echo $billing["ADDRESS"]; ?>">

<input type="hidden" name="city" value="<?php echo $billing["CITY"]; ?>">

<input type="hidden" name="state" value="<?php echo $billing["STATE"]; ?>">

<input type="hidden" name="zip" value="<?php echo $billing["ZIP"]; ?>">

<input type="hidden" name="country" value="<?php echo $billing["COUNTRY"]; ?>">

<input type="hidden" name="email" value="<?php echo $billing["EMAIL"]; ?>">

<input type="hidden" name="phone" value="<?php echo $billing["PHONE"]; ?>">

<?php

// id, description, price, quantity, postage

$x = 1;

foreach ($products as $product) {

	echo "<input type='hidden' name='c_prod_$x' value='".$product[PRODUCTID].",".$product[PRODUCTQUANTITY]."'>\n";

	echo "<input type='hidden' name='c_name_$x' value='".$product[PRODUCTDESCRIPTION]."'>\n";

	echo "<input type='hidden' name='c_description_$x' value='".$product[PRODUCTDESCRIPTION]."'>\n";

	echo "<input type='hidden' name='c_price_$x' value='".$product[PRODUCTPRICE]."'>\n";

	echo "<input type='hidden' name='c_tangible_$x' value='Y'>\n";

	$x++;

}



?>

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