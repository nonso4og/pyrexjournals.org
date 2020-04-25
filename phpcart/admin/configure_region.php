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


include ("regions_1.php");
$msg = '';

if (!is_writable("regions_1.php")) echo "countries_1.php is not writable.  No updates will happen.<br>\n";

if ($_REQUEST["submit"] || $_REQUEST["op"] == "delete") {
	
	$content  = "<?php\n";


	if ($_REQUEST["op"] == "delete"){
		$y = 1;

		for($x = 1; $x <= sizeof($regions); $x++){
			if ($x != $_REQUEST["id"]){
				$content .= "\$regions[$y] = array($y,\"".$regions[$x][STATENAME]."\",\"".$regions[$x][STATEABBREV]."\",\"".$regions[$x][TAXID1]."\",\"".$regions[$x][TAXID2]."\");\n";
				$y++;
			}
		}
	}

	if ($_REQUEST["submit"] == "Save"){
		
		// check token
		if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
			echo "Invalid data!";
			exit;
		}
	
		$y = 0;

		for($x = 1; $x <= sizeof($_POST["statename"]); $x++){
			$content .= "\$regions[$x] = array($x,\"".$_POST["statename"][$y]."\",\"".$_POST["stateabbrev"][$y]."\",\"".$_POST["taxrate1"][$y]."\",\"".$_POST["taxrate2"][$y]."\");\n";
			$y++;
		}
	}
	
	$content .= "?>";
	
	// save regions file
	$filePointer = fopen("regions_1.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);

		$msg = '<b>Your States/Regions Tax Configuration has been Updated</b>';
		
} // end if submit

// include a second time in case submit updated file
include ("regions_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>States/Regions Tax Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=8" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border='1' cellpadding='4' cellspacing='0' width='90%'>
 	<tr>
		<td width="5%" class="theader" align="center">&nbsp;ID</td>
		<td width="35%" class="theader" align="center">State/Region Name</td>
		<td width='15%' align="center" class="theader">State/Region<br>Abbreviation</td>
		<td width='15%' align="center" class="theader">Taxrate 1</td>
		<td width="15%" align="center" class="theader">Taxrate 2</td>
		<td width="15%" align="center" class="theader">Delete</td>
	</tr>

<?php
for($x = 1; $x <= sizeof($regions); $x++){
	?>

 	<tr>
		<td>&nbsp;<?php echo $x; ?></td>
		<td><input type="text" name='statename[]' size="25" value="<?php echo $regions[$x][STATENAME]; ?>"></td>
		<td align="center"><input type="text" size="5" name='stateabbrev[]' value="<?php echo $regions[$x][STATEABBREV]; ?>"></td>
		<td align="center"><input type="text" size="5" name='taxrate1[]' value="<?php echo $regions[$x][TAXID1]; ?>"></td>
		<td align="center"><input type="text" size="5" name='taxrate2[]' value="<?php echo $regions[$x][TAXID2]; ?>"></td>
		<td align="center"><a href="settings.php?option=8&op=delete&id=<?php echo $x; ?>" onClick="return confirm('Warning! Are you sure you want to delete this state/region?')" ><img src="images/delete.png" title="delete" border="0" width="16px" height="16px"></a></td>
	</tr>

<?php } ?>

	<tr>
		<td colspan='6'>
		<p align='center'><input type='submit' class="body_text" name='submit' value='Save'></p>
		</td>
	</tr>

</table>
</form>