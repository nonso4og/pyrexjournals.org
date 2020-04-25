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

include ("configuration_1.php");

$key = '';

if (isset($_POST['submit']) and $_POST['info'] != ''){

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	$info = $_POST["info"];

	$it = array();
	$it = explode(":",rtrim($info));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

} // end submit


?>

    
<p align="center" class="page_title"><b>Hyperlink Verification Key</b></p>

<p align="center" class="page_title"><a href="button_maker.php?option=4">Click Here to Generate Another Link</a></p>

<p align="center">Click in text box to copy and paste</p>

<center>
<form method="POST" action="">

<textarea rows="1" name="S1" cols="60" wrap="virtual" onfocus="this.select()" onmouseup="return false"><?php echo $key; ?></textarea><br>

</form>
</center>

<p align="center">Now just Copy and Paste the text above into your HTML page</p>
    
    <table border="1" cellpadding="4" cellspacing="0" align="center">
    
    <tr>
    	<td colspan="2" align="center" class="page_title">
			<strong>Usage</strong>
        </td>
   </tr>
            
    <tr>
    	<td colspan="2" align="center" class="body_text">
        Add the Hyperlink Verification Key to your product definition to protect your store inputs </td>
    </tr>
    
    <tr>
    	<td colspan="2" align="left" class="body_text">
            Link Usage: &hash=ak6sdf67sdf67sasfsd<br>
            Form Usage: <pre>< input type="hidden" name="hash" value="ak6sdf67sdf67sasfsd" ></pre>
        </td>
    </tr>
    </table>