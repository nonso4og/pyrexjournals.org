
	<form action="phpcart.php" method="post">
	<input type="hidden" name="action" value="submit">

		<table width="100%" class="infobox" cellpadding="3">
			<col width="25%" />
        	<col width="75%" />
        
			<tr>
				<td colspan="2" class="message" align="center">
                	<strong>Please confirm your order</strong><br>
                </td>
			</tr>

			<tr>
				<td align="right" class="text">First Name</td>

				<td align="left" class="cartform">%%FIRSTNAME%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Last Name</td>

				<td align="left" class="cartform">%%LASTNAME%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Email Address</td>

				<td align="left" class="cartform">%%EMAIL%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Company</td>

				<td align="left" class="cartform">%%COMPANY%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Address</td>

				<td align="left" class="cartform">%%ADDRESS%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Address Line 2</td>

				<td align="left" class="cartform">%%ADDRESS2%%</td>
			</tr>

			<tr>
				<td align="right" class="text">City</td>

				<td align="left" class="cartform">%%CITY%%</td>
			</tr>

			<tr>
				<td align="right" class="text">State</td>

				<td align="left" class="cartform">%%STATE%%</td>
			</tr>

			<tr>
				<td align="right" class="text">State Other</td>

				<td align="left" class="cartform">%%STATEOTHER%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Zip Code</td>

				<td align="left" class="cartform">%%ZIP%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Country</td>

				<td align="left" class="cartform">%%COUNTRY%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Phone</td>

				<td align="left" class="cartform">%%PHONE%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Payment Method</td>

				<td align="left" class="cartform">%%PAYMENTMETHOD%%</td>
			</tr>
            
			<!-- BEGIN COMMENTS -->
			<tr>
				<td align="right" class="text">Comments</td>

				<td align="left" class="cartform">%%COMMENTS%%</td>
			</tr>
			<!-- END COMMENTS -->

			<!-- BEGIN CREDITCARD -->
			<tr>
				<td align="right" class="text">Card Type : </td>

				<td align="left">%%CCTYPE%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Credit Card Number : </td>

				<td align="left">%%CCNUMBER%%</td>
			</tr>

			<tr>
				<td align="right" class="text">Expiration Date (mm/yyyy) : </td>

				<td align="left">%%CCMONTH%%	/ %%CCYEAR%%	
			</tr>

			<tr>
				<td align="right" class="text">CVV Code : </td>

				<td align="left">%%CVVCODE%%</td>
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
				<td align="left" class="smtext">The prices shown are being <br>displayed 
                    	in %%CURRENCYNAME%%.</td>

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