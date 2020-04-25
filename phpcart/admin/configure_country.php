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


include ("countries_1.php");
$msg = '';

if (!is_writable("countries_1.php")) echo "countries_1.php is not writable.  No updates will happen.<br>\n";

if ($_REQUEST["submit"] || $_REQUEST["op"] == "delete") {

	$content  = "<?php\n";

	if ($_REQUEST["op"] == "delete"){
		$y = 1;

		for($x = 1; $x <= sizeof($countries); $x++){
			if ($x != $_REQUEST["id"]){

				$content .= "\$countries[$y] = array($y,\"".$countries[$x][COUNTRYNAME]."\",\"".$countries[$x][COUNTRYABBREV2]."\",\"".$countries[$x][TAXID1]."\",\"".$countries[$x][TAXID2]."\",\"".$countries[$x][COUNTRYABBREV3]."\",\"".$countries[$y][COUNTRYNUMBER]."\");\n";

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

		for($x = 1; $x <= sizeof($_POST["countryname"]); $x++){

			$content .= "\$countries[$x] = array($x,\"".$_POST["countryname"][$y]."\",\"".$_POST["countryabbrev2"][$y]."\",\"".$_POST["taxrate1"][$y]."\",\"".$_POST["taxrate2"][$y]."\",\"".$_POST["countryabbrev3"][$y]."\",\"".$_POST["countrynumber"][$y]."\");\n";

			$y++;
		}
	}

	$content .= "?>";
	
	// save countries file
	$filePointer = fopen("countries_1.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);

		$msg = '<b>Your Country Tax Configuration has been Updated</b>';
		
} // end if submit

// include a second time in case the submit updated file
include ("countries_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Country Tax Configuration</strong></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=9" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border='1' cellpadding='4' cellspacing='0' width='97%'>

 	<tr>
		<td class="theader" align="center"><strong>&nbsp;</strong>ID </td>
		<td class="theader" align="center">Country Name</td>

		<td align="center" class="theader">
        	2 Letter <br>Abbreviation
        </td>

		<td align="center" class="theader">
        	3 Letter <br>Abbreviation
        </td>

		<td align="center" class="theader">
			3 Digit<br>Code
		</td>

		<td align="center" class="theader">Taxrate 1</td>
		<td align="center" class="theader">Taxrate 2</td>
		<td align="center" class="theader">Delete</td>
	</tr>

<?

for($x = 1; $x <= sizeof($countries); $x++){

	?>

 	<tr>

		<td>&nbsp;<?php echo $x; ?></td>

		<td><input type="text" name='countryname[]' size="25" value="<?php echo $countries[$x][COUNTRYNAME]; ?>"></td>
		<td align="center"><input type="text" size="4" name='countryabbrev2[]' value="<?php echo $countries[$x][COUNTRYABBREV2]; ?>">
		</td>
		<td align="center">
			<input type="text" size="4" name='countryabbrev3[]' value="<?php echo $countries[$x][COUNTRYABBREV3]; ?>">
		</td>
		<td align="center">
			<input type="text" size="4" name='countrynumber[]' value="<?php echo $countries[$x][COUNTRYNUMBER]; ?>">
		</td>
		<td align="center"><input type="text" size="4" name='taxrate1[]' value="<?php echo $countries[$x][TAXID1]; ?>"></td>
		<td align="center"><input type="text" size="4" name='taxrate2[]' value="<?php echo $countries[$x][TAXID2]; ?>"></td>
		<td align="center"><a href="settings.php?option=9&op=delete&id=<?php echo $x; ?>" onClick="return confirm('Warning! Are you sure you want to delete this country?')" ><img src="images/delete.png" title="delete" border="0" width="16px" height="16px"></a></td>
	</tr>

<?php } ?>

	<tr>
		<td width='100%' colspan='8'>
		<p align='center'><input type='submit' class="body_text" name='submit' value='Save'></p>
		</td>
	</tr>

</table>
</form>