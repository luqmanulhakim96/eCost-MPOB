<?php include ('baju.php');

function semak ($name,$year, $type){
	$con=connect();
		$q="select * from outliers where name = '$name' and type='$type' and year='$year'";
	$r=mysql_query($q,$con);
	$total = mysql_num_rows($r);
	$row = mysql_fetch_array($r);
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

<h1>Outliers for Mill Survey in <?php echo $_COOKIE['tahun_report'];?></h1>


<div class="tabber">
  <div class="tabbertab">
	  <h2>Processing Cost</h2>
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
	$q3="select * from q_mill ";
	$r3 = mysql_query($q3,$con);
	while($row3=mysql_fetch_array($r3)){?>
            <tr <?php if(++$t3%2==0){?>class="alt"<?php } ?>>
              <td><?php echo $t3; ?>. </td>
              <td><?php echo $row3['name'];?>
              <input name="name[<?php echo $t3; ?>]" type="hidden" id="name[<?php echo $t3; ?>]" value="<?php echo $row3['name'];?>" />
              <input name="type[<?php echo $t3; ?>]" type="hidden" id="type[<?php echo $t3; ?>]" value="<?php echo $row3['type'];?>" />
              
              </td>
              <td><div align="center">
                  <?php $j = semak($row3['name'],$_COOKIE['tahun_report'],'mill');?>
                  <input name="min[<?php echo $t3; ?>]" type="text" id="min[<?php echo $t3; ?>]" size="10" maxlength="10" value="<?php echo number_format($j[0],2);?>" style="text-align:center" onchange="number_only(this);" />
              </div></td>
              <td><div align="center">
                  <input name="max[<?php echo $t3; ?>]" type="text" id="max[<?php echo $t3; ?>]" size="10" maxlength="10" style="text-align:center" value="<?php echo number_format($j[1],2);?>" onchange="number_only(this);" />
              </div></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <p>
          <input type="submit" name="update_mill" id="update_mill" value="Update Outliers" />
          <input name="jumlah" type="hidden" id="jumlah" value="<?php echo $t3; ?>" />
        </p>
      </form>
  </div>
  
 
  
</div>