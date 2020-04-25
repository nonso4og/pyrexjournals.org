	<table width="758"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableborder" align="center">

      <tr>

      <tr>

        <td valign="top">
        
        <table width="758"  height="47"  border="0" cellpadding="0" cellspacing="0">

          <tr bgcolor="#CC0000">

            <th height="7" colspan="2" scope="col"><img src="%%TEMPLATEPATH%%images/red_dot.gif" width="5" height="7"></th>

            </tr>

          <tr>

            <td width="38%" align="left" bgcolor="#FF9933" class="username">
            	<table width="100%"  border="0" cellspacing="0" cellpadding="0">

              <tr>

                <th width="3%" align="left" scope="col"><img src="%%TEMPLATEPATH%%images/orange_bg.gif" width="5" height="40"></th>

                <th width="97%" align="center" scope="col" class="border">

				<!-- BEGIN MESSAGE -->

				<span>%%MESSAGE%%</span>

				<!-- END MESSAGE -->

			</th>

              </tr>

            </table></td>

            <td width="62%" valign="top"><table width="100%" height="40"  border="0" cellpadding="0" cellspacing="0" bgcolor="#EBEBEB">

              <tr>

                <th>

				<!-- BEGIN COUPON -->

					<form action="phpcart.php" method="post" name="couponform">

						<input type="hidden" name="action" value="coupon">

						Coupon

						<input type="text" name="couponcode">

						&nbsp;

						<input type="image" src="%%TEMPLATEPATH%%images/validate.gif" border=0 style="border-width: 0">

					</form>

				<!-- END COUPON -->

				</th>

              </tr>

            </table></td>

            </tr>

        </table></td>

      </tr>

      <tr>

        <td>
        	<table width="100%"  border="0" cellspacing="10" cellpadding="0">

          <tr>

            <td height="236" valign="top" scope="col">
            	

              	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <tr class="infobox">

                  <th width="13%" height="25" class="tablehead_blue" scope="col">ID</th>

                  <th width="46%" class="tablehead_blue" scope="col">Name</th>

                  <th width="14%" class="tablehead_blue" scope="col">Price</th>

                  <th width="9%" class="tablehead_blue" scope="col">QTY</th>

                  <th width="18%" class="tablehead_blue" scope="col">Total</th>

                </tr>

				<form name="form1" method="post" action="?action=recalculate">
				<!-- BEGIN CARTITEMS -->
				
                <tr class="infobox">

                  <td align="left" valign="middle" class="text"><a href="phpcart.php?action=delete&id=%%ROW%%" onClick="return confirm('Warning! Are you sure you want to delete this item from the shopping cart?')" ><img src="%%TEMPLATEPATH%%images/trashicon.gif" border=0 width=16 height=16 alt="Remove %%NAME%% from cart?"></a>&nbsp;%%ID%%</td>

                  <td align="left" valign="middle" class="text">&nbsp; %%NAME%% %%OPTIONS%% <!-- BEGIN EXTRA1 --><br><a href="%%EXTRA1%%" class="footer">&nbsp; Details</a><!-- END EXTRA1 --> </td>

                  <td align="right" valign="middle" class="text">%%PRICE%% &nbsp;</td>

                  <td align="center" valign="middle">
					<input type="text" name="product[%%ROW%%]" value="%%QUANTITY%%" size="4" style="text-color:#000000;font-size:8pt;text-align:left">
                  </td>

                  <td align="right" valign="middle" class="text">%%TOTAL%% &nbsp;</td>
                </tr>

				<!-- END CARTITEMS -->
				
				<!-- BEGIN EMPTY -->

                <tr height="30px">
					
                    <td colspan="4">&nbsp;</td>
                    
                    <td colspan="2" align="right" valign="middle" ><input type="submit" name="Submit" value="Update Quantities"> </td>

                  <td align="center" valign="middle">&nbsp;</td>

                </tr>			
				<!-- END EMPTY -->
				</form>
                
                <tr class="infobox">
                	
                	<td colspan="2" rowspan="5" valign="top" class="infobox" align="center">
                    	<font size="2" face="Verdana"><b>The prices shown are being <br>displayed 
                    	in %%CURRENCYNAME%%.</b></font>
                        
                        <br>
                		<hr align="center" width="75%" noshade="noshade">
                        
                    <font size="2" face="Verdana"><b>Calculate Shipping Price</b><br></font>
                    <form name="updateshippingform" method="post" action="?action=view">
                    <font size="1" face="Verdana">Shipping State/Province</font>
                    <select name="sstateid" size="1" class="cartform" id="sstateid">
									<option value="">Choose a State</option>
										
										
								%%STATES%%
								
								</select><br>
                                
                    
                    <font size="1" face="Verdana">Shipping Country</font>
                    <select name="scountryid" size="1" class="cartform" id="scountryid">
									<option value="">Choose a Country</option>
								%%COUNTRIES%%
								</select><br>
                        <input type="submit" name="submit" value="Get Shipping Price">
                    	</form>
                        <br>
                    </td>
                    
					<td height="20" colspan="2" align="right" valign="middle"><span class="username ">Sub Total</span> &nbsp;</td>

                  <td align="right" valign="middle" class="text">%%SUBTOTAL%% &nbsp;</td>

                </tr>

                <tr class="infobox">
					<td height="20" colspan="2" align="right" valign="middle"><span class="username ">Shipping</span> &nbsp;</td>

                  <td align="right" valign="middle" class="text">%%SHIPPINGNAME%%<br />%%TOTALSHIPPING%% &nbsp;</td>

                </tr>

				<!-- BEGIN DISCOUNT -->

                <tr class="infobox">
					<td height="20" colspan="2" align="right" valign="middle"><span class="username ">Coupon (%%COUPON%%)</span> &nbsp;</td>

                  <td align="right" valign="middle"><span class="text">(%%DISCOUNT%%) &nbsp;</span></td>

                </tr>

				<!-- END DISCOUNT -->

                <tr class="infobox">
					<td height="20" colspan="2" align="right" valign="middle"><span class="username "><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%% &nbsp;<br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%%  &nbsp;<br><!-- END TAXTITLE2 -->Total Tax &nbsp;</span></td>

                  <td height="20" align="right" valign="middle" class="text"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%% &nbsp;<br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%% &nbsp;<br><!-- END SEPARATETAX2 -->%%TOTALTAX%% &nbsp;</td>
                </tr>

                <tr class="infobox">
					<td height="20" colspan="2" align="right" valign="middle"><span class="username ">Total</span> &nbsp;</td>

                  <td align="right" valign="middle" class="text"><strong>%%GRANDTOTAL%% &nbsp;</strong></td>

                </tr>

			</table>
            
            <br>

			<table width="100%">

                 <tr>

                    <td width="33%" align="center" scope="col"><a href="%%PREVIOUSPAGE%%">Continue Shopping</a> <img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"></td>

                    <td width="34%" align="center" scope="col"><!-- BEGIN EMPTY --><a href="?action=clear" onClick="return confirm('Warning! Are you sure you want to clear the shopping cart?')" >Clear Cart</a> <img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"><!-- END EMPTY -->&nbsp;
                    </td>

                    <td width="33%" align="center" scope="col"><!-- BEGIN EMPTY --><!-- BEGIN ERROR -->&nbsp;<a href="?action=checkout">Checkout</a><img src="%%TEMPLATEPATH%%images/arrow.gif" width="11" height="11"><!-- END ERROR --><!-- END EMPTY -->&nbsp;
                    </td>

                  </tr>
              </table>
            
            </td>
          </tr>
        </table>
        
     </td>
	</tr>
</table>

