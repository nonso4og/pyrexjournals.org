<?php
$dd_test = 1;
/* Base 64 Encoding function **
** PHP does it natively but just for consistency and ease of maintenance, let's declare our own function **/
function base64Encode($plain) {
  // Initialise output variable
  $output = "";
  
  // Do encoding
  $output = base64_encode($plain);
  
  // Return the result
  return $output;
}

/* Base 64 decoding function **
** PHP does it natively but just for consistency and ease of maintenance, let's declare our own function **/
function base64Decode($scrambled) {
  // Initialise output variable
  $output = "";
  
  // Fix plus to space conversion issue
  $scrambled = str_replace(" ","+",$scrambled);
  
  // Do encoding
  $output = base64_decode($scrambled);
  
  // Return the result
  return $output;
}


/*  The SimpleXor encryption algorithm                                                                                **
**  NOTE: This is a placeholder really.  Future releases of Form will use AES or TwoFish.  Proper encryption      **
**  This simple function and the Base64 will deter script kiddies and prevent the "View Source" type tampering        **
**  It won't stop a half decent hacker though, but the most they could do is change the amount field to something     **
**  else, so provided the vendor checks the reports and compares amounts, there is no harm done.  It's still          **
**  more secure than the other PSPs who don't both encrypting their forms at all                                      */

function simpleXor($InString, $Key) {
  // Initialise key array
  $KeyList = array();
  // Initialise out variable
  $output = "";
  
  // Convert $Key into array of ASCII values
  for($i = 0; $i < strlen($Key); $i++){
    $KeyList[$i] = ord(substr($Key, $i, 1));
  }

  // Step through string a character at a time
  for($i = 0; $i < strlen($InString); $i++) {
    // Get ASCII code from string, get ASCII code from key (loop through with MOD), XOR the two, get the character from the result
    // % is MOD (modulus), ^ is XOR
    $output.= chr(ord(substr($InString, $i, 1)) ^ ($KeyList[$i % strlen($Key)]));
  }

  // Return the result
  return $output;
}


//** Wrapper function do encrypt an encode based on strEncryptionType setting **
function encryptAndEncode($strIn) {
	global $strEncryptionType, $strEncryptionPassword;
	
	if ($strEncryptionType=="XOR") 
	{
		//** XOR encryption with Base64 encoding **
		return base64Encode(simpleXor($strIn,$strEncryptionPassword));
	} 
	else 
	{
		//** AES encryption, CBC blocking with PKCS5 padding then HEX encoding - DEFAULT **

		//** use initialization vector (IV) set from $strEncryptionPassword
    	$strIV = $strEncryptionPassword;
    	
    	//** add PKCS5 padding to the text to be encypted
    	$strIn = addPKCS5Padding($strIn);

    	//** perform encryption with PHP's MCRYPT module
		$strCrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $strEncryptionPassword, $strIn, MCRYPT_MODE_CBC, $strIV);
		
		//** perform hex encoding and return
		return "@" . bin2hex($strCrypt);
	}
}


//** Wrapper function do decode then decrypt based on header of the encrypted field **
function decodeAndDecrypt($strIn) {
	global $strEncryptionPassword;
	
	//echo 'Got here';
	
	if (substr($strIn,0,1)=="@") 
	{
		
		//echo '<br>HEX';
		//echo '<br>pw:  '.$strEncryptionPassword;
	
		//** HEX decoding then AES decryption, CBC blocking with PKCS5 padding - DEFAULT **
		
		//** use initialization vector (IV) set from $strEncryptionPassword
    	$strIV = $strEncryptionPassword;
    	
    	//** remove the first char which is @ to flag this is AES encrypted
    	$strIn = substr($strIn,1); 
    	
    	//** HEX decoding
    	$strIn = pack('H*', $strIn);
    	
    	//** perform decryption with PHP's MCRYPT module
		return removePKCS5Padding(
			mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $strEncryptionPassword, $strIn, MCRYPT_MODE_CBC, $strIV)); 
	} 
	else 
	{
		//** Base 64 decoding plus XOR decryption **
		return simpleXor(base64Decode($strIn),$strEncryptionPassword);
	}
}

// New function added 2011-12-29 
// Need to remove padding bytes from end of decoded string
function removePKCS5Padding($decrypted) {
	$padChar = ord($decrypted[strlen($decrypted) - 1]);
    return substr($decrypted, 0, -$padChar); 
}

//** PHP's mcrypt does not have built in PKCS5 Padding, so we use this
function addPKCS5Padding($input)
{
   $blocksize = 16;
   $padding = "";

   // Pad input to an even block size boundary
   $padlength = $blocksize - (strlen($input) % $blocksize);
   for($i = 1; $i <= $padlength; $i++) {
      $padding .= chr($padlength);
   }
   
   return $input . $padding;
}




// Inspects and validates user input for an email field. 
function isValidEmailField($strInputValue, &$returnedResult)
{
    // The allowable e-mail address format accepted by the SagePay gateway must be RFC 5321/5322 compliant (see RFC 3696) 
	$sEmailRegExpPattern = '/^[a-z0-9\xC0-\xFF\!#$%&amp;\'*+\/=?^_`{|}~\*-]+(?:\.[a-z0-9\xC0-\xFF\!#$%&amp;\'*+\/=?^_`{|}~*-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[a-z]{2,3}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum|at|coop|travel)$/';
    $strInputValue = trim($strInputValue);
    $returnedResult = validateStringWithRegExp($strInputValue, $sEmailRegExpPattern, FALSE);
    
    if ($returnedResult == FIELD_VALID) {
        return TRUE;
    } else{
        return FALSE;
    }
}


