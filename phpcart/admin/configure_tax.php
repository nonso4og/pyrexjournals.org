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

		$content["TaxAllProducts"] = $_REQUEST["TaxAllProducts"];

		$content["TaxShipping"] = $_REQUEST["TaxShipping"];

		$content["TaxRate1"] = $_REQUEST["TaxRate1"];

		$content["TaxRate2"] = $_REQUEST["TaxRate2"];

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
		
		$msg = '<b>Your Tax Configuration has been Updated</b>';
		
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align=center class="page_title"><strong>Tax Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=7" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
				<tr>
					<td valign="top" width="45%" class="form_label"><strong>Tax All Items:</strong> <br>
						(If you want to charge tax for all taxable <br />
					customers and all products)
                    </td>

					<td valign="top" width="55%">
						<select size="1" name="TaxAllProducts">
                        	<option value="Yes" <?php if ($config["TaxAllProducts"] == 'Yes'){echo ' selected';} ?> >Yes</option>
                        	<option value="No" <?php if ($config["TaxAllProducts"] == 'No'){echo ' selected';} ?> >No</option>
                        	</select>
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Tax Shipping:</strong> <br>
					(If selected, only customers that are taxable will be <br />
					taxed for shipping at the taxrate1 rate.)</td>

					<td valign="top">
						<select size="1" name="TaxShipping">
                        <option value="Yes" <?php if ($config["TaxShipping"] == 'Yes'){echo ' selected';} ?> >Yes</option>
                        <option value="No" <?php if ($config["TaxShipping"] == 'No'){echo ' selected';} ?> >No</option>
                        </select>
                      </td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Default Tax Rate 1:</strong><br>
						(Prior to any state/region or country being entered)
					</td>

					<td valign="top"><input type="text" name="TaxRate1" size="5" value="<?php echo $config["TaxRate1"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Default Tax Rate 2:</strong><br />
(Prior to any state/region or country being entered)</td>

					<td valign="top"><input type="text" name="TaxRate2" size="5" value="<?php echo $config["TaxRate2"]; ?>">
					</td>
				</tr>

				<tr>
					<td colspan="2" valign="top">
						<p align="center">
							<input type="submit" class="body_text" name="submit" value="Save the settings"></p>
                    </td>
				</tr>

			</table>
</form>