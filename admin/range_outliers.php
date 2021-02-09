<?php include ('baju.php');
function semak ($name,$year, $type){
	$con=connect();
	$q="select * from outliers where name = '$name' and type='$type' and year='$year'";
	$r=mysqli_query($con, $q);
	$total = mysqli_num_rows($r);
	$row = mysqli_fetch_array($r);
	$var[0]=$row['MIN'];
	$var[1]=$row['MAX'];

	return $var;
}

?>
<script type="text/javascript" language="javascript" src="../js/datatable/js/jquery.dataTables.js"></script>
  <style>
      		@import "../js/datatable/css/demo_page.css";
			@import "../js/datatable/css/demo_table.css";
      </style>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {


	$('#example').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"sDom" : '<"H"frilp><t>', "bAutoWidth": false,
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
		]
	} );

	$('#example1').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"sDom" : '<"H"frilp><t>', "bAutoWidth": false,
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
		]
	} );

	$('#example2').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"sDom" : '<"H"frilp><t>', "bAutoWidth": false,
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
		]
	} );


	$('#example3').dataTable( {"sPaginationType": "full_numbers","iDisplayLength": 25,"sDom" : '<"H"frilp><t>', "bAutoWidth": false,
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
		]
	} );

} );



function number_only(obj) {
		var alphaExp = /^[a-zA-Z]+$/;
		if(obj.value.match(alphaExp)) {
			alert("Please enter number only!");
			$(obj).attr("value","0.00");
			$(obj).focus();
			return false;
		}
		else {
			$(obj).val=obj.value;
			$(obj).format({format:"#,###.00", locale:"us"});
			$(obj).removeClass("field_active");
			$(obj).addClass("field_edited");
			return true;
		}
	}



			</script>
<script type="text/javascript" src="../js/tabber/tabber.js"></script>
<link rel="stylesheet" href="../js/tabber/example.css" TYPE="text/css" MEDIA="screen">


