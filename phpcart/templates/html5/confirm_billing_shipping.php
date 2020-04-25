<form action="phpcart.php" method="post">
<input type="hidden" name="action" value="submit">

		<table width="100%" class="infobox" cellpadding="3" cellspacing="0">
			<tr>
				<td colspan="2" class="message">
                	<div align="center"><strong>Please confirm your order</strong><br></div>
                </td>
			</tr>
        </table>

		<div id="billingTable">

            <table width="100%" class="infobox" cellpadding="5" cellspacing="0" border="0">
                <tr>
                    <td colspan="2" align="center">
                        <strong>Billing Information</strong></td>
                </tr>

                <tr>
                    <td align="right" width="30%">First Name:&nbsp;&nbsp;</td>

                    <td align="left" class="cartform" width="70%">&nbsp;&nbsp;%%FIRSTNAME%%</td>
                </tr>

                <tr>
                    <td align="right">Last Name:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%LASTNAME%%</td>
                </tr>

                <tr>
                    <td align="right">Company:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%COMPANY%%</td>
                </tr>

                <tr>
                    <td align="right">Address:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%ADDRESS%%</td>
                </tr>

                <tr>
                    <td align="right">Address Line 2:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%ADDRESS2%%</td>
                </tr>

                <tr>
                    <td align="right">City:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%CITY%%</td>
                </tr>

                <tr>
                    <td align="right">State:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%STATE%%</td>
                </tr>

                <tr>
                    <td align="right">Zip Code:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%ZIP%%</td>
                </tr>

                <tr>
                    <td align="right">Country:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%COUNTRY%%</td>
                </tr>

                <tr>
                    <td align="right">Phone:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%PHONE%%</td>
                </tr>

                <tr>
                    <td align="right">Email Address:&nbsp;&nbsp;</td>

                    <td align="left">&nbsp;&nbsp;%%EMAIL%%</td>
                </tr>
            </table>

		</div>

		<div id="billingTable">
            <!-- BEGIN SHIPPING -->
                <table width="100%" class="infobox" cellpadding="5" cellspacing="0">

                 <tr>
                    <td colspan="2" align="center">
                        <strong>Shipping Information</strong></td>
                </tr>

                    <tr>
                        <td align="right" width="30%">First Name:&nbsp;&nbsp;</td>

                        <td align="left" class="cartform" width="70%">&nbsp;&nbsp;%%SFIRSTNAME%%</td>
                    </tr>

                    <tr>
                        <td align="right">Last Name:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SLASTNAME%%</td>
                    </tr>

                    <tr>
                        <td align="right">Company:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SCOMPANY%%</td>
                    </tr>

                    <tr>
                        <td align="right">Address:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SADDRESS%%</td>
                    </tr>

                    <tr>
                        <td align="right">Address Line 2:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SADDRESS2%%</td>
                    </tr>

                    <tr>
                        <td align="right">City:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SCITY%%</td>
                    </tr>

                    <tr>
                        <td align="right">State:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SSTATE%%</td>
                    </tr>

                    <tr>
                        <td align="right">Zip Code:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SZIP%%</td>
                    </tr>

                    <tr>
                        <td align="right">Country:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SCOUNTRY%%</td>
                    </tr>

                    <tr>
                        <td align="right">Phone:&nbsp;&nbsp;</td>

                        <td align="left">&nbsp;&nbsp;%%SPHONE%%</td>
                    </tr>

                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table>
            <!-- END SHIPPING -->
		</div>
			
		<table width="100%" class="infobox" cellpadding="5">
			<tr>
				<td align="right" class="text">Payment Method</td>

				<td align="left">&nbsp;&nbsp;%%PAYMENTMETHOD%%</td>
			</tr>

			<!-- BEGIN COMMENTS -->
			<tr>
				<td align="right" class="text">Comments:&nbsp;&nbsp;</td>

				<td align="left">&nbsp;&nbsp;%%COMMENTS%%</td>
			</tr>
			<!-- END COMMENTS -->

			<!-- BEGIN CREDITCARD -->
			<tr>
				<td align="right" class="text">Card Type:&nbsp;&nbsp;</td>

				<td align="left">&nbsp;&nbsp;%%CCTYPE%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Credit Card Number:&nbsp;&nbsp;</td>

				<td align="left">&nbsp;&nbsp;%%CCNUMBER%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Expiration Date (mm/yyyy):&nbsp;&nbsp;</td>

				<td align="left">&nbsp;&nbsp;%%CCMONTH%%	/ %%CCYEAR%%
			</tr>

			<tr>
				<td align="right" class="text">CVV Code:&nbsp;&nbsp;</td>

				<td align="left">&nbsp;&nbsp;%%CVVCODE%%</td>
			</tr>
			<!-- END CREDITCARD -->

			<tr>
				<td align="center">
                	<a href="?action=view">View Cart</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"><br />
                    <a href="?action=checkout">Edit Billing</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"><br />
                    <!-- BEGIN SHIPPINGRETURN -->
                    <a href="?action=shipping&source=confirm">Edit Shipping</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11">
                    <!-- END SHIPPINGRETURN -->
                </td>

				<td align="left"><input type="submit" value="Click To Order"></td>
			</tr>

            <tr>
                <td align="left" class="smtext">The prices shown are being <br>displayed in %%CURRENCYNAME%%.></td>

                <td valign="top">
                    <table width="100%" cellpadding="4" cellspacing="2" border="0">
                        <tr>
                            <td width="65%" align="right" class="text"><b>Sub Total</b></td>

                            <td width="35%" align="right" class="text">%%SUBTOTAL%%</td>
                        </tr>

                        <!-- BEGIN DISCOUNT -->
                        <tr>

                            <td align="right" class="text"><b>Discount</b></td>

                            <td align="right" class="text">%%DISCOUNT%%</td>
                        </tr>
                        <!-- END DISCOUNT -->
                        
                        <tr>
                            <td align="right" class="text"><b>Shipping</b></td>

                            <td align="right" class="text">%%SHIPPINGNAME%%<br />%%TOTALSHIPPING%%</td>
                        </tr>

                        <tr>
                            <td align="right" class="text" valign="top"><b><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%% <br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%%  <br><!-- END TAXTITLE2 -->Total Tax</b></td>

                            <td align="right" class="text" valign="top"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%% <br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%% <br><!-- END SEPARATETAX2 -->%%TOTALTAX%%</td>
                        </tr>

                        <tr>
                            <td align="right" class="text"><b>Total</b></td>

                            <td align="right" class="text"><strong>%%GRANDTOTAL%%</strong></td>
                        </tr>

                    </table>
                    
                </td>
            </tr>
		</table>
	</form>