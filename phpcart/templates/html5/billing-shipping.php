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

//-->

</script> 


	<form action="phpcart.php" method="post" name="billingform" id="billingform">
	<input type="hidden" name="action" value="shipping">

		<table width="100%" cellpadding="1" class="infobox">

            <!-- BEGIN VALIDATION -->
			<tr>
				<td colspan="2" class="error" align="left">
                	<strong>The following fields must be filled out:</strong><br>
					%%VALIDATION%%
                </td>
			</tr>
            <!-- END VALIDATION -->

			<tr>
				<td colspan="2" align="center">
                	<strong>Please enter your billing and shipping information.</strong><br> 
					Complete the form below and click on the button below to complete this order.
                </td>
			</tr>

			<tr>
				<td colspan="2">
					<b>Note:</b> You will be taken to our Secure 128Bit Payment Gateway Server.
                </td>
			</tr>
        </table>


		<div id="billingTable">

					<table width="100%" class="infobox" cellpadding="5">

						<tr>
							<td align="center"><strong>Billing Information</strong></td>
						</tr>

						<tr height="55px">
							<td align="left">Email Address<br>

								<input name="email" type="text" class="cartform" value="%%EMAIL%%">

								%%EMAILREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">First Name<br>

								<input name="firstname" type="text" class="cartform" value="%%FIRSTNAME%%" onchange="setshipping()">

								%%FIRSTNAMEREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">Last Name<br>

								<input name="lastname" type="text" class="cartform" value="%%LASTNAME%%"  onchange="setshipping()">

								%%LASTNAMEREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">Company<br>

								<input name="company" type="text" class="cartform" value="%%COMPANY%%"  onchange="setshipping()">

							</td>
						</tr>

						<tr>
							<td align="left">Address<br>

								<input name="address" type="text" class="cartform" value="%%ADDRESS%%"  onchange="setshipping()">

							%%ADDRESSREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">Address Line 2<br>
								<input name="address2" type="text" class="cartform" value="%%ADDRESS2%%"  onchange="setshipping()">

							
                            </td>
						</tr>

						<tr>
							<td align="left">City<br>

								<input name="city" type="text" class="cartform" value="%%CITY%%" onchange="setshipping()">

							%%CITYREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">State<br>
								<select name="state" size="1" class="cartform" onclick="setshipping() ">
									<option value="">Choose a State</option>%%STATES%%
								</select>
								%%STATEREQUIRED%%
							</td>
						</tr>

						<tr>
							<td align="left">State Other<br>


								<input name="stateother" type="text" class="cartform" value="%%STATEOTHER%%" onchange="setshipping()">

							</td>
						</tr>

						<tr>
							<td align="left">Zip Code<br>	

									<input name="zip" type="text" class="cartform" value="%%ZIP%%"  onchange="setshipping()">

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

								<input name="phone" type="text" class="cartform" value="%%PHONE%%"  onchange="setshipping()">

							%%PHONEREQUIRED%%

							</td>
						</tr>
					</table>

		</div>
        
        <div id="shippingTable">

					<table width="100%" class="infobox" cellpadding="5">
						<tr>
							<td align="center"><strong>Shipping Information</strong></td>
						</tr>

						<tr height="55px">
							<td align="left">
                            	Shipping is same as billing<br />
                           		<input name="shippingsame" type="checkbox" value="Y" onchange="setshipping();" %%SHIPPINGSAMECHECKED%%> 
                            </td>
						</tr>
						
						<tr>
							<td align="left">
                            	First Name<br>

								<input name="sfirstname" type="text" class="cartform" id="sfirstname" value="%%SFIRSTNAME%%">
								
								%%SFIRSTNAMEREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">
                            	Last Name<br>

								<input name="slastname" type="text" class="cartform" id="slastname" value="%%SLASTNAME%%">

								%%SLASTNAMEREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">
                            	Company<br>

								<input name="scompany" type="text" class="cartform" id="scompany" value="%%SCOMPANY%%">

							</td>
						</tr>

						<tr>
							<td align="left">
                            	Address<br>

								<input name="saddress" type="text" class="cartform" id="saddress" value="%%SADDRESS%%">

							%%SADDRESSREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">
                            	Address Line 2<br>

								<input name="saddress2" type="text" class="cartform" id="saddress2" value="%%SADDRESS2%%">

							</td>
						</tr>

						<tr>
							<td align="left">
                            	City<br>

								<input name="scity" type="text" class="cartform" id="scity" value="%%SCITY%%">

							%%SCITYREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">
                            	State<br>					
								<select name="sstate" size="1" class="cartform" id="sstate">                        
                            		<option value="">Choose a State</option>%%SSTATES%%					
								</select>
		        				%%STATEREQUIRED%%
							</td>
						</tr>

						<tr>
							<td align="left">
                            	State Other<br>

								<input name="sstateother" type="text" class="cartform" id="sstateother" value="%%SSTATEOTHER%%">

							</td>
						</tr>

						<tr>
							<td align="left">
                            	Zip Code<br>

									<input name="szip" type="text" class="cartform" id="szip" value="%%SZIP%%">

							%%SZIPREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left" >
                            	Country<br />								

								<select name="scountry" size="1" class="cartform" id="scountry">

									<option value="">Choose a Country</option>%%SCOUNTRIES%%

								</select>

							%%COUNTRYREQUIRED%%

							</td>
						</tr>

						<tr>
							<td align="left">
                            	Phone<br>

								<input name="sphone" type="text" class="cartform" id="sphone" value="%%SPHONE%%">

							%%SPHONEREQUIRED%%

							</td>
						</tr>
					</table>

		</div>
        
				
		<table width="100%" cellpadding="1" class="infobox">
			<!-- BEGIN COMMENTS -->
			<tr>
				<td align="left" colspan="2">
                	<p>Comments<br />
					<textarea name="comments" class="commentsform">%%COMMENTS%%</textarea> </p>
                    <p>&nbsp;</p>
				</td>
			</tr>
			<!-- END COMMENTS -->


			<tr>
				<td align="right">Payment Method&nbsp;</td>

				<td align="left">

					<select name="paymentmethod" size="1" class="cartform" onchange="showDiv(this.value);">

						<option value="">Select Payment Method</option>

							%%PAYMENTMETHODS%%

					</select>
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
    
                    <td align="left">
                        <select name="cctype">
    
                            <option value="">Select Credit Card Type</option>
    
                            %%CCTYPES%%
    
                        </select>
    
                        %%CCTYPEREQUIRED%%
                    </td>
                </tr>
    
                <tr>
                    <td align="right">Credit Card Number:&nbsp;</td>
    
                    <td align="left">
                        <input type="text" name="ccnumber" value="%%CCNUMBER%%">
                        %%CCNUMBERREQUIRED%%
                    </td>
                </tr>
    
                <tr>
                    <td align="right">Expiration Date (mm/yyyy):&nbsp;</td>
    
                    <td align="left">
                        <select name="ccmonth">
    
                            <option value="">Select Month</option>
    
                            %%CCMONTHS%%
    
                        </select>
    
                        <select name="ccyear">
    
                            <option value="">Select Year</option>
    
                            %%CCYEARS%%
    
                        </select>
    
                            %%CCEXPIREREQUIRED%% 			
                    </td>
                </tr>
    
                <tr>
                    <td align="right">CVV Code:&nbsp;</td>
    
                    <td align="left">
                        <input type="text" name="cvvcode" value="%%CVVCODE%%">
                        %%CVVREQUIRED%%
                    </td>
                </tr>
                </table>
            
        		</td>
    		</tr>
		<!-- END CREDITCARD -->

			<tr>
            	<td align="center">
                	<a href="?action=view">View Cart</a>&nbsp;<img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11">
                </td>
            
            	<td align="left">					
					<input type="submit" value="Continue With Your Order" onclick="setshipping()">
				</td>
			</tr>

            <tr>
                <td align="left" class="smtext">The prices shown are being <br>displayed 
                in %%CURRENCYNAME%%.</td>

                <td valign="top">
                
                	<table width="100%" cellpadding="5" class="infobox">
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
                            <td align="right" valign="top"><strong><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%% &nbsp;<br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%%  &nbsp;<br><!-- END TAXTITLE2 -->Total Tax</strong> &nbsp;%%TAXESTIMATE%%</b></td>
                            <td align="right" valign="top"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%% &nbsp;<br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%% &nbsp;<br><!-- END SEPARATETAX2 -->%%TOTALTAX%% &nbsp;</td>
                        </tr>

                        <tr>
                            <td align="right"><b>Total</b></td>
                            <td align="right"><strong>%%GRANDTOTAL%% &nbsp;</strong></td>
                        </tr>

                    </table>
                    
                </td>
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