<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
<h1>Outliers for Estate Survey in <?php echo $_COOKIE['tahun_report'];?></h1>
<div class="tabber">

  <div class="tabbertab">
    <h2>Immature Cost</h2>
	  <form id="form1" name="form1" method="post" action="save_outliers.php">
	    <table width="100%" class="baju" id="example">
          <thead>
          <tr>
            <th width="5%">No.</th>
            <th width="56%">Item Name</th>
            <th width="18%">Min</th>
            <th width="21%">Max</th>
          </tr>
	</thead>
    <tbody>

    <?php $con =connect();
	$q="select * from q_kbm ";
	$r = mysqli_query($con, $q);
	while($row=mysqli_fetch_array($r)){?>
          <tr <?php if(++$t%2==0){?>class="alt"<?php } ?>>
            <td><?php echo $t; ?>. </td>
            <td><?php echo $row['name'];?>

            <input name="name[<?php echo $t; ?>]" type="hidden" id="name[<?php echo $t; ?>]" value="<?php echo $row['name'];?>" />
              <input name="type[<?php echo $t; ?>]" type="hidden" id="type[<?php echo $t; ?>]" value="<?php echo $row['tahun'];?>" />

            </td>
            <td><div align="center">
              <?php $j = semak($row['name'],$_COOKIE['tahun_report'],'estate_immature');?>
              <input name="min[<?php echo $t; ?>]" type="text" id="min[<?php echo $t; ?>]" size="10" maxlength="10" value="<?php echo number_format($j[0],2);?>" style="text-align:center" onchange="number_only(this);" />
            </div></td>
            <td><div align="center">
              <input name="max[<?php echo $t; ?>]" type="text" id="max[<?php echo $t; ?>]" size="10" maxlength="10" style="text-align:center" value="<?php echo number_format($j[1],2);?>" onchange="number_only(this);" />
            </div></td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
                <p>
          <input type="submit" name="update_immature" id="update_immature" value="Update Outliers" />
          <input name="jumlah" type="hidden" id="jumlah" value="<?php echo $t; ?>" />
        </p>

    </form>
    <p>&nbsp;</p>
  </div>



     <div class="tabbertab">
	  <h2>Mature Cost (Upkeep)</h2>
      <form id="form2" name="form1" method="post" action="save_outliers.php">
        <table width="100%" class="baju" id="example1">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th width="56%">Item Name</th>
              <th width="18%">Min</th>
              <th width="21%">Max</th>
            </tr>
          </thead>
          <tbody>
            <?php
	$q1="select * from q_km  where type ='upk'";
	$r1 = mysqli_query($con, $q1);
	while($row1=mysqli_fetch_array($r1)){?>
            <tr <?php if(++$t1%2==0){?>class="alt"<?php } ?>>
              <td><?php echo $t1; ?>. </td>
              <td><?php echo $row1['name'];?>
              <input name="name[<?php echo $t1; ?>]" type="hidden" id="name[<?php echo $t1; ?>]" value="<?php echo $row1['name'];?>" />
              <input name="type[<?php echo $t1; ?>]" type="hidden" id="type[<?php echo $t1; ?>]" value="<?php echo $row1['type'];?>" />


              </td>
                <td><div align="center">
              <?php $j1 = semak($row1['name'],$_COOKIE['tahun_report'],'estate_mature');?>
              <input name="min[<?php echo $t1; ?>]" type="text" id="min[<?php echo $t1; ?>]" size="10" maxlength="10" value="<?php echo number_format($j1[0],2);?>" style="text-align:center" onchange="number_only(this);" />
            </div></td>
            <td><div align="center">
              <input name="max[<?php echo $t1; ?>]" type="text" id="max[<?php echo $t1; ?>]" size="10" maxlength="10" style="text-align:center" value="<?php echo number_format($j1[1],2);?>" onchange="number_only(this);" />
            </div></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

                <p>
          <input type="submit" name="update_mature_cost" id="update_mature_cost" value="Update Outliers" />
          <input name="jumlah" type="hidden" id="jumlah" value="<?php echo $t1;  ?>" />
        </p>

      </form>
  </div>

     <div class="tabbertab">
	  <h2>Mature Cost (Harvesting)</h2>
      <form id="form3" name="form1" method="post" action="save_outliers.php">
        <table width="100%" class="baju" id="example2">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th width="56%">Item Name</th>
              <th width="18%">Min</th>
              <th width="21%">Max</th>
            </tr>
          </thead>
          <tbody>
            <?php
	$q2="select * from q_km where type ='harvest_all' ";
	$r2 = mysqli_query($con, $q2);
	while($row2=mysqli_fetch_array($r2)){?>
            <tr <?php if(++$t2%2==0){?>class="alt"<?php } ?>>
              <td><?php echo $t2; ?>. </td>
              <td><?php echo $row2['name'];?>
              <input name="name[<?php echo $t2; ?>]" type="hidden" id="name[<?php echo $t2; ?>]" value="<?php echo $row2['name'];?>" />
              <input name="type[<?php echo $t2; ?>]" type="hidden" id="type[<?php echo $t2; ?>]" value="<?php echo $row2['type'];?>" />

              </td>
              <td><div align="center">
              <?php $j2 = semak($row2['name'],$_COOKIE['tahun_report'],'estate_mature');?>
              <input name="min[<?php echo $t2; ?>]" type="text" id="min[<?php echo $t2; ?>]" size="10" maxlength="10" value="<?php echo number_format($j2[0],2);?>" style="text-align:center" onchange="number_only(this);" />
            </div></td>
            <td><div align="center">
              <input name="max[<?php echo $t2; ?>]" type="text" id="max[<?php echo $t2; ?>]" size="10" maxlength="10" style="text-align:center" value="<?php echo number_format($j2[1],2);?>" onchange="number_only(this);" />
            </div></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <p>
          <input type="submit" name="update_mature_harvesting" id="update_mature_harvesting" value="Update Outliers" />
          <input name="jumlah" type="hidden" id="jumlah" value="<?php echo $t2; ?>" />
        </p>


      </form>
  </div>

     <div class="tabbertab">
	  <h2>Mature Cost (Transportation)</h2>
      <form id="form4" name="form1" method="post" action="save_outliers.php">
        <table width="100%" class="baju" id="example3">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th width="56%">Item Name</th>
              <th width="18%">Min</th>
              <th width="21%">Max</th>
            </tr>
          </thead>
          <tbody>
            <?php
	$q3="select * from q_km where type='transportation_all'";
	$r3 = mysqli_query($con, $q3);
	while($row3=mysqli_fetch_array($r3)){?>
            <tr <?php if(++$t3%2==0){?>class="alt"<?php } ?>>
              <td><?php echo $t3; ?>. </td>
              <td><?php echo $row3['name'];?>
              <input name="name[<?php echo $t3; ?>]" type="hidden" id="name[<?php echo $t3; ?>]" value="<?php echo $row3['name'];?>" />
              <input name="type[<?php echo $t3; ?>]" type="hidden" id="type[<?php echo $t3; ?>]" value="<?php echo $row3['type'];?>" />


              </td>
                  <td><div align="center">
              <?php $j3 = semak($row3['name'],$_COOKIE['tahun_report'],'estate_mature');?>
              <input name="min[<?php echo $t3; ?>]" type="text" id="min[<?php echo $t3; ?>]" size="10" maxlength="10" value="<?php echo number_format($j3[0],2);?>" style="text-align:center" onchange="number_only(this);" />
            </div></td>
            <td><div align="center">
              <input name="max[<?php echo $t3; ?>]" type="text" id="max[<?php echo $t3; ?>]" size="10" maxlength="10" style="text-align:center" value="<?php echo number_format($j3[1],2);?>" onchange="number_only(this);" />
            </div></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <p>
          <input type="submit" name="update_mature_transportation" id="update_mature_transportation" value="Update Outliers" />
          <input name="jumlah" type="hidden" id="jumlah" value="<?php echo $t3; ?>" />
        </p>



      </form>
  </div>



</div>
