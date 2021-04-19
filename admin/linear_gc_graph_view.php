<?php
session_start();
include ('../Connections/connection.class.php');
set_time_limit(0);
extract($_REQUEST);
//set_time_limit(0);
$con = connect();
include ('baju2.php');
error_reporting(0);
?>
<script type="text/javascript">
    var t;
    function top() {
        if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
            window.scrollBy(0, -50);
            t = setTimeout('top()', 5);
        }
        else
            clearTimeout(t);
    }


</script>

<link rel="shortcut icon" href="../images/icon.ico" />
<title>View Graph for <?php echo $field; ?></title>
<style type="text/css">
    body, td, th {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }    .style1 {
        color: #FF0000;
        font-style: italic;
    }
</style>
<script type="text/javascript" src="../jquery-1.3.2.js"></script>

<script language="javascript">
    $(document).ready(function () {
        $('#rowclick4 tr')
                .filter(':has(:checkbox:checked)')
                .addClass('selected')
                .end()
                .click(function (event) {
                    if (event.target.type !== 'checkbox') {
                        $(':checkbox', this).trigger('click');
                    }
                })
                .find(':checkbox')
                .click(function (event) {
                    $(this).parents('tr:first').toggleClass('selected');
                });
    });

    function checkAll(field)
    {
        for (i = 0; i < field.length; i++)
            field[i].checked = true;
    }


</script>


<div align="center"> <img src="linear_gc_graph.php?table=<?php echo $table ?>&tahun=<?php echo $tahun; ?>&amp;field=<?php echo $field; ?>&type=<?php echo $type; ?>&hold=yes&trim=<?php echo $trim; ?>" height="600" /> </div>

<?php
if ($trim == 'yes') {
    echo "<script>alert('Data has been trimmed');</script>";

    echo "<script>window.location='linear_gc_graph_view.php?table=$table&tahun=$tahun&type=$type&field=$field&type=$type';</script>";
}
?>

<form action="" method="post" name="form1" id="form1">
    <h2 align="center">Data for <?php echo $field; ?></h2>
    <div align="center">
        <input name="tahun" type="hidden" id="tahun" value="<?php echo $tahun; ?>" />
        <input name="type" type="hidden" id="type" value="<?php echo $type; ?>" />
        <input name="field" type="hidden" id="field" value="<?php echo $field; ?>" />
        <input name="table" type="hidden" id="table" value="<?php echo $table; ?>" />
        <br />

        <?php
        //$con=connect();
        $q_super = "select * from user_super where u_email = '" . $_SESSION['email'] . "'";
        $r_super = mysqli_query($con, $q_super);
        $total_super = mysqli_num_rows($r_super);
        if ($total_super > 0) {
            ?>

            <input type="submit" name="update_draft" id="update_draft" value="Draft" onclick="return confirm('Are you sure to set this data as Draft?');"   />
            <input type="submit" name="update" id="update" value="Outliers"  onclick="return confirm('Are you sure to trim this data as Outliers?');"  />
            <input type="submit" name="update_not" id="update_not" value="Not Outliers"  onclick="return confirm('Are you sure to trim this data as Not Outliers?');"   />
            <input type="submit" name="trim" id="trim" value="Start Trim" onclick="return confirm('Are you sure to trim this data?');" />
            <input type="button" name="button2" id="button2" value="Close" onclick="window.close();
                        top.opener.window.location.reload();" />
            <br />
            Enter for valid range analysis :
            <input name="start" type="text" id="start" size="10" />
            until
            <input name="end" type="text" id="end" size="10" />
            <input type="submit" name="setrange" id="setrange" value="Set Range" />
        <?php } ?>
        <br />  <span class="style1">** Draft outliers will not appear in Analysis Screen.</span><br />
        <br />
    </div>
    <?php
    if ($type != "tan") {
        $medan = "kos_per_hektar";
        $graf = "graf_km";
    }
    if ($type == "tan") {
        $medan = "kos_per_tan";
        $graf = "graf_km_tan";
    }


