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

include ('currency_1.php');


	if ($_SESSION["pth"] == ""){
		$_SESSION["pth"] = "/phpcart/phpcart.php";
	}
	$pth = $_SESSION["pth"];


	if ($_SESSION["qty"] == ""){
		$_SESSION["qty"] = "no";
	}
	$qty = $_SESSION["qty"];


	if ($_SESSION["lnk"] == ""){
		$_SESSION["lnk"] = "Add to Cart";
	}
	$lnk = $_SESSION["lnk"];


	if ($_SESSION["qtytext"] == ""){
		$_SESSION["qtytext"] = "Quantity";
	}
	$qtytext = $_SESSION["qtytext"];

?>

<p align="center" class="page_title"><b>HTML Form Button</b></p>


<form action="button_maker.php?option=7" method="post">

<table border=0 cellspacing=4 cellpadding=1 width="650">

<tr>
    <td width="375" class="form_label"><b>Path to phpCart:</b></td><td width="275"><input type="text" name="pth" value="<?php echo $pth; ?>" size=35>

</td></tr>

<tr>
    <td class="form_label"><b>Product ID:</b></td><td width="300"><input type="text" name="id" value="0001" size=8></td></tr>

<tr>
    <td class="form_label"><b>Product Name:</b></td><td><input type="text" name="descr" value="Blue T-Shirt" size=35></td></tr>

<tr>
    <td class="form_label"><b>Price:</b> <br />
        (e.g. Single price or range (x.00,1:y.00,5))</td><td valign="top"><input type="text" name="price" value="0.00" size=8></td></tr>

<tr>
    <td class="form_label"><b>Button Text</b>: <br />
        (e.g. Add to Cart)</td><td><input type="text" name="lnk" value="<?php echo $lnk; ?>" size=35></td></tr>

<tr>
    <td class="form_label"><b>Quantity:</b></td><td>Selectable<input name="qty" type="radio" value="yes" <?php if ($qty == "yes") echo "checked"; ?>> 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Not selectable<input name="qty" type="radio" value="no" <?php if ($qty == "no") echo "checked"; ?>></td>

</tr>

<tr>
	<td class="form_label"><b>Quantity Text: <br />
	</b> (e.g. Quantity)</td>

	<td>
    	<input type="text" name="link_text" value="<?php echo $qtytext; ?>" size=35>
    </td>
</tr>

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
	<td class="form_label"><b>Weight:</b></td>       
    <td><input type="text" name="weight" size=8></td>
</tr>

<tr>
	<td class="form_label"><b>Shipping: <br />
	    </b>(each item)</td>    
    <td><input type="text" name="shipping" size=8></td>
</tr>

<tr>
	<td class="form_label"><b>Shipping1: <br />
	    </b>(first item)</td>   
    <td><input type="text" name="shipping1" size=8></td>
</tr>

<tr>
	<td class="form_label"><b>Shipping2: <br />
	    </b>(each additional item)</td>    
    <td><input type="text" name="shipping2" size=8></td>
</tr>

<tr>
	<td class="form_label"><b>Tax Rate ID:</b></td>
	<td><select name="taxrateid"><option value="">None</option><option value="1">Tax Rate 1</option><option value="2">Tax Rate 2</option><option value="3">Tax Rate 3</option></select></td>
</tr>

<tr>
	<td colspan="2" class="form_label">
		<div align="center">
	    	<p class="style1">&nbsp;</p>
	    	<p class="style1"><strong>You can add drop down box options.</strong></p>
		</div>
	</td>
</tr>

<tr>
    <td class="form_label"><b>Option 1 Title:</b></td>
    <td><input type="text" name="optiontext1" size=25></td>
</tr>

<tr>
    <td class="form_label"><b>List options for Option 1: <br />
        (name:price)</b> <br />
        (put a name:price combinations on indiviudal lines)</td>
    <td><textarea name="option1"></textarea></td>
</tr>
        
<tr>
    <td class="form_label"><strong>Make Option 1 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory1" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
	<td class="form_label"><b>Option 2 Title:</b></td><td><input type="text" name="optiontext2" size=25>

</td>
</tr>

<tr>
	<td class="form_label"><b>List options for Option 2: <br />
	    (name:price</b> )<br />
(put a name:price combinations on indiviudal lines)</td>
	<td><textarea name="option2"></textarea></td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 2 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory2" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
	<td class="form_label"><b>Option 3 Title:</b></td>
    <td><input type="text" name="optiontext3" size=25></td>
</tr>

<tr>
	<td class="form_label"><b>List options for Option 3: <br />
	    (name:price)</b> <br />
(put a name:price combinations on indiviudal lines)</td>
	<td><textarea name="option3"></textarea></td>
</tr>

