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

// create page tokens
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

?>

    
<p align="center" class="page_title"><b>Hyperlink Verification Key</b></p>

<form name="form1" method="post" action="button_maker.php?option=8">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<table border="0" cellspacing="4" cellpadding="1" width="650" align="center">
<tr>
	<td width="300px" class="form_label">
    	<b>Enter your values here:</b>
    </td>
    
    <td>
    	<input name="info" type="text" size="60" value="<?php echo $_POST["info"]; ?>">
	</td>
</tr>

<tr>
	<td colspan="2" align="center">
		<input type="submit" class="body_text" name="submit" value="Make Key">
		<input type="reset" class="body_text" value="Reset">
	</td>
</tr>
</table>
</form>
 
 <br>
   
	<table border="1" cellpadding="4" cellspacing="0" align="center">
    
    <tr>
    	<td colspan="2" align="center" class="page_title">
			<strong>Creating </strong><b>Hyperlink</b><strong> Keys For Products</strong>
        </td>
   </tr>
            
    <tr>
    	<td colspan="2" align="left" class="body_text">
            Create a string with the following product definition variables:<br>
            $id$descr$price$shipping$shipping1$shipping2$weight$tax$taxrateid
        </td>
    </tr>
    
    <tr>
		<td valign="top" class="page_title"><strong>Example 1:</strong></td>
        <td class="body_text"> id = MW100<br>
        		description = Lightweight Windbreaker<br> 
                price = 79.95<br>
                shipping = 5.00<br>
                shipping1 = 3.00<br>
                weight = 0<br>
                tax = 5%<br>
                taxrateid = 1
        </td>
    </tr>
    
    <tr>
    	<td colspan="2" class="body_text">
        	<p>You would enter: MW100Lightweight Windbreaker79.955.003.0051 </p>
        	<p>&nbsp;</p>
    	</td>
    </tr>
    
    <tr>
		<td valign="top" class="page_title"><strong>Example 2:</strong><br>(With price range)</td>
        <td class="body_text"> id = CV25<br>
        		description = Ball Point Pens<br> 
                price range = 2.95,1:2.45,6<br>
                weight = 5<br>
                taxrateid = 1
        </td>
    </tr>
    
    <tr>
    	<td colspan="2" class="body_text">
        	You would enter: CV25Ball Point Pens2.95,1:2.45,651</td>
    </tr>
    </table>
    	
    <br><br>
     
    <table border="1" cellpadding="4" cellspacing="0" align="center">
    
    <tr>
    	<td colspan="2" align="center" class="page_title">
			<strong>Creating <b>Hyperlink</b> Keys For Options</strong>
        </td>
   </tr>
            
    <tr>
    	<td colspan="2" align="left" class="body_text">
            Create a string with the following option definition variables:<br>
            $item$price
        </td>
    </tr>
    
    <tr>
		<td valign="top" class="page_title"><strong>Example 1:</strong></td>
        <td class="body_text"> item = Small<br>
        		price = 2.00
		</td>
    </tr>
    
     <tr>
    	<td colspan="2" class="body_text">
        	<p>You would enter: Small2.00</p>
        	<p><br>
	    </p>
        </td>
    </tr>
    
    <tr>
		<td valign="top" class="page_title"><strong>Example 2:</strong></td>
        <td class="body_text"> item = Small<br>
        		price = No Price
		</td>
    </tr>
    
     <tr>
    	<td colspan="2" class="body_text">
        	<p>You would enter: Small<br />
        	</p>
    	</td>
    </tr>

	</table>