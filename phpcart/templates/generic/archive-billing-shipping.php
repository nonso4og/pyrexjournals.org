<script language="JavaScript">

<!--
function setshipping(){

	if (document.billingform.shippingsame.checked){

		document.billingform.sfirstname.value = document.billingform.firstname.value;
		document.billingform.slastname.value = document.billingform.lastname.value;
		document.billingform.saddress.value = document.billingform.address.value;
		document.billingform.saddress2.value = document.billingform.address2.value;
		document.billingform.scompany.value = document.billingform.company.value;
		document.billingform.scity.value = document.billingform.city.value;
		document.billingform.sstate.value = document.billingform.state.value;
		document.billingform.sstateother.value = document.billingform.stateother.value;
		document.billingform.szip.value = document.billingform.zip.value;
		document.billingform.scountry.value = document.billingform.country.value;
		document.billingform.sphone.value = document.billingform.phone.value;

		document.billingform.sfirstname.readOnly = true;
		document.billingform.slastname.readOnly = true;
		document.billingform.saddress.readOnly = true;
		document.billingform.saddress2.readOnly = true;
		document.billingform.scompany.readOnly = true;
		document.billingform.scity.readOnly = true;
		document.billingform.sstate.disabled = true;
		document.billingform.sstateother.readOnly = true;
		document.billingform.szip.readOnly = true;
		document.billingform.scountry.disabled = true;
		document.billingform.sphone.readOnly = true;
		
		document.billingform.state.onchange = function (){updateShipping();};
		document.billingform.stateother.onchange = function (){updateShipping();};
		document.billingform.country.onchange = function (){updateShipping();};
	}
	else {

		document.billingform.sfirstname.readOnly = false;
		document.billingform.slastname.readOnly = false;
		document.billingform.saddress.readOnly = false;
		document.billingform.saddress2.readOnly = false;
		document.billingform.scompany.readOnly = false;
		document.billingform.scity.readOnly = false;
		document.billingform.sstate.disabled = false;
		document.billingform.sstateother.readOnly = false;
		document.billingform.szip.readOnly = false;
		document.billingform.scountry.disabled = false;
		document.billingform.sphone.readOnly = false;
	}
}

function updateShipping(){

	if (document.billingform.shippingsame.checked){
		

		form=document.getElementById('billingform');
	
		form.target='_self';
		form.action='phpcart.php';
		document.billingform.action.value = 'checkout';
		document.billingform.updateshipping.value='Y';
		document.billingform.sstate.disabled = false;
		document.billingform.scountry.disabled = false;
	
		document.billingform.sstate.value = document.billingform.state.value;
		document.billingform.scountry.value = document.billingform.country.value;
		
		form.submit();
	}
	else {
		form=document.getElementById('billingform');
	
		form.target='_self';
		form.action='phpcart.php';
		document.billingform.action.value = 'checkout';
		document.billingform.updateshipping.value='Y';
		document.billingform.sstate.disabled = false;
		document.billingform.scountry.disabled = false;
	
		form.submit();
	}
}


//-->

</script> 

