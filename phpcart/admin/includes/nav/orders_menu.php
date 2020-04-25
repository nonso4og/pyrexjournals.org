<table border="0" cellspacing="0" cellpadding="0">
	<tr>
    	<td class="submenu" align="center"><strong>Orders</strong></td>
    </tr>
    
    <tr>
        <td class="nav_links">	
            <a href="orders.php?option=1" class="sublink
            <?php 
				if ($_SERVER['QUERY_STRING'] == '' || strpos($_SERVER['QUERY_STRING'],'option=0') !== FALSE || strpos($_SERVER['QUERY_STRING'],'option=1') !== FALSE){ echo ' active'; }?>">Show All Orders</a><br />
            
        	<a href="orders.php?option=2" class="sublink <?php if (strpos($_SERVER['QUERY_STRING'],'option=2') !== FALSE){ echo ' active'; }?>">Search Orders</a><br />
        	<br />
        </td>
    </tr>
</table>

<!--Spacer Row-->
<p>&nbsp;</p>



