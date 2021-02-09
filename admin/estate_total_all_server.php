<?php include('../Connections/connection.class.php');?><?php

// { initialise variables
  $amt=100;
  $start=0;
// }
// { connect to database
  function dbRow($sql){
  $con = connect();
    $q=mysqli_query($con, $sql);
    $r=mysqli_fetch_array($q);
    return $r;
  }
  function dbAll($sql){
  $con = connect();
    $q=mysqli_query($con, $sql);
    while($r=mysqli_fetch_array($q)){$rs[]=$r;}
    return $rs;
  }

// }
// { count existing records
  $r=dbRow('select count(no_lesen_baru) as c from esub ');
  $total_records=$r['c'];
// }
// { start displaying records
  echo '{"iTotalRecords":'.$total_records.',
         "iTotalDisplayRecords":'.$total_records.',
         "aaData":[';
  $rs=dbAll("select Nama_Estet, No_Lesen, No_Lesen_Baru, Syarikat_Induk from esub
             order by nama_estet ");
  $f=0;
  foreach($rs as $row){
    if($f++) echo ',';
    echo '["", "',$row['Nama_Estet'],'",
           "',$row['No_Lesen'],'",
           "',$row['No_Lesen_Baru'],'",
           "',$row['Syarikat_Induk'],'"
		   ,"<a href=\"#\" onclick=\"openScript(\'view_estate_all.php?nolesen='.$row['No_Lesen_Baru'].'\',\'\',\'\')\" ><img src=\"../images/001_36.png\" alt=\"Edit\" width=\"20\" height=\"20\" border=\"0\" title=\"Edit this information\" /></a>  <a href=\"delete_all_data.php?nolesen='.$row['No_Lesen_Baru'].'&tahun='.date('Y').'\"><img src=\"../images/remove.png\" width=\"20\" height=\"20\" border=\"0\" title=\"Delete this data?\" onclick=\"return confirm(\'Are you sure to delete this data? All deleted data are not recoverable.\');\" /></a> "]';
  }
echo ']}';
// }
?>
