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

	// main currency array
require("currency_1.php");

	// currency array
	// 0 = currency name
	// 1 = currency code
	// 2 = currency display
	// 3 = primary?
	// 4 = conversion
	// 5 = PayPal Code

// get list of PayPal currencies and their definiton
include ("currency_2.php");

$error = array();
$msg = '';
$errormsg = '';

if (!is_writable("currency_1.php")) echo "<span style='color:red'>The admin directory file, currency_1.php is not writable.  No updates will happen.<br></span>\n";

// add new currency
if ($_REQUEST["submit"]) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("currency_1.php")){
			
		/// currency array
		// 0 = currency name (alpha)
		// 1 = currency code (alpha)
		// 2 = currency display (alpha)
		// 3 = primary (Y)
		// 4 = conversion (number)
		// 5 = PayPal Code (3 digit - ISO 4217 code)
		
		// currency elements separated by colon
		// currency entries separated by semi-colon

		if (empty($_REQUEST["currencyname"])){
			$error[] = 'You must include a Currency Name before pressing submit';
		}
		
		if (empty($_REQUEST["currencycode"])){
			$error[] = 'You must include a Currency Code before pressing submit';
		}
		
		if (empty($_REQUEST["currencydisplay"])){
			$error[] = 'You must include a Currency Display before pressing submit';
		}


		// if no errors, process array
		if (count($error) == 0){
			
			// if submitted input has primary set, remove from all others
			if ($_REQUEST["currencyprimary"] == 'Y' AND $currencyarray != ''){

				$currencys = explode(";",$currencyarray);
				$currencyarray = "";
				
				foreach ($currencys as $currency){
					
					$currencydata = explode(":",$currency);
					if ($currencyarray != "")
						$currencyarray .= ";";
		
						// reinsert array with blank for primary field [3]
						$currencyarray .= $currencydata["0"].":".$currencydata["1"].":".$currencydata["2"]."::".$currencydata["4"].":".$currencydata[5];
		
					} // end if
					$x++;
				} // end foreach loop
			// end primary reset
			
			if ($currencyarray != ""){
				$currencyarray .= ";";
			}

			$currencyarray .= trim($_REQUEST["currencyname"]).":".trim($_REQUEST["currencycode"]).":".trim($_REQUEST["currencydisplay"]).":".$_REQUEST["currencyprimary"].":".trim($_REQUEST["currencyconversion"]).":".$_REQUEST['ppcode'];

			$filePointer = fopen("currency_1.php", "w");

			fwrite($filePointer, "<?php \$currencyarray=\"".$currencyarray."\"; ?>");

			fclose($filePointer);

			$msg = "<b>Currency Added</b>";

		}

		else{
			
			if (count($error) == 1){
				$errormsg = "<b>Error:</br>";
			}
			elseif (count($error) > 1){
				$errormsg = "<b>Errors:</br>";
			}
			
			foreach ($error as $key => $value){
				$errormsg .= $value.'<br>';
			}
			
			$errormsg .= "</b>";
		}
	} // end if file writeable
} // end post add currency



// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

<p align="center" class="page_title"><b>Add New Currency</b></p>

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


<form action='settings.php?option=14' method='post' name="currencyform" id="currencyform">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border='0' cellpadding='0' cellspacing='8' width='85%' align="center">

	<!-- Currency Name -->
	<tr>
		<td width="55%" class="form_label">
        	<strong>Currency Name:</strong> <span style="color:red">*</span>
        </td>
        
        <td width="45%">
        	<input type="text" name="currencyname" size="20" value="<?php echo $_POST['currencyname']; ?>" >
        </td>
    </tr>
    
    
    <!-- Currency Code -->
	<tr>       
        <td width="55%" class="form_label">
        	<strong>Currency Code:</strong> <span style="color:red">*</span><br>
        	(used in product definition)
        </td>
        
        <td width="45%">
        	<input type="text" name="currencycode" size="20" value="<?php echo $_POST['currencycode']; ?>" >
        </td>
    </tr>


	<!-- Currency Display -->
	<tr>       
        <td width="55%" class="form_label">
        	<strong>Currency Display: </strong><span style="color:red">*</span>
        </td>
        
        <td width="45%">
        	<input type="text" name="currencydisplay" size="20" value="<?php echo $_POST['currencydisplay']; ?>" >
        </td>
    </tr>

	
    <!-- Primary -->
	<tr>       
        <td width="55%" class="form_label">
        	<strong>Primary Currency: </strong></td>
        
        <td width="45%">
        	<input type="checkbox" name="currencyprimary" value="Y" onchange="setPrimary();"<?php if ($_POST['currencyprimary'] == 'Y'){echo ' checked';} ?> >
        </td>
    </tr>
    
    
    <!-- Currency Conversion -->
	<tr>       
        <td width="55%" class="form_label">
        	<strong>Conversion Rate: </strong></td>
        
        <td width="45%">
        	<input type="text" name="currencyconversion" size="20" value="<?php echo $_POST['currencyconversion']; ?>">
        </td>
    </tr>
    
    <!-- PayPal Code -->
    <!-- https://cms.paypal.com/mx/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes -->
	<tr>       
        <td width="55%" class="form_label">
        	<strong>PayPal Code: </strong></td>
        
        <td width="45%">
        	<select name="ppcode">
            <option value='' selected>Select PayPal Code</option>
            <?php			
				//loop on each element in PayPal Currency array
				foreach ($ppcurrency as $key => $value){
					echo '<option value="'.$key.'"';
						if ($_POST['ppcode'] == $key){ echo ' selected'; }
					echo '>'.$value;
					echo '</option>';
				}
			?>
            </select>            
        </td>
    </tr>

	<tr>
		<td align="center" colspan="2"><input type='submit' class="body_text" name='submit' value='Save the currency'><br><span style="color:red">(Items with * are required)</span>
        
		</td>
	</tr>

</table>
</form>

<p align="center"><b>Note:</b></p>
<table border="1" width="75%" cellpadding="5" cellspacing="0" align="center">
<tr><td>
<p><strong>Conversion Rates:</strong> Leave conversion rate blank if you provide separate prices for each currency in your product defintion. Use the conversion rate when you provide a single price and a currency code in your product definiton. phpCart will do the conversion automatically for you.</p>
<p><strong>PayPal Code:</strong> Select the PayPal code to match your country in order to use the PayPal gateway.</p>
</td></tr>
</table>

<script language="JavaScript">
<!--
function setPrimary(){
	if (document.currencyform.currencyprimary.checked){
		document.currencyform.currencyconversion.disabled = true;
		//document.currencyform.currencyconversion.readOnly = true;
	}
	else {
		document.currencyform.currencyconversion.disabled = false;
	}
}
-->
</script>