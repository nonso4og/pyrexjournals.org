<?

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.10                           # ||

|| # ---------------------------------------------------------------- # ||

|| #          All code is © 2008 Webrigger Internet Services      .                       # ||

|| #    No files may be redistributed in whole or part.               # ||

|| # ----------------- PHPCART IS NOT FREE SOFTWARE ----------------- # ||

|| #    http://www.phpcart.net | http://www.phpcart.net/forum/        # ||

|| #################################################################### ||

\*======================================================================*/



/*

Instructions for using this file:



1.  Installation - Upload this file into the same directory as phpcart.php



2.  Create your form to post to this file:

<form method="post" action="phpcart-c.php">



This file allows generic entry of multiple items and can be customized/optimized to suite your needs

*/

error_reporting(E_ALL & ~E_NOTICE);



include ("admin/configuration_1.php");

include ("includes/functions.inc.php");

include ("includes/filebase.inc.php");

include ("modules/shipping.inc.php");

include ("modules/tax.inc.php");

include ("modules/misc.inc.php");

include ("localization/".$config["Language"].".php");



CheckReferers();

SetupSession();

for($x = 0; $x < sizeof($_POST['id']); $x++){

	if (trim($_POST['id'][$x]) != ''){

		$_REQUEST = array();

		$_REQUEST["id"] = $_POST['id'][$x];

		if ($config["DuplicatesOK"] == "Yes" || !db_findduplicate($_REQUEST["id"])){

			if ($_POST['qty'][$x] > 0)

				$_REQUEST["quantity"] = (int)$_POST['qty'][$x];

			else

				$_REQUEST["quantity"] = 1;

			switch ($_POST['price'][$x]){

				case "11.00" : $_REQUEST["descr"] = "8 x 6"; break;

				case "13.00" : $_REQUEST["descr"] = "10 x 8"; break;

				case "20.00" : $_REQUEST["descr"] = "12 x 16"; break;

			}

			$_REQUEST["price"] = $_POST['price'][$x];

			$_REQUEST["shipping"] = $_POST['shipping'][$x];

			$_REQUEST["taxrateid"] = $_POST['taxrateid'][$x];

			$message = AddProduct("N");

			if ($message) {
				// activate cartmessage so we can pass it to the cart
				$_SESSION['CartMessage'] = $message;
			}
		}

	}

}

$url = $_REQUEST["url"];

if ($url)

	header("Location: $url");

else

	header("Location: phpcart.php?action=view");

?>