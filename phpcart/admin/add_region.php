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

include ("regions_1.php");

$msg = '';
$error = array();
$errormsg = '';

if (!is_writable("regions_1.php")) echo "regions_1.php is not writable.  No updates will happen.<br>\n";


if (isset($_POST["submit"])) {

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	$content  = "<?php\n";

	$y = 1;

	for($x = 1; $x <= sizeof($regions)+1; $x++){
		if ($x == $_REQUEST["pos"]){
			$content .= "\$regions[$x] = array($x,\"".$_POST["statename"]."\",\"".$_POST["stateabbr"]."\",\"".$_POST['taxrate1']."\",\"".$_POST['taxrate2']."\");\n";
		}
		else{
			$content .= "\$regions[$x] = array($x,\"".$regions[$y][STATENAME]."\",\"".$regions[$y][STATEABBREV]."\",\"".$regions[$y][TAXID1]."\",\"".$regions[$y][TAXID2]."\");\n";

			$y++;
		}
	}
		
	$content .= "?>";
	$filePointer = fopen("regions_1.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);

		$msg = '<b>Your New State/Region has been Added</b>';
		
} // end if submit

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

<p align="center" class="page_title"><b>Add New State/Region</b></p>

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

<form action="settings.php?option=17" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />


<table align="center" border='0' cellpadding='0' cellspacing='8' width='80%'>
	<tr>
		<td width='65%' class="form_label"><strong>Insert At ID:</strong> <span style="color:red">*</span></td>
 
 		<td width="35">
        	<select name="pos">

			<?php
            for ($x = 1; $x <= sizeof($regions)+1; $x++){
                echo "<option value=\"".$x."\">$x</option>\n";
            }
            ?>

			</select>
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>State/Region Name:</strong> <span style="color:red">*</span></td>
        <td> 
            <input type="text" name="statename">
        </td>
   </tr>
   
   <tr>
		<td class="form_label"><strong>State/Region Abbrevation:</strong> <span style="color:red">*</span></td>
        <td>
    		<input size="3" type="text" name="stateabbr">
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Taxrate 1:</strong><br>(7 = 7%)</td>
        <td>
    		<input size="3" type="text" name="taxrate1">
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Taxrate 2:</strong><br>(7 = 7%)</td>
        <td>
    		<input size="3" type="text" name="taxrate2">
        </td>
    </tr>
    
    <tr>
		<td align="center" colspan="2"><input type='submit' class="body_text" name='submit' value='Add new State/Region'><br><span style="color:red">(Items with * are required)</span>        
		</td>
	</tr>

</table>
</form>