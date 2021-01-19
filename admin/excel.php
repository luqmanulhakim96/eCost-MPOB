<?php
extract($_REQUEST);
header('Content-Type: application/vnd.ms-excel');
$Title = str_replace(" ", "_", $Title);
$title = $Year . "_" . $Title . ".xlsx";
header('Content-disposition: attachment; filename=' . $title);
echo $dataExcel;
?> 