<?php
include('baju_merah.php');
$con = connect();
set_time_limit(0);
extract($_REQUEST);

$tahunsub2 = date('Y') - 1;
$tableesub2 = "esub_" . $tahunsub2;

$qacreate = "SELECT count(*) as total
FROM information_schema.TABLES
WHERE  (TABLE_NAME = '$tableesub2');";
$rqa = mysqli_query($con, $qacreate);
$rowsub = mysqli_fetch_array($rqa);
//echo "tbale".$rowsub['total'];
$warning = "";
if ($rowsub['total'] === 0) {
}
echo $warning;
?>
<form name="import" method="post" enctype="multipart/form-data"><br />
    <h2>Duplicate Data File eSub for new year</h2>
    <i style="color: red">This applicable for data from e-SUB which not applicable for 1 Jan for each year</i>
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> <span class="ui-icon ui-icon-info" style="float: left; margin-right: 1em;"></span>
        <strong>Note : </strong> Follow select year to duplicate data from last year.  <br>
        <br />  1. Select year below then click duplicate.<br />
    </div>
    <br />
    <table width="80%" align="center" >
        <tr>
            <td><strong>Select Year</strong></td>
            <td><strong>:</strong></td>
            <td><select name="tahun_esub" id="tahun_esub">
                    <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
                </select>&nbsp;</td>
        </tr>
        <tr>
            <td width="13%"><strong> </strong></td>
            <td width="1%"><strong>:</strong></td>
            <td width="86%">
                <?php
                //echo $rowsub['total'];
                if($rowsub['total']==0){

                    ?>
                <input type="submit" name="submit" value="Duplicate" onclick="return confirm('Are you sure to proceed?');" />
                <input type="reset" name="reset" id="reset" value="Reset" onclick="location.href = 'home.php?id=config&sub=admin_upload_esub_new_year'" />
                <?php }
                if($rowsub['total']>0){
                     $warning = "Data has been duplicate. If you wish to reset, contact DB admin to delete table '$tableesub2'";
  echo "<span style=\"color: red\">" . $warning . "</span>";
                }
                ?></td>
        </tr>

    </table>
</form>
<?php
if (isset($_POST["submit"])) {

    $tahun_esub = $tahun_esub - 1;
    $tableesub = "esub_" . $tahun_esub;

    $qacreate = "DROP TABLE IF EXISTS $tableesub ; ";
    $rqa = mysqli_query($con, $qacreate);
    // echo $qacreate."<br>";

    $qacreate = "
CREATE TABLE $tableesub (
  Bil varchar(255) DEFAULT NULL,
  Nama_Estet varchar(255) DEFAULT NULL,
  No_Lesen varchar(255) DEFAULT NULL,
  No_Lesen_Baru varchar(255) DEFAULT NULL,
  Alamat1 varchar(255) DEFAULT NULL,
  Alamat2 varchar(255) DEFAULT NULL,
  Poskod varchar(255) DEFAULT NULL,
  Bandar varchar(255) DEFAULT NULL,
  Negeri varchar(255) DEFAULT NULL,
  No_Telepon varchar(255) DEFAULT NULL,
  No_Fax varchar(255) DEFAULT NULL,
  Emel varchar(255) DEFAULT NULL,
  Negeri_Premis varchar(255) DEFAULT NULL,
  Daerah_Premis varchar(255) DEFAULT NULL,
  Syarikat_Induk varchar(255) DEFAULT NULL,
  Berhasil double DEFAULT NULL,
  Belum_Berhasil double DEFAULT NULL,
  Jumlah double DEFAULT NULL,
  Keluasan_Yang_Dituai double DEFAULT NULL,
  KEY lesen (No_Lesen_Baru),
  KEY Emel (Emel),
  KEY No_Lesen (No_Lesen),
  KEY Syarikat_Induk (Syarikat_Induk)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    //echo $qacreate."<br>";

    $rqa = mysqli_query($con, $qacreate);


    $qa = "INSERT INTO $tableesub "
            . " SELECT * FROM esub ";
    $rqa = mysqli_query($con, $qa);


    if ($rqa) {
        echo "Your database has imported successfully. ";
    } else {
        echo "Sorry! There is some problem.";
    }
    echo "<br>";
}
?>
