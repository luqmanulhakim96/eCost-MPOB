<?php include ('baju2.php');


?>
	<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />
<p align="center"><strong>Click Download Book below to start download </strong></p>
<table width="52%" align="center" class="baju2">
  <tr>
    <th width="13%">Year of survey</th>
    <th><div align="center">Action </div></th>
  </tr>
  <?php 
 
 
  
  $con=connect();
			  $qt="select pb_thisyear from kos_belum_matang group by pb_thisyear ";
			  $rt=mysql_query($qt,$con);
			  while($rowt=mysql_fetch_array($rt)){
			  
		
			  ?>
  <tr <?php if(++$op%2==0){?>class="alt"<?php } ?>>
    <td><?php echo $rowt['pb_thisyear'];?></td>
    <td width="15%">     
		
        <div id="green-button" align="center">
		  <a href="all_book.php?tahun=<?php echo $rowt['pb_thisyear'];?>" class="green-button pcb" target="_blank">
		  <span>View Book</span>           </a>         </div>               
          
        <!--  <div id="green-button" align="center">
		  <a href="all_book.php?tahun=<?php echo $rowt['pb_thisyear'];?>&type=doc" class="green-button pcb" target="_blank">
		  <span>Download Book as Word</span>           </a>         </div>-->                                 </td>
  </tr>
  
   <?php } ?> 
</table>

          

<p><br>
</p>
<p>&nbsp;</p>
