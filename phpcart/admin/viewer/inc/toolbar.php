<?php

/***************************************************************************

					toolbar.php

					------------

	product			: HTMLeditbox

	version			: 2.3

	released		: Thu May 27 2004

	copyright		: Copyright © 2001-2004 Labs4.com

	email			: support@labs4.com

	website			: http://www.labs4.com



***************************************************************************/

/* you can define image set in config.php file and also define each button

   in its directory in file called define_buttons.php

***************************************************************************/



$buttons = Array();

$buttons['path'] = $settings[editor_depth].$settings[app_dir]."/img/".$settings[toolbar_img_dir]."/";



// include($settings[toolbar_img_dir]."/define_buttons.php");

include("./".$buttons['path']."define_buttons.php");



function create_button($button_name,$button_alt,$button_function) {

	global $buttons;

}





?>