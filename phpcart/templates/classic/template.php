<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="NOINDEX, NOFOLLOW">

<title>phpCart Shopping Cart Template</title>

<script type="text/javascript"><!--
var lastDiv = "";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}
//-->
</script>

<style type="text/css">
<!--

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/body_bg.gif);
}

.hiddenDiv {
	display: none;
}

.visibleDiv {
	display: block;
}

-->
</style>

<link href="%%TEMPLATEPATH%%stylesheet.css" rel="stylesheet" type="text/css">

</head>

<body>

<table width="780"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >

  <tr>

    <th scope="col"><table width="758"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableborder">

      <tr>

        <th height="102" valign="top" class="header_bg" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">

          <tr>

            <th width="46%" scope="col"><img src="%%TEMPLATEPATH%%images/logo.gif" width="256" height="102"></th>

            <th width="3%" scope="col"><img src="%%TEMPLATEPATH%%images/headerimage_1.gif" width="24" height="102"></th>

            <th width="51%" class="headerright_image" scope="col">&nbsp;</th>

          </tr>

        </table></th>

      </tr>



	 </table>

		%%DATA%%

	<table width="758"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableborder">

      <tr>

        <td height="35" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">

          <tr>

            <th height="7" bgcolor="#CC0000" scope="col"><img src="images/red_dot.gif" width="5" height="7"></th>

          </tr>

          <tr>

            <td height="35" align="center" bgcolor="#4BDBFF" class="copyright">
                <p>Copyright @ 2006 - 2013 Webrigger Internet Services. All Rights Reserved <br>

            	    <a href="http://www.phpcart.net" class="footer">phpCart.net</a> - php Shopping Cart</p>

            	</td>

          </tr>

        </table></td>

      </tr>

    </table></th>

  </tr>

</table>

</body>
</html>