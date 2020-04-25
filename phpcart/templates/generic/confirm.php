<link href="../styles/stylesheet.css" rel="stylesheet" type="text/css">

	<form action="phpcart.php" method="post">

		<input type="hidden" name="action" value="submit">

		<table width="600" class="infobox" cellpadding="3" align="center">

			<tr>

				<td colspan="2" class="message"><div align="center"><strong>Please confirm your order</strong><br></div></td>

			</tr>

			<tr>

				<td align="right" class="text">First Name</td>

				<td>

					<div align="left">%%FIRSTNAME%%

			        </div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Last Name</td>

				<td>

					<div align="left">%%LASTNAME%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Email Address</td>

				<td>

					<div align="left">%%EMAIL%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Company</td>

				<td>

					<div align="left">%%COMPANY%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Address</td>

				<td>

					<div align="left">%%ADDRESS%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Address Line 2</td>

				<td>

					<div align="left">%%ADDRESS2%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">City</td>

				<td>

					<div align="left">%%CITY%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">State</td>

				<td>

					<div align="left">%%STATE%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">State Other</td>

				<td>

					<div align="left">%%STATEOTHER%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Zip Code</td>

				<td>

					<div align="left">%%ZIP%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Country</td>

				<td>

					<div align="left">%%COUNTRY%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Phone</td>

				<td>

					<div align="left">%%PHONE%%</div>

				</td>

			</tr>

			<tr>

				<td align="right" class="text">Payment Method</td>

				<td>

					<div align="left">%%PAYMENTMETHOD%%

                	</div>

				</td>

			</tr>

			<!-- BEGIN COMMENTS -->

			<tr>

				<td align="right" class="text">Comments</td>

				<td align="left">%%COMMENTS%%</td>

			</tr>

			<!-- END COMMENTS -->

			<!-- BEGIN CREDITCARD -->

			<tr>

				<td align="right" class="text">Card Type : </td>

				<td align="left">%%CCTYPE%%				</td>

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

				<td align="center"><a href="?action=view">View Cart</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=checkout">Edit Billing</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"><br />
                    <!-- BEGIN SHIPPINGRETURN -->
                    <a href="?action=shipping&source=confirm">Edit Shipping</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11">
                    <!-- END SHIPPINGRETURN --></td>

				<td>					

				<input type="submit" value="Click To Order">

				</td>

			</tr>

					<tr>

						<td align="left"><font size="2" face="Verdana">The prices shown are being <br>displayed 
                    	in %%CURRENCYNAME%%.</font></td>

						<td valign="top"><table width="100%" cellpadding="4" cellspacing="2" border="0">

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
									<td align="right" class="text" valign="top"><b><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%% <br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%%  <br><!-- END TAXTITLE2 -->Total Tax</b></td>

									<td align="right" class="text" valign="top"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%% <br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%% <br><!-- END SEPARATETAX2 -->%%TOTALTAX%%</td>
								</tr>

								<tr>

									<td align="right" class="text"><b>Shipping</b></td>

									<td align="right" class="text">%%SHIPPINGNAME%%<br />%%TOTALSHIPPING%%</td>

								</tr>

								<tr>

									<td align="right" class="text"><b>Total</b></td>

									<td align="right" class="text"><strong>%%GRANDTOTAL%%</strong></td>

								</tr>

							</table></td>

					</tr>

		</table>

	</form>