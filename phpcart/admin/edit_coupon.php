<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                           # ||

|| # -------------------------------------------------------------- # ||

|| #      All code is © 2006 Webrigger Internet Services    # ||

|| #    No files may be redistributed in whole or part.       # ||

|| # ---------- PHPCART IS NOT FREE SOFTWARE ---------  # ||

|| #    http://www.phpcart.net 								        # ||
|| #    http://www.phpcart.net/forum/        					# ||

|| #################################################################### ||

\*======================================================================*/

error_reporting(E_ALL & ~E_NOTICE);

if (session_id() == "") session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

require("admin_1.php");
require("configuration_1.php");
	$currency = $config["Currency"];
require("coupon_1.php");

$msg = '';
$error = array();
$errormsg = '';

if (!is_writable("coupon_1.php")) echo "Coupon_1.php is not writable.  No updates will happen.<br>\n";


// edit coupon
if (isset($_POST["edit_coupon"]) ){
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("coupon_1.php")){

		if (empty($_REQUEST["couponcode"])){
			$error[] = 'You must include a coupon code before pressing submit';
		}
		
		if (empty($_REQUEST["couponamount"]) AND $_REQUEST['coupontype'] != 'Free Shipping'){
			$error[] = 'You must include a coupon amount before pressing submit';
		}
		elseif ($_REQUEST['coupontype'] == 'Free Shipping') {
			$_REQUEST["couponamount"] = 'n/a';
		}
		else {
			// format amount
			//$_REQUEST["couponamount"] = number_format($_REQUEST["couponamount"], $config['Num_Decimal'], $config['Decimal_Char'], $config['Thousands_Sep']);
			$_REQUEST["couponamount"] = number_format($_REQUEST["couponamount"], $config['Num_Decimal'], '.', '');
		}
		
		if (empty($_REQUEST["couponminimum"]) AND $_REQUEST['coupontype'] != 'Free Shipping'){
			$error[] = 'You must include a coupon minimum before pressing submit';
		}
		elseif ($_REQUEST['coupontype'] == 'Free Shipping') {
			$_REQUEST["couponminimum"] = '0.00';
		}
		else {
		// format amount
			//$_REQUEST["couponminimum"] = number_format($_REQUEST["couponminimum"], $config['Num_Decimal'], $config['Decimal_Char'], $config['Thousands_Sep']);	
			$_REQUEST["couponminimum"] = number_format($_REQUEST["couponminimum"], $config['Num_Decimal'], '.', '');
		}
		
		if ($_REQUEST['coupontype'] == 'Free Shipping'){
			$_REQUEST["couponamount"] = '0';
		}

		// check if coupon is expired
		$todays_date = date("Y-m-d");
		$today = strtotime($todays_date);
		
		$coupon_date = date($_REQUEST["couponyear"].'-'.$_REQUEST["couponmonth"].'-'.$_REQUEST["couponday"]);
		$coupon_date = strtotime($coupon_date);
		
		if ($today > $coupon_date){
			$error[] = 'Your coupon is already expired, please choose a new date';
		}
		
		// check to make sure coupon minimum (minimum order amount) is larger than coupon amount (amount of discount)
		if ($_REQUEST['coupontype'] == '$'  || $_REQUEST['coupontype'] == 'Shipping'){
			if ($_REQUEST["couponamount"] > $_REQUEST["couponminimum"]){
				$error[] = 'Your coupon discount cannot be larger than the minimum order amount';	
			}
		}
		
		if ($_REQUEST['coupontype'] == '%' AND $_REQUEST["couponamount"] > '100'){
			$error[] = 'Your percent discount coupon cannot exceed 100%';	
		}
		
		// if no errors, process array
		if (count($error) == 0){
			
			$coupons = explode(";",$couponarray);
			$couponarray = '';
			$x = 0;

			foreach ($coupons as $coupon){
				// not the coupon being edited
				if($_REQUEST["id"] != $x){
					$coupondata = explode(":",$coupon);
					if ($couponarray != "")
							$couponarray .= ";";
							
					$couponarray .= $coupondata["0"].":".$coupondata["1"].":".$coupondata["2"].":".$coupondata["3"].":".$coupondata["4"].":".$coupondata["5"].":".$coupondata["6"];
	
				}
				else {
					// update this coupon
					if ($couponarray != "")
							$couponarray .= ";";
	
					$couponarray .= strtolower(trim($_REQUEST["couponcode"])).":".$_REQUEST["coupontype"].":".trim($_REQUEST["couponamount"]).":".trim($_REQUEST["couponminimum"]).":".$_REQUEST["couponyear"].$_REQUEST["couponmonth"].$_REQUEST["couponday"].":".$_REQUEST["couponquantity"].":".$_REQUEST["partnumber"];
				}
				$x++;
			} // end foreach

			$filePointer = fopen("coupon_1.php", "w");
			fwrite($filePointer, "<?php \$couponarray=\"".$couponarray."\"; ?>");
			fclose($filePointer);

			$msg = '<b>Coupon Updated</b>';
		}
		else{
			
			if (count($error) == 1){
				$errormsg = '<b>Error:<br>';
			}
			elseif (count($error) > 1){
				$errormsg =  '<b>Errors:<br>';
			}
			
			foreach ($error as $key => $value){
				$errormsg .=  $value.'<br>';
			}
			
			$errormsg .= '</b>';
		}
	} // end if writeable
} // end edit coupon


// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;


// SHOW EDIT SCREEN

	// get coupons
	include ("coupon_1.php");
	$coupons = explode(";",$couponarray);
	$couponarray = "";
	$x = 0;

	
	foreach ($coupons as $coupon){
		if ($_REQUEST["id"] == $x){
			
			$coupondata = explode(":",$coupon);

			//$currencyarray .= .":".$currencydata["1"].":".$currencydata["2"].":".$currencydata["3"].":".$currencydata["4"].":".$currencydata["5"];

		} //end if 
		$x++;
	} // end foreach loop

?>

<p align="center" class="page_title"><b>Edit Coupon</b></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}

	if ($errormsg != ''){
		echo '<p align="center" class="error">'.$errormsg.'</p>';
	}
	
?>

<form action='coupons.php?option=3' method='post' name="couponform" id="couponform">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table  align="center" border='0' cellpadding='0' cellspacing='8' width='50%'>
	<tr>
		<td width='65%' class="form_label"><strong>Coupon Code:</strong> <span style="color:red">*</span></td>
        <td width="35%"><input type="text" name="couponcode" size="20"value="<?php echo $coupondata[0];?>"></td>
    </tr>
    
	<tr>
		<td class="form_label" valign="top"><strong>Type:</strong> <span style="color:red">*<br />		    
		</span></td>
        <td>
        	<select size='1' name='coupontype'>
            	<option value='$' <?php if ($coupondata[1] == '$'){echo ' selected';} ?>>$ Discount</option>
                
                <option value='%' <?php if ($coupondata[1] == '%'){echo ' selected';} ?>>% Discount</option>
                
                <option value='Shipping' <?php if ($coupondata[1] == 'Shipping'){echo ' selected';} ?>>Shipping</option>
                
                <option value='Free Shipping' <?php if ($coupondata[1] == 'Free Shipping'){echo ' selected';} ?>>Free Shipping</option>
            </select>
        </td>
    </tr>

	<tr>
		<td class="form_label"><strong>Amount:</strong> <span style="color:red">*</span><br>
			(Amount of discount. <br />
			Leave blank for free shipping.) 
        </td>

		<td><input type="text" name="couponamount" size="10" value="<?php echo $coupondata[2];?>">
		</td>
    </tr>
    
     <tr>
		<td class="form_label"><strong>Part Number(s):</strong> <br>
			(Leave blank to apply to entire cart. <br />Separate ID numbers with commas.)</td>
		<td>
        	<input type="text" name="partnumber" size="25" value="<?php echo $coupondata[6]; ?>">
		</td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Quantity of Coupons Available:</strong><br />
		(leave blank for unlimited)</td>
		<td><input type="text" name="couponquantity" size="10" value="<?php echo $coupondata[5]; ?>">
		</td>
    </tr>

	<tr>
		<td class="form_label"><strong>Minimum Order:</strong> <span style="color:red">*</span></td>

		<td><input type="text" name="couponminimum" size="10" value="<?php echo $coupondata[3];?>">

		</td></tr>

	<!-- year -->
	<tr>
		<td class="form_label"><strong>Expire Year:</strong></td>
        <td><select size='1' name='couponyear'>

		<?php

			$saved_year = substr($coupondata[4],0,4);  // year
			$saved_month = substr($coupondata[4],4,2); // month
			$saved_day = substr($coupondata[4],6,2); // day
		
			$start = date("Y");

			for ($x = $start; $x < $start + 11; $x++){ ?>

				<option value='<?php echo $x; ?>' <?php if ($x == $saved_year){echo ' selected'; } ?>><?php echo $x; ?></option>

				<?php } ?></select>
		</td>
    </tr>

	<!-- month -->
	<tr>
		<td class="form_label"><strong>Expire Month:</strong></td>      
        <td>
        	<select size='1' name='couponmonth'>
            
            <option value='01' <?php if ($saved_month == '01'){echo ' selected';} ?>>1</option>
            <option value='02' <?php if ($saved_month == '02'){echo ' selected';} ?>>2</option>
            <option value='03' <?php if ($saved_month == '03'){echo ' selected';} ?>>3</option>
            <option value='04' <?php if ($saved_month == '04'){echo ' selected';} ?>>4</option>
            <option value='05' <?php if ($saved_month == '05'){echo ' selected';} ?>>5</option>
            <option value='06' <?php if ($saved_month == '06'){echo ' selected';} ?>>6</option>
            <option value='07' <?php if ($saved_month == '07'){echo ' selected';} ?>>7</option>
            <option value='08' <?php if ($saved_month == '08'){echo ' selected';} ?>>8</option>
            <option value='09' <?php if ($saved_month == '09'){echo ' selected';} ?>>9</option>
            <option value='10' <?php if ($saved_month == '10'){echo ' selected';} ?>>10</option>
            <option value='11' <?php if ($saved_month == '11'){echo ' selected';} ?>>11</option>
            <option value='12' <?php if ($saved_month == '12'){echo ' selected';} ?>>12</option>
            </select>
        </td></tr>

	<tr>
		<td class="form_label"><strong>Expire Day:</strong></td>
        <td>
        	<select size='1' name='couponday'>
            
            <option value='01' <?php if ($saved_day == '01'){echo ' selected';} ?>>1</option>
            <option value='02' <?php if ($saved_day == '02'){echo ' selected';} ?>>2</option>
            <option value='03' <?php if ($saved_day == '03'){echo ' selected';} ?>>3</option>
            <option value='04' <?php if ($saved_day == '04'){echo ' selected';} ?>>4</option>
            <option value='05' <?php if ($saved_day == '05'){echo ' selected';} ?>>5</option>
            <option value='06' <?php if ($saved_day == '06'){echo ' selected';} ?>>6</option>
            <option value='07' <?php if ($saved_day == '07'){echo ' selected';} ?>>7</option>
            <option value='08' <?php if ($saved_day == '08'){echo ' selected';} ?>>8</option>
            <option value='09' <?php if ($saved_day == '09'){echo ' selected';} ?>>9</option>
            <option value='10' <?php if ($saved_day == '10'){echo ' selected';} ?>>10</option>
            <option value='11' <?php if ($saved_day == '11'){echo ' selected';} ?>>11</option>
            <option value='12' <?php if ($saved_day == '12'){echo ' selected';} ?>>12</option>
            <option value='13' <?php if ($saved_day == '13'){echo ' selected';} ?>>13</option>
            <option value='14' <?php if ($saved_day == '14'){echo ' selected';} ?>>14</option>
            <option value='15' <?php if ($saved_day == '15'){echo ' selected';} ?>>15</option>
            <option value='16' <?php if ($saved_day == '16'){echo ' selected';} ?>>16</option>
            <option value='17' <?php if ($saved_day == '17'){echo ' selected';} ?>>17</option>
            <option value='18' <?php if ($saved_day == '18'){echo ' selected';} ?>>18</option>
            <option value='19' <?php if ($saved_day == '19'){echo ' selected';} ?>>19</option>
            <option value='20' <?php if ($saved_day == '20'){echo ' selected';} ?>>20</option>
            <option value='21' <?php if ($saved_day == '21'){echo ' selected';} ?>>21</option>
            <option value='22' <?php if ($saved_day == '22'){echo ' selected';} ?>>22</option>
            <option value='23' <?php if ($saved_day == '23'){echo ' selected';} ?>>23</option>
            <option value='24' <?php if ($saved_day == '24'){echo ' selected';} ?>>24</option>
            <option value='25' <?php if ($saved_day == '25'){echo ' selected';} ?>>25</option>
            <option value='26' <?php if ($saved_day == '26'){echo ' selected';} ?>>26</option>
            <option value='27' <?php if ($saved_day == '27'){echo ' selected';} ?>>27</option>
            <option value='28' <?php if ($saved_day == '28'){echo ' selected';} ?>>28</option>
            <option value='29' <?php if ($saved_day == '29'){echo ' selected';} ?>>29</option>
            <option value='30' <?php if ($saved_day == '30'){echo ' selected';} ?>>30</option>
            <option value='31' <?php if ($saved_day == '31'){echo ' selected';} ?>>31</option>
           	
            </select>
        </td>
    </tr>

	<tr>
		<td align="center" colspan="2"><input type='submit' class="body_text" name='edit_coupon' value='Save the coupon'><br><span style="color:red">(Items with * are required)</span>
		</td>
	</tr>
</table>
</form>