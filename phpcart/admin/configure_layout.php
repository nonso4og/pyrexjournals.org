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

		$content["Template"] = $_REQUEST["Template"];

		$content["CARTDESCRIPTION"] = stripslashes($_REQUEST["CartDescription"]);

		$content["HEADERCOLOR"] = $_REQUEST["HeaderColor"];

		$content["HEADERBGCOLOR"] = $_REQUEST["HeaderBGColor"];

		$content["TEXTCOLOR"] = $_REQUEST["TextColor"];

		$content["ROWCOLOR1"] = $_REQUEST["RowColor1"];

		$content["ROWCOLOR2"] = $_REQUEST["RowColor2"];
		
		$content["FONT"] = $_REQUEST["Font"];

		$content["FONTSIZE"] = $_REQUEST["fontsize"];
		
		$content["Language"] = $_REQUEST["Language"];

		$content["DATEFORMAT"] = $_REQUEST["DateFormat"];

		$content["Num_Decimal"] = $_REQUEST["Num_Decimal"];
		
		$content["Decimal_Char"] = $_REQUEST["Decimal_Char"];
		
		$content["Thousands_Sep"] = $_REQUEST["Thousands_Sep"];
		
		$content["Notes_Active"] = $_REQUEST["Notes_Active"];
		
		$content["AcceptCoupons"] = $_REQUEST["AcceptCoupons"];
		
		$content["HideDiscount"] = $_REQUEST["HideDiscount"];


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
		
		$msg = '<b>Your Layout Configuration has been Updated</b>';
		
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Layout Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=4" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
				<tr>
					<td valign="top" class="form_label"><strong>Template:</strong></td>
					<td valign="top">
						<select size="1" name="Template">
							<option value="<?php echo $config["Template"]; ?>"><?php echo $config["Template"]; ?></option>

							<?php
							$dirarray = array();
							$directory = "../templates/";

							if ($dh = opendir($directory)) {
								while (($file = readdir($dh)) !== false) {
									if ($file != "." && $file != "..") {
										if (is_dir($directory.$file)){
											$dirarray[] = $file;
										}
									}
								}
								closedir($dh);
							}
							foreach ($dirarray as $dir){
								echo "<option value='$dir'>$dir</option>\n";
							}
							?>
					</select></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Cart Description:</strong><br>
						(Sent to payment gateways)</td>
					<td valign="top">
						<input type="text" name="CartDescription" size="50" value="<?php echo $config["CARTDESCRIPTION"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Header Text Color:</strong></td>
					<td valign="top">
					<input type="text" name="HeaderColor" size="20" value="<?php echo $config["HEADERCOLOR"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Header Background Color: </strong></td>
					<td valign="top">
					<input type="text" name="HeaderBGColor" size="20" value="<?php echo $config["HEADERBGCOLOR"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label">
						<p><strong>Item Text Color:</strong></p>
					</td>
					<td valign="top">
					<input type="text" name="TextColor" size="20" value="<?php echo $config["TEXTCOLOR"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Item Background Color:</strong><br> (odd rows)</td>
					<td valign="top">
					<input type="text" name="RowColor1" size="20" value="<?php echo $config["ROWCOLOR1"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Item Background Color:</strong><br>(even rows)</td>
					<td valign="top">
					<input type="text" name="RowColor2" size="20" value="<?php echo $config["ROWCOLOR2"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Font:</strong><br>(preferred order, comma-separated)</td>
					<td valign="top">
					<input type="text" name="Font" size="20" value="<?php echo $config["FONT"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Font size:</strong></td>
					<td valign="top">
					<input type="text" name="FontSize" size="3" value="<?php echo $config["FONTSIZE"]; ?>">
					</td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Language:</strong></td>
					<td valign="top">
						<select size="1" name="Language">
							<option value="english" <?php if ($config["Language"] == 'english'){echo ' selected';} ?> >english</option>
							<option value="french" <?php if ($config["Language"] == 'french'){echo ' selected';} ?> >french</option>
							<option value="spanish" <?php if ($config["Language"] == 'spanish'){echo ' selected';} ?> >spanish</option>
							<option value="italian" <?php if ($config["Language"] == 'italian'){echo ' selected';} ?> >italian</option>
					</select></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Date Format:</strong><br> (ex: M jS, Y g:i:s a)</td>
					<td valign="top">
					<input type="text" name="DateFormat" size="20" value="<?php echo $config["DATEFORMAT"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Number of Decimal Places:</strong></td>
					<td valign="top">
					<input type="text" name="Num_Decimal" size="4" value="<?php echo $config["Num_Decimal"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Decimal Character:</strong></td>
					<td valign="top">
					<input type="text" name="Decimal_Char" size="4" value="<?php echo $config["Decimal_Char"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Thousands Separator:</strong></td>
					<td valign="top">
					<input type="text" name="Thousands_Sep" size="4" value="<?php echo $config["Thousands_Sep"]; ?>"></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Display Comments field on checkout:</strong></td>
					<td width="10%" valign="top">
						<select size="1" name="Notes_Active">
							<option value="Yes" <?php if ($config["Notes_Active"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["Notes_Active"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Activate Coupon System:</strong></td>
					<td valign="top">
						<select size="1" name="AcceptCoupons">
							<option value="Yes" <?php if ($config["AcceptCoupons"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["AcceptCoupons"] == 'No'){echo ' selected';} ?> >No</option>
						</select>
                    </td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Hide discount on subtotal if $0:</strong></td>
					<td valign="top">
						<select size="1" name="HideDiscount">
							<option value="Yes" <?php if ($config["HideDiscount"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["HideDiscount"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>

				<tr>
					<td width="100%" colspan="2" valign="top">
						<p align="center">
							<input type="submit" class="body_text" name="submit" value="Save the settings"></p>
                    </td>
				</tr>

			</table>
</form>