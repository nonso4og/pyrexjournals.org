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
$error = '';

if (session_id() == "") {
	session_start();
}

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

$msg = '';
// get list of countries
include ("countries_1.php");
include ("regions_1.php");
require ("shipping_1.php");
require ("configuration_1.php");

// get configuration of currency format
$Num_Decimal = $config["Num_Decimal"];
$Decimal_Char = $config["Decimal_Char"];
$Thousands_Sep = $config["Thousands_Sep"];

if (!is_writable("shipping_1.php")) echo "The file: admin/shipping_1.php is not writable.  No updates will happen.<br>\n";

$zoneid = $_REQUEST['zoneid'];

// convert 2 digit countries into name
function getCountryName($code) {
	global $countries;
	
	for ($c = 1; $c <= sizeof($countries); $c++){
		
		if ($countries[$c][2] == $code){
			return $countries[$c][1];	
		}
	}
	return FALSE;
}

// convert 2 digit states into name
function getStateName($code) {
	global $regions;
	
	for ($c = 1; $c <= sizeof($regions); $c++){
		
		if ($regions[$c][2] == $code){
			return $regions[$c][1];	
		}
	}
	return FALSE;
}

// manage deletes
if ($_REQUEST['delcountry'] == 1 || $_REQUEST['delstate'] == 1 || $_REQUEST['delzip'] == 1 ) {

	// update shipping array
	$content  = "<?php\n";
	$content .= "//shipping zone arrays - DO NOT EDIT BY HAND\n";

	$y = 1;

	for($x = 1; $x <= sizeof($shipping); $x++){
		if ($x == $_REQUEST["zoneid"]){
	
			if ($_REQUEST['delcountry'] == 1 AND $_REQUEST['country'] != '') {
				$selected_country = $_REQUEST['country'];
				
				// get the existing countries and explode into array
				$zone_countries = $shipping[$x][3];
				$zone_countries_array = explode(",",$zone_countries);
				
				// get the array key for this country
				$search_key = array_search($selected_country,$zone_countries_array);
				
				// unset country and then reorder array
				unset ($zone_countries_array[$search_key]);
				$zone_countries_array = array_values($zone_countries_array);
				
				// put array back into string so we can save it
				$zone_countries = implode(",",$zone_countries_array);
				
				$content .= "\$shipping[$x] = array($x,\"".$shipping[$x][1]."\",\"".$shipping[$x][2]."\",\"".$zone_countries."\",\"".$shipping[$x][4]."\",\"".$shipping[$x][5]."\",\"".$shipping[$x][6]."\",\"".$shipping[$x][7]."\",\"".$shipping[$x][8]."\",\"".$shipping[$x][9]."\",\"".$shipping[$x][10]."\",\"".$shipping[$x][11]."\");\n";
			}
			elseif ($_REQUEST['delstate'] == 1) {
				$selected_state = $_REQUEST['state'];
				
				// get the existing countries and explode into array
				$zone_states = $shipping[$x][4];
				$zone_states_array = explode(",",$zone_states);
				
				// get the array key for this country
				$search_key = array_search($selected_state,$zone_states_array);

				// unset country and then reorder array
				unset ($zone_states_array[$search_key]);
				$zone_states_array = array_values($zone_states_array);
				
				// put array back into string so we can save it
				$zone_states = implode(",",$zone_states_array);


				$content .= "\$shipping[$x] = array($x,\"".$shipping[$x][1]."\",\"".$shipping[$x][2]."\",\"".$shipping[$x][3]."\",\"".$zone_states."\",\"".$shipping[$x][5]."\",\"".$shipping[$x][6]."\",\"".$shipping[$x][7]."\",\"".$shipping[$x][8]."\",\"".$shipping[$x][9]."\",\"".$shipping[$x][10]."\",\"".$shipping[$x][11]."\");\n";
			}
			elseif ($_REQUEST['delzip'] == 1) {
				$selected_zip = $_REQUEST['zip'];
				
				// get the existing countries and explode into array
				$zone_zip = $shipping[$x][5];
				$zone_zip_array = explode(",",$zone_zip);
				
				// get the array key for this country
				$search_key = array_search($selected_zip,$zone_zip_array, true);
		
				// unset country and then reorder array
				unset ($zone_zip_array[$search_key]);
				$zone_zip_array = array_values($zone_zip_array);
				
				// put array back into string so we can save it
				$zone_zip = implode(",",$zone_zip_array);


				$content .= "\$shipping[$x] = array($x,\"".$shipping[$x][1]."\",\"".$shipping[$x][2]."\",\"".$shipping[$x][3]."\",\"".$shipping[$x][4]."\",\"".$zone_zip."\",\"".$shipping[$x][6]."\",\"".$shipping[$x][7]."\",\"".$shipping[$x][8]."\",\"".$shipping[$x][9]."\",\"".$shipping[$x][10]."\",\"".$shipping[$x][11]."\");\n";
			}

			
		}
		else{	

			$content .= "\$shipping[$x] = array($x,\"".$shipping[$x][1]."\",\"".$shipping[$x][2]."\",\"".$shipping[$x][3]."\",\"".$shipping[$x][4]."\",\"".$shipping[$x][5]."\",\"".$shipping[$x][6]."\",\"".$shipping[$x][7]."\",\"".$shipping[$x][8]."\",\"".$shipping[$x][9]."\",\"".$shipping[$x][10]."\",\"".$shipping[$x][11]."\");\n";
			$y++;
		}
	}

	$content .= "?>";

	// save shipping file
	$filePointer = fopen("shipping_1.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);

	$msg = '<b>Your Shipping Zone has been Updated</b>';
	
	// clear shipping array and get modified file
	$shipping = array();
	include ("shipping_1.php");
} // end delete

// submit form
if (isset($_POST['submit']) || isset($_POST['submit_country']) || isset($_POST['submit_state']) || isset($_POST['submit_zip'])){

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	if (is_writable("shipping_1.php")){

			// validate
			if ($_REQUEST["zone_name"] == ''){
				$error = "You must enter a Zone Name prior to pressing the submit button";
			}

			$zoneid = $_POST['zoneid'];
	
			if ($error == ''){
				
				// get posted values
				$zone_countries = $_POST['zone_countries'];
				$zone_states = $_POST['zone_states'];
				$zone_zip = $_POST['zone_zip'];
				$enable_pickup = $_POST['enable_pickup'];
				$pickup_fee = $_POST['pickup_fee'];
				$handling_fee = $_POST['handling_fee'];
				$handling_percent = $_POST['handling_percent'];
				$min_fee = $_POST['min_fee'];
				$max_fee = $_POST['max_fee'];
				
			
				// submit country
				if (isset($_POST['submit_country']) AND count($_POST['add_country'] > 0)){	
					if (!empty($zone_countries)){
						$zone_countries_array = explode(",",$zone_countries);
					
						foreach ($_POST['add_country'] as $key => $value){
							if (!in_array($value, $zone_countries_array)){
								$zone_countries_array[] = $value;
							}
						} // end loop on foreach
					}
					else {
						foreach ($_POST['add_country'] as $key => $value){
								$zone_countries_array[] = $value;
						} // end loop on foreach
					}
						
						sort($zone_countries_array);
						$zone_countries = implode(',',$zone_countries_array);		
				} // end submit country
	
				// submit state
				if (isset($_POST['submit_state']) AND count($_POST['add_state']  > 0)){	
		
					if (!empty($zone_states)){
						$zone_states_array = explode(",",$zone_states);
						
						foreach ($_POST['add_state'] as $key => $value){
							if (!in_array($value, $zone_states_array)){
								$zone_states_array[] = $value;
							}
						} // end loop on foreach
					}
					else {
						foreach ($_POST['add_state'] as $key => $value){
								$zone_states_array[] = $value;
						} // end loop on foreach
					}
					
						sort($zone_states_array);			
						$zone_states = implode(',',$zone_states_array);		
				} // end submit state
				
				// submit zip
				if (isset($_POST['submit_zip']) AND $_POST['add_zip'] != ''){	
					if (!empty($zone_zip)){
						$zone_zip_array = explode(",",$zone_zip);
					
						if (in_array($_POST['add_zip'], $zone_zip_array)){
							$error = 'You have already selected this state';
						}
					}
					
					if ($error == '') {
						$zone_zip_array[] = $_POST['add_zip'];
						sort($zone_zip_array);			
						$zone_zip = implode(', ',$zone_zip_array);				
					}
				} // end submit zip

				// check for errors in country, state, zip
				if ($error == ''){
					// update shipping array
					$content  = "<?php\n";
					$content .= "//shipping zone arrays - DO NOT EDIT BY HAND\n";
					$content .= "//Array: Zone ID #, Zone Name, Shipping Method ID, Zone Countries, Zone States, Zone Zip, Enable Pickup, Pickup Fee, Handling Fee, Handling Percent, Min Fee, Max Fee\n";
					$y = 1;
				
					for($x = 1; $x <= sizeof($shipping); $x++){
						if ($x == $_POST["zoneid"]){

							$content .= "\$shipping[$x] = array($x,\"".stripslashes($_POST["zone_name"])."\",\"".$_POST["shipping_method"]."\",\"".$zone_countries."\",\"".$zone_states."\",\"".$zone_zip."\",\"".$enable_pickup."\",\"".$pickup_fee."\",\"".$handling_fee."\",\"".$handling_percent."\",\"".$min_fee."\",\"".$max_fee."\");\n";
						}
						else{	

							$content .= "\$shipping[$x] = array($x,\"".$shipping[$x][1]."\",\"".$shipping[$x][2]."\",\"".$shipping[$x][3]."\",\"".$shipping[$x][4]."\",\"".$shipping[$x][5]."\",\"".$shipping[$x][6]."\",\"".$shipping[$x][7]."\",\"".$shipping[$x][8]."\",\"".$shipping[$x][9]."\",\"".$shipping[$x][10]."\",\"".$shipping[$x][11]."\");\n";
							$y++;
						}
					}
				
					$content .= "?>";
		
					// save shipping file
					$filePointer = fopen("shipping_1.php", "w");
					fwrite($filePointer, $content);
					fclose($filePointer);
		
					$msg = '<b>Your Shipping Zone has been Updated</b>';
					
					// clear shipping array and get modified file
					$shipping = array();
					include ("shipping_1.php");
				} // end if no errors 2
			} // end if no errors
	} // end if not writeable
} // end submit form


// parse shipping array
$zoneid = $shipping[$zoneid][0];
$zone_name = $shipping[$zoneid][1];
$zone_type = $shipping[$zoneid][2];

// countries
$zone_countries = $shipping[$zoneid][3];
if ($zone_countries == ''){
		$zone_countries_array = array();
	}
	else {
		$zone_countries_array = explode(",",$zone_countries);
	}


// states	
$zone_states = $shipping[$zoneid][4];
	if ($zone_states == ''){
		$zone_states_array = array();
	}
	else {
		$zone_states_array = explode(",",$zone_states);
	}


// zip	
$zone_zip = $shipping[$zoneid][5];
	if ($zone_zip == ''){
		$zone_zip_array = array();
	}
	else {
		$zone_zip_array = explode(",",$zone_zip);
	}


$enable_pickup = $shipping[$zoneid][6];
$pickup_fee =number_format( $shipping[$zoneid][7],$Num_Decimal,$Decimal_Char,$Thousands_Sep);
$handling_fee = number_format($shipping[$zoneid][8],$Num_Decimal,$Decimal_Char,$Thousands_Sep);
$handling_percent = number_format($shipping[$zoneid][9],$Num_Decimal,$Decimal_Char,$Thousands_Sep);
$min_fee = number_format($shipping[$zoneid][10],$Num_Decimal,$Decimal_Char,$Thousands_Sep);
$max_fee = number_format($shipping[$zoneid][11],$Num_Decimal,$Decimal_Char,$Thousands_Sep);
	
	
	
// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Edit Shipping Zone</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg"><strong>'.$msg.'</strong></p>';
	}
	if ($error != ''){
		echo '<p align="center" class="error"><strong>'.$error.'</strong></p>';
	}
	