<tr>
	<td class="form_label"><strong>Make Option 3 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory3" value="1"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>

<!-- Check Boxes -->

<tr>
	<td colspan="2" class="form_label">
		<div align="center">
	    	<p class="style1">&nbsp;</p>
	    	<p class="style1"><strong>You can add check box options.</strong></p>
		</div>
	</td>
</tr>

<tr>
    <td class="form_label"><b>Option 4 Title:</b></td>
    <td><input type="text" name="optiontext4" size=25></td>
</tr>

<tr>
    <td class="form_label"><b>List options for Option 4: <br />
        (name:price)</b> <br />
        (put a name:price combinations on indiviudal lines)</td>
    <td><textarea name="option4"></textarea></td>
</tr>
        
<tr>
    <td class="form_label"><strong>Make Option 4 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory4" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td class="form_label"><b>Option 5 Title:</b></td>
    <td><input type="text" name="optiontext5" size=25></td>
</tr>

<tr>
	<td class="form_label"><b>List options for Option 5: <br />
	    (name:price</b> )<br />
(put a name:price combinations on indiviudal lines)</td>
	<td><textarea name="option5"></textarea></td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 5 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory5" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td class="form_label"><b>Option 6 Title:</b></td>
    <td><input type="text" name="optiontext6" size=25></td>
</tr>

<tr>
	<td class="form_label"><b>List options for Option 6: <br />
	    (name:price)</b> <br />
(put a name:price combinations on indiviudal lines)</td>
	<td><textarea name="option6"></textarea></td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 6 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory6" value="1"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>

<!-- Radio Boxes -->

<tr>
	<td colspan="2" class="form_label">
		<div align="center">
	    <p class="style1">&nbsp;</p>
	    <p class="style1"><strong>You can add radio box options.</strong></p>
		</div>
	</td>
</tr>

<tr>
    <td class="form_label"><b>Option 7 Title:</b></td>
    <td><input type="text" name="optiontext7" size=25></td>
</tr>

<tr>
    <td class="form_label"><b>List options for Option 7: <br />
        (name:price)</b> <br />
        (put a name:price combinations on indiviudal lines)</td>
    <td><textarea name="option7"></textarea></td>
</tr>
        
<tr>
    <td class="form_label"><strong>Make Option 7 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory7" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td class="form_label"><b>Option 8 Title:</b></td>
    <td><input type="text" name="optiontext8" size=25></td>
</tr>

<tr>
	<td class="form_label"><b>List options for Option 8: <br />
	    (name:price</b> )<br />
(put a name:price combinations on indiviudal lines)</td>
	<td><textarea name="option8"></textarea></td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 8 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory8" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td class="form_label">
    	<b>Option 9 Title:</b></td>
    
    <td>
    	<input type="text" name="optiontext9" size=25>
	</td>
</tr>

<tr>
	<td class="form_label">
    	<b>List options for Option 9: <br />
    	(name:price)</b> <br />
(put a name:price combinations on indiviudal lines)
	</td>

	<td>
    	<textarea name="option9"></textarea>
	</td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 9 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory9" value="1"></td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>


<!-- Text Boxes -->

<tr>
	<td colspan="2" class="form_label">
		<div align="center">
	    <p class="style1">&nbsp;</p>
	    <p class="style1"><strong>You can add text box options.</strong></p>
		</div>
	</td>
</tr>

<tr>
    <td class="form_label"><b>Option 10 Title:</b></td>
    <td><input type="text" name="optiontext10" size=25></td>
</tr>

<tr>
    <td class="form_label"><b>Option 10 Price Adder:</b></td>
    <td><input type="text" name="optionprice10" size=25></td>
</tr>
        
<tr>
    <td class="form_label"><strong>Make Option 10 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory10" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td class="form_label"><b>Option 11 Title:</b></td>
    <td><input type="text" name="optiontext11" size=25></td>
</tr>

<tr>
    <td class="form_label"><b>Option 11 Price Adder:</b></td>
    <td><input type="text" name="optionprice11" size=25></td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 11 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory11" value="1"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
    <td class="form_label"><b>Option 12 Title:</b></td>    
    <td><input type="text" name="optiontext12" size=25></td>
</tr>

<tr>
    <td class="form_label"><b>Option 12 Price Adder:</b></td>
    <td><input type="text" name="optionprice12" size=25></td>
</tr>

<tr>
    <td class="form_label"><strong>Make Option 12 Mandatory?</strong></td>
	<td><input type="checkbox" name="optionmandatory12" value="1"></td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>


<tr>
	<td colspan="2" align="center">
        <input type="submit" class="body_text" name="submit"  value="Make Button">
		<input type="reset" class="body_text" value="Reset">
	</td>
</tr>
</table>
</form>