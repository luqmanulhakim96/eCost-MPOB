<?php 

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");
	   ?>

	<link rel="stylesheet" href="../text_style.css" type="text/css" />
    <link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.cookie.js" type="text/javascript"></script>
	<script src="../js/jquery.treeview.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		$(function() {
			$("#browser").treeview({
				animated: "slow",
				collapsed: true,
				 persist: "cookie"
			});
		});
	</script>
<div id="main">
    <strong><img src="../images/Bcase.png" width="16" height="16" /> Summary</strong>
    <ul id="browser" class="filetree">
	  
        
     		
            
       <!--     <li><img src="../nav/folder.gif" /> <strong>Data Survey</strong>        
     		  <ul>
              
              <?php $con=connect();
			  $qt="select pb_thisyear from kos_belum_matang group by pb_thisyear ";
			  $rt=mysql_query($qt,$con);
			  while($rowt=mysql_fetch_array($rt)){
			  ?>
  		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=analysis&sub=analysis_estate&tahun=<?php echo $rowt['pb_thisyear'];?>">Estate <?php echo $rowt['pb_thisyear'];?></a></li>
   		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=analysis&sub=analysis_mill&tahun=<?php echo $rowt['pb_thisyear'];?>">Kilang <?php echo $rowt['pb_thisyear'];?></a></li>
              <?php } ?> 
   		      </ul>
     		</li> --> 
            
            
   <li><img src="../nav/folder.gif" /> <strong>Estate</strong>
                  <ul>
                    <li><img src="../nav/folder.gif" alt="d" />Immature Cost
                      <ul>
     		            <li><img src="../nav/folder.gif" alt="d" /> New Planting
                        <ul>
                        	<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=1&amp;type=Penanaman Baru">Year 1</a></li>
                          <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=2&amp;type=Penanaman Baru">Year 2</a></li>
                          <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=3&amp;type=Penanaman Baru">Year 3</a></li>         
                        </ul>
                        </li>   
                        <li><img src="../nav/folder.gif" alt="d" /> Replanting
                         <ul>
                        	<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=1&amp;type=Penanaman Semula">Year 1</a></li>
                           <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=2&amp;type=Penanaman Semula">Year 2</a></li>
                           <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=3&amp;type=Penanaman Semula">Year 3</a></li>         
                        </ul>
                        </li>  
                        	 
                        <li><img src="../nav/folder.gif" alt="d" /> Conversion
                         <ul>
                        	<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=1&amp;type=Penukaran">Year 1</a></li>
                           <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=2&amp;type=Penukaran">Year 2</a></li>
                           <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_immature&amp;tahun=3&amp;type=Penukaran">Year 3</a></li>         
                        </ul>
                        </li>   
                        		         
     		          </ul></li>
                    <li><img src="../nav/file.gif" alt="d" />Mature Cost
                      <ul>
     <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_upkeep&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>">Upkeep <br />
       (RM per hectare)</a></li>
    <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_upkeep&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&type=tan">Upkeep <br />
      (RM per tonne)</a></li>
                        
<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_harvesting&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>">Harvesting <br />
  (RM per hectare</a></li>
<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_harvesting&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&type=tan">Harvesting <br />
  (RM per tonne)</a></li>
                        
                        
<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_transportation&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>">Transportation <br />
  (RM per hectare)</a></li>
<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_transportation&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>&type=tan">Transportation <br />
  (RM per tonne)</a></li>
<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mature_allcost&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>">Total Cost <br />
  (RM per hectare)</a></li>

                        
     		          </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" />General Charges
                     <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_gc&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>">GC (RM per hectare)</a></li>
                       <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_gc&amp;type=tan&amp;tahun=<?php echo $_COOKIE['tahun_report'];?>">GC (RM per tonne)</a></li>
   		            </ul></li>
                  </ul>
                </li>
                
            <li><img src="../nav/folder.gif" /> <strong>Mill</strong>
            <ul>
            	<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mill_process">Processing Cost</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=analysis&amp;sub=linear_mill_other_cost">Other Cost</a></li>
            </ul>
            </li>    
                
  </ul>
		
</div>