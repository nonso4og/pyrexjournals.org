<?php

function CreateOrderFile($orderid){

		$fp = fopen ("./sessions/".$_SESSION["sessionid"].".dat", "r");
		$file = fopen("orders/$orderid.dat","w");

		while ($newdata = fgets ($fp, 500)) {
			fputs($file,"$newdata\n");
		}
		fclose($file);
		fclose($fp);
}

// DB management function called during SubmitOrder process
function UpdateDB($billing, $data, $product_data){
	
}

// create order id
function CreateOrderID(){
	global $config;
	
	// create prefix (none,date,custom)
	if ($config['OrderPrefix'] == 'custom'){
		$order_prefix = $config['OrderPrefixCustom'];
	}
	elseif ($config['OrderPrefix'] == 'date'){
		$order_prefix =  date("Ymd");
	}
	
	
	// create body (none, date, random, sequential)
	if ($config['OrderBody'] == 'date'){
		$order_number =  date("Ymd");
	}
	elseif ($config['OrderBody'] == 'random'){
		$order_number =  strtoupper((substr(uniqid (""), 2, $config['OrderDigits'])));
	}
	elseif ($config['OrderBody'] == 'sequential'){
		
		// get order id from file
		$myFile = "modules/order_number.php";   		// our file name
   		$fh = fopen($myFile, 'r');                     				// open the file to read
   		$order_number = fread($fh, filesize($myFile));	// get the order id number
  		 fclose($fh);                              						// close the file
	
		// increment the invoice number so we can put it back into the file
   		$next_order_number = $order_number+1;         
		
		// save order id
   		$filePointer = fopen($myFile, "w");             		// open our file to write
   		 fwrite($filePointer, $next_order_number);		// write the next invoice number
   		fclose($filePointer);  										// close the file
	}
	
	// format # of digits 
	if ($config['OrderBody'] == 'random' || $config['OrderBody'] == 'sequential'){
		if ($config['OrderDigits'] == '4'){
			$order_number = sprintf("%04.s",   $order_number);
		}
		elseif ($config['OrderDigits'] == '5'){
			$order_number = sprintf("%05.s",   $order_number);
		}
		elseif ($config['OrderDigits'] == '6'){
			$order_number = sprintf("%06.s",   $order_number);
		}
		elseif ($config['OrderDigits'] == '7'){
			$order_number = sprintf("%07.s",   $order_number);
		}
		elseif ($config['OrderDigits'] == '8'){
			$order_number = sprintf("%08.s",   $order_number);
		}
	}
	
	
	// create suffix (none,date,custom)
	if ($config['OrderSuffix'] == 'custom'){
		$order_suffix = $config['OrderSuffixCustom'];
	}
	elseif ($config['OrderSuffix'] == 'date'){
		$order_suffix =  date("Ymd");
	}


	// build order id
	if ($config['OrderPrefix'] != 'none'){
		$orderid = $order_prefix;
		if ($config['OrderBody'] != 'none' AND $config['OrderSuffix'] != ''){
			$orderid .= '-';
		}
	}
	
	if ($config['OrderBody'] != 'none'){
		$orderid .= $order_number;
		if ($config['OrderSuffix'] != 'none' AND $order_suffix != ''){
			$orderid .= '-';
		}
	}
	
	if ($config['OrderSuffix'] != 'none' AND $order_suffix != ''){
		$orderid .= $order_suffix;
	}
	
	// return order id
	return $orderid;
}

function getGeoIP($ip) {
	
	// include geo ip scripts
	include_once("modules/geoip/geoip.inc");
	include_once("modules/geoip/geoipcity.inc");
	include_once("modules/geoip/geoipregionvars.php");

	try {
		// open binary copy of geoip database
		// latest copy available for free at: http://dev.maxmind.com/geoip/geolite
		$gi = geoip_open("modules/geoip/GeoLiteCity.dat",GEOIP_STANDARD);
		
			// get record using ip address
		   $record = geoip_record_by_addr($gi,$ip);
		   
		   // get geoip values
		   $country = $record->country_name;
		   $city = $record->city;
		   $lat = $record->latitude;
		   $long = $record->longitude;
		   
		   // close geoip
		   geoip_close($gi);		   
	}
	catch(Exception $e) {
			// if geoip doesn't work, set variables to blank
		   $country = '';
		   $city = '';
		   $lat = '';
		   $long = '';                                   
	}

	// return associative array only - use key as your template tags
	return array(geoip_country => $country, geoip_city => $city, geoip_lat => $lat, geoip_long => $long);
}

