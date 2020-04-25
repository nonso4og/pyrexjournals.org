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


// add coupon
if ($_REQUEST["submit"]) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("coupon_1.php")){
			
		//$couponarray="coupon code:type:amount:minimum:YYYYMMDD:quantity:extra;"next entry";
		//$couponarray="coupon1:$:15:5:20060101:25:";
		// coupons separated by semi-colon

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
			$_REQUEST["couponamount"] = number_format($_REQUEST["couponamount"], $config['Num_Decimal'], ".", '');
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
		
		// check if coupon code is already being used
		$coupons = explode(";",$couponarray);
		$x = 0;
	
		foreach ($coupons as $coupon){
			// get each coupon record
			$coupondata = explode(":",$coupon);

			if ($_REQUEST["couponcode"] == $coupondata[0]){
				$error[] = 'Your submitted coupon code is already in use';
				break;
			}
	} // end foreach loop

		
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
			
			if ($couponarray != ''){
				$couponarray .= ";";
			}

			$couponarray .= strtolower(trim($_REQUEST["couponcode"])).":".$_REQUEST["coupontype"].":".trim($_REQUEST["couponamount"]).":".trim($_REQUEST["couponminimum"]).":".$_REQUEST["couponyear"].$_REQUEST["couponmonth"].$_REQUEST["couponday"].":".$_REQUEST["couponquantity"].":".$_REQUEST['partnumber'];

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
} // end add coupon

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

