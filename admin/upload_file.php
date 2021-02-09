<?php

session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
function semakakses()
{

    if($_SESSION['type']==""){
    echo "<script>window.location.href='../logout.php?type=session';</script>";
    }
}

semakakses();

?>

<style type="text/css">
<!--
.style1 {
    color: #FFFFFF;
    font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>
<form action="save_file.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%">
    <tr>
      <td colspan="3"><h2><strong>UPLOAD FILE</strong></h2></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center"></div></td>
    </tr>
    <tr>
      <td width="6%">File</td>
      <td width="1%">:</td>
      <td width="93%"><input name="ufile" type="file" id="ufile" size="50" />
        <script language="javascript">
      var f1 = new LiveValidation('ufile');
f1.add( Validate.Presence );
      </script>
      </td>
    </tr>
    <tr>
      <td>Name </td>
      <td>:</td>
      <td><input name="title" type="text" id="title" size="50" />
        <script language="javascript">
      var f2 = new LiveValidation('title');
f2.add( Validate.Presence );
      </script>
        <input name="jenis" type="hidden" id="jenis" value="file" /></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><img src="<?php echo  $_SESSION['captcha']['image_src'] ; ?>" alt="CAPTCHA code"></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><b>Please enter CAPTCHA code below.</b>
          <i>(case sensitive)</i><br><input name="captcha" type="text" id="captcha" size="20" />
       <script language="javascript">
      var f2 = new LiveValidation('captcha');
f2.add( Validate.Presence );
      </script>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Submit" />
        <input type="reset" name="button2" id="button2" value="Reset" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><?php include('baju_merah.php');?>
        <table width="70%" align="center" class="baju">
          <tr bgcolor="#8A1602">
            <th width="5%"><span class="style2">Bil.</span></th>
            <th width="10%" height="26"><span class="style1">&nbsp;Action</span></th>
            <th width="85%"><span class="style1">&nbsp;File Name</span></th>
          </tr>
          <?php
          $con =connect();
          $qfile = "select * from file_upload order by title";
          $rfile = mysqli_query($con, $qfile);
          while($rowfile = mysqli_fetch_array($rfile)){
          ?>
          <tr <?php if(++$o%2==0){?>class="alt"<?php } ?>>
            <td><?php echo $o; ?>. </td>
            <td><a href="save_file.php?jenis=delete&amp;id=<?= $rowfile['id'];?>"><img src="../images/remove.png" width="20" height="20" border="0" title="Delete data" onclick="return confirm('Delete this data?');" /></a><a href="<?= $rowfile['path'];?>"><img src="../images/Autoship-icon.png" width="20" height="20" border="0" title="View File" /></a></td>
            <td><?= $rowfile['title'];?></td>
          </tr>
          <?php } ?>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
