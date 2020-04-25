<?php

function Gatewaymoneybookers(){

	return "remote";

}



function Configmoneybookers(){

	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2">MoneyBookers:</td>

	</tr>

	<tr>

		<td width='59%'>Merchant ID:</td>

		<td width='41%'>

		<input type='text' name='modulemoneybookers_merchant_id' size='20' value='<?php echo $PROCESSOR["modulemoneybookers_merchant_id"]; ?>'></td>

	</tr>

	<tr>

		<td width='59%'>Currency:</td>

		<td width='41%'><select name="modulemoneybookers_currency">

			<option value="AUD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "AUD") echo "selected"; ?>>Australian Dollar</option>

			<option value="BGN" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "BGN") echo "selected"; ?>>Bulgarian Lev</option>

			<option value="CAD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "CAD") echo "selected"; ?>>Canadian Dollar</option>

			<option value="CHF" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "CHF") echo "selected"; ?>>Swiss Franc</option>

			<option value="CZK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "CZK") echo "selected"; ?>>Czech Koruna</option>

			<option value="DKK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "DKK") echo "selected"; ?>>Danish Krone</option>

			<option value="EEK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "EEK") echo "selected"; ?>>Estonian Koruna</option>

			<option value="EUR" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "EUR") echo "selected"; ?>>Euro</option>

			<option value="GBP" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "GBP") echo "selected"; ?>>Pound Sterling</option>

			<option value="HKD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "HKD") echo "selected"; ?>>Hong Kong Dollar</option>

			<option value="HRK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "HRK") echo "selected"; ?>>Croatian Kuna</option>

			<option value="HUF" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "HUF") echo "selected"; ?>>Forint</option>

			<option value="ILS" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "ILS") echo "selected"; ?>>Shekel</option>

			<option value="INR" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "INR") echo "selected"; ?>>Indian Rupee</option>

			<option value="ISK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "ISK") echo "selected"; ?>>Iceland Krona</option>

			<option value="JPY" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "JPY") echo "selected"; ?>>Yen</option>

			<option value="KRW" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "KRW") echo "selected"; ?>>South-Korean Won</option>

			<option value="LTL" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "LTL") echo "selected"; ?>>Lithuanian Litas</option>

			<option value="LVL" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "LVL") echo "selected"; ?>>Latvian Lat</option>

			<option value="MYR" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "MYR") echo "selected"; ?>>Malaysian Ringgit</option>

			<option value="NOK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "NOK") echo "selected"; ?>>Norwegian Krone</option>

			<option value="NZD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "NZD") echo "selected"; ?>>New Zealand Dollar</option>

			<option value="PLN" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "PLN") echo "selected"; ?>>Zloty</option>

			<option value="RON" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "RON") echo "selected"; ?>>New Romanian Leu</option>

			<option value="SEK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "SEK") echo "selected"; ?>>Swedish Krona</option>

			<option value="SGD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "SGD") echo "selected"; ?>>Singapore Dollar</option>

			<option value="SKK" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "SKK") echo "selected"; ?>>Slovak Koruna</option>

			<option value="TRY" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "TRY") echo "selected"; ?>>New Turkish Lira</option>

			<option value="THB" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "THB") echo "selected"; ?>>Thailand Baht</option>

			<option value="TWD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "TWD") echo "selected"; ?>>New Taiwan Dollar</option>

			<option value="USD" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "USD") echo "selected"; ?>>US Dollar</option>

			<option value="ZAR" <?php if ($PROCESSOR["modulemoneybookers_currency"] == "ZAR") echo "selected"; ?>>South-African Rand</option>

			</select>

		</td>

	</tr>

	<tr>

		<td width='59%'>Language:</td>

		<td width='41%'><select name="modulemoneybookers_language">

			<option value="<?php echo $PROCESSOR["modulemoneybookers_language"]; ?>"><?php echo $PROCESSOR["modulemoneybookers_language"]; ?></option>

			<option value="EN">EN</option>

			<option value="DE">DE</option>

			<option value="ES">ES</option>

			<option value="FR">FR</option>

			<option value="IT">IT</option>

			<option value="PL">PL</option>

			<option value="GR">GR</option>

			<option value="RO">RO</option>

			<option value="RU">RU</option>

			<option value="TR">RE</option>

			<option value="NL">NL</option>

			</select></td>

	</tr>

	<tr>

		<td width='59%'>Return URL:</td>

		<td width='41%'><input type='text' name='modulemoneybookers_return_url' size='25' value='<?php echo $PROCESSOR["modulemoneybookers_return_url"]; ?>'>

		</td>

	</tr>

	<tr>

		<td width='59%'>Status URL:</td>

		<td width='41%'><input type='text' name='modulemoneybookers_status_url' size='25' value='<?php echo $PROCESSOR["modulemoneybookers_status_url"]; ?>'>

		</td>

	</tr>

	<tr>

		<td width='59%'>Cancel URL:</td>

		<td width='41%'><input type='text' name='modulemoneybookers_cancel_url' size='25' value='<?php echo $PROCESSOR["modulemoneybookers_cancel_url"]; ?>'>

		</td>

	</tr>

</table>

<br>

<?php

}



function Checkoutmoneybookers($products, $totals, $orderid, $billing){

	global $PROCESSOR, $lang, $config;

?>

<center><?php echo $lang["PaymentGatewayMessage"]; ?></center>



<form action="https://www.moneybookers.com/app/payment.pl" name="payment" method="post">

<input type="hidden" name="pay_to_email" value="<?php echo $PROCESSOR["modulemoneybookers_merchant_id"]; ?>">

<input type="hidden" name="amount" value="<?php echo $totals["RAWTOTAL"]?>">

<input type="hidden" name="currency" value="<?php echo $PROCESSOR["modulemoneybookers_currency"]; ?>">

<input type="hidden" name="language" value="<?php echo $PROCESSOR["modulemoneybookers_language"]; ?>">

<input type="hidden" name="detail1_description" value="<?php echo $config["COMPANYWEBSITE"]; ?>">

<input type="hidden" name="detail1_text" value="<?php echo $config["CARTDESCRIPTION"]; ?>">

<input type="hidden" name="language" value="<?php echo $PROCESSOR["modulemoneybookers_language"]; ?>">

<input type="hidden" name="transaction_id" value="<?php echo $orderid; ?>">

<input type="hidden" name="return_url" value="<?php echo $PROCESSOR["modulemoneybookers_return_url"]; ?>">

<input type="hidden" name="status_url" value="<?php echo $PROCESSOR["modulemoneybookers_status_url"]; ?>">

<input type="hidden" name="cancel_url" value="<?php echo $PROCESSOR["modulemoneybookers_cancel_url"]; ?>">

<input type="hidden" name="pay_from_email" value="<?php echo $billing["EMAIL"]; ?>">

<input type="hidden" name="firstname" value="<?php echo $billing["FIRSTNAME"]; ?>">

<input type="hidden" name="lastname" value="<?php echo $billing["LASTNAME"]; ?>">

<input type="hidden" name="address" value="<?php echo $billing["ADDRESS"]; ?>">

<input type="hidden" name="postal_code" value="<?php echo $billing["ZIP"]; ?>">

<input type="hidden" name="city" value="<?php echo $billing["CITY"]; ?>">

<input type="hidden" name="state" value="<?php echo $billing["STATE"]; ?>">

<input type="hidden" name="country" value="<?php echo $billing["COUNTRY"]; ?>">

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