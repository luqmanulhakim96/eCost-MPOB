
<?php  extract($_REQUEST);
	include("html_to_doc.inc.php");
	
	$htmltodoc= new HTML_TO_DOC();
	
	$url = $_SERVER['REQUEST_URI'];
	$name = $name."_".date('d_m_Y');
	//$htmltodoc->createDoc("reference1.html","test");
	$htmltodoc->createDocFromURL("http://localhost:8081/ecost/ecost1/admin/generate_book.php?reportid=$reportid",$name);



?><a href="<?php echo $name;?>.doc">Download</a> this document 