<link href="../styles/stylesheet.css" rel="stylesheet" type="text/css">

	<form action="phpcart.php" method="post" name="billingform" id="billingform">
	<input type="hidden" name="action" value="confirm">
    <input type="hidden" name="updateshipping" id="updateshipping" value="">

		<table width="100%" cellpadding="1" class="infobox" align="center">

            <!-- BEGIN VALIDATION -->

			<tr>

				<td colspan="2" class="error"><div align="left"><strong>The following fields must be filled out:</strong><br>

				%%VALIDATION%%</div></td>

			</tr>

            <!-- END VALIDATION -->

			<tr>

				<td colspan="2"><div align="center"><strong>Please enter your billing information.</strong><br> 

				Complete the form below and click on the button below to complete this order. </div></td>

			</tr>

			<tr>

				<th colspan="2">

					<b>Note:</b> You will be taken to our Secure 128Bit Payment Gateway Server.</th>

			</tr>

			<tr>

				<td valign="top">

					<table width="100%" class="infobox" cellpadding="5">

						<tr>

							<td align="center"><strong>Billing Information</strong></td>

						</tr>

						<tr height="55px">

							<td align="left">Email Address<br>

								<input name="email" type="text" class="cartform" value="%%EMAIL%%" size="25">

								%%EMAILREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">First Name<br>

								<input name="firstname" type="text" class="cartform" value="%%FIRSTNAME%%" size="25" onchange="setshipping()">

								%%FIRSTNAMEREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Last Name<br>

								<input name="lastname" type="text" class="cartform" value="%%LASTNAME%%" size="25" onchange="setshipping()">

								%%LASTNAMEREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Company<br>

								

								<input name="company" type="text" class="cartform" value="%%COMPANY%%" size="25" onchange="setshipping()"></div>

							</td>

						</tr>

						<tr>

							<td align="left">Address<br>

								

								<input name="address" type="text" class="cartform" value="%%ADDRESS%%" size="25" onchange="setshipping()">

							%%ADDRESSREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Address Line 2<br>

								

								<input name="address2" type="text" class="cartform" value="%%ADDRESS2%%" size="25" onchange="setshipping()">

							</div></td>

						</tr>

						<tr>

							<td align="left">City<br>

								

								<input name="city" type="text" class="cartform" value="%%CITY%%" size="12" onchange="setshipping()">

							%%CITYREQUIRED%%

							</td>

						</tr>

						<tr>
							<td align="left">State<br>
								<select name="state" size="1" class="cartform" onclick="setshipping() ">
									<option value="">Choose a State</option>
									%%STATES%%
								</select>
							%%STATEREQUIRED%%
							</td>
						</tr>

						<tr>

							<td align="left">State Other<br>

								

								<input name="stateother" type="text" class="cartform" value="%%STATEOTHER%%" size="15" maxlength="30" onchange="setshipping()">

							</td>

						</tr>

						<tr>

							<td align="left">Zip Code<br>

									

									<input name="zip" type="text" class="cartform" value="%%ZIP%%" size="12" maxlength="10" onchange="setshipping()">

							%%ZIPREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Country<br />

								<select name="country" size="1" class="cartform" onclick="setshipping()">

									<option value="">Choose a Country</option>

								%%COUNTRIES%%

								</select>

							%%COUNTRYREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Phone<br>

								

								<input name="phone" type="text" class="cartform" value="%%PHONE%%" size="14" onchange="setshipping()">

							%%PHONEREQUIRED%%

							</td>

						</tr>

					</table>

				</td>

				<td width="50%" valign="top">

					<table width="100%" class="infobox" cellpadding="5">

						<tr>

							<td align="center"><strong>Shipping Information</strong></td>

						</tr>

						<tr height="55px">

							<td align="left">
                           <input name="shippingsame" type="checkbox" class="cartform" value="Y" onchange="setshipping(); updateShipping();" %%SHIPPINGSAMECHECKED%%> Shipping is same as billing
						
							<tr>

							<td align="left">First Name<br>

								<input name="sfirstname" type="text" class="cartform" id="sfirstname" value="%%SFIRSTNAME%%" size="25">
								
								%%SFIRSTNAMEREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Last Name<br>

								<input name="slastname" type="text" class="cartform" id="slastname" value="%%SLASTNAME%%" size="25">

								%%SLASTNAMEREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Company<br>

								

								<input name="scompany" type="text" class="cartform" id="scompany" value="%%SCOMPANY%%" size="25">

							</td>

						</tr>

						<tr>

							<td align="left">Address<br>

								

								<input name="saddress" type="text" class="cartform" id="saddress" value="%%SADDRESS%%" size="25">

							%%SADDRESSREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Address Line 2<br>

								

								<input name="saddress2" type="text" class="cartform" id="saddress2" value="%%SADDRESS2%%" size="25">

							</td>

						</tr>

						<tr>

							<td align="left">City<br>

								

								<input name="scity" type="text" class="cartform" id="scity" value="%%SCITY%%" size="12">

							%%SCITYREQUIRED%%

							</td>

						</tr>

						<tr>
							<td align="left">State<br>					
								<select name="sstate" size="1" class="cartform" id="sstate" onchange="updateShipping()">                        
                            		<option value="">Choose a State</option>
									%%SSTATES%%					
								</select>
		        				%%STATEREQUIRED%%
							</td>
						</tr>

						<tr>

							<td align="left">State Other<br>

								

								<input name="sstateother" type="text" class="cartform" id="sstateother" value="%%SSTATEOTHER%%" size="15" maxlength="30" onchange="updateShipping()">

							</td>

						</tr>

						<tr>

							<td align="left">Zip Code<br>

									

									<input name="szip" type="text" class="cartform" id="szip" value="%%SZIP%%" size="12" maxlength="10" >

							%%SZIPREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left" >Country<br />								

								<select name="scountry" size="1" class="cartform" id="scountry" onchange="updateShipping()">

									<option value="">Choose a Country</option>

								%%SCOUNTRIES%%

								</select>

							%%COUNTRYREQUIRED%%

							</td>

						</tr>

						<tr>

							<td align="left">Phone<br>

								

								<input name="sphone" type="text" class="cartform" id="sphone" value="%%SPHONE%%" size="14">

							%%SPHONEREQUIRED%%

							</td>

						</tr>

					</table>

				</td>

			</tr>

			<!-- BEGIN COMMENTS -->

			<tr>

				<td align="left" colspan="2"><p>Comments<br />

						<textarea name="comments" cols="65" rows="3" class="cartform">%%COMMENTS%%</textarea> 

						<br />

						<br />

				</p>

				</td>

			</tr>

			<!-- END COMMENTS -->


			<tr>

				<td align="right">Payment Method&nbsp;</td>

							<td><div align="left">

					<select name="paymentmethod" size="1" class="cartform" onchange="showDiv(this.value);">

						<option value="">Select Payment Method</option>

						%%PAYMENTMETHODS%%

					</select>

							</div>

				</td>

			</tr>
            

			<!-- BEGIN CREDITCARD -->

			<tr>
            	<td colspan="2" align="center">

				<table align="center" id="manual" class="hiddenDiv" width="100%">
                <tr>

				<td colspan="2" align="left"><strong>If you are paying via credit card please fill out the fields below</strong></td>

			</tr>

			<tr>

				<td align="right">Card Type:&nbsp;</td>

				<td align="left"><select name="cctype" class="cartform">

				<option value="">Select Credit Card Type</option>

				%%CCTYPES%%

				</select>

					%%CCTYPEREQUIRED%%

				</td>

			</tr>

			<tr>

				<td align="right">Credit Card Number:&nbsp;</td>

				<td align="left"><input type="text" name="ccnumber" size="24" value="%%CCNUMBER%%" class="cartform">

				%%CCNUMBERREQUIRED%%</td>

			</tr>

			<tr>

				<td align="right">Expiration Date (mm/yyyy):&nbsp;</td>

				<td align="left"><select name="ccmonth" class="cartform">

				<option value="">Select Month</option>

				%%CCMONTHS%%

				</select>

				

				<select name="ccyear" class="cartform">

				<option value="">Select Year</option>

				%%CCYEARS%%

				</select>

				%%CCEXPIREREQUIRED%% 			

			</tr>

			<tr>

				<td align="right">CVV Code:&nbsp;</td>

				<td align="left"><input type="text" name="cvvcode" size="5" value="%%CVVCODE%%" class="cartform">

				%%CVVREQUIRED%%</td>

			</tr>
			</table>
            
            </td></tr>

			<!-- END CREDITCARD -->

			<tr><td align="center"><a href="?action=view">View Cart</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"></td><td>					

				<input type="submit" value="Continue With Your Order" onclick="setshipping()">

				</td>

			</tr>

					<tr>

						<td align="left"><font size="2" face="Verdana">The prices shown are being <br>displayed 
                    	in %%CURRENCYNAME%%.</font></td>

						<td valign="top"><table width="100%" cellpadding="5" class="infobox">

								<tr>

									<td width="45%" align="right"><b>Sub Total</b></td>

									<td width="55%" align="right">%%SUBTOTAL%% &nbsp;</td>

								</tr>

