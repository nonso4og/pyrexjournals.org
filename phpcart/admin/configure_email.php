<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                            # ||

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

if ($config["SMTPPassword"] != "")
	$config["SMTPPassword"] = Decrypt($config["SMTPPassword"],$config["key"]."smt321");


if (isset($_REQUEST["submit"])) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("configuration_1.php")){

		$content["UseSMTP"] = $_REQUEST["UseSMTP"];
		
		$content["adminOrderNotification"] = $_REQUEST["adminOrderNotification"];
		
		$content["customerOrderNotification"] = $_REQUEST["customerOrderNotification"];

		$content["SMTPHost"] = $_REQUEST["SMTPHost"];

		$content["SMTPPort"] = $_REQUEST["SMTPPort"];

		$content["SMTPUser"] = $_REQUEST["SMTPUser"];

		$content["SMTPPassword"] = Encrypt(stripslashes($_REQUEST["SMTPPassword"]),$config["key"]."smt321");

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
		
		$msg = '<b>Your Email Configuration has been Updated</b>';
		
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Email Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=3" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="75%" align="center">
				<tr>
					<td valign="top" class="form_label"><strong>Set Email Method</strong></td>
					<td valign="top">
						<select size="1" name="UseSMTP"> 
                        	<option value="No" <?php if ($config["UseSMTP"] == 'No'){echo ' selected';} ?> >Use php Mail (standard configuration)</option>             
                        	<option value="Yes" <?php if ($config["UseSMTP"] == 'Yes'){echo ' selected';} ?> >Use SMTP Mail (requires SMTP settings below)</option>
                        	
                       	</select>
					</td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label">
                    	<strong>Send Order Notification Emails to Admin(s):</strong>
					</td>
					<td valign="top">
						<select size="1" name="adminOrderNotification">              
                        	<option value="Yes" <?php if ($config["adminOrderNotification"] == 'Yes'){echo ' selected';} ?> >Yes</option>
                        	<option value="No" <?php if ($config["adminOrderNotification"] == 'No'){echo ' selected';} ?> >No</option>
                       	</select>
					</td>
				</tr>
                
                 <tr>
					<td valign="top" class="form_label">
                    	<strong>Send Order Notification Emails to Customer:</strong>
					</td>
					<td valign="top">
						<select size="1" name="customerOrderNotification">              
                        	<option value="Yes" <?php if ($config["customerOrderNotification"] == 'Yes'){echo ' selected';} ?> >Yes</option>
                        	<option value="No" <?php if ($config["customerOrderNotification"] == 'No'){echo ' selected';} ?> >No</option>
                       	</select>
					</td>
				</tr>
                
                
                <tr>
                	<td colspan="2" align="center">
                    	<hr />
                        <p class="page_title">SMTP Settings<br />
(SMTP requires PEAR:mail to be installed on the server.)</p>
                    </td>
                </tr>

				<tr>
					<td valign="top" class="form_label"><strong>SMTP Host:</strong><br />
						(Only needed if Use SMTP is set to Yes)
                    </td>
					<td valign="top"><input type="text" name="SMTPHost" size="25" value="<?php echo $config["SMTPHost"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>SMTP Port (Standard is 25):</strong><br />
					(Only needed if Use SMTP is set to Yes) </td>
					<td valign="top"><input type="text" name="SMTPPort" size="4" value="<?php echo $config["SMTPPort"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>SMTP User:</strong><br />
					(Only needed if Use SMTP is set to Yes) </td>
					<td valign="top"><input type="text" name="SMTPUser" size="25" value="<?php echo $config["SMTPUser"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>SMTP Password:</strong><br />
					(Only needed if Use SMTP is set to Yes)</td>
					<td valign="top"><input type="text" name="SMTPPassword" size="25" value="<?php echo $config["SMTPPassword"]; ?>">

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