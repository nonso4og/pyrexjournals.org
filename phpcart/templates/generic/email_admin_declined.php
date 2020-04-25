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
	<tr>
	    <td colspan="2"><em><font size="4" face="Geneva, Arial, Helvetica, sans-serif">Web Order Declined</font></em></td></tr>
	<tr><td width="20%">
		<p align="right"><font size="3" face="Geneva, Arial, Helvetica, sans-serif">Date:</font></td>
	<td width="79%" name="order_date">
		<font size="3" face="Geneva, Arial, Helvetica, sans-serif">%%ORDERDATE%%</font></td>
	</tr>
	<tr><td width="10%">
		<p align="right"><font size="3" face="Geneva, Arial, Helvetica, sans-serif">Order ID:</font></td><td width="89%">
		<font size="3" face="Geneva, Arial, Helvetica, sans-serif">%%ORDERID%%</font></td></tr></table>
	<br>
    
	<!-- BEGIN ORDERLINK -->
    <p align="center"><a href="/orders/display_order.php?order=%%ORDERID%%">You can see a copy of the order here</a></p>
    <!-- END ORDERLINK -->
    
	<hr width="75%">
 	<br>

</body>
</html>