<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                            # ||

|| # ---------------------------------------------------------------- # ||

|| #          All code is © 2006 Webrigger Internet Services      .                       # ||

|| #    No files may be redistributed in whole or part.               # ||

|| # ----------------- PHPCART IS NOT FREE SOFTWARE ----------------- # ||

|| #    http://www.phpcart.net | http://www.phpcart.net/forum/        # ||

|| #################################################################### ||

\*======================================================================*/

error_reporting(E_ALL & ~E_NOTICE);



if (session_id() == "") session_start();

if ($_SESSION["loggedin"] != true){

	header("Location: login.php");

	exit;

}

include ("regions_1.php");

require("hf.php");

pageHeader();

if (!is_writable("regions_1.php")) echo "regions_1.php is not writable.  No updates will happen.<br>\n";



if ($_REQUEST["submit"] || $_REQUEST["add"] || $_REQUEST["op"] == "delete") {

	$content  = "<?php\n";

	if ($_REQUEST["submit"] == "Add"){

		$y = 1;

		for($x = 1; $x <= sizeof($regions)+1; $x++){

			if ($x == $_REQUEST["pos"]){

				$content .= "\$regions[$x] = array($x,\"".$_POST["statename"]."\",\"".$_POST["stateabbr"]."\",\"\",\"\");\n";

			}

			else{

				$content .= "\$regions[$x] = array($x,\"".$regions[$y][STATENAME]."\",\"".$regions[$y][STATEABBREV]."\",\"".$regions[$y][TAXID1]."\",\"".$regions[$y][TAXID2]."\");\n";

				$y++;

			}

		}

	}

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

		$y = 0;

		for($x = 1; $x <= sizeof($_POST["statename"]); $x++){

			$content .= "\$regions[$x] = array($x,\"".$_POST["statename"][$y]."\",\"".$_POST["stateabbrev"][$y]."\",\"".$_POST["taxrate1"][$y]."\",\"".$_POST["taxrate2"][$y]."\");\n";

			$y++;

		}

	}

	$content .= "?>";

	$filePointer = fopen("regions_1.php", "w");

	fwrite($filePointer, $content);

	fclose($filePointer);



	echo "<br><br><center>\n";

	echo "<b>Setting updated!</b><br><br>\n";

	echo "Redirecting...\n";

	echo "<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php'}</script>\n";

	echo "</center><br><br>\n";



	pageFooter();

}

else{

// read all files and display

?>

<p align=center><font size=2 face=Verdana><b>States/Regions Tax Settings</b></font><form action="regions.php" method="post">

Insert At ID <select name="pos">

<?php

for ($x = 1; $x <= sizeof($regions)+1; $x++){

	echo "<option value=\"".$x."\">$x</option>\n";

}

?>

</select> State/Region Name<input type="text" name="statename"> Abbr.<input size="3" type="text" name="stateabbr"> <input type="submit" name="submit" value="Add">

</form>

<form action="regions.php" method="post">

<div align='center'>

<table border='1' cellpadding='0' cellspacing='4' width='90%'>

 	<tr>

		<td width="5%"><strong>ID</strong></td>

		<td width="35%"><strong>State/Region Name</strong></td>

		<td width='15%' align="center"><strong>State/Region<br>Abbreviation</strong></td>

		<td width='15%' align="center"><strong>Taxrate 1</strong></td>

		<td width="15%" align="center"><strong>Taxrate 2</strong></td>

		<td width="15%" align="center"><strong>Action</strong></td>

	</tr>

<?php

for($x = 1; $x <= sizeof($regions); $x++){

	?>

 	<tr>

		<td><?php echo $x; ?></td>

		<td><input type="text" name='statename[]' size="25" value="<?php echo $regions[$x][STATENAME]; ?>"></td>

		<td align="center"><input type="text" size="5" name='stateabbrev[]' value="<?php echo $regions[$x][STATEABBREV]; ?>"></td>

		<td align="center"><input type="text" size="5" name='taxrate1[]' value="<?php echo $regions[$x][TAXID1]; ?>"></td>

		<td align="center"><input type="text" size="5" name='taxrate2[]' value="<?php echo $regions[$x][TAXID2]; ?>"></td>

		<td><a href="?op=delete&id=<?php echo $x; ?>" onClick="return confirm('Warning! Are you sure you want to delete this state/region?')" >Delete</a></td>

	</tr>

<?php } ?>

	<tr>

		<td width='100%' colspan='5'>

		<p align='center'><input type='submit' name='submit' value='Save'></p>

		</td>

	</tr>

</table>

</div>

</form>

<?php pageFooter(); } ?>