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

$error = '';
$msg = '';

if (!is_writable("currency_1.php")) echo "<span style='color:red'>The admin directory file, currency_1.php is not writable.  No updates will happen.<br></span>\n";

// delete currency
if ($_REQUEST["action"] == "delete"){

	if (is_writable("currency_1.php")){

		$currencys = explode(";",$currencyarray);
		
		if (count($currencys) > 1){
			$currencyarray = "";
			$x = 0;
	
			// delete currency by writing all non-deleted currencies back into array and then file
			foreach ($currencys as $currency){
				if($_REQUEST["id"] != $x){
					$currencydata = explode(":",$currency);
					if ($currencyarray != "")
						$currencyarray .= ";";
	
					$currencyarray .= $currencydata["0"].":".$currencydata["1"].":".$currencydata["2"].":".$currencydata["3"].":".$currencydata["4"].":".$currencydata["5"];
	
				}
				$x++;
			} // end foreach loop

			
			// now that delete is done, check to see if primary not set, make sure one is or set 1st one
				if ($_REQUEST["currencyprimary"] == ''){
					
					$currencys = explode(";",$currencyarray);
					$currencyarray1 = "";
					$primaryset = '';
					$x = 0;
					
					// make sure that one currency has primary set
					foreach ($currencys as $currency){
							$currencydata1 = explode(":",$currency);
					
							if ($currencydata1[3] == 'Y'){
								$primaryset = 1; // found a primary currency
								break;
							}$x++;
					}
					
					// if no primary currency found, set 1st one
					if ($primaryset == ''){
					
						$currencys = explode(";",$currencyarray);
						$currencyarray = "";
						$x = 0;
		
						foreach ($currencys as $currency){
							$currencydata = explode(":",$currency);
							if ($currencyarray != "")
									$currencyarray .= ";";
									
							if ($x == 0){
						
								$currencyarray .= $currencydata["0"].":".$currencydata["1"].":".$currencydata["2"].":Y:";
							}
							else {
						
								$currencyarray .= $currencydata["0"].":".$currencydata["1"].":".$currencydata["2"].":".$currencydata["3"].":".$currencydata["4"].":".$currencydata["5"];
							}
							$x++;
						} // end foreach
					} // end set 1st primary
			} // end if primary not set
	
			// write array to file
			$filePointer = fopen("currency_1.php", "w");
			fwrite($filePointer, "<?php \$currencyarray=\"".$currencyarray."\"; ?>");
			fclose($filePointer);
			
			$msg = "<b>Currency deleted</b>";
		} // end if currency array count < 1
		else {
			$error = "<b>You cannot delete the last currency. There must always be at least one currency.</b>";
		} 
	} // if writeable
} // end post delete currency 

require("currency_1.php");

?>

<p align="center" class="page_title"><b>Manage Currency</b></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
	if (count($error) != 0){
		echo '<p align="center" class="error">'.$error.'</p>';
	}
	
?>

<table border="1" width="95%" align="center" cellspacing="0" cellpadding="4">
	<tr>
        <td align="center" class="theader">Currency<br>Name</td>
        <td align="center" class="theader">Currency <br>Code</td>
        <td align="center" class="theader">Currency <br>Display</td>
        <td align="center" class="theader">Primary <br>Currency</td>
        <td align="center" class="theader">Conversion <br>Rate</td>
        <td align="center" class="theader">PayPal <br>Code</td>
        <td align="center" class="theader">Action</td>
	</tr>

<?php

if ($currencyarray != ""){

	$currencys = explode(";",$currencyarray); 

	$x = 0;

	foreach ($currencys as $currency){

		$currencydata = explode(":",$currency);

		echo '<tr>';
		echo '<td>'.$currencydata[0].'</td>'; // currency name
		echo '<td align="center">'.$currencydata[1].'</td>'; // currency code
		echo '<td align="center">'.$currencydata[2].'</td>'; // currency display
		
		// primary	
		if ($currencydata[3] == 'Y'){
			echo '<td align="center">Yes</td>';
		}
		else {
			echo '<td align="center">&nbsp;</td>';
		}
		
		// conversion		
		if ($currencydata[4] != ''){
			echo '<td align="center">'.$currencydata[4].'</td>';
		}
		else {
			echo '<td align="center">&nbsp;</td>';
		}
		
		// PP code
		echo '<td align="center">'.$currencydata[5].'&nbsp;</td>'; // currency code
		
		// display edit / delete icons
		echo '<td align="center"><a href="settings.php?option=15&action=edit&id='.$x.'" ><img src="images/edit.png" title="edit" border="0" width="16px" height="16px"></a> <a href="settings.php?option=13&action=delete&id='.$x.'"  onclick="return confirm(\'Warning! Are you sure you want to delete this currency?\')" ><img src="images/delete.png" title="delete" border="0" width="16px" height="16px"></a></td></tr>';
		
		$x++;
	}
}
else {
	echo '<tr><td colspan="7" align="center" class="form_label">No Currencies Found</td></tr>';
}

?>

</table>