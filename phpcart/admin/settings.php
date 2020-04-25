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

session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

require("hf.php");
pageHeader();
?>

<tr>
  <td class="tab_content_left" valign="top"> <?php include ("includes/nav/settings_menu.php"); ?></td>
  <td class="tab_content_right" align="left"> 
  
<?php

// do GET to select program to run
if (isset($_GET['option'])) {
	$result = ($_GET['option']);
}
else {
	$result = '';
}

// make sure input is numeric
if (!is_numeric($result) AND $result != '') die("Bad data, please re-enter."); 

$acceptable_values = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,24);
if (!in_array($result, $acceptable_values)){
	die("Bad data input, please re-enter.");
}

if ($result == '') {
	$result = 0;
}

switch( $result ) { 
	case '0': 
		include ("configure_company.php"); 
		break;
	case '1': 
		include ("configure_company.php"); 
		break;
	case '2': 
		include ("configure_cart.php"); 
		break;
	case '3': 
		include ("configure_email.php"); 
		break;
	case '4': 
		include ("configure_layout.php");
		break;
	case '5': 
		include ("payment.php");
		break; 	
	case '6': 
		include ("configure_shipping.php");
		break; 
	case '7': 
		include ("configure_tax.php");
		break; 
	case '8': 
		include ("configure_region.php"); 
		break;
	case '9': 
		include ("configure_country.php");
		break;  
	case '10': 
		include ("configure_required.php"); 
		break;
	case '11': 
		include  ("setpassword.php");
		break; 
	case '12': 
		include  ("maintenance.php");
		break; 
		
	// CURRENCY
	case '13': 
		include  ("configure_currency.php");
		break; 
	case '14': 
		include  ("add_currency.php");
		break;
	case '15': 
		include  ("edit_currency.php");
		break;
		
	//  PROCESSOR
	case '16': 
		include  ("processor.php");
		break;
		
	//  ADD REGION / COUNTRY
	case '17': 
		include  ("add_region.php");
		break;
	case '18': 
		include  ("add_country.php");
		break;
		
	case '19':
		include ("configure_legacy_shipping.php");
		break;
		
	case '20':
		include ("configure_zone_shipping.php");
		break;
		
	case '21':
		include ("add_shipping_zone.php");
		break;
		
	case '22':
		include ("edit_shipping_zone.php");
		break;
		
	// configure shipping methods
	case '24';
		include ("configure_shipping_method.php");
		break;
}  
  
?>  
  
  </td>
</tr>

<?php pageFooter();?>