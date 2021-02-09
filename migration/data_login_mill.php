<?php
//include('../Connections/connection.class.php');
if ($excel == true) {
    header("Content-type: application");
    header("Content-Disposition: attachment; filename=data_login_mill_$tahun.xls");
}
include("baju.php");
include('pages.php');
$con = connect();
$year = $_COOKIE['tahun_report'];
$tahun = $year - 1;
?><style type="text/css">
    <!--
    body,td,th {
        font-family: Geneva, Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    -->
</style>

<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript">

    function openScript(url, width, height) {
        var Win = window.open(url, "openScript", 'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no');
    }

</script>
<h2>Data Active Mill<br />
</h2>
<h3>
    <a href="#" onclick="openScript('add_mill_all.php?tahun=<?php echo $_COOKIE['tahun_report']; ?>')" >
        <img src="../images/add_48.png" width="24" height="24" border="0" />
        Add New Mill      </a>  </h3>
<br />

<table width="100%" class="baju" id="example2" align="left">
    <thead>
        <tr>
            <th width="4%">No.</th>
            <th width="21%">No Lesen</th>
            <th width="14%">EKilang</th>
            <th width="13%">Nama Kilang</th>
            <th width="15%">Syarikat Induk</th>
            <th width="9%">Negeri</th>
            <th width="24%">Action</th>
        </tr>
    </thead>

    <tbody>
<?php
/* $q="select lesen, count(lesen) as kira from login_mill group by lesen "; */

/* cleansing data bulan 0 */
$qadeletemonth = "delete from ekilang where bulan ='0'; ";
$radeletemonth = mysqli_query($con, $qadeletemonth);
/* end of cleansing data bulan 0 */



$q = "SELECT ekilang.no_lesen lesen, syarikat_induk, nama_kilang, success access, email FROM ekilang LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen WHERE ekilang.tahun = '$tahun' AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' GROUP BY no_lesen
";

/*
  SELECT ekilang.no_lesen lesen, syarikat_induk, nama_kilang, success access, email FROM ekilang LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen WHERE ekilang.tahun = 2015 AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' GROUP BY no_lesen
 */
//echo $q;
$r = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($r)) {
    ?>
            <tr <?php if ($i % 2 == 0) { ?>class="alt"<?php } ?>>
                <td><?php echo ++$i; ?>.</td>
                <td><?php echo $row['lesen']; ?></td>
                <td>
    <?php
    $con = connect();
    $tahunlepas = $_COOKIE['tahun_report'] - 1;
    $qall = "select * from ekilang where no_lesen ='" . $row['lesen'] . "' and tahun ='" . $tahunlepas . "' group by no_lesen";
    $rall = mysqli_query($con, $qall);
    $totalall = mysqli_num_rows($rall);
    $rowall = mysqli_fetch_array($rall);

    if ($totalall == 0) {
        echo "<span style=\"color:red\"><b>TIADA</b><span>";
    }

    if ($totalall > 0) {
        echo "<span style=\"color:blue\"><b>ADA</b><span>";
    }
    ?>   </td>
                <td><?php echo $rowall['NAMA_KILANG']; ?></td>
                <td><?php echo $rowall['SYARIKAT_INDUK']; ?></td>
                <td><?php echo $rowall['NEGERI']; ?>&nbsp;</td>
                <td><div align="center">

                        <a href="javascript:openScript('../admin/view_mill_all.php?nolesen=<?php echo $row['lesen']; ?>&tahun=<?php echo $_COOKIE['tahun_report']; ?>','600','400')" ><img src="../images/paper_content_pencil_48.png" width="19" height="19" border="0" title="Edit Mill Information" /></a>
                        &nbsp;
                        <a href="delete_login_mill.php?no_lesen=<?php echo $row['lesen']; ?>" onclick="return confirm('Are you sure to delete this data?');"><img src="../images/remove.png" width="20" height="20" border="0" /></a></div></td>
            </tr>
<?php } ?>
    </tbody>
</table>
