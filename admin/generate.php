<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Report Books Contents</title>
<?php

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");

        $con = connect();
        $query_report = "select * from taxonomy_all where id = '$reportid'";
        $res_report = mysql_query($query_report,$con);
        $row_report = mysql_fetch_array($res_report);

?>
<!-- Load jQuery -->
<!--<script type="text/javascript" src="../jscripts/jquery.js"></script>
--><!-- Load TinyMCE -->
<script type="text/javascript" src="../jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
    $(function() {
        $('textarea.tinymce').tinymce({
            // Location of TinyMCE script
            script_url : '../jscripts/tiny_mce/tiny_mce.js',
            width: '100%',
            height: '400px',

            // General options
            theme : "advanced",
            plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            extended_valid_elements : "iframe[src|width|height|name|align|frameborder|style|scrolling]",

            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    });
    
    function pergi(x){
        
        <!--window.open('generate_book.php?reportid=<?php echo $reportid; ?>&type='+x);-->
            if(x=="view")
            {
                window.open('generate_book.php?reportid=<?php echo $reportid; ?>&type='+x);
            }
            if(x=="not_view")
            {
                window.open('html_to_doc_example.php?reportid=<?php echo $reportid; ?>&name=<?php echo $row_report['name'];?>&type='+x);
            }
    }
    
</script>
<!-- /TinyMCE -->

</head>
<body>
<h2>Add Contents for <?php echo $row_report['name'];?>
</h2>
<form method="post" action="">
    <div>
        <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
        <div>
            <textarea id="elm1" name="elm1" rows="20" style="width: 80%" class="tinymce">
            <?php echo $row_report['contents'];?>
            </textarea>
            <input name="report_id" type="hidden" id="report_id" value="<?php echo $report_id; ?>" />
        </div>
        <br />
        <input type="submit" name="simpan"  value="Save Content" id="simpan" />
      <input type="reset" name="reset" value="Cancel" />
      <input type="button" name="save" onclick="pergi('not_view');" value="Download Ms Word" />
      <input type="button" name="save2" onclick="pergi('view');" value="Preview" />
      <br />
      <br />
    </div>
</form>

</body>
</html>

<?php
if(isset($simpan)){
        $con = connect();
        $query = "update taxonomy_all set contents = '$elm1' where id='$reportid'";
        $result = mysql_query($query,$con);
echo "<script>window.location.href='home.php?id=config&sub=generate&reportid=$reportid';</script>";     
}

?>