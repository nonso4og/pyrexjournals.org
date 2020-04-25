<div id="cartHeader">
	<div class="cartMessage floatleft">
    	<!-- BEGIN MESSAGE -->

			<span>%%MESSAGE%%</span>

		<!-- END MESSAGE -->
    </div>
    
    <div class="cartCoupon floatleft">
    	<!-- BEGIN COUPON -->

					<form action="phpcart.php" method="post" name="couponform">

						<input type="hidden" name="action" value="coupon">

						Coupon

						<input type="text" name="couponcode">

						&nbsp;

						<input type="image" src="%%TEMPLATEPATH%%images/validate.gif" border="0" >

					</form>

				<!-- END COUPON -->
    </div>
</div>

<div class="clear"></div>

<div id="cartItems">
	<form name="form1" method="post" action="?action=recalculate">
		<table width="100%"  border="0" cellpadding="3" cellspacing="0" class="infobox" >

                <tr>

                  <th width="15%" class="tablehead_blue" scope="col">ID</th>

                  <th width="48%" class="tablehead_blue" scope="col">Name</th>

                  <th width="14%" class="tablehead_blue" scope="col">Price</th>

                  <th width="9%" class="tablehead_blue" scope="col">Qty</th>

                  <th width="14%" class="tablehead_blue" scope="col">Total</th>

                </tr>

				<!-- BEGIN CARTITEMS -->

                <tr>

                  <td align="left"  class="text"><a href="phpcart.php?action=delete&id=%%ROW%%" onClick="return confirm('Warning! Are you sure you want to delete this item from the shopping cart?')" ><img src="%%TEMPLATEPATH%%images/trashicon.gif" border=0 width=16 height=16 alt="Remove %%NAME%% from cart?"></a>&nbsp;%%ID%%</td>

                  <td align="left"  class="text">&nbsp; %%NAME%% %%OPTIONS%% <!-- BEGIN EXTRA1 --><br><a href="%%EXTRA1%%" class="footer">&nbsp; Details</a><!-- END EXTRA1 --> </td>

                  <td align="right"  class="text">%%PRICE%% &nbsp;</td>

                  <td align="center" >

					<input type="text" name="product[%%ROW%%]" value="%%QUANTITY%%" size="3" class="smtext">

                  </td>

                  <td align="right"  class="text">%%TOTAL%% &nbsp;</td>

                </tr>

				<!-- END CARTITEMS -->

				<!-- BEGIN EMPTY -->

                <tr>

                  <td colspan="4" align="right" ><input type="submit" name="Submit" value="Update Quantities"> </td>

                  <td align="center" >&nbsp;</td>

                </tr>

				<!-- END EMPTY -->

                <tr>

                  <td height="20" colspan="4" align="right" ><span class="username ">Sub Total</span> &nbsp;</td>

                  <td align="right"  class="text">%%SUBTOTAL%% &nbsp;</td>

                </tr>

                <tr>

                  <td height="20" colspan="4" align="right" ><span class="username ">Shipping</span> &nbsp;</td>

                  <td align="right"  class="text">%%SHIPPINGNAME%%<br />%%TOTALSHIPPING%% &nbsp;</td>

                </tr>

				<!-- BEGIN DISCOUNT -->

                <tr>

                  <td height="20" colspan="4" align="right" ><span class="username ">Coupon (%%COUPON%%)</span> &nbsp;</td>

                  <td align="right" ><span class="text">(%%DISCOUNT%%) &nbsp;</span></td>

                </tr>

				<!-- END DISCOUNT -->

                <tr>

                  <td height="25" colspan="4" align="right" ><span class="username ">Tax</span> &nbsp;</td>

                  <td align="right"  class="text">%%TOTALTAX%% &nbsp;</td>

                </tr>

                <tr>

                  <td height="20" colspan="4" align="right" ><span class="username ">Total</span> &nbsp;</td>

                  <td align="right"  class="text"><strong>%%GRANDTOTAL%% &nbsp;</strong></td>

                </tr>

			</table>
    </form>
</div>

<div id="cartControls">
	<table width="100%"  align="center" border="0">
                 <tr>
                    <td width="33%" align="center" scope="col"><a href="%%PREVIOUSPAGE%%">Continue <br />Shopping</a> </td>

                    <td width="33%" align="center" scope="col"><!-- BEGIN EMPTY --><a href="?action=clear" onClick="return confirm('Warning! Are you sure you want to clear the shopping cart?')" >Clear <br />Cart</a> <!-- END EMPTY -->&nbsp;</td>

                    <td width="33%" align="center" scope="col"><!-- BEGIN EMPTY -->&nbsp;<a href="?action=checkout">Checkout</a><!-- END EMPTY -->&nbsp;</td>

                  </tr>
              </table>
</div>