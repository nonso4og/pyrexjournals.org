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

session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

require("hf.php");
pageHeader();
?>

<tr>
  <td class="tab_content_left" valign="top"> <?php include ("includes/nav/buttonmaker_menu.php"); ?></td>
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

$acceptable_values = array(0,1,2,3,4,5,6,7,8);
if (!in_array($result, $acceptable_values)){
	die("Bad data input, please re-enter.");
}

if ($result == '') {
	$result = 0;
}

switch( $result ) { 
	case '0': 
		include ("text-link.php"); 
		break;
	case '1': 
		include ("text-link.php"); 
		break;
	case '2': 
		include  ("img-link.php");
		break; 
	case '3': 
		include ("form-link.php"); 
		break;
	case '4': 
		include  ("md5.php");
		break; 	
		
	case '5':
		include ("text-link_.php");
		break;
	case '6': 
		include  ("img-link_.php");
		break; 
	case '7': 
		include ("form-link_.php"); 
		break;	
	case '8': 
		include  ("md5_.php");
		break; 
}  
  
?>  
  
  </td>
</tr>

<?php pageFooter();?>