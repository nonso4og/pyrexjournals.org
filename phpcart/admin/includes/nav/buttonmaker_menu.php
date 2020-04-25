<table border="0" cellspacing="0" cellpadding="0">
	<tr>
    	<td class="submenu" align="center"><b>Button Maker</b></td>
    </tr>
    
    <tr>
        <td class="nav_links">	
            <a href="button_maker.php?option=1" class="sublink
            <?php 
				if ($_SERVER['QUERY_STRING'] == '' || strpos($_SERVER['QUERY_STRING'],'option=0') !== FALSE || strpos($_SERVER['QUERY_STRING'],'option=1') !== FALSE){ echo ' active'; }?>">Hyperlink Button</a><br />
            
        	<a href="button_maker.php?option=2" class="sublink <?php if (strpos($_SERVER['QUERY_STRING'],'option=2') !== FALSE){ echo ' active'; }?>">Hyperlink with Image</a><br />
            
            <a href="button_maker.php?option=3" class="sublink <?php if (strpos($_SERVER['QUERY_STRING'],'option=3') !== FALSE){ echo '  active'; }?>">HTML Form Button</a><br />
            
            <a href="button_maker.php?option=4" class="sublink <?php if (strpos($_SERVER['QUERY_STRING'],'option=4') !== FALSE){ echo '  active'; }?>">Hyperlink Key</a><br />
            <br />
        </td>
    </tr>
</table>

<!--Spacer Row-->
<p>&nbsp;</p>



