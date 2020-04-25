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

require("currency_1.php");

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

if ($_SESSION["pth"] == ""){
	$_SESSION["pth"] = "/phpcart/phpcart.php";
}
$pth = $_SESSION["pth"];


if ($_SESSION["img"] == ""){
	$_SESSION["img"] = "/images/addtocart.gif";
}
$img = $_SESSION["img"];

?>

<p align="center" class="page_title"><b>Hyperlink Button with Image </b></p>

<form action="button_maker.php?option=6" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border=0 cellspacing=4 cellpadding=1 width="600">

<tr>
	<td width="300" class="form_label">
    	<b>Path to phpCart:</b>
    </td>
    
    <td width="300">
    	<input type="text" name="pth" value="<?php echo $pth; ?>" size=35>
    </td>
</tr>

<tr>

	<td class="form_label"><b>Path to image:</b></td>

	<td><input type="text" name="img" value="<?php echo $img; ?>" size=35></td></tr>

<tr>
    <td class="form_label"><b>Product ID:</b></td><td><input type="text" name="id" value="0001" size=8></td></tr>

<tr>
    <td class="form_label"><b>Product Name:</b></td><td><input type="text" name="descr" value="Blue T-Shirt" size=35></td></tr>

<tr>
    <td class="form_label"><b>Price:</b></td><td><input type="text" name="price" value="0.00" size=8></td></tr>

<tr>
	<td colspan="2" align="center">
		<input type="submit" class="body_text" name="Submit" value="Make Button">
		<input type="reset" class="body_text" value="Reset">
	</td>
</tr>

<tr>
	<td colspan="2" align="center">
	    <p><hr></p>
	    <p class="form_label"><strong>The below variables are all optional.</strong></p>
	</td>
</tr>

<tr>
	<td class="form_label">
    	<b>Currency:</b>
        <br />
	(Without selection, cart will use primary currency)</td>
    
	<td width="45%">
        <select name="currency">
        <option value='' selected>Select Currency</option>
        <?php			
            //loop on each element in Currency array
			$currencys = explode(";",$currencyarray);	
			$currencyarray = "";
	
			foreach ($currencys as $currency){
		
				$currencydata = explode(":",$currency);
				
				echo '<option value="'.$currencydata[1].'"';
					if ($_POST['currency'] == $currencydata[1]){ echo ' selected'; }
                echo '>'.$currencydata[0];
				
					// if primary is Y, return it
				if ($currencydata[3] == 'Y'){
					echo ' - Primary Currency';
				}
                echo '</option>';			
			} // end foreach loop
        ?>
        </select>            
    </td>
</tr>



<tr>
    <td class="form_label"><b>Weight:</b></td><td><input type="text" name="weight" size=8></td></tr>

<tr>
    <td class="form_label"><b>Shipping: <br />
        </b>(each item)</td><td><input type="text" name="shipping" size=8></td></tr>

<tr>
    <td class="form_label"><b>Shipping1: <br />
        </b>(first item)</td><td><input type="text" name="shipping1" size=8></td></tr>

<tr>
    <td class="form_label"><b>Shipping2: <br />
        </b>(each additional item)</td><td><input type="text" name="shipping2" size=8></td></tr>

<tr>
    <td class="form_label"><b>Tax Rate ID:</b></td><td><select name="taxrateid"><option value="">None</option><option value="1">Tax Rate 1</option><option value="2">Tax Rate 2</option><option value="3">Tax Rate 3</option></select></td></tr>

<tr>
	<td colspan="2" align="center">
		<input type="submit" class="body_text" name="Submit" value="Make Button">
		<input type="reset" class="body_text" value="Reset">
	</td>
</tr>
</table>

</form>