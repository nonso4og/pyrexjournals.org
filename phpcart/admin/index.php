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

if (session_id() == "") session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

require("hf.php");
pageHeader(); 
?>

<tr>
	<td colspan="2">
    
<table border="0" cellpadding="5" cellspacing="5" width="100%">
	<tr>
    	<td width="0%">&nbsp;</td>
        
		<td width="100%">
			<?php include ("includes/main.inc.php"); ?>
		</td>
    </tr>
</table>

	</td>
</tr>
<?php pageFooter(); ?>