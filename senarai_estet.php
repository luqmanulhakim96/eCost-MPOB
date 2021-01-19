<?php

session_start();

if ($_SESSION['type']<>"admin")
       header("location:logout.php");

include('Connections/connection.class.php');



?>
<link rel="shortcut icon" href="../images/icon.ico" />


<style type="text/css">
<!--
body,td,th {
    font-family: Geneva, Arial, Helvetica, sans-serif;
    font-size: 12px;
}
.style1 {
    color: #FFFFFF;
    font-weight: bold;
}
-->
</style>

<?php





/*
  $tahun = $_SESSION['tahun'];
  echo $pertama = $tahun-1;
  echo $first = $pertama[2];
  
  $kedua = $tahun-2;
  $second = $kedua[3].$kedua[4];
  
  $ketiga = $tahun-3;
  $third = $ketiga[3].$ketiga[4];*/
?>


<title>Senarai Estet dalam E-COST</title><p><strong>SENARAI ESTET DALAM SISTEM E-COST</strong></p>
<table width="100%" border="1" style="border-collapse:collapse">
  <tr bgcolor="#3399FF">
    <td width="2%" class="style1">No.</td>
    <td width="33%" height="36"><span class="style1">Nama Estet</span></td>
    <td width="34%"><div align="center"><span class="style1">No Lesen Baru</span></div></td>
    <td width="3%" valign="top"><span class="style1">Tanam Baru<br />
 (07)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Baru<br />
(08)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Baru<br />
 (09)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Semula <br />
(07)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Semula <br />
(08)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Semula <br />
(09)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Tukar<br />
 (07)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Tukar<br />
 (08)</span></td>
    <td width="3%" valign="top"><span class="style1">Tanam Tukar<br />
 (09)</span></td>
  </tr>
  
  
  <?php
  $con = connect();
  $q="select * from esub group by no_lesen_baru order by no_lesen ";
  $r=mysql_query($q,$con);
  $i=1;
  
    
  
  while($row=mysql_fetch_array($r)){
  ?>
  <tr>
    <td height="35"><?php echo $i++; ?></td>
    <td><?php echo $row['Nama_Estet'];?></td>
    <td><div align="center"><?php echo $no_lesen = $row['No_Lesen_Baru'];?></div></td>
    <td><div align="center"><?php 
        $con = connect(); 
        $q1a ="select sum(tanaman_baru) as tanam_baru from tanam_baru07 where lesen = '$no_lesen' group by lesen";
        $r1a = mysql_query($q1a,$con);
        $res_totala = mysql_num_rows($r1a);
        $row= mysql_fetch_array($r1a);
        
        if($res_totala>0)
        {?>
            <div align="center"><img src="tick.gif" width="16" height="16" /></div>
            <?php echo $row['tanam_baru'];?>
        <?php  }
    
    ?></div></td>
    <td><div align="center">
    <?php 
        $con = connect(); 
        $q1b ="select sum(tanaman_baru) as tanam_baru from tanam_baru08 where lesen = '$no_lesen' group by lesen";
        $r1b = mysql_query($q1b,$con);
        $res_totalb = mysql_num_rows($r1b);
        $row= mysql_fetch_array($r1b);
        
        if($res_totalb>0)
        {?>
            <div align="center"><img src="tick.gif" width="16" height="16" /></div>
            <?php echo $row['tanam_baru'];?>
        <?php  }?>
        
        </div></td>
    <td><div align="center"><?php 
        $con = connect(); 
        $q1b ="select sum(tanaman_baru) as tanam_baru from tanam_baru09 where lesen = '$no_lesen' group by lesen";
        $r1c = mysql_query($q1c,$con);
        $res_totalc = mysql_num_rows($r1c);
        $row= mysql_fetch_array($r1c);
        
        if($res_totalc>0)
        {?>
            <div align="center"><img src="tick.gif" width="16" height="16" /></div>
            <?php echo $row['tanam_baru'];?>
        <?php  }?>
        
        
        </div></td>
    <td><div align="center"><?php 
        $con = connect(); 
        $q1d ="select sum(tanaman_semula) as tanam_baru from tanam_semula07 where lesen = '$no_lesen' group by lesen";
        $r1d = mysql_query($q1d,$con);
        $res_totald = mysql_num_rows($r1d);
        $row= mysql_fetch_array($r1d);
        
        if($res_totald>0)
        {
            echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
            echo $row['tanam_baru'];
        }
    
    ?></div></td>
    <td><div align="center"><?php 
        $con = connect(); 
         $q1e ="select sum(tanaman_semula) as tanam_baru from tanam_semula08 where lesen = '$no_lesen' group by lesen";
        $r1e = mysql_query($q1e,$con);
        $res_totale = mysql_num_rows($r1e);
        $row= mysql_fetch_array($r1e);
        if($res_totale>0)
        {
            echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
            echo $row['tanam_baru'];
        }
    
    ?></div></td>
    <td><div align="center">
    <?php 
        $con = connect(); 
        $q1f ="select sum(tanaman_semula) as tanam_baru from tanam_semula09 where lesen = '$no_lesen' group by lesen";
        $r1f = mysql_query($q1f,$con);
        $res_totalf = mysql_num_rows($r1f);
        $row= mysql_fetch_array($r1f);
        
        if($res_totalf>0)
        {
            echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
            echo $row['tanam_baru'];
        }
    
    ?></div></td>
    <td><div align="center"><?php 
        $con = connect(); 
        $q1g ="select sum(tanaman_tukar) as tanam_baru from tanam_tukar07 where lesen = '$no_lesen' group by lesen";
        $r1g = mysql_query($q1g,$con);
        $res_totalg = mysql_num_rows($r1g);
        $row= mysql_fetch_array($r1g);
        
        if($res_totalg>0)
        {
            echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
            echo $row['tanam_baru'];
        }
    
    ?></div></td>
    <td><div align="center">
    <?php 
        $con = connect(); 
        $q1h ="select sum(tanaman_tukar) as tanam_baru from tanam_tukar08 where lesen = '$no_lesen' group by lesen";
        $r1h = mysql_query($q1h,$con);
        $res_totalh = mysql_num_rows($r1h);
        $row= mysql_fetch_array($r1h);
        
        if($res_totalh>0)
        {
            echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
            echo $row['tanam_baru'];
        }
    
    ?></div></td>
    <td><div align="center">
    <?php 
        $con = connect(); 
        $q1k ="select sum(tanaman_tukar) as tanam_baru from tanam_tukar09 where lesen = '$no_lesen' group by lesen";
        $r1k = mysql_query($q1k,$con);
        $res_totalk = mysql_num_rows($r1k);
        $row= mysql_fetch_array($r1k);
        
        if($res_totalk>0)
        {
            echo "<div align=\"center\"><img src=\"tick.gif\" width=\"16\" height=\"16\" /></div>";
            echo $row['tanam_baru'];
        }
    
    ?>
    </div></td>
  </tr>

  <?php } ?>
</table>
<p> </p>