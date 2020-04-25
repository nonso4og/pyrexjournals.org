<?php

/***************************************************************************

					_editor.php

					------------

	product			: HTMLeditbox

	version			: 2.3

	released		: Thu Jun 15 2004

	copyright		: Copyright © 2001-2004 Labs4.com

	email			: support@labs4.com

	website			: http://www.labs4.com



***************************************************************************/



error_reporting (0);



$settings = Array();

$settings['app_dir'] = "viewer"; // application files directory (no trailing slash)



global $HTTP_GET_VARS,$HTTP_POST_VARS,$HTTP_SERVER_VARS,$PHP_SELF;



if(isset($he_depth)) {

	$settings[editor_depth] = $he_depth;

} else {

	$settings[editor_depth] = "";

}



@include($settings[editor_depth].$settings[app_dir]."/inc/config.php");

@include($settings[editor_depth].$settings[app_dir]."/lang/lang_".$settings['language'].".php");





$safemode = ini_get("safe_mode");

if($safemode == 1) { $safemode = "ON"; } elseif($safemode == 0) { $safemode = "OFF"; }



// get protocol type - thanks to Robert Gruber (www.giskaard.com)

$protocol = $HTTP_SERVER_VARS["HTTPS"] ? "https" : "http";



// get absolute path for replacing in relative links (IIS friendly)

$full_path = $protocol.'://'.$HTTP_HOST.$PHP_SELF;

if(!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {

   $full_path .= '?'.$HTTP_SERVER_VARS['QUERY_STRING'];

}

$path_chunks = parse_url($full_path);

$work_path = $path_chunks['scheme']."://".$path_chunks['host'].$path_chunks['path'];

$abs_path = substr($work_path,0,strrpos($work_path,"/"));



// editor size and settings for embedding

$editor_width = "100%";

$editor_height = "100%";

$on_blur = "";



// get options from initial tag

if(isset($HTTP_GET_VARS["options"])) {

	$optpack = $HTTP_GET_VARS["options"];

}



// new in v.2.3 - multiple input methods

// this weird workaround is here to enable $formname, $inputname, $id and other

// variables in embedded forms, otherwise they get stolen by editor and generate

// errors



$input_method = 6;

$editor_width = $he_width;

$editor_height = $he_height;

$dynamic_textarea = "<textarea id=\"".$he_variable."\" name=\"".$he_variable."\" style=\"display: none;\">".$he_data."</textarea>";

$optpack = $he_options;

$on_blur = "onBlur=\"copyEmbedded();\"";

if(isset($he_iconset)) {

	$settings[toolbar_img_dir] = $he_iconset;

}



// on the fly settings - new from v 1 build 9 - see docs

if($optpack == "") {

	// keep settings from config file

} else {

	// use settings provided in init link

	// order of settings

	// 1. Local image selector  0 - 0ff / 1 - On

	// 2. Table functions  0 - Off / 1 - On

	// 3. File Functions  0 - Off / 1 - On

	// 4. Color Picker  0 - Off / 1 - On

	// 5. Font Settings  0 - Off / 1 - On

	// 6. Relative Paths 0 - Off / 1 - On

	// 7. Cascade Style Sheet - with path

	$optionsArray = split(',' , $optpack);

	$nn = 1;

	foreach($optionsArray as $value) {

		$option[$nn] = $value;

		$nn++;

	}

}



if(isset($HTTP_GET_VARS["op"])) {

	$op = $HTTP_GET_VARS["op"];

} elseif(isset($HTTP_POST_VARS["op"])) {

	$op = $HTTP_POST_VARS["op"];

} else {

	$op = "";

}



echo $dynamic_textarea;



include($settings[editor_depth].$settings['app_dir']."/js/core_js.php");



echo  <<<content



				<table border="0" cellpadding="5" cellspacing="0" width="$editor_width" height="$editor_height" style="border: 1px solid $settings[border_color]; background-color: $settings[bgcolor]">

					<tr>

						<td align="top" height=30>

content;



		include($settings[editor_depth].$settings['app_dir']."/inc/toolbar.php");



echo  <<<content

						</td>

					</tr>

					<tr>

						<td valign="top">



							<!-- start of iframe section -->

							<IFRAME ID="textEdit" width="100%" height="95%" $on_blur></IFRAME>



							<!-- end of iframe section -->



							<img src="$settings[editor_depth]$settings[app_dir]/img/pix.gif" width="100" height="5"><br>





							<!-- start of pool section -->

content;

								echo "<IFRAME id=\"pool\" width=\"0\" height=\"0\" style=\"display: none;\" frameborder=\"0\" noresize scrolling=\"no\" src=\"\"></IFRAME>";



echo  <<<content



							<!-- end of pool section -->



						</td>

					</tr>

				</table>

content;





?>