// Inspects and validates user input for a phone field. 
function isValidPhoneField($strInputValue, &$returnedResult)
{
    $strAllowableChars = " 0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-()+";
    $strInputValue = trim($strInputValue);
    $returnedResult = validateString($strInputValue, $strAllowableChars, FALSE, FALSE, 20, -1);

    if ($returnedResult == FIELD_VALID) {
        return TRUE;
    } else{
        return FALSE;
    }
}


// A generic function used to inspect and validate a string from user input.
//   Parameter "strInputValue" is the value to perform validation on.
//   Parameter "strAllowableChars" is a string of characters allowable in "strInputValue" if its to be deemed valid.
//   Parameter "blnAllowAccentedChars" accepts a boolean value which determines if "strInputValue" can contain Accented or High-order characters.
//   Parameter "blnIsRequired" accepts a boolean value which specifies whether "strInputValue" must have a non-null and non-empty value.
//   Parameter "intMaxLength" accepts an integer which specifies the maximum allowable length of "strInputValue". Set to -1 for this to be ignored.
//   Parameter "intMinLength" specifies the miniumum allowable length of "strInputValue". Set to -1 for this to be ignored.
//   Returns a result from one of the field validation constants that begin with "FIELD_" 
function validateString($strInputValue, $strAllowableChars, $blnAllowAccentedChars, $blnIsRequired, $intMaxLength, $intMinLength)
{
    if ($blnIsRequired == TRUE && strlen($strInputValue) == 0)
	{
        return FIELD_INVALID_REQUIRED_INPUT_VALUE_MISSING;
	}
    elseif (($intMaxLength != -1) && (strlen($strInputValue) > $intMaxLength)) 
	{
        return FIELD_INVALID_MAXIMUM_LENGTH_EXCEEDED;
	}
    elseif ($strInputValue != cleanInput2($strInputValue, $strAllowableChars, $blnAllowAccentedChars))
	{
        return FIELD_INVALID_BAD_CHARACTERS;
	}
    elseif (($blnIsRequired == TRUE) && (strlen($strInputValue) < $intMinLength)) 
	{
        return FIELD_INVALID_MINIMUM_LENGTH_NOT_MET;
	}
    elseif (($blnIsRequired == FALSE) && (strlen($strInputValue) > 0) && (strlen($strInputValue) < $intMinLength))
	{
        return FIELD_INVALID_MINIMUM_LENGTH_NOT_MET;
    }
    else
    {
        return FIELD_VALID;
    }
}


// A generic function to inspect and validate a string from user input based on a Regular Expression pattern.
//   Parameter "strInputValue" is the value to perform validation on.
//   Parameter "strRegExPattern" is a Regular Expression string pattern used to validate against "strInputValue".
//   Parameter "blnIsRequired" accepts a boolean value which specifies whether "strInputValue" must have a non-null and non-empty value.
//   Returns a result from one of the field validation constants that begin with "FIELD_" 
function validateStringWithRegExp($strInputValue, $strRegExPattern, $blnIsRequired)
{
    if ($blnIsRequired == TRUE && strlen($strInputValue) == 0) 
    {
        return FIELD_INVALID_REQUIRED_INPUT_VALUE_MISSING;
	}
    elseif (strlen($strInputValue) > 0)
    {    
        if (preg_match($strRegExPattern, $strInputValue)) {
            return FIELD_VALID;
        } else {
            return FIELD_INVALID_BAD_FORMAT;
        }
    }
    else 
    {
        return FIELD_VALID;
    }
}


/* The getToken function.                                                                                         **
** NOTE: A function of convenience that extracts the value from the "name=value&name2=value2..." reply string **
** Works even if one of the values is a URL containing the & or = signs.                                      	  */
function getToken($thisString) {

  // List the possible tokens
  $Tokens = array(
    "Status",
    "StatusDetail",
    "VendorTxCode",
    "VPSTxId",
    "TxAuthNo",
    "Amount",
    "AVSCV2", 
    "AddressResult", 
    "PostCodeResult", 
    "CV2Result", 
    "GiftAid", 
    "3DSecureStatus", 
    "CAVV",
	"AddressStatus",
	"CardType",
	"Last4Digits",
	"PayerStatus");

  // Initialise arrays
  $output = array();
  $resultArray = array();
  
  // Get the next token in the sequence
  for ($i = count($Tokens)-1; $i >= 0 ; $i--){
    // Find the position in the string
    $start = strpos($thisString, $Tokens[$i]);
	// If it's present
    if ($start !== false){
      // Record position and token name
      $resultArray[$i]->start = $start;
      $resultArray[$i]->token = $Tokens[$i];
    }
  }
  
  // Sort in order of position
  sort($resultArray);
	// Go through the result array, getting the token values
  for ($i = 0; $i<count($resultArray); $i++){
    // Get the start point of the value
    $valueStart = $resultArray[$i]->start + strlen($resultArray[$i]->token) + 1;
	// Get the length of the value
    if ($i==(count($resultArray)-1)) {
      $output[$resultArray[$i]->token] = substr($thisString, $valueStart);
    } else {
      $valueLength = $resultArray[$i+1]->start - $resultArray[$i]->start - strlen($resultArray[$i]->token) - 2;
	  $output[$resultArray[$i]->token] = substr($thisString, $valueStart, $valueLength);
    }      

  }

  // Return the ouput array
  return $output;
}



?>