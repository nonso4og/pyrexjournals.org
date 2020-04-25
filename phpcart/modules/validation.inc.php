<?php

function ValidateCheckout(){
	global $config, $errorMessages, $errorFields, $lang;

	if (($_POST["paymentmethod"]) == "")

		$errorMessages[] = $lang["PaymentMethodRequired"];



	if ($config["FirstNameRequired"] != "")

		if (trim($_POST["firstname"]) == ""){

			$errorMessages[] = $config["FirstNameRequired"];

			$errorFields["FIRSTNAMEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["LastNameRequired"] != "")

		if (trim($_POST["lastname"]) == ""){

			$errorMessages[] = $config["LastNameRequired"];

			$errorFields["LASTNAMEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["AddressRequired"] != "")

		if (trim($_POST["address"]) == ""){

			$errorMessages[] = $config["AddressRequired"];

			$errorFields["ADDRESSREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["CityRequired"] != "")

		if (trim($_POST["city"]) == ""){

			$errorMessages[] = $config["CityRequired"];

			$errorFields["CITYREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["StateRequired"] != "")

		if (trim($_POST["state"]) == "" && trim($_POST["stateother"]) == ""){

			$errorMessages[] = $config["StateRequired"];

			$errorFields["STATEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["ZipRequired"] != "")

		if (trim($_POST["zip"]) == ""){

			$errorMessages[] = $config["ZipRequired"];

			$errorFields["ZIPREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["CountryRequired"] != "")

		if (trim($_POST["country"]) == ""){

			$errorMessages[] = $config["CountryRequired"];

			$errorFields["COUNTRYREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["PhoneRequired"] != "")

		if (trim($_POST["phone"]) == ""){

			$errorMessages[] = $config["PhoneRequired"];

			$errorFields["PHONEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if (!valid_email(trim($_POST["email"]))){

		$errorMessages[] = $config["EmailRequired"];

		$errorFields["EMAILREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}
		
	if ($config["SeparateBilling"] == "Yes" and $_POST['shippingsame'] != 'Y'){
		
		if ($config["SFirstNameRequired"] != "")

		if (trim($_POST["sfirstname"]) == ""){

			$errorMessages[] = $config["SFirstNameRequired"];

			$errorFields["SFIRSTNAMEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SLastNameRequired"] != "")

		if (trim($_POST["slastname"]) == ""){

			$errorMessages[] = $config["SLastNameRequired"];

			$errorFields["SLASTNAMEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SAddressRequired"] != "")

		if (trim($_POST["saddress"]) == ""){

			$errorMessages[] = $config["SAddressRequired"];

			$errorFields["SADDRESSREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SCityRequired"] != "")

		if (trim($_POST["scity"]) == ""){

			$errorMessages[] = $config["SCityRequired"];

			$errorFields["SCITYREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SStateRequired"] != "")

		if (trim($_POST["sstate"]) == "" && trim($_POST["sstateother"]) == ""){

			$errorMessages[] = $config["SStateRequired"];

			$errorFields["SSTATEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SZipRequired"] != "")

		if (trim($_POST["szip"]) == ""){

			$errorMessages[] = $config["SZipRequired"];

			$errorFields["SZIPREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SCountryRequired"] != "")

		if (trim($_POST["scountry"]) == ""){

			$errorMessages[] = $config["SCountryRequired"];

			$errorFields["SCOUNTRYREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if ($config["SPhoneRequired"] != "")

		if (trim($_POST["sphone"]) == ""){

			$errorMessages[] = $config["SPhoneRequired"];

			$errorFields["SPHONEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}
	} // end if separate billing and shipping is required
		

}



function ValidateCC(){

	global $config, $errorMessages, $errorFields, $lang;

	if (trim($_POST["cctype"]) == ""){

		$errorMessages[] = "Credit Card Type";

		$errorFields["CCTYPEREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if (trim($_POST["ccnumber"]) == ""){

		$errorMessages[] = "Credit Card Number";

		$errorFields["CCNUMBERREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if (trim($_POST["ccmonth"]) == ""){

		$errorMessages[] = "Credit Card Month Expires";

		$errorFields["CCEXPIREREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if (trim($_POST["ccyear"]) == ""){

		$errorMessages[] = "Credit Card Year Expires";

		$errorFields["CCEXPIREREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

	if (trim($_POST["cvvcode"]) == ""){

		$errorMessages[] = "Credit Card CVV Code";

		$errorFields["CVVREQUIRED"] = '<span class="error">'.$lang["Required"].'</span>';

		}

}



function valid_email($email)

{

  // check an email address is possibly valid

	if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email)){

    return false;

	}

  else

    return true;

}

?>