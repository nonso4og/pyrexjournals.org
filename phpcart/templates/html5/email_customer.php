<html>

<head>

<title>%%COMPANYNAME%% Order</title>

</head>

<body>

<style>

<!--

body,p,td{font:Geneva, Arial, Helvetica, sans-serif; font-size:12px}

-->

</style>

 	<hr width="75%">

 	<div align="center">

		<table border="1" width="75%" id="table1">

	<tr>

		<td colspan="2">

		<div style="background-color: #C0C0C0">

<b><font size="5" face="Arial">%%COMPANYNAME%%</font></b></div>

		</td>

	</tr>

	<tr>

		<td colspan="2"><i><b><font size="4" face="Arial">Web Order Summary</font></b></i></td>

	</tr>

	<tr>

		<td width="11%">

		

			<p align="right"><font face="Arial" size="3">Date:

		

		</font>

		

		</td>

		<td width="87%"><font face="Arial" size="3">%%ORDERDATE%%</font></td>

	</tr>

	<tr>

		<td width="11%">

		

			<p align="right"><font face="Arial" size="3">Order ID: </font> </p>

		

		</td>

		<td width="87%"><font face="Arial" size="3">%%ORDERID%%</font></td>

	</tr>

</table>

</div>

 	<hr width="75%">

 	<p> <br>

&nbsp;</p>

<div align="center">

	<table border="0" width="75%" id="table2">

		<tr>

			<td>

<br>

			<font face="Arial" size="3">Dear Customer,<br>

<br>

Thank you very much for ordering your goods from %%COMPANYNAME%%. A summary of your order can be found below.

<br></font><br>

&nbsp;<table border="1" width="100%" id="table5">

				<tr>

					<td colspan="2" bgcolor="#C0C0C0">

					<font face="Arial" size="2">

<b>Order Summary</b></font></td>

				</tr>

				<tr>

					<td align="right"><font face="Arial"><b>Name:</b> </font>

					</td>

					<td><font face="Arial">%%FIRSTNAME%% %%LASTNAME%%</font></td>

				</tr>

				<tr>

					<td align="right"><font face="Arial"><b>E-mail:</b> </font>

					</td>

					<td><font face="Arial">%%EMAIL%%</font></td>

				</tr>

				<tr>

					<td align="right" valign="top"><font face="Arial"><b>Address:</b></font></td>

					<td>
						<p align="left"><font face="Arial">
                        
                        %%ADDRESS%%<br>

						%%ADDRESS2%%<br>

                        %%CITY%%<br>
                        
                        %%STATE%%<br>
                        
                        %%ZIP%%<br>
                        
                        %%COUNTRY%%
                        
                        </font></p>

					</td>

				</tr>

				<tr>

					<td align="right"><font face="Arial"><b>Telephone:</b>

					</font></td>

					<td align="right">

					<p align="left"><font face="Arial">%%PHONE%%</font></td>

				</tr>
                
                <tr>
					<td colspan="2"><b>Order Comments:</b><br>%%COMMENTS%%</td>
				</tr>

				</table>

			<p>&nbsp; </p>

			<table border="1" width="100%" id="table7">

				<tr>

					<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">&nbsp;<div align="center">

<table id="table8" width="100%" border="1">

<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="center" bgcolor="#C0C0C0">

	<font face="Arial" size="2"><b>Item</b></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="center" bgcolor="#C0C0C0">

	<font face="Arial" size="2"><b>ID</b></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="center" bgcolor="#C0C0C0">

	<font face="Arial" size="2"><b>Name</b></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="center" bgcolor="#C0C0C0">

	<font face="Arial" size="2"><b>Price</b></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="center" bgcolor="#C0C0C0">

	<font face="Arial" size="2"><b>Quantity</b></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="center" bgcolor="#C0C0C0">

	<font face="Arial" size="2"><b>Total</b></font></td>

</tr>

<!-- BEGIN CARTITEMS -->

<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">

	<font face="Arial" size="2">%%ROW%%</font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">

	<font face="Arial" size="2">%%ID%%</font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">

	<font face="Arial" size="2">%%NAME%% %%OPTIONS%%</font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">

	<font face="Arial" size="2">%%PRICE%%</font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">

	<font face="Arial" size="2">%%QUANTITY%%</font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px">

	<font face="Arial" size="2">%%TOTAL%%</font></td>

</tr>

<!-- END CARTITEMS -->

</table>

					</div>

					<font size="3">

<br>

					</font><hr width="75%">

					<p align="center">&nbsp;</p>

					<div align="center">

<table id="table9" width="65%">

<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2"><strong>Sub Total</strong></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2">%%SUBTOTAL%%</font></td>

</tr>

<!-- BEGIN DISCOUNT -->
<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2"><strong>Discount</strong></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2">%%DISCOUNT%%</font></td>

</tr>
<!-- END DISCOUNT -->

<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2"><strong><!-- BEGIN TAXTITLE1 -->%%TAXTITLE1%%<br><!-- END TAXTITLE1 --><!-- BEGIN TAXTITLE2 --> %%TAXTITLE2%% <br><!-- END TAXTITLE2 -->Total Tax</strong></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2"><!-- BEGIN SEPARATETAX1 -->%%SEPARATETAX1%%<br><!-- END SEPARATETAX1 --><!-- BEGIN SEPARATETAX2 --> %%SEPARATETAX2%%<br><!-- END SEPARATETAX2 -->%%TOTALTAX%%</font></td>

</tr>

<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2"><strong>Shipping</strong></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2">%%TOTALSHIPPING%%</font></td>

</tr>

<tr>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<font face="Arial" size="2"><strong>Total</strong></font></td>

	<td style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px" align="right">

	<div style="border-top-style: double; border-top-width: 3px">

		<font face="Arial" size="2"><strong>%%GRANDTOTAL%%</strong></font></div>

	</td>

</tr>

</table></div>


<div style="background-color: #C0C0C0">

<font size="3" face="Arial"><b>Order Information</b></font></div>

<p><font size="3" face="Arial">Your order was completed 
                    	in %%CURRENCYNAME%%. <br><br>

Your order will be shipped as soon as payment has been received.<br><br>

If you have any problems or questions, please contact us by <a href=mailto:%%COMPANYEMAIL%%?subject=Order%20ID%20-%20%%ORDERID%%%20>clicking here</a>.<br><br>

Thank you,<br>

The %%COMPANYNAME%% Sales Team<br>

%%COMPANYADDRESS%%<br>

%%COMPANYPHONE%%<br>

<a href="%%COMPANYWEBSITE%%">%%COMPANYWEBSITE%%</a></font></p>

					</td>

				</tr>

			</table>

			<p>&nbsp; </p>

			</td>

		</tr>

	</table>

</div>

</body>

</html>