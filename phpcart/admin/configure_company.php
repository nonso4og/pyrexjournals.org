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
include_once ("../modules/misc.inc.php"); // to get time stamp 
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

		$content["COMPANYNAME"] = stripslashes($_REQUEST["CompanyName"]);
		
		$company_address = preg_replace("/(\r\n)+|(\n|\r)+/", "\n", stripslashes($_REQUEST["CompanyAddress"])); 

		$content["COMPANYADDRESS"] = $company_address;

		$content["COMPANYWEBSITE"] = stripslashes($_REQUEST["CompanyWebsite"]);

		$content["COMPANYPHONE"] = stripslashes($_REQUEST["CompanyPhone"]);

		$content["COMPANYEMAIL"] = stripslashes($_REQUEST["CompanyEmail"]);

		$content["AdminEmail"] = stripslashes($_REQUEST["AdminEmail"]);

		$content["OrderEmail"] = stripslashes($_REQUEST["OrderEmail"]);

		$content["HOMEPAGE"] = stripslashes($_REQUEST["HomePage"]);
		
		$content["TimeZone"] = stripslashes($_REQUEST["TimeZone"]);

		$content["StoreClosed"] = stripslashes($_REQUEST["StoreClosed"]);

		if ($config["key"] == "")
			$config["key"] = md5(mktime());
		
		$content["key"] = stripslashes($config["key"]);
		
		$update = array_replace($config, $content);

		$input  = "<?php\n";
	
		foreach ($update as $key => $value){
			$input .= "\$config[\"$key\"] = \"$value\";";
			
				if ($key == 'key'){
					$input .= ' // Do not change ever';
				}
			$input .= "\n";
		}

		$input .= "?>\n";
		

		// update config file
		$filePointer = fopen("configuration_1.php", "w");
		fwrite($filePointer, $input);
		fclose($filePointer);
		
		$msg = '<b>Your Company Configuration has been Updated</b>';
		
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

$timestamp = GetTimeStamp();
?>
<p align="center" class="page_title"><strong>Company Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<p align=center>Your Store Time:: <?php echo date($config["DATEFORMAT"], $timestamp); ?> <br></p>

<form action="settings.php?option=1" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
				<tr>
					<td width="45%" valign="top" class="form_label"><strong>Company Name:</strong></td>

					<td width="55%" valign="top">
						<input type="text" name="CompanyName" size="40" value="<?php echo $config["COMPANYNAME"]; ?>">
                    </td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Company Address:</strong></td>

					<td valign="top">
					<textarea name="CompanyAddress" cols="50" rows="5"><?php echo $config["COMPANYADDRESS"]; ?></textarea>
                    </td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Company Website:</strong><br />
					(format: http://subdomain.domain.suffix)</td>

					<td valign="top"><input type="text" name="CompanyWebsite" size="40" value="<?php echo $config["COMPANYWEBSITE"]; ?>">

					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Company Phone:</strong></td>

					<td valign="top"><input type="text" name="CompanyPhone" size="40" value="<?php echo $config["COMPANYPHONE"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Company Email:</strong><br>
					(Displayed on client emails, etc)</td>

					<td valign="top"><input type="text" name="CompanyEmail" size="40" value="<?php echo $config["COMPANYEMAIL"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Company Admin Email:</strong><br>
					(Email to receive receipts, orders, etc)</td>

					<td valign="top">
						<input type="text" name="AdminEmail" size="40" value="<?php echo $config["AdminEmail"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label">
						<p><strong>Additional Order Emails:</strong><br>
							(Orders will be emailed to these also.<br>Separate with a comma and space)</p>
					</td>

					<td valign="top">
						<input type="text" name="OrderEmail" size="40" value="<?php echo $config["OrderEmail"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Homepage URL:</strong></td>
					<td valign="top"><input type="text" name="HomePage" size="40" value="<?php echo $config["HOMEPAGE"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Time Zone Offset:</strong></td>
					<td valign="top">
						<select size="1" name="TimeZone">

						<option value=<?php echo $config["TimeZone"]; ?> selected>Default (GMT <?php echo $config["TimeZone"]; ?> hours)</option>
						<option value="-12">(GMT -12:00 hours)</option>
						<option value="-11">(GMT -11:00 hours)</option>
						<option value="-10">(GMT -10:00 hours)</option>
						<option value="-9">(GMT -9:00 hours)</option>
						<option value="-8">(GMT -8:00 hours)</option>
						<option value="-7">(GMT -7:00 hours)</option>
						<option value="-6">(GMT -6:00 hours)</option>
						<option value="-5">(GMT -5:00 hours)</option>
						<option value="-4">(GMT -4:00 hours)</option>
						<option value="-3.5">(GMT -3:30 hours)</option>
						<option value="-3">(GMT -3:00 hours)</option>
						<option value="-2">(GMT -2:00 hours)</option>
						<option value="-1">(GMT -1:00 hours)</option>
						<option value="0">(GMT)</option>
						<option value="+1">(GMT +1:00 hours)</option>
						<option value="+2">(GMT +2:00 hours)</option>
						<option value="+3">(GMT +3:00 hours)</option>
						<option value="+3.5">(GMT +3:30 hours)</option>
						<option value="+4">(GMT +4:00 hours)</option>
						<option value="+4.5">(GMT +4:30 hours)</option>
						<option value="+5">(GMT +5:00 hours)</option>
						<option value="+5.5">(GMT +5:30 hours)</option>
						<option value="+6">(GMT +6:00 hours)</option>
						<option value="+7">(GMT +7:00 hours)</option>
						<option value="+8">(GMT +8:00 hours)</option>
						<option value="+9">(GMT +9:00 hours)</option>
						<option value="+9.5">(GMT +9:30 hours)</option>
						<option value="+10">(GMT +10:00 hours)</option>
						<option value="+11">(GMT +11:00 hours)</option>
						<option value="+12">(GMT +12:00 hours)</option>
						</select>
					</td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>Maintenance Mode:</strong><br />
				    (Store Closed)</td>

					<td valign="top">
						<select size="1" name="StoreClosed">              
                        	<option value="Yes" <?php if ($config["StoreClosed"] == 'Yes'){echo ' selected';} ?> >Yes</option>
                        	<option value="No" <?php if ($config["StoreClosed"] == 'No'){echo ' selected';} ?> >No</option>
                       	</select>
					</td>
				</tr>

				<tr>
					<td width="100%" colspan="2" valign="top">
						<p align="center">
							<input type="submit" class="body_text" name="submit" value="Save the settings"></p>
                    </td>
				</tr>

			</table>
</form>