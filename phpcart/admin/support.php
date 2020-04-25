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

require("hf.php");
pageHeader(); 
?>

<tr>
	<td colspan="2">
    
<table border="0" cellpadding="5" cellspacing="5" width="100%">
	<tr>
    	<td width="0%">&nbsp;</td>
        
		<td width="100%">
        
        <p align="center" class="page_title"><b>Documentation</b></p>
			
        <p align="center" class="support_link"><a href="../doc/phpCart_installation_quick_start.pdf" class="no_decoration" target="_blank">Installation Quick Start</a></p>
        
        <p align="center" class="support_link"><a href="../doc/phpCart_product_guide.pdf" target="_blank">Getting Started with Products</a></p>
            
        <p align="center" class="support_link"><a href="../doc/phpCart_userguide.pdf" class="no_decoration" target="_blank">User Guide</a></p>
        
        <p align="center" class="support_link"><img src="images/new.gif" width="32" height="32" align="absmiddle"> <a href="../doc/phpCart_zone_shipping.pdf" target="_blank">Shipping Zone Guide</a></p>
            
         <p align="center" class="support_link"><a href="../doc/phpCart_template_guide.pdf" class="no_decoration" target="_blank">Template Guide</a></p>
         
     
     	<p>&nbsp;</p>
            
        <p align="center" class="page_title"><b>Technical Support</b></p>
            
        <p align="center" class="support_link"><a href="http://www.phpcart.net/forum/" target="_blank">Support Forum</a></p>
		</td>
    </tr>
</table>

	</td>
</tr>
<?php pageFooter(); ?>