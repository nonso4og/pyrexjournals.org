<html>
<head>
<title>New Order</title>
</head>
<body>
<style>
<!--
body,p,td{font:Geneva, Arial, Helvetica, sans-serif; font-size:12px}
-->
</style>
 	<hr width="75%">
 	<table align="center" width ="75%" border="1">
 	<tr><td colspan="2" bgcolor="#CCCCCC"><b><font size="5" face="Geneva, Arial, Helvetica, sans-serif">%%COMPANYNAME%%</font></b></td></tr>
	<tr><td colspan="2"><em><font size="4" face="Geneva, Arial, Helvetica, sans-serif">Web Order Summary</font></em></td></tr>
	<tr><td width="20%">
		<p align="right"><font size="3" face="Geneva, Arial, Helvetica, sans-serif">Date:</font></td>
	<td width="79%" name="order_date">
		<font size="3" face="Geneva, Arial, Helvetica, sans-serif">%%ORDERDATE%%</font></td>
	</tr>
	<tr><td width="10%">
		<p align="right"><font size="3" face="Geneva, Arial, Helvetica, sans-serif">Order ID:</font></td><td width="89%">
		<font size="3" face="Geneva, Arial, Helvetica, sans-serif">%%ORDERID%%</font></td></tr></table>
	<br>
<hr width="75%">
 	<br>
 	<table border="1" align="center" width = "800" id="table1">
		<tr>
			<td colspan="2"><b><font size="4">Order Summary</font></b><br><br>
			<br>&nbsp;</td>
		</tr>
		<tr>
			<td align="right"><b>Name:</b> </td>
			<td name="order_name">%%FIRSTNAME%% %%LASTNAME%%</td>
		</tr>
		<tr>
			<td align="right"><b>E-mail:</b> </td>
			<td><a href=mailto:%%EMAIL%% style="text-decoration: none">%%EMAIL%%</a></td>
		</tr>
		<tr>
			<td align="right"><b>Company:</b></td>
			<td name="order_company">&nbsp;%%COMPANY%%</td>
		</tr>

		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><b>Postal Address:</b>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>%%ADDRESS%%<br>%%ADDRESS2%%<br>%%CITY%%<br>%%STATE%%<br>%%ZIP%%<br>%%COUNTRY%%</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right"><b>Telephone:</b></td>
			<td>%%PHONE%%</td>
		</tr>
		<tr>
			<td align="right"><b>IP:</b></td>
			<td>%%IP%%</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td>
			<p align="right"><b>
			Coupon:</b></td>
			<td>&nbsp;%%COUPON%%</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><b>Order Comments:</b><br>%%COMMENTS%%</td>
		</tr>
</table>
<p>
 	<br>
 	&nbsp;</p>
<div align="center">
<table width="800" border="1">
<tr>
	<td align="center"><b>Item</b></td>
	<td align="center"><b>ID</b></td>
	<td align="center"><b>Name</b></td>
	<td align="center"><b>Price</b></td>
	<td align="center"><b>Quantity</b></td>
	<td align="center"><b>Total</b></td>
</tr>
<!-- BEGIN CARTITEMS -->
<tr>
	<td>%%ROW%%</td>
	<td>%%ID%%</td>
	<td>%%NAME%% %%OPTIONS%%</td>
	<td>%%PRICE%%</td>
	<td>%%QUANTITY%%</td>
	<td>%%TOTAL%%</td>
</tr>
<!-- END CARTITEMS -->
</table>
</div>
&nbsp;<p>
<br>
</p>
<div align="center">
<table width="321">
<tr>
	<td align="right"><font face="Arial" size="2"><strong>Sub Total</strong></font></td>
	<td align="right"><font face="Arial" size="2">%%SUBTOTAL%%</font></td>
</tr>

<!-- BEGIN DISCOUNT -->
<tr>
	<td align="right"><font face="Arial" size="2"><strong>Discount</strong></font></td>
	<td align="right"><font face="Arial" size="2">%%DISCOUNT%%</font></td>
</tr>
<!-- END DISCOUNT -->

<tr>
	<td align="right"><font face="Arial" size="2"><strong><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%%<br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%% <br><!-- END TAXTITLE2 -->Total Tax</strong></font></td>
	<td align="right"><font face="Arial" size="2"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%%<br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%%<br><!-- END SEPARATETAX2 -->%%TOTALTAX%%</font></td>
</tr>                
                  
<tr>
	<td align="right"><font face="Arial" size="2"><strong>Shipping</strong></font></td>
	<td align="right"><font face="Arial" size="2">%%TOTALSHIPPING%%</font></td>
</tr>
<tr>
	<td align="right"><font face="Arial" size="2"><strong>Total</strong></font></td>
	<td align="right">
	<div style="border-top-style: double; border-top-width: 3px">
		<font face="Arial" size="2"><strong>%%GRANDTOTAL%%</strong></font></div>
	</td>
</tr>
</table></div>

<p>&nbsp;</p>

<p><b>Order Information</b><br>

Your order was completed in %%CURRENCYNAME%%.<br>
Order Method = %%PAYMENTTYPE%%<br>
Shipping Method = %%SHIPPINGNAME%%</p>

</body>
</html>