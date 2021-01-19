<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17%" valign="top" class="tajuk"><?php include("menu_estate.php"); ?>&nbsp;</td>
    <td width="83%" valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0" class="tableinside">
      <tr class="tajuk">
        <td><?php 
		if ($id=='estate'){
			include('search_estate.php');
			}
		if ($id=='adm_mill'){
			include('search_mill.php');
			}

		?></td>
      </tr>
      <tr>
        <td>
        

   
		
		
		<?php include($open_detail); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