<!-- BEGIN DISCOUNT -->

								<tr>

									<td align="right"><b>Discount</b></td>

									<td align="right">%%DISCOUNT%% &nbsp;</td>

								</tr>

<!-- END DISCOUNT -->

								<tr>
									<td align="right"><b>Shipping</b></td>
									<td align="right">%%SHIPPINGNAME%%<br />%%TOTALSHIPPING%% &nbsp;</td>
								</tr>

								<tr>
									<td align="right" valign="top"><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%% &nbsp;<br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%%  &nbsp;<br><!-- END TAXTITLE2 -->Total Tax &nbsp;%%TAXESTIMATE%%</b></td>
									<td align="right" valign="top"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%% &nbsp;<br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%% &nbsp;<br><!-- END SEPARATETAX2 -->%%TOTALTAX%% &nbsp;</td>
								</tr>

								<tr>
									<td align="right"><b>Total</b></td>
									<td align="right"><strong>%%GRANDTOTAL%% &nbsp;</strong></td>
								</tr>

							</table></td>

					</tr>

		</table>

	</form>

<script language="JavaScript">

<!--

setshipping();

-->

</script>

<?php
if (isset($_SESSION['BILLING']['PAYMENTTYPE']) && $_SESSION['BILLING']['PAYMENTTYPE'] == 'manual'){ 
 ?>
	<script type="text/javascript">
	<!--
		showDiv('manual');
	//-->
	</script>
<?php } ?>