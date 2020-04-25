<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

</head>

<body>

<form action="phpcart-c.php" method="post">

<input name="action" type="hidden" value="add" />

<table>

	<tr>

		<th>Reference Number</th>

		<th>Quantity</th>

		<th>Size</th>

	</tr>

<?php for ($x = 1; $x < 6; $x++) { ?>

	<tr>

		<td><input name="descr[]" type="hidden" value="Photo" />

		<input name="id[]" type="text" id="id" /></td>

		<td><input name="qty[]" type="text" id="quantity" size="5" /></td>

		<td><select name="price[]" id="price">

			<option value="11.00">8 x 6 @ $11.00</option>

			<option value="13.00">10 x 8 @ $13.00</option>

			<option value="20.00">12 x 16 @ $20.00</option>

		</select>		</td>

	</tr>

<?php } ?>

	<tr>

		<td colspan="3" align="center"><input type="submit" name="Submit" value="Submit" /></td>

	</tr>

</table>

</form>

</body>

</html>

