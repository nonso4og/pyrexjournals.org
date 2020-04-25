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
$error = array();

if (!is_writable("configuration_1.php")) echo "The file: admin/configuration_1.php is not writable.  No updates will happen.<br>\n";

if (!is_writable("../modules/order_number.php")){
	$update_file = chmod("../modules/order_number.php", 0777);;
	
	if ($update_file === FALSE){
		 echo "The file: modules/order_number.php is not writable.  No updates will happen.<br>\n";
	}
}

// get order number
	$myFile = "../modules/order_number.php";             // our file name
   $fh = fopen($myFile, 'r');                     // open the file to read
   $OrderNumber = fread($fh, filesize($myFile));   // read the entire file assigning its content to invoice number variable
   fclose($fh);

if (isset($_REQUEST["submit"])) {

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	

	if (is_writable("configuration_1.php")){
		
		if ($_REQUEST["CartPath"] == ''){
			$error[] = 'You must enter a value for Web Path to Cart Directory before pressing the Save button';
		}
		
		if ($_REQUEST["FilePath"] == ''){
			$error[] = 'You must enter a value for File Path to Cart Directory before pressing the Save button';
		}
		
		if (count($error) == 0){
			
			// determine if order number is being used
			if ($_REQUEST["OrderBody"]  != 'sequential'){
				$_POST['OrderNumber'] = '0000';
			}
			
			// insert order number into order_number file
			$myFile = "../modules/order_number.php";   // our file name
			$filePointer = fopen($myFile, "w");             // open our file to write
			fwrite($filePointer, $_POST['OrderNumber']); // write the next invoice number 
			fclose($filePointer);  	
	
			// CartPath - check to make sure it ends in /
			if ($_REQUEST["CartPath"] != ''){
				$last = $_REQUEST["CartPath"][strlen($_REQUEST["CartPath"])-1];
				
				if ($last != '/'){
					$content["CartPath"] = $_REQUEST["CartPath"].'/';
				}
				else {
					$content["CartPath"] = $_REQUEST["CartPath"];
				}
			}
			
			// FilePath - check to make sure it ends in /
			if ($_REQUEST["FilePath"] != ''){
				$flast = $_REQUEST["FilePath"][strlen($_REQUEST["FilePath"])-1];
				
				if ($flast != '/'){
					$content["FilePath"] = $_REQUEST["FilePath"].'/';
				}
				else {
					$content["FilePath"] = $_REQUEST["FilePath"];
				}
			}
			
			$content["Referers"] = stripslashes($_REQUEST["Referers"]);
	
			$content["OnePageCheckout"] = $_REQUEST["OnePageCheckout"];
	
			$content["SeparateBilling"] = $_REQUEST["SeparateBilling"];
	
			$content["EnableCopy"] = $_REQUEST["EnableCopy"];
	
			$content["OrderPrefix"] = $_REQUEST["OrderPrefix"];
	
			$content["OrderPrefixCustom"] = $_REQUEST["OrderPrefixCustom"];
	
			$content["OrderBody"] = $_REQUEST["OrderBody"];
			
			$content["OrderDigits"] = $_REQUEST["OrderDigits"];
	
			$content["OrderSuffix"] = $_REQUEST["OrderSuffix"];
			
			$content["OrderSuffixCustom"] = $_REQUEST["OrderSuffixCustom"];
			
			$content["DuplicatesOK"] = $_REQUEST["DuplicatesOK"];
			
			$content["AllowFractions"] = $_REQUEST["AllowFractions"];
			
			$content["CancelEmail"] = $_REQUEST["CancelEmail"];
			
			$content["DeclineEmail"] = $_REQUEST["DeclineEmail"];
			
			$content["CombineItems"] = $_REQUEST["CombineItems"];
			
			$content["EnablePaymentNotification"] = $_REQUEST["EnablePaymentNotification"];	
			
			$content["RequireHashKey"] = $_REQUEST["RequireHashKey"];
			
			$content['useMaxCartQuantity'] = $_REQUEST["useMaxCartQuantity"];
			
			$content['maxCartQuantity'] = $_REQUEST["maxCartQuantity"];
			
			$content['UseGeoIP'] = $_REQUEST["UseGeoIP"];		
			
			$update = array_replace($config, $content);
	
	//echo '<pre>';
	//print_r ($content);
	//echo '</pre>';
	
			$input  = "<?php\n";
		
			foreach ($update as $key => $value){
				$input .= "\$config[\"$key\"] = \"$value\";\n";
			}
			
			$input .= "?>\n";
			
	
			// update config file
			$filePointer = fopen("configuration_1.php", "w");
			fwrite($filePointer, $input);
			fclose($filePointer);
			
			$msg = '<b>Your Cart Configuration has been Updated</b>';
		} // end if no error
	} // end if writeable
} // end if submit