function GetTimeStamp(){
	global $config;
	
	// set store time based on timezone
	date_default_timezone_set('GMT'); // start with GMT
	$timestamp = time();				// get time
	
	$hoursdiff = $config["TimeZone"];		// configured by user
	$symbol = substr($hoursdiff,0,1);		// find out if + or -

	if ($hoursdiff != 0){  	// check to see if is already already at GMT, no calc required
		$hoursdiff = substr($hoursdiff,1,2); // grab only the 2-digit number
		$hoursdiff = $hoursdiff * 3600;
		
		if ($symbol == '+') {	// find out to add or subtract hours to get local time
			$timestamp = $timestamp + $hoursdiff;
		}
		else {
			$timestamp = $timestamp - $hoursdiff;
		} 
	}
	return $timestamp;
}

function GetOptionText($record){

	$options = unserialize($record[PRODUCTOPTIONS]);

	if (sizeof($options) > 0){

		foreach($options as $value){

			$option = explode(":",$value);

			if (trim($option[0]) != ""){
				$optiontext .= " - ".$option[0];

				if ($option[1] > 0)
					$optiontext .= " ".CurrencyFormat($option[1]);
			}
		}
	}

	return $optiontext;

}

function Evaluate($text){

	eval ("?>".$text);

}



function Totals($totals, $items){

	return $totals;

}




function OrderComplete(){
	global $config, $strEncryptionPassword;
	
	// Sage Pay Gateway
	//$strCrypt=$_REQUEST["crypt"];
//	
//	// did we get Sage string to decode
//	if (strlen($strCrypt)>0) {
//	
//		 // get processor settings and functions for Sage
//		 include 'admin/processor_1.php';
//		 include 'processor/sagepay_functions.php';
//		 
//		 // convert pw variable for use in decoding
//		 $strEncryptionPassword = $PROCESSOR["modulesagepay_password"];		
//		
//		// Now decode the Crypt field and extract the results
//		$strDecoded=decodeAndDecrypt($strCrypt);
//		$values = getToken($strDecoded);
//		
//		// Split out the useful information into variables we can use
//		$strStatus=$values['Status'];
//		$strStatusDetail=$values['StatusDetail'];
//		$strVendorTxCode=$values["VendorTxCode"];
//		$strVPSTxId=$values["VPSTxId"];
//		$strTxAuthNo=$values["TxAuthNo"];
//		$strAmount=$values["Amount"];
//		$strAVSCV2=$values["AVSCV2"];
//		$strAddressResult=$values["AddressResult"];
//		$strPostCodeResult=$values["PostCodeResult"];
//		$strCV2Result=$values["CV2Result"];
//		$strGiftAid=$values["GiftAid"];
//		$str3DSecureStatus=$values["3DSecureStatus"];
//		$strCAVV=$values["CAVV"];
//		$strCardType=$values["CardType"];
//		$strLast4Digits=$values["Last4Digits"];
//		$strAddressStatus=$values["AddressStatus"]; // PayPal transactions only
//		$strPayerStatus=$values["PayerStatus"];     // PayPal transactions only
//	}
//
//	// make sure that the status is okay
//	if ($strStatus == 'OK'){
//		return;
//	}
//	else {
//		echo 'We have experienced a problem completing your transaction, please contact us directly to resolve this issue. We apologize for the inconvenience.';
//	}

}





function OrderPending(){
	
	return;
	
}



function OrderCanceled(){

	return;

}



