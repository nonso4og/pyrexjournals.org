<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                          # ||

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

$error = array();

if (!is_writable("coupon_1.php")) echo "Coupon_1.php is not writable.  No updates will happen.<br>\n";

if ($_REQUEST["action"] == "delete" and $_REQUEST['id'] != ''){

	if (is_writable("coupon_1.php")){
		require("coupon_1.php");
		$coupons = explode(";",$couponarray);
		$couponarray = "";
		$x = 0;

		foreach ($coupons as $coupon){
			if($_REQUEST["id"] != $x){
				$coupondata = explode(":",$coupon);

				if ($couponarray != "")
					$couponarray .= ";";

				$couponarray .= $coupondata["0"].":".$coupondata["1"].":".$coupondata["2"].":".$coupondata["3"].":".$coupondata["4"].":".$coupondata["5"].":".$coupondata["6"];

			}
			$x++;
		}

		$filePointer = fopen("coupon_1.php", "w");
		fwrite($filePointer, "<?php \$couponarray=\"".$couponarray."\"; ?>");
		fclose($filePointer);

		$msg =  '<b>Coupon deleted</b>';
	} // end if writeable
} // end delete coupon

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
    
<p align="center" class="page_title"><b>Show All Coupons</b></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
	
?>

<table border="1" width="95%" align="center" cellspacing="1" cellpadding="3">

	<tr>
		<td align="center" class="form_label"><strong>Coupon <br />Code</strong></td>
        <td align="center" class="form_label"><strong>Type</strong></td>
        <td align="center" class="form_label"><strong>Amount</strong></td>
        <td align="center" class="form_label"><strong>ID</strong></td>
        <td align="center" class="form_label"><strong>Minimum</strong></td>
        <td align="center" class="form_label"> <strong>Qty</strong> </td>
        <td align="center" class="form_label"><strong>Expire <br />Year</strong></td>
        <td align="center" class="form_label"><strong>Expire <br />Month</strong></td>
        <td align="center" class="form_label"><strong>Expire <br />Day</strong></td>
        <td align="center" class="form_label"><strong>Action</strong></td>
	</tr>

<?

if ($couponarray != ""){

	$coupons = explode(";",$couponarray); 

	$x = 0;

	foreach ($coupons as $coupon){

		$coupondata = explode(":",$coupon);

		echo '<tr>';
		echo '<td class="body_text">'.$coupondata[0].'</td>'; // coupon code
		echo '<td align="center" class="body_text">'.$coupondata[1].'</td>'; // coupon type
		
		// amount
		echo '<td align="center" class="body_text">';
			if ($coupondata[1] == 'Free Shipping'){
				echo ' n/a ';
			}
			else {
				echo $coupondata[2];
			}
		echo "</td>"; 
		
		echo '<td align="center" class="body_text">';
			if (!empty($coupondata[6])){
				echo 'Yes';
			}
			else {
				echo 'No';
			}
		echo '</td>';
		// minimum
		if ($coupondata[3] == ''){
			echo '<td align="center">&nbsp;</td>';
		}
		else {
			echo '<td align="center" class="body_text">'.$coupondata[3].'</td>';
		}
		
		// quantity
		echo '<td align="center" class="body_text">';
		
		if ($coupondata[5] == ''){
			echo 'unlimited';
		}
		else {
			echo $coupondata[5];
		}
		
		echo "</td>"; 
		
		// expiration date
		echo '<td align="center" class="body_text">'.substr($coupondata[4],0,4).'</td>'; // year
		echo '<td align="center" class="body_text">'.substr($coupondata[4],4,2).'</td>'; // month
		echo '<td align="center" class="body_text">'.substr($coupondata[4],6,2).'</td>'; // day
		
		// show edit and delete icons
		echo '<td align="center"><a href="coupons.php?option=3&id='.$x.'" ><img src="images/edit.png" title="edit" border="0" width="16px" height="16px"></a> <a href="coupons.php?option=1&action=delete&id='.$x.'"  onclick="return confirm(\'Warning! Are you sure you want to delete this coupon?\')" ><img src="images/delete.png" title="delete" border="0" width="16px" height="16px"></a></td></tr>';
		
		$x++;

	}
}
else {
	echo '<tr><td colspan="9" align="center" class="body_text">No Coupons Found</td></tr>';
}

?>

</table>