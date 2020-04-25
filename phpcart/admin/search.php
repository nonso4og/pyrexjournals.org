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


if (session_id() == "") session_start();

if ($_SESSION["loggedin"] != true){
	header("Location: login.php");
	exit;
}


if ($_REQUEST["action"]=="submit") {

$filename = "../orders/".$_REQUEST["orderid"].".txt";

$ccfilename = "../orders/".$_REQUEST["orderid"].".cc";

if (file_exists($filename)) {

	$handle = @fopen($filename,"r");

	if ($handle) {

	   while (!feof($handle)) {
		   $buffer[] = fgets($handle, 4096);
	   }
	   fclose($handle);
	}

	$data = @implode("",$buffer);

?>

	<script language="javascript">
    <!--
    function openInvoiceWindow(order_id){
    
      var width="900", height="900";
      var left = screen.width/2 - width/2;
      var top = screen.height/2 - height/2;
      var styleStr = 'toolbar,location=no,directories=no,status=no,menubar,scrollbars,resizable,width='+width+',height='+height+',left='+left+',top='+top+',screenX='+left+',screenY='+top;
    
      var msgWindow = window.open("invoice.php?order_id="+order_id,"msgWindow", styleStr);
	  window.focus();
    }
	
    -->
    </script>
    
    <?php
    
       // echo '<table border="0" align="center"><tr><td>';
		echo '<p align="center"><b>Order ID: '.$_REQUEST["orderid"].'</b></p>';
    
        echo "<p align=\"center\"><a href=\"javascript:openInvoiceWindow('".$_REQUEST["orderid"]."');\">Printable Invoice</a></p>";
    
		$he_width = 650;
		$he_height = 900;
		$he_variable = "foo";
		$he_data = $data;
		$he_options = "0,0,0,0,0,0,"; // optional
		$he_iconset = "set1"; // optional
		
		include("_editor.php");
    
        if (file_exists($ccfilename)){
    
            echo '<p align="center">';
    
            $file = fopen($ccfilename,"r");
    
            $text = fread($file,65000);
    
            include ("configuration_1.php");
    
            echo Decrypt($text,$config["key"]);
    
            echo "</p>";
        }
		//echo '</td></tr></table>';
		exit;
	} else {
		$error = '<p align="center" class="error"><b>This Order Number was not found.</b></p>';
	}
	//echo '</td></tr></table>';
}


?>

<p align="center" class="page_title"><b>Search Orders</b></p>

<?php

if ($error != ''){
		echo '<p align="center" class="error">'.$error.'</p>';
	}

?>

<form action='orders.php?option=2' method='post'>
<input type='hidden' name='action' value='submit'>

<table border="0" cellpadding="0" cellspacing="8" width="85%" align="center">

<tr>
	<td align="left" width="45%">
    	<span class="form_label"><strong>Order ID: </strong></span>
    </td>
    <td width="55%"><input type="text" name="orderid" size="20" value="<?php echo $_POST['orderid']; ?>" >
    </td>
</tr>

<tr>
	<td align="center" colspan="2">
		<p align="center"><input type="submit" class="body_text" name="submit" value="Search Orders"></p>
	</td>
</tr>
</table>
</form>