function OrderDeclined(){
	global $config, $billing, $strEncryptionPassword, $strReason;
	
	// Sage Pay Gateway
	// Now check we have a Crypt field passed to this page 
//	$strCrypt=$_REQUEST["crypt"];
//	
//	if (strlen($strCrypt)>0) {
//		
//		 // get processor settings and functions for Sage
//		 include 'admin/processor_1.php';
//		 include 'processor/sagepay_functions.php';
//		 
//		 // convert pw variable for use in decoding
//		 $strEncryptionPassword = $PROCESSOR["modulesagepay_password"];
//
//		// Now decode the Crypt field and extract the results
//		$strDecoded=decodeAndDecrypt($strCrypt);
//		$values = getToken($strDecoded);
//		
//		// Split out the useful information into variables we can use
//		$strStatus=$values['Status'];
//		$strStatusDetail=$values['StatusDetail'];
//		$strVendorTxCode=$values["VendorTxCode"];
//		$strVPSTxId=$values["VPSTxId"];
//		$strTxAuthNo=$values["TxAuthNo"];
//		$strAmount=$values["Amount"];
//		$strAVSCV2=$values["AVSCV2"];
//		$strAddressResult=$values["AddressResult"];
//		$strPostCodeResult=$values["PostCodeResult"];
//		$strCV2Result=$values["CV2Result"];
//		$strGiftAid=$values["GiftAid"];
//		$str3DSecureStatus=$values["3DSecureStatus"];
//		$strCAVV=$values["CAVV"];
//		$strCardType=$values["CardType"];
//		$strLast4Digits=$values["Last4Digits"];
//		$strAddressStatus=$values["AddressStatus"]; // PayPal transactions only
//		$strPayerStatus=$values["PayerStatus"];     // PayPal transactions only
//		
//		// Determine the reason this transaction was unsuccessful
//		if ($strStatus=="NOTAUTHED")
//			$strReason="You payment was declined by the bank.  This could be due to insufficient funds, or incorrect card details.";
//		else if ($strStatus=="ABORT") {
//			$strReason="You chose to Cancel your order on the payment pages.  If you wish to change your order and resubmit it you can do so here. If you have questions or concerns about ordering online, please contact us";
//			if ($config['COMPANYPHONE'] != ''){
//				$strReason .= ' by phone at: '.$config['COMPANYPHONE'].' or';
//			}
//			$strReason .= " by email at: ".$config['COMPANYEMAIL'].".";
//		}
//		else if ($strStatus=="REJECTED") {
//			$strReason="Your order did not meet our minimum fraud screening requirements. If you have questions about our fraud screening rules, or wish to contact us to discuss this, please contact us";
//			if ($config['COMPANYPHONE'] != ''){
//				$strReason .= ' by phone at: '.$config['COMPANYPHONE'].' or';
//			}
//			$strReason .= " by email at: ".$config['COMPANYEMAIL'].".";
//		}
//		else if ($strStatus=="INVALID" or $strStatus=="MALFORMED") {
//			$strReason="We could not process your order because we have been unable to register your transaction with our Payment Gateway. You can place the order by contact us";
//			if ($config['COMPANYPHONE'] != ''){
//				$strReason .= ' by phone at: '.$config['COMPANYPHONE'].' or';
//			}
//			$strReason .= " by email at: ".$config['COMPANYEMAIL'].".";
//		}
//		else if ($strStatus=="ERROR") {
//			$strReason="We could not process your order because our Payment Gateway service was experiencing difficulties. You can place the order by contact us";
//			if ($config['COMPANYPHONE'] != ''){
//				$strReason .= ' by phone at: '.$config['COMPANYPHONE'].' or';
//			}
//			$strReason .= " by email at: ".$config['COMPANYEMAIL'].".";
//		}
//		else
//			$strReason="The transaction process failed. Please contact us with the date and time of your order and we will investigate.";
//			
//	}
//	$config['MESSAGE'] = $strReason;
//	return ($strReason);
}





function SendEmail($sendtoemail, $from, $fromemail, $additional, $subject, $message){
	global $config;

	if($config["UseSMTP"] != "Yes")
		SendPHPMail($sendtoemail, $from, $fromemail, $additional, $subject, $message);

	else
		SendSMTPMail($sendtoemail, $from, $fromemail, $additional, $subject, $message);

}



function SendPHPMail($sendtoemail, $from, $fromemail, $additional, $subject, $message){

	if (strtoupper(substr(PHP_OS,0,3)=='WIN'))
		$eol="\r\n"; 

	elseif (strtoupper(substr(PHP_OS,0,3)=='MAC'))
		$eol="\r"; 

	else
		$eol="\n"; 


	$headers  = "MIME-Version: 1.0".$eol;
	$headers .= "Content-type: text/html; charset=iso-8859-1".$eol;
	$headers .= "From: $from <$fromemail>".$eol;
	$headers .= "Reply-To: $from <$fromemail>".$eol; 

	if ($additional != ""){
		$headers .= "Cc: $additional".$eol;
	}

	mail($sendtoemail, $subject, $message, $headers);
}



function SendSMTPMail($sendtoemail, $from, $fromemail, $additional, $subject, $message){
	global $config;
	
	require_once("Mail.php");

	/* mail setup recipients, subject etc */
	$recipients = $sendtoemail;

	$headers["From"] = $fromemail;
	$headers["To"] = $sendtoemail;
	$headers["Subject"] = $subject;
	$headers["MIME-Version"] = "1.0";
	$headers["Content-type"] = "text/html; charset=iso-8859-1";

	if ($additional != ""){
		$headers["Cc"] = $additional;
	}

	/* SMTP server name, port, user/passwd */
	$smtpinfo["host"] = $config["SMTPHost"];
	$smtpinfo["port"] = $config["SMTPPort"];
	$smtpinfo["auth"] = true;
	$smtpinfo["username"] = $config["SMTPUser"];
	$smtpinfo["password"] = Decrypt($config["SMTPPassword"],$config["key"]."smt321");

	/* Create the mail object using the Mail::factory method */
	$mail_object =& Mail::factory("smtp", $smtpinfo);

	/* Ok send mail */
	$mail_object->send($recipients, $headers, $message);

}

?>