<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                          # ||

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

		$content["FirstNameRequired"] = stripslashes($_REQUEST["FirstNameRequired"]);

		$content["LastNameRequired"] = stripslashes($_REQUEST["LastNameRequired"]);

		$content["EmailRequired"] = stripslashes($_REQUEST["EmailRequired"]);

		$content["AddressRequired"] = stripslashes($_REQUEST["AddressRequired"]);

		$content["CityRequired"] = stripslashes($_REQUEST["CityRequired"]);

		$content["StateRequired"] = stripslashes($_REQUEST["StateRequired"]);
		
		$content["ZipRequired"] = stripslashes($_REQUEST["ZipRequired"]);

		$content["CountryRequired"] = stripslashes($_REQUEST["CountryRequired"]);

		$content["PhoneRequired"] = stripslashes($_REQUEST["PhoneRequired"]);
		
		$content["SFirstNameRequired"] = stripslashes($_REQUEST["SFirstNameRequired"]);

		$content["SLastNameRequired"] = stripslashes($_REQUEST["SLastNameRequired"]);

		$content["SAddressRequired"] = stripslashes($_REQUEST["SAddressRequired"]);

		$content["SCityRequired"] = stripslashes($_REQUEST["SCityRequired"]);

		$content["SStateRequired"] = stripslashes($_REQUEST["SStateRequired"]);
		
		$content["SZipRequired"] = stripslashes($_REQUEST["SZipRequired"]);

		$content["SCountryRequired"] = stripslashes($_REQUEST["SCountryRequired"]);

		$content["SPhoneRequired"] = stripslashes($_REQUEST["SPhoneRequired"]);
		
		
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
		
		$msg = '<b>Your Required Items Configuration has been Updated</b>';
		
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Required Items Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<p align="center" class="form_label">Leave blank if input field is not required. Otherwise enter the words that you <br>want to precede the "Required" error message in the checkout form.</p>

<form action="settings.php?option=10" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
				<tr>
					<td class="theader" align="center" colspan="2"><strong>&nbsp;</strong>Required Billing Fields </td>
                </tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>Text for First Name:</strong></td>
					<td valign="top">
					<input type="text" name="FirstNameRequired" size="30" value="<?php echo $config["FirstNameRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for Last Name:</strong></td>
					<td valign="top">
					<input type="text" name="LastNameRequired" size="30" value="<?php echo $config["LastNameRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for Email Address:</strong></td>
					<td valign="top">
					<input type="text" name="EmailRequired" size="30" value="<?php echo $config["EmailRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for Address:</strong></td>
					<td valign="top">
					<input type="text" name="AddressRequired" size="30" value="<?php echo $config["AddressRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for City:</strong></td>
					<td valign="top">
					<input type="text" name="CityRequired" size="30" value="<?php echo $config["CityRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for State:</strong></td>
					<td valign="top">
					<input type="text" name="StateRequired" size="30" value="<?php echo $config["StateRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for Zip Code:</strong></td>
					<td valign="top">
					<input type="text" name="ZipRequired" size="30" value="<?php echo $config["ZipRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for Country:</strong></td>
					<td valign="top">
					<input type="text" name="CountryRequired" size="30" value="<?php echo $config["CountryRequired"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Text for Phone:</strong></td>
					<td valign="top">
					<input type="text" name="PhoneRequired" size="30" value="<?php echo $config["PhoneRequired"]; ?>"></td>
				</tr>
                
                <?php 
					if ($config["SeparateBilling"] == "Yes"){
					?>
                    
                    	<tr>
							<td class="theader" align="center" colspan="2"><strong>&nbsp;</strong>Required Shipping Fields </td>
               			 </tr>
                
						<tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping First Name:</strong></td>
                        <td valign="top">
                        <input type="text" name="SFirstNameRequired" size="30" value="<?php echo $config["SFirstNameRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping Last Name:</strong></td>
                        <td valign="top">
                        <input type="text" name="SLastNameRequired" size="30" value="<?php echo $config["SLastNameRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping Address:</strong></td>
                        <td valign="top">
                        <input type="text" name="SAddressRequired" size="30" value="<?php echo $config["SAddressRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping City:</strong></td>
                        <td valign="top">
                        <input type="text" name="SCityRequired" size="30" value="<?php echo $config["SCityRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping State:</strong></td>
                        <td valign="top">
                        <input type="text" name="SStateRequired" size="30" value="<?php echo $config["SStateRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping Zip Code:</strong></td>
                        <td valign="top">
                        <input type="text" name="SZipRequired" size="30" value="<?php echo $config["SZipRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text for Shipping Country:</strong></td>
                        <td valign="top">
                        <input type="text" name="SCountryRequired" size="30" value="<?php echo $config["SCountryRequired"]; ?>"></td>
                    </tr>
    
                    <tr>
                        <td valign="top" class="form_label"><strong>Text forShipping Phone:</strong></td>
                        <td valign="top">
                        <input type="text" name="SPhoneRequired" size="30" value="<?php echo $config["SPhoneRequired"]; ?>"></td>
                    </tr>
				<?php	
                } // end separate billing and shipping required
                ?>

				<tr>
					<td width="100%" colspan="2" valign="top">
						<p align="center">
							<input type="submit" class="body_text" name="submit" value="Save the settings"></p>
                    </td>
				</tr>

			</table>
</form>