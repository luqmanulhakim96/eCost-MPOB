<link rel="stylesheet" href="../text_style.css" type="text/css" />
<link rel="stylesheet" href="../css/jquery.treeview.css" />
<link rel="stylesheet" href="../css/screen.css" />

<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.cookie.js" type="text/javascript"></script>
<script src="../js/jquery.treeview.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $("#browser").treeview({
            animated: "slow",
            collapsed: true,
            persist: "cookie"
        });
    });
</script>
<div id="main">
    <strong><img src="../images/Bcase.png" width="16" height="16" /> Raw data</strong>
    <ul id="browser" class="filetree">
<!--	  <li><img src="../nav/file.gif" /> <strong><a href="home.php?id=summary">View Summary</a><a href="#"></a></strong></li>
        -->
        <?php /* ?><li><img src="../nav/folder.gif" /> <strong>FFB &amp; Cost of Production</strong>
          <ul>
          <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=summary&amp;sub=summary_map">Map View</a></li>
          <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=summary&amp;sub=summary_all">Cost per Tan FFB</a></li>
          <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=summary&amp;sub=summary_graf">Cost per Tan CPO</a></li>
          <!--<li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=summary&amp;sub=summary_outliers">Outliers</a></li>-->

          </ul>
          </li><?php */ ?>

        <li><img src="../nav/folder.gif" /> <strong>Data Survey</strong>
            <ul>

                <?php
                $con =connect();

                $qtDelete = "delete from kos_belum_matang where pb_thisyear='0' ";
                $rtDelete = mysqli_query($con, $qtDelete);


                $qt = "select pb_thisyear from kos_belum_matang group by pb_thisyear ";
                $rt = mysqli_query($con, $qt);
                while ($rowt = mysqli_fetch_array($rt)) {
                    ?>
                      <?php if ($rowt['pb_thisyear'] <= 2021): ?>
                    <li><img src="../nav/file.gif" alt="d" /><a href="data_survey_estate_old.php?tahun=<?php echo $rowt['pb_thisyear']; ?>">Estate <?php echo $rowt['pb_thisyear']; ?></a></li>
                          <?php else : ?>
                            <li><img src="../nav/file.gif" alt="d" /><a href="data_survey_estate.php?tahun=<?php echo $rowt['pb_thisyear']; ?>">Estate <?php echo $rowt['pb_thisyear']; ?></a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="data_survey_kilang.php?tahun=<?php echo $rowt['pb_thisyear']; ?>">Kilang <?php echo $rowt['pb_thisyear']; ?></a></li>
<?php } ?>

            </ul>
        </li>
    </ul>

</div>
