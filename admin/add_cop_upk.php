<?php include ('../Connections/connection.class.php');
extract($_REQUEST);

if($year==""){$year='1';}

$con = connect();
$qselect = "select * from cop where
NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT = '$tahun'";
$rselect = mysqli_query($con, $qselect);
$rowselect = mysqli_fetch_array($rselect);
$totalselect = mysqli_num_rows($rselect); ?><style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style><title>Add Cost of Production</title><form id="form1" name="form1" method="post" action="">
  <table width="100%">
    <tr>
      <td colspan="2"><em>** this section only used to compare cost of Production in 2008 before using e-Cost</em></td>
    </tr>
    <tr>
      <td colspan="2"><h2><?php echo $name; ?></h2></td>
    </tr>
    <tr>
      <td width="22%"><div align="center">
        <div align="left">RM per hectare</div>
      </div></td>
      <td width="78%">:
      <input name="mean" type="text" id="mean" value="<?php echo $rowselect['VALUE_MEAN']; ?>" />
      <script language="javascript">
      	var f3 = new LiveValidation('mean');
		f3.add( Validate.Numericality );
      </script>
      <input name="name" type="hidden" id="name" value="<?php echo $name; ?>" />
      <input name="type" type="hidden" id="type" value="<?php echo $type; ?>" />
      <input name="year" type="hidden" id="year" value="<?php echo $year; ?>" />
      <input name="state" type="hidden" id="state" value="<?php echo $state; ?>" />
      <input name="district" type="hidden" id="district" value="<?php echo $district; ?>" /></td>
    </tr>
    <tr>
      <td><div align="center">
        <div align="left">RM per tonne FFB</div>
      </div></td>
      <td>:
      <input name="median" type="text" id="median" value="<?php echo $rowselect['VALUE_MEDIAN']; ?>" />
      <script language="javascript">
      	var f1 = new LiveValidation('median');
		f1.add( Validate.Numericality );
      </script>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="save" id="button" value="Save" />
      <input type="reset" name="button2" id="button2" value="Reset" />
      <input type="submit" name="button3" id="button3" value="Close Window" onclick="window.close();top.opener.window.location.reload();" /></td>
    </tr>
  </table>
</form>
<?php if (isset($save))
{
$mean = round($mean,2);
$median = round($median,2);

  $con = connect();

  $qselect = "select * from cop where
NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun'";
  $rselect = mysqli_query($con,$qselect);
  $totalselect = mysqli_num_rows($rselect);

  if ($totalselect == 0)
  {

    $q = "INSERT INTO `cop` (
`NAME` ,
`TYPE` ,
`YEAR` ,
`STATE` ,
`DISTRICT` ,
`VALUE_MEAN` ,
`VALUE_MEDIAN`, `YEAR_REPORT`
)
VALUES (
'$name', '$type', '$year', '$state', '$district', '$mean', '$median', '$tahun'
);";
    $r = mysqli_query($con, $q);
  }

  if ($totalselect > 0)
  {
    $qupdate = "update cop set value_mean ='$mean', value_median='$median' where
	NAME ='$name' and TYPE= '$type' and YEAR= '$year' and STATE= '$state' and DISTRICT= '$district' and YEAR_REPORT='$tahun'";
    $rupdate = mysqli_query($con, $qupdate);
  }

  echo "<script>window.location.href='add_cop_upk.php?name=$name&type=$type&year=$year&state=$state&district=$district&tahun=$tahun';</script>";


} ?>
