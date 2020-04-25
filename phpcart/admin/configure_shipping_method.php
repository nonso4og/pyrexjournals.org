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
require ("shipping_method_1.php");
require ("configuration_1.php");

if (!is_writable("shipping_1.php")) echo "The file: admin/shipping_1.php is not writable.  No updates will happen.<br>\n";

$zoneid = $_REQUEST['zoneid'];
$zonename = $shipping[$zoneid][1];

$typeid = $_REQUEST['typeid'];
switch ($typeid) {
	Case '3';
		// type 3 - currency discount
		$typename = "Currency";
		$symbol = $config["Currency"];
		break;
	Case '4';
		// type 4 - percent discount
		$typename = "Percent";
		$symbol = '%';
		break;
	Case '5';
		// type 5 - order quantity
		$typename = "Order Quantity";
		break;
	Case '6';
		// type 6 - weight
		$typename = "Order Weight";
		break;
}


// get configuration of currency format
$Num_Decimal = $config["Num_Decimal"];
$Decimal_Char = $config["Decimal_Char"];
$Thousands_Sep = $config["Thousands_Sep"];
		
// SUBMIT FORM
if (isset($_POST["save_method"])) {

	// check token inside of each form
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	$zoneid = $_POST['zoneid'];
	$typeid =  $_POST['typeid'];
	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];
	$name3 = $_POST['name3'];
	$name4 = $_POST['name4'];
	
	// validate shipping_method
	if (!is_numeric($_POST['zoneid'])){
		echo "Invalid data!!";
		exit;
	}
	
	// validate shipping_method
	if (!is_numeric($_POST['typeid'])){
		echo "Invalid data!!";
		exit;
	}
	
	// get all rows
	if ($typeid == '5'){
		$count = 2;
	}
	elseif ($typeid == '3' || $typeid == '4' || $typeid == '6') {
		$count = 10;
	}
	

	$content  = "<?php\n";
	$content .= "//shipping methods arrays - DO NOT EDIT BY HAND\n";



	// loop on each row
	for ($x = 1; $x <= $count; $x += 1){
			
		if ($_POST['zone_min'.$x]  != ''){
			$zone_min = $_POST['zone_min'.$x];			
		}
		else {
			$zone_min = ${'shipping_method'.$zoneid}[$x][0];
		}
		
		
		if ($_POST['zone_max'.$x]  != ''){
			$zone_max = $_POST['zone_max'.$x];
		}
		else {
			$zone_max = ${'shipping_method'.$zoneid}[$x][1];
		}
		
		if ($_POST['price1:'.$x]  != ''){
			$shipping_price1 = $_POST['price1:'.$x];
			
			if ($x == 1 AND $name1 == '' AND $typeid != '6'){
				$error[] = 'You must input a Method 1 Name before pressing the save button';
			}
		}
		else {
			$shipping_price1 = '';
			// for all types 2,3,4,5,6 - they must have a price so make name blank too
			if ($typeid != '7'){
				$name1 = '';
			}
		}
		
		if ($_POST['price2:'.$x]  != ''){
			$shipping_price2 = $_POST['price2:'.$x];
			
			if ($x == 1 AND $name2 == '' AND $typeid != '6'){
				$error[] = 'You must input a Method 2 Name before pressing the save button';
			}
		}
		else {
			$shipping_price2 = '';
			if ($typeid != '7'){
				$name2 = '';
			}
		}
		
		if ($_POST['price3:'.$x]  != ''){
			$shipping_price3 = $_POST['price3:'.$x];
			
			if ($x == 1 AND $name3 == '' AND $typeid != '6'){
				$error[] = 'You must input a Method 3 Name before pressing the save button';
			}
		}
		else {
			$shipping_price3 = '';
			if ($typeid != '7'){
				$name3 = '';
			}
		}
		
		if ($_POST['price4:'.$x]  != ''){
			$shipping_price4 = $_POST['price4:'.$x];
			
			if ($x == 1 AND $name4 == ''){
				$error[] = 'You must input a Method 4 Name before pressing the save button';
			}
		}
		else {
			$shipping_price4 = '';
			if ($typeid != '7'){
				$name4 = '';
			}
		}
		
		if (count($error) == 0){
			
			if (isset($shipping_method_name[$zoneid])){
				$z = count($shipping_method_name);
			}
			else {
				$z = count($shipping_method_name) + 1;
			}
		
			// if first row, create/update name array and preserve any others already in array
			if ($x == 1){
			
				for ($y = 1; $y <= $z; $y++){
					if ($y == $zoneid){
						$content .= "\$shipping_method_name[$zoneid] = array(\"".$name1."\", \"".$name2."\", \"".$name3."\", \"".$name4."\");\n";
					}
					else {
						$content .= "\$shipping_method_name[$y] = array(\"".$shipping_method_name[$y][0]."\", \"".$shipping_method_name[$y][1]."\", \"".$shipping_method_name[$y][2]."\", \"".$shipping_method_name[$y][3]."\");\n";
					}
				}				
			} // end if first row
			
			for ($y = 1; $y <= $z; $y++){
				if ($y == $zoneid){
				
					if ($_POST['price1:'.$x] != ''){
						$content .= "\$shipping_method".$zoneid."[$x] = array(\"".$zone_min."\",\"".$zone_max."\",\"".$_POST['price1:'.$x]."\",\"".$_POST['price2:'.$x]."\",\"".$_POST['price3:'.$x]."\",\"".$_POST['price4:'.$x]."\");\n";
					}
				}
				else {
					
					if (${'shipping_method'.$y}[$x] != ''){
						$content .= "\$shipping_method".$y."[$x] = array(\"".${'shipping_method'.$y}[$x][0]."\", \"".${'shipping_method'.$y}[$x][1]."\", \"".${'shipping_method'.$y}[$x][2]."\", \"".${'shipping_method'.$y}[$x][3]."\",\"".${'shipping_method'.$y}[$x][4]."\",\"".${'shipping_method'.$y}[$x][5]."\");\n";
						
					}	
				}
			}

		} // end if no errors
	} // end on loop each row						
						
	$content .= "?>";

	// save shipping file
	$filePointer = fopen("shipping_method_1.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);
	
	$msg = '<b>Your Shipping Zone has been Updated</b>';
	
	// clear shipping array and get modified file
	$shipping = array();
	include ("shipping_method_1.php");
	

} // end submit shipping method



// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

// create page variables
$name1 = $shipping_method_name[$zoneid][0];
$name2 = $shipping_method_name[$zoneid][1];
$name3 = $shipping_method_name[$zoneid][2];
$name4 = $shipping_method_name[$zoneid][3];

// create 10 row matrix to capture ranges
if ($typeid == '5'){
	$count = 2;
}
elseif ($typeid == '3' || $typeid == '4' ||  $typeid == '6') {
	$count = 10;
}

for ($x = 1; $x <= $count; $x += 1){
	if (!empty($shipping_method1[$zoneid])){	
		${'zone_min'.$x} = ${'shipping_method'.$zoneid}[$x][0];
		${'zone_max'.$x} = ${'shipping_method'.$zoneid}[$x][1];
		${'price1:'.$x} = ${'shipping_method'.$zoneid}[$x][2];
		${'price2:'.$x} = ${'shipping_method'.$zoneid}[$x][3];
		${'price3:'.$x} = ${'shipping_method'.$zoneid}[$x][4];
		${'price4:'.$x} = ${'shipping_method'.$zoneid}[$x][5];
	}
}

?>
<p align="center" class="page_title"><strong>Configure Shipping Method</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg"><strong>'.$msg.'</strong></p>';
	}
	
?>

<form action="settings.php?option=24&zoneid=<?php echo $zoneid; ?>&typeid=<?php echo $typeid; ?>" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<input type="hidden" name="zoneid" value="<?php echo $zoneid; ?>" />
<input type="hidden" name="typeid" value="<?php echo $typeid; ?>">
        
 <table width="90%" border="1" cellspacing="0" cellpadding="5" align="center">
	<tr>
		<td valign="top"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="5" >
            <tr>
            	<td colspan="6" align="center" class="theader">
                	Order Subtotal - <?php echo $typename; ?> : Zone #<?php echo $zoneid.' - '.$zonename; ?>
                </td>
            </tr>
            <?php
			
            if ($typeid == '3' || $typeid == '4' || $typeid == '5' || $typeid == '6'){
					// shipping Method:
						// type 3 - currency discount 
						// type 4 - percent discount
						// type 5 - order quantity
						// type 6 - weight
						
					// header row
					echo '<tr>';
			
					if ($typeid == '3' || $typeid == '4' || $typeid == '6'){
						// display "Ranges"
						echo '<td colspan="2" align="center" class="theader">'.$title.'Ranges</td>';
					}
					elseif ($typeid == '5') {
						// blank - no header
						echo '<td colspan="2" align="center" class="theader">&nbsp;</td>';
					}
						
                    
					echo '<td align="center" class="theader">Method 1 Name</td>';
					echo '<td align="center" class="theader">Method 2 Name</td>';
					echo '<td align="center" class="theader">Method 3 Name</td>';
					echo '<td align="center" class="theader">Method 4 Name</td>';
                	echo '</tr>';	
					// end header row
					
					// input method names row
               		echo '<tr>';
					echo '<td colspan="2" align="center">&nbsp;</td>';
				
                    // name 1
					echo '<td align="center"><input type="text" name="name1" size="15" value="';
						if ($name1 != ''){echo $name1; } elseif ($_POST['name1'] != ''){echo $_POST['name1']; } 
					echo '" ></td>';
					
					// name 2
                    echo '<td align="center"><input type="text" name="name2" size="15" value="';
						if ($name2 != ''){echo $name2; } elseif ($_POST['name2'] != ''){echo $_POST['name2']; } 
					echo '" ></td>';
					
					// name 3
                    echo '<td align="center"><input type="text" name="name3" size="15" value="';
						if ($name3 != ''){echo $name3; } elseif ($_POST['name3'] != ''){echo $_POST['name3']; } 
					echo '" ></td>';
					
					// name 4
                    echo '<td align="center"><input type="text" name="name4" size="15" value="';
						if ($name4 != ''){echo $name4; } elseif ($_POST['name4'] != ''){echo $_POST['name4']; } 
					echo '" ></td>';
				
					echo '</tr>';
                
                 // end array titles	
				 if ($typeid == '5'){
						echo '<tr >';
						echo '<td align="center" colspan="2" class="theader">&nbsp;</td>';
						echo '<td align="center" class="theader">Price 1</td>';
                    	echo '<td align="center" class="theader">Price 2</td>';
                    	echo '<td align="center" class="theader">Price 3</td>';
                    	echo '<td align="center"class="theader">Price 4</td>';
						echo '</tr>';
                    }
                    elseif ($typeid == '3' || $typeid == '4' ||  $typeid == '6') {
						echo '<tr>';
                    	echo '<td align="center" class="theader">Minimum '.$symbol.'</td>';
						echo '<td align="center" class="theader">Maximum '.$symbol.'</td>';
						echo '<td align="center" class="theader">Price 1</td>';
                    	echo '<td align="center" class="theader">Price 2</td>';
                    	echo '<td align="center" class="theader">Price 3</td>';
                    	echo '<td align="center" class="theader">Price 4</td>';
						echo '</tr>';
                    }
					// end array titles
					
					// create 10 row matrix to capture ranges
					if ($typeid == '5'){
						$count = 2;
					}
					elseif ($typeid == '3' || $typeid == '4' ||  $typeid == '6') {
						$count = 10;
					}
	
					for ($x = 1; $x <= $count; $x += 1){
                 	echo '<tr>';
                 
				 	if ($typeid == '5' AND $x == '1'){
                 		echo '<td colspan="2">For the first product ordered, charge:</td>';
					}
					elseif ($typeid == '5' AND $x == '2'){
                 		echo '<td colspan="2">For the second and subsequent products ordered, charge:</td>';
					}
					else {
						?>
					<td align="center"> <input type="text" name="zone_min<?php echo $x; ?>" size="12" value="<?php if ($_POST['zone_min'.$x] != ''){echo number_format($_POST['zone_min'.$x],$Num_Decimal,$Decimal_Char,$Thousands_Sep); }elseif (${'zone_min'.$x} != ''){echo number_format(${'zone_min'.$x},$Num_Decimal,$Decimal_Char,$Thousands_Sep); }  ?>" ></td>
                    
                    
                    <td align="center"> <input type="text" name="zone_max<?php echo $x; ?>" size="12" value="<?php if ($_POST['zone_max'.$x] != ''){echo number_format($_POST['zone_max'.$x],$Num_Decimal,$Decimal_Char,$Thousands_Sep);} elseif (${'zone_max'.$x} != '') {echo number_format(${'zone_max'.$x},$Num_Decimal,$Decimal_Char,$Thousands_Sep); } ?>" ></td>
                    <?php
                    }
                    ?>
                    <td align="center"><?php echo $prefix; ?> <input type="text" name="price1:<?php echo $x; ?>" size="12" value="<?php if ($_POST['price1:'.$x] != ''){echo number_format($_POST['price1:'.$x],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif (${'price1:'.$x} != '') {echo number_format(${'price1:'.$x},$Num_Decimal,$Decimal_Char,$Thousands_Sep); } ?>" > <?php echo $suffix; ?></td>
                    
                    <td align="center"><?php echo $prefix; ?> <input type="text" name="price2:<?php echo $x; ?>" size="12" value="<?php if ($_POST['price2:'.$x] != ''){echo number_format($_POST['price2:'.$x],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif (${'price2:'.$x} != '') {echo number_format(${'price2:'.$x},$Num_Decimal,$Decimal_Char,$Thousands_Sep); } ?>" > <?php echo $suffix; ?></td>
                    
                    <td align="center"><?php echo $prefix; ?> <input type="text" name="price3:<?php echo $x; ?>" size="12" value="<?php if ($_POST['price3:'.$x] != ''){echo number_format($_POST['price3:'.$x],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif (${'price3:'.$x} != ''){echo number_format(${'price3:'.$x},$Num_Decimal,$Decimal_Char,$Thousands_Sep); }  ?>" > <?php echo $suffix; ?></td>
                    
                    <td align="center"><?php echo $prefix; ?> <input type="text" name="price4:<?php echo $x; ?>" size="12" value="<?php if ($_POST['price4:'.$x] != ''){echo number_format($_POST['price4:'.$x],$Num_Decimal,$Decimal_Char,$Thousands_Sep); } elseif (${'price4:'.$x} != '') {echo number_format(${'price4:'.$x},$Num_Decimal,$Decimal_Char,$Thousands_Sep); } ?>" > <?php echo $suffix; ?></td>
				</tr>
                
                <?php 
				} // end for loop to create matrix							
				?>
                
				<tr>
                	<td colspan="6" align="center">
                    	<p align="center"><input type="submit" name="save_method" value="Save Shipping Method" ></p> 
							
                    </td>
                </tr>
                
                <?php					
				} // end if type 3, 4, 5, 6
                
				
				// PRODUCT DEFINED - TYPE 7
				if ($typeid == '7'){
					// create header row
				?>
					
					<tr>
						<th align="center">Method 1 Name</th>
						<th align="center">Method 2 Name</th>
						<th align="center">Method 3 Name</th>
						<th align="center">Method 4 Name</th>
					<tr>
					
                    <tr>
                    <td align="center"><input type="text" name="name1" size="15" value="<?php if ($name1 != ''){echo $name1; } elseif ($_POST['name1'] != ''){echo $_POST['name1']; } ?>" ></td>
                    <td align="center"><input type="text" name="name2" size="15" value="<?php if ($name2 != ''){echo $name2; } elseif ($_POST['name2'] != ''){echo $_POST['name2']; } ?>" ></td>
                    <td align="center"><input type="text" name="name3" size="15" value="<?php if ($name3 != ''){echo $name3; } elseif ($_POST['name3'] != ''){echo $_POST['name3']; } ?>" ></td>
                    <td align="center"><input type="text" name="name4" size="15" value="<?php if ($name4 != ''){echo $name4; } elseif ($_POST['name4'] != ''){echo $_POST['name4']; } ?>" ></td>
					</tr>
                    
                    <tr>
                	<td colspan="4" align="center">
                    	<p align="center"><input type="submit" name="save_method" value="Save Shipping Method" ></p> 						
                    </td>
                </tr>
                </table>
                 <?php
				}
            	?>
       
        </td>
    </tr>
</table>
</form>