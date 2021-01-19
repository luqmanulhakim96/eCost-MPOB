 <table width="100%" border="0" cellpadding="3" cellspacing="0">
      <tr>
      	<td style="text-align:right">
		<a href="home.php?id=forum&amp;message=true"><img src="../images/mail_48.png" width="37" height="28" border="0" title="Mesej" /></a>  <a href="home.php?id=forum&amp;forum=true"><img src="../images/blue_speech_bubble_48.png" width="37" height="28" border="0" title="Forum" /></a>  <a href="home.php?id=forum&amp;faq=true"><img src="../images/faq-icon.png" width="37" height="28" border="0" title="FAQ" /></a></td>
      </tr>
      <?php
	  	if(isset($_GET['forum'])) {
	  ?>
      <tr>
        <td width="90%" valign="top">
        <iframe marginwidth="0" marginheight="0" name="myframe" id="myframe" frameborder="0" scrolling="auto" width="100%" height="100%" style="height:460px; width:100%" src="../forum/index.php">
    	Your borwser not support iframe tag                    </iframe>        </td>
      </tr>
      <?php
	  	}
		
		else {
			$link = "";
			if(isset($_GET['read']))
				$link = "read_msg.php";
			else if(isset($_GET['compose'])) 
				$link = "compose_msg.php";
			else if(isset($_GET['faq']))
					$link = "faq.php";
			else
				$link = "view_message.php";
			//echo $link;
?>
      <tr>
        <td width="90%" valign="top"><?php include($link); ?></td>
      </tr>
<?php
		}
	  ?>
    </table>
