<?php

// display txt order files in html

if ($_GET['order'] == ''){
	echo 'Error: Missing order filename';
}
else {
	echo file_get_contents($_GET['order'].'.txt');
}

?>