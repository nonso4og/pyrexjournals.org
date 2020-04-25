<script language="JavaScript">

	var format="HTML"

	var tmpFontFamily

	var tmpFontSize

	var tmpBgColor1

	var tmpText

	var tmpBgColor3

	var framingStatus = "OFF"

	var imageWin

	var tableWin

	var linkWin

	var pickerWin

	var checkWin

	var zoomValue = 100;



	var inputMethod = <?php echo $input_method?>;

	var useRelPaths = <?php echo $option[6]?>;

	var useCSS = "<?php echo $option[7]?>";

	var isIE = false;

	var isMoz = false;

	var isSafari=false;

	var safariLastSel=new Array();

	var isOk=false;

	var name =  navigator.appName

	var version =  parseFloat(navigator.appVersion)

	var platform = navigator.platform

	var textEditMoz;

	if (name == "Microsoft Internet Explorer"){

		isIE=true;

		if(version >= 4) {

			isOk=true;

		}

	} else if(name== "Netscape"){

		isMoz=true;

		if(version >= 5) {

			isOk=true;

		}

		ua=navigator.userAgent;

		if(ua.indexOf('Macintosh')>0 && ua.indexOf('Firefox')==-1){

			isSafari=true;

		}

	}

	if(!isOk){

	   alert('<?=$lang[activex_warning]?>');

	}





function setFocus() {

    if(isIE) {

    	textEdit.focus()

    }

    else if(isMoz) {

    	textEditMoz.contentWindow.focus();

    }

}





	function defWindows(subH) {

		<?php	if($input_method == 6) {

				echo "var totalH = ".$editor_height." \n";

				echo "var editH = totalH - 84 \n";

			} else {

				echo "var totalH = document.body.offsetHeight \n";

				echo "var editH = totalH - 96 \n";

			}

		?>

		if(isIE) {

			document.all['textEdit'].height = editH-subH;

		}

		else if(isMoz){

		    document.getElementById('textEdit').height = editH-subH;

		}

	}



	function blockDefault() {

		defWindows(22);

		var subHTML = ""

		subHTML += "<body topmargin=0 leftmargin=0>"

		subHTML += "<table cellspacing=3 cellpadding=0 border=0>"

		subHTML += "<tr><td>"

		subHTML += "<font style=\"font: 9.9px verdana; color: #000000;\">HTMLeditbox <?php echo str_replace('_','.',$settings[version]); ?> (build <?=$settings[build]?>) &nbsp&nbsp - <?=$settings['copyright']?> All Rights Reserved&nbsp; - <?=$lang['language']?> translation: <a href=\"mailto:<?=$lang['translator_email']?>\" target=\"_blank\"><font color=\"#CE0000\"><?=$lang['translator']?></font></a>"

		subHTML += "</font></td></tr></table>"

		subHTML += "</body>"

		setFocus();

	}





	function initEditor() {



	if(isIE) {

	<?php

	if($input_method == 1) {

		echo "pool.document.body.innerHTML = window.opener.document.".$formname.".".$inputname.".value; ";



	} elseif($input_method == 2) {

		echo "pool.document.body.innerHTML = window.opener.document.getElementById(\"".$id."\").value; ";



	}

	?>

			textEdit.document.designMode="On";

			textEdit.document.open();



			if(inputMethod == 5) {

				var htmlString = pool.document.documentElement.outerHTML;

			} else if(inputMethod == 6) {

				var htmlString = document.getElementById("<?=$he_variable?>").value;

			} else {

				var htmlString = pool.document.body.innerHTML;

			}



			textEdit.document.write(htmlString);

			textEdit.document.close();

			blockDefault();



	<?php

			if($option[7] != "") {

				echo "\t\ttextEdit.document.createStyleSheet('".$option[7]."');\n";

				echo "\t\tsetTimeout(\"populateCSS();\",200);\n";

			}

	?>

			CssFramingOn();

			setFocus();

			updateStatusBar();

		}

		else if(isMoz) {



		 <?php



		 	if($input_method == 1) {

		 		echo "if(isSafari){\n";

		 		echo "document.getElementById('pool').innerHTML = window.opener.document.forms['".$formname."'].elements['".$inputname."'].value; ";

		 		echo "}else{\n";

		 		echo "document.getElementById('pool').contentDocument.body.innerHTML = window.opener.document.forms['".$formname."'].elements['".$inputname."'].value; ";

		 		echo "}\n";



		 	} elseif($input_method == 2) {

		 		echo "if(isSafari){\n";

		 		echo "document.getElementById('pool').innerHTML = window.opener.document.getElementById(\"".$id."\").value; ";

		 		echo "}else{\n";

		 		echo "document.getElementById('pool').contentDocument.body.innerHTML = window.opener.document.getElementById(\"".$id."\").value; ";

		 		echo "}\n";



		 	}

	?>

			textEditMoz=document.getElementById("textEdit");





			docMoz=textEditMoz.contentDocument;

			docMoz.open();

			var htmlString ='';

			htmlString = document.getElementById("<?=$he_variable?>").value;





	<?php

			if($option[7] != "") {

			    echo "\t\tdocMoz.write('<link href=\'".$option[7]."\' rel=\'stylesheet\' type=\'text/css\' id=\'editor_added_style\'>');\n";

				echo "\t\tsetTimeout(\"populateCSS();\",400);\n";

			}

	?>

			docMoz.write('<style type="text/css" id=\'editor_inline_style\'>\ntable{ border: 1px dotted #BCBCBC;}\ntd { border: 1px dotted #BCBCBC; }\nbody {background-color: #FFFFFF;}\n</style>');

	        docMoz.write(htmlString);

	        docMoz.close();

	        setTimeout('initMoz()',200);

			blockDefault();

			setTimeout('CssFramingOn()',300);

			setFocus();

		}

	}



	function initMoz() {

		textEditMoz.contentDocument.designMode="on";

		if(!isSafari){

			textEditMoz.contentWindow.document.execCommand("useCSS", false, true);

			textEditMoz.contentWindow.document.addEventListener("dblclick", mozSelect, true);

		}

	}



	function mozSelect() {

		seledit=textEditMoz.contentWindow.getSelection().getRangeAt(0);

		if(seledit.startContainer.nodeType==3){

			s=seledit.startContainer.data;

			if(seledit.startOffset<s.length) {



				s=s.substring(seledit.startOffset);

				i=s.indexOf(' ');

				if(i==-1){

					i=s.length;

				}

				range=seledit.cloneRange();

				range.setEnd(seledit.startContainer,seledit.startOffset+i);

				textEditMoz.contentWindow.getSelection().removeAllRanges();

				textEditMoz.contentWindow.getSelection().addRange(range);

			}

			else {

			 	ns=seledit.startContainer.nextSibling;

			 	if(!ns) return;

			 	cn=ns.firstChild;

			 	while(cn && cn.nodeType!=3){

			 	 	cn=cn.firstChild;

			 	}

			 	if(cn) {

					textEditMoz.contentWindow.getSelection().removeAllRanges();

					range=textEditMoz.contentDocument.createRange();

					s=cn.data;

					i=s.indexOf(' ');

					if(i=='-1') {

						i=s.length;

					}

					range.setStart(cn,0);

					range.setEnd(cn,i);

					textEditMoz.contentWindow.getSelection().addRange(range);

				}

			}

		}



	}





	window.onload = initEditor



</script>