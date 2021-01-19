<?php //require_once('../Connections/connection.class.php'); 
session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	   
$con=connect();
/*
if(isset($tambah))
{
	if($email==NULL)
	{
		$error[0]="<- Sila lengkapkan nama";
	
	}
	if($id==NULL)
	{
	
		$error[1]="<- Sila isi id/nama pengguna";
	}
	if($password==NULL)
	{
	
		$error[2]="<- Sila isi kata laluan";
	
	}
	if(($email!=NULL) and ($id!=NULL) and ($password!=NULL))
	{
	
	 $query="INSERT INTO `login_admin` (
`email` ,
`password` ,
`firsttime` ,
`success` ,
`fail` ,
`level`
)
VALUES (
'$email', '$password', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$level'
);";
		$res=mysql_query($query,$con);
		?>
        <script>
		document.getElementById('tambah').style.display="none";
		</script>
        
        <?

	}


}
*/
if(isset($edit))
{
	foreach ($idp as $value) 
	{
		$con =connect();
		$query="SELECT a.*, b.u_fullname fullname FROM login_admin a inner join user b on a.email=b.u_email WHERE a.email='$value'";
		$r=mysql_query($query,$con);
		$row=mysql_fetch_array($r);
		
		$fullname = $row['fullname'];
		$email=$row['email'];
		$password=$row['password'];
		$level=$row['level']; 
	}


}
/*
if(isset($ubah))
{

	$query="UPDATE login_admin SET email='$email',password='$password',level='$level'
	WHERE email='$idp'";
	$res=mysql_query($query,$con);
	
	echo "<script>window.location.href='home.php?id=config&sub=user';</script>";

}
*/
if(isset($buang))
{
	foreach ($idp as $value) 
	{
		$con =connect();
		$query="DELETE FROM login_admin WHERE email='$value'";
		$r=mysql_query($query,$con);
		echo "<script>window.location.href='home.php?id=config&sub=user';</script>";
		
	}
	?>
    <script>
	alert('DATA BERJAYA DIBUANG');
	</script>
    
    <?php

}
?>
<script>
function paparTambah()
{	
	
	document.getElementById('tambah').style.display="";

}

</script>


<?php
include("pages.php");
include ("baju.php");
?>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
	$('#kodhasil').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"sDom" : '<"H"frilp><t>',  
	"bJQueryUI": false,
		"fnDrawCallback": function ( oSettings ) {
			/* Need to redo the counters if filtered or sorted */
			if ( oSettings.bSorted || oSettings.bFiltered )
			{
				for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
				{
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
				}
			}
		},
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0 ] }
		],
		"aaSorting": [[ 1, 'asc' ]]
	} );
			} );
