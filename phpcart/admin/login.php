<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                           		# ||

|| # ---------------------------------------------------------------- 	# ||

|| #          All code is @ Webrigger Internet Services  			# ||

|| #    No files may be redistributed in whole or part.   		# ||

|| # ---------- PHPCART IS NOT FREE SOFTWARE ------------ 	# ||

|| #       Visit: http://www.phpcart.net 								# ||
|| #       Support: http://www.phpcart.net/forum/ 				# ||

|| #################################################################### ||

\*======================================================================*/

// error_reporting(E_ALL & ~E_NOTICE);

if (session_id() == "") {
	session_start();
}

$_SESSION["loggedin"] = false;

require("admin_1.php");

if (isset($_REQUEST["submit"])) {

	if ($_REQUEST["username"] == $adminUsername && md5($_REQUEST["password"]."phpCart") == $adminPassword){

		$loggedin = true;
		
		// regenerate session
		session_regenerate_id();

		$_SESSION["loggedin"] = true;

		header("Location: index.php");
		exit();
	}
	else {
		$error = "<b>Login failed, please try again.</b>";
	}
}

require("hf.php");
pageHeader();

?>
<tr><td>

<?php
if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
		echo '<p>&nbsp;</p>';
	}
	if ($error != ''){
		echo '<p>&nbsp;</p>';
		echo '<p align="center" class="error">'.$error.'</p>';	
	}
?>

	<form action='login.php' method='post'>
	<table border='0' cellpadding='0' cellspacing='8' width='35%' align="center">

		<tr>
			<td width='59%' class="form_label">
            	<p><strong>Login Username:</strong></p>
            </td>

			<td width='41%'>
            	<input type='text' name='username' size='20' value='<?php echo $_REQUEST["username"]; php?>' autofocus="autofocus">
            </td>
		</tr>

		<tr>
			<td width='59%' class="form_label">
            	<strong>Password: </strong></td>

			<td width='41%'>
            	<input type='password' name='password' size='20'>
            </td>
		</tr>

		<tr>
			<td width='100%' colspan='2'>
				<p align='center'><input type='submit' name='submit' value='Login'></p>
			</td>
		</tr>
	</table>
	</form>
</td></tr>
<?php pageFooter(); ?>