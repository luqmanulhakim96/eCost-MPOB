<?php include('../Connections/connection.class.php'); 
include('../css/baju.php');
set_time_limit(0);
$con =connect();

$q="select * from alamat_ekilang group by lesen";
$r=mysql_query($q,$con);

function semak($no){
	
	$con=connect();
	 $q="select * from ekilang_state where lesen='$no' group by lesen";
	$r=mysql_query($q,$con);
	$row=mysql_fetch_array($r);
	$total = mysql_num_rows($r);
	
	$data[0]=$row['daerah'];
	$data[1]=$row['negeri'];
	$data[2]=$total;
	return $data;

}

?>

<script type="text/javascript" src="../jquery-1.3.2.js"></script>

<script type="text/javascript" src="../js/colorbox/colorbox/jquery.colorbox.js"></script>
<link type="text/css" media="screen" rel="stylesheet" href="../js/colorbox/colorbox.css" />
<script type="text/javascript">
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements.
								$(".klik").colorbox();
				});
</script>
<table width="100%" class="baju">
  <tr>
    <th>No</th>
    <th>No Lesen</th>
    <th>Alamat1</th>
    <th>Alamat2</th>
    <th>Alamat3</th>
    <th>Nama</th>
    <th>Daerah</th>
    <th>Negeri</th>
  </tr>
  <?php 
  $i=0;
  while($row=mysql_fetch_array($r)){

  ?>
  <tr <?php if($i%2==0){?>class="alt"<?php } ?>>
    <td><?php echo ++$i;   $kilang=semak($row['lesen']);?> </td>
    <td>
    <a href="save_state_kilang.php?nolesen=<?php echo $row['lesen'];?>&total=<?php echo $kilang[2];?>" class="klik"><?php echo $row['lesen'];?></a>

    
    </td>
    <td><?php echo $row['nama'];?></td>
    <td><?php echo $row['alamat1'];?></td>
    <td><?php echo $row['alamat2'];?></td>
    <td><?php echo $row['alamat3'];?></td>
    
    <td><?php  echo $kilang[0];?>&nbsp;</td>
    <td><?php echo $kilang[1];?></td>
  </tr>
  <?php } ?>
</table>
