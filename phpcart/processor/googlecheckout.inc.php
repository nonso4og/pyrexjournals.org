<?php
function Gatewaygooglecheckout(){
	return "remote";
}

function Configgooglecheckout(){
	global $PROCESSOR;
	# regions array is only used here to build state drop down list
	$regions[1] = array(1,"Alabama","AL","","");
	$regions[2] = array(2,"Alaska","AK","","");
	$regions[3] = array(3,"Arizona","AZ","","");
	$regions[4] = array(4,"Arkansas","AR","","");
	$regions[5] = array(5,"California","CA","","");
	$regions[6] = array(6,"Colorado","CO","","");
	$regions[7] = array(7,"Connecticut","CT","","");
	$regions[8] = array(8,"Delaware","DE","","");
	$regions[9] = array(9,"District of Columbia","DC","","");
	$regions[10] = array(10,"Florida","FL","","");
	$regions[11] = array(11,"Georgia","GA","","");
	$regions[12] = array(12,"Hawaii","HI","","");
	$regions[13] = array(13,"Idaho","ID","","");
	$regions[14] = array(14,"Illinois","IL","","");
	$regions[15] = array(15,"Indiana","IN","","");
	$regions[16] = array(16,"Iowa","IA","","");
	$regions[17] = array(17,"Kansas","KS","","");
	$regions[18] = array(18,"Kentucky","KY","","");
	$regions[19] = array(19,"Louisiana","LA","","");
	$regions[20] = array(20,"Maine","ME","","");
	$regions[21] = array(21,"Maryland","MD","","");
	$regions[22] = array(22,"Massachusetts","MA","","");
	$regions[23] = array(23,"Michigan","MI","","");
	$regions[24] = array(24,"Minnesota","MN","","");
	$regions[25] = array(25,"Mississippi","MS","","");
	$regions[26] = array(26,"Missouri","MO","","");
	$regions[27] = array(27,"Montana","MT","","");
	$regions[28] = array(28,"Nebraska","NE","","");
	$regions[29] = array(29,"Nevada","NV","","");
	$regions[30] = array(30,"New Hampshire","NH","","");
	$regions[31] = array(31,"New Jersey","NJ","","");
	$regions[32] = array(32,"New Mexico","NM","","");
	$regions[33] = array(33,"New York","NY","","");
	$regions[34] = array(34,"North Carolina","NC","","");
	$regions[35] = array(35,"North Dakota","ND","","");
	$regions[36] = array(36,"Ohio","OH","","");
	$regions[37] = array(37,"Oklahoma","OK","","");
	$regions[38] = array(38,"Oregon","OR","","");
	$regions[39] = array(39,"Pennsylvania","PA","","");
	$regions[40] = array(40,"Rhode Island","RI","","");
	$regions[41] = array(41,"South Carolina","SC","","");
	$regions[42] = array(42,"South Dakota","SD","","");
	$regions[43] = array(43,"Tennessee","TN","","");
	$regions[44] = array(44,"Texas","TX","","");
	$regions[45] = array(45,"Utah","UT","","");
	$regions[46] = array(46,"Vermont","VT","","");
	$regions[47] = array(47,"Virginia","VA","","");
	$regions[48] = array(48,"Washington","WA","","");
	$regions[49] = array(49,"West Virginia","WV","","");
	$regions[50] = array(50,"Wisconsin","WI","","");
	$regions[51] = array(51,"Wyoming","WY","","");
	$regions[52] = array(51,"","","","");

?>
<table border='1' cellpadding='0' cellspacing='4' width='100%'>
	<tr>
		<td width='100%' colspan="2">Google Checkout:</td>
	</tr>
	<tr>
		<td width='59%'>Google Vender ID: <br><font style=" font-size:small;">
		Your Vender ID is listed on the "Integration" page under the "Settings" tab </font></td>
		<td width='41%'><input type='text' name='modulegoogle_vender_id' size='20' value='<?php echo $PROCESSOR["modulegoogle_vender_id"]; ?>'></td>
	</tr>
	
	<tr>
		<td width='59%'>Environment:</td>
		<td width='41%'>
		<select size='1' name='modulegoogle_environment'>
		<option value='<?php echo $PROCESSOR["modulegoogle_environment"]; ?>'><?php echo $PROCESSOR["modulegoogle_environment"]; ?></option>
		<option value='Test'>Test</option>
		<option value='Live'>Live</option></select></td>
	</tr>
	<tr>
		<td width='59%'>Tax US State: <br><font style=" font-size:small;">
		This value specifies the U.S. state in which you charge tax.</font></td>
		<td width='41%'>
		<?php
		foreach($regions as $region)		
			if ($region[2]==$PROCESSOR["modulegoogle_tax_us_state"])
				$state_name = $region[1];
						
				
		?>
		<select size='1' name='modulegoogle_tax_us_state'>
		<option value='<?php echo $PROCESSOR["modulegoogle_tax_us_state"]; ?>'><?php echo $state_name ?></option>
		<?php foreach($regions as $region) {
			echo "<option value='" . $region[2] . "'>" . $region[1] ."</option>";
			} ?>
		</select></td>
	</tr>

	<tr>
		<td width='59%'>Currency:</td>
		<td width='41%'>
		<font style=" font-size:small;">
					Google Checkout products can only be charged in US dollars at this time
		</font>
		</td>
	</tr>
	</table>
<br>
<?php
}

