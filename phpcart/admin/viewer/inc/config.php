<?php
/***************************************************************************
					_config.php
					------------
	product			: HTMLeditbox
	version			: 2.3
	released		: Thu May 27 2004
	copyright		: Copyright © 2001-4 Labs4.com
	email			: support@labs4.com
	website			: http://www.labs4.com

***************************************************************************/
/* This is main configuration file,
   settings can be overiden from init link ... for detail see docs ********
***************************************************************************/

/**************************************************************************
Script version and copyright information
***************************************************************************/
$settings[version] = "2.3";
$settings[build] = 8;
$settings[copyright] = "&copy;&nbsp;2006 Webrigger Internet Services (phpCart.net)";
$settings[product_name] = "HTMLeditbox";

/**************************************************************************
Language settings
***************************************************************************/
$settings[language] = "english";

/**************************************************************************
Security settings - to switch on, set to one
***************************************************************************/
$settings[security] = "0";
$settings[password] = "password";

/**************************************************************************
Editor appearance settings
***************************************************************************/
$settings[bgcolor] = "#FFFFFF";
$settings[bgcolor2] = "#FFFFFF";
$settings[border_color] = "#FFFFFF";

$settings[textcolor1] = "#000000";
$settings[textcolor2] = "#FFFFFF";
$settings[textcolor3] = "#FFFFFF";


/**************************************************************************
Default editor options, can be overriden from initial link (use wizard)
***************************************************************************/
$option[1] = 0;		// 1. Local image selector  0 - 0ff / 1 - On
$option[2] = 0;		// 2. Table functions  0 - Off / 1 - On
$option[3] = 0;		// 3. File Functions  0 - Off / 1 - On
$option[4] = 0;		// 4. Color Picker  0 - Off / 1 - On
$option[5] = 0;		// 5. Font Settings  0 - Off / 1 - On
$option[6] = 0;		// 6. Relative Paths 0 - Off / 1 - On
$option[7] = "";	// 7. Cascade Style Sheet - filename with path

/**************************************************************************
to disable HTML/WYSIWYG button set this variable to 1
***************************************************************************/
$settings[disable_html_view] = 1;


/**************************************************************************
Path to root image directory (no trailing slash)
***************************************************************************/
$settings[images_root] = "./images";

/**************************************************************************
Maximum image size in bytes - example: 100000 = 100kB
***************************************************************************/
$settings[max_img_size] = "2500000";

/**************************************************************************
Approved image file types ... to add another file type,
create another line with $img_file_types[x] where x is next number in a row
***************************************************************************/
$settings[img_file_types][1] = "image/jpeg";
$settings[img_file_types][2] = "image/pjpeg";
$settings[img_file_types][3] = "image/gif";
$settings[img_file_types][4] = "image/png";


/**************************************************************************
Path to root file directory - if used (no trailing slash)
- if you want to list files from root add dot "." but remember that script
  supports only one level of subdirectories!
***************************************************************************/
$settings[files_root] = "./images";

/**************************************************************************
Maximum file size in bytes - example: 100000 = 100kB
***************************************************************************/
$settings[max_file_size] = "2500000";

/**************************************************************************
Approved file extensions for file listing ... to add another extension,
create another line with $mime_file_ext[x] where x is next number in row
if you want narrow file type selection just uncomment unwanted extensions
***************************************************************************/
$settings[mime_file_ext][1] = ".html";
$settings[mime_file_ext][2] = ".htm";
$settings[mime_file_ext][3] = ".asc";
$settings[mime_file_ext][4] = ".txt";
$settings[mime_file_ext][5] = ".jpeg";
$settings[mime_file_ext][6] = ".asc";
$settings[mime_file_ext][7] = ".jpeg";
$settings[mime_file_ext][8] = ".jpg";
$settings[mime_file_ext][9] = ".gif";
$settings[mime_file_ext][10] = ".png";
$settings[mime_file_ext][11] = ".js";
$settings[mime_file_ext][12] = ".pdf";
$settings[mime_file_ext][13] = ".ai";
$settings[mime_file_ext][14] = ".eps";
$settings[mime_file_ext][15] = ".ps";
$settings[mime_file_ext][16] = ".doc";
$settings[mime_file_ext][17] = ".hqx";
$settings[mime_file_ext][18] = ".tar";
$settings[mime_file_ext][19] = ".bin";
$settings[mime_file_ext][20] = ".uu";
$settings[mime_file_ext][21] = ".exe";
$settings[mime_file_ext][22] = ".rtf";
$settings[mime_file_ext][23] = ".rar";
$settings[mime_file_ext][24] = ".zip";
$settings[mime_file_ext][25] = ".wav";
$settings[mime_file_ext][26] = ".au";
$settings[mime_file_ext][27] = ".snd";
$settings[mime_file_ext][28] = ".mpeg";
$settings[mime_file_ext][29] = ".mpg";
$settings[mime_file_ext][30] = ".mp3";
$settings[mime_file_ext][31] = ".qt";
$settings[mime_file_ext][32] = ".mov";
$settings[mime_file_ext][33] = ".avi";

/**************************************************************************
Font sizes setting - is size in points?
***************************************************************************/
$settings[font_size_type] = "pt";		// pt or num

/**************************************************************************
Font sizes (numeric)
***************************************************************************/
$settings[font_size_num][1] = 1;
$settings[font_size_num][2] = 2;
$settings[font_size_num][3] = 3;
$settings[font_size_num][4] = 4;
$settings[font_size_num][5] = 5;
$settings[font_size_num][6] = 6;
$settings[font_size_num][7] = 7;

/**************************************************************************
Font sizes (points) - due to ActiveX limitation size cannot be higher than 16
***************************************************************************/
$settings[font_size_pt][1] = 8;
$settings[font_size_pt][2] = 9;
$settings[font_size_pt][3] = 10;
$settings[font_size_pt][4] = 11;
$settings[font_size_pt][5] = 12;
$settings[font_size_pt][6] = 13;
$settings[font_size_pt][7] = 14;
$settings[font_size_pt][8] = 15;
$settings[font_size_pt][9] = 16;

/**************************************************************************
Color picker - you can set it embedded or in new window
***************************************************************************/
$settings[color_picker] = "window"; // "embedded" or "window"

/**************************************************************************
Toolbar image set directory - set name of the directory
***************************************************************************/
$settings[toolbar_img_dir] = "";

/**************************************************************************
Disable browsing in image selector below default directory
***************************************************************************/
$settings[disable_browsing_below] = "no"; // yes/no

/**************************************************************************
Database settings - fill in only if you use dbase bridge
***************************************************************************/
$settings[dbhost] = "localhost";	// database host (usually localhost)
$settings[dbuser] = "user";			// database username
$settings[dbpass] = "";				// database password
$settings[dbname] = "";		// database name
$settings[dbtable] = "";		// database table
$settings[dbsafe] = "0";		// 0/1 use addslashes() to store data in db

/**************************************************************************
End of configuration file
***************************************************************************/
?>