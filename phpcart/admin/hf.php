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

include ("../includes/functions.inc.php");
include ("../includes/filebase.inc.php");
include ("../modules/misc.inc.php");

function pageHeader() {

require("version.php");
require ("locale.php");

if (isset($_POST['form1'])){	
	$nav = $_POST['nav'];	
	header ('location: '.$nav);
	exit;
}


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>phpCart - The Simple e-Commerce Solution!</title>

<link rel="stylesheet" type="text/css" href="admin.css">

<script language="javascript">
	function switch_nav(selectobj){	
		nav = selectobj.options[selectobj.selectedIndex].value;
		window.location = nav;
	}
</script>

<script language="javascript" type="text/javascript" src="http://remote.phpcart.net/version.js"></script>

<script language="javascript" type="text/javascript" src="http://remote.phpcart.net/checker.js"></script>

</head>
<body>

<a name="top"></a>

	<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" class="maintable">
    	<!-- row 1 -->
		<tr>
			<td>
				<!-- header with logo and update table -->
				<table border="0" width="70%" cellpadding="0" cellspacing="0" align="center">
					<tr>
						<td align="left" bgcolor="#FFFFFF" valign="middle" width="556">
                        	<a href="index.php"><img border="0" src="../images/PHPCart.gif" width="301" height="72"></a>
						</td>

						<td align="right" bgcolor="#FFFFFF" valign="middle" width="200">

							&nbsp;&nbsp;&nbsp;&nbsp;

							<table border="0" cellpadding="1" cellspacing="1" width="160">
								<tr>
									<td>
										<div style="padding:6px"><fieldset class="fieldset">
											

												<table cellpadding="0" cellspacing="3" border="0" width="160">
													<tr>
														<td>
                                                        <p align="center"><b>Update Status</b></p>
				
														<p align="center">Your Version: <b><?php echo $version;?>&nbsp;</b><br>Latest Version: <b>

														<script language="javascript" type="text/javascript">document.write(phpcart_version);

														</script></b>&nbsp;&nbsp;</p>

														</td>
													</tr>
												</table>
											</fieldset>
										</div>

										<script language="Javascript" type="text/javascript">
										<!--
											if (typeof(phpcart_version) != "undefined" && isNewerVersion("<?php echo $version;?>", phpcart_version)) {
												document.write("<center><b><a href=\""+phpcart_link+"\">Update Available!</a></b></center>");
											}

										//-->
										</script>
									</td>
								</tr>
							</table>
                            
                            <b>&nbsp;</b>

						</td>
					</tr>
				</table>

			</td>
        </tr>
        
        <!-- row 2 -->
        <tr>
        	<td>
            
            
                <!-- setup main menu -->
                <table cellpadding="0" cellspacing="0" border="1" width="100%" align="center">    
                
                <!-- main menu row -->
                <tr>
                    <td colspan="2" class="theader">
                        
                                <?php include ("includes/nav/main_menu.php"); ?><br />
                               
                    </td>   
                </tr>

<?php

}

function pageFooter() {
?>


				<!-- insert footer row -->
					<tr>
						<td class="tfoot" align="center" colspan="2">
							<p align="center" class="copyright">
								Copyright &copy;2000 - <?php echo date("Y");?>  Webrigger Internet Services.<br>
								<a href="http://www.phpcart.net">www.phpCart.net</a>
                              </p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
<?php } ?>