<p align="center" class="page_title"><b>Add New Coupon</b></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}

	if ($errormsg != ''){
		echo '<p align="center" class="error">'.$errormsg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action='coupons.php?option=2' method='post'>
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table align="center" border='0' cellpadding='0' cellspacing='8' width='80%'>
	<tr>
		<td width='65%' class="form_label"><strong>Coupon Code:</strong> <span style="color:red">*</span></td>
        <td width='35%'><input type="text" name="couponcode" size="20" value="<?php echo $_POST['couponcode']; ?>" ></td>
    </tr>
    
	<tr>
		<td class="form_label"><strong>Type:</strong> <span style="color:red">*</span></td>
        <td>
        	<select size='1' name='coupontype'>
            	<option value='$' <?php if ($_POST['coupontype'] == '$'){echo ' selected';} ?>><?php echo $currency; ?> Discount</option>
                <option value='%' <?php if ($_POST['coupontype'] == '%'){echo ' selected';} ?>>% Discount</option>
                <option value='Shipping' <?php if ($_POST['coupontype'] == 'Shipping'){echo ' selected';} ?>>Shipping</option>
                <option value='Free Shipping' <?php if ($_POST['coupontype'] == 'Free Shipping'){echo ' selected';} ?>>Free Shipping</option>
            </select>
        </td>
    </tr>

	<tr>
		<td class="form_label"><strong>Amount:</strong> <span style="color:red">*</span><br>
			(Amount of discount. <br />
			Leave blank for free shipping.)</td>
		<td>
        	<input type="text" name="couponamount" size="10" value="<?php echo $_REQUEST['couponamount']; ?>">
		</td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Part Number(s):</strong> <br>
			(Leave blank to apply to entire cart. <br />Separate ID numbers with commas.)</td>
		<td>
        	<input type="text" name="partnumber" size="25" value="<?php echo $_REQUEST['partnumber']; ?>">
		</td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Quantity of Coupons Available:</strong><br />
		(leave blank for unlimited)</td>
		<td><input type="text" name="couponquantity" size="10" value="<?php echo $_POST['couponquantity']; ?>">
		</td>
    </tr>

	<tr>
		<td class="form_label"><strong>Minimum Order:</strong> <span style="color:red">*</span></td>

		<td><input type="text" name="couponminimum" size="10" value="<?php echo $_REQUEST['couponminimum']; ?>">

		</td></tr>

	<tr>
		<td class="form_label"><strong>Expire Year:</strong></td>
        <td>
        	<select size='1' name='couponyear'>

			<?php
				$start = date("Y");
				for ($x = $start; $x < $start + 11; $x++){ ?>
					<option value='<?php echo $x; ?>' <?php if ($_POST['couponyear'] == $x){echo ' selected'; } ?>><?php echo $x; ?></option>
				<?php } ?>
                
            </select>
        </td>
	</tr>


	<tr>
		<td class="form_label"><strong>Expire Month:</strong></td>
        <td>
        	<select size='1' name='couponmonth'>
            <option value='01' <?php if ($_POST['couponmonth'] == '01'){echo ' selected';} ?>>1</option>
            <option value='02' <?php if ($_POST['couponmonth'] == '02'){echo ' selected';} ?>>2</option>
            <option value='03' <?php if ($_POST['couponmonth'] == '03'){echo ' selected';} ?>>3</option>
            <option value='04' <?php if ($_POST['couponmonth'] == '04'){echo ' selected';} ?>>4</option>
            <option value='05' <?php if ($_POST['couponmonth'] == '05'){echo ' selected';} ?>>5</option>
            <option value='06' <?php if ($_POST['couponmonth'] == '06'){echo ' selected';} ?>>6</option>
            <option value='07' <?php if ($_POST['couponmonth'] == '07'){echo ' selected';} ?>>7</option>
            <option value='08' <?php if ($_POST['couponmonth'] == '08'){echo ' selected';} ?>>8</option>
            <option value='09' <?php if ($_POST['couponmonth'] == '09'){echo ' selected';} ?>>9</option>
            <option value='10' <?php if ($_POST['couponmonth'] == '10'){echo ' selected';} ?>>10</option>
            <option value='11' <?php if ($_POST['couponmonth'] == '11'){echo ' selected';} ?>>11</option>
            <option value='12' <?php if ($_POST['couponmonth'] == '12'){echo ' selected';} ?>>12</option>
            </select>
        </td>
    </tr>

	<tr>
		<td class="form_label"><strong>Expire Day:</strong></td>
        <td>
        	<select size='1' name='couponday'>
            <option value='01' <?php if ($_POST['couponday'] == '01'){echo ' selected';} ?>>1</option>
            <option value='02' <?php if ($_POST['couponday'] == '02'){echo ' selected';} ?>>2</option>
            <option value='03' <?php if ($_POST['couponday'] == '03'){echo ' selected';} ?>>3</option>
            <option value='04' <?php if ($_POST['couponday'] == '04'){echo ' selected';} ?>>4</option>
            <option value='05' <?php if ($_POST['couponday'] == '05'){echo ' selected';} ?>>5</option>
            <option value='06' <?php if ($_POST['couponday'] == '06'){echo ' selected';} ?>>6</option>
            <option value='07' <?php if ($_POST['couponday'] == '07'){echo ' selected';} ?>>7</option>
            <option value='08' <?php if ($_POST['couponday'] == '08'){echo ' selected';} ?>>8</option>
            <option value='09' <?php if ($_POST['couponday'] == '09'){echo ' selected';} ?>>9</option>
            <option value='10' <?php if ($_POST['couponday'] == '10'){echo ' selected';} ?>>10</option>
            <option value='11' <?php if ($_POST['couponday'] == '11'){echo ' selected';} ?>>11</option>
            <option value='12' <?php if ($_POST['couponday'] == '12'){echo ' selected';} ?>>12</option>
            <option value='13' <?php if ($_POST['couponday'] == '13'){echo ' selected';} ?>>13</option>
            <option value='14' <?php if ($_POST['couponday'] == '14'){echo ' selected';} ?>>14</option>
            <option value='15' <?php if ($_POST['couponday'] == '15'){echo ' selected';} ?>>15</option>
            <option value='16' <?php if ($_POST['couponday'] == '16'){echo ' selected';} ?>>16</option>
            <option value='17' <?php if ($_POST['couponday'] == '17'){echo ' selected';} ?>>17</option>
            <option value='18' <?php if ($_POST['couponday'] == '18'){echo ' selected';} ?>>18</option>
            <option value='19' <?php if ($_POST['couponday'] == '19'){echo ' selected';} ?>>19</option>
            <option value='20' <?php if ($_POST['couponday'] == '20'){echo ' selected';} ?>>20</option>
            <option value='21' <?php if ($_POST['couponday'] == '21'){echo ' selected';} ?>>21</option>
            <option value='22' <?php if ($_POST['couponday'] == '22'){echo ' selected';} ?>>22</option>
            <option value='23' <?php if ($_POST['couponday'] == '23'){echo ' selected';} ?>>23</option>
            <option value='24' <?php if ($_POST['couponday'] == '24'){echo ' selected';} ?>>24</option>
            <option value='25' <?php if ($_POST['couponday'] == '25'){echo ' selected';} ?>>25</option>
            <option value='26' <?php if ($_POST['couponday'] == '26'){echo ' selected';} ?>>26</option>
            <option value='27' <?php if ($_POST['couponday'] == '27'){echo ' selected';} ?>>27</option>
            <option value='28' <?php if ($_POST['couponday'] == '28'){echo ' selected';} ?>>28</option>
            <option value='29' <?php if ($_POST['couponday'] == '29'){echo ' selected';} ?>>29</option>
            <option value='30' <?php if ($_POST['couponday'] == '30'){echo ' selected';} ?>>30</option>
            <option value='31' <?php if ($_POST['couponday'] == '31'){echo ' selected';} ?>>31</option>
           	</select>
        </td>
    </tr>

	<tr>
		<td align="center" colspan="2"><input type='submit' class="body_text" name='submit' value='Save the coupon'><br><span style="color:red">(Items with * are required)</span>
        
		</td>
	</tr>

</table>
</form>