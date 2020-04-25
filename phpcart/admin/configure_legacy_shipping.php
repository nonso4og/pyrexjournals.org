<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                           # ||

|| # ---------------------------------------------------------------- # ||

|| #          All code is � 2006 Webrigger Internet Services      .                       # ||

|| #    No files may be redistributed in whole or part.               # ||

|| # ----------------- PHPCART IS NOT FREE SOFTWARE ----------------- # ||

|| #    http://www.phpcart.net | http://www.phpcart.net/forum/        # ||

|| #################################################################### ||

\*======================================================================*/

error_reporting(E_ALL & ~E_NOTICE);

if (session_id() == "") {
	session_start();
}

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

require ("admin_1.php");
require ("configuration_1.php");
require ("includes/functions.inc.php"); // get array_replace substitution if not on phpV5.3
$msg = '';

if (!is_writable("configuration_1.php")) echo "The file: admin/configuration_1.php is not writable.  No updates will happen.<br>\n";

if (isset($_REQUEST["submit"])) {

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("configuration_1.php")){

		$content["ShippingPerOrder"] = stripslashes($_REQUEST["ShippingPerOrder"]);

		$content["ShippingFreeLevel"] = stripslashes($_REQUEST["ShippingFreeLevel"]);

		$content["ShippingPerItem"] = stripslashes($_REQUEST["ShippingPerItem"]);

		$content["ShippingPercent"] = stripslashes($_REQUEST["ShippingPercent"]);
		
		$content["ShippingWeights"] = stripslashes($_REQUEST["ShippingWeights"]);

		$content["ShippingMinimum"] = stripslashes($_REQUEST["ShippingMinimum"]);

		$content["ShippingMaximum"] = stripslashes($_REQUEST["ShippingMaximum"]);

		$content["ShippingWeights"] = stripslashes($_REQUEST["ShippingWeights"]);
		

		$update = array_replace($config, $content);

		$input  = "<?php\n";
	
		foreach ($update as $key => $value){
			$input .= "\$config[\"$key\"] = \"$value\";\n";
		}

		$input .= "?>\n";
		

		// update config file
		$filePointer = fopen("configuration_1.php", "w");
		fwrite($filePointer, $input);
		fclose($filePointer);
		
		$msg = '<b>Your Shipping Configuration has been Updated</b>';
		
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong> Configure Legacy Shipping</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=19" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
				<tr>
					<td valign="top" class="form_label"><strong>Shipping/Handling Per Order:</strong><br>
						(Added to the entire order)
					</td>
					<td valign="top"><input type="text" name="ShippingPerOrder" size="5" value="<?php echo $config["ShippingPerOrder"]; ?>">
					</td>
				</tr>

			<?php 
				// check config to see if we should show enable free shipping
				if ($config["EnableFreeShipping"] == 'Yes'){ ?>
				<tr>
					<td valign="top" class="form_label"><strong>Level for Free Shipping:</strong><br>
						(If total amount is greater or equal to this amount then shipping is free)</td>
					<td valign="top"><input type="text" name="ShippingFreeLevel" size="5" value="<?php echo $config["ShippingFreeLevel"]; ?>">
					</td>
				</tr>
			<?php } // close enable switch ?>
			
				<tr>
					<td valign="top" class="form_label"><strong>Shipping/Handling Per Item:</strong><br>
						(Added for each product)
					</td>
					<td valign="top"><input type="text" name="ShippingPerItem" size="5" value="<?php echo $config["ShippingPerItem"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Shipping By Percent of Total:</strong><br>
						(Calculate a percentage of total as the shipping charge)</td>
					<td valign="top"><input type="text" name="ShippingPercent" size="5" value="<?php echo $config["ShippingPercent"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Shipping By Weight:</strong><br>
						(Enter a list of weights and charges separated by a colon. Separate groups with a semicolon. The list should look like this:<br>
						weight:charge;weight:charge<br>
						Start with 0 as the first weight)<br>
					</td>
					<td valign="top">
					<input type="text" name="ShippingWeights" size="50" value="<?php echo $config["ShippingWeights"]; ?>">
					<br>
					<span class="form_label">(Example: 0:2.50;5:5.00;10:8.75<br>
The above will charge 2.50 if the weight is over 0, 5.00 if the weight is over 5 and 8.75 if the weight is over 10.)</span> </td>
				</tr>


			<?php 
				// check config to see if we should show enable minimum shipping
				if ($config["EnableMinShipping"] == 'Yes'){ ?>
				<tr>
					<td valign="top" class="form_label"><strong>Minimum Shipping Charge:</strong><br>
						(Mimimum amount to charge for shipping.  If calculating shipping does not reach the minimum, then the minimum is used) 
                    </td>
					<td valign="top"><input type="text" name="ShippingMinimum" size="5" value="<?php echo $config["ShippingMinimum"]; ?>">
					</td>
				</tr>
                
            <?php } 
			
			// check config to see if we should show enable minimum shipping
				if ($config["EnableMaxShipping"] == 'Yes'){ 
			?>
				<tr>
					<td valign="top" class="form_label"><strong>Maximum Shipping Charge:</strong><br>
						(Maximum amount to charge for shipping. If calculating shipping exceeds the maximum amount, then the maximum is used) 
                    </td>
					<td valign="top"><input type="text" name="ShippingMaximum" size="5" value="<?php echo $config["ShippingMaximum"]; ?>">
					</td>
				</tr>
			<?php } ?>
                
				<tr>
					<td width="100%" colspan="2" valign="top">
						<p align="center">
							<input type="submit" class="body_text" name="submit" value="Save the settings"></p>
                    </td>
				</tr>

			</table>
</form>