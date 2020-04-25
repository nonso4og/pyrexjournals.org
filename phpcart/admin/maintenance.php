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

$msg = '';
$error = '';


if (isset($_REQUEST["submit_cart"])) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	$clear_array = array(1,2,3,4);
	
	$clear_date = $_POST['clear_cart'];
	if (!in_array($clear_date, $clear_array)){
		$error = 'Wrong input, try again';
	}
	
	// get qty days
	switch($clear_date){
		case 1:	
			$days = 30;
			break;
		case 2:	
			$days = 7;
			break;
		case 3:	
			$days = 1;
			break;
		case 4:	
			$days = 'all';
			break;
	}

	if ($error == ''){
		$directory = "../sessions";
		$dir = opendir($directory) or die("Could not open directory");
		chdir($directory);
	
		if ($days != 'all'){
			$cutoff_date = mktime(0,0,0,date("m"),date("d")-$days,date("Y"));
		}
		
		while(($filename = readdir($dir)) != false){
			
			 if (is_file($filename) && $filename != "." && $filename != ".." && $filename != "index.php" && $filename != "empty"){
		 
				 if ($days != 'all'){	
				 
				 	$current_date = filemtime($filename);
							 
					 if($current_date < $cutoff_date){
					 	@unlink($filename);
				 	}
				 }
				 else {
					 @unlink($filename);
				 }
			 }
		} // end while loop
		
		closedir($dir);
		
		if ($days != 'all'){	
			$msg = "<b>Deleted Customer Carts created before ".date("F d, Y", $cutoff_date)."</b>";
		}
		else {
			$msg = "<b>Deleted All Customer Carts</b>";
		}
	
	} // if no error
} // end if submit


// CLEAR ORDER HISTORY
if (isset($_REQUEST["submit_history"])) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}
	
	$clear_array = array(1,2,3);
	
	$clear_history = $_POST['clear_history'];
	if (!in_array($clear_history, $clear_array)){
		$error = 'Wrong input, try again';
	}
	
	// get qty days
	switch($clear_history){
		case 1:	
			$days = 'year';
			break;
		case 2:	
			$days = '30';
			break;
		case 3:	
			$days = 'all';
			break;
	}

	if ($error == ''){
		$directory = "../orders";
		$dir = opendir($directory) or die("Could not open directory");
		chdir($directory);
	
		if ($days == '30'){
			$cutoff_date = mktime(0,0,0,date("m"),date("d")-$days,date("Y"));
		}
		elseif ($days == 'year'){
			$cutoff_date = mktime(0,0,0,date("m"),date("d"),date("Y")-1);
		}
		
		while(($filename = readdir($dir)) != false){
			
			 if (is_file($filename) && $filename != "." && $filename != ".." && $filename != "index.php" && $filename != "empty"){
		 
				 if ($days != 'all'){	
				 
				 	$current_date = filemtime($filename);
							 
					 if($current_date < $cutoff_date){
					 	@unlink($filename);
				 	}
				 }
				 else {
					 @unlink($filename);
				 }
			 }
		} // end while loop
		
		closedir($dir);
		
		if ($days != 'all'){	
			$msg = "<b>Deleted Orders before ".date("F d, Y", $cutoff_date)."</b>";
		}
		else {
			$msg = "<b>Deleted All Orders</b>";
		}
	
	} // if no error
} // end if submit



// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><strong>Routine Maintenance</strong><br>
        <span style="color:red;"><strong>Be careful as these are permanent changes and cannot be reversed</strong></span></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	if ($error != ''){
		echo '<p align="center" class="error">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action="settings.php?option=12" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
    <tr>
        <td valign="top" width="45%" class="form_label"><strong>Clear Customer Carts</strong></td>

        <td valign="top" width="55%">
        	<input type="radio" name="clear_cart" value="1" <?php if ($_POST['clear_cart'] != '2' AND $_POST['clear_cart'] != '3' AND $_POST['clear_cart'] != '4' ){echo ' checked';}?> > 
        	Older than 1 Month<br>
            <input type="radio" name="clear_cart" value="2" <?php if ($_POST['clear_cart'] == '2'){echo ' checked';} ?> > 
            Older than 1 Week<br>
            <input type="radio" name="clear_cart" value="3" <?php if ($_POST['clear_cart'] == '3'){echo ' checked';} ?> > 
            Older than 1 Day<br>
            <input type="radio" name="clear_cart" value="4" <?php if ($_POST['clear_cart'] == '4'){echo ' checked';} ?> > 
            All<br>
     
        </td>
    </tr>



    <tr>
        <td colspan="2" valign="top">
            <p align="center">
                <input type="submit" class="body_text" name="submit_cart" value="Clear Customer Carts"></p>
        </td>
    </tr>

</table>

<br><br>

<table border="0" cellpadding="5" cellspacing="0" width="85%" align="center">
    <tr>
        <td valign="top" width="45%" class="form_label"><strong>Clear Order History</strong></td>

        <td valign="top" width="55%">   
            <input type="radio" name="clear_history" value="1" <?php if ($_POST['clear_history'] != '2' AND $_POST['clear_history'] != '3'){echo ' checked';} ?> > 
            Older than 1 Year<br>
            <input type="radio" name="clear_history" value="2" <?php if ($_POST['clear_history'] == '2'){echo ' checked';} ?> > 
            Older than 1 Month<br>
            <input type="radio" name="clear_history" value="3" <?php if ($_POST['clear_history'] == '3'){echo ' checked';} ?> > 
            All<br>
        </td>
    </tr>

    <tr>
        <td colspan="2" valign="top">
            <p align="center">
                <input type="submit" class="body_text" name="submit_history" value="Clear Order History"></p>
        </td>
    </tr>

</table>
</form>