<?php include ('baju2.php');
?>
<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />
<p>&nbsp;</p>

<script type="text/javascript">
    function ajaxindicatorstart(text)
    {
        if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="ajax-loader.gif"><div>' + text + '</div></div><div class="bg"></div></div>');
        }

        jQuery('#resultLoading').css({
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'z-index': '10000000',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto'
        });

        jQuery('#resultLoading .bg').css({
            'background': '#000000',
            'opacity': '0.7',
            'width': '100%',
            'height': '100%',
            'position': 'absolute',
            'top': '0'
        });

        jQuery('#resultLoading>div:first').css({
            'width': '250px',
            'height': '75px',
            'text-align': 'center',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto',
            'font-size': '16px',
            'z-index': '10',
            'color': '#ffffff'

        });

        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
        jQuery('body').css('cursor', 'wait');
    }

    function ajaxindicatorstop()
    {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }

    function callAjax(urlpath)
    {
        jQuery.ajax({
            type: "GET",
            url: urlpath,
            cache: false,
            success: function (res) {
                //jQuery('#ajaxcontent').html(res);
				    alert('All data has been finish analysis');
            }
        });
    }

    jQuery(document).ajaxStart(function () {
        //show ajax indicator
        ajaxindicatorstart('loading data.. please wait..');
    }).ajaxStop(function () {
        //hide ajax indicator
        ajaxindicatorstop();
    });
</script>
<table width="98%" align="center" class="baju2">
    <tr>
        <th width="12%">Type of survey</th>
        <th width="13%">Year of survey</th>
        <th width="14%">Analysis by</th>
        <th width="27%">Last date of analysis</th>
        <th><div align="center">Action </div></th>
    </tr>
    <?php
    $q_super = "select * from user_super where u_email = '" . $_SESSION['email'] . "'";
    $r_super = mysql_query($q_super, $con);
    $total_super = mysql_num_rows($r_super);

    function analysis($type, $year) {
        $con = connect();
        $qt1 = "select * from analysis where type='$type' and year = '$year'";
        $rt1 = mysql_query($qt1, $con);
        $total = mysql_num_rows($rt1);
        $row = mysql_fetch_array($rt1);

        $variable[0] = $total;
        $variable[1] = $row['type'];
        $variable[2] = $row['year'];
        $variable[3] = $row['modifiedby'];
        $variable[4] = $row['modified'];

        return $variable;
    }

    $con = connect();
    $qt = "select pb_thisyear from kos_belum_matang where pb_thisyear>0 group by pb_thisyear ";
    $rt = mysql_query($qt, $con);
    while ($rowt = mysql_fetch_array($rt)) {


        $ana1 = analysis("ESTATE", $rowt['pb_thisyear']);
        $ana2 = analysis("MILL", $rowt['pb_thisyear']);
        ?>
        <tr class="alt">
            <td><strong>Estate </strong></td>
            <td><?php echo $rowt['pb_thisyear']; ?></td>
            <td><?php echo $ana1[3]; ?></td>
            <td><?php echo $ana1[4]; ?></td>
            <td width="15%">     

                <?php if ($total_super > 0) { ?>
                    <div id="green-button" align="center">
<!--                        <a href="home.php?id=analysis&sub=analysis_estate&tahun=<?php echo $rowt['pb_thisyear']; ?>" class="green-button pcb">
-->
                        <a href="javascript:;" onclick="callAjax('home.php?id=analysis&sub=analysis_estate&tahun=<?php echo $rowt['pb_thisyear']; ?>');" class="green-button pcb">
                        
    <span>Run analysis</span>		  
                        </a>

                        <div id="green-button" align="center">
                            <a href="analysis_estate_excel.php?tahun=<?php echo $rowt['pb_thisyear']; ?>" class="green-button pcb">
                                <span>Download</span>		  
                            </a>

                        </div> 
                    <?php } ?>
                    <?php if ($total_super == 0) { ?>
                        <div id="green-button" align="center">
                            <a href="#" class="green-button pcb">
                                <span>Not allowed</span>		  
                            </a>	
                        </div> 
                    <?php } ?>



            </td>
        </tr>
        <tr>
            <td><strong>Kilang</strong> </td>
            <td><?php echo $rowt['pb_thisyear']; ?></td>
            <td><?php echo $ana2[3]; ?></td>
            <td><?php echo $ana2[4]; ?></td>
            <td>

                <?php if ($total_super > 0) { ?>
                    <div id="red-button" align="center">
                      <!--  <a href="home.php?id=analysis&sub=analysis_mill&tahun=<?php echo $rowt['pb_thisyear']; ?>" class="red-button pcb">-->
                        <a href="javascript:;" onclick="callAjax('home.php?id=analysis&sub=analysis_mill&tahun=<?php echo $rowt['pb_thisyear']; ?>');" class="red-button pcb">
                            <span>Run analysis</span>		
                        </a>
                    </div>
                    <div id="red-button" align="center">
                        <a href="analysis_mill_excel.php?tahun=<?php echo $rowt['pb_thisyear']; ?>" class="red-button pcb">
                            <span>Download</span>		
                        </a>
                    </div>	
                <?php } ?>
                <?php if ($total_super == 0) { ?>
                    <div id="red-button" align="center">
                        <a href="#" class="red-button pcb">
                            <span>Not alowed</span>		
                        </a>
                    </div>	
                <?php } ?>


            </td>
        </tr>
    <?php } ?> 
</table>



