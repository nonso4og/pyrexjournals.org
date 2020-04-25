<script language="javascript" src="templates/popups.js"></script>

<table width="90%" class="infobox shippingPage" cellpadding="5" cellspacing="0" align="center">
	<tr>
    	<td colspan="2" align="center" class="blockheading">
        	<h3>Billing and Shipping Information</h3>
        </td>
    </tr>
	
    <!-- BEGIN INVALID -->
	<tr>
		<td colspan="2" class="error" align="center">
        	<strong>We are unable to calculate your shipping charges at this time.<br>
            Please go back to the billing screen and try again.<br> 
            If this problem continues, please contact us to finalzie your order.</strong>
        </td>
	</tr>
	<!-- END INVALID -->
    
	<tr>
		<td><strong>Billing Information:</strong><br />
		%%FIRSTNAME%% %%LASTNAME%%<br />
		%%ADDRESS%% %%ADDRESS2%%<br />
		%%CITY%%, %%STATE%% %%ZIP%%<br />
		%%COUNTRY%%<br />
		Phone: %%PHONE%%
		</td>
        
		<td><strong>Shipping Information:</strong><br />
		%%SFIRSTNAME%% %%SLASTNAME%%<br />
		%%SADDRESS%% %%SADDRESS2%%<br />
		%%SCITY%%, %%SSTATE%% %%SZIP%%<br />
		%%SCOUNTRY%%<br />
		Phone: %%SPHONE%%
		</td>
	</tr>
	</table>
    
    
	<!-- BEGIN SHIPPING -->
	<h3>Shipping Options</h3>
    
			<form method="post" name="shippingform" action="phpcart.php">
			<input type="hidden" name="action" value="confirm" />
            <input type="hidden" name="updateshipping" id="updateshipping" value="">
            
			<table width="90%" class="infobox shippingPage" cellpadding="5" cellspacing="0" align="center">
				<tr class="blockheading">
					<td align="center" width="20%"><strong>Select</strong></td>
					<td align="center" width="60%"><strong>Shipping Service </strong></td>
					<td align="center" width="20%"><strong>Rate</strong></td>
				</tr>
                
				<!-- BEGIN SHIPPINGCHOICES -->
				<tr>
					<td align="center">
                    	<input type="radio" name="shippingid" value="%%SHIPPINGID%%" %%CHECKED%% />
                    </td>
                    
					<td align="center">&nbsp;%%SHIPPINGMETHOD%%</td>
                    
					<td align="left">&nbsp;&nbsp;%%SHIPPINGRATE%%&nbsp;</td>
				</tr>
				<!-- END SHIPPINGCHOICES -->

			</table>
			
            
            <p>&nbsp;</p>
            <p align="center"><input type="submit" value="Submit" /></p>
            </form>
	<!-- END SHIPPING -->
    
	<p>&nbsp;</p>
    
    <p><a href="?action=view">View Cart</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"> <a href="?action=checkout">Back to Billing</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"></p>
    