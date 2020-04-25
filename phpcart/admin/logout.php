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

header("Location: login.php");
exit();
?>	