</script>
<style type="text/css">
<!--
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
.style6 {color: #FF0000}
-->
</style>
<div align="left"><h2>List of User</h2></div>


    <div id="tambah">
    <form id="frmTambah" name="regUser" action="save_user.php?tambah" method="post">
    <table width="75%"  class="baju" >
      <tr>
        <th colspan="3" ><strong>Add New User</strong></th>
      </tr>
      <tr class="alt">
        <td width="32%"><strong>FULLNAME</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="66%">
          <input name="fullname" type="text" class="add" id="kod" size="40"/>
         </td>
      </tr>
      <tr class="alt">
        <td width="32%"><strong>EMAIL</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="66%">
          <input name="email" type="text" class="add" id="kod" size="40"/>
         </td>
      </tr>
      
      <tr class="alt">
        <td><strong>PASSWORD</strong></td>
        <td><strong>:</strong></td>
        <td><input name="password" type="password" class="add " id="keterangan" size="20"/>
        &nbsp;<span class="style6"><?php echo $error[2]; ?></span></td>
      </tr>
      <tr>
        <td><strong>LEVEL</strong></td>
        <td>&nbsp;</td>
        <td>
        <select name="level">
        <option value="1">SUPER ADMIN</option>
        <option value="2">USER</option>
        </select>
        </td>
      </tr>
    </table>
    <div align="center"><br />
    
<button type="submit" class="regular" name="tambah" id="tambah" onclick="return confirm ('Add this data?');">
<img src="images/icon/floppy_disk_48.png" alt=""> Save</button>
		
          <p>&nbsp;</p>
          <p>&nbsp;</p>
  </div>
    </form>
    </div>
     <div id="ubah" <?php  if(!isset($edit)) {?> style="display:none" <?php } ?>>
    <form name="edituser" action="save_user.php?ubah" method="post">
    <table width="75%" class="baju" >
      <tr>
        <th colspan="3" ><strong>Edit User</strong></th>
      </tr>
      <tr class="alt">
        <td width="32%"><strong>FULLNAME</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="66%">
          <input name="fullname" type="text" class="add" id="kod" size="40" value="<?php echo $fullname; ?>"/>
         </td>
      </tr>
      <tr class="alt">
        <td width="32%"><strong>EMAIL</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="66%"><label>
          <input name="email" type="text" class="add" id="kod" size="40" value="<?php echo $email; ?>"/>
          &nbsp;<span class="style6"></span></label></td>
      </tr>
      <tr class="alt">
        <td><strong>PASSWORD</strong></td>
        <td><strong>:</strong></td>
        <td><input name="password" type="password" class="add " id="keterangan" size="20" value="<?php echo $password; ?>"/>
        &nbsp;<span class="style6"></span></td>
      </tr>
      <tr>
        <td><strong>LEVEL</strong></td>
        <td>&nbsp;</td>
        <td>
     
        <select name="level">
        <option value="1" <?php if($level=="1") {?> selected="selected" <?php } ?>>SUPER ADMIN</option>
        <option value="2" <?php if($level=="2") {?> selected="selected" <?php } ?>>USER</option>
        </select>
   
        
        
        <input type="hidden" name="idp" value="<?php echo $email; ?>" />        </td>
      </tr>
    </table>
    <div align="center"><br />
   		  <button type="submit" class="regular" name="ubah" onclick="return confirm ('Save this data?');"><img src="images/icon/floppy_disk_48.png" alt=""> Edit </button>
		
          <p>&nbsp;</p>
          <p>&nbsp;</p>
  </div>
    </form>
    </div>
      <form id="form1" name="form1" method="post" action="">

<table width="100%" align="left" id="kodhasil" class="baju">
        <thead>
        <tr  >
          <th width="1%">NO.</th>
          <th width="12%"><strong>EMAIL </strong></th>
          <th width="30%"><strong>PASSWORD</strong></th>
          <th width="30%">LEVEL</th>
          <th width="30%">SUCCESS</th>
          <th width="30%">FAIL</th>
        </tr>
        </thead>
        
        <tbody>
        <?php
		$query="SELECT * FROM login_admin";
		$res=mysql_query($query,$con);
		while($row=mysql_fetch_array($res))
		{
		 ?>
        <tr bgcolor="eeeeee">
          <td>&nbsp;</td>
          <td><input name="idp[]" type="checkbox" id="idp[]" value="<?php echo $row['email']; ?>" />
          <?php echo $row['email']; ?></td>
          <td><input type="password" value="<?php echo $row['password']; ?>" disabled="disabled" /></td>
          <td><?php if($row['level']=="1") {echo "SUPER ADMIN";} if($row['level']=="2") {echo "USER";}?></td>
          <td><?php echo $row['success']; ?></td>
          <td><?php echo $row['fail']; ?></td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
<br />

    
      <div align="center">
          <button type="button" class="positive" id="tambah" name="tambah" onclick="paparTambah()" ><img src="images/icon/apply2.png" alt="" /> Add User </button>
          <button type="submit" class="negative" id="buang" name="buang" onclick="return confirm ('Delete this data?');" value="1"><img src="images/icon/cross.png" alt="" /> Delete </button>
          <button type="submit" class="regular" id="edit" name="edit" value="1"><img src="images/icon/textfield_key.png" alt="" /> Edit User </button>
       
    </div>
    </form>

