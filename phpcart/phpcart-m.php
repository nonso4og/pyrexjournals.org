<?

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



/*

Instructions for using this file:



1.  Installation - Upload this file into the same directory as phpcart.php



2.  Create your form to post to this file:

<form method="post" action="phpcart-m.php">



3.  Create your form fields as checkboxes or radio buttons

3a. You must create your fields using the following syntax

<input type="checkbox" name="item_xxx" value="id|description|price|quantity|shipping|shipping1|shipping2|weight|tax|taxid|extra1|extra2|extra3">



4.  If you want to allow customers to override the quantity then create a matching form field.

The quantity textbox must have the following naming structure:

<input type="textbox" name="qty_xxx" value="1">

NOTE:

The "xxx" must match the same "xxx" used in the item_xxx form field.

EXAMPLE:

<input type="checkbox" name="item_item1" value="PRG-101|Particle Beam|149.95|1|0">

<input type="textbox" name="qty_item1" value="1">



<input type="checkbox" name="item_item2" value="RS-200|Rocket Ship|44.95|1|4.95">

<input type="textbox" name="qty_item2" value="1">



5.  To use options, name your option fields opt_xxx[] 

<select name="opt_item1[]">

	<option value="red">Red</option>

	<option value="blue">Blue</option>

	<option value="green">Green</option>

</select>

<select name="opt_item1[]">

	<option value="small">Small/option>

	<option value="medium">Medium</option>

	<option value="large">Large</option>

</select>



6.  You can set a return page by setting a hidden form field called "url". 

If this is not set then you will be sent to the phpcart shopping cart to view the contents.

EXAMPLE:

<input type="hidden" name="url" value="/catalog/products.php">



NOTE:

This process currently allows for duplicate entries to be entered into the shopping cart even

if "No Duplicates" is set in the control panel.

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

foreach($_REQUEST as $key => $item){

	$variable = explode("_",$key);

	if (strstr($variable[0],"item")){

		$data = explode("|",$item);

		$_REQUEST["id"] = $data[0];

		// check for duplicates
		if ($config["DuplicatesOK"] == "Yes" || !db_findduplicate($_REQUEST["id"])){

			$qvar = "qty_".$variable[1];

			if ($_REQUEST[$qvar] > 0) {
				$_REQUEST["quantity"] = $_REQUEST[$qvar];
			}
			else {
				$_REQUEST["quantity"] = $data[3];
			}

			if ($_REQUEST["quantity"] > 0){

				$_REQUEST["descr"] = $data[1];
				$_REQUEST["price"] = $data[2];
				$_REQUEST["shipping"] = $data[4];
				$_REQUEST["shipping1"] = $data[5];
				$_REQUEST["shipping2"] = $data[6];
				$_REQUEST["weight"] = $data[7];
				$_REQUEST["tax"] = $data[8];
				$_REQUEST["taxrateid"] = $data[9];
				$_REQUEST["extra1"] = $data[10];
				$_REQUEST["extra2"] = $data[11];
				$_REQUEST["extra3"] = $data[12];
				$kvar = "key_".$variable[1];
				$_REQUEST["key"] = $_REQUEST[$kvar];
				$_REQUEST["opti	on"] = "";

				unset($_REQUEST["option"]);

				// fix up any options
				$optvar = "opt_".$variable[1];

				foreach ($_REQUEST as $key => $value){ // blast through all variables to try to find any related options

					if (strpos($key,$optvar) !== false){ // this is some sort of option, is it standard or advanced

						if (strpos($key,$optvar."_") === false){ // this is an advanced option format opt_1_x
							if (is_array($_REQUEST[$key])){ // must be a text option
								$tmp = explode(":",$_REQUEST[$key][1]);
								$value = $tmp[0]." ".$_REQUEST[$key][0].":".$tmp[1].":".$tmp[2].":".$tmp[0];
							}
						}
						$_REQUEST["option"][] = $value;
					}
				}

				$message = AddProduct("N");

				if ($message) {
					// activate cartmessage so we can pass it to the cart
					$_SESSION['CartMessage'] = $message;
				}
			}
		}
	}
}

$url = $_REQUEST["url"];

if ($url) {
	header("Location: $url");
	exit;
}
else {
	header("Location: phpcart.php?action=view");
	$exit;
}
?>