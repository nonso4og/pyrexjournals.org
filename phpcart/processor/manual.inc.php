<?php

function Gatewaymanual(){

	return "creditcards";

}



function Configmanual(){

	global $PROCESSOR;

?>

<input type="hidden" name="modulemanual_creditcards" value="Yes">

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

 	<tr>

		<td width="100%" colspan="2" align="center">

		Manual Credit Card</td>

	</tr>

	<tr>

		<td width="30%">Credit Cards Accepted:</td>

		<td width='70%'><input type='text' name='modulemanual_cardnames' size='50' value='<?php echo $PROCESSOR["modulemanual_cardnames"]; ?>'><br>

		(separate with commas, example:<br>Visa,Master Card,Discover,American Express)</td>

	</tr>

</table>



<?php

}

function Checkoutmanual($products, $totals, $orderid, $billing){

	global $PROCESSOR, $config;

	

	// write credit card info into orders

	$file = fopen ("orders/".$orderid.".cc", "w");

	$text = "Credit Card Information\n";

	$text .= "Order ID :  ".$orderid."\n";

	$text .= "Name :  ".$billing["FIRSTANME"]." ".$billing["LASTNAME"]."\n";

	$text .= "Email : ".$billing["EMAIL"]."\n";

	$text .= "Address : ".$billing["ADDRESS"]."\n";

	$text .= "City : ".$billing["CITY"]."\n";

	$text .= "State : ".$billing["STATE"]."\n";

	$text .= "Zip Code : ".$billing["ZIP"]."\n";

	$text .= "Telephone : ".$billing["PHONE"]."\n";

	$text .= "Credit Card Type : ".$billing["CCTYPE"]."\n";

	$text .= "Credit Card Number : ".$billing["CCNUMBER"]."\n";

	$text .= "Credit Card Expiration : ".$billing["CCMONTH"]." / ".$billing["CCYEAR"]."\n";

	$text .= "CVV Code : ".$billing["CVVCODE"]."\n";

	$text = Encrypt($text,$config["key"]);

	fwrite($file,$text);

	fclose($file);



	// display thank you template

	DisplayTemplate("manual_thankyou.php");

}

?>