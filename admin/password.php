<?php 

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	   
$pengguna = new admin('user', $_SESSION['email']); ?><form id="form1" name="form1" method="post" action="home.php?id=config&amp;sub=password">
  <h2><u>Change My Password </u></h2>
  <?php include('baju_merah.php');?>
  <table width="80%" align="center" class="baju">
    <tr>
      <th colspan="2"><strong>Change User Password</strong></th>
    </tr>
    <tr class="alt">
      <td width="16%">User name </td>
      <td width="84%">:
        <input name="username" type="text" id="username" value="<?= $pengguna->name; ?>" size="40" />
        <input name="email" type="hidden" id="email" value="<?= $pengguna->email; ?>" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:
        <input name="password" type="password" id="password" value="<?= $pengguna->password; ?>" size="40" /></td>
    </tr>
    <tr class="alt">
      <td>Re-type password </td>
      <td>:
        <input name="password2" type="password" id="password2" value="<?= $pengguna->password; ?>" size="40" />
        <script type="text/javascript">
	  	var f19 = new LiveValidation('password2');
		f19.add( Validate.Confirmation, { match: 'password' } );
		</script>      </td>
    </tr>
  </table>
  <div align="center"><br />
    <input name="save" type="submit" id="save" value="Save Changes" />
    <input type="reset" name="Submit2" value="Reset" />
  </div>
</form>
<?php 
if(isset($save))
{
$con =connect();
$q ="update login_admin set password = '$password' where email = '$email'";
$r =mysql_query($q,$con);

$q2 ="update user set u_fullname = '$username' where u_email = '$email'";
$r2 =mysql_query($q2,$con);
echo "<script>window.location.href='home.php?id=config&sub=password'</script>";
}
?>