require ("configuration_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Cart Configuration</strong></p>

<?php

	// display error & success messages
	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
	
	if (count($error) != 0){
		echo '<p class="error" align="center"><b>ERROR:</b></p>';
		echo '<p align="center" class="error">';
			foreach($error as $err) {
				echo '- '.$err.'<br>'; 
			}	
		echo '</p>';
	} // end if error
	
?>

<form action="settings.php?option=2" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

			<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
            
            	<tr>
					<td valign="top" class="form_label"><strong>Web Path to Cart Directory</strong>*<br />
					(http://subdomain.domain.suffix/phpcart/)
					</td>

					<td valign="top"><input type="text" name="CartPath" size="50" value="<?php echo $config["CartPath"]; ?>">
					</td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>File Path to Cart Directory</strong>*<br />
					(Should be: <?php echo $_SERVER['DOCUMENT_ROOT'].str_replace("admin/settings.php","",$_SERVER['SCRIPT_NAME']); ?>)
					</td>

					<td valign="top"><input type="text" name="FilePath" size="50" value="<?php echo $config["FilePath"]; ?>">
					</td>
				</tr>
            
				<tr>
					<td valign="top" class="form_label"><strong>Domains that can access your Cart:</strong><br>
						(yourdomain.com www.yourdomain.com)
					</td>

					<td valign="top"><input type="text" name="Referers" size="50" value="<?php echo $config["Referers"]; ?>">
					</td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>One Page Checkout:</strong></td>
					<td valign="top">

						<select size="1" name="OnePageCheckout">

							<option value="Yes" <?php if ($config["OnePageCheckout"] == 'Yes'){echo ' selected';} ?> >Yes</option>

							<option value="No" <?php if ($config["OnePageCheckout"] == 'No'){echo ' selected';} ?> >No</option>

						</select>
                    </td>
				</tr>

                <tr>
					<td valign="top" class="form_label"><strong>Use separate billing and shipping fields in the checkout and confirmation pages:</strong></td>
					<td valign="top">

						<select size="1" name="SeparateBilling">

							<option value="Yes" <?php if ($config["SeparateBilling"] == 'Yes'){echo ' selected';} ?> >Yes</option>

							<option value="No" <?php if ($config["SeparateBilling"] == 'No'){echo ' selected';} ?>>No</option>

					</select></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Create a file in the &quot;orders&quot; directory:</strong></td>

					<td valign="top">
						<select size="1" name="EnableCopy">
							<option value="Yes" <?php if ($config["EnableCopy"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["EnableCopy"] == 'No'){echo ' selected';} ?> >No</option>
						</select>
                    </td>
				</tr>
                
                <tr>
                	<td valign="top" class="form_label"><strong>Order ID Format:</strong></td>
                    
                    <td>
                    	<table>
                        	<tr>
                            	<td valign="top">Prefix:</td>
                                <td>
                                	<input type="radio" name="OrderPrefix" value="none" <?php if ($config['OrderPrefix'] == 'none' || $config['OrderPrefix'] != 'date' || $config['OrderPrefix'] != 'custom'){echo ' checked';} ?> >None<br>
                                	<input type="radio" name="OrderPrefix" value="date" <?php if ( $config['OrderPrefix'] == 'date'){echo ' checked';} ?> >Date (YYYYMMDD)<br>
                                    
                                    <input type="radio" name="OrderPrefix" value="custom" <?php if ($config['OrderPrefix'] == 'custom'){echo ' checked';} ?>>Custom <input type="text" name="OrderPrefixCustom" value="<?php echo $config['OrderPrefixCustom']; ?>" size="8"><br>
                                </td>
                            </tr>
                            
                            <tr>
                            	<td valign="top">Body:</td>
                                
                                <td>
                                	<input type="radio" name="OrderBody" value="none" <?php if ($config['OrderBody'] == 'none' || $config['OrderBody'] != 'date' || $config['OrderBody'] != 'random' || $config['OrderBody'] != 'sequential'){echo ' checked';} ?> >None<br>
                                	<input type="radio" name="OrderBody" value="date" <?php if ($config['OrderBody'] == 'date'){echo ' checked';} ?> >Date (YYYYMMDD)<br>
                                    <input type="radio" name="OrderBody" value="random" <?php if ($config['OrderBody'] == 'random'){echo ' checked';} ?> >Random<br>
                                	<input type="radio" name="OrderBody" value="sequential" <?php if ($config['OrderBody'] == 'sequential'){echo ' checked';} ?> >Sequential Number <input type="text" name="OrderNumber" size="8" value="<?php echo $OrderNumber; ?>"> (next order) <br>
                                    <!-- number of digits -->
                                     <br />
                                    Display Digits: <br />
                                     <input type="radio" name="OrderDigits" value="4" <?php if ($config['OrderDigits'] == '4' || $config['OrderDigits'] != '5' || $config['OrderDigits'] != '6' || $config['OrderDigits'] != '7' || $config['OrderDigits'] != '8'){echo ' checked';} ?> >
                                    4&nbsp;
                                    <input type="radio" name="OrderDigits" value="5" <?php if ($config['OrderDigits'] == '5'){echo ' checked';} ?> >5&nbsp; 
                                    <input type="radio" name="OrderDigits" value="6" <?php if ($config['OrderDigits'] == '6'){echo ' checked';} ?>>6&nbsp; 
                                    <input type="radio" name="OrderDigits" value="7" <?php if ($config['OrderDigits'] == '7'){echo ' checked';} ?>>7&nbsp; 
                                    <input type="radio" name="OrderDigits" value="8" <?php if ($config['OrderDigits'] == '8'){echo ' checked';} ?>>8&nbsp;                      
                                </td>
                            </tr>
                            
                            <tr valign="top">
                            	<td>Suffix:</td>
                                
                                <td>
                                	<input type="radio" name="OrderSuffix" value="none" <?php if ($config['OrderSuffix'] == 'none' || $config['OrderSuffix'] != 'date' || $config['OrderSuffix'] != 'custom'){echo ' checked';} ?>>None<br>
                                    
                                	<input type="radio" name="OrderSuffix" value="date" <?php if ($config['OrderSuffix'] == 'date'){echo ' checked';} ?>>Date (YYYYMMDD)<br>
                                    
                                    <input type="radio" name="OrderSuffix" value="custom" <?php if ($config['OrderSuffix'] == 'custom'){echo ' checked';} ?>>Custom <input type="text" name="OrderSuffixCustom" value="<?php echo $config['OrderSuffixCustom']; ?>" size="8"><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

				<tr>
					<td valign="top" class="form_label"><strong>Allow Duplicate Items In Cart:</strong><br>
				    (Needed if your products have options)</td>

					<td valign="top">
						<select size="1" name="DuplicatesOK">
							<option value="Yes" <?php if ($config["DuplicatesOK"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["DuplicatesOK"] == 'No'){echo ' selected';} ?> >No</option>
						</select>
                    </td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>Allow Fractions in Quantity Field:</strong></td>

					<td valign="top">
						<select size="1" name="AllowFractions">
							<option value="Yes" <?php if ($config["AllowFractions"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No"<?php if ($config["AllowFractions"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label">
                    	<strong>Set Maximum Quantity of Items in Cart:</strong><br />
                    	<strong>Maximum Quantity of Items:</strong>
                    </td>

					<td valign="top">
						<select size="1" name="useMaxCartQuantity">
							<option value="Yes" <?php if ($config["useMaxCartQuantity"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No"<?php if ($config["useMaxCartQuantity"] == 'No'){echo ' selected';} ?> >No</option>
					</select>
                    
                    <br />
                    
                    <input type="text" name="maxCartQuantity" size="8" value="<?php echo $config['maxCartQuantity']; ?>"  />
                    
                    </td>
				</tr>
                
                 <tr>
					<td valign="top" class="form_label"><strong>Combine same Product ID numbers for quantity discount: </strong></td>

					<td valign="top">
						<select size="1" name="CombineItems">
							<option value="Yes" <?php if ($config["CombineItems"] != 'No'){echo ' selected';} ?> >Yes</option>
							<option value="No"<?php if ($config["CombineItems"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>Send Admin Notification Email upon Cancelled Payment:</strong></td>

					<td valign="top">
						<select size="1" name="CancelEmail">
							<option value="Yes" <?php if ($config["CancelEmail"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No"<?php if ($config["CancelEmail"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>Send Admin Notification Email upon Declined Payment:</strong></td>

					<td valign="top">
						<select size="1" name="DeclineEmail">
							<option value="Yes" <?php if ($config["DeclineEmail"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No"<?php if ($config["DeclineEmail"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>
                
                <tr>
					<td valign="top" class="form_label"><strong>Use GeoIP:</strong></td>

					<td valign="top">
						<select size="1" name="UseGeoIP">
							<option value="Yes" <?php if ($config["UseGeoIP"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No"<?php if ($config["UseGeoIP"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>

				<tr>
					<td valign="top" class="form_label"><strong>Enable Payment Notification:</strong> (IPN) <br>
						(Only used for Download Manager)
                    </td>

					<td valign="top">
						<select size="1" name="EnablePaymentNotification">
							<option value="Yes" <?php if ($config["EnablePaymentNotification"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["EnablePaymentNotification"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>


				<tr>
					<td valign="top" class="form_label"><strong>Require Hyperlink  Keys:</strong></td>

					<td valign="top">
						<select size="1" name="RequireHashKey">
							<option value="Yes" <?php if ($config["RequireHashKey"] == 'Yes'){echo ' selected';} ?> >Yes</option>
							<option value="No" <?php if ($config["RequireHashKey"] == 'No'){echo ' selected';} ?> >No</option>
					</select></td>
				</tr>

				<tr>
					<td width="100%" colspan="2" valign="top">
						<p align="center">
							<input type="submit" class="body_text" name="submit" value="Save the settings"></p>
						<p align="left"><strong>* Mandatory Fields</strong></p>
                    </td>
				</tr>

			</table>
</form>