function Checkoutgooglecheckout($products, $totals, $orderid, $billing){
	global $PROCESSOR, $lang, $config;
?>
<center><?php echo $lang["PaymentGatewayMessage"];?></center>
<?php if ($PROCESSOR['modulegoogle_environment'] =='Live') { 
echo '<form name="payment" method="POST" action="https://checkout.google.com/checkout/cws/v2/Merchant/'. $PROCESSOR['modulegoogle_vender_id']. '/checkoutForm" accept-charset="utf-8">';
 }else{ 
echo '<form name="payment" method="POST" action="https://sandbox.google.com/checkout/cws/v2/Merchant/'. $PROCESSOR['modulegoogle_vender_id']. '/checkoutForm" accept-charset="utf-8">';
 } 
 ?>  
  <input type="hidden" name="item_name_1" value="<?php echo $config["CARTDESCRIPTION"]." - ".$orderid;?>"/>
  <input type="hidden" name="item_quantity_1" value="1"/>
  <input type="hidden" name="item_description_1" value=""/>
  <input type="hidden" name="item_price_1" value="<?php echo $totals["RAWSUBTOTAL"]; ?>"/>
  <input type="hidden" name="item_currency_1" value="USD" />
  
  <?php if ($totals["RAWDISCOUNT"]>0){ ?>
  <input type="hidden" name="item_name_2" value="<?php echo $lang["Discount"] ?>"/>
  <input type="hidden" name="item_quantity_2" value="1"/>
  <input type="hidden" name="item_description_2" value=""/>
  <input type="hidden" name="item_price_2" value="<?php echo '-'.$totals["RAWDISCOUNT"]; ?>"/>
  <input type="hidden" name="item_currency_2" value="USD" />
  <?php } 
  if (trim($PROCESSOR['modulegoogle_tax_us_state'])!='') { ?> 
  <input type="hidden" name="tax_us_state" value="<?php echo $PROCESSOR['modulegoogle_tax_us_state'] ?>"/>
  <input type="hidden" name="tax_rate" value="<?php echo (getTaxRate1()/100);?>"/>  
  <?php } ?>
  <input type="hidden" name="ship_method_name_1" value="Standard"/>
  <input type="hidden" name="ship_method_price_1" value="<?php echo $totals["RAWSHIPPING"];?>"/>
  <input type="hidden" name="_charset_"/>
  
<?php if ($PROCESSOR['modulegoogle_environment'] =='Live') { 
echo '<input type="image" name="Google Checkout" alt="Fast checkout through Google" 
src="http://checkout.google.com/checkout/buttons/checkout.gif?merchant_id='. $PROCESSOR['modulegoogle_vender_id']. '&w=180&h=46&style=white&variant=text&loc=en_US" 
height="46" width="180"/>';
 }else{ 
echo '<input type="image" name="Google Checkout" alt="Fast checkout through Google" 
src="http://sandbox.google.com/checkout/buttons/checkout.gif?merchant_id='. $PROCESSOR['modulegoogle_vender_id']. '&w=180&h=46&style=white&variant=text&loc=en_US" 
height="46" width="180"/>';
 } 
 ?>  
</form>
<script language="JavaScript">
<!--
window.setTimeout(GoPayment,4000);
function GoPayment(){
	document.payment.submit();
}
-->
</script>
<?php } ?>