//$con=connect();

    $query = "select * from $graf where sessionid='$field' and tahun = '$tahun'  order by status, x ";
    $res = mysqli_query($con, $query);
    $restotal = mysqli_num_rows($res);

    if ($restotal > 0) {
        ?>
        <table width="80%" align="center" class="baju2" id="rowclick4">
            <tr>
                <th>No.</th>
                <th><input type="checkbox" name="checkbox" id="checkbox" onClick="checkAll(document.form1.license)" />
                    License No.</th>
                <th>District</th>
                <th>Negeri</th>
                <th>Year of Survey</th>
                <th>Value</th>
                <th>Normal</th>
            </tr>
            <?php
            $query_avg = "select avg(y) as average  from $graf where sessionid='$field' and tahun = '$tahun'  and status='0' order by x ";
            $res_avg = mysqli_query($con, $query_avg);
            $row_avg = mysqli_fetch_array($res_avg);

            $query_avg_draft = "select avg(y) as average  from $graf where sessionid='$field' and tahun = '$tahun'  and (status='0' or status='9') order by x ";
            $res_avg_draft = mysqli_query($con, $query_avg_draft);
            $row_avg_draft = mysqli_fetch_array($res_avg_draft);

            $sql = "select y from $graf where sessionid='$field' and tahun = '$tahun'  and status='0' order by x";
            $sql_result = mysqli_query($con, $sql);
            $i = 0;
            while ($row = mysqli_fetch_array($sql_result)) {
                $test_data[] = $row["y"];
                $i = $i + 1;
            }
            $_SESSION['data_x'] = $test_data;

            $sql_draft = "select y from $graf where sessionid='$field' and tahun = '$tahun'  and status='0' order by x";
            $sql_result_draft = mysqli_query($con, $sql_draft);
            while ($row_draft = mysqli_fetch_array($sql_result_draft)) {
                $test_data_draft[] = $row_draft["y"];
            }

            function median($numbers = array()) {
                if (!is_array($numbers))
                    $numbers = func_get_args();

                rsort($numbers);
                $mid = (count($numbers) / 2);
                return ($mid % 2 != 0) ? $numbers[$mid - 1] : (($numbers[$mid - 1]) + $numbers[$mid]) / 2;
            }

            function standard_deviation($std) {
                $total=0;
                // while (list($key, $val) = each($std))

                foreach($std as $key => $val)

                {
                    $total += $val;
                }
                reset($std);
                $mean = $total / count($std);

                // while (list($key, $val) = each($std))

                  foreach($std as $key => $val)


                 {
                  $sum=0;
                    $sum += pow(($val - $mean), 2);
                }
                $var = sqrt($sum / (count($std) - 1));
                return $var;
            }

            $dy = round(standard_deviation($test_data), 2);

            class Normal {

                var $mean;
                var $stdev;

                function __construct($mu, $sigma) {
                    $this->mean = $mu;
                    $this->stdev = $sigma;
                }

                function PDF($x) {
                    $denominator = sqrt(2 * pi()) * $this->stdev;
                    $numerator = exp(-($x - $this->mean) * ($x - $this->mean) / (2 * $this->stdev));
                    $density = $numerator / $denominator;
                    return $density;
                }

            }

            $norm = new Normal($row_avg['average'], $dy);









            while ($row = mysqli_fetch_array($res)) {
                ?>
                <tr <?php
                if ($row['status'] == '1') {
                    echo "class=\"alt\"";
                } else if ($row['status'] == '9') {
                    echo "class=\"altdraft\"";
                }
                ?>>
                    <td><?php echo ++$t; ?>.</td>
                    <td><input type="checkbox" name="license[]" id="license" value="<?php
                echo
                $row['x'] . "+" . $row['y'] . "+" . $row['lesen'];
                ?>" />
                        <?php echo $row['lesen']; ?></td>
                    <td><?php echo $row['daerah']; ?></td>
                    <td><?php echo $row['negeri']; ?></td>
                    <td><?php echo $row['tahun']; ?> <?php //echo $row['status'];  ?> </td>
                    <td><div align="right"><?php echo number_format($row['y'], 2); ?></div></td>
                    <td><div align="right"><?php
                if ($row['status'] == '0') {
                    echo $y[] = $norm->PDF($row['y']);
                }
                ?></div></td>
                </tr>
                            <?php
                        }
                        $_SESSION['data_y'] = $y;
                        ?>
        </table>

        <?php } // show only data not empty ?>

<?php
if ($restotal == 0) {
    echo "<h1 style=\"color:red\">No data available</h1>";
}

?>

    <b style="font-size:14px;">  Mean :
    <?php
    echo number_format($row_avg['average'], 2);
    ?>
        &nbsp;&nbsp;<br />
        Mean (Draft):
        <?php
        echo number_format($row_avg_draft['average'], 2);
        ?>
        &nbsp;&nbsp;<br />


        Median :
<?php
echo median($test_data);
?>
        <br />

        Median (Draft) :
        <?php
        echo median($test_data_draft);
        ?>
        <br />


        Percentage of changes :
