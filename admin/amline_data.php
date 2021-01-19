<?php session_start();
  header("Content-type:application/xml");

?><chart>
	<xaxis>
		<?php 
		$tx=0;
		foreach($_SESSION['data_x'] as $value_x){?>
        <value xid="<?php echo $tx++;?>"><?php echo $value_x; ?></value>
        <?php } ?>
	</xaxis>
	<graphs>
		<graph gid="1">
        <?php 
		$ty=0; 
		foreach($_SESSION['data_y'] as $value_y){?>
        <value xid="<?php echo $ty++; ?>"><?php echo $value_y;?></value>
        <?php } ?>
		</graph>
	</graphs>
</chart>
