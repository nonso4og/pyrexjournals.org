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


function ReadOrders($dir){

	$filearray = array();

	if($handle = opendir($dir)) {
		while(false !== ($file = readdir($handle))){
			if($file == "." || $file == ".." )
				continue;
			if (strpos($file,".txt") == strlen($file) - 4)
				$filearray[] = $file;
		}
		rsort($filearray);
	}
	closedir($handle);
	return $filearray;
}


session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}

if ($_REQUEST["action"] == "delete"){
	@unlink("../orders/".$_REQUEST["orderid"].".txt");
	@unlink("../orders/".$_REQUEST["orderid"].".cc");
	
	$msg =  '<b>Order deleted</b>';
}

// read all files and display
$files = array();
$files = ReadOrders("../orders");


?>

<p align="center" class="page_title"><b>Show All Orders</b></p>

<?php

	if ($msg != ''){
		echo '<p align="center" class="msg">'.$msg.'</p>';
	}
	
?>

<table border="1" cellpadding="2" cellspacing="2" width="95%" align="center">

 	<tr>
		<td width="20%" align="center" class="form_label"><strong>Date </strong></td>
        <td width="20%" align="center" class="form_label"><strong>Name </strong></td>
        <td width="30%" align="center" class="form_label"><strong>Company Name </strong></td>
		<td width="20%" align="center" class="form_label"><strong>Order ID </strong></td>
		<td width='10%' align="center" class="form_label"><strong>Action</strong></td>
	</tr>

<?php

if (count($files) != 0){
	foreach($files as $file){
		$order_company = '';
		$order_date = '';
		$order_name = '';
	
		$orderid = str_replace(".txt","",$file);
	
		$doc = new DOMDocument();
		@$doc->loadHTMLFile('../orders/'.$file);
		$doc->saveHTML();
	
		foreach ($doc->getElementsByTagName('td') as $td) {
	
			if ($result = $td->getAttribute('name')=='order_company') {
				$order_company = $td->nodeValue;
			}
			
			if ($result = $td->getAttribute('name')=='order_name') {
				$order_name = $td->nodeValue;
			}
			
			if ($result = $td->getAttribute('name')=='order_date') {
				$order_date = $td->nodeValue;
			}
		}
	
	?>
	
		<tr>
			<td class="body_text"><?php echo $order_date; ?>&nbsp;</td>
			<td class="body_text"><?php echo $order_name; ?>&nbsp;</td>
			<td class="body_text"><?php echo $order_company; ?>&nbsp;</td>
			<td class="body_text"><?php echo $orderid; ?></td>
	
			<td align="center"><a href="orders.php?option=2&action=submit&orderid=<?php echo $orderid; ?>"><img src="images/view.png" title="View" border="0" width="16px" height="16px"></a> <a href="orders.php?action=delete&orderid=<?php echo $orderid; ?>" onclick="return confirm('Warning! Are you sure you want to delete this order?')" ><img src="images/delete.png" title="delete" border="0" width="16px" height="16px"></a></td>
	
		</tr>
	
	<?php 

	} // end foreach
} // end if empty
else {
	echo '<tr><td colspan="5" align="center" class="body_text">No Orders Found</td></tr>';	
}
	
?>

</table>