<?php
$percent = 0;
if (median($test_data) > 0) {
    $percent = ($row_avg['average'] - median($test_data)) / median($test_data) * 100;
}
echo number_format($percent, 2) . " %";
?>
        <br />



        Standard Deviation :
<?php echo $dy;
?>
    </b>
    <br />


    <table width="50%" border="0" align="center">
        <tr>
            <td><div align="center"><span id="normal" ></span> </div></td>
        </tr>
    </table>
    <script type="text/javascript" src="../amline/swfobject.js"></script>
    <script type="text/javascript">
                // <![CDATA[
                var so1 = new SWFObject("../amline/amline.swf", "amline", "520", "380", "8", "#FFFFFF");
                so1.addVariable("path", "../amline/");
                so1.addVariable("settings_file", encodeURIComponent("amline_settings.xml"));
                so1.addVariable("data_file", encodeURIComponent("amline_data.php"));
                so1.addVariable("preloader_color", "#999999");
                so1.write("normal");
                // ]]>
    </script>


    <br />
    <a href="#" onclick="top();
            return false">  [move to top] </a>
</form>
       <?php
//==============================================================================================

       if (isset($trim)) {
           echo "<script>window.location=\"linear_gc_graph_view.php?table=$table&tahun=$tahun&type=$type&field=$field&type=$type&trim=yes\";</script>";
       }


       if (isset($update)) {

           if ($type != "tan") {
               $medan = "kos_per_hektar";
               $graf = "graf_km";
           }
           if ($type == "tan") {
               $medan = "kos_per_tan";
               $graf = "graf_km_tan";
           }



           $con = connect();
           foreach ($license as $value) {
               $val = explode("+", $value);
               $q = "update $graf set status='1' where sessionid='" . $field .
                       "' and tahun = '" . $_COOKIE['tahun_report'] . "' and x = '" . $val[0] .
                       "' and y ='" . $val[1] . "'
	and lesen = '" . $val[2] . "'
	";
               $r = mysqli_query($con, $q);
           }
           echo "<script>window.location=\"linear_gc_graph_view.php?table=$table&tahun=$tahun&type=$type&field=$field&type=$type\";</script>";
       }



       if (isset($update_draft)) {

           if ($type != "tan") {
               $medan = "kos_per_hektar";
               $graf = "graf_km";
           }
           if ($type == "tan") {
               $medan = "kos_per_tan";
               $graf = "graf_km_tan";
           }



           $con = connect();
           foreach ($license as $value) {
               $val = explode("+", $value);
               $q = "update $graf set status='9' where sessionid='" . $field .
                       "' and tahun = '" . $_COOKIE['tahun_report'] . "' and x = '" . $val[0] .
                       "' and y ='" . $val[1] . "'
	and lesen = '" . $val[2] . "'
	";
               $r = mysqli_query($con, $q);
           }
           echo "<script>window.location=\"linear_gc_graph_view.php?table=$table&tahun=$tahun&type=$type&field=$field&type=$type\";</script>";
       }

       if (isset($update_not)) {
           $con = connect();
           foreach ($license as $value) {
               $val = explode("+", $value);
               $q = "update $graf set status='0' where sessionid='" . $field .
                       "' and tahun = '" . $_COOKIE['tahun_report'] . "' and x = '" . $val[0] .
                       "' and y ='" . $val[1] . "'
	and lesen = '" . $val[2] . "'
	";
               $r = mysqli_query($con, $q);
           }
           echo "<script>window.location=\"linear_gc_graph_view.php?table=$table&tahun=$tahun&type=$type&field=$field&type=$type\";</script>";
       }
       if (isset($setrange)) {
           if ($start != "" && $end != "") {
               $con = connect();
               $q = "update $graf set status='0' where sessionid='" . $field .
                       "' and tahun = '" . $_COOKIE['tahun_report'] . "'";

               $r = mysqli_query($con, $q);

               $q = "update $graf set status='1' where sessionid='" . $field .
                       "' and tahun = '" . $_COOKIE['tahun_report'] . "'  and (y not between '$start' and '$end')
	";
               $r = mysqli_query($con, $q);
           } else if ($start >= $end) {
               echo "<script>alert('Please enter a valid value');</script>";
           } else {
               echo "<script>alert('Please enter a valid value');</script>";
           }
           echo "<script>window.location=\"linear_gc_graph_view.php?table=$table&tahun=$tahun&type=$type&field=$field&type=$type\";</script>";
       }
       ?>
