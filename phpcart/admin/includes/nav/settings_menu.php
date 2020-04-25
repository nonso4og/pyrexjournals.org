<?php
	// DISPLAY CURRENT HEADER WITH ADD CURRENCY 
	if ($_GET['option'] == '13'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Currency</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=14" class="sublink">Add Currency</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
	<?php
	}
	
	// DISPLAY CURRENT HEADER WITH SHOW ALL CURRENCIES 
	if ($_GET['option'] == '14'|| $_GET['option'] == '15'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Currency</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=13" class="sublink">Show All Currencies</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
    
	<?php
	}
	
	// DISPLAY CURRENT HEADER WITH ADD STATE/REGION  
    if ($_GET['option'] == '8'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>State/Region Taxes</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=17" class="sublink">Add New State/Region</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
       
	<?php
	}
	
	// DISPLAY CURRENT HEADER WITH SHOW ALL STATE/REGIONS
    if ($_GET['option'] == '17'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>State/Region Taxes</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=8" class="sublink">Show all State/Region</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
       
	<?php
	}
	
	// DISPLAY CURRENT HEADER WITH ADD COUNTRY 
	 if ($_GET['option'] == '9'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Country Taxes</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=18" class="sublink">Add New Country</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
  
  	<?php 
    }	
	
	// DISPLAY CURRENT HEADER WITH SHOW ALL STATE/REGIONS
    if ($_GET['option'] == '18'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Country Taxes</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=9" class="sublink">Show all Countries</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
       
	<?php } 
	
	
	// DISPLAY CURRENT SHIPPING ZONES WITH ADD NEW ZONE 
	 if ($_GET['option'] == '20'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Shipping Zones</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=21" class="sublink">Add New Shipping Zone</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
  
  	<?php 
    }	
	
	// DISPLAY CURRENT HEADER WITH SHOW ALL SHIPPING ZONE
    if ($_GET['option'] == '21' || $_GET['option'] == '22'){
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Shipping Zones</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=20" class="sublink">Show all Shipping Zones</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
       
	<?php } 
	
	// DISPLAY CURRENT HEADER WITH ADD CURRENCY 
	if ($_GET['option'] == '24'){
		$zoneid = $_REQUEST['zoneid'];
		
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
    		<td class="submenu" align="center"><b>Shipping Zones</b></td>
    	</tr>
		
		<tr>
        	<td class="nav_links">	   
        	    <a href="settings.php?option=22&zoneid=<?php echo $zoneid; ?>" class="sublink">Return to Shipping Zone</a><br />
        	</td>
		</tr>
        </table>
    
	<!--Spacer Row-->
	<p>&nbsp;</p>
	<?php
	}
	
	
	
	
	?>

<table border="0" cellspacing="0" cellpadding="0">
	<tr>
    	<td class="submenu" align="center"><b>Settings</b></td>
    </tr>
    
    <tr>
        <td class="nav_links">	       
            <a href="settings.php?option=1" class="sublink
            <?php if ($_GET['option'] == '' || $_GET['option'] == 0 || $_GET['option'] == 1){echo ' active';}?>">Company Setup</a><br />
            
        	    <a href="settings.php?option=2" class="sublink <?php if ($_GET['option'] == '2' ){ echo ' active'; }?>">Cart Setup </a><br />
                
                <a href="settings.php?option=3" class="sublink <?php if ($_GET['option'] == '3') { echo ' active'; }?>">Email Setup</a><br>
                
                <a href="settings.php?option=4" class="sublink <?php if ($_GET['option'] == '4') { echo ' active'; }?>">Layout Setup</a><br />
                
                <a href="settings.php?option=13" class="sublink <?php if ($_GET['option'] == '13') { echo ' active'; }?>">Currency Setup</a><br />
                
                <a href="settings.php?option=5" class="sublink <?php if ($_GET['option'] == '5'){ echo ' active'; }?>">Payment Setup</a><br />
                
                <a href="settings.php?option=6" class="sublink <?php if ($_GET['option'] == '6'){ echo ' active'; }?>">Shipping Setup  </a><br />
            
                <a href="settings.php?option=7" class="sublink <?php if ($_GET['option'] == '7'){ echo '  active'; }?>">Cart Tax Setup</a><br />
            
                <a href="settings.php?option=8" class="sublink <?php if ($_GET['option'] == '8'){ echo '  active'; }?>">State/Region Taxes</a><br />
            
                <a href="settings.php?option=9" class="sublink <?php if ($_GET['option'] == '9'){ echo ' active'; }?>">Country Taxes</a><br />
            
                <a href="settings.php?option=10" class="sublink <?php if ($_GET['option'] == '10'){ echo ' active'; }?>">Required Items</a><br />
                
                <a href="settings.php?option=11" class="sublink <?php if ($_GET['option'] == '11'){ echo ' active'; }?>">Change Password</a><br />
            
                <a href="settings.php?option=12" class="sublink <?php if ($_GET['option'] == '12'){ echo ' active'; }?>">Maintenance</a>
        </td>
    </tr>
</table>

<!--Spacer Row-->
<p>&nbsp;</p>