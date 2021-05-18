<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17%" valign="top"><?php
	if($id == "belum_matang") {
		include('menu_belum_matang.php'); // menu treeview yang perlu hide if first year
		if(isset($_GET['year'])){

      if ($_SESSION['tahun'] <= 2021) { // old soalan
        $open_detail = "po".$_GET['year']."year_old.php";

      }else {
        $open_detail = "po".$_GET['year']."year.php";
      }
    }
		else{
      if ($_SESSION['tahun'] <= 2021) { // old soalan
        $open_detail = "po1year_old.php";
      }else {
        $open_detail = "po1year.php";
      }
    }
	}
	else if($id == "matang") {
		include('menu_matang.php');
    if ($_SESSION['tahun'] <= 2021) { // old soalan
      $open_detail = "po3_2_old.php";
    }else {
      $open_detail = "po3_2.php";
    }

    // print_r($open_detail);
	}
	else{
		include('menu_palmoil.php');
	}
	?>&nbsp;</td>
    <td width="83%" valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0" class="tableinside">
      <tr>
        <td><?php include($open_detail); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
