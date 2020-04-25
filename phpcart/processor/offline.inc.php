<?php

function Gatewayoffline(){
	return "local";
}


function Configoffline(){
	global $PROCESSOR;

?>

<table border='1' cellpadding='0' cellspacing='4' width='100%'>

	<tr>

		<td width='100%' colspan="2" align="center">Offline Address:</td>

	</tr>

	<tr>

		<td width='25%'>Offline Address:</td>

		<td width='75%'><textarea cols="40" rows="5" name="moduleoffline_address"><?php echo $PROCESSOR["moduleoffline_address"]; ?></textarea></td>

	</tr>

</table>

<br>

<?php

}



function Checkoutoffline($products, $totals, $orderid, $billing){
	global $PROCESSOR, $config;

	$config["COMPANYADDRESS"] = nl2br($PROCESSOR["moduleoffline_address"]);

	DisplayTemplate("offline.php");
	DestroySession();
}

?>