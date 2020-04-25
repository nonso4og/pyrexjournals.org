<?php

/***************************************************************************

					db_bridge.php

					------------

	product			: HTMLeditbox

	version			: 2.3

	released		: Thu May 27 2004

	copyright		: Copyright © 2001-2004 Labs4.com

	email			: support@labs4.com

	website			: http://www.labs4.com



***************************************************************************/



// don't edit anything here unless you really know what you are doing!!!

// all database settings are now available in _i3/inc/config.php file



error_reporting (0);



@include("../../_i3/inc/config.php");

@include("../lang/lang_".$settings['language'].".php");



if(isset($HTTP_GET_VARS['dbworks'])) {

 	$dbworks = $HTTP_GET_VARS['dbworks'];	

}



if((!isset($HTTP_GET_VARS['dbworks'])) && (!isset($dbworks))) {

	$dbworks = "";

}





switch($dbworks) {

	default:

	if($input_method == "3") {

		if(isset($HTTP_GET_VARS["dbname"])) {

			$dbname = $HTTP_GET_VARS["dbname"];

		} else {

			$dbname = $settings["dbname"];

		}

		if(isset($HTTP_GET_VARS["dbtable"])) {	

			$dbtable = $HTTP_GET_VARS["dbtable"];

		} else {

			$dbtable = $settings["dbtable"];

		}



		$dbfield = $HTTP_GET_VARS["dbfield"];

		$dbrecord = $HTTP_GET_VARS["dbrecord"];

		$dbai = $HTTP_GET_VARS["dbai"];

		$dbreturn = $HTTP_GET_VARS["dbreturn"];

		

		if(isset($HTTP_GET_VARS["dbsafe"])) {

			$dbsafe = $HTTP_GET_VARS["dbsafe"];

		} else {

			$dbsafe = $settings["dbsafe"];

		}

	}



	if($input_method == "4") {

		$dbname = $HTTP_POST_VARS["dbname"];

		$dbtable = $HTTP_POST_VARS["dbtable"];

		$dbrecord = $HTTP_POST_VARS["dbrecord"];

		$dbfield = $HTTP_POST_VARS["dbfield"];

		$dbai = $HTTP_POST_VARS["dbai"];

		$dbreturn = $HTTP_POST_VARS["dbreturn"];

		

		if(isset($HTTP_POST_VARS["dbsafe"])) {

			$dbsafe = $HTTP_POST_VARS["dbsafe"];

		} else {

			$dbsafe = $settings["dbsafe"];

		}

	}



break;



	case "init":



		$dbname = $HTTP_GET_VARS["dbname"];

		$dbtable = $HTTP_GET_VARS["dbtable"];

		$dbfield = $HTTP_GET_VARS["dbfield"];

		$dbrecord = $HTTP_GET_VARS["dbrecord"];

		$dbai = $HTTP_GET_VARS["dbai"];

		$dbreturn = $HTTP_GET_VARS["dbreturn"];

		

		if(isset($HTTP_GET_VARS["dbsafe"])) {

			$dbsafe = $HTTP_GET_VARS["dbsafe"];

		} else {

			$dbsafe = $settings["dbsafe"];

		}



		// (dbai stands for auto increment field called as id, ID or whatever - remember, this is the only CASE SENSITIVE variable)

		

		// in case, there is no record number, editor will create new record

		if($dbrecord == "") {

			return;



		// otherwise it will load requested content from database

		} else {



			if($db = mysql_connect($settings[dbhost],$settings[dbuser],$settings[dbpass])) {

				if(mysql_select_db($dbname,$db)) {

					if($query = mysql_query("SELECT ".$dbfield." AS thatsit FROM ".$dbtable." WHERE ".$dbai."=".$dbrecord."",$db)) {

						$result = mysql_fetch_array($query);

					

						// return stripslashes($result[thatsit]);

						echo stripslashes($result[thatsit]);



					} else { echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error1]."');</script>";

					}

		

				} else {

					echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error2]." ".$dbname.".');</script>";

				}



			} else {

				echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error3]."');</script>";

			}

		

			mysql_close($db);

		}



break;



case "save":

	// input is following - $dbname,$dbtable,$dbfield,$dbrecord,$dbsafe,$dbreturn,$edited

		

		$edited = $HTTP_POST_VARS["EditorValue"];

		

		if($db = mysql_connect($settings[dbhost],$settings[dbuser],$settings[dbpass])) {

			if(mysql_select_db($dbname,$db)) {



				if($settings[dbsafe] == "1") {

					$edited = addslashes($edited);

				}

				

				// no record number, insert new record to database

				if($dbrecord == "") {

					

					if($query = mysql_query("INSERT INTO ".$dbtable." (".$dbfield.") VALUES ('".$edited."')",$db)) {

					

						echo "<script language=\"Javascript\">window.location = '".$dbreturn."';</script>";



					} else { 

						echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error4]."');</script>";

					}



				// we have record number, update database record

				} else {



					if($query = mysql_query("UPDATE ".$dbtable." SET ".$dbfield."='".$edited."' WHERE ".$dbai."=".$dbrecord."",$db)) {

					

						echo "<script language=\"Javascript\">window.location = '".$dbreturn."';</script>";



					} else { 

						echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error5]." ".$dbai."=".$dbrecord." ...');</script>";

					}

				}



		

			} else {

				echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error6]." ".$dbname.".');</script>";

			}



		} else {

			echo "<script language=\"Javascript\">alert('".$lang[error].": ".$lang[dbbridge_error7]."');</script>";

		}

		

		mysql_close($db);

break;

}

?>