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

include ("countries_1.php");

$msg = '';
$error = array();
$errormsg = '';

if (!is_writable("countries_1.php")) echo "countries_1.php is not writable.  No updates will happen.<br>\n";


if (isset($_POST["submit"])) {

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	$content  = "<?php\n";

	$y = 1;

	for($x = 1; $x <= sizeof($countries)+1; $x++){
		if ($x == $_REQUEST["pos"]){

			$content .= "\$countries[$x] = array($x,\"".stripslashes($_POST["countryname"])."\",\"".$_POST["countryabbrev2"]."\",\"".$_POST['taxrate1']."\",\"".$_POST['taxrate2']."\",\"".$_POST["countryabbrev3"]."\",\"".$_POST["countrynumber"]."\");\n";
		}
		else{
			$content .= "\$countries[$x] = array($x,\"".$countries[$y][COUNTRYNAME]."\",\"".$countries[$y][COUNTRYABBREV2]."\",\"".$countries[$y][TAXID1]."\",\"".$countries[$y][TAXID2]."\",\"".$countries[$y][COUNTRYABBREV3]."\",\"".$countries[$y][COUNTRYNUMBER]."\");\n";

			$y++;
		}
	}

	$content .= "?>";
	
	// save countries file
	$filePointer = fopen("countries_1.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);

	$msg = '<b>Your New has been Added</b>';
		
} // end if submit

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

<p align="center" class="page_title"><b>Add New Country</b></p>

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

<form action="settings.php?option=18" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />


<table align="center" border='0' cellpadding='0' cellspacing='8' width='80%'>
	<tr>
		<td width='65%' class="form_label"><strong>Insert At ID:</strong> <span style="color:red">*</span></td>
 
 		<td width="35">
        	<select name="pos">

			<?php
				for ($x = 1; $x <= sizeof($countries)+1; $x++){
					echo "<option value=\"".$x."\">$x</option>\n";
				}
			?>

			</select>
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Country Name:</strong> <span style="color:red">*</span></td>
        <td> 
            <input type="text" name="countryname">
        </td>
   </tr>
   
   <tr>
		<td class="form_label"><strong>Country 2-digit Abbrevation:</strong> <span style="color:red">*</span></td>
        <td>
    		<input size="3" type="text" name="countryabbrev2">
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Country 3-digit Abbrevation:</strong> <span style="color:red">*</span></td>
        <td>
    		<input size="3" type="text" name="countryabbrev3">
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Country 3-digit Code:</strong> <span style="color:red">*</span></td>
        <td>
    		<input size="3" type="text" name="countrynumber">
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Taxrate 1:</strong><br>
		(For 7.5%, enter 7.5)</td>
        <td>
    		<input size="3" type="text" name="taxrate1">
        </td>
    </tr>
    
    <tr>
		<td class="form_label"><strong>Taxrate 2:</strong><br>
		    (For 7.5%, enter 7.5)</td>
        <td>
    		<input size="3" type="text" name="taxrate2">
        </td>
    </tr>
    
    <tr>
		<td align="center" colspan="2">
		    <p>
		        <input type='submit' class="body_text" name='submit' value='Add new Country'>
		        <br>
		        <span style="color:red">(Items with * are required)</span>        
		    </p>
		</td>
	</tr>

</table>
</form>

<p align="center"><b>Note:</b></p>
<table border="1" width="75%" cellpadding="5" cellspacing="0" align="center">
<tr>
    <td>
<p><strong>Country 3-digit Codes:</strong> One excellent resource for generally accepted 3-digit country codes is: <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-3" >http://en.wikipedia.org/wiki/ISO_3166-1_alpha-3</a></p>
</td></tr>
</table>