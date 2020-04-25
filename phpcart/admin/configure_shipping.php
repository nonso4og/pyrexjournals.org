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

		$content["ShippingType"] = stripslashes($_REQUEST["shipping_type"]);

		$content["EnableFreeShipping"] = stripslashes($_REQUEST["enable_free"]);

		$content["EnableHandlingShipping"] = stripslashes($_REQUEST["enable_handling"]);

		$content["EnableMinShipping"] = stripslashes($_REQUEST["enable_min_shipping"]);

		$content["EnableMaxShipping"] = stripslashes($_REQUEST["enable_max_shipping"]);


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
<p align="center" class="page_title"><strong>Shipping Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
	
?>

<form action="settings.php?option=6" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />
        
          <table width="85%" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr>
              <td valign="top">
              
              	<table width="100%" border="0" cellspacing="0" cellpadding="5" >
				<tr>
                	<td align="center" colspan="2" class="theader">
						&nbsp;&nbsp;Choose your Shipping Method
					</td>
				</tr>
                          
                <tr>
                	<td class="form_label"><strong>Use Shipping Zones</strong><br>
                    	<ul>
                        	<li><a href="settings.php?option=20">Manage Shipping Zones</a></li>
                            <!--<li><a href="edit_shipping_carriers.php">Real Time Carrier Configuration</a></li>-->
                            <li><a href="settings.php?option=8">State/Region Configuration</a></li>
                            <li><a href="settings.php?option=9">Country Configuration</a></li>
                        </ul>
                    </td>
                    <td valign="top"><input type="radio" name="shipping_type" value="Zone" <?php if ($config['ShippingType'] != 'Legacy'){echo ' checked';} ?>></td>
                </tr>
                
                <tr>
                	<td width="80%" class="form_label">
                    	<strong>Use Legacy Shipping</strong><br>
                        <ul>
                        	<li><a href="settings.php?option=19">Edit Legacy Configuration</a></li>
                        </ul>
                    </td>
                    <td width="20%" valign="top"><input type="radio" name="shipping_type" value="Legacy" <?php if ($config['ShippingType'] == 'Legacy'){echo ' checked';} ?>></td>
                </tr>
             
                
                <tr>
                	<td align="center" colspan="2" class="theader">
						Global Settings
					</td>
				</tr>
                
                <tr>
                	<td class="form_label">Enable Free Shipping</td>
                    <td><input type="checkbox" name="enable_free" value="Yes" <?php if ($config["EnableFreeShipping"] == 'Yes'){echo ' checked';} ?>></td>
                </tr>
                
                <tr>
                	<td class="form_label">Enable Handling Fee</td>
                    <td><input type="checkbox" name="enable_handling" value="Yes" <?php if ($config["EnableHandlingShipping"] == 'Yes'){echo ' checked';} ?>></td>
                </tr>
                
                <tr>
                	<td class="form_label">Enable Minimum Shipping</td>
                    <td><input type="checkbox" name="enable_min_shipping" value="Yes" <?php if ($config["EnableMinShipping"] == 'Yes'){echo ' checked';} ?>></td>
                </tr>
                
                <tr>
                	<td class="form_label">Enable Maximum Shipping</td>
                    <td><input type="checkbox" name="enable_max_shipping" value="Yes" <?php if ($config["EnableMaxShipping"] == 'Yes'){echo ' checked';} ?>></td>
                </tr>
                
                <tr>
                  <td height="40" align="center" colspan="2">
                  <input type='submit' class="body_text" name='submit' value='Save'></td>
                </tr>
              </table>                
              
              </td>
           </tr>
          </table> 
		  		
		</form> 