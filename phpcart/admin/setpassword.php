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

require ("admin_1.php");

if (!is_writable("admin_1.php")) echo "admin_1.php is not writable.  Password can not be updated.";

if ($_REQUEST["submit"]) {
	
	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	if (is_writable("admin_1.php")){

		if (isset($_REQUEST["username"]) && strlen($_REQUEST["password"]) > 0 && ($_REQUEST["password"] == $_REQUEST["password2"])){

			$content  = "<?\n";
			$content .= "\$adminUsername	= \"".addslashes($_REQUEST["username"])."\";\n";
			$content .= "\$adminPassword	= \"".md5($_REQUEST["password"]."phpCart")."\";\n";
			$content .= "?>";
			
			$filePointer = fopen("admin_1.php", "w");
			fwrite($filePointer, $content);
			fclose($filePointer);
		
			$msg =  "<b>Your username/password has been updated!</b>";			
		}
		else
			$errormsg = "<b>Your username/password was not changed</b>";
	}
} // end submit

if (isset($errormsg)) echo $errormsg;

if (strlen($_REQUEST["username"]) > 1)
	$username = $_REQUEST["username"];

else
	$username = $adminUsername;


// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>
<p align="center" class="page_title"><b>Update Password</b></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	if ($error != ''){
		echo '<p align="center" class="error">'.$errormsg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	
?>

<form action='settings.php?option=11' method='post'>
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border='0' cellpadding='0' cellspacing='8' width='55%' align="center">
<tr>
	<td width='59%' class="form_label"><strong>Set Admin Username:</strong></td>
	<td width='41%'><input type='text' name='username' size='20' value="<?php echo $username; ?>"></td>
</tr>

<tr>
	<td width='59%' class="form_label"><strong>Password:</strong></td>
	<td width='41%'><input type='password' name='password' id='password' size='20'></td>
</tr>

<tr>
	<td width='59%' class="form_label"><strong>Repeat Password:</strong></td>
	<td width='41%'><input type='password' name='password2' id='password2' onkeyup="checkPass(); return false;"  size='20'> 
    <span id="confirmMessage" class="confirmMessage"></span></td>
</tr>

<tr>
	<td align="center" colspan="2">
		<p align='center'><input type='submit' class="body_text" name='submit' value='Save the settings'><br><span style="color:red">(All Fields are required)</span></p>
	</td>
</tr>
</table>
</form>

<script language="JavaScript">
<!--
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
-->
</script>