?>
        <form action="settings.php?option=22" method="post">
		<input type="hidden" name="token" value="<?php echo $token; ?>" />
        <input type="hidden" name="zoneid" value="<?php echo $zoneid; ?>" />
        <input type="hidden" name="zone_countries" value="<?php echo $zone_countries; ?>" />
        <input type="hidden" name="zone_states" value="<?php echo $zone_states; ?>" />
        <input type="hidden" name="zone_zip" value="<?php echo $zone_zip; ?>" />
        
          <table width="85%" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr>
              <td valign="top">
              
              	<table width="100%" border="0" cellspacing="0" cellpadding="5" >
				<tr>
                	<td align="center" colspan="2" class="theader">Shipping Zone #<?php echo $zoneid; ?></td>
				</tr>
                          
                <tr>
                	<td class="form_label">Name:&nbsp;&nbsp;
                    	<?php 
							if ($zoneid != "1"){
                    			echo '<input type="text" name="zone_name" size="35" value="';
									 if ($_POST['zone_name'] != '') {
										 echo $_POST['zone_name'];
									}
									else {
										echo $zone_name;
									} 
								echo '" >';
							}
							elseif ($zoneid == "1"){
								echo '<input type="hidden" name="zone_name" value="Global Shipping Zone">';
								echo 'Global Shipping Zone';
							}
						?>
                    </td>
                </tr>
                
                <tr>
                	<td align="center" colspan="2" class="theader">Countries</td>
				</tr>
                
                <tr>
                    <td valign="top" class="form_label">
                    
                        Select Country:<br>
                        <select name="add_country[]" multiple="multiple" size="5">
                        	<?php
								
								for($x = 1; $x <= sizeof($countries); $x++){
	
                        			echo '<option value="'.$countries[$x][COUNTRYABBREV2].'"';
										if ($_POST['add_country'] == $countries[$x][COUNTRYABBREV2]){
											echo ' selected';	
										}
									echo '>'.$countries[$x][COUNTRYNAME].'</option>';
								}
							?>
                        </select>
                       <input type='submit' class="body_text" name='submit_country' value='Add Country'>	
  
                       <br>Selected Countries:<br>
                       
                       
                       <?php
					   		// get list of countries from shipping array
							if (!empty($zone_countries_array)) {
								echo '<p>';
								foreach ($zone_countries_array as $key => $value){
									
									// convert 2 digit country into name
									$countryName = getCountryName($value);
									
									// insert selected country and delete icon
									echo '&nbsp;&nbsp;<a href="settings.php?option=22&delcountry=1&country='.trim($value).'&zoneid='.$zoneid.'" class="sublink">'.$countryName.'&nbsp;&nbsp;<img src="images/delete.png" border="0"></a><br>';	
								}
								echo "</p>";
							}
							else {
								echo '<p class="form_label">&nbsp;&nbsp;None</p>';
							}
						?>
                    </td> 
                </tr>
  
				<tr>
                	<td align="center" colspan="2" class="theader">States/Regions</td>
				</tr>

                <tr>
                    <td valign="top" class="form_label">
                    
                        Select States:<br>
                        <select name="add_state[]" multiple="multiple" size="5">
                        	<?php
								
								for($x = 1; $x <= sizeof($regions); $x++){
	
                        			echo '<option value="'.$regions[$x][STATEABBREV].'"';
										if ($_POST['add_state'] == $regions[$x][STATEABBREV]){
											echo ' selected';	
										}
									echo '>'.$regions[$x][STATENAME].'</option>';
								}
							?>
                        </select>
                       <input type='submit' class="body_text" name='submit_state' value='Add State'>	
                       
                       
                       <br>Selected States:<br>
                       
                       
                       <?php
					   		// get list of states from shipping array			
							if (!empty($zone_states_array)) {
								echo '<p>';
								foreach ($zone_states_array as $key => $value){
									
									// convert 2 digit state into name
									$stateName = getStateName($value);
									
									// insert selected state and delete icon
									echo '&nbsp;&nbsp;<a href="settings.php?option=22&delstate=1&state='.trim($value).'&zoneid='.$zoneid.'" class="sublink">'.$stateName.'&nbsp;&nbsp;<img src="images/delete.png" border="0"></a><br>';	
								}
								echo "</p>";
							}
							else {
								echo '<p class="form_label">&nbsp;&nbsp;None</p>';
							}
						?>
                    </td> 
                </tr>
                
                <tr>
                	<td align="center" colspan="2" class="theader">Zip/Postal Codes</td>
				</tr>
                
                <tr>
                    <td valign="top" class="form_label">
                    
                        Enter Zip/Postal Code (separate with commas)<br>
                        
                        <textarea name="add_zip" class="textarea1"></textarea>
                        
                       <input type='submit' class="body_text" name='submit_zip' value='Add Zip/Postal Code'>	
                       
                       
                       <br>Selected Zip/Postal Codes:<br>
                       
                       
                       <?php
					   		// get list of countries from shipping array
							if (!empty($zone_zip_array)) {
								echo '<p>';
								foreach ($zone_zip_array as $key => $value){
									// insert selected state and delete icon
									echo '&nbsp;&nbsp;<a href="settings.php?option=22&delzip=1&zip='.trim($value).'&zoneid='.$zoneid.'" class="sublink">'.trim($value).'&nbsp;&nbsp;<img src="images/delete.png" border="0"></a><br>';	
								}
								echo "</p>";
							}
							else {
								echo '<p class="form_label">&nbsp;&nbsp;None</p>';
							}
						?>
                    </td> 
                </tr>
                
                <tr>
                	<td align="center" colspan="2" class="theader">Shipping Method</td>
				</tr>
                
                <tr>
                	<td>
                    	<table width="50%" border="0" cellspacing="0" cellpadding="4" >
                        	<tr><td colspan="2"><input name="shipping_method" value="1" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] != '2' AND $_POST['shippingmethod'] != '3' ANd $_POST['shippingmethod'] != '4' AND $_POST['shipping_method'] != '5' AND $_POST['shipping_method'] != '6' AND $_POST['shipping_method'] != '7'){ echo ' checked'; }elseif ($zone_type != '2' AND $zone_type != '3' AND  $zone_type != '4' AND  $zone_type != '5' AND  $zone_type != '6' AND  $zone_type != '7') {echo ' checked'; } ?> > None</td></tr>
                            
                            <tr><td colspan="2"><input name="shipping_method" value="2" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] == '2' ){ echo ' checked'; }elseif ($zone_type == '2') {echo ' checked'; }?> > Free Shipping</td></tr>
                            
                            <tr>
                            	<td>
                                	<input name="shipping_method" value="3" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] == '3' ){ echo ' checked'; }elseif ($zone_type == '3') {echo ' checked'; }?>> Order Subtotal - Currency
                                </td>
                                
                                <td>
                                	<?php if ($_POST['shipping_method'] == '3' || $zone_type == '3'){ ?>
                                	<a href="settings.php?option=24&zoneid=<?php echo $zoneid; ?>&typeid=3" class="cssBlueButton">Configure</a>
                                    <?php } else {echo '&nbsp;';}?>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td>
                                    <input name="shipping_method" value="4" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] == '4' ){ echo ' checked'; }elseif ($zone_type == '4') {echo ' checked'; }?>> Order Subtotal - Percent
                                </td>
                                
                                
                                <td>
                                	<?php if ($_POST['shipping_method'] == '4' || $zone_type == '4'){ ?>
                                    <a href="settings.php?option=24&zoneid=<?php echo $zoneid; ?>&typeid=4" class="cssBlueButton">Configure</a>
                                	<?php } else {echo '&nbsp;';}?>
                                </td>
                            </tr>
                            
                            
                            <tr>
                            	<td>
                                	<input name="shipping_method" value="5" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] == '5' ){ echo ' checked'; }elseif ($zone_type == '5') {echo ' checked'; }?>> Order Quantity
                                </td>
                                
                                
                                <td>
                                	<?php if ($_POST['shipping_method'] == '5' || $zone_type == '5'){ ?>
                                		<a href="settings.php?option=24&zoneid=<?php echo $zoneid; ?>&typeid=5" class="cssBlueButton">Configure</a>
                                    <?php } else {echo '&nbsp;';}?>
                                </td>
                            </tr>
                            
                            
                            <tr>
                            	<td>
                                	<input name="shipping_method" value="6" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] == '6' ){ echo ' checked'; }elseif ($zone_type == '6') {echo ' checked'; }?>> Order Weight
                                </td>
                                
                                
                                <td>
                                	<?php if ($_POST['shipping_method'] == '6' || $zone_type == '6'){ ?>
                                		<a href="settings.php?option=24&zoneid=<?php echo $zoneid; ?>&typeid=6" class="cssBlueButton">Configure</a>
                                    <?php } else {echo '&nbsp;';}?>
                                </td>
                            </tr> 
                            
                            <tr>
                            	<td colspan="2">
                                	<input name="shipping_method" value="7" type="radio" <?php  if (isset($_POST) AND $_POST['shipping_method'] == '7' ){ echo ' checked'; }elseif ($zone_type == '7') {echo ' checked'; }?>> Product Defined
                                </td>
                            </tr> 
                         </table>
                      
                      </td>
                   </tr>
                   
                   <tr>
                		<td align="center" colspan="2" class="theader">Shipping Extras</td>
					</tr>
                
                    <tr>
                        <td>
                            <table width="50%" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td valign="top">Add Pickup to this Zone</td>
                                    <td valign="top"><input name="enable_pickup" value="Yes" type="checkbox" <?php  if (isset($_POST) AND $_POST['enable_pickup'] == 'Yes' ){ echo ' checked'; } elseif ($enable_pickup == 'Yes') {echo ' checked'; }?>></td>
                                </tr>
                                
                                <tr>
                                    <td>Pickup Handling Fee</td>
                                    <td><input size="10" name="pickup_fee" value="<?php  if (isset($_POST) AND $_POST['pickup_fee'] != '' ){ echo number_format($_POST['pickup_fee'],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif ($pickup_fee != '') {echo $pickup_fee; } else { echo '0.00'; } ?>" type="text"></td>
                                </tr>
                                
                                <tr>
                                    <td>Handling Fee: </td>
                                    <td> <input size="10" name="handling_fee" value="<?php  if (isset($_POST) AND $_POST['handling_fee'] != '' ){ echo number_format($_POST['handling_fee'],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif ($handling_fee != '') {echo $handling_fee; } else { echo '0.00'; } ?>" type="text"></td>
                                </tr>
                                
                                <tr>
                                    <td>Handling Percent: </td>
                                    <td> <input size="10" name="handling_percent" value="<?php  if (isset($_POST) AND $_POST['handling_percent'] != '' ){ echo number_format($_POST['handling_percent'],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif ($handling_percent != '') {echo $handling_percent; } else { echo '0.00'; } ?>" type="text"></td>
                                </tr>
                                
                                <tr>
                                    <td>Minimum Shipping Fee: </td>
                                    <td> <input size="10" name="min_fee" value="<?php  if (isset($_POST) AND $_POST['min_fee'] != '' ){ echo number_format($_POST['min_fee'],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif ($min_fee != '') {echo $min_fee; } else { echo '0.00'; } ?>" type="text"></td>
                                </tr>
                                
                                <tr>
                                    <td>Maximum Shipping Fee: </td>
                                    <td><input size="10" name="max_fee" value="<?php  if (isset($_POST) AND $_POST['max_fee'] != '' ){ echo number_format($_POST['max_fee'],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif ($max_fee != '') {echo $max_fee; } else { echo '0.00'; } ?>" type="text"></td>
                                </tr>
                            </table>
                            
                        </td>
                    </tr>                
				</table>
                
            </td>
			</tr>
           
           <tr>
                  <td height="40" align="center" colspan="2">
                  <input type='submit' class="body_text" name='submit' value='Save'></td>
                </tr>
          </table> 
		  		
		</form> 