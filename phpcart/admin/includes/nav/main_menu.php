<?php include ("configuration_1.php");?>
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="center" class="button_padding">
      <a href="index.php" class="<?php if (strpos($_SERVER['REQUEST_URI'],'index.php') !== FALSE || strpos($_SERVER['REQUEST_URI'],'index.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Home</a>&nbsp;&nbsp;
      
      <a href="orders.php" class="<?php if (strpos($_SERVER['REQUEST_URI'],'orders.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Orders</a>&nbsp;&nbsp;
      
      <a href="coupons.php" class="<?php if (strpos($_SERVER['REQUEST_URI'],'coupons.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Coupons</a>&nbsp;&nbsp;
      
      <a href="button_maker.php"  class="<?php if (strpos($_SERVER['REQUEST_URI'],'button_maker.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Button Maker</a>&nbsp;&nbsp;
      
      <a href="settings.php"  class="<?php if (strpos($_SERVER['REQUEST_URI'],'settings.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Settings</a>&nbsp;&nbsp;
      
      <a href="support.php" class="<?php if (strpos($_SERVER['REQUEST_URI'],'support.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Support</a>&nbsp;&nbsp;
      
      <a href="<?php echo $config["COMPANYWEBSITE"]; ?>" class="main_menu" target="_blank">View Your Store</a>&nbsp;&nbsp;
      
      <a href="logout.php" class="<?php if (strpos($_SERVER['REQUEST_URI'],'login.php') !== FALSE){ echo 'main_menu_active'; }else { echo 'main_menu';} ?>">Logout</a></td>
      
    </tr>
</table> 