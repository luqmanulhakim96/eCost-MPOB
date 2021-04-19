<?php include ('../Connections/connection.class.php');
set_time_limit(0);
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_scatter.php');
require_once ('jpgraph/src/jpgraph_line.php');
require_once ('jpgraph/src/jpgraph_utils.inc.php');
extract($_REQUEST);
// Create some "fake" regression data
$datay = array();
$datax = array();
/*$a= 3.2;
$b= 10;
*/
$tahun = $_COOKIE['tahun_report'];
$con = connect();
error_reporting(0);


if ($type != "tan")
{
  $medan = "kos_per_hektar";
  $graf = "graf_km";
}
if ($type == "tan")
{
  $medan = "kos_per_tan";
  $graf = "graf_km_tan";
}


if ($hold == "yes")
{
  $q = "delete from $table where km_nama ='$field'
			and pb_thisyear = '" . $_COOKIE['tahun_report'] . "'
			   ";
  $r = mysqli_query($con, $q);
}


$q = "select $medan as nilai ,km_nama, negeri, daerah, lesen   from $table where km_nama not like '%Total%'
and km_nama ='$field' and pb_thisyear = '$tahun' and $medan > 0 order by $medan ";
if ($field == "Cost Per Hectare") {
	$q = "SELECT a.* from (select SUM($medan) as nilai , 'Cost Per Hectare' AS km_nama, negeri, daerah, lesen   from $table where km_nama not like '%Total%'
    AND km_nama not like '%Purchase of machineries%'
    AND km_nama not like '%Purchase of asset%'
    and pb_thisyear = '$tahun' and $medan > 0 GROUP BY negeri, daerah, lesen) AS a order by a.nilai";
}
$r = mysqli_query($con, $q);
$total = mysqli_num_rows($r);

if ($total > 0)
{
  $qbuang = "delete from $graf where sessionid='$field' and tahun = '$tahun'";
  $rbuang = mysqli_query($con, $qbuang);

  $i = 0;
  while ($row = mysqli_fetch_array($r))
  {
    /*	$datax[$i] = $i;
    $datay[$i] = $a + $b*$row['nilai'];
    */

    $qadd = "insert into $graf (x,y,sessionid,tahun, status, negeri, daerah,   lesen) values('$i', '" .
      $row['nilai'] . "', '" . $row['km_nama'] . "','" . $_COOKIE['tahun_report'] .
      "',0,'" . $row['negeri'] . "','" . $row['daerah'] . "' ,  '" . $row['lesen'] .
      "' )";
    $radd = mysqli_query($con, $qadd);

    $i++;
  }

}

$qsum = "SELECT sum(x) as sumx, avg(x) as avgx, sum(y) as sumy , avg(y) as avgy
, sum(pow(x,2)) as sumx2, count(*) as n, SUM(x * y) as sumxy
FROM $graf where sessionid='$field' and tahun = '$tahun' and status ='0'";
$rsum = mysqli_query($con, $qsum);
$rowsum = mysqli_fetch_array($rsum);

$a1 = ($rowsum['n'] * $rowsum['sumxy']) - ($rowsum['sumx'] * $rowsum['sumy']);
$a2 = 0;
if ($rowsum['sumx'] != 0)
{
  $a2 = ($rowsum['n'] * $rowsum['sumx2']) - (pow($rowsum['sumx'], 2));
}
else
{
  $a2 = ($rowsum['n'] * $rowsum['sumx2']);
}
if ($a2 == 0)
{
  $m = 0;
}
else
{
  $m = $a1 / $a2;
}
$c = $rowsum['avgy'] - ($m * $rowsum['avgx']);

$maxy = $m * $total - $c;


