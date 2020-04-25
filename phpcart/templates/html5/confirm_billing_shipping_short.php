<link href="../styles/stylesheet.css" rel="stylesheet" type="text/css">

<center>

	<form action="phpcart.php" method="post">

		<input type="hidden" name="action" value="submit">

		<table width="600" class="infobox" cellpadding="3">

			<tr>

				<td colspan="2" class="message"><div align="center"><strong>Please confirm your order</strong><br></div></td>

			</tr>

			<tr>

				<td width="50%" valign="top">

					<table width="100%" class="infobox" cellpadding="5" cellspacing="0">

						<tr>

							<td colspan="2" align="center"><strong>Billing Information</strong></td>

						</tr>

						<tr>

							<td align="right">Name</td>

							<td>

								<div align="left">%%FIRSTNAME%% %%LASTNAME%%

								</div>

							</td>

						</tr>

						<tr>

							<td align="right">Company</td>

							<td>

								<div align="left">%%COMPANY%%</div>

							</td>

						</tr>

						<tr>

							<td align="right" valign="top">Address</td>

							<td>

								<div align="left">%%ADDRESS%% %%ADDRESS2%%<br />%%CITY%%, %%STATE%% %%ZIP%% %%COUNTRY%%</div>

							</td>

						</tr>

						<tr>

							<td align="right">Phone</td>

							<td>

								<div align="left">%%PHONE%%</div>

							</td>

						</tr>

						<tr>

							<td align="right">Email Address</td>

							<td>

								<div align="left">%%EMAIL%%</div>

							</td>

						</tr>

					</table>

				</td>

				<!-- BEGIN SHIPPING -->

				<td width="50%" valign="top">

					<table width="100%" class="infobox" cellpadding="5" cellspacing="0">

						<tr>

							<td colspan="2" align="center"><strong>Shipping Information</strong></td>

						</tr>

						<tr>

							<td align="right">Name</td>

							<td>

								<div align="left">%%SFIRSTNAME%% %%SLASTNAME%%

								</div>

							</td>

						</tr>

						<tr>

							<td align="right">Company</td>

							<td>

								<div align="left">%%SCOMPANY%%</div>

							</td>

						</tr>

						<tr>

							<td align="right">Address</td>

							<td>

								<div align="left">%%SADDRESS%% %%SADDRESS2%%<br />%%SCITY%%, %%SSTATE%% %%SZIP%% %%SCOUNTRY%%</div>

							</td>

						</tr>

						<tr>

							<td align="right">Phone</td>

							<td>

								<div align="left">%%SPHONE%%</div>

							</td>

						</tr>

					</table>

				</td>

				<!-- END SHIPPING -->

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
            	<td colspan="2">
                	<table border="0" cellspacing="1" cellpadding="1" width="100%">
                    
  <tr>
    <td align="center" bgcolor="#E6E6E6">ROW</td>
    <td align="center" bgcolor="#E6E6E6">Name</td>
    <td align="center" bgcolor="#E6E6E6">Price</td>
    <td align="center" bgcolor="#E6E6E6">Qty</td>
    <td align="center" bgcolor="#E6E6E6">Total</td>
  </tr>
  <!-- BEGIN CARTITEMS -->
  <tr>
    <td align="center">%%ROW%%</td>
    <td align="left">%%NAME%%<br />%%OPTIONS%%</td>
    <td align="right">%%PRICE%%</td>
    <td align="center">%%QUANTITY%%</td>
    <td align="right">%%TOTAL%%</td>
  </tr>
  <!-- END CARTITEMS -->
  <tr>
    <td></td>
    <td></td>
    <td align="right" bgcolor="#E6E6E6" valign="bottom" colspan="2">TOTAL</td>
    <td align="right" bgcolor="#E6E6E6" valign="bottom">%%GRANDTOTAL%%</td>
  </tr>

</table>
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

							</table></td>

					</tr>

		</table>

	</form>

</center>

