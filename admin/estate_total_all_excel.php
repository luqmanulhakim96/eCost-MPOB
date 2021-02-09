<?php
include('../Connections/connection.class.php');
include '../class/admin.estate.class.php';


header("Content-Disposition: attachment; filename=All_Estate_Response_Survey.xls");
?>
<style type="text/css">
    <!--
    .style1 {color: #FFFFFF}

    body,td,th {
        font-family: Geneva, Arial, Helvetica, sans-serif;font-size:12px;
    }
    -->
</style>

<title>List of All Estate Response Survey in Malaysia</title>

<table width="100%" border="1" align="center" cellpadding="4" cellspacing="0" id="table1" style="border-collapse:collapse">
    <thead>
        <tr bgcolor="#8A1602" height="30">
            <th width="4%" filter='false'><span class="style1">No.</span></th>
            <th width="21%"><span class="style1">Estate Name</span></th>
            <th width="26%"><span class="style1">Company Name</span></th>
            <th width="15%"><span class="style1">New License No.</span></th>
            <th width="13%"><span class="style1">E-mail</span></th>
            <th class="style1">Address</th>
            <th class="style1">Poskod</th>
            <th class="style1">City</th>
            <th class="style1">State</th>
            <th class="style1">Phone No.</th>
            <th class="style1">Fax No.</th>
            <th width="21%"><span class="style1">Last access</span></th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($result_all)) { ?>
            <tr valign="top">
                <td><?php echo ++$l; ?>. </td>
                <td>
                    <?php
                    $con = connect();
                    $qm = "select * from esub where no_lesen_baru ='" . $row['lesen'] . "'";
                    $rm = mysqli_query($con, $qm);
                    $rowm = mysqli_fetch_array($rm);
                    ?>	      <?php echo $rowm['Nama_Estet']; ?>            </td>
                <td><?php echo $rowm['Syarikat_Induk']; ?></td>
                <td><?php echo $rowm['No_Lesen_Baru']; ?></td>
                <td><?php echo $rowm['Emel']; ?>
                    <div align="center"></div></td>
                <td><?php echo $row['alamat1'] . " " . $row['alamat2']; ?></td>
                <td><?php echo $row['poskod']; ?></td>
                <td><?php echo $row['bandar']; ?></td>
                <td><?php echo $row['negeri']; ?></td>
                <td><?php echo $row['no_telepon']; ?></td>
                <td><?php echo $row['no_fax']; ?></td>
                <td><?php
                    $qa = "select success,password from login_estate where lesen ='" . $row['lesen'] . "'";
                    $ra = mysqli_query($con, $qa);
                    $rowa = mysqli_fetch_array($ra);

                    echo $rowa['success'];
                    ?></td>
            </tr>
<?php } mysqli_close($con); ?>
    </tbody>
</table>
<br />