$qplot = "select * from $graf where sessionid='$field' and tahun = '$tahun' and status='0'  order by x ";
$rplot = mysqli_query($con, $qplot);
$totalplot = mysqli_num_rows($rplot);
$p = 0;
while ($rowplot = mysqli_fetch_array($rplot))
{
  $xdatax[$p] = $p;
  //$datay[$p] = $c + $m*$rowplot['y'];
  $xdatay[$p] = $rowplot['y'];

  $datax[$p] = $p;
  //$datay[$p] = $c + $m*$rowplot['y'];
  $datay[$p] = $rowplot['y'];

  $qup = "update $graf set status='0' where sessionid='" . $rowplot['sessionid'] .
    "' and tahun = '" . $rowplot['tahun'] . "' and x = '" . $rowplot['x'] .
    "' and y ='" . $rowplot['y'] . "'
	and status = '" . $rowplot['status'] . "'
	and negeri = '" . $rowplot['negeri'] . "'
	and daerah = = '" . $rowplot['daerah'] . "'
	";
  //$rup = mysql_query($qup,$con);


  $p++;
}


$lr = new LinearRegression($xdatax, $xdatay);
list($stderr, $corr) = $lr->GetStat();
list($xd, $yd) = $lr->GetY(0, $totalplot);

$maxy = 0;
//cari dlm $yd
for ($xx = 0; $xx < sizeof($yd); $xx++)
{
  if ($maxy < $yd[$xx])
    $maxy = $yd[$xx];
}


//$qplot="select * from $graf where sessionid='$field' and tahun = '$tahun' and y< $maxy order by x ";
//$qplot = "select * from $graf where sessionid='$field' and tahun = '$tahun'  and status='0' order by x ";

//$rplot = mysql_query($qplot, $con);
//$totalplot = mysql_num_rows($rplot);
$p = 0;



if($trim=='yes'){
$qplot_over = "update $graf set status='1' where sessionid='$field' and tahun = '$tahun' and y>=$maxy and status='0' order by x ";
$rplot_over = mysqli_query($con, $qplot_over);
}
/*$q="update  $graf set status='1' where bkm_nama not like '%Total%'
and bkm_nama ='$field'
and pb_type = '$type'
and pb_tahun = '$tahun' and pb_thisyear = '".$_COOKIE['tahun_report']."'
and nilai < $maxy
";
$r= mysql_query($q,$con);
*/
while ($rowplot = mysqli_fetch_array($rplot))
{
  //$datax[$p] = $p;
  ///$datay[$p] = $c + $m*$rowplot['y'];
  //$datay[$p] = $rowplot['y'];

  $qup = "update $graf set status='0' where sessionid='" . $rowplot['sessionid'] .
    "' and tahun = '" . $rowplot['tahun'] . "' and x = '" . $rowplot['x'] .
    "' and y ='" . $rowplot['y'] . "'
	and status = '" . $rowplot['status'] . "'";
  $rup = mysqli_query($con, $qup);


  $p++;
}


// Create the graph
$graph = new Graph(800, 750);
$graph->SetScale('linlin');

// Setup title
$graph->title->Set($field);
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);

//$graph->subtitle->Set("Year ".$tahun);
$graph->subtitle->Set("M = " . $m . " C = " . $c);
//$graph->subtitle->Set('(stderr='.sprintf('%.2f',$stderr).', corr='.sprintf('%.2f',$corr).')');
$graph->subtitle->SetFont(FF_ARIAL, FS_NORMAL, 12);

// make sure that the X-axis is always at the
// bottom at the plot and not just at Y=0 which is
// the default position
$graph->xaxis->SetPos('min');

// Create the scatter plot with some nice colors

if($datay == null && $datax == null){
	$sp1 = new ScatterPlot('-', '-');							//NULL data handling
}
else {
	$sp1 = new ScatterPlot($datay, $datax);
}

$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("red");
$sp1->SetColor("blue");
$sp1->SetWeight(3);
$sp1->mark->SetWidth(4);

// Create the regression line
$lplot = new LinePlot($yd);
$lplot->SetWeight(2);
$lplot->SetColor('navy');

// Add the pltos to the line
$graph->Add($sp1);
$graph->Add($lplot);

// ... and stroke
$graph->Stroke(); ?>
