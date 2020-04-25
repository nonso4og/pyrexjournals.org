<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                           # ||

|| # ---------------------------------------------------------------- # ||

|| #          All code is © 2006 Webrigger Internet Services      .                       # ||

|| #    No files may be redistributed in whole or part.               # ||

|| # ----------------- PHPCART IS NOT FREE SOFTWARE ----------------- # ||

|| #    http://www.phpcart.net | http://www.phpcart.net/forum/        # ||

|| #################################################################### ||

\*======================================================================*/

error_reporting(E_ALL & ~E_NOTICE);

function ReadProcessors($dir){

	$filearray = array();

	if($handle = opendir($dir)) {

		while(false !== ($file = readdir($handle))){

			if($file == "." || $file == ".." )
				continue;

			if (strpos($file,".inc.php") == strlen($file) - 8)
				$filearray[] = str_replace(".inc.php","",$file);
		}
		sort($filearray);
	}

	closedir($handle);
	return $filearray;
}

if (session_id() == "") session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

$error = array();
$msg = '';

if (!is_writable("payment_1.php")) echo "payment_1.php is not writable.  No updates will happen.<br>\n";

if (isset($_REQUEST["submit"])) {

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("payment_1.php")){
		$content  = "<?php\n";

		foreach($_POST as $key => $value){

			if (strstr($key,"module")){

				if ($value == "Yes"){

					$name = str_replace("module","",$key);
					$display = "display".$name;
					
					if ($_POST[$display] == ''){
						$error[] = "You must enter a Display Name for the Processor, $name, before saving";
					}
					else {
						$display = $_POST[$display];
						$content .= "\$PMETHODS[\"$name\"] = \"$display\";\n";
					}
				}
			}
		}

		$content .= "?>";	

		// if no errors save file
		if (count($error) == 0){
			$filePointer = fopen("payment_1.php", "w");
			fwrite($filePointer, $content);
			fclose($filePointer);
			
			$msg = '<b>Gateways Updated</b>';
		}
	} // end if writable
}	// end submit

// clear PMETHODS and then get file again
$PMETHODS = array();
require ("payment_1.php");

// read all files and display
$files = array();
$files = ReadProcessors("../processor/");


// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

<p align="center" class="page_title"><strong>Payment Configuration</strong></p>

<form action='settings.php?option=5' method='post'>
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<?php
	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
	
	if (count($error) != 0){
		echo '<br><span class="error"><b>Error:</b><br>';
		foreach ($error as $errvalue){
			echo '<span class="error">'.$errvalue.'<br><br>';
		}
	}
?>

<table border="1" cellpadding="4" cellspacing="0"width="85%" align="center">
 	<tr>
		<td width="40%" align="center" class="theader">Payment Module</td>
		<td width='10%' align="center" class="theader">Active</td>
		<td width='35%' align="center" class="theader">Display Name</td>
		<td width="15%" align="center" class="theader">Configure</td>
	</tr>

<?php

foreach($files as $file){

	$display = $PMETHODS[$file]; 

	if ($display != "")
		$active = "Yes";

	else
		$active = "No";

?>

 	<tr>
		<td class="body_text">&nbsp;Activate <?php echo $file; ?></td>
		<td align="center">
        	<select size='1' name='module<?php echo $file; ?>'>  
                <option value='Yes' <?php if ($active == 'Yes'){echo ' selected'; }?> >Yes</option>  
                <option value='No' <?php if ($active == 'No'){echo ' selected'; }?>>No</option>
            </select>
        </td>

		<td align="center">
        	<input type="text" name='display<?php echo $file; ?>' value='<?php echo $display; ?>' size="20">
        </td>
		<td align="center">
			<?php 
				if ($active == "Yes") { 
            		echo '<a href="settings.php?option=16&id='.$file.'"><img src="images/edit.png" title="edit" border="0" width="16px" height="16px"></a>';
				} 
			?>
            &nbsp;
        </td>
	</tr>

<?php } ?>

	<tr>
		<td width='100%' colspan='4'>
			<p align='center'><input type='submit' class="body_text" name='submit' value='Save the settings'></p>
		</td>
	</tr>

</table>

</form>