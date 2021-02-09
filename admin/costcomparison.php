<?php
session_start();

if ($_SESSION['type']<>"admin"){
	header("location:../logout.php");
}

$con = connect();

$Year = $_COOKIE['tahun_report'];

if (isset($_POST['Malaysia'])) {
	$ID = $_POST['ID'];
	$ItemID = $_POST['ItemID'];
	$Item = $_POST['Item'];
	$Malaysia = $_POST['Malaysia'];
	$PMalaysia = $_POST['PMalaysia'];
	$Sabah = $_POST['Sabah'];
	$Sarawak = $_POST['Sarawak'];
	$Malaysia2 = $_POST['Malaysia2'];
	$PMalaysia2 = $_POST['PMalaysia2'];
	$Sabah2 = $_POST['Sabah2'];
	$Sarawak2 = $_POST['Sarawak2'];
	$isShow = $_POST['isShow'];
	$Proceed = true;

	$TotalMalaysia = 0;
	$TotalPMalaysia = 0;
	$TotalSabah = 0;
	$TotalSarawak = 0;
	$TotalMalaysia2 = 0;
	$TotalPMalaysia2 = 0;
	$TotalSabah2 = 0;
	$TotalSarawak2 = 0;

	for ($i = 0; $i < count($ItemID); $i++) {
		if ($Malaysia[$i] == "") {
			$message = "Please insert Cost Per Hectare of Malaysia for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($PMalaysia[$i] == "") {
			$message = "Please insert Cost Per Hectare of Peninsular Malaysia for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($Sabah[$i] == "") {
			$message = "Please insert Cost Per Hectare of Sabah for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($Sarawak[$i] == "") {
			$message = "Please insert Cost Per Hectare of Sarawak for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($Malaysia2[$i] == "") {
			$message = "Please insert Cost Per Tonne FFB of Malaysia for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($PMalaysia2[$i] == "") {
			$message = "Please insert Cost Per Tonne FFB of Peninsular Malaysia for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($Sabah2[$i] == "") {
			$message = "Please insert Cost Per Tonne FFB of Sabah for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else if ($Sarawak2[$i] == "") {
			$message = "Please insert Cost Per Tonne FFB of Sarawak for ".$Item[$i]."!";
			$Proceed = false;
			break;
		} else {
			if ($ItemID[$i] != 2) {
				$TotalMalaysia += $Malaysia[$i];
				$TotalPMalaysia += $PMalaysia[$i];
				$TotalSabah += $Sabah[$i];
				$TotalSarawak += $Sarawak[$i];
				$TotalMalaysia2 += $Malaysia2[$i];
				$TotalPMalaysia2 += $PMalaysia2[$i];
				$TotalSabah2 += $Sabah2[$i];
				$TotalSarawak2 += $Sarawak2[$i];
			}
		}
	}

	if ($Proceed) {
		$isNew = true;
		for ($i = 0; $i < count($ItemID); $i++) {
			if ($ID[$i] == "") {
				$aQuery = "INSERT INTO tblasmcostsummarydetail (Item, `Year`, ".
						  "MalaysiaAmount, PMalaysiaAmount, SabahAmount, SarawakAmount, ".
						  "MalaysiaAmount2, PMalaysiaAmount2, SabahAmount2, SarawakAmount2, isShow) ".
						  "VALUES (".$ItemID[$i].", '$Year', ".
						  $Malaysia[$i].", ".$PMalaysia[$i].", ".$Sabah[$i].", ".$Sarawak[$i].", ".
						  $Malaysia2[$i].", ".$PMalaysia2[$i].", ".$Sabah2[$i].", ".$Sarawak2[$i].", $isShow)";
				$aResult = mysqli_query($con, $aQuery);
				$aQuery = "SELECT LAST_INSERT_ID() AS IDX";
				$aRows = mysqli_query($con, $aQuery);
				$aRow = mysqli_fetch_object($aRows);
				$ID[$i] = $aRow->IDX;
			} else {
				$isNew = false;
				$aQuery = "UPDATE tblasmcostsummarydetail ".
						  "SET MalaysiaAmount = ".$Malaysia[$i].", PMalaysiaAmount = ".$PMalaysia[$i].", ".
						  "SabahAmount = ".$Sabah[$i].", SarawakAmount = ".$Sarawak[$i].", ".
						  "MalaysiaAmount2 = ".$Malaysia2[$i].", PMalaysiaAmount2 = ".$PMalaysia2[$i].", ".
						  "SabahAmount2 = ".$Sabah2[$i].", SarawakAmount2 = ".$Sarawak2[$i].", isShow = $isShow ".
						  "WHERE ID = ".$ID[$i];
				mysqli_query($con, $aQuery);
			}
		}
		if ($isNew) {
			$aQuery = "INSERT INTO tblasmcostsummarydetail (Item, `Year`, ".
					  "MalaysiaAmount, PMalaysiaAmount, SabahAmount, SarawakAmount, ".
					  "MalaysiaAmount2, PMalaysiaAmount2, SabahAmount2, SarawakAmount2, isShow) ".
					  "VALUES (6, '$Year', ".
					  $TotalMalaysia.", ".$TotalPMalaysia.", ".$TotalSabah.", ".$TotalSarawak.", ".
					  $TotalMalaysia2.", ".$TotalPMalaysia2.", ".$TotalSabah2.", ".$TotalSarawak2.", $isShow)";
			mysqli_query($con, $aQuery);
			$message = "Data has been saved!";
		} else {
			$aQuery = "UPDATE tblasmcostsummarydetail ".
					  "SET MalaysiaAmount = ".$TotalMalaysia.", PMalaysiaAmount = ".$TotalPMalaysia.", ".
					  "SabahAmount = ".$TotalSabah.", SarawakAmount = ".$TotalSarawak.", ".
					  "MalaysiaAmount2 = ".$TotalMalaysia2.", PMalaysiaAmount2 = ".$TotalPMalaysia2.", ".
					  "SabahAmount2 = ".$TotalSabah2.", SarawakAmount2 = ".$TotalSarawak2.", isShow = $isShow ".
					  "WHERE `Item` = 6 AND `Year` = '$Year'";
			mysqli_query($con,$aQuery);
			$message = "Data has been updated!";
		}
	}
} else {
	$aQuery = "SELECT t1.ID, t1.MalaysiaAmount, t1.PMalaysiaAmount, t1.SabahAmount, t1.SarawakAmount, ".
			  "t1.MalaysiaAmount2, t1.PMalaysiaAmount2, t1.SabahAmount2, t1.SarawakAmount2, t1.isShow, ".
			  "t2.ID AS ItemID, t2.ItemEn ".
			  "FROM tblasmcostsummarydetail AS t1 ".
			  "JOIN tblasmcostsummaryitem AS t2 ON t2.ID = t1.Item ".
			  "WHERE t1.`Year` = '$Year' AND t2.ID != 6 ".
			  "ORDER BY t2.Ordering, t2.`Parent` ASC";
	$aRows = mysqli_query($con, $aQuery);
	$ID = array();
	$ItemID = array();
	$Item = array();
	$Malaysia = array();
	$PMalaysia = array();
	$Sabah = array();
	$Sarawak = array();
	$Malaysia2 = array();
	$PMalaysia2 = array();
	$Sabah2 = array();
	$Sarawak2 = array();
	if (mysqli_num_rows($aRows) == 0) {
		$aQuery = "SELECT ID AS ItemID, ItemEn ".
				  "FROM tblasmcostsummaryitem ".
				  "WHERE ID != 6 ".
				  "ORDER BY Ordering, `Parent` ASC";
		$aRows = mysqli_query($con, $aQuery);
		$isShow = 1;
		while ($aRow = mysqli_fetch_object($aRows)) {
			array_push($ID, "");
			array_push($ItemID, $aRow->ItemID);
			array_push($Item, $aRow->ItemEn);
			array_push($Malaysia, "");
			array_push($PMalaysia, "");
			array_push($Sabah, "");
			array_push($Sarawak, "");
			array_push($Malaysia2, "");
			array_push($PMalaysia2, "");
			array_push($Sabah2, "");
			array_push($Sarawak2, "");
		}
	} else {
		while ($aRow = mysqli_fetch_object($aRows)) {
			array_push($ID, $aRow->ID);
			array_push($ItemID, $aRow->ItemID);
			array_push($Item, $aRow->ItemEn);
			array_push($Malaysia, $aRow->MalaysiaAmount);
			array_push($PMalaysia, $aRow->PMalaysiaAmount);
			array_push($Sabah, $aRow->SabahAmount);
			array_push($Sarawak, $aRow->SarawakAmount);
			array_push($Malaysia2, $aRow->MalaysiaAmount2);
			array_push($PMalaysia2, $aRow->PMalaysiaAmount2);
			array_push($Sabah2, $aRow->SabahAmount2);
			array_push($Sarawak2, $aRow->SarawakAmount2);
			$isShow = $aRow->isShow;
		}
	}
}
?>
<h2>Cost Comparison <?php echo $Year; ?></h2>
<form name="CostComparison" id ="CostComparison" method="post">
<?php for ($i = 0; $i < count($ItemID); $i++) { ?>
<input type="hidden" name="ID[]" value="<?php echo $ID[$i]; ?>" />
<input type="hidden" name="ItemID[]" value="<?php echo $ItemID[$i]; ?>" />
<input type="hidden" name="Item[]" value="<?php echo $Item[$i]; ?>" />
<?php } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" aria-describedby="costComparison">
  <?php if (!empty($message)) { ?><tr><td style="padding:5px;color:#f00"><?php echo $message; ?></td></tr><?php } ?>
  <tr>
    <td style="padding:5px">
	  <table width="100%" border="1" style="border-collapse:collapse" aria-describedby="costComparison2">
	    <tr style="font-weight:bold">
		  <td rowspan="2" style="padding:3px">Cost for Mature Crop</td>
		  <td colspan="4" style="padding:3px;text-align:center">Cost Per Hectare (RM)</td>
		  <td colspan="4" style="padding:3px;text-align:center">Cost Per Tonne FFB (RM)</td>
		</tr>
		<tr style="font-weight:bold">
		  <td width="100" style="padding:3px;text-align:center">Malaysia</td>
		  <td width="100" style="padding:3px;text-align:center">P. Malaysia</td>
		  <td width="100" style="padding:3px;text-align:center">Sabah</td>
		  <td width="100" style="padding:3px;text-align:center">Sarawak</td>
		  <td width="100" style="padding:3px;text-align:center">Malaysia</td>
		  <td width="100" style="padding:3px;text-align:center">P. Malaysia</td>
		  <td width="100" style="padding:3px;text-align:center">Sabah</td>
		  <td width="100" style="padding:3px;text-align:center">Sarawak</td>
		</tr>
		<?php
		$TotalMalaysia = 0;
		$TotalPMalaysia = 0;
		$TotalSabah = 0;
		$TotalSarawak = 0;
		$TotalMalaysia2 = 0;
		$TotalPMalaysia2 = 0;
		$TotalSabah2 = 0;
		$TotalSarawak2 = 0;
		?>
		<?php for ($i = 0; $i < count($ItemID); $i++) { ?>
		<?php
		if ($Malaysia[$i] != "" && $ItemID[$i] != 2) {$TotalMalaysia += $Malaysia[$i];}
		if ($PMalaysia[$i] != "" && $ItemID[$i] != 2) {$TotalPMalaysia += $PMalaysia[$i];}
		if ($Sabah[$i] != "" && $ItemID[$i] != 2) {$TotalSabah += $Sabah[$i];}
		if ($Sarawak[$i] != "" && $ItemID[$i] != 2) {$TotalSarawak += $Sarawak[$i];}
		if ($Malaysia2[$i] != "" && $ItemID[$i] != 2) {$TotalMalaysia2 += $Malaysia2[$i];}
		if ($PMalaysia2[$i] != "" && $ItemID[$i] != 2) {$TotalPMalaysia2 += $PMalaysia2[$i];}
		if ($Sabah2[$i] != "" && $ItemID[$i] != 2) {$TotalSabah2 += $Sabah2[$i];}
		if ($Sarawak2[$i] != "" && $ItemID[$i] != 2) {$TotalSarawak2 += $Sarawak2[$i];}
		?>
		<tr>
		  <td style="padding:3px;font-weight:bold"><?php if ($ItemID[$i] == 2) {echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ".$Item[$i]; } else {echo $Item[$i];} ?></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="Malaysia[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " Malaysia"; ?>" value="<?php echo number_format($Malaysia[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="PMalaysia[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " PMalaysia"; ?>" value="<?php echo number_format($PMalaysia[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="Sabah[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " Sabah"; ?>" value="<?php echo number_format($Sabah[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="Sarawak[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " Sarawak"; ?>" value="<?php echo number_format($Sarawak[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="Malaysia2[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " Malaysia2"; ?>" value="<?php echo number_format($Malaysia2[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="PMalaysia2[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " PMalaysia2"; ?>" value="<?php echo number_format($PMalaysia2[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="Sabah2[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " Sabah2"; ?>" value="<?php echo number_format($Sabah2[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		  <td style="padding:3px;text-align:right"><input type="text" name="Sarawak2[]" class="DecimalOnly<?php echo $ItemID[$i] == 2 ? "" : " Sarawak2"; ?>" value="<?php echo number_format($Sarawak2[$i], 2, ".", ""); ?>" style="width:60px;text-align:right" /></td>
		</tr>
		<?php } ?>
		<tr>
		  <td style="padding:3px;font-weight:bold">Total</td>
		  <td id="TotalMalaysia" style="padding:3px;text-align:right"><?php echo number_format($TotalMalaysia, 2, ".", ","); ?></td>
		  <td id="TotalPMalaysia" style="padding:3px;text-align:right"><?php echo number_format($TotalPMalaysia, 2, ".", ","); ?></td>
		  <td id="TotalSabah" style="padding:3px;text-align:right"><?php echo number_format($TotalSabah, 2, ".", ","); ?></td>
		  <td id="TotalSarawak" style="padding:3px;text-align:right"><?php echo number_format($TotalSarawak, 2, ".", ","); ?></td>
		  <td id="TotalMalaysia2" style="padding:3px;text-align:right"><?php echo number_format($TotalMalaysia2, 2, ".", ","); ?></td>
		  <td id="TotalPMalaysia2" style="padding:3px;text-align:right"><?php echo number_format($TotalPMalaysia2, 2, ".", ","); ?></td>
		  <td id="TotalSabah2" style="padding:3px;text-align:right"><?php echo number_format($TotalSabah2, 2, ".", ","); ?></td>
		  <td id="TotalSarawak2" style="padding:3px;text-align:right"><?php echo number_format($TotalSarawak2, 2, ".", ","); ?></td>
		</tr>
	  </table>
	</td>
  </tr>
  <tr>
    <td style="padding:5px">
      Show:
	  <select name="isShow">
	    <option value="1"<?php if ($isShow == 1) {echo " selected=\"selected\"";} ?>>Yes</option>
		<option value="2"<?php if ($isShow == 2){echo " selected=\"selected\"";}  ?>>No</option>
	  </select>
	</td>
  </tr>
  <tr><td style="padding:5px"><input type="submit" name="btnsubmit" id="btnsubmit" value="Save" /></td></tr>
</table>
</form>
<script language="javascript">
$(function() {
	$(".Malaysia").keyup(function(e) {
		var Total = 0;
		$(".Malaysia").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalMalaysia").html(Total.toFixed(2));
	});

	$(".PMalaysia").keyup(function(e) {
		var Total = 0;
		$(".PMalaysia").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalPMalaysia").html(Total.toFixed(2));
	});

	$(".Sabah").keyup(function(e) {
		var Total = 0;
		$(".Sabah").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalSabah").html(Total.toFixed(2));
	});

	$(".Sarawak").keyup(function(e) {
		var Total = 0;
		$(".Sarawak").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalSarawak").html(Total.toFixed(2));
	});

	$(".Malaysia2").keyup(function(e) {
		var Total = 0;
		$(".Malaysia2").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalMalaysia2").html(Total.toFixed(2));
	});

	$(".PMalaysia2").keyup(function(e) {
		var Total = 0;
		$(".PMalaysia2").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalPMalaysia2").html(Total.toFixed(2));
	});

	$(".Sabah2").keyup(function(e) {
		var Total = 0;
		$(".Sabah2").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalSabah2").html(Total.toFixed(2));
	});

	$(".Sarawak2").keyup(function(e) {
		var Total = 0;
		$(".Sarawak2").each(function(e, i) {
			if ($(this).val() != "") Total += parseFloat($(this).val());
		});
		$("#TotalSarawak2").html(Total.toFixed(2));
	});

	$(".DecimalOnly").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		//if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>
