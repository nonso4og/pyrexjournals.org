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

require ("shipping_1.php");

if (!is_writable("shipping_1.php")) echo "The file: admin/shipping_1.php is not writable.  No updates will happen.<br>\n";

function getZoneName($id){
	switch ($id){
		case '1':
			$zone_name = 'No Shipping';
			break;
		case '2':
			$zone_name = 'Free Shipping';
			break;
		case '3':
			$zone_name = 'Order Subtotal - Currency';
			break;
		case '4':
			$zone_name = 'Order Subtotal - Percent';
			break;
		case '5':
			$zone_name = 'Order Quantity';
			break;
		case '6':
			$zone_name = 'Order Weight';
			break;
		case '7':
			$zone_name = 'Product Defined';
			break;
			
	}
	return $zone_name;
}

// process delete request
if ($_GET['delete'] == 1 AND $_GET['zoneid'] != ''){
	
	if (is_writable("shipping_1.php")){
		
		$zone_id = $_GET['zoneid'];
		$zone_name = $shipping[$zone_id][1];
	
		$content  = "<?php\n";
		
		$y = 1;
	
		for($x = 1; $x <= sizeof($shipping); $x++){
			if ($x != $zone_id){
	
				$content .= "\$shipping[$y] = array($y,\"".$shipping[$x][1]."\",\"".$shipping[$x][2]."\",\"".$shipping[$x][3]."\",\"".$shipping[$x][4]."\",\"".$shipping[$x][5]."\",\"".$shipping[$x][6]."\",\"".$shipping[$x][7]."\",\"".$shipping[$x][8]."\",\"".$shipping[$x][9]."\",\"".$shipping[$x][10]."\",\"".$shipping[$x][11]."\");\n";
	
				$y++;
			}
		}
		
		$content .= "?>";
	
		// save shipping file
		$filePointer = fopen("shipping_1.php", "w");
		fwrite($filePointer, $content);
		fclose($filePointer);
		
		$msg = '<b>The shipping zone named, '.$zone_name.' has been deleted.</b>';
		
		// clear shipping array and get modified file
		$shipping = array();
		include ("shipping_1.php");	
		
	} // end if not writeable
} // end submit delete request


// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Current Shipping Zones</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg"><strong>'.$msg.'</strong></p>';
	}
	
?>

 <table width="85%" border="1" cellspacing="0" cellpadding="5" align="center">
        <tr>
          <td valign="top">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="5" >
            <tr>
                <td align="center" width="10%" class="theader">ID</td>
                <td align="left" width="40%" class="theader">Zone Name</td>
                <td align="left" width="40%" class="theader">Zone Type</td>
                <td align="center" width="10%" class="theader">Action</td>
            </tr>
            
            
            <?php
				// get zone info from array
				for($x = 1; $x <= sizeof($shipping); $x++){
					echo '<tr>';
					// zone id
					echo '<td align="center" width="10%" class="form_label">'.$shipping[$x][0].'</td>';
					// zone name
					echo '<td align="left" width="40%" class="form_label">'.$shipping[$x][1].'</td>';
					// zone type
					echo '<td align="left" width="40%" class="form_label">'.getZoneName($shipping[$x][2]).'</td>';
					
					// action (edit and delete) except no delete on ID 1 - Global Shipping Zone
					echo '<td align="center" width="10%"><a href="settings.php?option=22&zoneid='.$shipping[$x][0].'"><img src="images/edit.png" border="0"></a>';
					
						if ($shipping[$x][0] != 1){
							echo '&nbsp;&nbsp;<a href="settings.php?option=20&delete=1&zoneid='.$shipping[$x][0].'" onclick="return confirm(\'Warning! Are you sure you want to delete this shipping zone?\')" ><img src="images/delete.png" border="0"></a>';
						}
					echo '</td>';
					echo '</tr>';
				}
			
			?>
            </table>
        </td>
    </tr>
</table>