<!--?xml version="1.0" encoding="UTF-8"?-->
<chart>
	<graphs>
		<graph gid="0">
			<?php
		for($i=1994; $i<2007; $i++) {
		?>
	  		<point x="<?= $i ?>" y="<?= rand(780,1200) ?>"></point>";
		<?php
        }
		?>	
		</graph>
        <graph gid="1">
			<?php
		for($i=1994; $i<2007; $i++) {
		?>
	  		<point x="<?= $i ?>" y="<?= rand(800,1200) ?>"></point>";
		<?php
        }
		?>	
		</graph>
        <graph gid="2">
			<?php
		for($i=1994; $i<2007; $i++) {
		?>
	  		<point x="<?= $i ?>" y="<?= rand(980,1200) ?>"></point>";
		<?php
        }
		?>	
		</graph>
        <graph gid="3">
			<?php
		for($i=1994; $i<2007; $i++) {
		?>
	  		<point x="<?= $i ?>" y="<?= rand(1080,1200) ?>"></point>";
		<?php
        }
		?>	
		</graph>
	</graphs>
</chart>