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


	$key = md5($config["key"].trim($_REQUEST["id"]).urldecode(trim($_REQUEST["descr"])).trim($_REQUEST["price"]).trim($_REQUEST["shipping"]).trim($_REQUEST["shipping1"]).trim($_REQUEST["shipping2"]).trim($_REQUEST["weight"]).trim($_REQUEST["tax"]).trim($_REQUEST["taxrateid"]));

	$_SESSION["pth"] = trim($_REQUEST["pth"]);
	$_SESSION["qty"] = trim($_REQUEST["qty"]);
	$_SESSION["lnk"] = trim($_REQUEST["lnk"]);
	$_SESSION["qtytext"] = trim($_REQUEST["qtytext"]);

	$thelink = "<form method=\"post\" action=\"".trim($_REQUEST["pth"])."\"><table>\n";

	$thelink .= "<input type=\"hidden\" name=\"action\" value=\"add\">\n";
	$thelink .= "<input type=\"hidden\" name=\"key\" value=\"$key\">\n";
	$thelink .= "<input type=\"hidden\" name=\"id\" value=\"".trim($_REQUEST["id"])."\">\n";
	$thelink .= "<input type=\"hidden\" name=\"descr\" value=\"".urlencode(trim($_REQUEST["descr"]))."\">\n";


	$thelink .= "<input type=\"hidden\" name=\"price\" value=\"".trim($_REQUEST["price"])."\">\n";
	if ($_REQUEST["shipping"])


		$thelink .= "<input type=\"hidden\" name=\"shipping\" value=\"".trim($_REQUEST["shipping"])."\">\n";

	if ($_REQUEST["shipping1"])
		$thelink .= "<input type=\"hidden\" name=\"shipping1\" value=\"".trim($_REQUEST["shipping1"])."\">\n";


	if ($_REQUEST["shipping2"])
		$thelink .= "<input type=\"hidden\" name=\"shipping2\" value=\"".trim($_REQUEST["shipping2"])."\">\n";


	if ($_REQUEST["taxrateid"])
		$thelink .= "<input type=\"hidden\" name=\"taxrateid\" value=\"".trim($_REQUEST["taxrateid"])."\">\n";


	if ($_REQUEST["weight"])
		$thelink .= "<input type=\"hidden\" name=\"weight\" value=\"".trim($_REQUEST["weight"])."\">\n";
		
	if ($_REQUEST["currency"])
		$thelink .= "<input type=\"hidden\" name=\"curr\" value=\"".trim($_REQUEST["currency"])."\">\n";


	if ($_REQUEST["qty"] == "yes")
		$thelink .= "<tr><td>Quantity</td><td><input type=\"text\" name=\"quantity\" size=\"5\" value=\"1\"></td></tr>\n";

	else
		$thelink .= "<input type=\"hidden\" name=\"quantity\" value=\"1\">\n";

	// add hidden links for mandatory items
	
	// mandatory checkbox items
	if ($_REQUEST['optionmandatory4'] == '1'){
		$thelink .= "<input type=\"hidden\" name=\"!option4\" value=\"\">";
	}
	if ($_REQUEST['optionmandatory5'] == '1'){
		$thelink .= "<input type=\"hidden\" name=\"!option5\" value=\"\">";
	}
	if ($_REQUEST['optionmandatory6'] == '1'){
		$thelink .= "<input type=\"hidden\" name=\"!option6\" value=\"\">";
	}
	
	// mandatory radio items
	if ($_REQUEST['optionmandatory7'] == '1'){
				$thelink .= "<input type=\"hidden\" name=\"!option7\" value=\"\">";
	}
	if ($_REQUEST['optionmandatory8'] == '1'){
				$thelink .= "<input type=\"hidden\" name=\"!option8\" value=\"\">";
	}
	if ($_REQUEST['optionmandatory9'] == '1'){
				$thelink .= "<input type=\"hidden\" name=\"!option9\" value=\"\">";
	}
	
	
	
	// start option 1 - drop down box
	if ($_REQUEST["optiontext1"]){
		$items = array();
		$it = array();
		
		// check if mandatory
			if ($_REQUEST['optionmandatory1'] == '1'){
				$thelink .= "<tr><td>".trim($_REQUEST["optiontext1"])." (mandatory)</td><td><select name=\"!option1\">\n";
			}
			else {
				$thelink .= "<tr><td>".trim($_REQUEST["optiontext1"])."</td><td><select name=\"option1\">\n";
			}

		$items = explode("\n",trim($_REQUEST["option1"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2) {
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);
			

			$thelink .= "<option value=\"".urldecode(rtrim($item)).":$qty".$key."\">".$it[0]."</option>\n";

		}
		$thelink .= "</select></td></tr>\n";
	}
	// end option 1



	// start option 2 - drop down box
	if ($_REQUEST["optiontext2"]){
		$items = array();
		$it = array();
		
		// check if mandatory
			if ($_REQUEST['optionmandatory2'] == '1'){
				$thelink .= "<tr><td>".trim($_REQUEST["optiontext2"])."</td><td><select name=\"!option2\">\n";
			}
			else {	
				$thelink .= "<tr><td>".trim($_REQUEST["optiontext2"])."</td><td><select name=\"option2\">\n";
			}
			
		$items = explode("\n",trim($_REQUEST["option2"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

			$thelink .= "<option value=\"".urldecode(rtrim($item)).":$qty".$key."\">".$it[0]."</option>\n";

		}
		$thelink .= "</select></td></tr>\n";
	}
	// end option 2




	// start option 3 - drop down box
	if ($_REQUEST["optiontext3"]){
		$items = array();
		$it = array();
		
		// check if mandatory
			if ($_REQUEST['optionmandatory3'] == '1'){
				$thelink .= "<tr><td>".trim($_REQUEST["optiontext3"])."</td><td><select name=\"!option3\">\n";
			}
			else {
				$thelink .= "<tr><td>".trim($_REQUEST["optiontext3"])."</td><td><select name=\"option3\">\n";
			}

		$items = explode("\n",trim($_REQUEST["option3"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

			$thelink .= "<option value=\"".urldecode(rtrim($item)).":$qty".$key."\">".$it[0]."</option>\n";

		}
		$thelink .= "</select></td></tr>\n";
	} // end option 3
	
	
	
	// start option 4 - check box
	if ($_REQUEST["optiontext4"]){
		$items = array();
		$it = array();
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
			if ($_REQUEST['optionmandatory4'] == '1'){
				$thelink .= trim($_REQUEST["optiontext4"])." (mandatory)<br>\n";
			}
			else {
				$thelink .= trim($_REQUEST["optiontext4"])."<br>\n";
			}

		$items = explode("\n",trim($_REQUEST["option4"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);
			
			if ($_REQUEST['optionmandatory4'] == '1'){
				$thelink .= "<input type=\"checkbox\" name=\"!option4[]\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
			else {
				$thelink .= "<input type=\"checkbox\" name=\"option4[]\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";	
			}
		}
		$thelink .= "</td></tr>\n";
	} // end option 4
	
	
	
	// start option 5 - check box
	if ($_REQUEST["optiontext5"]){
		$items = array();
		$it = array();
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
			if ($_REQUEST['optionmandatory5'] == '1'){
				$thelink .= trim($_REQUEST["optiontext5"])." (mandatory)<br>\n";
			}
			else {
				$thelink .= trim($_REQUEST["optiontext5"])."<br>\n";
			}

		$items = explode("\n",trim($_REQUEST["option5"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

			if ($_REQUEST['optionmandatory5'] == '1'){
				$thelink .= "<input type=\"checkbox\" name=\"!option5[]\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
			else {
				$thelink .= "<input type=\"checkbox\" name=\"option5[]\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
		}
		$thelink .= "</td></tr>\n";
	} // end option 5 

	
	
	//start option 6 - check  box
	if ($_REQUEST["optiontext6"]){
		$items = array();
		$it = array();
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
			if ($_REQUEST['optionmandatory6'] == '1'){
				$thelink .= trim($_REQUEST["optiontext6"])." (mandatory)<br>\n";
			}
			else {
				$thelink .= trim($_REQUEST["optiontext6"])."<br>\n";
			}

		$items = explode("\n",trim($_REQUEST["option6"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);
			
			if ($_REQUEST['optionmandatory6'] == '1'){
				$thelink .= "<input type=\"checkbox\" name=\"!option6[]\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
			else {
				$thelink .= "<input type=\"checkbox\" name=\"option6[]\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";	
			}
		}
		$thelink .= "</td></tr>\n";
	} // end option 6
	

	
	// start option 7 - radio box
	if ($_REQUEST["optiontext7"]){
		$items = array();
		$it = array();
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
			if ($_REQUEST['optionmandatory7'] == '1'){
				$thelink .= trim($_REQUEST["optiontext7"])." (mandatory)<br>\n";
			}
			else {
				$thelink .= trim($_REQUEST["optiontext7"])."<br>\n";
			}

		$items = explode("\n",trim($_REQUEST["option7"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

			if ($_REQUEST['optionmandatory7'] == '1'){
				$thelink .= "<input type=\"radio\" name=\"!option7\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
			else {
				$thelink .= "<input type=\"radio\" name=\"option7\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
		}
		$thelink .= "</td></tr>\n";
	} // end option 7
	

	
	// start option 8 - radio box
	if ($_REQUEST["optiontext8"]){
		$items = array();
		$it = array();
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
			if ($_REQUEST['optionmandatory8'] == '1'){
				$thelink .= trim($_REQUEST["optiontext8"])." (mandatory)<br>\n";
			}
			else {
				$thelink .= trim($_REQUEST["optiontext8"])."<br>\n";
			}

		$items = explode("\n",trim($_REQUEST["option8"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

			if ($_REQUEST['optionmandatory8'] == '1'){
				$thelink .= "<input type=\"radio\" name=\"!option8\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
			else {
				$thelink .= "<input type=\"radio\" name=\"option8\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
		}
		$thelink .= "</td></tr>\n";
	} // end option 8
	

	
	// start option 9 - radio box
	if ($_REQUEST["optiontext9"]){
		$items = array();
		$it = array();
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
			if ($_REQUEST['optionmandatory9'] == '1'){				
				$thelink .=trim($_REQUEST["optiontext9"])." (mandatory)<br>\n";
			}
			else {
				$thelink .= trim($_REQUEST["optiontext9"])."<br>\n";
			}

		$items = explode("\n",trim($_REQUEST["option9"]));

		foreach ($items as $item){

			$it = explode(":",rtrim($item));

			if (sizeof($it) < 2){
				$qty = ":";
			}
			else {
				$qty = "";
			}
			
			$key = md5($config["key"].$it[0].$it[1]);

			if ($_REQUEST['optionmandatory9'] == '1'){
				$thelink .= "<input type=\"radio\" name=\"!option9\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
			else {
				$thelink .= "<input type=\"radio\" name=\"option9\" value=\"".urldecode(rtrim($item)).":$qty".$key."\"> ".$it[0]."\n ";
			}
		}
		$thelink .= "</td></tr>\n";
	} // end option 9
	

// TEXT BOXES	
	// start option 10 - text box
	if ($_REQUEST["optiontext10"]){
		$key = md5($config["key"].trim($_REQUEST["optiontext10"]).$_REQUEST['optionprice10']);
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
		if ($_REQUEST['optionmandatory10'] == '1'){		
			$thelink .= trim($_REQUEST["optiontext10"])." (mandatory)<br>\n";
		}
		else {
			$thelink .= trim($_REQUEST["optiontext10"])."<br>\n";
		}
	
		if ($_REQUEST['optionmandatory10'] == '1'){
			
			$thelink .= "<input type=\"text\" name=\"!option10[]\" >\n ";
			$thelink .= "<input type=\"hidden\" name=\"!option10[]\" value=\"".urldecode(rtrim($_REQUEST["optiontext10"])).":".$_REQUEST['optionprice10'].":".$key."\">\n ";
		}
		else {
			$thelink .= "<input type=\"text\" name=\"option10[]\" >\n ";
			$thelink .= "<input type=\"hidden\" name=\"option10[]\" value=\"".urldecode(rtrim($_REQUEST["optiontext10"])).":".$_REQUEST['optionprice10'].":".$key."\">\n ";
		}
		
		$thelink .= "</td></tr>\n";
	} // end option 10
	
	
	
	// start option 11 - text box
	if ($_REQUEST["optiontext11"]){
		$key = md5($config["key"].trim($_REQUEST["optiontext11"]).$_REQUEST['optionprice11']);
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
		if ($_REQUEST['optionmandatory11'] == '1'){		
			$thelink .= trim($_REQUEST["optiontext11"])." (mandatory)<br>\n";
		}
		else {
			$thelink .= trim($_REQUEST["optiontext11"])."<br>\n";
		}
	
		if ($_REQUEST['optionmandatory11'] == '1'){
			
			$thelink .= "<input type=\"text\" name=\"!option11[]\" >\n ";
			$thelink .= "<input type=\"hidden\" name=\"!option11[]\" value=\"".urldecode(rtrim($_REQUEST["optiontext11"])).":".$_REQUEST['optionprice11'].":".$key."\">\n ";
		}
		else {
			$thelink .= "<input type=\"text\" name=\"option11[]\" >\n ";
			$thelink .= "<input type=\"hidden\" name=\"option11[]\" value=\"".urldecode(rtrim($_REQUEST["optiontext11"])).":".$_REQUEST['optionprice11'].":".$key."\">\n ";
		}
		
		$thelink .= "</td></tr>\n";
	} // end option 11
	
	
	// start option 12 - text box
	if ($_REQUEST["optiontext12"]){
		$key = md5($config["key"].trim($_REQUEST["optiontext12"]).$_REQUEST['optionprice12']);
		
		$thelink .= "<tr><td>";
		
		// check if mandatory
		if ($_REQUEST['optionmandatory12'] == '1'){		
			$thelink .= trim($_REQUEST["optiontext12"])." (mandatory)<br>\n";
		}
		else {
			$thelink .= trim($_REQUEST["optiontext12"])."<br>\n";
		}
	
		if ($_REQUEST['optionmandatory12'] == '1'){
			
			$thelink .= "<input type=\"text\" name=\"!option12[]\" >\n ";
			$thelink .= "<input type=\"hidden\" name=\"!option12[]\" value=\"".urldecode(rtrim($_REQUEST["optiontext12"])).":".$_REQUEST['optionprice12'].":".$key."\">\n ";
		}
		else {
			$thelink .= "<input type=\"text\" name=\"option12[]\" >\n ";
			$thelink .= "<input type=\"hidden\" name=\"option12[]\" value=\"".urldecode(rtrim($_REQUEST["optiontext12"])).":".$_REQUEST['optionprice12'].":".$key."\">\n ";
		}
		
		$thelink .= "</td></tr>\n";
	} // end option 12



	// submit button
	$thelink .= "<tr><td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"".$_REQUEST["lnk"]."\"></td></tr>\n";

	$thelink .= "</table>\n";
	$thelink .= "</form>\n";

?>

<p align="center" class="page_title"><b>HTML Form Button</b></p>

<p align="center" class="page_title"><a href="button_maker.php?option=3">Click Here to Generate Another Link</a></p>

<p align="center">Click in text box to copy and paste</p>

<center>
<form method="POST" action="" name="1" id="1">

<textarea rows="8" name="S1" cols="60" wrap="virtual" onfocus="this.select()" onmouseup="return false">

<!-- Start <?php echo $_REQUEST["id"]; ?> -->

<?php echo $thelink; ?>

<!--- End <?php echo $_REQUEST["id"]; ?> -->

</textarea>

</form>
</center>

<p align="center">Now just Copy and Paste the text above into your HTML page</p>