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

require("processor_1.php");

if (!is_writable("processor_1.php")) echo "processor_1.php is not writable.  No updates will happen.<br>\n";

// get id
$id = $_REQUEST["id"];

if ($_REQUEST["save_processor"]) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	$id = $_POST['id'];

	if (is_writable("processor_1.php")){

		$content  = "<?php\n";

		// trim data fields
		foreach($_POST as $key => $value){
			if (strstr($key,"module")){
				$PROCESSOR[$key] = trim($value);
			}
		}

		foreach($PROCESSOR as $key => $value){
			$value = (get_magic_quotes_gpc()) ? stripslashes($value) : $value;
			$content .= "\$PROCESSOR[\"$key\"] = \"".trim($value)."\";\n";
		}

	
		$content .= "?>";

		$filePointer = fopen("processor_1.php", "w");
		fwrite($filePointer, $content);
		fclose($filePointer);
		
		$msg = '<b>Processor Updated</b>';
	}
} // end submit
	
// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

<p align="center" class="page_title"><strong>Processor Configuration</strong></p>

<?php
	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
?>

<form action='settings.php?option=16' method='post'>
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />

<table border="1" cellpadding="0" cellspacing="4" width="70%" align="center">
 	<tr>
		<td width="100%">
			<?php
            
                require ('../processor/'.$id.'.inc.php');
                $functionname = 'Config'.$id;
                $functionname();
            
            ?>
            
            
			<table border="1" cellpadding="0" cellspacing="4" width="100%" align="center">
				<tr>
					<td width="100%" colspan="2">
						<p align="center"><input type="submit" name="save_processor" value="Save the settings"></p>
					</td>
				</tr>
			</table>
            
		</td>
    </tr>
</table>
</form>