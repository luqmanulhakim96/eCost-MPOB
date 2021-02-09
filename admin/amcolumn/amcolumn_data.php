<?php
session_start();
//header("Content-type:application/xml");
include('../../Connections/connection.class.php');
$con=connect();
$q = "select * from negeri order by nama";

?><chart>
	<series>
     <?php
	$ra = mysqli_query($con, $q);
	while($rowa=mysqli_fetch_array($ra)){
	?>
		<value xid="<?php echo ++$e;?>" show="false"><?php echo $rowa['nama'];?></value>
    <?php } ?>

	</series>
	<graphs>
		<graph gid="1">
           <?php
	$con=connect();
$q = "select * from negeri order by nama";
	$r = mysqli_query($con, $q);
	while($row=mysqli_fetch_array($r)){
		$con = connect();
		$tahun_lepas = $_COOKIE['tahun_report']-1;

	$queryw = "select sum(PENGELUARAN_CPO) as PENGELUARAN_CPO from ekilang ek , login_mill lm where lm.lesen = ek.no_lesen
		and lm.success !='0000-00-00 00:00:00' and firsttime !='1' and ek.negeri='".$row['nama']."'
		and ek.tahun = '".$tahun_lepas."'
		";
		$resw = mysqli_query($con, $queryw);
		$roww = mysqli_fetch_array($resw);

	?>
		<value xid="<?php echo ++$t;?>"><?php echo round($roww['PENGELUARAN_CPO'],2);?></value>
    <?php } ?>

		</graph>
	</graphs>
</chart>
