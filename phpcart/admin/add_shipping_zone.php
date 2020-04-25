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
require ("shipping_1.php");

if (!is_writable("shipping_1.php")) echo "The file: admin/shipping_1.php is not writable.  No updates will happen.<br>\n";

if (isset($_REQUEST["submit"])) {

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
		
		if ($error == ''){
			
			$content  = "<?php\n";

			$y = 1;
		
			for($x = 1; $x <= sizeof($shipping)+1; $x++){
				if ($x == $_REQUEST["pos"]){
					
					/*
					Array: 
					0 - Zone ID #, 
					1 - Zone Name,
					2 -  Shipping Method ID, 
					3 - Zone Countries, 
					4 - Zone States, 
					5 - Zone Zip, 
					6 - Enable Pickup, 
					7 - Pickup Fee, 
					8 - Handling Fee, 
					9 - Handling Percent, 			
					10 - Min Fee, 				
					11 - Max Fee
					*/
		
					$content .= "\$shipping[$x] = array($x,\"".stripslashes($_POST["zone_name"])."\",\"".$_POST["shipping_method"]."\",\"\",\"\",\"\",\"\", \"0.00\",\"0.00\",\"0.00\",\"0.00\",\"0.00\");\n";
				}
				else{		
					$content .= "\$shipping[$x] = array($x,\"".$shipping[$y][1]."\",\"".$shipping[$y][2]."\",\"".$shipping[$y][3]."\",\"".$shipping[$y][4]."\",\"".$shipping[$y][5]."\",\"\",\"0.00\",\"0.00\",\"0.00\",\"0.00\",\"0.00\");\n";
					$y++;
				}
			}
		
			$content .= "?>";

			// save shipping file
			$filePointer = fopen("shipping_1.php", "w");
			fwrite($filePointer, $content);
			fclose($filePointer);
			
			$msg = '<b>Your New Shipping Zone has been Created</b>';
		} // end no errors
	} // end if writeable
} // end if submit

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

// create next element number in array
$pos = sizeof($shipping)+1
	
?>
<p align="center" class="page_title"><strong>Add Shipping Zone</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
	if ($error != ''){
		echo '<p align="center" class="error">'.$msg.'</p>';
	}
	
?>

<form action="settings.php?option=21" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<input type="hidden" name="pos" value="<?php echo $pos; ?>" />
        
          <table width="85%" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr>
              <td valign="top">
              
              	<table width="100%" border="0" cellspacing="0" cellpadding="5" >
				<tr>
                	<td align="center" colspan="2" class="theader">Shipping Zone</td>
				</tr>
                          
                <tr>
                	<td class="form_label">Name:&nbsp;&nbsp;
                    	<input type="text" name="zone_name" size="15" value="<?php if ($_POST['zone_name'] != ''){echo $_POST['zone_name'];} ?>" >
                    </td>
                </tr>
                
                <tr>
                	<td align="center" colspan="2" class="theader">Shipping Method</td>
				</tr>
                
                <tr>
                    	<td valign="top" class="form_label">
                        	<input type="radio" name="shipping_method" id="1" value="1" <?php if ($_POST['shipping_method'] != '2' AND $_POST['shipping_method'] != '3' AND $_POST['shipping_method'] != '4' AND $_POST['shipping_method'] != '5' AND  $_POST['shipping_method'] != '6'){echo ' checked';} ?>><label for="none">&nbsp;&nbsp;None</label><br><br>
                            
                            <input type="radio" name="shipping_method" id="fs" value="2" <?php if ($_POST['shipping_method'] == '2'){echo ' checked';} ?>><label for="fs">&nbsp;&nbsp;Free Shipping</label><br><br>
                            
                            <input type="radio" name="shipping_method" id="cs" value="3" <?php if ($_POST['shipping_method'] == '3'){echo ' checked';} ?>><label for="cs">&nbsp;&nbsp;Order Subtotal - Currency</label><br><br>
                            
                            <input type="radio" name="shipping_method" id="ps" value="4" <?php if ($_POST['shipping_method'] == '4'){echo ' checked';} ?>><label for="ps">&nbsp;&nbsp;Order Subtotal - Percent</label><br><br>
                            
                            <input type="radio" name="shipping_method" id="oq" value="5" <?php if ($_POST['shipping_method'] == '5'){echo ' checked';} ?>><label for="oq">&nbsp;&nbsp;Order Quantity</label><br><br>
                            
                            <input type="radio" name="shipping_method" id="ow" value="6" <?php if ($_POST['shipping_method'] == '6'){echo ' checked';} ?>><label for="ow">&nbsp;&nbsp;Order Weight</label><br><br>
                            
                          
                    </td> 
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