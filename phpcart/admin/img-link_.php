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
require("currency_1.php");

if (isset($_POST['Submit'])){

	// check token
	if ($_POST['token'] == '' || $_POST['token'] != $_SESSION['token']) {
		echo "Invalid data!";
		exit;
	}

	$key = md5($config["key"].trim($_REQUEST["id"]).trim($_REQUEST["descr"]).trim($_REQUEST["price"]).trim($_REQUEST["shipping"]).trim($_REQUEST["shipping1"]).trim($_REQUEST["shipping2"]).trim($_REQUEST["weight"]).trim($_REQUEST["taxrateid"]));

	$_SESSION["pth"] = trim($_REQUEST["pth"]);
	$_SESSION["img"] = trim($_REQUEST["img"]);

	$thelink = "<a href=\"".trim($_REQUEST["pth"])."?action=add&id=".trim($_REQUEST["id"])."&descr=".urlencode(trim($_REQUEST["descr"]))."&price=".trim($_REQUEST["price"]);

	if ($_REQUEST["shipping"])
		$thelink .= "&shipping=".trim($_REQUEST["shipping"]);

	if ($_REQUEST["shipping1"])
		$thelink .= "&shipping1=".trim($_REQUEST["shipping1"]);

	if ($_REQUEST["shipping2"])
		 $thelink .= "&shipping2=".trim($_REQUEST["shipping2"]);

	if ($_REQUEST["taxrateid"])
		 $thelink .= "&taxrateid=".trim($_REQUEST["taxrateid"]);
		 
	if ($_REQUEST["weight"])
		$thelink .= "&weight=".trim($_REQUEST["weight"]);
		
	if ($_REQUEST["currency"])
		$thelink .= "&curr=".trim($_REQUEST["currency"]);

	$thelink .= "&quantity=1&key=$key\"><img src=\"".trim($_REQUEST["img"])."\"></a>\n";

} // end submit

?>

<p align="center" class="page_title"><b>Hyperlink Button with Image </b></p>

<p align="center" class="page_title"><a href="button_maker.php?option=2">Click Here to Generate Another Link</a></p>

<p align="center">Click in text box to copy and paste</p>

<center>

<form method="POST" action="">

<textarea rows="8" name="S1" cols="60" wrap="virtual" onfocus="this.select()" onmouseup="return false">

<!-- Start <?php echo $_REQUEST["id"]; ?> -->

<?php echo $thelink; ?>

<!--- End <?php echo $_REQUEST["id"]; ?> -->

</textarea><br>

</form>
</center>


<p align="center">Now just Copy and Paste the text above into your HTML page</p>